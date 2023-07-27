<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CeoController extends CI_Controller {
	public function __construct() {
        // if(empty($this->session->userdata('memlog')) || $this->session->userdata('role')!='CEO'){
        //     header('location:home');
        //     }
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ceo/UsercreationModel', 'usercreation');
        $this->load->model('LocationModel', 'location');
        $this->load->model('ceo/FpoModel', 'fpo');
        $this->load->model('superadmin/FpoModel', 'fpos');
        $this->load->model('ceo/ShareModel', 'share');
        $this->load->model('ceo/PromoModel', 'promo');
        $this->load->model('ceo/BdModel', 'bd');
        $this->load->model('ceo/AgentModel', 'agent');
        $this->load->model('ceo/IpcatalogModel', 'ipcatalog');
        $this->load->model('ceo/IpindentModel', 'ipindent');
        $this->load->model('ceo/IppurchaseModel', 'ippurchase');
        $this->load->model('ceo/IptransferModel', 'iptransfer');
        $this->load->model('ceo/IpsalesModel', 'ipsales');
        $this->load->model('ceo/IpreturnModel', 'ipreturn');
        $this->load->model('ceo/OpcatalogModel', 'opcatalog');
        $this->load->model('ceo/OppurchaseModel', 'oppurchase');
        $this->load->model('ceo/OpsalesModel', 'opsales');
        $this->load->model('ceo/OpreturnModel', 'opreturn');
    }

    
    //To Load The Dashboard Page
    public function index()
    {   
        $data['thisPage'] = 'ceo_dashboard';
        $data['pgScript'] = 'ceouserManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Dashboard';
        $this->load->datatable_template('ceo/ceo_dashboard', $data);
    }

    
    public function userentry()
    {   
        $data['thisPage'] = 'userentry';
        $data['pgScript'] = 'ceouserEntry';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'User Entry';
        $data['state'] = $this->location->getStates()->result();
        $this->load->formentry_template('ceo/userentry', $data);
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
    // function dtCeousermanage(){
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
    function dtCeousermanage(){
        $data=$this->usercreation->dtCeousermanage();
        echo json_encode($data);
    }

  
    

    public function fpomanage(){
        $data['thisPage'] = 'fpomanage';
        $data['pgScript'] = 'cfpoManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'FPO ';
        $this->load->datatable_template('ceo/fpo/fpomanage', $data);
    }

      //datatable integration
      function dtCfpomanage(){
        $data = $row = array();
        
        // Fetch member's records
        $fpo = $this->fpo->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($fpo as $row){                
           
            $data[] = array(
                $i++, 
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

/* SHAREHOLDER'S function starts*/

public function shareholderentry(){
    $data['thisPage'] = 'shareholderentry';
    $data['pgScript'] = 'cshareholderEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Shareholders Entry';
    $data['fponame'] = $this->share->getFponame()->result();
    $data['state'] = $this->location->getStates()->result(); 
    $this->load->formentry_template('ceo/shareholders/shareholderentry', $data);
}

function addShareentry(){
    $data=$this->share->addShareentry();
    echo json_encode($data);
}

public function shareholdersmanage(){
    $data['thisPage'] = 'shareholdersmanage';
    $data['pgScript'] = 'cshareholderManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Shareholders'; 
    $this->load->datatable_template('ceo/shareholders/shareholdersmanage', $data);
}
// function dtsharemanage(){
//     $data = $row = array();
    
//     // Fetch member's records
//     $share = $this->share->getRows($_POST);
    
//     $i = $_POST['start']+1;
//     foreach($share as $row){  
//         $actionButton = '
//           <ul class="list-inline">  
//             <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" href="shareholderedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
//             <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_share" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
//           </ul>';              
       
//         $data[] = array(
//             $i++, 
//             $actionButton,
//             $row->fpo,
//             $row->bod_date,
//             $row->salutations,
//             $row->f_name,
//             $row->m_name,
//             $row->l_name,
//             $row->gender,
//             $row->father_name,
//             $row->mother_name,
//             $row->contact_no,
//             $row->state,
//             $row->dist,
//             $row->taluk,
//             $row->gp,
//             $row->village,
//             $row->pin,
//             $row->address,
//             $row->adhar_no,
//             $row->voter_id,
//             $row->pan,
//             $row->dl,
//             $row->nominee_name,
//             $row->nominee_gender,
//             $row->nominee_dob,
//             $row->nominee_relation,
//             $row->nominee_address,
//             $row->share_value,
//             $row->share_alloted,
//             $row->allotment_date,
//             $row->register_no,
//             $row->share_no,
//             $row->share_distinctive_no,
//             $row->amount,
//             $row->date_of_payment,
//             $row->mode_of_payment,
//             $row->dd_date,
//             $row->dd_no,
//             $row->drawee_bank_name	,
//             $row->account_holder_name,
//             $row->account_no,
//             $row->bank_name,
//             $row->branch_address,
//             $row->ifsc   
//         );
//     }
    
//     $output = array(
//         "draw" => $_POST['draw'],
//         "recordsTotal" => $this->share->countAll(),
//         "recordsFiltered" => $this->share->countFiltered($_POST),
//         "data" => $data,
//     );
    
//     // Output to JSON format
//     echo json_encode($output);
// }

function dtsharemanage(){
    $data=$this->share->dtsharemanage();
    echo json_encode($data);
}

//Delete ipcatelogs
function delSHARE(){
    $data=$this->share->delSHARE();
    echo json_encode($data);
}
public function shareholderedit(){
    $data['thisPage'] = 'shareholderedit';
    $data['pgScript'] = 'cshareholderEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Shareholders Edit'; 
    $this->load->formentry_template('ceo/shareholders/shareholderedit', $data);
}
function editShareentry(){
    $data=$this->share->editShareentry();
    echo json_encode($data);
}



/*PROMOTERS function starts*/
 /* Promoters Entry function start*/
 public function promoentry(){
    $data['thisPage'] = 'promoentry';
    $data['pgScript'] = 'cpromoEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Promoters Entry';
    $data['shareno'] = $this->promo->getShareno()->result();
    $data['state'] = $this->location->getStates()->result(); 
    $this->load->formentry_template('ceo/promoters/promoentry', $data);
}

// Add Promoters
function addPromoentry(){
    $data=$this->promo->addPromoentry();
    echo json_encode($data);
}

/* Promoters Entry function ends*/
/* Promoters Manage function start*/
public function promomanage(){
    $data['thisPage'] = 'promomanage';
    $data['pgScript'] = 'cpromoManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Promoters ';
    $data['state'] = $this->location->getStates()->result(); 
    $this->load->datatable_template('ceo/promoters/promomanage', $data);
}

// //datatable integration
// function dtCpromomanage(){
//     $data = $row = array();
    
//     // Fetch member's records
//     $promo = $this->promo->getRows($_POST);
    
//     $i = $_POST['start']+1;
//     foreach($promo as $row){                
//         $actionButton = '
//           <ul class="list-inline">  
//             <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" href="promoedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
//             <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_promo" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
//           </ul>';
//         $data[] = array(
//             $i++,  
//             $actionButton,
//             $row->share_no,
//             $row->first_name,
//             $row->m_name,
//             $row->l_name,
//             $row->dob,
//             $row->education,
//             $row->contact,
//             $row->state,
//             $row->dist,
//             $row->taluk,
//             $row->gp,
//             $row->village,
//             $row->pin,
//             $row->adhar,
//             $row->pan,
//             $row->voter,
//             $row->dl,
//             $row->rationcard,
//             $row->passportno,
//             $row->files
            
           
            
//         );
//     }
    
//     $output = array(
//         "draw" => $_POST['draw'],
//         "recordsTotal" => $this->promo->countAll(),
//         "recordsFiltered" => $this->promo->countFiltered($_POST),
//         "data" => $data,
//     );
    
//     // Output to JSON format
//     echo json_encode($output);
// }

function dtCpromomanage(){
    $data=$this->promo->dtCpromomanage();
    echo json_encode($data);
}
public function promoedit(){
    $data['thisPage'] = 'promoedit';
    $data['pgScript'] = 'cpromoEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Promoters Edit';
    $this->load->formentry_template('ceo/promoters/promoedit', $data);
}
//
function editPromoentry(){
    $data=$this->promo->editPromoentry();
    echo json_encode($data);
}
//Delete Promoters
function delPROMO(){
    $data=$this->promo->delPROMO();
    echo json_encode($data);
}

/*Directors Controller functions starts*/
    /* Directors Entry function start*/
    public function bdentry(){
        $data['thisPage'] = 'bdentry';
        $data['pgScript'] = 'cbdEntry';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Board Of Directors Entry';
        $data['shareno'] = $this->bd->getShareno()->result();
        $data['state'] = $this->location->getStates()->result(); 
        $this->load->formentry_template('ceo/directors/bdentry', $data);
    }

    // Add Directors
    function addBdentry(){
        $data=$this->bd->addBdentry();
        echo json_encode($data);
    }
    
/* Directors Entry function ends*/
/* Directors Manage function start*/
    //display page
    public function bdmanage(){
        $data['thisPage'] = 'bdmanage';
        $data['pgScript'] = 'cbdManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Directors ';
        $this->load->datatable_template('ceo/directors/bdmanage', $data);
    }

    // //datatable integration
    // function dtCbdmanage(){
    //     $data = $row = array();
        
    //     // Fetch member's records
    //     $bd = $this->bd->getRows($_POST);
        
    //     $i = $_POST['start']+1;
    //     foreach($bd as $row){                
    //         $actionButton = '
    //           <ul class="list-inline">  
    //             <li class="list-inline-item"><a class="btn text-info btn-xs" role="button"
    //              href="bdedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
    //             <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" 
    //             role="button" id="delete_bd" data-id="'.$row->id.'" data-toggle="tooltip"
    //              title="Delete Member"> <span class="fa fa-trash"></span></a></li>
    //           </ul>';
    //         $data[] = array(
    //             $i++, 
    //             $actionButton,
    //             $row->share_no,
    //             $row->f_name,
    //             $row->m_name,
    //             $row->l_name,
    //             $row->designation,
    //             $row->dob,
    //             $row->education,
    //             $row->contact,
    //             $row->state,
    //             $row->district,
    //             $row->taluk,
    //             $row->gpname,
    //             $row->village,
    //             $row->pincode,
    //             $row->directorno,
    //             $row->adhar,
    //             $row->pan,
    //             $row->voter,
    //             $row->dl,
    //             $row->rationcard,
    //             $row->passportno,
    //             $row->files
                
              
                
    //         );
    //     }
        
    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->bd->countAll(),
    //         "recordsFiltered" => $this->bd->countFiltered($_POST),
    //         "data" => $data,
    //     );
        
    //     // Output to JSON format
    //     echo json_encode($output);
    // }

    function dtCbdmanage(){
        $data=$this->bd->dtCbdmanage();
        echo json_encode($data);
    }
    
    public function bdedit(){
        $data['thisPage'] = 'bdedit';
        $data['pgScript'] = 'cbdEdit';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Directors Edit';
        $this->load->formentry_template('ceo/directors/bdedit', $data);
    }
    //
    function editBdentry(){
        $data=$this->bd->editBdentry();
        echo json_encode($data);
    }
    //Delete Directors
    function delBD(){
        $data=$this->bd->delBD();
        echo json_encode($data);
    }
/* Directors Manage function ends*/


/*Agents Controller functions starts*/
    /* Agents Entry function start*/
    public function agententry(){
        $data['thisPage'] = 'agententry';
        $data['pgScript'] = 'cagentEntry';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Agents Entry';
        $data['state'] = $this->location->getStates()->result(); 
        $this->load->formentry_template('ceo/agents/agententry', $data);
    }

    // Add Agents
function addAgententry(){
    $data=$this->agent->addAgententry();
    echo json_encode($data);
}
/* Agents Entry function ends*/

/* Agents Manage function start*/
    //display page
    public function agentmanage(){
        $data['thisPage'] = 'agentmanage';
        $data['pgScript'] = 'cagentManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Agents';
        $this->load->datatable_template('ceo/agents/agentmanage', $data);
    }

 //datatable integration
//  function dtCagentmanage(){
//     $data = $row = array();
    
//     // Fetch member's records
//     $agent = $this->agent->getRows($_POST);
    
//     $i = $_POST['start']+1;
//     foreach($agent as $row){                
//         $actionButton = '
//           <ul class="list-inline">  
//             <li class="list-inline-item"><a class="btn text-info btn-xs" 
//             role="button" href="agentedit?id='.$row->id.'"> 
//             <span class="fa fa-edit"></span></a></li>
//             <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" id="delete_agent" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
            
//             </ul>';
//         $data[] = array(
//             $i++, 
//             $actionButton,
//             $row->a_name,
//             $row->state,
//             $row->district,
//             $row->taluk,
//             $row->gpname,
//             $row->village,
//             $row->pincode,
//             $row->org_name,
//             $row->cin,
//             $row->adhar,
//             $row->pan,
//             $row->gst,
//             $row->ag_date,
//             $row->validity,
//             $row->contact_no,
//             $row->email,
//             $row->files,
//             $row->credit_period,
//             $row->credit_limit,
//             $row->address,
//             $row->status_
           
           
            
//         );
//     }
    
//     $output = array(
//         "draw" => $_POST['draw'],
//         "recordsTotal" => $this->agent->countAll(),
//         "recordsFiltered" => $this->agent->countFiltered($_POST),
//         "data" => $data,
//     );
    
//     // Output to JSON format
//     echo json_encode($output);
// }

function dtCagentmanage(){
    $data=$this->agent->dtCagentmanage();
    echo json_encode($data);
}

public function agentedit(){
    $data['thisPage'] = 'agentedit';
    $data['pgScript'] = 'cagentEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Agents Edit';
    $this->load->formentry_template('ceo/agents/agentedit', $data);
}
//
function editAgententry(){
    $data=$this->agent->editAgententry();
    echo json_encode($data);
}
//Delete Agents
function delAGENT(){
    $data=$this->agent->delAGENT();
    echo json_encode($data);
}



/*IP Catalog Controller functions starts*/
    /* IP Catalog Entry function start*/
    public function ipcatalogentry(){
        $data['thisPage'] = 'ipcatalogentry';
        $data['pgScript'] = 'cipcatalogEntry';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Catalog Entry'; 
        $this->load->formentry_template('ceo/ipcatalog/ipcatalogentry', $data);
    }
    function addIpcatalogentry(){
        $data=$this->ipcatalog->addIpcatalogentry();
        echo json_encode($data);
    }
    /* IP Catalog Entry function ends*/
    /* IP Catalog Manage function start*/
    //display page
    public function ipcatalogmanage(){
        $data['thisPage'] = 'ipcatalogmanage';
        $data['pgScript'] = 'cipcatalogManage';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Catalog';
        $this->load->datatable_template('ceo/ipcatalog/ipcatalogmanage', $data);
    }

    //datatable integration
    function dtCipcatalogmanage(){
        $data = $row = array();
        
        // Fetch member's records
        $ipcatalog = $this->ipcatalog->getRows($_POST);
        
        $i = $_POST['start']+1;
        foreach($ipcatalog as $row){                
            $actionButton = '
              <ul class="list-inline">  
                <li class="list-inline-item">
                <a class="btn text-info btn-xs" role="button" href="ipcatalogedit?id='.$row->id.'">
                 <span class="fa fa-edit"></span></a></li>
                <li class="list-inline-item d-print-none">
                <a class="btn text-red btn-xs" role="button" id="delete_ipcatalog" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
              </ul>';
            $data[] = array(
                $i++, 
                $actionButton,
     
            $row->ip_name,        
            $row->sel_name,
            $row->p_type,
            $row->p_photo,
            $row->status_,
            $row->mrp,        
            $row->offer_name,
            $row->offer_amount,
            $row->selling_price,
            $row->sp,
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
   

    //Delete IP Catalog
    function delIPC(){
        $data=$this->ipcatalog->delIPC();
        echo json_encode($data);
    }
    
    public function ipcatalogedit(){
        $data['thisPage'] = 'ipcatalogedit';
        $data['pgScript'] = 'cipcatalogEdit';
        $data['thisPageLevel'] = '1';   
        $data['thisPageMain']="";
        $data['title'] = 'Input Catalog Edit';
        $this->load->formentry_template('ceo/ipcatalog/ipcatalogedit', $data);
    }
    function editIpcatalogentry(){
        $data=$this->ipcatalog->editIpcatalogentry();
        echo json_encode($data);
    }
    /* IP Catalog Manage function ends*/

    /* FOR UI*/
public function ipindententry(){
    $data['thisPage'] = 'ipindententry';
    $data['pgScript'] = 'cipindentEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Indent Entry'; 
    $this->load->formentry_template('ceo/ipindent/ipindententry', $data);
}

function addIndententry(){
    $data=$this->ipindent->addIndententry();
    echo json_encode($data);
}

public function ipindentmanage(){
    $data['thisPage'] = 'ipindentmanage';
    $data['pgScript'] = 'cipindentManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Indent'; 
    $this->load->datatable_template('ceo/ipindent/ipindentmanage', $data);
}
function dtCipindentmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $ipindent = $this->ipindent->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($ipindent as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
            href="ipindentedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button"
             id="delete_ipindent" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,
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

public function ipindentedit(){
    $data['thisPage'] = 'ipindentedit';
    $data['pgScript'] = 'cipindentEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Indent Edit';
    $this->load->formentry_template('ceo/ipindent/ipindentedit', $data);
}
function editIpindententry(){
    $data=$this->ipindent->editIpindententry();
    echo json_encode($data);
}

function delINDENT(){
    $data=$this->ipindent->delINDENT();
    echo json_encode($data);
}

public function ippurchaseentry(){
    $data['thisPage'] = 'ippurchaseentry';
    $data['pgScript'] = 'cippurchaseEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Purchase Entry'; 
    $this->load->formentry_template('ceo/ippurchase/ippurchaseentry', $data);
}

function addPurchaseentry(){
    $data=$this->ippurchase->addPurchaseentry();
    echo json_encode($data);
}

public function ippurchasemanage(){
    $data['thisPage'] = 'ippurchasemanage';
    $data['pgScript'] = 'cippurchaseManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Purchase'; 
    $this->load->datatable_template('ceo/ippurchase/ippurchasemanage', $data);
}
function dtCippurchasemanage(){
    $data = $row = array();
    
    // Fetch member's records
    $ippurchase = $this->ippurchase->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($ippurchase as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
            href="ippurchaseedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button"
             id="delete_ippurchase" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> 
             <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
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

public function ippurchaseedit(){
    $data['thisPage'] = 'ippurchaseedit';
    $data['pgScript'] = 'cippurchaseEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Purchase Edit';
    $this->load->formentry_template('ceo/ippurchase/ippurchaseedit', $data);
}
function editPurchaseentry(){
    $data=$this->ippurchase->editPurchaseentry();
    echo json_encode($data);
}


function delPURCHASE(){
    $data=$this->ippurchase->delPURCHASE();
    echo json_encode($data);
}

public function iptransferentry(){
    $data['thisPage'] = 'iptransferentry';
    $data['pgScript'] = 'ciptransferEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input transfer Entry'; 
    $this->load->formentry_template('ceo/iptransfer/iptransferentry', $data);
}

function addTransferentry(){
    $data=$this->iptransfer->addTransferentry();
    echo json_encode($data);
}

public function iptransfermanage(){
    $data['thisPage'] = 'iptransfermanage';
    $data['pgScript'] = 'ciptransferManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Transfer'; 
    $this->load->datatable_template('ceo/iptransfer/iptransfermanage', $data);
}
function dtCiptransfermanage(){
    $data = $row = array();
    
    // Fetch member's records
    $iptransfer = $this->iptransfer->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($iptransfer as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
            href="iptransferedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button"
             id="delete_iptransfer" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
            $row->from_store,
            $row->to_store,
            $row->date_of,
            $row->product_name,
            $row->store,
            $row->quantity,
            $row->measures,  
            $row->total_price,
            $row->gst,
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

public function iptransferedit(){
    $data['thisPage'] = 'iptransferedit';
    $data['pgScript'] = 'ciptransferEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Transfer Edit';
    $this->load->formentry_template('ceo/iptransfer/iptransferedit', $data);
}
function editTransferentry(){
    $data=$this->iptransfer->editTransferentry();
    echo json_encode($data);
}

function delTRANSFER(){
    $data=$this->iptransfer->delTRANSFER();
    echo json_encode($data);
}

public function ipsalesentry(){
    $data['thisPage'] = 'ipsalesentry';
    $data['pgScript'] = 'cipsalesEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Sales Entry'; 
    $this->load->formentry_template('ceo/ipsales/ipsalesentry', $data);
}

function addSalesentry(){
    $data=$this->ipsales->addSalesentry();
    echo json_encode($data);
}

public function ipsalesmanage(){
    $data['thisPage'] = 'ipsalesmanage';
    $data['pgScript'] = 'cipsalesManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Sales'; 
    $this->load->datatable_template('ceo/ipsales/ipsalesmanage', $data);
}
function dtCipsalesmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $ipsales = $this->ipsales->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($ipsales as $row){                
        $actionButton = '
        <ul class="list-inline">  
        <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
        href="ipsalesedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
        <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" 
        id="delete_ipsales" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
      </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
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


public function ipsalesedit(){
    $data['thisPage'] = 'ipsalesedit';
    $data['pgScript'] = 'cipsalesEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Sales Edit';
    $this->load->formentry_template('ceo/ipsales/ipsalesedit', $data);
}
function editSalesentry(){
    $data=$this->ipsales->editSalesentry();
    echo json_encode($data);
}

function delSALES(){
    $data=$this->ipsales->delSALES();
    echo json_encode($data);
}


public function ipreturnentry(){
    $data['thisPage'] = 'ipreturnentry';
    $data['pgScript'] = 'cipreturnEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Return Entry'; 
    $this->load->formentry_template('ceo/ipreturn/ipreturnentry', $data);
}

function addReturnentry(){
    $data=$this->ipreturn->addReturnentry();
    echo json_encode($data);
}

public function ipreturnmanage(){
    $data['thisPage'] = 'ipreturnmanage';
    $data['pgScript'] = 'cipreturnManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Return'; 
    $this->load->datatable_template('ceo/ipreturn/ipreturnmanage', $data);
}
function dtCipreturnmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $ipreturn = $this->ipreturn->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($ipreturn as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
            href="ipreturnedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button"
             id="delete_ipreturn" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
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

public function ipreturnedit(){
    $data['thisPage'] = 'ipreturnedit';
    $data['pgScript'] = 'cipreturnEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Return Edit';
    $this->load->formentry_template('ceo/ipreturn/ipreturnedit', $data);
}
function editReturnentry(){
    $data=$this->ipreturn->editReturnentry();
    echo json_encode($data);
}

function delRETURN(){
    $data=$this->ipreturn->delReturn();
    echo json_encode($data);
}

public function opcatalogentry(){
    $data['thisPage'] = 'opcatalogentry';
    $data['pgScript'] = 'copcatalogEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Catalog Entry'; 
    $this->load->formentry_template('ceo/opcatalog/opcatalogentry', $data);
}
function addOpcatalogentry(){
    $data=$this->opcatalog->addOpcatalogentry();
    echo json_encode($data);
}
/* OP Catalog Manage function start*/
//display page
public function opcatalogmanage(){
    $data['thisPage'] = 'opcatalogmanage';
    $data['pgScript'] = 'copcatalogManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Catalog';
    $this->load->datatable_template('ceo/opcatalog/opcatalogmanage', $data);
}

//datatable integration
function dtCopcatalogmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $opcatalog = $this->opcatalog->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($opcatalog as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item">
            <a class="btn text-info btn-xs" role="button" href="opcatalogedit?id='.$row->id.'">
             <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none">
            <a class="btn text-red btn-xs" role="button" id="delete_opcatalog" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,
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


//Delete IP Catalog
function delOPC(){
    $data=$this->opcatalog->delOPC();
    echo json_encode($data);
}

public function opcatalogedit(){
    $data['thisPage'] = 'opcatalogedit';
    $data['pgScript'] = 'copcatalogEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Catalog Edit';
    $this->load->formentry_template('ceo/opcatalog/opcatalogedit', $data);
}
function editOpcatalogentry(){
    $data=$this->opcatalog->editOpcatalogentry();
    echo json_encode($data);
}

public function oppurchaseentry(){
    $data['thisPage'] = 'oppurchaseentry';
    $data['pgScript'] = 'coppurchaseEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Purchase Entry'; 
    $this->load->formentry_template('ceo/oppurchase/oppurchaseentry', $data);
}

function addOppurchaseentry(){
    $data=$this->oppurchase->addOppurchaseentry();
    echo json_encode($data);
}

public function oppurchasemanage(){
    $data['thisPage'] = 'oppurchasemanage';
    $data['pgScript'] = 'coppurchaseManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Purchase'; 
    $this->load->datatable_template('ceo/oppurchase/oppurchasemanage', $data);
}
function dtCoppurchasemanage(){
    $data = $row = array();
    
    // Fetch member's records
    $oppurchase = $this->oppurchase->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($oppurchase as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
            href="oppurchaseedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button"
             id="delete_oppurchase" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> 
             <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
           
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

public function oppurchaseedit(){
    $data['thisPage'] = 'oppurchaseedit';
    $data['pgScript'] = 'coppurchaseEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Purchase Edit';
    $this->load->formentry_template('ceo/oppurchase/oppurchaseedit', $data);
}
function editOppurchaseentry(){
    $data=$this->oppurchase->editOppurchaseentry();
    echo json_encode($data);
}


function delOPP(){
    $data=$this->oppurchase->delOPP();
    echo json_encode($data);
}


public function opsalesentry(){
    $data['thisPage'] = 'opsalesentry';
    $data['pgScript'] = 'copsalesEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Sales Entry'; 
    $this->load->formentry_template('ceo/opsales/opsalesentry', $data);
}

function addOpsalesentry(){
    $data=$this->opsales->addOpsalesentry();
    echo json_encode($data);
}

public function opsalesmanage(){
    $data['thisPage'] = 'opsalesmanage';
    $data['pgScript'] = 'copsalesManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Input Sales'; 
    $this->load->datatable_template('ceo/opsales/opsalesmanage', $data);
}
function dtCopsalesmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $opsales = $this->opsales->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($opsales as $row){                
        $actionButton = '
        <ul class="list-inline">  
        <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
        href="opsalesedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
        <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button" 
        id="delete_opsales" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
      </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
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


public function opsalesedit(){
    $data['thisPage'] = 'opsalesedit';
    $data['pgScript'] = 'copsalesEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Sales Edit';
    $this->load->formentry_template('ceo/opsales/opsalesedit', $data);
}
function editOpsalesentry(){
    $data=$this->opsales->editOpsalesentry();
    echo json_encode($data);
}

function delOPS(){
    $data=$this->opsales->delOPS();
    echo json_encode($data);
}



public function opreturnentry(){
    $data['thisPage'] = 'opreturnentry';
    $data['pgScript'] = 'copreturnEntry';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Return Entry'; 
    $this->load->formentry_template('ceo/opreturn/opreturnentry', $data);
}

function addOpreturnentry(){
    $data=$this->opreturn->addOpreturnentry();
    echo json_encode($data);
}

public function opreturnmanage(){
    $data['thisPage'] = 'opreturnmanage';
    $data['pgScript'] = 'copreturnManage';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Return'; 
    $this->load->datatable_template('ceo/opreturn/opreturnmanage', $data);
}
function dtCopreturnmanage(){
    $data = $row = array();
    
    // Fetch member's records
    $opreturn = $this->opreturn->getRows($_POST);
    
    $i = $_POST['start']+1;
    foreach($opreturn as $row){                
        $actionButton = '
          <ul class="list-inline">  
            <li class="list-inline-item"><a class="btn text-info btn-xs" role="button" 
            href="opreturnedit?id='.$row->id.'"> <span class="fa fa-edit"></span></a></li>
            <li class="list-inline-item d-print-none"><a class="btn text-red btn-xs" role="button"
             id="delete_opreturn" data-id="'.$row->id.'" data-toggle="tooltip" title="Delete Member"> <span class="fa fa-trash"></span></a></li>
          </ul>';
        $data[] = array(
            $i++, 
            $actionButton,       
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

public function opreturnedit(){
    $data['thisPage'] = 'opreturnedit';
    $data['pgScript'] = 'copreturnEdit';
    $data['thisPageLevel'] = '1';   
    $data['thisPageMain']="";
    $data['title'] = 'Output Return Edit';
    $this->load->formentry_template('ceo/opreturn/opreturnedit', $data);
}
function editOpreturnentry(){
    $data=$this->opreturn->editOpreturnentry();
    echo json_encode($data);
}

function delOPR(){
    $data=$this->opreturn->delOPR();
    echo json_encode($data);
}

}