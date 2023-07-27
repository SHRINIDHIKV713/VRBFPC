<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountantController extends CI_Controller {
	public function __construct() {
        // if(empty($this->session->userdata('memlog')) || $this->session->userdata('level')!='2'){
        //     header('location:home');
        //     }
        parent::__construct();
        $this->load->helper('url');
    }
    //To Load The Dashboard Page
    public function index()
    {   
        $data['thisPage'] = 'accountant_dashboard';
        $data['pgScript'] = 'accountant_dashboard';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Dashboard';
        $this->load->dashboard_template('accountant/accountant_dashboard', $data);
    }
}