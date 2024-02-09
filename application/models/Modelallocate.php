<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelallocate extends CI_Model
{
	public function insertAllocate()
	{
		//code for insert

		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		$userid=$loggeduserndetails["userid"];
		$data = array('iteminwardid' => $_POST['iteminwardid'],'typeregisterid' => $_POST['typeregisterid'], 'departmentid' => $_POST['departmentid'], 'itemqtyalloted' => $_POST['itemqtyalloted'],'typeregisterid' => $_POST['typeregisterid'], 'empid' => $userid, 'remarks' => $_POST['remarks']);
		$result = $this->db->insert('allocate', $data);

		$this->db->select('unallotedqty');		
		$this->db->where('id', $_POST['iteminwardid']);
		$q = $this->db->get('centralinward');
        
       	$unalloted=0; 
		$allotednow=0;   
	    $allotednow= $_POST['itemqtyalloted'] ;
		//$this->load->library('session');
		if ( $q->num_rows() > 0 ){ $row = $q->row(); $unalloted=$row->unallotedqty-$allotednow; }



		$this->session->set_userdata('unalloted',$unalloted ); 
		
		// update now the centralinward table		
		$data = array( 'unallotedqty' => $unalloted );
		$result = $this->db->update('centralinward', $data, array('id' => $_POST['iteminwardid']));
       
		//$temp = getunallotedqty();'iteminwardid' => $_POST['iteminwardid']
		//$id = $_POST['idUsers'];getunallotedqty()
		//$result = $this->db->update('users', $data, array('id' => $id));
        // fetch unallotedqty from table on select iteminwardid
		// reduce by alloted qty
		// update again the qty
		//$unallotedqty=
		//$data = array('unallocatedqty' => $_POST['iteminwardid']
		// $result2= $this->db->update('centralinward', $data, array('id' => $id));


		return ($result) ? $this->createNewList() : false;
	}
	public function updateAllocate()
	{
		//code for update
		$id = $_POST['idAllocate'];
		$data = array('iteminwardid' => $_POST['iteminwardid'], 'departmentid' => $_POST['departmentid'], 'allocationdate' => $_POST['allocationdate'], 'empid' => $_POST['empid'], 'remarks' => $_POST['remarks']);
		$result = $this->db->update('allocate', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteAllocate()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('allocate', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		//return $this->gpbhujst->getListSerial('select * from allocate', array('id','iteminwardid','departmentid ','itemqtyalloted','allocationdate','empid',));

		return $this->gpbhujst->getListSerial('SELECT a.id , c.itemname as ItemName,a.itemqtyalloted as QtyAlloted,a.iteminwardid as CentralinwardID,d.name as Department,u.empname as Employee,a.allocationdate as AllotmentDate, r.typeregister as RegisterType from allocate a , centralinward c ,department d, users u,registercategory r where a.iteminwardid =c.id AND  u.departmentid=d.id and u.id=a.empid and a.typeregisterid=r.id', array('id','ItemName','QtyAlloted','CentralinwardID','Department','Employee','AllotmentDate','RegisterType'));
		
		
		//return $this->gpbhujst->getListSerial('SELECT a.id ,c.itemname as ItemName,a.itemqtyalloted as QtyAlloted,d.name,u.empname,a.allocationdate, a.remarks from allocate a , centralinward c ,department d, users u where a.id =c.id AND  u.departmentid=d.id and u.id=a.empid  ', array('id','ItemName','QtyAlloted','name','empname','allocationdate','remarks'));

	}
	public function getalloteditems()
	{
		$response = array();
		
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		$deptid=$loggeduserndetails["deptid"];
		// Select record
		$this->db->select('iteminwardid,departmentid,itemqtyalloted,typeregisterid');		
		$this->db->where('deptregisteredstatus', 'NO');
		$this->db->where('departmentid', $deptid);
		$q = $this->db->get('allocate');
		$response = $q->result_array();
		
		return $response;
	}
	public function getunallotedqty()
	{
		
		
		
		
		$response2 ="";
		
						
		return $response2;	
			
		
		
		
		
	}
}
