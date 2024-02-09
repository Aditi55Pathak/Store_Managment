<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modeldepartment extends CI_Model
{
	public function insertDepartment()
	{
		//code for insert
		$data = array('name' => $_POST['name'], 'remarks' => $_POST['remarks']);
		$result = $this->db->insert('department', $data);
		return ($result) ? $this->createNewList() : false;
	}
	public function updateDepartment()
	{
		//code for update
		$id = $_POST['idDepartment'];
		$data = array('name' => $_POST['name'], 'remarks' => $_POST['remarks']);	
		$result = $this->db->update('department', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteDepartment()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('department', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		return $this->gpbhujst->getListSerial('select * from department', array('id','name','remarks'));
	}
	public function getDepartments()
	{
		$response = array();
		
		// Select record
		$this->db->select('*');
		$q = $this->db->get('department');
		$response = $q->result_array();
		
		return $response;
	}
}
