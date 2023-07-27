

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
/*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
           
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




