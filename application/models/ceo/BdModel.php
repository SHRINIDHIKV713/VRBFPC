<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Directors Model
 */
class BdModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'directors';
        // Set orderable column fields
        $this->column_order = array('share_no','f_name','m_name','l_name','designation','dob','education','contact','state','district','taluk','
        gpname','village','pincode','directorno','adhar','pan','voter','dl','rationcard','passportno','files');
        // Set searchable column fields
        $this->column_search = array('share_no','f_name','m_name','l_name','designation','dob','education','contact','state','district','taluk','
        gpname','village','pincode','directorno','adhar','pan','voter','dl','rationcard','passportno','files');
        // Set default order
        $this->order = array('f_name' => 'asc');
        
        
       
}
//datatable integration
function dtCbdmanage(){
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $exp=$this->db->select('d.id, 
    d.share_no,d.f_name,d.m_name,d.l_name,d.designation,d.dob,d.education,d.contact,d.state,d.district,
    d.taluk,d.gpname,d.village,d.pincode,d.directorno,d.adhar,d.pan,d.voter,d.dl,
    d.rationcard,d.passportno,d.files,
    s_name, di.d_name, t.t_name, g.g_name, v.v_name, p.p_code')
    ->from('directors d')
    ->join('state st', 'st.s_id=d.state','left')
    ->join('dist di', 'di.d_id=d.district','left')
    ->join('taluk t', 't.t_id=d.taluk','left')
    ->join('gp g', 'g.g_id=d.gpname','left')
    ->join('village v', 'v.v_id=d.village','left')
    ->join('pin p', 'p.p_id=d.pincode','left')
    ->where('d.status','1')
    ->order_by("d.f_name", "asc")
    ->get();
   
   $i=1;
   $output=[];
   
   foreach ($exp->result() as $row) {


                  
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button"
             href="bdedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" 
            role="button" id="delete_bd" data-id="'.$row->id.'" data-toggle="tooltip"
             title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $output[] = array(
            $i++, 
            $actionButton,
            $row->share_no,
            $row->f_name,
            $row->m_name,
            $row->l_name,
            $row->designation,
            $row->dob,
            $row->education,
            $row->contact,
            $row->s_name,
            $row->d_name,
            $row->t_name,
            $row->g_name,
            $row->v_name,
            $row->p_code,
            $row->directorno,
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


         function addBdentry() {
           
            if(isset($_FILES["files"]["type"]))
            {
                $validextensions = array("jpeg", "jpg", "png");
    
                $temporary = explode(".", $_FILES["files"]["name"]);
                $file_extension = end($temporary);
                $sourcePath = $_FILES['files']['tmp_name']; //Store source path in a variable
                $targetPath = "uploads/fpo/" . $_FILES['files']['name']; // The Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file

                         
                // The Image Data
         
            $image1 = $_FILES['files']['name'];
            $share_no = $this->input->post('share_no');
            $f_name = $this->input->post('f_name');
            $m_name = $this->input->post('m_name');
            $l_name = $this->input->post('l_name');
            $designation = $this->input->post('designation');
            $dob = $this->input->post('dob');
            $education = $this->input->post('education');
            $contact = $this->input->post('contact');
            $state = $this->input->post('state');
            $district = $this->input->post('district');
            $taluk = $this->input->post('taluk');
            $village = $this->input->post('village');
            $gpname = $this->input->post('gpname');
            $pincode = $this->input->post('pincode');
            $directorno = $this->input->post('directorno');
            $adhar = $this->input->post('adhar');
            $pan = $this->input->post('pan');
            $voter = $this->input->post('voter');
            $dl = $this->input->post('dl');
            $rationcard = $this->input->post('rationcard');
            $passportno = $this->input->post('passportno');
           
                $datat=array('fpo_id'=>$_SESSION['userid'],'share_no'=>$share_no,'f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,
                'designation'=>$designation,'dob'=>$dob,'education'=>$education,'contact'=>$contact,
                'state'=>$state,'district'=>$district,'taluk'=>$taluk,
                'village'=>$village,'gpname'=>$gpname,'pincode'=>$pincode,'directorno'=>$directorno,'adhar'=>$adhar,'pan'=>$pan,'voter'=>$voter,
                'dl'=>$dl,'rationcard'=>$rationcard,'passportno'=>$passportno,'files'=>$image1, 'status'=>'1');
        $result = $this->db->insert('directors',$datat);
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

//Edit Directors
function editBdentry(){
    
    if(isset($_FILES["edit_files"]["type"]))
    {
        $validextensions = array("jpeg", "jpg", "png");

        $temporary = explode(".", $_FILES["edit_files"]["name"]);
        $file_extension = end($temporary);
        $sourcePath = $_FILES['edit_files']['tmp_name']; //Store source path in a variable
        $targetPath = "uploads/fpo/" . $_FILES['edit_files']['name']; // The Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file

       
        // The Image Data
        if($_FILES["edit_files"]["name"]!= ""){


       
            $image2=$_FILES['edit_files']['name'];
        }
        else
        {

            $image2= $this->input->post('newimg');
        }
    $bid = $this->input->post('bid');
  
    $edit_share_no = $this->input->post('edit_share_no');
    $edit_f_name = $this->input->post('edit_f_name');
    $edit_m_name = $this->input->post('edit_m_name');
    $edit_l_name = $this->input->post('edit_l_name');
    $edit_designation = $this->input->post('edit_designation');
    $edit_dob = $this->input->post('edit_dob');
    $edit_education = $this->input->post('edit_education');
    $edit_contact = $this->input->post('edit_contact');
    $edit_state = $this->input->post('edit_state');
    $edit_district = $this->input->post('edit_district');
    $edit_taluk = $this->input->post('edit_taluk');
    $edit_village = $this->input->post('edit_village');
    $edit_gpname = $this->input->post('edit_gpname');
    $edit_pincode = $this->input->post('edit_pincode');
    $edit_directorno = $this->input->post('edit_directorno');
    $edit_adhar = $this->input->post('edit_adhar');
    $edit_pan = $this->input->post('edit_pan');
    $edit_voter = $this->input->post('edit_voter');
    $edit_dl = $this->input->post('edit_dl');
    $edit_rationcard = $this->input->post('edit_rationcard');
    $edit_passportno = $this->input->post('edit_passportno');
   
 
  
   $data=array('share_no'=>$edit_share_no,'f_name'=>$edit_f_name,'m_name'=>$edit_m_name,'l_name'=>$edit_l_name,
    'designation'=>$edit_designation,'dob'=>$edit_dob,'education'=>$edit_education,'contact'=>$edit_contact,
    'state'=>$edit_state,'district'=>$edit_district,'taluk'=>$edit_taluk,
    'village'=>$edit_village,'gpname'=>$edit_gpname,'pincode'=>$edit_pincode,'directorno'=>$edit_directorno,'adhar'=>$edit_adhar,'pan'=>$edit_pan,'voter'=>$edit_voter,
    'dl'=>$edit_dl,'rationcard'=>$edit_rationcard,'passportno'=>$edit_passportno,'files'=>$image2);
    $this->db->where('id',$bid);
    $result = $this->db->update('directors',$data);
    
    if($result){
        $output['success'] = true;
        $output['messages'] = 'Successfully updated!';  
    }
    else{
        $output['success'] = false;
        $output['messages'] = 'Ooops! something went wrong';
    }
    return $output;
}
}
    //delete individual items
    function delBD(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('directors',$data);
        if($result){
            $output['success'] = true;
            $output['messages'] = 'Directors Deleted';
        }else{
            $output['success'] = false;
            $output['messages'] = 'Error while removing fpo!';
        }

        return($output);
    }    
}