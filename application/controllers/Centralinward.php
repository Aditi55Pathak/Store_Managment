<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Centralinward extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelcentralinward');
	}
	public function index()
	{
		
		
		$result = $this->modelcentralinward->createNewList();
		$data = array('lid' => 0, 'page' => 'centralinward/listCentralinward', 'title' => 'Centralinward', 'rows' => $result['row'], 'cols' => $result['col']);
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		//$this->load->view('admin/menu', $data);
	}
	public function createCentralinward()
	{
		$result = $this->modelcentralinward->insertCentralinward();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editCentralinward()
	{
		$result = $this->modelcentralinward->updateCentralinward();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeCentralinward()
	{
		$result = $this->modelcentralinward->deleteCentralinward();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from centralinward where id=' . $id)->row();
		echo json_encode($data);
	}
}
