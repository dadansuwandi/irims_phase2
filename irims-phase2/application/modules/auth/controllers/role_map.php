<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User management controller.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Role_map extends Admin_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('acl/role_model');
		
		// if ($this->input->post('cancel-button'))
		// 	redirect ('auth/role/index');
		
		// $this->load->language('auth');
	}
	

	function index()
	{
		// $query = $this->db->select('UserName,RoleID')->from('ac_user_role_maping')->order_by('UserName')->get()->result();
        // echo json_encode($query);
		//$this->data['sample_6'] = $this->role_model->get_list_map(site_url('role_map/index'));
		$this->template->build('role-map-list');
		
	}
	

	function GetData()
	{
		
		$this->db->select('ac_user_role_maping.id as UserMapID, ac_user_role_maping.*,acl_roles.*');
		$this->db->from('ac_user_role_maping');
		$this->db->join('acl_roles', 'ac_user_role_maping.RoleID = acl_roles.id', 'left join'); 
		$this->db->order_by('ac_user_role_maping.UserName');
		$query = $this->db->get()->result();
        echo json_encode($query);
		
	}
	function GetDataById($id)
	{
		
		$this->db->select('*');
		$this->db->from('ac_user_role_maping');
		$this->db->where('id',$id);
		$query = $this->db->get(); 
		return $query->row();
       
		
	}
	
	
	
	function edit($id)
	{
		$form = $this->form;
		$data = $this->GetDataById($id);
		//die($data);
		$this->data['id'] = $id;
        $this->data['code'] = $data->UserName;
		$this->data['risk']   = $this->drop_options();
		$this->data['risk_id']   = $data->RoleID;
		$this->data['start_date']   = $data->StartDate;
		$this->data['end_date']   = $data->EndDate;
		// $this->data['unit'] = $this->unit_model->drop_options();
		$this->template->build('role-map-form');
	}
	function view($id)
	{
		$form = $this->form;
		$data = $this->GetDataById($id);
	
		$this->data['id'] = '';
        $this->data['code'] = $data->UserName;
		$this->data['risk']   = $this->drop_options();
		$this->data['risk_id']   = $data->RoleID;
		$this->data['start_date']   = $data->StartDate;
		$this->data['end_date']   = $data->EndDate;
		// $this->data['unit'] = $this->unit_model->drop_options();
		$this->template->build('role-map-form');
	}
	
	
	function add()
	{		
		$this->data['risk']   = $this->drop_options();
		$this->template->build('role-map-form');
		//$this->_updatedata();
	}
	function save()
	{	
		
		//$query = $this->db->select('name,label_name')->from('risk_information_tooltips')->order_by('name')->get()->result();
		$data = array(
            'UserName'=>$this->input->post('UserName'),
            'RoleID'=>$this->input->post('risk_id'),
			'StartDate'=>$this->input->post('start_date'),
			'EndDate'=>$this->input->post('end_date')

            );
            $this->db->insert('ac_user_role_maping',$data);
            //echo json_encode($data);
	}
	function update()
	{	
		
		//$query = $this->db->select('name,label_name')->from('risk_information_tooltips')->order_by('name')->get()->result();
		$data = array(
            'UserName'=>$this->input->post('UserName'),
            'RoleID'=>$this->input->post('risk_id'),
			'StartDate'=>$this->input->post('start_date'),
			'EndDate'=>$this->input->post('end_date')

            );
         
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ac_user_role_maping',$data);
			
	}
	function drop_options() {
        $query = $this->db->select('id, name')
                ->order_by('name', 'ASC')
                ->get_where('acl_roles', array(
				'acl_roles' . ''));
        $result = $query->result();
        $options[''] = '';
        foreach ($result as $item) {
            $options[$item->id] = $item->name;
        }
        return $options;
    }
	
	
	function delete($id)
	{
		$user = $this->GetDataById($id);
		if ($user)
			$this->role_model->deleteMap($id);
			//$this->db->delete($this->'ac_user_role_maping', array('id' => $id));
		
		redirect('auth/role_map/index');
	}
	function GetDataMenu()
	{
		

		$this->db->select('child.*,child2.label as parentName');
		$this->db->from('acl_menus as child ');
		$this->db->join('acl_menus as child2', 'child.parent = child2.id', 'left join'); 
		//$this->db->order_by('ac_user_role_maping.UserName');
		$query = $this->db->get()->result();
        echo json_encode($query);
		
	}
}

