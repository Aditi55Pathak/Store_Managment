<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Purchaserequestdetails extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelpurchaserequestdetails');
	}
	public function index()
	{
		$result = $this->modelpurchaserequestdetails->createNewList();
		$data = array('lid' => 0, 'page' => 'purchaserequestdetails/listPurchaserequestdetails', 'title' => 'Purchaserequestdetails', 'rows' => $result['row'], 'cols' => $result['col']);
		$this->load->view('main', $data);
	}
	public function createPurchaserequestdetails()
	{
		$result = $this->modelpurchaserequestdetails->insertPurchaserequestdetails();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editPurchaserequestdetails()
	{
		$result = $this->modelpurchaserequestdetails->updatePurchaserequestdetails();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removePurchaserequestdetails()
	{
		$result = $this->modelpurchaserequestdetails->deletePurchaserequestdetails();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from purchaserequestdetails where id=' . $id)->row();
		echo json_encode($data);
	}
}
