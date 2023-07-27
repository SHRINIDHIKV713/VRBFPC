<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class IptransferModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'iptransfer';
        // Set orderable column fields
        $this->column_order = array(
        'date_of','from_store','to_store',
        'product_name','store','quantity','measures',
        'total_price','gst','cgst','cgst_amt','sgst','sgst_amt','igst','igst_amt',
        'tax_value','total_value' );

        // Set searchable column fields
        $this->column_search = array(
            'date_of','from_store','to_store',
        'product_name','store','quantity','measures',
        'total_price','gst' ,'cgst','cgst_amt','sgst','sgst_amt','igst','igst_amt',
        'tax_value','total_value'
        );

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

   
    function addTransferentry(){
        $date_of = $this->input->post('date_of');
        $from_store = $this->input->post('from_store');
        $to_store = $this->input->post('to_store');
        $product_name = $this->input->post('product_name');
        $store = $this->input->post('store');
        $quantity = $this->input->post('quantity');
        $measures = $this->input->post('measures');
        $total_price = $this->input->post('total_price');
        $gst = $this->input->post('gst');
       
        $cgst = $this->input->post('cgst');
        $cgst_amt = $this->input->post('cgst_amt');
        $sgst = $this->input->post('sgst');
        $sgst_amt = $this->input->post('sgst_amt');
        $igst = $this->input->post('igst');
        $igst_amt = $this->input->post('igst_amt');
        $tax_value = $this->input->post('tax_value');
        $total_value = $this->input->post('total_value');

        $datat=array('date_of'=>$date_of,'from_store'=>$from_store,'to_store'=>$to_store,
        'product_name'=>$product_name,'store'=>$store,
        'quantity'=>$quantity,'measures'=>$measures,
        'total_price'=>$total_price,'gst'=>$gst ,
        'cgst'=>$cgst,'cgst_amt'=>$cgst_amt,'sgst'=>$sgst,'sgst_amt'=>$sgst_amt,'igst'=>$igst,'igst_amt'=>$igst_amt,
        'tax_value'=>$tax_value,'total_value'=>$total_value,
        'status'=>'1');

            // Insert the data
            $result = $this->db->insert('iptransfer',$datat);

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
    function editTransferentry(){
        $iptid = $this->input->post('iptid');
        $edit_date_of = $this->input->post('edit_date_of');
        $edit_from_store = $this->input->post('edit_from_store');
        $edit_to_store = $this->input->post('edit_to_store');
        $edit_product_name = $this->input->post('edit_product_name');
        $edit_store = $this->input->post('edit_store');
        $edit_quantity = $this->input->post('edit_quantity');
        $edit_measures = $this->input->post('edit_measures');
        $edit_total_price = $this->input->post('edit_total_price');
        $edit_gst = $this->input->post('edit_gst');
        $edit_cgst = $this->input->post('edit_cgst');
        $edit_cgst_amt = $this->input->post('edit_cgst_amt');
        $edit_sgst = $this->input->post('edit_sgst');
        $edit_sgst_amt = $this->input->post('edit_sgst_amt');
        $edit_igst = $this->input->post('edit_igst');
        $edit_igst_amt = $this->input->post('edit_igst_amt');
        $edit_tax_value = $this->input->post('edit_tax_value');
        $edit_total_value = $this->input->post('edit_total_value');

        $datat=array('date_of'=>$edit_date_of,'from_store'=>$edit_from_store,'to_store'=>$edit_to_store,
        'product_name'=>$edit_product_name,'store'=>$edit_store,
        'quantity'=>$edit_quantity,'measures'=>$edit_measures,
        'total_price'=>$edit_total_price,'gst'=>$edit_gst ,
        'cgst'=>$edit_cgst,'cgst_amt'=>$edit_cgst_amt,'sgst'=>$edit_sgst,'sgst_amt'=>$edit_sgst_amt,'igst'=>$edit_igst,'igst_amt'=>$edit_igst_amt,
        'tax_value'=>$edit_tax_value,'total_value'=>$edit_total_value,
        'status'=>'1');

            // Insert the data
            $this->db->where('id',$iptid);
            $result = $this->db->update('iptransfer',$datat);

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
     function delTRANSFER(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('iptransfer',$data);
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