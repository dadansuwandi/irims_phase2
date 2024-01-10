<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User management controller.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class menu_role_assigment extends Admin_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		//$this->load->model('acl/role_model');
		
		
	}
	

	function index()
	{
		
		$this->template->build('menu-role-assigment');
		
	}
	

	function GetData()
	{
		
		$this->db->select('mst_role_assigment.*,acl_roles.name as roleName,acl_menus.label as menuName');
		$this->db->from('mst_role_assigment');
		$this->db->join('acl_roles', 'mst_role_assigment.menuRoleId = acl_roles.id', 'left join'); 
		$this->db->join('acl_menus', 'mst_role_assigment.menuId = acl_menus.id', 'left join'); 

		$this->db->order_by('mst_role_assigment.roleAssigmentId');
		$query = $this->db->get()->result();
        echo json_encode($query);
		
	}
	function GetDataById($id)
	{
		
		$this->db->select('*');
		$this->db->from('mst_role_assigment');
		$this->db->where('roleAssigmentId',$id);
		$query = $this->db->get(); 
		return $query->row();
       
		
	}
	
	
	
	function edit($id)
	{
		$form = $this->form;
		$data = $this->GetDataById($id);
		//die($data);
		$this->data['id'] = $id;
		$form = $this->form;
		$data = $this->GetDataById($id);
	
		$this->data['id'] = $id;
		$this->data['role']   = $this->drop_options();
		$this->data['role_id']   = $data->menuRoleId;
		$this->data['menu']   = $this->drop_optionsMenu();
		$this->data['menu_id']   = $data->MenuId;
		
		// $this->data['unit'] = $this->unit_model->drop_options();
		$this->template->build('menu-role-assigment-form');
	}
	function view($id)
	{
		$form = $this->form;
		$data = $this->GetDataById($id);
	
		//$this->data['id'] = '';
		$this->data['role']   = $this->drop_options();
		$this->data['role_id']   = $data->menuRoleId;
		$this->data['menu']   = $this->drop_optionsMenu();
		$this->data['menu_id']   = $data->MenuId;
		
		// $this->data['unit'] = $this->unit_model->drop_options();
		$this->template->build('menu-role-assigment-form');
	}
	
	
	function add()
	{		
		$this->data['role']   = $this->drop_options();
		$this->data['menu']   = $this->drop_optionsMenu();
		$this->template->build('menu-role-assigment-form');
		
	}
	function save()
	{	
		
		//$query = $this->db->select('name,label_name')->from('risk_information_tooltips')->order_by('name')->get()->result();
		$data = array(
            'menuRoleId'=>$this->input->post('role_id'),
            'MenuId'=>$this->input->post('menu_id'),
			

            );
            $this->db->insert('mst_role_assigment',$data);
            //echo json_encode($data);
	}
	function update()
	{	
		
		//$query = $this->db->select('name,label_name')->from('risk_information_tooltips')->order_by('name')->get()->result();
		$data = array(
			
            'menuRoleId'=>$this->input->post('role_id'),
            'MenuId'=>$this->input->post('menu_id'),
			

            );
           
         
			$this->db->where('roleAssigmentId', $this->input->post('roleAssigmentId'));
			$this->db->update('mst_role_assigment',$data);
			
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
	function drop_optionsMenu() {

		$result = $this->db->select('id,label as name')->from('acl_menus')->where('parent is null')->get()->result();
        
       // $result = $query->result();
        $options[''] = '';
        foreach ($result as $item) {
            $options[$item->id] = $item->name;
        }
        return $options;
    }
	
	function delete($id)
	{
		$table ='mst_role_assigment';
		$user = $this->GetDataById($id);
		if ($user)
			$this->role_model->deleteroleassigment($id);
			
		
		redirect('auth/menu_role_assigment/index');
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

