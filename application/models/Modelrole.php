<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelrole extends CI_Model
{
	public function insertRole()
	{
		//code for insert
		$data = array('typerole' => $_POST['typerole'], 'remarks' => $_POST['remarks']);
		$result = $this->db->insert('role', $data);
		return ($result) ? $this->createNewList() : false;
	}
	public function updateRole()
	{
		//code for update
		$id = $_POST['idRole'];
		$data = array('typerole' => $_POST['typerole'], 'remarks' => $_POST['remarks']);
		$result = $this->db->update('role', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteRole()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('role', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		return $this->gpbhujst->getListSerial('select * from role', array('id','typerole','remarks'));
	}
	public function getRoles()
	{
		$response = array();
		
		// Select record
		$this->db->select('*');
		$q = $this->db->get('role');
		$response = $q->result_array();
		
		return $response;
	}
}
