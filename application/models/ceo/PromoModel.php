<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Promoters Model
 */
class PromoModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'promoters';
        // Set orderable column fields
        $this->column_order = array('share_no','first_name','m_name','l_name','dob','education','contact',
        'state','dist', 'taluk','gp', 'village','pin','adhar','pan','voter','dl','rationcard',
        'passportno','files');
        // Set searchable column fields
        $this->column_search = array('share_no','first_name','m_name','l_name','dob','education','contact',
        'state','dist', 'taluk','gp', 'village','pin','adhar','pan','voter','dl','rationcard','passportno','files');
        
        // Set default order
        $this->order = array('first_name' => 'asc');
        
        
    }    


//datatable integration
function dtCpromomanage(){
   
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $exp=$this->db->select('p.id, p.share_no, p.first_name, p.m_name, p.l_name, dob, 
    p.education, p.contact, p.state, p.dist, 
    p.taluk, p.village, p.gp, p.pin, p.adhar, p.pan, p.voter, p.dl, p.rationcard, 
    p.passportno, p.files,
    s_name, d.d_name, t.t_name, g.g_name, v.v_name, pi.p_code')
    ->from('promoters p')
    ->join('state st', 'st.s_id=p.state','left')
    ->join('dist d', 'd.d_id=p.dist','left')
    ->join('taluk t', 't.t_id=p.taluk','left')
    ->join('gp g', 'g.g_id=p.gp','left')
    ->join('village v', 'v.v_id=p.village','left')
    ->join('pin pi', 'pi.p_id=p.pin','left')
    ->where('p.status','1')
    
    ->order_by("p.first_name", "asc")
    ->get();
   
   $i=1;
   $output=[];
   
   foreach ($exp->result() as $row) {


        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" href="promoedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_promo" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $output[] = array(
            $i++, 
            $actionButton,
            $row->share_no,
            $row->first_name,
            $row->m_name,
            $row->l_name,
            $row->dob,
            $row->education,
            $row->contact,
            $row->s_name,
            $row->d_name,
            $row->t_name,
            $row->g_name,
            $row->v_name,
            $row->p_code,
            $row->adhar,
            $row->pan,
            $row->voter,
            $row->dl,
            $row->rationcard,
            $row->passportno,
            $row->files
            
           
            
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

    
   
    //Add Promoters
    function addPromoentry() {
        if(isset($_FILES["files"]["type"]))
        {
            $validextensions = array("jpeg", "jpg", "png");

         
            $temporary1 = explode(".", $_FILES["files"]["name"]);
            $file_extension1 = end($temporary1);
            $sourcePath1 = $_FILES['files']['tmp_name']; //Store source path in a variable
            $targetPath1 = "uploads/fpo/" . $_FILES['files']['name']; // The Target path where file is to be stored
            move_uploaded_file($sourcePath1,$targetPath1); // Moving Uploaded file
                     
            // The Image Data
    
        $image1 = $_FILES['files']['name'];
        $share_no = $this->input->post('share_no');
        $first_name = $this->input->post('first_name');
        $m_name = $this->input->post('m_name');
        $l_name = $this->input->post('l_name');
        $dob = $this->input->post('dob');
        $education = $this->input->post('education');
        $contact = $this->input->post('contact');
        $state = $this->input->post('state');
        $dist = $this->input->post('dist');
        $taluk = $this->input->post('taluk');
        $gp = $this->input->post('gp');
        $village = $this->input->post('village');
        $pin = $this->input->post('pin');
        $adhar = $this->input->post('adhar');
        $pan = $this->input->post('pan');
        $voter = $this->input->post('voter');
        $dl = $this->input->post('dl');
        $rationcard = $this->input->post('rationcard');
        $passportno = $this->input->post('passportno');
        // $files = $this->input->post('files');
      

        $datat=array('fpo_id'=>$_SESSION['userid'],'share_no'=>$share_no,'first_name'=>$first_name,
        'm_name'=>$m_name,'l_name'=>$l_name,'state'=>$state, 'dist'=>$dist, 'taluk'=>$taluk,
        'gp'=>$gp, 'village'=>$village,'pin'=>$pin,
                'dob'=>$dob,'education'=>$education,'contact'=>$contact,
            'adhar'=>$adhar,
        'pan'=>$pan,'voter'=>$voter,'dl'=>$dl,'rationcard'=>$rationcard,
        'passportno'=>$passportno,'files'=>$image1,'status'=>'1');
        $result = $this->db->insert('promoters',$datat);
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


   function getShareno(){
    $depart=$this->db->order_by("share_no", "asc")->get('shareholders'); 
    return $depart;
}



//Edit function
  
    function editPromoentry(){
        if(isset($_FILES["edit_files"]["type"]))
    {
        $validextensions = array("jpeg", "jpg", "png");

      
        $temporary1 = explode(".", $_FILES["edit_files"]["name"]);
        $file_extension1 = end($temporary1);
        $sourcePath1 = $_FILES['edit_files']['tmp_name']; //Store source path in a variable
        $targetPath1 = "uploads/fpo/" . $_FILES['edit_files']['name']; // The Target path where file is to be stored
        move_uploaded_file($sourcePath1,$targetPath1); // Moving Uploaded file
                 
        // The Image Data
        if($_FILES["edit_files"]["name"] != ""){


       
            $image2=$_FILES['edit_files']['name'];
        }
        else
        {
        
            $image2= $this->input->post('newimg');
        }
        $pid = $this->input->post('pid');
        
        $edit_share_no = $this->input->post('edit_share_no');
        $edit_first_name = $this->input->post('edit_first_name');
        $edit_m_name = $this->input->post('edit_m_name');
        $edit_l_name = $this->input->post('edit_l_name');
        $edit_dob = $this->input->post('edit_dob');
        $edit_education = $this->input->post('edit_education');
        $edit_contact = $this->input->post('edit_contact');
        $edit_state = $this->input->post('edit_state');
        $edit_dist = $this->input->post('edit_dist');
        $edit_taluk = $this->input->post('edit_taluk');
        $edit_village = $this->input->post('edit_village');
        $edit_gp = $this->input->post('edit_gp');
        $edit_pin = $this->input->post('edit_pin');
        $edit_adhar = $this->input->post('edit_adhar');
        $edit_pan = $this->input->post('edit_pan');
        $edit_voter = $this->input->post('edit_voter');
        $edit_dl = $this->input->post('edit_dl');
        $edit_rationcard = $this->input->post('edit_rationcard');
        $edit_passportno = $this->input->post('edit_passportno');
        
        $data=array('share_no'=>$edit_share_no,'first_name'=>$edit_first_name,
        'm_name'=>$edit_m_name,'l_name'=>$edit_l_name,'state'=>$edit_state, 'dist'=>$edit_dist,'taluk'=>$edit_taluk,
                'dob'=>$edit_dob,'education'=>$edit_education,'contact'=>$edit_contact,'village'=>$edit_village,
                'gp'=>$edit_gp, 'pin'=>$edit_pin,
                'adhar'=>$edit_adhar,
        'pan'=>$edit_pan,'voter'=>$edit_voter,'dl'=>$edit_dl,'rationcard'=>$edit_rationcard,
        'passportno'=>$edit_passportno,'files'=>$image2);
        $this->db->where('id',$pid);
        $result = $this->db->update('promoters',$data);
        
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
  
 //delete individual items
 function delPROMO(){
    $id=$this->input->post('member_id');
    $this->db->where('id', $id);
    $status = '0';
    $data = array('status'=> $status);
    $result=$this->db->update('promoters',$data);
    if($result){
        $output['success'] = true;
        $output['messages'] = 'Promoters Deleted';
    }else{
        $output['success'] = false;
        $output['messages'] = 'Error while removing fpo!';
    }

    return($output);
}   
}

