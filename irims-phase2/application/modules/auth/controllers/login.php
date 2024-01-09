<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login controller.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Login extends MY_Controller 
{
	function index()
	{
		//var_dump($this->session->userdata('role_id'));die;

		// user is already logged in
        if ($this->auth->loggedin()) 
		{
			if ($this->session->userdata('role_id') == GROUP_RISK_HEADQUARTERS || $this->session->userdata('role_id') == GROUP_RISK_OWNER || $this->session->userdata('role_id') == GROUP_RISK_LEADERS) {
				redirect('welcome/index_corporate');
			} else {
            	redirect('welcome/index_corporate_worksheet');
			}
        }
		
		$this->load->language('auth');
		
		
		
        // form submitted
        if ($this->input->post('username') && $this->input->post('password')) 
		{
            $remember = $this->input->post('remember') ? TRUE : FALSE;
            
            // get user from database
			$user = $this->user_model->get_by_username($this->input->post('username'));

			$exp = '';
            // --------------------------------------------------------------------------------- //
			// new logic
			$apiHost    = getenv('API_HOST_DEV_AP2').'/mobile/ldap/is_valid/';
			$postData   = array(
				'username' => 'macmour',
				'password' => 'M4cmour001!'
			);
			$json = $this->curl->simple_post($apiHost, $postData);
			$data = json_decode($json);
			
			
			 if($data->status == 'ok'){
				// disni user LDAP
				//get data LDAP
				$apiHostLdap   = getenv('API_HOST_DEV_AP2').'/mobile/employee/getDatabyfilterIRIMS/';
				$postDataLdap   = array(
					'username' => getenv('API_HOST_USER_LDAP_AP2'),
					'password' => getenv('API_HOST_PASS_LDAP_AP2'),
					'params' => '20002732',
					'submit' => '1'
				);
				$jsonLdap = $this->curl->simple_post($apiHostLdap, $postDataLdap);
				$dataLdap = json_decode($jsonLdap);				
				//var_dump($dataLdap[0]->employee_grade);die;

				// get role by grade
				$roleGrade = $this->user_model->get_role_by_grade($dataLdap[0]->employee_grade);
				//var_dump($roleGrade);die;
				//role default ldap
			
				$role__[0] = array(
					'roleid' => $roleGrade->RoleID,
					'role_name' => $roleGrade->role_name
				);

				// get role by user
				$userrolelist = $this->user_model->get_role_by_username($this->input->post('username'));
				//var_dump($userrolelist->row(0));die;
				
				if($userrolelist->num_rows() > 0){
				for ($x = 0; $x <= $userrolelist->num_rows()-1; $x++) {
							$role__[$x + 1] = array(
								'roleid' => $userrolelist->row($x)->RoleID ,
								'role_name' => $userrolelist->row($x)->role_name 
							);
					}
				}
				
				//var_dump($user);die;
				// Add session data LDAP
				
				//var_dump($user);die;

				// mark user as logged in
				// ini di ganti loginner nya
				//$this->auth->login($dataLdap[0]->USERNAME, $remember);
				$this->auth->login($user->id, $remember);
				//end get data LDAP

					
				$this->session->set_userdata(array(
					'user_id'	=> '0',
					'lang'		=> 'en',
					'unit_id'	=> $user->unit_id,
					'unit_code' => 'CORPORATE',
					'role_id'	=> '1',//$roleGrade->RoleID,
					'role_name'	=> 'Administrator',//$roleGrade->role_name,
					'registered'=> '2012-03-15 19:23:59',
					'expired'	=> '2039-07-01 00:00:00',
					'pic_id'	=> '0',
					'user_name' => $dataLdap[0]->USERNAME,
					'unit_name' => $dataLdap[0]->UNIT_NAME,
					'position_name' => $dataLdap[0]->POSITION_NAME,
					'user_roles'	=> $role__,
				));
				//var_dump($this->session->set_userdata);die;
				redirect($this->config->item('dashboard_uri'));
				// end user LDAP
			 }else{
				// disni user local
				$this->auth->login($user->id, $remember);
				$user = $this->user_model->get_by_username($this->input->post('username'));
				//var_dump($user);die;
						// Add session data
						$this->session->set_userdata(array(
							'user_id'	=> $user->id,
							'lang'		=> $user->lang,
							'unit_id'	=> $user->unit_id,
							'role_id'	=> $user->role_id,
							'role_name'	=> $user->role_name,
							'registered'=> '2022-01-01',
							'expired'	=> '2025-01-01',
							'unit_code' => 'CORPORATE',
							//'objective'	=> $pic->objective
						));
					//var_dump('ss');die;
					redirect($this->config->item('dashboard_uri'));
			 }
			//End new logic


			// // --------------------------------------------------------------------------------- //
			// // get from API AP2
			// // BEGIN LDAP Flagging
			// if ($user->LDAP == '1') {
			// 	$apiHost    = getenv('API_HOST_DEV_AP2').'/mobile/ldap/is_valid/';
			// 	$postData   = array(
			// 		'username' => $this->input->post('username'),
			// 		'password' => $this->input->post('password')
			// 	);
			// 	$json = $this->curl->simple_post($apiHost, $postData);
			// 	$data = json_decode($json);

			// 	//var_dump($data); die;

			// 	//if ($user && ($data->status == "ok" && $data->username == $this->input->post('username')))
			// 	if ($data && ($this->input->post('username') == $data->username))
			// 	{
					
			// 		$now = date('Y-m-d H:i:s');
			// 		if(!empty($user->expired)){
			// 			$exp = $user->expired;
			// 		}
			// 		if($now > $exp){
			// 			$this->template->add_message ('Error', 'Masa aktif akun anda telah habis.');
			// 		}else{
			// 			// mark user as logged in
			// 			$this->auth->login($user->id, $remember);
						
			// 			// Add session data
			// 			$this->session->set_userdata(array(
			// 				'user_id'	=> $user->id,
			// 				'lang'		=> $user->lang,
			// 				'unit_id'	=> $user->unit_id,
			// 				'role_id'	=> $user->role_id,
			// 				'role_name'	=> $user->role_name,
			// 				'registered'=> $user->registered,
			// 				'expired'	=> $user->expired,
			// 				'pic_id'	=> $user->pic_id,
			// 				//'objective'	=> $pic->objective
			// 			));
						
			// 			redirect($this->config->item('dashboard_uri'));
			// 		}
			// 	}
			// 	else {
			// 		// $this->template->add_message ('error', lang('login_attempt_failed'));
			// 		redirect($this->config->item('dashboard_uri'));
			// 	}

			// } else if ($user->LDAP == '0') {
			// // END LDAP Flagging
			// // --------------------------------------------------------------------------------- //

			// 	if ($user && $this->user_model->check_password($this->input->post('password'), $user->password))
			// 	//if($user)
			// 	{

			// 		$apiHost1   = getenv('API_HOST_DEV_AP2').'/mobile/employee/getDatabyfilterIRIMS/';
			// 		$postData1   = array(
			// 			'username' => 'heavy',
			// 			'password' => '@Ap123456',
			// 			'params' => '20002732',
			// 			'submit' => '1'
			// 		);
			// 		$json1 = $this->curl->simple_post($apiHost1, $postData1);
			// 		$data1 = json_decode($json1);

			// 	//	var_dump($data1[0]->UNIT_NAME);die;

					
					
			// 		$now = date('Y-m-d H:i:s');
			// 		if(!empty($user->expired)){
			// 			$exp = $user->expired;
			// 		}
			// 		if($now > $exp){
			// 			$this->template->add_message ('Error', 'Masa aktif akun anda telah habis.');
			// 		}else{
			// 			// mark user as logged in
			// 			$this->auth->login($user->id, $remember);


					
			// 			// Add session data
			// 			$this->session->set_userdata(array(
			// 				'user_id'	=> $user->id,
			// 				'lang'		=> $user->lang,
			// 				'unit_id'	=> $user->unit_id,
			// 				'role_id'	=> $user->role_id,
			// 				'role_name'	=> $user->role_name,
			// 				'registered'=> $user->registered,
			// 				'expired'	=> $user->expired,
			// 				'pic_id'	=> $user->pic_id,
			// 				'unit_name' => $data1[0]->UNIT_NAME
			// 				//'objective'	=> $pic->objective
			// 			));
						
			// 			redirect($this->config->item('dashboard_uri'));
			// 		}
			// 	}
			// 	else {
			// 		// $this->template->add_message ('error', lang('login_attempt_failed'));
			// 		redirect($this->config->item('dashboard_uri'));
			// 	}

			// }
        }
		
		if ($this->input->post('username'))
			$this->data['username'] = $this->input->post('username');
		if ($this->input->post('remember'))
			$this->data['remember'] = $this->input->post('remember');
        
        // show login form
        $this->load->helper('form');
		//$this->template->set_layout('no-footer')->build('login');
		$this->template
			->set_css_admin('pages/css/login')
			->set_js_global('plugins/jquery-validation/js/jquery.validate.min')
			->set_js_admin('pages/scripts/login')
			->build('login');
	}
}

/* End of file login.php */
/* Location: ./application/modules/auth/controllers/login.php */