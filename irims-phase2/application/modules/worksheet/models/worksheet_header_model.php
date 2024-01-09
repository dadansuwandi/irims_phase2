<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Risk Model
 * 
 * @package App
 * @category Model
 * @author One Code Solution
 */
class worksheet_header_model extends MY_Model 
{
	
	protected $tbl_worksheet_form   = 'ms_worksheet_form';
	protected $tbl_worksheet_header = 'ms_worksheet_header';
	protected $tbl_role = 'acl_roles';
	
	
	/**
	 * Get role from grade
	 * 
	 * @param string $employeeGrade
	 * @return object grade
	 */
	function get_worksheetHeader_list()
	{	

		$this->db->select('*');
		$this->db->from($this->tbl_worksheet_header);
		$this->db->order_by('WorksheetHeaderID', 'AS1C');
		//$this->db->limit(1);
      //  var_dump('dd');die;
		return $this->db->get()->result();

	}
    function insert_worksheet_header($dt)
	{			
       return $this->db->insert($this->tbl_worksheet_header,$dt);
	}	
	function update_worksheet_header($WorksheetHeaderID,$dt)
	{	
		$this->db->where('WorksheetHeaderID', $WorksheetHeaderID);
		$query =  $this->db->update($this->tbl_worksheet_header, $dt);

		return $query;
	}	
	function delete_worksheet_header($WorksheetHeaderID)
	{	
		return $this->db->delete($this->tbl_worksheet_header, array('WorksheetHeaderID' => $WorksheetHeaderID));
	}	
    function update_worksheet_header_isActive($WorksheetHeaderID)
	{	
		$this->db->where('WorksheetHeaderID !=', $WorksheetHeaderID);
		$query =  $this->db->update($this->tbl_worksheet_header,  array('IsActive' => 0));

		return $query;
	}	
    function get_worksheetHeader_by_id($WorksheetHeaderID)
	{	

		$this->db->select('*');
		$this->db->from($this->tbl_worksheet_header);
        $this->db->where('WorksheetHeaderID', $WorksheetHeaderID);	
		$this->db->limit(1);
      //  var_dump('dd');die;
		return $this->db->get()->result();

	}
	function get_worksheetmaster_By_WorkSheetFlowID($WorksheetHeaderID,$WorkSheetFlowID)
	{	
		$this->db->select($this->tbl_worksheet_form . '.*, ' .
		$this->tbl_worksheet_header . '.*, ' .
		$this->tbl_worksheet_form . '.IsActive as FormActive, ' )
			->join($this->tbl_worksheet_header, $this->tbl_worksheet_header . '.WorksheetHeaderID = ' . $this->tbl_worksheet_form . '.WorksheetHeaderID', 'inner')
			->where($this->tbl_worksheet_header . '.IsActive', 1)
			->where($this->tbl_worksheet_header . '.WorksheetHeaderID',$WorksheetHeaderID)
			->where($this->tbl_worksheet_form . '.WorkSheetFlowID',$WorkSheetFlowID);
		return $this->db->get($this->tbl_worksheet_form)->result();

	}

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
	function update_worksheet_form($WorksheetFormID,$dt)
	{	
		$this->db->where('WorksheetFormID', $WorksheetFormID);
		$query =  $this->db->update($this->tbl_worksheet_form, $dt);

		return $query;
	}	
	function get_role_list()
	{
	   $roleGrade = $this->Grade_model->get_role();
	   echo json_encode($roleGrade);
	
	}
}

?>
