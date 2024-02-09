<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Role extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelrole');
	}
	public function index()
	{
		$result = $this->modelrole->createNewList();
		$data = array('lid' => 2, 'page' => 'role/listRole', 'title' => 'Role', 'rows' => $result['row'], 'cols' => $result['col']);


		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		//$this->load->view('admin/menu', $data);
	}
	public function createRole()
	{
		$result = $this->modelrole->insertRole();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editRole()
	{
		$result = $this->modelrole->updateRole();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeRole()
	{
		$result = $this->modelrole->deleteRole();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from role where id=' . $id)->row();
		echo json_encode($data);
	}
}
