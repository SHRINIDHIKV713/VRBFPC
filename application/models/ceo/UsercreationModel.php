<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model
 */
class UsercreationModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        // $this->table = 'users';
        // // Set orderable column fields
        // $this->column_order = array( 'state','dist', 'taluk', 'gp', 'village','pin', 
        // 'username', 'password','role');
        // // Set searchable column fields
        // $this->column_search = array('state', 'dist', 'taluk', 'gp', 'village','pin', 'username', 'role',
        // 'password');

        // $this->order = array('state' => 'asc');
        
       
    }    

//model
function dtCeousermanage(){
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $exp=$this->db->select('u.uid, u.username, u.password, u.name, 
    u.role, u.level, u.registred_on, u.state, u.dist, u.taluk, u.gp, u.village, u.pin, s.s_name, d.d_name
    ,t.t_name,g.g_name,v.v_name,p.p_code')
     ->from('users u')
     ->join('state s', 's.s_id=u.state','left')
     ->join('dist d', 'd.d_id=u.dist','left')
     ->join('taluk t', 't.t_id=u.taluk','left')
     ->join('gp g', 'g.g_id=u.gp','left')
     ->join('village v', 'v.v_id=u.village','left')
     ->join('pin p', 'p.p_id=u.pin','left')
     ->where('u.status','1')
     
     ->order_by("u.registred_on", "asc")
     ->get();
    
    $i=1;
    $output=[];
    
    foreach ($exp->result() as $row) {
        
        // $actionButton = '
        //       <ul class="list-inline">  
        //         <li class="list-inline-item"><a class="btn text-info btn-xs" 
        //         role="button" href=""> 
        //         <span class="fa fa-edit"></span></a></li>
        //         <li class="list-inline-item d-print-none">
        //         <a class="btn text-red btn-xs" role="button" id="delete_fpo" data-id="" 
        //         data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
        //       </ul>';
              $output[] = array(
            	$i++,
                '<span class="text-primary"><strong>'.$row->username.'</strong></span>',
                '<span class="text-warning text-uppercase"><strong>'.$row->role.'</strong></span>',
                '<span class="text-success"><strong>'.$row->password.'</strong></span>',
                '<span class="text-uppercase"><strong>'.$row->s_name.'</strong></span>',
                '<span class="text-uppercase"><strong>'.$row->d_name.'</strong></span>',
                '<span class="text-uppercase"><strong>'.$row->t_name.'</strong></span>',
                '<span class="text-uppercase"><strong>'.$row->g_name.'</strong></span>',
                '<span class="text-uppercase"><strong>'.$row->v_name.'</strong></span>',
                '<span class="text-uppercase"><strong>'.$row->p_code.'</strong></span>',
            ); 
        } 
        $result = array(
               "draw" => $draw,
                 "recordsTotal" => $exp->num_rows(),
                 "recordsFiltered" => $exp->num_rows(),
                 "data" => $output
            );
        return $result;  
        exit();
}




    

    
   

    //Add User
    function addUserentry(){
                    $username = $this->input->post('username');
                    $role = $this->input->post('role');
                    $password = $this->input->post('password');
                    $state = $this->input->post('state');
                    $dist = $this->input->post('dist');
                    $taluk = $this->input->post('taluk');
                    $gp = $this->input->post('gp');
                    $village = $this->input->post('village');
                    $pin = $this->input->post('pin');
                   

                    $datat=array('state'=>$state, 'dist'=>$dist, 'taluk'=>$taluk,
                     'gp'=>$gp, 'village'=>$village,'pin'=>$pin, 'username'=>$username, 
                     'role'=>$role,'password'=>$password
                     );

                     // Insert the data
                     $result = $this->db->insert('users',$datat);
     
                    if($result){
                        $output['success'] = true;
                        $output['messages'] = 'Successfully added!';  
                    }
                    else{
                        $output['success'] = false;
                        $output['messages'] = 'Ooops! something went wrong';
                    }
                    return $output;
        }    
      
    }

  
   


