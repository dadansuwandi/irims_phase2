<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Risk Model
 * 
 * @package App
 * @category Model
 * @author One Code Solution
 */
class worksheet_form_model extends MY_Model 
{
	
	protected $tbl_worksheet_form   = 'ms_worksheet_form';
	protected $tbl_worksheet_header = 'ms_worksheet_header';
	protected $tbl_worksheet_data_type = 'ms_worksheet_data_type';
	protected $tbl_worksheet_form_default = 'ms_worksheet_form_default';
	
	/**
	 * Get role from grade
	 * 
	 * @param string $employeeGrade
	 * @return object grade
	 */
	function ms_worksheet_data_type()
	{	
		$this->db->select('*');
		$this->db->from($this->tbl_worksheet_data_type);
		return $this->db->get()->result();

	}
	function ms_worksheet_form_default()
	{	
		$this->db->select('*');
		$this->db->from($this->tbl_worksheet_form_default);
		return $this->db->get()->result();

		
	}
	function ms_worksheet_form_default_by_ID($FormDefaultID)
	{	
		$this->db->select('*');
		$this->db->from($this->tbl_worksheet_form_default);		
        $this->db->where('FormDefaultID', $FormDefaultID);	
		$this->db->limit(1);
		return $this->db->get()->result();

		
	}
	function get_worksheetmaster_By_WorkSheetFlowID($WorksheetHeaderID,$WorkSheetFlowID)
	{			
		$this->db->select('*');
		$this->db->from($this->tbl_worksheet_form);	
		$this->db->where('WorksheetHeaderID', $WorksheetHeaderID);
		$this->db->where('WorkSheetFlowID', $WorkSheetFlowID);
		//$this->db->limit(1);
		return $this->db->get()->result();	
}
    
}

?>
