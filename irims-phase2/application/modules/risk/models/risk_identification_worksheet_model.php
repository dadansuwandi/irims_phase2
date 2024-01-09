<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Risk Identification Model
     * 
     * @package App
     * @category Model
     * @author Jaya Dianto
     */
    class risk_identification_worksheet_model extends MY_Model {
    	
    	
    	protected $tbl_worksheet_form   = 'ms_worksheet_form';
    	protected $tbl_worksheet_header = 'ms_worksheet_header';
        protected $tr_worksheet_header = 'tr_worksheet_header';
    	protected $unit_table           = 'mst_units';
        protected $tbl_pertimbangan_keputusan = 'ms_pertimbangan_keputusan';


        function get_worksheet_form_active($WorkSheetFlowID){
            $this->db->select($this->tbl_worksheet_form . '.*, ' .
            $this->tbl_worksheet_header . '.*, ' )
                ->join($this->tbl_worksheet_header, $this->tbl_worksheet_header . '.WorksheetHeaderID = ' . $this->tbl_worksheet_form . '.WorksheetHeaderID', 'inner')
                ->where($this->tbl_worksheet_header . '.IsActive', 1)
                ->where($this->tbl_worksheet_form . '.IsActive', 1)
                ->where($this->tbl_worksheet_form . '.WorkSheetFlowID',$WorkSheetFlowID)
                ->order_by($this->tbl_worksheet_form .'.Sequence','asc');
            return $this->db->get($this->tbl_worksheet_form)->result();
    
        }
        function get_worksheet_column_active($WorkSheetFlowID){
            $this->db->select($this->tbl_worksheet_form . '.*, ' .
            $this->tbl_worksheet_header . '.*, ' )
                ->join($this->tbl_worksheet_header, $this->tbl_worksheet_header . '.WorksheetHeaderID = ' . $this->tbl_worksheet_form . '.WorksheetHeaderID', 'inner')
                ->where($this->tbl_worksheet_header . '.IsActive', 1)
                ->where($this->tbl_worksheet_form . '.IsActive', 1)
                ->where($this->tbl_worksheet_form . '.ActiveColumn', 1)
                ->where($this->tbl_worksheet_form . '.WorkSheetFlowID',$WorkSheetFlowID)
                ->order_by($this->tbl_worksheet_form .'.sequencecolumn','asc');
            return $this->db->get($this->tbl_worksheet_form)->result();
    
        }
        function get_control_data_table_master_dinamis($NamaTable,$id,$Text)
        {	
    
            $this->db->select($NamaTable . '.'. $id .' as id,' . $NamaTable . '.' . $Text .' as text'   );
            $this->db->from($NamaTable);	
            //$this->db->limit(1);
          //  var_dump('dd');die;
            return $this->db->get()->result();
    
        }
        function get_pertimbangan_keputusan_text($id)
        {	    
            $this->db->select('*');
            $this->db->from($this->tbl_pertimbangan_keputusan);
            $this->db->where('PertimbanganID', $id);	
            $this->db->limit(1);

          //  var_dump('dd');die;
            return $this->db->get()->result();
    
        }
        function create_code_risk($unit_code, $year) {
            
            $query  = $this->db->query(
                'SELECT max(sequence) lastID FROM '.$this->tr_worksheet_header.' 
                 WHERE YEAR(`PeriodeDate`) = '.$year.' AND '.$this->tr_worksheet_header. '.UnitKerjaCode = \''.$unit_code.'\''
            );

            $row    = $query->row();
            if(!empty($row)) {
                $lastNo  = $row->lastID;
            } else {
                $lastNo  = 0;
            }

            $nextNo = $lastNo+1;
            $nextNo = 'RISK/'.$unit_code.'/'.$year.'/'.str_pad($nextNo, 4, '0', STR_PAD_LEFT);
            $ls = array(
                'RiskCode' =>  $nextNo, 
                'sequence' => $lastNo+1
            );
            return $ls;
        }
        function insert_tr_worksheet_header($data)
        {					
            return $this->db->insert($this->tr_worksheet_header, $data);
        }
    }
?>
