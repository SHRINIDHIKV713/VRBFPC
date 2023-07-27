<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class IpreturnModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'ipreturn';
        // Set orderable column fields
        $this->column_order = array(
        'date_of','from_store','supplier_name',
        'product_name','stocks','quantity','measures',
        'total_price','gst' ,'gst_value' ,'cgst','cgst_amt','sgst','sgst_amt','igst','igst_amt',
        'tax_value','transfer_value' );

        // Set searchable column fields
        $this->column_search = array(
            'date_of','from_store','supplier_name',
        'product_name','stocks','quantity','measures',
        'total_price','gst' ,'gst_value' ,'cgst','cgst_amt','sgst','sgst_amt','igst','igst_amt',
        'tax_value','transfer_value' 
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

   
    function addReturnentry(){
        $date_of = $this->input->post('date_of');
        $from_store = $this->input->post('from_store');
        $supplier_name = $this->input->post('supplier_name');
        $product_name = $this->input->post('product_name');
        $stocks = $this->input->post('stocks');
        $quantity = $this->input->post('quantity');
        $measures = $this->input->post('measures');
        $total_price = $this->input->post('total_price');
        $gst = $this->input->post('gst');
        $gst_value = $this->input->post('gst_value');
        $cgst = $this->input->post('cgst');
        $cgst_amt = $this->input->post('cgst_amt');
        $sgst = $this->input->post('sgst');
        $sgst_amt = $this->input->post('sgst_amt');
        $igst = $this->input->post('igst');
        $igst_amt = $this->input->post('igst_amt');
        $tax_value = $this->input->post('tax_value');
        $transfer_value = $this->input->post('transfer_value');

        $datat=array('date_of'=>$date_of,'from_store'=>$from_store,'supplier_name'=>$supplier_name,
        'product_name'=>$product_name,'stocks'=>$stocks,
        'quantity'=>$quantity,'measures'=>$measures,
        'total_price'=>$total_price,'gst'=>$gst ,'gst_value'=>$gst_value ,
        'cgst'=>$cgst,'cgst_amt'=>$cgst_amt,'sgst'=>$sgst,'sgst_amt'=>$sgst_amt,'igst'=>$igst,'igst_amt'=>$igst_amt,
        'tax_value'=>$tax_value,'transfer_value'=>$transfer_value,
        'status'=>'1');

            // Insert the data
            $result = $this->db->insert('ipreturn',$datat);

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

    
    function editReturnentry(){
        $iprid = $this->input->post('iprid');
        $edit_date_of = $this->input->post('edit_date_of');
        $edit_from_store = $this->input->post('edit_from_store');
        $edit_supplier_name = $this->input->post('edit_supplier_name');
        $edit_product_name = $this->input->post('edit_product_name');
        $edit_stocks = $this->input->post('edit_stocks');
        $edit_quantity = $this->input->post('edit_quantity');
        $edit_measures = $this->input->post('edit_measures');
        $edit_total_price = $this->input->post('edit_total_price');
        $edit_gst = $this->input->post('edit_gst');
        $edit_gst_value = $this->input->post('edit_gst_value');
        $edit_cgst = $this->input->post('edit_cgst');
        $edit_cgst_amt = $this->input->post('edit_cgst_amt');
        $edit_sgst = $this->input->post('edit_sgst');
        $edit_sgst_amt = $this->input->post('edit_sgst_amt');
        $edit_igst = $this->input->post('edit_igst');
        $edit_igst_amt = $this->input->post('edit_igst_amt');
        $edit_tax_value = $this->input->post('edit_tax_value');
        $edit_transfer_value = $this->input->post('edit_transfer_value');

        $datat=array('date_of'=>$edit_date_of,'from_store'=>$edit_from_store,'supplier_name'=>$edit_supplier_name,
        'product_name'=>$edit_product_name,'stocks'=>$edit_stocks,
        'quantity'=>$edit_quantity,'measures'=>$edit_measures,
        'total_price'=>$edit_total_price,'gst'=>$edit_gst ,'gst_value'=>$edit_gst_value ,
        'cgst'=>$edit_cgst,'cgst_amt'=>$edit_cgst_amt,'sgst'=>$edit_sgst,'sgst_amt'=>$edit_sgst_amt,'igst'=>$edit_igst,'igst_amt'=>$edit_igst_amt,
        'tax_value'=>$edit_tax_value,'transfer_value'=>$edit_transfer_value,
        'status'=>'1');

            // Insert the data
            $this->db->where('id',$iprid);
            $result = $this->db->update('ipreturn',$datat);

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

    function delRETURN(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('ipreturn',$data);
        if($result){
            $output['success'] = true;
            $output['messages'] = 'Successfully Deleted';
        }else{
            $output['success'] = false;
            $output['messages'] = 'Error while removing ipsales!';
        }

        return($output);
    }    

}