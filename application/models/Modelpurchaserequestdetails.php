<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelpurchaserequestdetails extends CI_Model
{
	public function insertPurchaserequestdetails()
	{
		//code for insert
		$data = array('purchaseRequests_id' => $_POST['purchaseRequests_id'], 'articles_id' => $_POST['articles_id'], 'qty' => $_POST['qty']);
		$result = $this->db->insert('purchaserequestdetails', $data);
		return ($result) ? $this->createNewList() : false;
	}
	public function updatePurchaserequestdetails()
	{
		//code for update
		$id = $_POST['idPurchaserequestdetails'];
		$data = array('purchaseRequests_id' => $_POST['purchaseRequests_id'], 'articles_id' => $_POST['articles_id'], 'qty' => $_POST['qty']);
		$result = $this->db->update('purchaserequestdetails', $data, array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function deletePurchaserequestdetails()
	{
		$id = $_POST['id'];
		$result = $this->db->delete('purchaserequestdetails', array('id' => $id));
		return ($result) ? $this->createNewList() : false;
	}
	public function createNewList()
	{
		return $this->gpbhujst->getListSerial('select * from purchaserequestdetails', array('id'));
	}
}
