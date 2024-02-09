<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Emppost extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelemppost');
	}
	public function index()
	{
		$result = $this->modelemppost->createNewList();
		$data = array('lid' => 3, 'page' => 'emppost/listEmppost', 'title' => 'Emppost', 'rows' => $result['row'], 'cols' => $result['col']);
		$loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
		
		$menustring=$loggeduserndetails["menustr"];
		$this->load->view($menustring, $data);
		
		//$this->load->view('admin/menu', $data);
	}
	public function createEmppost()
	{
		$result = $this->modelemppost->insertEmppost();
		echo ($result) ? json_encode($result) : 0;
	}
	public function editEmppost()
	{
		$result = $this->modelemppost->updateEmppost();
		echo ($result) ? json_encode($result) : 0;
	}
	public function removeEmppost()
	{
		$result = $this->modelemppost->deleteEmppost();
		echo ($result) ? json_encode($result) : 0;
	}
	public function showEdit()
	{
		$id = $_POST['id'];
		$data = $this->db->query('select * from emppost where id=' . $id)->row();
		echo json_encode($data);
	}
}
