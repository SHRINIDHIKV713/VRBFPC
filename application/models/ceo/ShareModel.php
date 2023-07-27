

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Shareholders Model
 */
class ShareModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'shareholders';
        // Set orderable column fields
        $this->column_order = array('fpo','bod_date','salutations','f_name','m_name' ,'l_name','gender','father_name','mother_name',
        'contact_no','state','dist','taluk','gp','village','pin','address','adhar_no','voter_id','pan','dl'
        ,'nominee_name','nominee_gender','nominee_dob','nominee_relation' ,'nominee_address','share_value','share_alloted','allotment_date'
        ,'register_no','share_no','share_distinctive_no','amount','date_of_payment','mode_of_payment','dd_date','dd_no','drawee_bank_name' 
        ,'account_holder_name','account_no','bank_name','branch_address','ifsc');
        // Set searchable column fields
        $this->column_search = array('fpo','bod_date','salutations','f_name','m_name' ,'l_name','gender','father_name','mother_name',
        'contact_no','state','dist','taluk','gp','village','pin','address','adhar_no','voter_id','pan','dl'
        ,'nominee_name','nominee_gender','nominee_dob','nominee_relation' ,'nominee_address','share_value','share_alloted','allotment_date'
        ,'register_no','share_no','share_distinctive_no','amount','date_of_payment','mode_of_payment','dd_date','dd_no','drawee_bank_name' 
        ,'account_holder_name','account_no','bank_name','branch_address','ifsc');
        
        // Set default order
        $this->order = array('f_name' => 'asc');
        
    } 

    function dtsharemanage(){

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $exp=$this->db->select('s.id, s.fpo, s.bod_date, s.salutations, s.f_name, s.m_name,
         s.l_name, s.gender, 
        s.father_name, s.mother_name, s.contact_no, s.state, s.dist, s.taluk, s.gp, s.village, s.pin, 
        s.address, s.adhar_no, s.voter_id, s.pan, s.dl, s.nominee_name, s.nominee_gender, s.nominee_dob, 
        s.nominee_relation, s.nominee_address, s.share_value, s.share_alloted, s.allotment_date, 
        s.register_no, s.share_no, s.share_distinctive_no, s.amount, s.date_of_payment, s.mode_of_payment, 
        s.dd_date, s.dd_no, s.drawee_bank_name, s.account_holder_name,
         s.account_no, s.bank_name, s.branch_address, s.ifsc,
         s_name, d.d_name, t.t_name, g.g_name, v.v_name, p.p_code')
         ->from('shareholders s')
         ->join('state st', 'st.s_id=s.state','left')
         ->join('dist d', 'd.d_id=s.dist','left')
         ->join('taluk t', 't.t_id=s.taluk','left')
         ->join('gp g', 'g.g_id=s.gp','left')
         ->join('village v', 'v.v_id=s.village','left')
         ->join('pin p', 'p.p_id=s.pin','left')
         ->where('s.status','1')
         
         ->order_by("s.f_name", "asc")
         ->get();
        
        $i=1;
        $output=[];
        
        foreach ($exp->result() as $row) {
            $actionButton = '
              <ul class="list-inline">  
                <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" href="shareholderedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
                <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_share" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
              </ul>';  

            $output[] = array(
            	$i++,
                $actionButton,
                $row->fpo,
                $row->bod_date,
                $row->salutations,
                $row->f_name,
                $row->m_name,
                $row->l_name,
                $row->gender,
                $row->father_name,
                $row->mother_name,
                $row->contact_no,
                $row->s_name,
                $row->d_name,
                $row->t_name,
                $row->g_name,
                $row->v_name,
                $row->p_code,
                $row->address,
                $row->adhar_no,
                $row->voter_id,
                $row->pan,
                $row->dl,
                $row->nominee_name,
                $row->nominee_gender,
                $row->nominee_dob,
                $row->nominee_relation,
                $row->nominee_address,
                $row->share_value,
                $row->share_alloted,
                $row->allotment_date,
                $row->register_no,
                $row->share_no,
                $row->share_distinctive_no,
                $row->amount,
                $row->date_of_payment,
                $row->mode_of_payment,
                $row->dd_date,
                $row->dd_no,
                $row->drawee_bank_name	,
                $row->account_holder_name,
                $row->account_no,
                $row->bank_name,
                $row->branch_address,
                $row->ifsc  
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


    function addShareentry() 
    {
        $fpo = $this->input->post('fpo');
        $bod_date = $this->input->post('bod_date');
        $salutations = $this->input->post('salutations');
        $f_name = $this->input->post('f_name');
        $m_name = $this->input->post('m_name');
        $l_name = $this->input->post('l_name');

        $gender = $this->input->post('gender');
        $father_name = $this->input->post('father_name');
        $mother_name = $this->input->post('mother_name');
        $contact_no = $this->input->post('contact_no');
        $state = $this->input->post('state');
        $dist = $this->input->post('dist');
        $taluk = $this->input->post('taluk');
        $village = $this->input->post('village');
        $gp = $this->input->post('gp');
        $pin = $this->input->post('pin');
        $address = $this->input->post('address');
        $adhar_no = $this->input->post('adhar_no');
        $pan = $this->input->post('pan');
        $voter_id = $this->input->post('voter_id');
        $dl = $this->input->post('dl');
        $nominee_name = $this->input->post('nominee_name');
        $nominee_gender = $this->input->post('nominee_gender');
        $nominee_dob = $this->input->post('nominee_dob');
        $nominee_relation = $this->input->post('nominee_relation');
        $nominee_address = $this->input->post('nominee_address');
        $share_value = $this->input->post('share_value');
        $share_alloted = $this->input->post('share_alloted');
        $allotment_date = $this->input->post('allotment_date');
        $register_no = $this->input->post('register_no');
        $share_no = $this->input->post('share_no');
        $share_distinctive_no = $this->input->post('share_distinctive_no');
        $amount = $this->input->post('amount');
        $date_of_payment = $this->input->post('date_of_payment');
        $mode_of_payment = $this->input->post('mode_of_payment');
        $dd_date = $this->input->post('dd_date');
        $dd_no = $this->input->post('dd_no');
        $drawee_bank_name = $this->input->post('drawee_bank_name');
        $account_holder_name = $this->input->post('account_holder_name');
        $account_no = $this->input->post('account_no');
        $bank_name = $this->input->post('bank_name');
        $branch_address = $this->input->post('branch_address');
        $ifsc = $this->input->post('ifsc');

        $datat=array('fpo_id'=>$_SESSION['userid'],'fpo'=>$fpo,'bod_date'=>$bod_date,'salutations'=>$salutations,'f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,
        'gender'=>$gender,'father_name'=>$father_name,'mother_name'=>$mother_name,
        'contact_no'=>$contact_no,'state'=>$state,'dist'=>$dist,'taluk'=>$taluk,'gp'=>$gp,'village'=>$village,'pin'=>$pin,
        'address'=>$address,'adhar_no'=>$adhar_no,'voter_id'=>$voter_id,'pan'=>$pan,'dl'=>$dl
        ,'nominee_name'=>$nominee_name,'nominee_gender'=>$nominee_gender,'nominee_dob'=>$nominee_dob,
        'nominee_relation'=>$nominee_relation,
        'nominee_address'=>$nominee_address,'share_value'=>$share_value,'share_alloted'=>$share_alloted,'allotment_date'=>$allotment_date
        ,'register_no'=>$register_no,'share_no'=>$share_no,'share_distinctive_no'=>$share_distinctive_no,'amount'=>$amount,'date_of_payment'=>$date_of_payment,
        'mode_of_payment'=>$mode_of_payment,'dd_date'=>$dd_date,'dd_no'=>$dd_no,'drawee_bank_name'=>$drawee_bank_name
        ,'account_holder_name'=>$account_holder_name,'account_no'=>$account_no,'bank_name'=>$bank_name,'branch_address'=>$branch_address,'ifsc'=>$ifsc,'status'=>'1');
        $result = $this->db->insert('shareholders',$datat);

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
        function getDistrict(){
            $s_id = $this->input->post('id',TRUE);
            //this is for array data
            $data = $this->location->getDistrict($s_id)->result();
            //to pass static data
            
            echo json_encode($data); 
        }
        function getTaluk(){
            $d_id = $this->input->post('id',TRUE);
            $data = $this->location->getTaluk($d_id)->result();
            echo json_encode($data); 
        }
        function getGp(){
            $t_id = $this->input->post('id',TRUE);
            $data = $this->location->getGp($t_id)->result();
            echo json_encode($data); 
        }
        function getVillage(){
            $g_id = $this->input->post('id',TRUE);
            $data = $this->location->getVillage($g_id)->result();
            echo json_encode($data); 
        }
        function getPin(){
            $v_id = $this->input->post('id',TRUE);
            $data = $this->location->getPin($v_id)->result();
            echo json_encode($data); 
        }
       
        function getFponame(){
            $depart=$this->db->order_by("f_name", "asc")->where('id',$_SESSION['userid'])->get('fpo'); 
            return $depart;
        }
    
        function editShareentry() 
        {
            $shareid = $this->input->post('shareid');
            $edit_fpo = $this->input->post('edit_fpo');
            $edit_bod_date = $this->input->post('edit_bod_date');
            $edit_salutations = $this->input->post('edit_salutations');
            $edit_f_name = $this->input->post('edit_f_name');
            $edit_m_name = $this->input->post('edit_m_name');
            $edit_l_name = $this->input->post('edit_l_name');
    
            $edit_gender = $this->input->post('edit_gender');
            $edit_father_name = $this->input->post('edit_father_name');
            $edit_mother_name = $this->input->post('edit_mother_name');
            $edit_contact_no = $this->input->post('edit_contact_no');
            $edit_state = $this->input->post('edit_state');
            $edit_dist = $this->input->post('edit_dist');
            $edit_taluk = $this->input->post('edit_taluk');
            $edit_village = $this->input->post('edit_village');
            $edit_gp = $this->input->post('edit_gp');
            $edit_pin = $this->input->post('edit_pin');
            $edit_address = $this->input->post('edit_address');
            $edit_adhar_no = $this->input->post('edit_adhar_no');
            $edit_pan = $this->input->post('edit_pan');
            $edit_voter_id = $this->input->post('edit_voter_id');
            $edit_dl = $this->input->post('edit_dl');
            $edit_nominee_name = $this->input->post('edit_nominee_name');
            $edit_nominee_gender = $this->input->post('edit_nominee_gender');
            $edit_nominee_dob = $this->input->post('edit_nominee_dob');
            $edit_nominee_relation = $this->input->post('edit_nominee_relation');
            $edit_nominee_address = $this->input->post('edit_nominee_address');
            $edit_share_value = $this->input->post('edit_share_value');
            $edit_share_alloted = $this->input->post('edit_share_alloted');
            $edit_allotment_date = $this->input->post('edit_allotment_date');
            $edit_register_no = $this->input->post('edit_register_no');
            $edit_share_no = $this->input->post('edit_share_no');
            $edit_share_distinctive_no = $this->input->post('edit_share_distinctive_no');
            $edit_amount = $this->input->post('edit_amount');
            $edit_date_of_payment = $this->input->post('edit_date_of_payment');
            $edit_mode_of_payment = $this->input->post('edit_mode_of_payment');
            $edit_dd_date = $this->input->post('edit_dd_date');
            $edit_dd_no = $this->input->post('edit_dd_no');
            $edit_drawee_bank_name = $this->input->post('edit_drawee_bank_name');
            $edit_account_holder_name = $this->input->post('edit_account_holder_name');
            $edit_account_no = $this->input->post('edit_account_no');
            $edit_bank_name = $this->input->post('edit_bank_name');
            $edit_branch_address = $this->input->post('edit_branch_address');
            $edit_ifsc = $this->input->post('edit_ifsc');
    
            $datat=array('fpo'=>$edit_fpo,'bod_date'=>$edit_bod_date,'salutations'=>$edit_salutations,'f_name'=>$edit_f_name,'m_name'=>$edit_m_name,'l_name'=>$edit_l_name,
            'gender'=>$edit_gender,'father_name'=>$edit_father_name,'mother_name'=>$edit_mother_name,
            'contact_no'=>$edit_contact_no,'state'=>$edit_state,'dist'=>$edit_dist,'taluk'=>$edit_taluk,'gp'=>$edit_gp,'village'=>$edit_village,'pin'=>$edit_pin,
            'address'=>$edit_address,'adhar_no'=>$edit_adhar_no,'voter_id'=>$edit_voter_id,'pan'=>$edit_pan,'dl'=>$edit_dl
            ,'nominee_name'=>$edit_nominee_name,'nominee_gender'=>$edit_nominee_gender,'nominee_dob'=>$edit_nominee_dob,'nominee_relation'=>$edit_nominee_relation,
            'nominee_address'=>$edit_nominee_address,'share_value'=>$edit_share_value,'share_alloted'=>$edit_share_alloted,'allotment_date'=>$edit_allotment_date
            ,'register_no'=>$edit_register_no,'share_no'=>$edit_share_no,'share_distinctive_no'=>$edit_share_distinctive_no,'amount'=>$edit_amount,'date_of_payment'=>$edit_date_of_payment,
            'mode_of_payment'=>$edit_mode_of_payment,'dd_date'=>$edit_dd_date,'dd_no'=>$edit_dd_no,'drawee_bank_name'=>$edit_drawee_bank_name
            ,'account_holder_name'=>$edit_account_holder_name,'account_no'=>$edit_account_no,'bank_name'=>$edit_bank_name,'branch_address'=>$edit_branch_address,'ifsc'=>$edit_ifsc,'status'=>'1');
            $this->db->where('id',$shareid);
            $result = $this->db->update('shareholders',$datat);
    
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
         //delete individual items
    function delSHARE(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('shareholders',$data);
        if($result){
            $output['success'] = true;
            $output['messages'] = 'Shareholders Deleted';
        }else{
            $output['success'] = false;
            $output['messages'] = 'Error while removing fpo!';
        }

        return($output);
    }    
   }




