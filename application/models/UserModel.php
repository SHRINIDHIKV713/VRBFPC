<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model
 */
class UserModel extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$output = array('success' => false, 'messages' => array());
 	} 

    public function islogin($data){  
    
        $query=$this->db->get_where('users',array('username'=>$data['username'],'password'=>$data['password']));  
        return $query->row_array();  
    }    

}