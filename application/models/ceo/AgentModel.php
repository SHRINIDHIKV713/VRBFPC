<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Promoters Model
 */
class AgentModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'agent';
        // Set orderable column fields
        $this->column_order = array('files', 'a_name', 'address', 'status_', 'cin', 'adhar',
         'pan','gst','ag_date','validity', 'contact_no', 'org_name', 'email', 'credit_period', 
         'credit_limit', 'village', 
         'gpname', 'taluk', 'district', 'state', 'pincode');
        // Set searchable column fields
        $this->column_search = array('files', 'a_name', 'address', 'status_', 'cin', 'adhar',
         'pan','gst','ag_date','validity', 'contact_no', 'org_name', 'email', 'credit_period', 
         'credit_limit',  'village', 
         'gpname', 'taluk', 'district', 'state', 'pincode');
        
        // Set default order
        $this->order = array('a_name' => 'asc');
        
    }  
    
    function dtCagentmanage(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $exp=$this->db->select('a.id, 
        a.files, a.a_name, a.address, a.status_, a.cin, a.adhar,
         a.pan,a.gst,a.ag_date,a.validity, a.contact_no, a.org_name, a.email, a.credit_period, 
         a.credit_limit,  a.village, 
         a.gpname, a.taluk, a.district, a.state, a.pincode,
         s_name, di.d_name, t.t_name, g.g_name, v.v_name, p.p_code')
        ->from('agent a')
        ->join('state st', 'st.s_id=a.state','left')
        ->join('dist di', 'di.d_id=a.district','left')
        ->join('taluk t', 't.t_id=a.taluk','left')
        ->join('gp g', 'g.g_id=a.gpname','left')
        ->join('village v', 'v.v_id=a.village','left')
        ->join('pin p', 'p.p_id=a.pincode','left')
        ->where('a.status','1')
        ->order_by("a.a_name", "asc")
        ->get();
       
       $i=1;
       $output=[];
       
       foreach ($exp->result() as $row) {
            $actionButton = '
              <ul class="list-inline">  
                <li class="list-inline-item"><a class="btn text-info btn-xs" 
                role="button" href="agentedit?id='.$row->id.'"> 
                <span class="fa fa-edit"></span></a></li>
                <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_agent" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
                
                </ul>';
            $output[] = array(
                $i++, 
                $actionButton,
                $row->a_name,
                $row->s_name,
                $row->d_name,
                $row->t_name,
                $row->g_name,
                $row->v_name,
                $row->p_code,
                $row->org_name,
                $row->cin,
                $row->adhar,
                $row->pan,
                $row->gst,
                $row->ag_date,
                $row->validity,
                $row->contact_no,
                $row->email,
                $row->files,
                $row->credit_period,
                $row->credit_limit,
                $row->address,
                $row->status_
               
               
                
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

    
    //Add Agents
    function addAgententry() {
        if(isset($_FILES["files"]["type"]))
        {
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["files"]["name"]);
            $file_extension = end($temporary);

            
                    $sourcePath = $_FILES['files']['tmp_name']; //Store source path in a variable
                    $targetPath = "uploads/fpo/" . $_FILES['files']['name']; // The Target path where file is to be stored
                    move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file
                     // The Image Data
        $image = $_FILES['files']['name'];

        // $files = $this->input->post('files');
        $a_name = $this->input->post('a_name');
        $address = $this->input->post('address');
        $status_ = $this->input->post('status_');
        $cin = $this->input->post('cin');
        $adhar = $this->input->post('adhar');
        $pan = $this->input->post('pan');
        $gst = $this->input->post('gst');
        $ag_date = $this->input->post('ag_date');
        $validity = $this->input->post('validity');
        $contact_no = $this->input->post('contact_no');
        $org_name = $this->input->post('org_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $credit_period = $this->input->post('credit_period');
        $credit_limit = $this->input->post('credit_limit');
        $district = $this->input->post('district');
        $village = $this->input->post('village');
        $taluk = $this->input->post('taluk');
        $gpname = $this->input->post('gpname');
        $state = $this->input->post('state');
        $pincode = $this->input->post('pincode');
        $lastid = '';

        $datat=array('files'=>$image,'a_name'=>$a_name,'address'=>$address,'status_'=>$status_,
        'cin'=>$cin,'adhar'=>$adhar,'pan'=>$pan,'gst'=>$gst,'ag_date'=>$ag_date,'validity'=>$validity,
        'contact_no'=>$contact_no,'org_name'=>$org_name,'email'=>$email,'credit_period'=>$credit_period,
        'credit_limit'=>$credit_limit,'village'=>$village,'gpname'=>$gpname,'district'=>$district,'taluk'=>$taluk,
        'state'=>$state,'pincode'=>$pincode, 'status'=>'1');

        $result = $this->db->insert('agent',$datat);
        $lastId = $this->db->insert_id();
        $datau = array('user_id'=>$_SESSION['userid'],'username'=>$email,'password'=>$password,'role'=>'Agent');
        $resultu = $this->db->insert( 'users', $datau );

        if($result && $resultu){
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
    //Edit function
  
    function editAgententry(){
        if(isset($_FILES["edit_files"]["type"]))
        {
            $validextensions = array("jpeg", "jpg", "png");

            $temporary = explode(".", $_FILES["edit_files"]["name"]);
            $file_extension = end($temporary);
            $sourcePath = $_FILES['edit_files']['tmp_name']; //Store source path in a variable
            $targetPath = "uploads/fpo/" . $_FILES['edit_files']['name']; // The Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file
                     
            // The Image Data
        
     
        if($_FILES["edit_files"]["name"] != ""){


            $image1=$_FILES['edit_files']['name'];
        }
        else
        {
            $image1= $this->input->post('oldimg');
        }
        $aid = $this->input->post('aid');
      
       
        $edit_a_name = $this->input->post('edit_a_name');
       
        $edit_address = $this->input->post('edit_address');
        $edit_status_ = $this->input->post('edit_status_');
        $edit_cin = $this->input->post('edit_cin');
        $edit_adhar = $this->input->post('edit_adhar');
        $edit_pan = $this->input->post('edit_pan');
        $edit_gst = $this->input->post('edit_gst');
        $edit_ag_date = $this->input->post('edit_ag_date');
        $edit_validity = $this->input->post('edit_validity');
        $edit_contact_no = $this->input->post('edit_contact_no');
        $edit_org_name = $this->input->post('edit_org_name');
        $edit_email = $this->input->post('edit_email');
        $edit_credit_period = $this->input->post('edit_credit_period');
        $edit_credit_limit = $this->input->post('edit_credit_limit');
        $edit_status_ = $this->input->post('edit_status_');
        $edit_address = $this->input->post('edit_address');
        $edit_village = $this->input->post('edit_village');
        $edit_taluk = $this->input->post('edit_taluk');
        $edit_district = $this->input->post('edit_district');
        $edit_gpname = $this->input->post('edit_gpname');
        $edit_state = $this->input->post('edit_state');
        $edit_pincode = $this->input->post('edit_pincode');
        
        $data=array('files'=>$image1,'a_name'=>$edit_a_name,
        'status_'=>$edit_status_,
        'cin'=>$edit_cin,'adhar'=>$edit_adhar,'pan'=>$edit_pan,'gst'=>$edit_gst,
        'ag_date'=>$edit_ag_date,'validity'=>$edit_validity,'contact_no'=>$edit_contact_no,
        'org_name'=>$edit_org_name,
        'email'=>$edit_email,'credit_period'=>$edit_credit_period,'status_'=>$edit_status_,
        'address'=>$edit_address,
        'credit_limit'=>$edit_credit_limit,'taluk'=>$edit_taluk,'district'=>$edit_district,
        'village'=>$edit_village,'gpname'=>$edit_gpname,
        'state'=>$edit_state,'pincode'=>$edit_pincode);
        $this->db->where('id',$aid);
        $result = $this->db->update('agent',$data);
        
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
 function delAGENT(){
    $id=$this->input->post('member_id');
    $this->db->where('id', $id);
    $status = '0';
    $data = array('status'=> $status);
    $result=$this->db->update('agent',$data);
    if($result){
        $output['success'] = true;
        $output['messages'] = 'Agents Deleted';
    }else{
        $output['success'] = false;
        $output['messages'] = 'Error while removing fpo!';
    }

    return($output);
}   
}

