<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ACL grade management controller.
 * 
 * @package App
 * @category Controller
 * @author heavy weis danata
 */
class Grade extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		// $this->load->library(array('form_validation'));
		$this->load->model(array('acl/Grade_model'));
		$this->load->language('acl/grade');
		$this->template
			->set_css_global('plugins/jstree/dist/themes/default/style.min')
			->set_css_global('plugins/w2ui-1.5/w2ui-1.5')
			->set_css_global('plugins/w2ui-1.5/w2ui_Custom')
			->set_css_global('plugins/select2new/select2.min')
			->set_js_global('plugins/w2ui-1.5/w2ui-1.5')
			->set_js_global('plugins/select2new/select2.min');
			// ->set_css('simple-lists')
			// ->set_js_global('plugins/jstree/dist/jstree.min')
			// ->set_js_admin('pages/scripts/ui-tree')
			// ->set_js_global('plugins/select2/select2');		
		//$this->data['isAjax'] = FALSE;
	}
	
	function index()
	{   
		// $this->acl->build();
		// $acl = $this->acl;
		// $this->data['acl'] =  $acl;

		//$UpdateGrade = $this->Grade_model->update_grade('23');
		//var_dump($UpdateGrade);die;

		$this->template->set_title(lang('grade_page_name'))
			->build('acl/grade-tree', $this->data);
	}

	function get_role_list(){
		// $age[0] = array("Peter1"=>35, "Ben1"=>37, "Joe1"=>43);
		// $age[1] = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
		$roleGrade = $this->Grade_model->get_role();
	   echo json_encode($roleGrade);
	
	}
	function get_grade_list(){
		$gradelist = $this->Grade_model->get_grade_list();
	   echo json_encode($gradelist);
	
	}
	function insert_grade_maping(){
		//die(var_dump($_POST));
		$Grade = $_POST['Grade'];
		$RoleID = $_POST['RoleID'];
		//var_dump($Grade);die;		

	   $insertGrade = $this->Grade_model->insert_grade($Grade,$RoleID);
	   echo json_encode($insertGrade);
	
	}
	function delete_grade_maping(){
	
		$GradeMapID = $_POST['GradeMapID'];
		//var_dump($Grade);die;		

	   $DeleteGrade = $this->Grade_model->delete_grade($GradeMapID);
	   echo json_encode($DeleteGrade);
	
	}	
	function update_grade_maping(){
	
		$GradeMapID = $_POST['GradeMapID'];
		$Grade = $_POST['Grade'];
		$RoleID = $_POST['RoleID'];
		//var_dump($Grade);die;		

	   $UpdateGrade = $this->Grade_model->update_grade($GradeMapID,$Grade,$RoleID);
	   echo json_encode($UpdateGrade);
	
	}	
}