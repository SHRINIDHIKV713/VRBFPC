<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class OpsalesModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'opsales';
        // Set orderable column fields
        $this->column_order = array(
            'to_org', 'store', 'sales_type', 'b_name', 'p_no', 'p_date', 'customer', 'phone', 'payment', 
            'date_of', 'product_name', 'batch', 'quantity', 'selling_price', 'total_price', 
            'expiry_date', 'sgst_value',
             'cgst_value', 'cgst_amt', 'sgst', 'sgst_amt', 'igst', 'igst_amt', 'tax_value', 
             'sales_value' );

        // Set searchable column fields
        $this->column_search = array(
            'to_org', 'store', 'sales_type', 'b_name', 'p_no', 'p_date', 'customer', 'phone', 'payment', 
            'date_of', 'product_name', 'batch', 'quantity', 'selling_price', 'total_price', 
            'expiry_date', 'sgst_value',
             'cgst_value', 'cgst_amt', 'sgst', 'sgst_amt', 'igst', 'igst_amt', 'tax_value', 
             'sales_value'
        );

        // Set default order
        $this->order = array('to_org' => 'asc');
        
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
   

   
    function addOpsalesentry(){
        $to_org = $this->input->post('to_org');
        $store = $this->input->post('store'); 
        $sales_type = $this->input->post('sales_type');
        $b_name = $this->input->post('b_name');
        $p_no = $this->input->post('p_no');
        $p_date = $this->input->post('p_date');
        $customer = $this->input->post('customer');
        $phone = $this->input->post('phone');
        $payment = $this->input->post('payment');
        $date_of = $this->input->post('date_of');
        $product_name = $this->input->post('product_name');
        $batch = $this->input->post('batch');
        $quantity = $this->input->post('quantity');
        $selling_price = $this->input->post('selling_price');
        $total_price = $this->input->post('total_price');
        $expiry_date = $this->input->post('expiry_date');
        $sgst_value = $this->input->post('sgst_value');
        $cgst_value = $this->input->post('cgst_value');
        $cgst_amt = $this->input->post('cgst_amt');
        $sgst = $this->input->post('sgst');
        $sgst_amt = $this->input->post('sgst_amt');
        $igst = $this->input->post('igst');
        $igst_amt = $this->input->post('igst_amt');
        $tax_value = $this->input->post('tax_value');
        $sales_value = $this->input->post('sales_value');


        $datat=array( 'to_org'=> $to_org, 'store'=> $store, 'sales_type'=>$sales_type, 
        'b_name'=>$b_name,
         'p_no'=> $p_no, 'p_date'=>$p_date,
         'customer'=>$customer, 'phone'=>$phone, 'payment'=>$payment, 
        'date_of'=>$date_of, 'product_name'=>$product_name, 'batch'=>$batch, 'quantity'=>$quantity, 
        'selling_price'=>$selling_price, 
        'total_price'=>$total_price, 
        'expiry_date'=>$expiry_date, 'sgst_value'=>$sgst_value,
         'cgst_value'=>$cgst_value, 'cgst_amt'=>$cgst_amt, 'sgst'=>$sgst, 'sgst_amt'=>$sgst_amt, 
         'igst'=>$igst, 'igst_amt'=>$igst_amt, 'tax_value'=>$tax_value, 
         'sales_value'=>$sales_value,
        'status'=>'1');

            // Insert the data
            $result = $this->db->insert('opsales',$datat);

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

    function editOpsalesentry(){
        $opsid = $this->input->post('opsid');
        $edit_to_org = $this->input->post('edit_to_org');
        $edit_store = $this->input->post('edit_store'); 
        $edit_sales_type = $this->input->post('edit_sales_type');
        $edit_b_name = $this->input->post('edit_b_name');
        $edit_p_no = $this->input->post('edit_p_no');
        $edit_p_date = $this->input->post('edit_p_date');
        $edit_customer = $this->input->post('edit_customer');
        $edit_phone = $this->input->post('edit_phone');
        $edit_payment = $this->input->post('edit_payment');
        $edit_date_of = $this->input->post('edit_date_of');
        $edit_product_name = $this->input->post('edit_product_name');
        $edit_batch = $this->input->post('edit_batch');
        $edit_quantity = $this->input->post('edit_quantity');
        $edit_selling_price = $this->input->post('edit_selling_price');
        $edit_total_price = $this->input->post('edit_total_price');
        $edit_expiry_date = $this->input->post('edit_expiry_date');
        $edit_sgst_value = $this->input->post('edit_sgst_value');
        $edit_cgst_value = $this->input->post('edit_cgst_value');
        $edit_cgst_amt = $this->input->post('edit_cgst_amt');
        $edit_sgst = $this->input->post('edit_sgst');
        $edit_sgst_amt = $this->input->post('edit_sgst_amt');
        $edit_igst = $this->input->post('edit_igst');
        $edit_igst_amt = $this->input->post('edit_igst_amt');
        $edit_tax_value = $this->input->post('edit_tax_value');
        $edit_sales_value = $this->input->post('edit_sales_value');
        

        $datat=array(
            'to_org'=> $edit_to_org, 'store'=> $edit_store, 'sales_type'=>$edit_sales_type, 
        'b_name'=>$edit_b_name,
         'p_no'=> $edit_p_no, 'p_date'=>$edit_p_date,
         'customer'=>$edit_customer, 'phone'=>$edit_phone, 'payment'=>$edit_payment, 
        'date_of'=>$edit_date_of, 'product_name'=>$edit_product_name, 'batch'=>$edit_batch, 'quantity'=>$edit_quantity, 
        'selling_price'=>$edit_selling_price, 
        'total_price'=>$edit_total_price, 
        'expiry_date'=>$edit_expiry_date, 'sgst_value'=>$edit_sgst_value,
         'cgst_value'=>$edit_cgst_value, 'cgst_amt'=>$edit_cgst_amt, 'sgst'=>$edit_sgst, 'sgst_amt'=>$edit_sgst_amt, 
         'igst'=>$edit_igst, 'igst_amt'=>$edit_igst_amt, 'tax_value'=>$edit_tax_value, 
         'sales_value'=>$edit_sales_value,
            
            'status'=>'1');

            // Insert the data
            $this->db->where('id',$opsid);
            $result = $this->db->update('opsales',$datat);

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
    function delOPS(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('opsales',$data);
        if($result){
            $output['success'] = true;
            $output['messages'] = 'Successfully Deleted';
        }else{
            $output['success'] = false;
            $output['messages'] = 'Error while removing ipcatalog!';
        }

        return($output);
    }    

}