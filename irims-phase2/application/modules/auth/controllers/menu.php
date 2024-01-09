<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User management controller.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class menu extends Admin_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('acl/menu_model');
		// $this->load->model('master/risk_pic_model');
		
		// if ($this->input->post('cancel-button'))
		// 	redirect ('auth/role/index');
		
		// $this->load->language('auth');
	}
	

	function index()
	{
		$this->template->build('menu-list');
		
	}
	

	function GetData()
	{
		
		$this->db->select('ac_user_role_maping.*,acl_roles.*');
		$this->db->from('ac_user_role_maping');
		$this->db->join('acl_roles', 'ac_user_role_maping.RoleID = acl_roles.id', 'left join'); 
		$this->db->order_by('ac_user_role_maping.UserName');
		$query = $this->db->get()->result();
        echo json_encode($query);
		
	}
	function GetDataById($id)
	{
		
		$this->db->select('*');
		$this->db->from('acl_menus');
		$this->db->where('id',$id);
		$query = $this->db->get(); 
		return $query->row();
       
		
	}
	
	
	
	function edit($id)
	{
		$form = $this->form;
		$data = $this->GetDataById($id);
		//die($data);
		$this->data['id'] =  $data->id;
		$this->data['label'] = $data->label;
		$this->data['style']   = $data->style;
		$this->data['url']   = $data->url;
		$this->data['parent']   = $this->drop_options();
		$this->data['parent_id']   = $data->parent;
		$this->template->build('menu-form');
	}
	function view($id)
	{
		$form = $this->form;
		$data = $this->GetDataById($id);
		$this->data['id'] = '';
        $this->data['label'] = $data->label;
		$this->data['style']   = $data->style;
		$this->data['url']   = $data->url;
		$this->data['parent']   = $this->drop_options();
		$this->data['parent_id']   = $data->parent;
		$this->template->build('menu-form');

	}
	
	
	function add()
	{		
		$this->data['parent']   = $this->drop_options();
		$this->template->build('menu-form');
		//$this->_updatedata();
	}
	function save()
	{		
		//$query = $this->db->select('name,label_name')->from('risk_information_tooltips')->order_by('name')->get()->result();
		$data = array(
            'label'=>$this->input->post('label'),
            'style'=>$this->input->post('style'),
			'url'=>$this->input->post('url'),
			'parent'=>$this->input->post('parent')

            );
            $this->db->insert('acl_menus',$data);
            //echo json_encode($query);
	}
	function drop_options() {

		$query = $this->db->select('id,label as name')->from('acl_menus')->where('parent is null')->get()->result();
		
       
        $options[''] = '';
        foreach ($query as $item) {
            $options[$item->id] = $item->name;
        }
        return $options;
    }
	
	
	function delete($id)
	{
		
		$user = $this->GetDataById($id);
		
		if ($user){
			$this->menu_model->deleteMenu($id);
			
		}
		
		redirect('auth/menu/index');
	}
	
}

