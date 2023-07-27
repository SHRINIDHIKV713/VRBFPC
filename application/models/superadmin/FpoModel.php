<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/**
* FPO Model
*/

class FpoModel extends CI_Model
 {
    public function __construct() {
        parent::__construct();
        $output = array( 'success' => false, 'messages' => array() );
        // Set table name
        $this->table = 'fpo';
        // Set orderable column fields
        $this->column_order = array( 'f_name', 'date_of', 'registered_address', 'cin_no', 'gst_no',
        'pan_no',
        // 'fssai', 'fs_validity', 'general_license', 'gl_validity',
        // 'trader_license', 'td_validity', 'apmc_license', 'apmc_validity', 'input_license', 'il_validity',
        'contact_person', 'designation', 'contact_no', 'email',
        'fpo_account_no', 'fpo_bank_name', 'fpo_ifsc',
        'ceo_name', 'ceo_mobile_number', 'ceo_email_id', 'ca_name', 'ca_mobile_number' );
        // Set searchable column fields
        $this->column_search = array( 'f_name', 'date_of', 'registered_address', 'cin_no', 'gst_no',
        'pan_no',
        // 'fssai', 'fs_validity', 'general_license', 'gl_validity',
        // 'trader_license', 'td_validity', 'apmc_license', 'apmc_validity',
        // 'input_license', 'il_validity', 'license_feild', 'license_value',
        // 'license_validity', 'certificate',
        'contact_person', 'designation', 'contact_no', 'email',
        'fpo_account_no', 'fpo_bank_name', 'fpo_ifsc',
        'ceo_name', 'ceo_mobile_number', 'ceo_email_id', 'ca_name', 'ca_mobile_number' );

        // Set default order
        $this->order = array( 'f_name' => 'asc' );

    }

    /*
    * Fetch members data from the database
    * @param $_POST filter data based on the posted parameters
    */

    public function getRows( $postData ) {
        $this->_get_datatables_query( $postData );
        if ( $postData[ 'length' ] != -1 ) {
            $this->db->limit( $postData[ 'length' ], $postData[ 'start' ] );
        }
        $query = $this->db->get();
        return $query->result();
    }

    /*
    * Count all records
    */

    public function countAll() {
        $this->db->from( $this->table );
        return $this->db->count_all_results();
    }

    /*
    * Count records based on the filter params
    * @param $_POST filter data based on the posted parameters
    */

    public function countFiltered( $postData ) {
        $this->_get_datatables_query( $postData );
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*
    * Perform the SQL queries needed for an server-side processing requested
    * @param $_POST filter data based on the posted parameters
    */

    private function _get_datatables_query( $postData ) {

        $this->db->from( $this->table );

        $i = 0;
        // loop searchable columns
        foreach ( $this->column_search as $item ) {
            // if datatable send POST for search
            if ( $postData[ 'search' ][ 'value' ] ) {
                // first loop
                if ( $i === 0 ) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like( $item, $postData[ 'search' ][ 'value' ] );
                } else {
                    $this->db->or_like( $item, $postData[ 'search' ][ 'value' ] );
                }

                // last loop
                if ( count( $this->column_search ) - 1 == $i ) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if ( isset( $postData[ 'order' ] ) ) {
            $this->db->order_by( $this->column_order[ $postData[ 'order' ][ '0' ][ 'column' ] ], $postData[ 'order' ][ '0' ][ 'dir' ] );
        } else if ( isset( $this->order ) ) {
            $order = $this->order;
            $this->db->order_by( key( $order ), $order[ key( $order ) ] );
        }
    }

    //Add Fpo

    function addFpoentry() {

        $f_name = $this->input->post( 'f_name' );
        $date_of = $this->input->post( 'date_of' );
        $registered_address = $this->input->post( 'registered_address' );
        $cin_no = $this->input->post( 'cin_no' );
        $gst_no = $this->input->post( 'gst_no' );
        $pan_no = $this->input->post( 'pan_no' );
        $contact_person = $this->input->post( 'contact_person' );
        $designation = $this->input->post( 'designation' );
        $contact_no = $this->input->post( 'contact_no' );
        $email = $this->input->post( 'email' );
        $fpo_account_no = $this->input->post( 'fpo_account_no' );
        $fpo_bank_name = $this->input->post( 'fpo_bank_name' );
        $fpo_ifsc = $this->input->post( 'fpo_ifsc' );
        $ceo_name  = $this->input->post( 'ceo_name' );
        $ceo_mobile_number = $this->input->post( 'ceo_mobile_number' );
        $ceo_email_id = $this->input->post( 'ceo_email_id' );
        $password = $this->input->post('password');
        $ca_name = $this->input->post( 'ca_name' );
        $ca_mobile_number = $this->input->post( 'ca_mobile_number' );

        $license_name = $this->input->post( 'license_name' );
        $license_no = $this->input->post( 'license_no' );
        $license_validity = $this->input->post( 'license_validity' );
        $license_file = $this->input->post( 'license_file' );

        $lastid = '';

        $datat = array( 'f_name'=>$f_name,
        'date_of'=>$date_of, 'registered_address'=>$registered_address,
        'cin_no'=>$cin_no, 'gst_no'=>$gst_no, 'pan_no'=>$pan_no,
        'contact_person'=>$contact_person, 'designation'=>$designation,
        'contact_no'=>$contact_no, 'email'=>$email,

        'fpo_account_no'=>$fpo_account_no, 'fpo_bank_name'=>$fpo_bank_name,
        'fpo_ifsc'=>$fpo_ifsc,

        'ceo_name'=>$ceo_name,
        'ceo_mobile_number'=>$ceo_mobile_number, 'ceo_email_id'=>$ceo_email_id,
        'ca_name'=>$ca_name, 'ca_mobile_number'=>$ca_mobile_number,

        'status'=>'1' );

        // Insert the data
        $result = $this->db->insert( 'fpo', $datat );
        $lastId = $this->db->insert_id();

        $datau = array('user_id'=>$lastId ,'username'=>$ceo_email_id,'password'=>$password,'role'=>'CEO');
        $resultu = $this->db->insert( 'users', $datau );
        
        $countl = count( $license_name );
        $license_validity = isset( $_POST[ 'license_validity' ] ) ? $_POST[ 'license_validity' ] : array();

        for ( $x = 0; $x < $countl; $x++ ) {
            $selected_validity = isset( $license_validity[ $x ] ) ? $license_validity[ $x ] : null;

            // Convert selected validity to number of years
            $validity_years = 0;

            if ( $selected_validity ) {
                $validity_years = ( int ) explode( ' ', $selected_validity )[ 0 ];
            }

            $fileData = isset( $_FILES[ 'license_file' ] ) ? $_FILES[ 'license_file' ] : null;
            $fileContent = '';

            if ( $fileData && $fileData[ 'error' ][ $x ] === UPLOAD_ERR_OK ) {
                $fileContent = file_get_contents( $fileData[ 'tmp_name' ][ $x ] );
            }

            $datal = array(
                'fpoid' => $lastId,
                'license_name' => isset( $license_name[ $x ] ) ? $license_name[ $x ] : '',
                'license_no' => isset( $license_no[ $x ] ) ? $license_no[ $x ] : '',
                'license_validity' => $selected_validity,
                'license_file' => $fileContent,
                'license_file_name' => isset( $fileData[ 'name' ][ $x ] ) ? $fileData[ 'name' ][ $x ] : ''
            );

            $results = $this->db->insert( 'fpo_license', $datal );
        }

        if ( $result && $results && $resultu ) {
            $output[ 'success' ] = true;
            $output[ 'messages' ] = 'Successfully added!';

        } else {
            $output[ 'success' ] = false;
            $output[ 'messages' ] = 'Ooops! something went wrong';
        }
        return $output;

    }
    

    //delete individual items

    function delFPO() {
        $id = $this->input->post( 'member_id' );
        $this->db->where( 'id', $id );
        $status = '0';
        $data = array( 'status'=> $status );
        $result = $this->db->update( 'fpo', $data );
        if ( $result ) {
            $output[ 'success' ] = true;
            $output[ 'messages' ] = 'FPO Deleted';
        } else {
            $output[ 'success' ] = false;
            $output[ 'messages' ] = 'Error while removing fpo!';
        }

        return( $output );
    }

    

    //Add Fpo

    function editFpoentry() {
        // if ( isset( $_FILES[ 'edit_certificate' ][ 'type' ] ) )
        // {
        //     $validextensions = array( 'jpeg', 'jpg', 'png' );

        //     $temporary = explode( '.', $_FILES[ 'edit_certificate' ][ 'name' ] );
        //     $file_extension = end( $temporary );
        //     $sourcePath = $_FILES[ 'edit_certificate' ][ 'tmp_name' ];
        //Store source path in a variable
        //     $targetPath = 'uploads/fpo/' . $_FILES[ 'edit_certificate' ][ 'name' ];
        // The Target path where file is to be stored
        //     move_uploaded_file( $sourcePath, $targetPath );
        // Moving Uploaded file

        //     // The Image Data

        // if ( $_FILES[ 'edit_certificate' ][ 'name' ] != '' ) {

        //     $image1 = $_FILES[ 'edit_certificate' ][ 'name' ];
        // }
        // else
        // {
        //     $image1 = $this->input->post( 'oldimg' );
        // }
        $fid = $this->input->post( 'fid' );
        $edit_f_name = $this->input->post( 'edit_f_name' );
        $edit_date_of = $this->input->post( 'edit_date_of' );
        $edit_registered_address = $this->input->post( 'edit_registered_address' );
        $edit_cin_no = $this->input->post( 'edit_cin_no' );
        $edit_gst_no = $this->input->post( 'edit_gst_no' );
        $edit_pan_no = $this->input->post( 'edit_pan_no' );
        $edit_contact_person = $this->input->post( 'edit_contact_person' );
        $edit_designation = $this->input->post( 'edit_designation' );
        $edit_contact_no = $this->input->post( 'edit_contact_no' );
        $edit_email = $this->input->post( 'edit_email' );
        $edit_fpo_account_no = $this->input->post( 'edit_fpo_account_no' );
        $edit_fpo_bank_name = $this->input->post( 'edit_fpo_bank_name' );
        $edit_fpo_ifsc = $this->input->post( 'edit_fpo_ifsc' );
        $edit_ceo_name  = $this->input->post( 'edit_ceo_name' );
        $edit_ceo_mobile_number = $this->input->post( 'edit_ceo_mobile_number' );
        $edit_ceo_email_id = $this->input->post( 'edit_ceo_email_id' );
        $edit_password = $this->input->post( 'edit_password' );
        $edit_ca_name = $this->input->post( 'edit_ca_name' );
        $edit_ca_mobile_number = $this->input->post( 'edit_ca_mobile_number' );

        $data = array( 'f_name'=>$edit_f_name,
        'date_of'=>$edit_date_of, 'registered_address'=>$edit_registered_address,
        'cin_no'=>$edit_cin_no, 'gst_no'=>$edit_gst_no, 'pan_no'=>$edit_pan_no,
        'contact_person'=>$edit_contact_person, 'designation'=>$edit_designation,
        'contact_no'=>$edit_contact_no, 'email'=>$edit_email,

        'fpo_account_no'=>$edit_fpo_account_no, 'fpo_bank_name'=>$edit_fpo_bank_name,
        'fpo_ifsc'=>$edit_fpo_ifsc,

        'ceo_name'=>$edit_ceo_name,
        'ceo_mobile_number'=>$edit_ceo_mobile_number, 'ceo_email_id'=>$edit_ceo_email_id,
        'ca_name'=>$edit_ca_name, 'ca_mobile_number'=>$edit_ca_mobile_number );
        
        $this->db->where( 'id', $fid );
        $result = $this->db->update( 'fpo', $data );
        if ( $result ) {
            $output[ 'success' ] = true;
            $output[ 'messages' ] = 'Successfully added!';

        } else {
            $output[ 'success' ] = false;
            $output[ 'messages' ] = 'Ooops! something went wrong';
        }
        return $output;
    }

}

