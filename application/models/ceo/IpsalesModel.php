<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class IpsalesModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'ipsales';
        // Set orderable column fields
        $this->column_order = array( 'invoice_no', 'store', 'date', 'sales_type', 'types','c_name','share_no' 
        ,'a_name','o_name' ,'phone_no', 'payment_type', 'product_name', 'stocks', 
        'quantity', 'measures', 'selling_price', 'offer_name', 'offer_amt','total_price', 'gst', 'cgst', 'cgst_amt', 'sgst', 
        'sgst_amt', 
        'igst', 'igst_amt', 'total_tax_value', 'total_value', 'round_off_tax', 'total_sales_value');
        // Set searchable column fields
        $this->column_search = array('invoice_no', 'store', 'date', 'sales_type', 'types', 
        'phone_no', 'payment_type', 'product_name', 'stocks', 
       'quantity', 'measures', 'selling_price', 'offer_name', 'offer_amt', 'total_price', 'gst', 'cgst', 'cgst_amt', 'sgst', 
       'sgst_amt', 
       'igst', 'igst_amt', 'total_tax_value', 'total_value', 'round_off_tax', 'total_sales_value');

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

    //Add Fpo
    function addSalesentry(){
        
            $invoice_no = $this->input->post('invoice_no');
            $store = $this->input->post('store');
            $date = $this->input->post('date');
            $sales_type = $this->input->post('sales_type');
            $types = $this->input->post('types');
            $phone_no = $this->input->post('phone_no');
            $payment_type = $this->input->post('payment_type');
            $product_name = $this->input->post('product_name');
            $stocks = $this->input->post('stocks');
            $quantity = $this->input->post('quantity');
            $measures = $this->input->post('measures');
            $selling_price = $this->input->post('selling_price');
            $offer_name = $this->input->post('offer_name');
            $offer_amt = $this->input->post('offer_amt');
            $c_name = $this->input->post('c_name');
            $share_no = $this->input->post('share_no');
            $a_name = $this->input->post('a_name');
            $o_name = $this->input->post('o_name');
            $total_price = $this->input->post('total_price');
            $gst = $this->input->post('gst');
            $cgst = $this->input->post('cgst');
            $cgst_amt = $this->input->post('cgst_amt');
            $sgst = $this->input->post('sgst');
            $sgst_amt = $this->input->post('sgst_amt');
            $igst = $this->input->post('igst');
            $igst_amt = $this->input->post('igst_amt');
            $total_tax_value = $this->input->post('total_tax_value');
            $total_value = $this->input->post('total_value');
            $round_off_tax = $this->input->post('round_off_tax');
            $total_sales_value = $this->input->post('total_sales_value');
       

            $datat=array( 'invoice_no'=>$invoice_no, 
            'store'=>$store, 
            'date'=>$date, 
            'sales_type'=>$sales_type,
             'types'=>$types, 
             'c_name'=>$c_name,
             'share_no'=>$share_no,
             'a_name'=>$a_name,
             'o_name'=>$o_name,
            'phone_no'=>$phone_no, 
            'payment_type'=>$payment_type, 
            'product_name'=>$product_name, 
            'stocks'=>$stocks, 
            'quantity'=>$quantity, 
            'measures'=>$measures, 
            'selling_price'=>$selling_price, 
            'offer_name'=>$offer_name,
             'offer_amt'=>$offer_amt, 
             
            'total_price'=>$total_price, 
            'gst'=>$gst, 
            'cgst'=>$cgst, 
            'cgst_amt'=>$cgst_amt, 
            'sgst'=>$sgst, 
            'sgst_amt'=>$sgst_amt, 
            'igst'=>$igst, 
            'igst_amt'=>$igst_amt,
             'total_tax_value'=>$total_tax_value, 
            'total_value'=>$total_value, 
            'round_off_tax'=>$round_off_tax, 
            'total_sales_value'=>$total_sales_value,
            'status'=>'1');

           

                // Insert the data
                $result = $this->db->insert('ipsales',$datat);

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

        function editSalesentry(){
            $ipsid = $this->input->post('ipsid');
            $edit_invoice_no = $this->input->post('edit_invoice_no');
            $edit_store = $this->input->post('edit_store');
            $edit_date = $this->input->post('edit_date');
            $edit_sales_type = $this->input->post('edit_sales_type');
            $edit_types = $this->input->post('edit_types');
            $edit_phone_no = $this->input->post('edit_phone_no');
            $edit_payment_type = $this->input->post('edit_payment_type');
            $edit_product_name = $this->input->post('edit_product_name');
            $edit_stocks = $this->input->post('edit_stocks');
            $edit_quantity = $this->input->post('edit_quantity');
            $edit_measures = $this->input->post('edit_measures');
            $edit_selling_price = $this->input->post('edit_selling_price');
            $edit_offer_name = $this->input->post('edit_offer_name');
            $edit_offer_amt = $this->input->post('edit_offer_amt');
            $edit_total_price = $this->input->post('edit_total_price');
            $edit_gst = $this->input->post('edit_gst');
            $edit_cgst = $this->input->post('edit_cgst');
            $edit_cgst_amt = $this->input->post('edit_cgst_amt');
            $edit_sgst = $this->input->post('edit_sgst');
            $edit_sgst_amt = $this->input->post('edit_sgst_amt');
            $edit_igst = $this->input->post('edit_igst');
            $edit_igst_amt = $this->input->post('edit_igst_amt');
            $edit_total_tax_value = $this->input->post('edit_total_tax_value');
            $edit_total_value = $this->input->post('edit_total_value');
            $edit_round_off_tax = $this->input->post('edit_round_off_tax');
            $edit_total_sales_value = $this->input->post('edit_total_sales_value');
       

            $datat=array( 'invoice_no'=>$edit_invoice_no, 
            'store'=>$edit_store, 
            'date'=>$edit_date, 
            'sales_type'=>$edit_sales_type,
             'types'=>$edit_types, 
            'phone_no'=>$edit_phone_no, 
            'payment_type'=>$edit_payment_type, 
            'product_name'=>$edit_product_name, 
            'stocks'=>$edit_stocks, 
            'quantity'=>$edit_quantity, 
            'measures'=>$edit_measures, 
            'selling_price'=>$edit_selling_price, 
            'offer_name'=>$edit_offer_name,
             'offer_amt'=>$edit_offer_amt, 
            'total_price'=>$edit_total_price, 
            'gst'=>$edit_gst, 
            'cgst'=>$edit_cgst, 
            'cgst_amt'=>$edit_cgst_amt, 
            'sgst'=>$edit_sgst, 
            'sgst_amt'=>$edit_sgst_amt, 
            'igst'=>$edit_igst, 
            'igst_amt'=>$edit_igst_amt,
             'total_tax_value'=>$edit_total_tax_value, 
            'total_value'=>$edit_total_value, 
            'round_off_tax'=>$edit_round_off_tax, 
            'total_sales_value'=>$edit_total_sales_value,
            'status'=>'1');

           

                // Insert the data
                $this->db->where('id',$ipsid);
                $result = $this->db->update('ipsales',$datat);

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
    function delSALES(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('ipsales',$data);
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

  
