<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class IpcatalogModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'ipcatalog';
        // Set orderable column fields
        $this->column_order = array('ip_name' ,'sel_name' ,'p_type','status_','p_photo' ,'mrp' ,
        'offer_name','offer_amount','selling_price',
        'sp' ,'gst' ,'sp_a' ,
        'cgst_p','cgst_amt' ,'sgst_p' ,'sgst_amt','igst_p','igst_amt');
        // Set searchable column fields
        $this->column_search = array('ip_name' ,'sel_name' ,'p_type','status_','p_photo' ,'mrp' ,
        'offer_name','offer_amount','selling_price',
        'sp','gst' ,'sp_a' ,
        'cgst_p','cgst_amt' ,'sgst_p' ,'sgst_amt','igst_p','igst_amt');

        // Set default order
        $this->order = array('ip_name' => 'asc');
        
    }    

    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->where(array('status'=>'1'));
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

       
    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData){
         
        $this->db->from($this->table);
 
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //Add Fpo
    function addIpcatalogentry(){
        if(isset($_FILES["p_photo"]["type"]))
        {
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["p_photo"]["name"]);
            $file_extension = end($temporary);

       
                    
            $sourcePath = $_FILES['p_photo']['tmp_name']; //Store source path in a variable
            $targetPath = "uploads/ip/" . $_FILES['p_photo']['name']; // The Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file
                // The Image Data
            $image = $_FILES['p_photo']['name'];

            $ip_name = $this->input->post('ip_name');
            $sel_name = $this->input->post('sel_name');
            $p_type = $this->input->post('p_type');
            $status_ = $this->input->post('status_');
            $mrp = $this->input->post('mrp');
            $offer_name = $this->input->post('offer_name');
            $offer_amount = $this->input->post('offer_amount');
            $selling_price = $this->input->post('selling_price');
            $sp = $this->input->post('sp');
            $gst = $this->input->post('gst');
            $sp_a = $this->input->post('sp_a');
            $cgst_p = $this->input->post('cgst_p');
            $cgst_amt = $this->input->post('cgst_amt');
            $sgst_p = $this->input->post('sgst_p');
            $sgst_amt = $this->input->post('sgst_amt');
            $igst_p = $this->input->post('igst_p');
            $igst_amt = $this->input->post('igst_amt');
       

            $datat=array('ip_name'=>$ip_name,'sel_name'=>$sel_name,'p_type'=>$p_type,
            'status_'=>$status_,'p_photo'=>$image,'mrp'=>$mrp, 'offer_name'=>$offer_name,
            'offer_amount'=>$offer_amount,
            'selling_price'=>$selling_price,
            'sp'=>$sp,'gst'=>$gst, 'sp_a'=>$sp_a, 
            'cgst_p'=>$cgst_p, 'cgst_amt'=>$cgst_amt, 'sgst_p'=>$sgst_p,'sgst_amt'=>$sgst_amt,
            'igst_p'=>$igst_p,'igst_amt'=>$igst_amt,
            'status'=>'1');

                // Insert the data
                $result = $this->db->insert('ipcatalog',$datat);

            if($result){
                $output['success'] = true;
                $output['messages'] = 'Successfully added!';  
            }
            else{
                $output['success'] = false;
                $output['messages'] = 'Ooops! something went wrong';
            }
            return $output;
                // }
            // }
        }        
    }

    //delete individual items
    function delIPC(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('ipcatalog',$data);
        if($result){
            $output['success'] = true;
            $output['messages'] = 'Successfully Deleted';
        }else{
            $output['success'] = false;
            $output['messages'] = 'Error while removing ipcatalog!';
        }

        return($output);
    }    
    //Edit Input Catalog
    function editIpcatalogentry(){
        if(isset($_FILES["edit_p_photo"]["type"]))
        {
            $validextensions = array("jpeg", "jpg", "png");

            $temporary = explode(".", $_FILES["edit_p_photo"]["name"]);
            $file_extension = end($temporary);
            $sourcePath = $_FILES['edit_p_photo']['tmp_name']; //Store source path in a variable
            $targetPath = "uploads/ip/" . $_FILES['edit_p_photo']['name']; // The Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file
                     
            // The Image Data
     
        if($_FILES["edit_p_photo"]["name"] != ""){


            $image2=$_FILES['edit_p_photo']['name'];
        }
        else
        {
            $image2= $this->input->post('newimg');
        }
        $ipcid = $this->input->post('ipcid');
        $edit_ip_name = $this->input->post('edit_ip_name');
        $edit_sel_name = $this->input->post('edit_sel_name');
        $edit_p_type = $this->input->post('edit_p_type');
        $edit_status_ = $this->input->post('edit_status_');
        $edit_mrp = $this->input->post('edit_mrp');
        $edit_offer_name = $this->input->post('edit_offer_name');
        $edit_offer_amount = $this->input->post('edit_offer_amount');
        $edit_selling_price = $this->input->post('edit_selling_price');
        $edit_sp = $this->input->post('edit_sp');
        $edit_gst = $this->input->post('edit_gst');
        $edit_sp_a = $this->input->post('edit_sp_a');
        $edit_cgst_p = $this->input->post('edit_cgst_p');
        $edit_cgst_amt = $this->input->post('edit_cgst_amt');
        $edit_sgst_p = $this->input->post('edit_sgst_p');
        $edit_sgst_amt = $this->input->post('edit_sgst_amt');
        $edit_igst_p = $this->input->post('edit_igst_p');
        $edit_igst_amt = $this->input->post('edit_igst_amt');
        
        
        $data=array('ip_name'=>$edit_ip_name,'sel_name'=>$edit_sel_name,'p_type'=>$edit_p_type,
        'status_'=>$edit_status_,
        'p_photo'=>$image2,'mrp'=>$edit_mrp,'offer_name'=>$edit_offer_name,
        'offer_amount'=>$edit_offer_amount,
        'selling_price'=>$edit_selling_price,
         'sp'=>$edit_sp, 
        'gst'=>$edit_gst, 'sp_a'=>$edit_sp_a, 'cgst_p'=>$edit_cgst_p, 'cgst_amt'=>$edit_cgst_amt, 
        'sgst_p'=>$edit_sgst_p,'sgst_amt'=>$edit_sgst_amt,'igst_p'=>$edit_igst_p,'igst_amt'=>$edit_igst_amt);


        $this->db->where('id',$ipcid);
        $result = $this->db->update('ipcatalog',$data);
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
}

