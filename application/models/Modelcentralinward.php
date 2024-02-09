<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelcentralinward extends CI_Model
{
	public function insertCentralinward()
	{
		//code for insert

		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$userid=$loggeduserndetails["userid"];
		$data = array('podate' => $_POST['podate'], 'ponumber' => $_POST['ponumber'], 'itemname' => $_POST['itemname'], 'itemqty' => $_POST['itemqty'], 'itemmeasuretype' => $_POST['itemmeasuretype'],'description' => $_POST['description'], 'unitcost' => $_POST['unitcost'], 'totalcost' => $_POST['totalcost'], 'typeregisterid' => $_POST['typeregisterid'],  'mntcontract' => $_POST['mntcontract'], 'empid' => $userid,'unallotedqty' =>$_POST['itemqty'], 'remarks' => $_POST['remarks']);
		$result = $this->db->insert('centralinward', $data);
		return ($result) ? $this->createNewList() : false;
	}
	public function updateCentralinward()
	{
		//code for update
		$id = $_POST['idCentralinward'];
		$data = array('podate' => $_POST['podate'], 'ponumber' => $_POST['ponumber'], 'itemname' => $_POST['itemname'], 'itemqty' => $_POST['itemqty'], 'itemmeasuretype' => $_POST['itemmeasuretype'],'description' => $_POST['description'], 'unitcost' => $_POST['unitcost'], 'totalcost' => $_POST['totalcost'], 'typeregisterid' => $_POST['typeregisterid'], 'allocatedstatus' => $_POST['allocatedstatus'], 'mntcontract' => $_POST['mntcontract'], 'empid' => $_POST['empid'], 'entrydate' => $_POST['entrydate'], 'remarks' => $_POST['premarks']);
		$result = $this->db->update('centralinward', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deleteCentralinward()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('centralinward', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		return $this->gpbhujst->getListSerial('select id,podate,ponumber,itemname,itemqty from centralinward', array('id','podate','ponumber','itemname','itemqty'));
	}
	public function getUnallocateditems()
	{
		$response = array();
		
		// Select record
		$this->db->select('id, itemname,unallotedqty');		
		$this->db->where('unallotedqty > ', 0);
		$q = $this->db->get('centralinward');



		$response = $q->result_array();
		


		return $response;
	}
}
