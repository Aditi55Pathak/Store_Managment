<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelusers extends CI_Model
{
	public function insertUsers()
	{
		//code for insert
		
		$data = array('empname' => $_POST['empname'], 'departmentid' => $_POST['departmentid'], 'emppostid' => $_POST['emppostid'], 'roleid' => $_POST['roleid'],'username' => $_POST['username'],'password' => $_POST['password'],'departmentaccessid' => $_POST['departmentaccessid'],'remarks' => $_POST['remarks']);
		$result = $this->db->insert('users', $data);
		
		return ($result) ? $this->createNewList() : false;
	}
	public function updateUsers()
	{
		//code for update
		$id = $_POST['idUsers'];
		$data = array('empname' => $_POST['empname'], 'departmentid' => $_POST['departmentid'], 'emppostid' => $_POST['emppostid'], 'roleid' => $_POST['roleid'],'username' => $_POST['username'],'password' => $_POST['password'], 'remarks' => $_POST['remarks']);
		$result = $this->db->update('users', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteUsers()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('users', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		
		//return $this->gpbhujstore->getListSerial('select * from users', array('id','empname','departmentid','emppostid','roleid','remarks'));
		return $this->gpbhujst->getListSerial('select u.id, u.empname as name ,d.name as department, e.typepost as post, r.typerole as role, u.remarks from users u,department d, emppost e , role r  where u.departmentid=d.id and u.emppostid = e.id and u.roleid=r.id', array('id','name','department','post','role'));
	
	}
}
