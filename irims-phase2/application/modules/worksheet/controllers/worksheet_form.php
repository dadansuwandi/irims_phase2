<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Risk management controller.
 * 
 * @package App
 * @category Controller
 * @author One Code Solution
 */
class worksheet_form extends Admin_Controller {

    
    function __construct() {
        parent::__construct();
        $this->load->model(array('worksheet/worksheet_form_model'));
        $this->load->model(array('worksheet/worksheet_header_model'));
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
     // $get_worksheetmaster_By_WorkSheetFlowID = $this->worksheet_form_model->get_worksheetmaster_By_WorkSheetFlowID(1,1);
      //var_dump($get_worksheetmaster_By_WorkSheetFlowID);die;	
      $this->template->build('worksheet-form');
    }
    function action() {   	
      $this->template->build('worksheet-form-action');
    }
    function get_worksheet_data_type(){     
     
      $ms_worksheet_data_type = $this->worksheet_form_model->ms_worksheet_data_type();
      echo json_encode($ms_worksheet_data_type);
   
    }
    function get_worksheet_form_default()
    {     
     
      $ms_worksheet_data_type = $this->worksheet_form_model->ms_worksheet_form_default();
      echo json_encode($ms_worksheet_data_type);
   
    }
    function get_worksheetHeader_by_id()
    {          
      
      $WorksheetHeaderID  = $_POST['WorksheetHeaderID'];
      $get_worksheetHeader_by_id = $this->worksheet_header_model->get_worksheetHeader_by_id($WorksheetHeaderID);
      echo json_encode($get_worksheetHeader_by_id);
   
    }
    
    function get_worksheet_form_default_by_ID()
    {     
      $FormDefaultID  = $_POST['FormDefaultID'];

      $ms_worksheet_form_default_by_ID = $this->worksheet_form_model->ms_worksheet_form_default_by_ID($FormDefaultID);
      echo json_encode($ms_worksheet_form_default_by_ID);
   
    }
    function get_worksheetmaster_By_WorkSheetFlowID()
    {
      $WorksheetHeaderID = $_POST['WorksheetHeaderID'];
      $WorkSheetFlowID = $_POST['WorkSheetFlowID'];

      $get_worksheetmaster_By_WorkSheetFlowID = $this->worksheet_form_model->get_worksheetmaster_By_WorkSheetFlowID($WorksheetHeaderID,$WorkSheetFlowID);
      echo json_encode($get_worksheetmaster_By_WorkSheetFlowID);
   
    }
  


}

?>