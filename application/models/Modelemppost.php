<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelemppost extends CI_Model
{
	public function insertEmppost()
	{
		//code for insert
		$data = array('typepost' => $_POST['typepost'], 'remarks' => $_POST['remarks']);
		$result = $this->db->insert('emppost', $data);
		return ($result) ? $this->createNewList() : false;
	}
	public function updateEmppost()
	{
		//code for update
		$id = $_POST['idEmppost'];
		$data = array('typepost' => $_POST['typepost'], 'remarks' => $_POST['remarks']);
		$result = $this->db->update('emppost', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteEmppost()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('emppost', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		return $this->gpbhujst->getListSerial('select * from emppost', array('id','typepost','remarks'));
	}
	public function getEmpposts()
	{
		$response = array();
		
		// Select record
		$this->db->select('*');
		$q = $this->db->get('emppost');
		$response = $q->result_array();
		
		return $response;
	}
}
