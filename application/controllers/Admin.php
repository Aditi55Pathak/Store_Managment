<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('modeldepartment');
        $this->load->model('modelrole');
        $this->load->model('modelemppost');

    }
    public function index()
    {
        // get cities
		$departments =  $this->modeldepartment->getDepartments();
        $roles =  $this->modelrole->getRoles();
        $posts =  $this->modelemppost->getEmpposts();

		//loading session library 
		$this->load->library('session');
		$this->session->set_userdata('deptlist',$departments );
        $this->session->set_userdata('rolelist',$roles );
        $this->session->set_userdata('postlist',$posts);

		//'departments'=> $departments,
        
        
        
        
        
        
        
        
        $this->load->view("auth/auth");
    }
    public function validateUser($uname, $pass)
    {
        $result = $this->db->query("select * from users where username='$uname' and password='$pass' ");
        $userdetails = array();
        if ($result->num_rows() == 1) {
        //$resultlogin = getListSerial('select * from users where userid="$uname" and passkey="$pass" ' , array('id','name','remarks'));

        $userdetails = $this->db->query("select  u.id as userid,u.username as username,u.empname as empname ,d.name as department, e.typepost as post, r.typerole as role,u.departmentaccessid as departmentid from users u,department d, emppost e , role r  where u.departmentid=d.id and u.emppostid = e.id and u.roleid=r.id and u.username='$uname' ");
        
        $row =  $userdetails->result();
        //$username=
        //$empn


        //$userdetails= $this->gpbhujst->getListSerial('select  u.username as username,u.empname as name ,d.name as department, e.typepost as post, r.typerole as role  from users u,department d, emppost e , role r  where u.departmentid=d.id and u.emppostid = e.id and u.roleid=r.id', array('username','name','department','post','role'));

        //echo  $userdetails ;
       // echo $rowuserdetails[row];

       $userid= $row[0]->userid;  
       $empname= $row[0]->empname;       
       $emppost= $row[0]->post;
       $role= $row[0]->role;
       $deptid= $row[0]->departmentid;

       $menustr = "admin/menudeptUSER";

switch ($role) {
  case "sysADMIN":
    $menustr = 'admin/menuSYS';
    break;
  case "CSK":
    $menustr= 'admin/menuCSK' ;
    break;
  case "DSK":
    $menustr = 'admin/menuDSK' ;
    break;
  case "deptUSER":
    $menustr = 'admin/menudeptUSER' ;
        break;
  
}

       $loggeduserndetails= array( "empname"=>$empname, "userid"=>$userid,"post"=> $emppost, "role"=> $role,"menustr"=>$menustr,'deptid'=>$deptid );

        $this->load->library('session');
        $this->session->set_userdata('loggeduserndetails',  $loggeduserndetails);
        $this->session->set_userdata('empname',  $empname);
        $this->session->set_userdata('emppost',  $emppost);
        $this->session->set_userdata('role',  $role);
        $this->session->set_userdata('userid',  $userid);


		

        

            return $result->row();
    }
        else {
            return false;
    }
}
    public function doAuth()
    {
        $uname = $_POST["username"];
        $pass = $_POST["password"];
        $result = $this->validateUser($uname, $pass);
        if ($result) {
            $_SESSION["LOGGEDIN"] = TRUE;

            
            //based on role change the page redirection

            $loggeduserndetails= $this->session->userdata('loggeduserndetails') ; 
            $menu=$loggeduserndetails["menustr"];
            $startpath="register";

                            switch ($menu) {
                case "admin/menuSYS":
                    $startpath = 'users';
                    break;
                case "admin/menuCSK":
                    $startpath= 'centralinward' ;
                    break;
                case "admin/menuDSK":
                    $startpath = 'register' ;
                    break;
                case "admin/menudeptUSER":
                    $startpath = 'register' ;
                        break;
                
                }


        

            
            
            echo json_encode(array("code" => 200, "message" => "LoggedIn", "target" => base_url($startpath)));
        
        
        
        
        
        
        
        } else {
            echo json_encode(array("code" => 404, "message" => "User Not Found"));
        }
    }
    public function logout()
    {
        $_SESSION["LOGGEDIN"] = FALSE;
        // also invalidate session here
        //$_SESSION = array();
        //session_destroy();

        $this->load->view("auth/auth");
    }
}
