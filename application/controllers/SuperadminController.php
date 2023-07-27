<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperadminController extends CI_Controller {
	public function __construct() {
        // if(empty($this->session->userdata('memlog')) || $this->session->userdata('level')!='1'){
        //     header('location:home');
        //     }
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('superadmin/UsercreationModel', 'usercreation');
        $this->load->model('LocationModel', 'location');
        $this->load->model('superadmin/FpoModel', 'fpo');
        $this->load->model('superadmin/PromoModel', 'promo');
        $this->load->model('superadmin/ShareModel', 'share');
        $this->load->model('superadmin/BdModel', 'bd');
        $this->load->model('superadmin/AgentModel', 'agent');
        $this->load->model('superadmin/IpcatalogModel', 'ipcatalog');
        $this->load->model('superadmin/IpindentModel', 'ipindent');
        $this->load->model('superadmin/IppurchaseModel', 'ippurchase');
        $this->load->model('superadmin/IptransferModel', 'iptransfer');
        $this->load->model('superadmin/IpsalesModel', 'ipsales');
        $this->load->model('superadmin/IpreturnModel', 'ipreturn');
        $this->load->model('superadmin/OpcatalogModel', 'opcatalog');
        $this->load->model('superadmin/OppurchaseModel', 'oppurchase');
        $this->load->model('superadmin/OpsalesModel', 'opsales');
        $this->load->model('superadmin/OpreturnModel', 'opreturn');
    }

    //To Load The Dashboard Page
    public function index()
    {   
        $data['thisPage'] = 'admin_dashboard';
        $data['pgScript'] = 'userManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Dashboard';
        $this->load->datatable_template('superadmin/admin/admin_dashboard', $data);
    }

    public function userEntry()
    {   
        $data['thisPage'] = 'userEntry';
        $data['pgScript'] = 'userEntry';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Dashboard';
        $data['state'] = $this->location->getStates()->result();
        $this->load->formentry_template('superadmin/admin/userEntry', $data);
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
   
    

    // Add user
    function addUserentry(){
        $data=$this->usercreation->addUserentry();
        echo json_encode($data);
    }

    // //datatable integration
    // function dtUsermanage(){
    //     $data = $row = array();
        
    //     // Fetch member's records
    //     $usercreation = $this->usercreation->getRows($_POST);
        
    //     $i = $_POST['start']+1;
    //     foreach($usercreation as $row){                
    //         // $actionButton = '
    //         //   <ul class="list-inline">  
    //         //     <li class="list-inline-item"><a class="btn text-info btn-xs" 
    //         //     role="button" href=""> 
    //         //     <span class="fa fa-edit"></span></a></li>
    //         //     <li class="list-inline-item d-print-none">
    //         //     <a class="btn text-red btn-xs" role="button" id="delete_fpo" data-id="" 
    //         //     data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
    //         //   </ul>';
    //         $data[] = array(
    //             $i++, 
    //             // $actionButton,
    //             $row->username,
    //             $row->role,
    //             $row->password,
    //             $row->state,
    //             $row->dist,
    //             $row->taluk,
    //             $row->gp,
    //             $row->village,
    //             $row->pin   
    //         );
    //     }
   
    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->usercreation->countAll(),
    //         "recordsFiltered" => $this->usercreation->countFiltered($_POST),
    //         "data" => $data,
    //     );
        
    //     // Output to JSON format
    //     echo json_encode($output);
    // }

   
function dtUsermanage(){
    $data=$this->usercreation->dtUsermanage();
    echo json_encode($data);
}


/*FPO Controller functions starts*/
    /* FPO Entry function start*/
    public function fpoEntry(){
        $data['thisPage'] = 'fpoEntry';
        $data['pgScript'] = 'fpoEntry';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'FPO Entry';
        $this->load->formentry_template('superadmin/fpo/fpoEntry', $data);
    }
/* FPO Entry function ends*/
/* FPO Manage function start*/
    //display page
    public function fpoManage(){
        $data['thisPage'] = 'fpoManage';
        $data['pgScript'] = 'fpoManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'FPO ';
        $this->load->datatable_template('superadmin/fpo/fpoManage', $data);
    }

     // Add fpo
     function addFpoentry(){
        $data=$this->fpo->addFpoentry();
        echo json_encode($data);
    }

      //datatable integration
      function dtFpomanage(){
        $data = $row = array();
        
        // Fetch member's records
        $fpo = $this->fpo->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($fpo as $row){                
            $actionButton = '
              <ul class="list-inline">  
                <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" href="fpoEdit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
                <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_fpo" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
              </ul>';
            $data[] = array(
                $i++, 
                $actionButton,
                $row->f_name,
                $row->date_of,
                $row->registered_address,
                $row->cin_no,
                $row->gst_no,
                $row->pan_no,
                $row->contact_person,
                $row->designation,
                $row->contact_no,
                $row->email,

                $row->fpo_account_no,
                $row->fpo_bank_name,
                $row->fpo_ifsc,

                $row->ceo_name,
                $row->ceo_mobile_number,
                $row->ceo_email_id,
                
                $row->ca_name,
                $row->ca_mobile_number,

                // $row->license_feild,
                // $row->license_value,
                // $row->certificate,
                // $row->fssai,
                // $row->general_license,
                // $row->trader_license,
                // $row->apmc_license,
                // $row->input_license,
                
            );
        }
   
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->fpo->countAll(),
            "recordsFiltered" => $this->fpo->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    //Delete fpo
    function delFPO(){
        $data=$this->fpo->delFPO();
        echo json_encode($data);
    }

    public function fpoEdit(){
        $data['thisPage'] = 'fpoEdit';
        $data['pgScript'] = 'fpoEdit';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'FPO Edit';
        $this->load->formentry_template('superadmin/fpo/fpoEdit', $data);
    }
    //
    function editFpoentry(){
        $data=$this->fpo->editFpoentry();
        echo json_encode($data);
    }
/* FPO Manage function ends*/

/* Promoters Manage function start*/
public function promoManage(){
    $data['thisPage'] = 'promoManage';
    $data['pgScript'] = 'promoManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Promoters ';
    $data['state'] = $this->location->getStates()->result(); 
    $this->load->datatable_template('superadmin/promoManage', $data);
}

//datatable integration
function dtPromomanage(){
    $data = $row = array();
    
    // Fetch member's records
    $promo = $this->promo->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($promo as $row){                
        
        $data[] = array(
            $i++, 
            $row->share_no,
            $row->first_name,
            $row->m_name,
            $row->l_name,
            $row->dob,
            $row->education,
            $row->contact,
            $row->state,
            $row->dist,
            $row->taluk,
            $row->gp,
            $row->village,
            $row->pin,
            $row->adhar,
            $row->pan,
            $row->voter,
            $row->dl,
            $row->rationcard,
            $row->passportno,
            $row->files
            
           
            
        );
    }
    
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->promo->countAll(),
        "recordsFiltered" => $this->promo->countFiltered($_POST),
        "data" => $data,
    );
    
    // Output to JSON format
    echo json_encode($output);
}


public function shareholdersManage(){
    $data['thisPage'] = 'shareholdersManage';
    $data['pgScript'] = 'shareholdersManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Shareholders'; 
    $this->load->datatable_template('superadmin/shareholdersManage', $data);
}
function dtSharemanage(){
    $data = $row = array();
    
    // Fetch member's records
    $share = $this->share->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($share as $row){  
        
        $data[] = array(
            $i++, 
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
            $row->state,
            $row->dist,
            $row->taluk,
            $row->gp,
            $row->village,
            $row->pin,
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
    
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->share->countAll(),
        "recordsFiltered" => $this->share->countFiltered($_POST),
        "data" => $data,
    );
    
    // Output to JSON format
    echo json_encode($output);
}

/* Directors Manage function start*/
    //display page
    public function bdManage(){
        $data['thisPage'] = 'bdManage';
        $data['pgScript'] = 'bdManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Directors ';
        $this->load->datatable_template('superadmin/bdManage', $data);
    }

    //datatable integration
    function dtBdmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $bd = $this->bd->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($bd as $row){                
            
            $data[] = array(
                $i++, 
                $row->share_no,
                $row->f_name,
                $row->m_name,
                $row->l_name,
                $row->designation,
                $row->dob,
                $row->education,
                $row->contact,
                $row->state,
                $row->district,
                $row->taluk,
                $row->gpname,
                $row->village,
                $row->pincode,
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
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bd->countAll(),
            "recordsFiltered" => $this->bd->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    /* Agents Manage function start*/
    //display page
    public function agentManage(){
        $data['thisPage'] = 'agentManage';
        $data['pgScript'] = 'agentManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Agents';
        $this->load->datatable_template('superadmin/agentManage', $data);
    }

 //datatable integration
 function dtAgentmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $agent = $this->agent->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($agent as $row){                
        
        $data[] = array(
            $i++, 
            $row->a_name,
            $row->state,
            $row->district,
            $row->taluk,
            $row->gpname,
            $row->village,
            $row->pincode,
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
    
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->agent->countAll(),
        "recordsFiltered" => $this->agent->countFiltered($_POST),
        "data" => $data,
    );
    
    // Output to JSON format
    echo json_encode($output);
}

/* IP Catalog Manage function start*/
    //display page
    public function ipcatalogManage(){
        $data['thisPage'] = 'ipcatalogManage';
        $data['pgScript'] = 'ipcatalogManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Catalog';
        $this->load->datatable_template('superadmin/ipcatalogManage', $data);
    }

    //datatable integration
    function dtIpcatalogmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $ipcatalog = $this->ipcatalog->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($ipcatalog as $row){                
           
            $data[] = array(
            $i++, 
            $row->ip_name,        
            $row->sel_name,
            $row->p_type,
            $row->p_photo,
            $row->status_,
            $row->mrp,        
            $row->offer_name,
            $row->offer_amount,
            $row->total_price,
            $row->offer_amount_before,
            $row->selling_price,
            $row->sp,
            $row->bsp,
            $row->gst,
            $row->sp_a,
            $row->cgst_p,
            $row->cgst_amt,
            $row->sgst_p,
            $row->sgst_amt,
            $row->igst_p,
            $row->igst_amt
                  
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ipcatalog->countAll(),
            "recordsFiltered" => $this->ipcatalog->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
   
    public function ipindentManage(){
        $data['thisPage'] = 'ipindentManage';
        $data['pgScript'] = 'ipindentManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Indent'; 
        $this->load->datatable_template('superadmin/ipindentManage', $data);
    }
    function dtIpindentmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $ipindent = $this->ipindent->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($ipindent as $row){                
           
            $data[] = array(
                $i++, 
                $row->date_of,
                $row->supplier_name,
                $row->store,
                $row->product_name,
                $row->quantity,
                $row->measures,
                $row->rate,
                $row->app_value
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ipindent->countAll(),
            "recordsFiltered" => $this->ipindent->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
    public function ippurchaseManage(){
        $data['thisPage'] = 'ippurchaseManage';
        $data['pgScript'] = 'ippurchaseManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Purchase'; 
        $this->load->datatable_template('superadmin/ippurchaseManage', $data);
    }
    function dtIppurchasemanage(){
        $data = $row = array();
        
        // Fetch member's records
        $ippurchase = $this->ippurchase->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($ippurchase as $row){                
            
            $data[] = array(
                $i++,        
                $row->invoice_no,
                $row->invoice_photo,
                $row->store,
                $row->date_of,
                $row->entry_type,
                $row->purchase_type,
                $row->seller,
                $row-> phone ,
                $row->payment,
                $row->product_name,
                $row->store_name,
                $row->batch,
                $row->expiry_date,
                $row->unit_price,
                $row->quantity,
                $row->measures,
                $row->total_price,
                $row->gst,
                $row->gst_value,
                $row->stocks,
                $row->cgst,
                $row->cgst_amt,
                $row->sgst,
                $row->sgst_amt,
                $row->igst,
                $row->igst_amt,
                $row->tax_value,
                $row->total_value
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ippurchase->countAll(),
            "recordsFiltered" => $this->ippurchase->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function iptransferManage(){
        $data['thisPage'] = 'iptransferManage';
        $data['pgScript'] = 'iptransferManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Transfer'; 
        $this->load->datatable_template('superadmin/iptransferManage', $data);
    }
    function dtIptransfermanage(){
        $data = $row = array();
        
        // Fetch member's records
        $iptransfer = $this->iptransfer->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($iptransfer as $row){                
            
            $data[] = array(
                $i++,       
                $row->from_store,
                $row->to_store,
                $row->date_of,
                $row->product_name,
                $row->store,
                $row->quantity,
                $row->measures,  
                $row->total_price,
                $row->gst,
                $row->gst_value,
                $row->cgst,
                $row->cgst_amt,
                $row->sgst,
                $row->sgst_amt,
                $row->igst,
                $row->igst_amt,
                $row->tax_value,
                $row->total_value
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->iptransfer->countAll(),
            "recordsFiltered" => $this->iptransfer->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function ipsalesManage(){
        $data['thisPage'] = 'ipsalesManage';
        $data['pgScript'] = 'ipsalesManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Sales'; 
        $this->load->datatable_template('superadmin/ipsalesManage', $data);
    }
    function dtIpsalesmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $ipsales = $this->ipsales->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($ipsales as $row){                
           
            $data[] = array(
                $i++, 
                   
                $row->invoice_no, 
                $row->store,
                $row->date, 
                $row->sales_type,
                $row->types, 
                $row->phone_no,
                $row->payment_type,
                $row->product_name, 
                $row->stocks, 
                $row->quantity, 
                $row->measures, 
                $row->selling_price, 
                $row->offer_name, 
                $row->offer_amt, 
                $row->offer_percentage, 
                $row->total_price_before_offer, 
                $row->offer_amount, 
                $row->total_price, 
                $row->gst, 
                $row->cgst, 
                $row->cgst_amt, 
                $row->sgst, 
                $row->sgst_amt, 
                $row->igst, 
                $row->igst_amt, 
                $row->total_tax_value, 
                $row->total_value, 
                $row->round_off_tax,
                $row->total_sales_value
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ipsales->countAll(),
            "recordsFiltered" => $this->ipsales->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function ipreturnManage(){
        $data['thisPage'] = 'ipreturnManage';
        $data['pgScript'] = 'ipreturnManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Return'; 
        $this->load->datatable_template('superadmin/ipreturnManage', $data);
    }
    function dtIpreturnmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $ipreturn = $this->ipreturn->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($ipreturn as $row){                
            
            $data[] = array(
                $i++, 
                  
                $row->from_store,
                $row->supplier_name,
                $row->date_of,
                $row->product_name,
                $row->stocks,
                $row->quantity,
                $row->measures,  
                $row->total_price,
                $row->gst,
                $row->gst_value,
                $row->cgst,
                $row->cgst_amt,
                $row->sgst,
                $row->sgst_amt,
                $row->igst,
                $row->igst_amt,
                $row->tax_value,
                $row->transfer_value
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ipreturn->countAll(),
            "recordsFiltered" => $this->ipreturn->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function opcatalogManage(){
        $data['thisPage'] = 'opcatalogManage';
        $data['pgScript'] = 'opcatalogManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Output Catalog';
        $this->load->datatable_template('superadmin/opcatalogManage', $data);
    }
    
    //datatable integration
    function dtOpcatalogmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $opcatalog = $this->opcatalog->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($opcatalog as $row){                
           
            $data[] = array(
                $i++, 
                $row->product_name, 
                $row->product_type, 
                $row->p_photo,
                $row->status_, 
                $row->type_p, 
                $row->measures, 
                $row->selling_units,
                $row->size, 
                $row->grade, 
                $row->selling_price, 
                $row->gst, 
                $row->selling_price_before,
                $row->gst_amount, 
                $row->cgst, 
                $row->cgst_amt, 
                $row->sgst, 
                $row->sgst_amt, 
                $row->igst, 
                $row->igst_amt
             
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->opcatalog->countAll(),
            "recordsFiltered" => $this->opcatalog->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function oppurchaseManage(){
        $data['thisPage'] = 'oppurchaseManage';
        $data['pgScript'] = 'oppurchaseManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Output Purchase'; 
        $this->load->datatable_template('superadmin/oppurchaseManage', $data);
    }
    function dtOppurchasemanage(){
        $data = $row = array();
        
        // Fetch member's records
        $oppurchase = $this->oppurchase->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($oppurchase as $row){                
            
            $data[] = array(
                $i++,        
                $row->invoice_no,
                $row->date_of,
                $row->store,
                $row->entry_type,
                $row->purchase_type,
               $row->f_name,
               $row->phone,
               $row->payment,
               $row->product_name,
               $row->p_price,
               $row->batch,
               $row->expiry_date,
               $row->quantity,
               $row->measures,
               $row->total_price,
               $row->gst,
               $row->gst_value,
               $row->stocks,
               $row->cgst,
               $row->cgst_amt,
               $row->sgst,
               $row->sgst_amt,
               $row->igst,
               $row->igst_amt,
               $row->tax_value,
               $row->round_off,
               $row->purchase_value,
               $row->refered_by,
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->oppurchase->countAll(),
            "recordsFiltered" => $this->oppurchase->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function opsalesManage(){
        $data['thisPage'] = 'opsalesManage';
        $data['pgScript'] = 'opsalesManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Sales'; 
        $this->load->datatable_template('superadmin/opsalesManage', $data);
    }
    function dtOpsalesmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $opsales = $this->opsales->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($opsales as $row){                
            
            $data[] = array(
                $i++,        
                $row->to_org,
                $row->store,
                $row->sales_type,
                $row->customer,
                $row->phone,
                $row->payment,
                $row->date_of,
                $row->product_name,
                $row->batch,
                $row->quantity,
                $row->selling_price,
                $row->total_price,
                $row->expiry_date,
                $row->sgst_value,
                $row->cgst_value,
                $row->cgst_amt,
                $row->sgst,
                $row->sgst_amt,
                $row->igst,
                $row->igst_amt,
                $row->tax_value,
                $row->sales_value,
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->opsales->countAll(),
            "recordsFiltered" => $this->opsales->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    public function opreturnManage(){
        $data['thisPage'] = 'opreturnManage';
        $data['pgScript'] = 'opreturnManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Output Return'; 
        $this->load->datatable_template('superadmin/opreturnManage', $data);
    }
    function dtOpreturnmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $opreturn = $this->opreturn->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($opreturn as $row){                
            
            $data[] = array(
                $i++,        
                $row->store,
                $row->supplier_name,
                $row->date_of,
                $row->product_name,
                $row->stocks,
                $row->quantity,
                $row->measures,  
                $row->total_price,
                $row->gst,
                $row->gst_value,
                $row->cgst,
                $row->cgst_amt,
                $row->sgst,
                $row->sgst_amt,
                $row->igst,
                $row->igst_amt,
                $row->tax_value,
                $row->transfer_value
                
            );
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->opreturn->countAll(),
            "recordsFiltered" => $this->opreturn->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }    
}