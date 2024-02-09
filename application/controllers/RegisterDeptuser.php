<?php
defined('BASEPATH') or exit('No direct script access allowed');
class RegisterDeptuser extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelregister');
		$this->load->model('modelallocate');
	}
	public function index()
	{
		
		$itemsalloted=$this->modelallocate->getalloteditems();
		$this->load->library('session');
		$this->session->set_userdata('itemsalloted',$itemsalloted);
		
		
		
		$result = $this->modelregister->createNewList();
		$data = array('lid' => 1, 'page' => 'register/listRegister', 'title' => 'Register', 'rows' => $result['row'], 'cols' => $result['col']);
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		//$this->load->view('main', $data);
	}
	public function createRegister()
	{
		$result = $this->modelregister->insertRegister();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editRegister()
	{
		$result = $this->modelregister->updateRegister();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeRegister()
	{
		$result = $this->modelregister->deleteRegister();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from register where id=' . $id)->row();
		echo json_encode($data);
	}
}
