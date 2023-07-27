<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FPO Model
 */
class OpcatalogModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $output = array('success' => false, 'messages' => array());
        // Set table name
        $this->table = 'opcatalog';
        // Set orderable column fields
        $this->column_order = array('product_name', 'product_type', 'p_photo', 'status_', 'type_p', 'units',
         'measures', 'selling_units', 'size', 'grade', 'selling_price', 'gst', 
        'selling_price_before', 'gst_amount', 'cgst', 'cgst_amt', 'sgst', 'sgst_amt', 'igst', 'igst_amt');
        // Set searchable column fields
        $this->column_search = array('product_name', 'product_type', 'p_photo', 'status_', 'type_p', 
        'units',
        'measures', 'selling_units', 'size', 'grade', 'selling_price', 'gst', 
       'selling_price_before', 'gst_amount', 'cgst', 'cgst_amt', 'sgst', 'sgst_amt', 'igst', 'igst_amt');

        // Set default order
        $this->order = array('product_name' => 'asc');
        
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
    function addOpcatalogentry(){
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
            
            $product_name = $this->input->post('product_name');
            $product_type = $this->input->post('product_type');
            $p_photo = $this->input->post('p_photo');
            $status_ = $this->input->post('status_');
            $type_p = $this->input->post('type_p');
            $units = $this->input->post('units');
            $measures = $this->input->post('measures');
            $selling_units = $this->input->post('selling_units');
            $size = $this->input->post('size');
            $grade = $this->input->post('grade');
            $selling_price = $this->input->post('selling_price');
            $gst = $this->input->post('gst');
            $selling_price_before = $this->input->post('selling_price_before');
            $gst_amount = $this->input->post('gst_amount');
            $cgst = $this->input->post('cgst');
            $cgst_amt = $this->input->post('cgst_amt');
            $sgst = $this->input->post('sgst');
            $sgst_amt = $this->input->post('sgst_amt');
            $igst = $this->input->post('igst');
            $igst_amt = $this->input->post('igst_amt');
       

            $datat=array('product_name'=>$product_name, 'product_type'=>$product_type, 'p_photo'=>$image, 
            'status_'=>$status_, 'type_p'=>$type_p, 'units'=>$units,
            'measures'=>$measures, 'selling_units'=>$selling_units, 'size'=>$size,
             'grade'=>$grade, 'selling_price'=>$selling_price, 'gst'=>$gst, 
           'selling_price_before'=>$selling_price_before, 'gst_amount'=>$gst_amount, 'cgst'=>$cgst,
            'cgst_amt'=>$cgst_amt, 'sgst'=>$sgst, 'sgst_amt'=>$sgst_amt, 'igst'=>$igst, 
            'igst_amt'=>$igst_amt, 'status'=>'1');

                // Insert the data
                $result = $this->db->insert('opcatalog',$datat);

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
    function delOPC(){
        $id=$this->input->post('member_id');
        $this->db->where('id', $id);
        $status = '0';
        $data = array('status'=> $status);
        $result=$this->db->update('opcatalog',$data);
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
    function editOpcatalogentry(){
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
        $opcid = $this->input->post('opcid');
        $edit_product_name = $this->input->post('edit_product_name');
            $edit_product_type = $this->input->post('edit_product_type');
            $edit_p_photo = $this->input->post('edit_p_photo');
            $edit_status_ = $this->input->post('edit_status_');
            $edit_type_p = $this->input->post('edit_type_p');
            $edit_units = $this->input->post('edit_units');
            $edit_measures = $this->input->post('edit_measures');
            $edit_selling_units = $this->input->post('edit_selling_units');
            $edit_size = $this->input->post('edit_size');
            $edit_grade = $this->input->post('edit_grade');
            $edit_selling_price = $this->input->post('edit_selling_price');
            $edit_gst = $this->input->post('edit_gst');
            $edit_selling_price_before = $this->input->post('edit_selling_price_before');
            $edit_gst_amount = $this->input->post('edit_gst_amount');
            $edit_cgst = $this->input->post('edit_cgst');
            $edit_cgst_amt = $this->input->post('edit_cgst_amt');
            $edit_sgst = $this->input->post('edit_sgst');
            $edit_sgst_amt = $this->input->post('edit_sgst_amt');
            $edit_igst = $this->input->post('edit_igst');
            $edit_igst_amt = $this->input->post('edit_igst_amt');
        
        
        $data=array('product_name'=>$edit_product_name, 'product_type'=>$edit_product_type, 
        'p_photo'=>$edit_p_photo, 
        'status_'=>$edit_status_, 'type_p'=>$edit_type_p, 'units'=>$edit_units,
        'measures'=>$edit_measures, 'selling_units'=>$edit_selling_units, 'size'=>$edit_size,
         'grade'=>$edit_grade, 'selling_price'=>$edit_selling_price, 'gst'=>$edit_gst, 
       'selling_price_before'=>$edit_selling_price_before, 'gst_amount'=>$edit_gst_amount, 'cgst'=>$edit_cgst,
        'cgst_amt'=>$edit_cgst_amt, 'sgst'=>$edit_sgst, 'sgst_amt'=>$edit_sgst_amt, 'igst'=>$edit_igst, 
        'igst_amt'=>$edit_igst_amt);


        $this->db->where('id',$opcid);
        $result = $this->db->update('opcatalog',$data);
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

