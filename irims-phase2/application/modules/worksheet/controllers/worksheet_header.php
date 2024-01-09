<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Risk management controller.
 * 
 * @package App
 * @category Controller
 * @author One Code Solution
 */
class worksheet_header extends Admin_Controller {

    
    function __construct() {
        parent::__construct();
        $this->load->model(array('master/worksheet_header_model'));
        $this->template
        ->set_css_global('plugins/jstree/dist/themes/default/style.min')
         ->set_css_global('plugins/w2ui-1.5/w2ui-1.5')
         ->set_css_global('plugins/w2ui-1.5/w2ui_Custom')         
         ->set_css_global('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5')
         //->set_css_global('plugins/select2/select2.min')
         ->set_js_global('plugins/moment/moment-with-locales.min')
         ->set_js_global('plugins/w2ui-1.5/w2ui-1.5')
         //->set_js_global('plugins/select2new/select2.min')
         ->set_js_global('plugins/jquery-validation/js/jquery.validate.min')
         ->set_js_global('plugins/jquery-validation/js/additional-methods.min')
         ->set_js_global('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min')
         ->set_js_global('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0')
         ->set_js_global('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5');
                
        
    }

    function index() {
      //$get_worksheetHeader_list = $this->worksheet_header_model->get_worksheetHeader_list();
      //var_dump($get_worksheetHeader_list);die;	
      $this->template->build('worksheet-index');
    }
    function get_worksheetHeader(){
      $get_worksheetHeader_list = $this->worksheet_header_model->get_worksheetHeader_list();
      echo json_encode($get_worksheetHeader_list);
   
   }
 
   function insert_WorkHeader(){
     //die(var_dump($_POST));
     // $Grade = $_POST['Grade'];
     // $RoleID = $_POST['RoleID'];
     
     $ls = array(
       'WorkSheetName' => $_POST['WorkSheetName'], 
       'StartDate' => $_POST['StartDate'], 
       'EndDate' => $_POST['EndDate'], 
       'IsActive' => $_POST['IsActive'],  
       'CreatedBy' => $_POST['CreatedBy'],   
       'CreatedDate' => $_POST['CreatedDate']
     );
     
     if($_POST['IsActive'] == 1){
       $update_worksheet_header_isActive = $this->worksheet_header_model->update_worksheet_header_isActive(0);
     }     


      $insert_worksheet_header = $this->worksheet_header_model->insert_worksheet_header( $ls);
      echo json_encode($insert_worksheet_header);
   
   }
   function delete_workSheetheader(){
 
     $WorksheetHeaderID  = $_POST['WorksheetHeaderID'];
     
      $delete_worksheet_header = $this->worksheet_header_model->delete_worksheet_header($WorksheetHeaderID);
      echo json_encode($delete_worksheet_header);
   
   }
   function update_worksheetheader(){
 
     $WorksheetHeaderID  = $_POST['WorksheetHeaderID'];
     $ls = array(
       'WorkSheetName' => $_POST['WorkSheetName'], 
       'StartDate' => $_POST['StartDate'], 
       'EndDate' => $_POST['EndDate'], 
       'IsActive' => $_POST['IsActive'],   
       'ModifiedBy' => $_POST['CreatedBy'],   
       'ModifiedDate' => $_POST['CreatedDate']
     );

     //var_dump($Grade);die;		
      $update_worksheet_header = $this->worksheet_header_model->update_worksheet_header($WorksheetHeaderID,$ls);

     if($_POST['IsActive'] == 1){
       $update_worksheet_header_isActive = $this->worksheet_header_model->update_worksheet_header_isActive($WorksheetHeaderID);
     }


      echo json_encode($update_worksheet_header);    
   }		

  function get_worksheet_form_active_by_WorkSheetFlowID(){

         $WorkSheetFlowID = $_POST['WorkSheetFlowID'];

         $get_worksheet_form_active = $this->worksheet_header_model->get_worksheet_form_active($WorkSheetFlowID);
         echo json_encode($get_worksheet_form_active);
       
    }
    function get_worksheetmaster_By_WorkSheetFlowID()
    {

     $WorksheetHeaderID = $_POST['WorksheetHeaderID'];
     $WorkSheetFlowID = $_POST['WorkSheetFlowID'];

     $get_worksheetmaster_By_WorkSheetFlowID = $this->worksheet_header_model->get_worksheetmaster_By_WorkSheetFlowID($WorksheetHeaderID,$WorkSheetFlowID);
     echo json_encode($get_worksheetmaster_By_WorkSheetFlowID);
   
    }
    function update_worksheet_form()
    {
 
     $WorksheetFormID  = $_POST['WorksheetFormID'];
     $ls = array(
       'WorksheetFormID' => $_POST['WorksheetFormID'], 
       'Sequence' => $_POST['Sequence'],
       'Sequencecolumn' => $_POST['Sequencecolumn'],
       'IsActive' => $_POST['IsActive'],        
       'ActiveColumn' => $_POST['ActiveColumn'],
     );

     $update_worksheet_form = $this->worksheet_header_model->update_worksheet_form($WorksheetFormID,$ls);
      echo json_encode($update_worksheet_form);    
   }		

      
}

?>