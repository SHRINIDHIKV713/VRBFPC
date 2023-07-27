<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentController extends CI_Controller {
	public function __construct() {
        // if(empty($this->session->userdata('memlog')) || $this->session->userdata('level')!='4'){
        //     header('location:home');
        //     }
        parent::__construct();
        $this->load->helper('url');
    }
    //To Load The Dashboard Page
    public function index()
    {   
        $data['thisPage'] = 'agent_dashboard';
        $data['pgScript'] = 'agent_dashboard';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Dashboard';
        $this->load->dashboard_template('agent/agent_dashboard', $data);
    }
}