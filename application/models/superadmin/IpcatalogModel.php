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
        'sp' ,'gst' ,'sp_a' ,
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
            // $this->db->where(array('status'=>'1'));
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

   
}

