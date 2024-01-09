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
        $this->load->model(array('master/worksheet_model'));
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
    function worksheetform() {    
    
      // var_dump($delete_worksheet_header);die;
       $this->template->build('worksheet-form');
   }



   
}

?>