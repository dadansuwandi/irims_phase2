<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Risk Identification Controller.
     * 
     * @package App
     * @category Controller
     * @author Jaya Dianto
     */
    class risk_identification_worksheet extends Admin_Controller {

        protected $form = array(
        );

        function __construct() {
            parent::__construct();
            $this->load->model(array('risk/risk_identification_worksheet_model'));
            $this->load->model('risk_identification_model');
            $this->load->model('risk_identification_pic_model');
            $this->load->model('risk_mitigation_model');
    		$this->load->model('auth/user_model');
            $this->load->model('master/unit_model');
            $this->load->model('master/status_dokumen_model');
            $this->load->model('master/risk_item_model');
            $this->load->model('master/risk_category_model');
            $this->load->model('master/risk_probability_model');
    		$this->load->model('master/risk_impact_model');
            $this->load->model('master/risk_pic_model');
            $this->load->model('master/exco_effectiveness_question_model');
            $this->load->model('master/exco_effectiveness_answer_model');
            $this->load->model('master/exco_effectiveness_value_category_model');
            $this->load->model('risk/log_model');
            $this->load->model('notification/notification_model');
            $this->load->model('master/risk_impact_indicator_model');
            $this->load->model('master/risk_impact_category_model');
            $this->load->model('master/risk_kpi_model');
            $this->template
            ->set_css_global('plugins/datatables/Table')
            ->set_css_global('plugins/datatables/fixedColumns.dataTables.min')
            ->set_css_global('plugins/w2ui-1.5/w2ui-1.5')
            ->set_css_global('plugins/w2ui-1.5/w2ui_Custom') 
            ->set_css_global('plugins/select2/select2')
            ->set_css_global('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5')            
            ->set_js_global('plugins/moment/moment-with-locales.min')
            ->set_js_global('plugins/datatables/jquery.dataTables.min')
            ->set_js_global('plugins/datatables/dataTables.fixedColumns.min')
            ->set_js_global('plugins/w2ui-1.5/w2ui-1.5')
            ->set_js_global('plugins/select2/select2.min')
            ->set_js_global('plugins/jquery-validation/js/jquery.validate.min')
            ->set_js_global('plugins/jquery-validation/js/additional-methods.min')
            ->set_js_global('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min')
            ->set_js_global('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0')
            ->set_js_global('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5');
            
        }

        function worksheet() {
            // $this->data['rows'] = $this->risk_identification_model->get_list_admin(array(6));
          
            //var_dump($data);die;		
             $this->template->build('risk-identification-worksheet');
         }
         function worksheetexample() {
            // $this->data['rows'] = $this->risk_identification_model->get_list_admin(array(6));
          
            //var_dump($data);die;		
             $this->template->build('risk-identification-worksheet-ex');
         }
         //$WorkSheetFlowID
         function get_worksheet_form_active_by_WorkSheetFlowID(){

            $WorkSheetFlowID = $_POST['WorkSheetFlowID'];

            $get_worksheet_form_active = $this->risk_identification_worksheet_model->get_worksheet_form_active($WorkSheetFlowID);
           echo json_encode($get_worksheet_form_active);
        
        }
        function get_worksheet_column_active_by_WorkSheetFlowID(){

            $WorkSheetFlowID = $_POST['WorkSheetFlowID'];

            $get_worksheet_column_active = $this->risk_identification_worksheet_model->get_worksheet_column_active($WorkSheetFlowID);
           echo json_encode($get_worksheet_column_active);
        
        }
        function get_list_owner(){

           // $WorkSheetFlowID = $_POST['WorkSheetFlowID'];

            $get_list_owner = $this->risk_identification_model->get_list_owner(array(1,2,3));
           echo json_encode($get_list_owner);
        
        }
        
        // === new line ====

        function worksheet_form() {
     		
           
    		$this->data['RISK_IDENTIFICATION_ID'] = $id;
            
            $this->data['INHERENT_RISK_K'] = $this->risk_probability_model->drop_options();
            $this->data['RESIDUAL_RISK_K'] = $this->risk_probability_model->drop_options();
            $this->data['TARGET_RESIDUAL_RISK_K'] = $this->risk_probability_model->drop_options();
            $this->data['MITIGASI_RISK_K'] = $this->risk_probability_model->drop_options();

            $this->data['INHERENT_RISK_D'] = $this->risk_impact_model->drop_options();
            $this->data['RESIDUAL_RISK_D'] = $this->risk_impact_model->drop_options();
            $this->data['TARGET_RESIDUAL_RISK_D'] = $this->risk_impact_model->drop_options();
            $this->data['MITIGASI_RISK_D'] = $this->risk_impact_model->drop_options();

            $this->data['RISK_PIC_K']       = $this->risk_pic_model->drop_options();


            //$dt =  $this->risk_identification_worksheet_model->create_code_risk('CORPORATE','2024');

            //var_dump($dt['sequence']);die;
            $this->template->build('risk-identification-worksheet-form');
        }

        function worksheet_control_data_table_master_dinamis (){


            $TableName = $_POST['TableName'];
            $ID = $_POST['ID'];
            $Text = $_POST['Text'];

            $get_control_data_table_master_dinamis = $this->risk_identification_worksheet_model->get_control_data_table_master_dinamis($TableName,$ID,$Text);
             echo json_encode($get_control_data_table_master_dinamis);
        }
        function risk_K (){
            $riskK = $this->risk_probability_model->drop_options();
            echo json_encode($riskK);
        }
        function risk_D (){
            $riskK =  $this->risk_impact_model->drop_options();
            echo json_encode($riskK);
        }
        function getPertimbangankeputusan(){

            $ID = $_POST['ID'];
            $dt =  $this->risk_identification_worksheet_model->get_pertimbangan_keputusan_text($ID);
            echo json_encode($dt);
        }
        function getUnitall(){
            $dt =  $this->unit_model->get_all();
            echo json_encode($dt);
        }
        function generateriskcode(){
            $dt =  $this->risk_identification_worksheet_model->create_code_risk();
            echo json_encode($dt);
        }
        function insert_tr_worksheet_header(){
            
            $RiskCode = $this->risk_identification_worksheet_model->create_code_risk(date('Y'),$_POST['UnitKerjaCode']);
            $ls = array(
                'RiskCode' =>  $dt['RiskCode'], 
                'UnitKerjaCode' => $_POST['UnitKerjaCode'], 
                'PeriodeDate' => $_POST['PeriodeDate'], 
                'sequence' => $dt['sequence'],  
                'CreatedBy' => $this->session->userdata('user_name'),   
                'CreatedDate' => date('Y-m-d')
            );


            $dt =  $this->risk_identification_worksheet_model->insert_tr_worksheet_header($ls);
            echo json_encode($dt);
        }

    }
?>