<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('UserModel', 'um');
       
    }

    //To Load The Dashboard Page
    public function index()
    {   
        $data['thisPage'] = 'login';
        $data['pgScript'] = 'login';
        $data['thisPageLevel'] = '';   
        $data['thisPageMain']="";
        $data['title'] = 'Login';
        $this->load->home_template('login', $data);
		
    }
	// $_SESSION['userid']

    public function check_login(){       
	    $data['username']=htmlspecialchars($_POST['name']);  
	    $data['password']=htmlspecialchars($_POST['pwd']);  
	    $res=$this->um->islogin($data);  
	    if($res){  
	    	$data = array(
	    				'uid' => $res['uid'],
						'userid' => $res['user_id'],
	    				'name' => $res['name'],	 
						'role' => $res['role'],	
						'level'=> $res['level'],
						'memlog' => true
	    			); 
	    	$this->session->set_userdata($data);
	      	if($_SESSION['role']==="Admin"){
	      		echo base_url()."admin_dashboard";	      		
	      	} 
	      	else if($_SESSION['role']==="Accountant"){
	      		echo base_url()."accountant_dashboard";	      		
	      	}
			  else if($_SESSION['role']==="CEO"){
				echo base_url()."ceo_dashboard";	      		
			}
			else if($_SESSION['role']==="Agent"){
				echo base_url()."agent_dashboard";	      		
			}
	      	else{
	      		echo base_url()."home";
	      	}	      	
	    }  
	    else{  
	       echo 0;  
	    }   
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('memlog');
		redirect('home', 'refresh');
	}



	
}