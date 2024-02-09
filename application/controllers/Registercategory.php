<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Registercategory extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelregistercategory');
	}
	public function index()
	{
		$result = $this->modelregistercategory->createNewList();
		$data = array('lid' => 4, 'page' => 'registercategory/listRegistercategory', 'title' => 'Registercategory', 'rows' => $result['row'], 'cols' => $result['col']);
		
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		//$this->load->view('main', $data);
	}
	public function createRegistercategory()
	{
		$result = $this->modelregistercategory->insertRegistercategory();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editRegistercategory()
	{
		$result = $this->modelregistercategory->updateRegistercategory();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeRegistercategory()
	{
		$result = $this->modelregistercategory->deleteRegistercategory();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from registercategory where id=' . $id)->row();
		echo json_encode($data);
	}
}
