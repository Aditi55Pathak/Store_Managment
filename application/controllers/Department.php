<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Department extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modeldepartment');
	}
	public function index()
	{
		$result = $this->modeldepartment->createNewList();
		$data = array('lid' => 1, 'page' => 'department/listDepartment', 'title' => 'Department', 'rows' => $result['row'], 'cols' => $result['col']);
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		
		//$this->load->view('admin/menu', $data);
	}
	public function createDepartment()
	{
		$result = $this->modeldepartment->insertDepartment();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editDepartment()
	{
		$result = $this->modeldepartment->updateDepartment();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeDepartment()
	{
		$result = $this->modeldepartment->deleteDepartment();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from department where id=' . $id)->row();
		echo json_encode($data);
	}
}
