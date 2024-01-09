<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade_model extends MY_Model 
{
	protected $table_name = 'ac_role_grade_maping';
	protected $roles_table = 'acl_roles';

	function get_role(){
		$this->db->select('*');
		$this->db->from('acl_roles');
		$this->db->order_by('name', 'ASC');
		//$this->db->limit(1);

		return $this->db->get()->result();
	}/**
	 * Get role from grade
	 * 
	 * @param string $employeeGrade
	 * @return object grade
	 */
	function get_grade_list()
	{	

		$this->db->select($this->table_name . '.*, ' . $this->roles_table . '.name AS role_name')
				->join($this->roles_table, $this->roles_table . '.id = ' . $this->table_name . '.RoleID', 'inner');
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() > 0)
			return $query->result();
		else
			return FALSE;

	}
	function insert_grade($Grade,$RoleID)
	{					
		return $this->db->insert($this->table_name, array('Grade' => $Grade, 'RoleID' => $RoleID));
	}	
	function update_grade($GradeMapID,$Grade,$RoleID)
	{	
		$this->db->where('GradeMapID', $GradeMapID);
		$query =  $this->db->update($this->table_name, array('Grade' => $Grade , 'RoleID' => $RoleID ));

		return $query;
	}	
	function delete_grade($GradeMapID)
	{	
		return $this->db->delete($this->table_name, array('GradeMapID' => $GradeMapID));
	}	
	
   
}

/* End of file resource_model.php */
/* Location: ./application/modules/acl/models/resource_model.php */