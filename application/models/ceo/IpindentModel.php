<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class IpindentModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'ipindent';
        // Set orderable column fields
        $this->column_order = array('date_of','supplier_name','store','product_name', 'quantity', 'measures', 'rate', 'app_value');
        // Set searchable column fields
        $this->column_search = array('date_of','supplier_name','store','product_name', 'quantity', 'measures', 'rate', 'app_value');

        // Set default order
        $this->order = array('date_of' => 'asc');
        
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


    function addIndententry(){
        $date_of = $this->input->post('date_of');
        $supplier_name = $this->input->post('supplier_name');
        $store = $this->input->post('store');
        $product_name = $this->input->post('product_name');
        $quantity = $this->input->post('quantity');
        $measures = $this->input->post('measures');
        $rate = $this->input->post('rate');
        $app_value = $this->input->post('app_value');

        $datat=array('date_of'=>$date_of,'supplier_name'=>$supplier_name,'store'=>$store,
        'product_name'=>$product_name,'quantity'=>$quantity,'measures'=>$measures,'rate'=>$rate,
        'app_value'=>$app_value,
        'status'=>'1');

            // Insert the data
            $result = $this->db->insert('ipindent',$datat);

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

    function editIpindententry(){
        $ipid = $this->input->post('ipid');
        $edit_date_of = $this->input->post('edit_date_of');
        $edit_supplier_name = $this->input->post('edit_supplier_name');
        $edit_store = $this->input->post('edit_store');
        $edit_product_name = $this->input->post('edit_product_name');
        $edit_quantity = $this->input->post('edit_quantity');
        $edit_measures = $this->input->post('edit_measures');
        $edit_rate = $this->input->post('edit_rate');
        $edit_app_value = $this->input->post('edit_app_value');

        $datat=array('date_of'=>$edit_date_of,'supplier_name'=>$edit_supplier_name,'store'=>$edit_store,
        'product_name'=>$edit_product_name,'quantity'=>$edit_quantity,'measures'=>$edit_measures,
        'rate'=>$edit_rate,
        'app_value'=>$edit_app_value,
        'status'=>'1');

            // Insert the data
            $this->db->where('id',$ipid);
            $result = $this->db->update('ipindent',$datat);

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

    //delete individual items
    function delINDENT(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('ipindent',$data);
        if($result){
            $output['success'] = true;
            $output['messages'] = 'Successfully Deleted';
        }else{
            $output['success'] = false;
            $output['messages'] = 'Error while removing fpo!';
        }

        return($output);
    }    

}