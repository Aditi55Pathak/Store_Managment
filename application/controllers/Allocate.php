<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Allocate extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelallocate');
		$this->load->model('modelcentralinward');
	}
	public function index()
	{
		
		
		$itemsresult=$this->modelcentralinward->getUnallocateditems();
		$this->load->library('session');
		$this->session->set_userdata('itemsresult',$itemsresult);
		
		
		$result = $this->modelallocate->createNewList();
		// check for qty for update centralinward table allocated status
		// two select queries and the a update query



		$data = array('lid' => 5, 'page' => 'allocate/listAllocate', 'title' => 'Allocate', 'rows' => $result['row'], 'cols' => $result['col']);
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		//$this->load->view('admin/menu', $data);
	}
	public function createAllocate()
	{
		$result = $this->modelallocate->insertAllocate();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editAllocate()
	{
		$result = $this->modelallocate->updateAllocate();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeAllocate()
	{
		$result = $this->modelallocate->deleteAllocate();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from allocate where id=' . $id)->row();
		echo json_encode($data);
	}
}
