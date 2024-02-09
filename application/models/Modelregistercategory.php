<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelregistercategory extends CI_Model
{
	public function insertRegistercategory()
	{
		//code for insert
		$data = array('typeregister' => $_POST['typeregister'], 'remarks' => $_POST['remarks']);
		$result = $this->db->insert('registercategory', $data);
		return ($result) ? $this->createNewList() : false;
	}
	public function updateRegistercategory()
	{
		//code for update
		$id = $_POST['idRegistercategory'];
		$data = array('typeregister' => $_POST['typeregister'], 'remarks' => $_POST['remarks']);
		$result = $this->db->update('registercategory', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteRegistercategory()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('registercategory', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		return $this->gpbhujst->getListSerial('select * from registercategory', array('id','typeregister','remarks'));
	}
}
