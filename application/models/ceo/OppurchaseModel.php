<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class OppurchaseModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'oppurchase';
        // Set orderable column fields
        $this->column_order = array(
            'invoice_no', 'date_of', 'store', 'entry_type', 'purchase_type', 'from_org', 'p_name',
             'f_name', 'phone', 'payment', 'product_name', 'p_price', 'batch', 'expiry_date', 'quantity', 
             'measures', 'total_price', 'gst', 'gst_value', 'stocks', 'cgst', 'cgst_amt', 
            'sgst', 'sgst_amt', 'igst', 'igst_amt', 'tax_value', 'round_off', 'purchase_value', 
            'refered_by' );

        // Set searchable column fields
        $this->column_search = array(
            'invoice_no', 'date_of', 'store', 'entry_type', 'purchase_type', 'from_org', 'p_name',
             'f_name', 'phone', 'payment', 'product_name', 'p_price', 'batch', 'expiry_date', 'quantity', 
             'measures', 'total_price', 'gst', 'gst_value', 'stocks', 'cgst', 'cgst_amt', 
            'sgst', 'sgst_amt', 'igst', 'igst_amt', 'tax_value', 'round_off', 'purchase_value', 
            'refered_by'
        );

        // Set default order
        $this->order = array('invoice_no' => 'asc');
       
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
   
    function addOppurchaseentry(){
        $invoice_no = $this->input->post('invoice_no');
        $date_of = $this->input->post('date_of');
        $store = $this->input->post('store'); 
        $entry_type = $this->input->post('entry_type');
        $purchase_type = $this->input->post('purchase_type');
        $from_org = $this->input->post('from_org');
        $p_name = $this->input->post('p_name');
        $f_name = $this->input->post('f_name');
        $phone = $this->input->post('phone');
        $payment = $this->input->post('payment');
        $product_name = $this->input->post('product_name');
        $p_price = $this->input->post('p_price');
        $batch = $this->input->post('batch');
        $expiry_date = $this->input->post('expiry_date');
        $quantity = $this->input->post('quantity');
        $measures = $this->input->post('measures');
        $total_price = $this->input->post('total_price');
        $gst = $this->input->post('gst');
        $gst_value = $this->input->post('gst_value');
        $stocks = $this->input->post('stocks');
        $cgst = $this->input->post('cgst');
        $cgst_amt = $this->input->post('cgst_amt');
        $sgst = $this->input->post('sgst');
        $sgst_amt = $this->input->post('sgst_amt');
        $igst = $this->input->post('igst');
        $igst_amt = $this->input->post('igst_amt');
        $tax_value = $this->input->post('tax_value');
        $round_off = $this->input->post('round_off');
        $purchase_value = $this->input->post('purchase_value');
        $refered_by = $this->input->post('refered_by');

        $datat=array('invoice_no'=>$invoice_no,'store'=>$store,
        'date_of'=>$date_of,'entry_type'=>$entry_type,'purchase_type'=>$purchase_type,
        'from_org'=>$from_org,
        'p_name'=>$p_name,
        'phone'=>$phone,'f_name'=>$f_name,
        'payment'=>$payment,'product_name'=>$product_name,'p_price'=>$p_price,'batch'=>$batch,
        'expiry_date'=>$expiry_date,'quantity'=>$quantity,'measures'=>$measures,
        'total_price'=>$total_price,'gst'=>$gst ,'gst_value'=>$gst_value ,'stocks'=>$stocks,
        'cgst'=>$cgst,'cgst_amt'=>$cgst_amt,'sgst'=>$sgst,'sgst_amt'=>$sgst_amt,'igst'=>$igst,'igst_amt'=>$igst_amt,
        'tax_value'=>$tax_value,'round_off'=>$round_off,'purchase_value'=>$purchase_value,
        'refered_by'=>$refered_by,
        'status'=>'1');

            // Insert the data
            $result = $this->db->insert('oppurchase',$datat);

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

    function editOppurchaseentry(){
        $oppid = $this->input->post('oppid');
        $edit_invoice_no = $this->input->post('edit_invoice_no');
        $edit_date_of = $this->input->post('edit_date_of');
        $edit_store = $this->input->post('edit_store'); 
        $edit_entry_type = $this->input->post('edit_entry_type');
        $edit_purchase_type = $this->input->post('edit_purchase_type');
        $edit_from_org = $this->input->post('edit_from_org');
        $edit_p_name = $this->input->post('edit_p_name');
        $edit_f_name = $this->input->post('edit_f_name');
        $edit_phone = $this->input->post('edit_phone');
        $edit_payment = $this->input->post('edit_payment');
        $edit_product_name = $this->input->post('edit_product_name');
        $edit_p_price = $this->input->post('edit_p_price');
        $edit_batch = $this->input->post('edit_batch');
        $edit_expiry_date = $this->input->post('edit_expiry_date');
        $edit_quantity = $this->input->post('edit_quantity');
        $edit_measures = $this->input->post('edit_measures');
        $edit_total_price = $this->input->post('edit_total_price');
        $edit_gst = $this->input->post('edit_gst');
        $edit_gst_value = $this->input->post('edit_gst_value');
        $edit_stocks = $this->input->post('edit_stocks');
        $edit_cgst = $this->input->post('edit_cgst');
        $edit_cgst_amt = $this->input->post('edit_cgst_amt');
        $edit_sgst = $this->input->post('edit_sgst');
        $edit_sgst_amt = $this->input->post('edit_sgst_amt');
        $edit_igst = $this->input->post('edit_igst');
        $edit_igst_amt = $this->input->post('edit_igst_amt');
        $edit_tax_value = $this->input->post('edit_tax_value');
        $edit_round_off = $this->input->post('edit_round_off');
        $edit_purchase_value = $this->input->post('edit_purchase_value');
        $edit_refered_by = $this->input->post('edit_refered_by');

        $datat=array('invoice_no'=>$edit_invoice_no,'store'=>$edit_store,
        'date_of'=>$edit_date_of,'entry_type'=>$edit_entry_type,'purchase_type'=>$edit_purchase_type,'from_org'=>$edit_from_org,
        'p_name'=>$edit_p_name,
        'phone'=>$edit_phone,'f_name'=>$edit_f_name,
        'payment'=>$edit_payment,'product_name'=>$edit_product_name,'p_price'=>$edit_p_price,'batch'=>$edit_batch,
        'expiry_date'=>$edit_expiry_date,'quantity'=>$edit_quantity,'measures'=>$edit_measures,
        'total_price'=>$edit_total_price,'gst'=>$edit_gst ,'gst_value'=>$edit_gst_value ,'stocks'=>$edit_stocks,
        'cgst'=>$edit_cgst,'cgst_amt'=>$edit_cgst_amt,'sgst'=>$edit_sgst,'sgst_amt'=>$edit_sgst_amt,'igst'=>$edit_igst,'igst_amt'=>$edit_igst_amt,
        'tax_value'=>$edit_tax_value,'round_off'=>$edit_round_off,'purchase_value'=>$edit_purchase_value,
        'refered_by'=>$edit_refered_by,
        'status'=>'1');

            // Insert the data
            $this->db->where('id',$oppid);
            $result = $this->db->update('oppurchase',$datat);

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
    function delOPP(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('oppurchase',$data);
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