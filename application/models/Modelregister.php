<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelregister extends CI_Model
{
	public function insertRegister()
	{
		//code for insert
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		$userid=$loggeduserndetails["userid"];		
		$deptid=$loggeduserndetails["deptid"];



		//$data = array('iteminwardid' => $_POST['iteminwardid'], 'departmentid' => $_POST['departmentid'], 'registercategoryid' => $_POST['typeregisterid'],'itemqty'=>$_POST['itemqtyalloted'],'empid' => $userid, 'remarks' => $_POST['remarks']);
		$data = array('iteminwardid' => $_POST['iteminwardid'],'departmentid' => $deptid,'empid' => $userid, 'remarks' => $_POST['remarks']);
		
		$result = $this->db->insert('register', $data);
        if($result){
        $data = array( 'deptregisteredstatus' => "YES" );
		$result2 = $this->db->update('allocate', $data, array('iteminwardid' => $_POST['iteminwardid'],'departmentid' => $deptid));
		
	     }

		return ($result) ? $this->createNewList() : false;
	}

	public function updateRegister()
	{
		//code for update
		$id = $_POST['idRegister'];
		$data = array('iteminwardid' => $_POST['iteminwardid'], 'departmentid' => $_POST['departmentid'], 'registercategoryid' => $_POST['registercategoryid'], 'recorddate' => $_POST['recorddate'], 'empid' => $_POST['empid']);
		$result = $this->db->update('register', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteRegister()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('register', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		
		
		return $this->gpbhujst->getListSerial('SELECT r.id, d.name as Department, c.itemname as ItemName,a.iteminwardid as CentralinwardID,a.itemqtyalloted as Quantity,u.empname as Employee,a.allocationdate as AllotmentDate, rc.typeregister as RegisterType from allocate a ,register r, centralinward c ,department d, users u,registercategory rc where r.iteminwardid =a.iteminwardid and a.iteminwardid =c.id AND r.departmentid=d.id and u.id=r.empid and a.typeregisterid=rc.id and a.deptregisteredstatus="YES" ', array('id','Department','ItemName','CentralinwardID','Quantity','Employee','AllotmentDate','RegisterType'));
		//SELECT r.id,c.itemname as ItemName,a.iteminwardid as CentralinwardID,a.itemqtyalloted as Quantity,u.empname as Employee,a.allocationdate as AllotmentDate, rc.typeregister as RegisterType from allocate a ,register r, centralinward c ,department d, users u,registercategory rc where r.iteminwardid =a.iteminwardid and a.iteminwardid =c.id AND u.departmentid=d.id and u.id=r.empid and a.typeregisterid=rc.id
		//return $this->gpbhujst->getListSerial('SELECT r.id,c.itemname as ItemName,r.iteminwardid as CentralinwardID,r.itemqty as Quantity,u.empname as Employee,a.allocationdate as AllotmentDate, rc.typeregister as RegisterType from allocate a ,register r, centralinward c ,department d, users u,registercategory rc where r.id =c.id and a.id =c.id AND u.departmentid=d.id and u.id=a.empid and a.typeregisterid=rc.id', array('id','ItemName','CentralinwardID','Quantity','Employee','AllotmentDate','RegisterType'));
		//return $this->gpbhujst->getListSerial('select * from register', array('id','iteminvardid','departmentid','registercategoryid','recorddate','empid'));
	}
}
