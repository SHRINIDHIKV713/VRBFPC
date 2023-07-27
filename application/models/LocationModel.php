

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model
 */
class LocationModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        
    }
    //state
    function getStates(){
 		$state=$this->db->get('state'); 
 		return $state;
 	}
    function getDistrict($s_id){
        $dist = $this->db->get_where('dist', array('s_id' => $s_id));
        return $dist;
    } 
    function getTaluk($d_id){
        $taluk = $this->db->get_where('taluk', array('d_id' => $d_id));
        return $taluk;
    } 
    function getGp($t_id){
        $gp = $this->db->get_where('gp', array('t_id' => $t_id));
        return $gp;
    }
    function getVillage($g_id){
        $village = $this->db->get_where('village', array('g_id' => $g_id));
        return $village;
    }
    function getPin($v_id){
        $pin = $this->db->get_where('pin', array('v_id' => $v_id));
        return $pin;
    }
    
}

