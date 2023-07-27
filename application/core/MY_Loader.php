<?php  defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MY_Loader extends CI_Loader {

    function __construct() {
        parent::__construct();

        $CI = & get_instance();
        $CI->load = $this;
    }

    //Login/Regster Screen Template

    public function home_template( $template_name, $vars = array(), $return = TRUE ) {
        $content  = $this->view( 'template/common/header', $vars, $return );

        if ( is_array( $template_name ) ) {
            //return all values in contents
            foreach ( $template_name as $file_to_load ) {
                $content .= $this->view( $file_to_load, $vars, $return );
            }
        } else {
            $content .= $this->view( $template_name, $vars, $return );
        }

        $content .= $this->view( 'template/common/script', $vars, $return );
        $content .= $this->view( 'template/common/footer', $vars, $return );

        echo $content;
    }

    //Dashboard Screen Template

    public function dashboard_template( $template_name, $vars = array(), $return = TRUE ) {
        $content  = $this->view( 'template/common/header', $vars, $return );
        $content  .= $this->view( 'template/common/headerend', $vars, $return );
        $content  .= $this->view( 'template/common/script', $vars, $return );
        if ( $_SESSION[ 'role' ] === 'Admin' ) {
            $content  .= $this->view( 'template/superadmin/topbar', $vars, $return );
            $content  .= $this->view( 'template/superadmin/sidebar', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'Accountant' ) {
            $content  .= $this->view( 'template/accountant/topbar', $vars, $return );
            $content  .= $this->view( 'template/accountant/sidebar', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'CEO' ) {
            $content  .= $this->view( 'template/ceo/topbar', $vars, $return );
            $content  .= $this->view( 'template/ceo/sidebar', $vars, $return );
        } else {
            $content  .= $this->view( 'template/agent/topbar', $vars, $return );
            $content  .= $this->view( 'template/agent/sidebar', $vars, $return );
        }

        echo $content;
    }

    public function datatable_template( $template_name, $vars = array(), $return = TRUE ) {
        $content  = $this->view( 'template/common/header', $vars, $return );
        $content  .= $this->view( 'template/common/datatable_css', $vars, $return );
        $content  .= $this->view( 'template/common/sweetalert_css', $vars, $return );
        $content  .= $this->view( 'template/common/headerend', $vars, $return );
        $content  .= $this->view( 'template/common/loader', $vars, $return );
        $content  .= $this->view( 'template/common/breadcrum', $vars, $return );
        if ( $_SESSION[ 'role' ] === 'Admin' ) {
            $content  .= $this->view( 'template/superadmin/topbar', $vars, $return );
            $content  .= $this->view( 'template/superadmin/sidebar', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'Accountant' ) {
            $content  .= $this->view( 'template/accountant/topbar', $vars, $return );
            $content  .= $this->view( 'template/accountant/sidebar', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'CEO' ) {
            $content  .= $this->view( 'template/ceo/topbar', $vars, $return );
            $content  .= $this->view( 'template/ceo/sidebar', $vars, $return );
        } else {
            $content  .= $this->view( 'template/agent/topbar', $vars, $return );
            $content  .= $this->view( 'template/agent/sidebar', $vars, $return );
        }

        if ( is_array( $template_name ) ) {
            //return all values in contents
            foreach ( $template_name as $file_to_load ) {
                $content .= $this->view( $file_to_load, $vars, $return );
            }
        } else {
            $content .= $this->view( $template_name, $vars, $return );
        }

        $content .= $this->view( 'template/common/footer', $vars, $return );
        $content .= $this->view( 'template/common/script', $vars, $return );
        $content .= $this->view( 'template/common/datatable_js', $vars, $return );
        $content .= $this->view( 'template/common/sweetalert_js', $vars, $return );
        $content .= $this->view( 'template/common/footerend', $vars, $return );

        echo $content;
    }
    //Form Screen Template

    public function formentry_template( $template_name, $vars = array(), $return = TRUE ) {
        $content  = $this->view( 'template/common/header', $vars, $return );
        $content  .= $this->view( 'template/common/date_css', $vars, $return );
        $content  .= $this->view( 'template/common/sweetalert_css', $vars, $return );
        $content  .= $this->view( 'template/common/headerend', $vars, $return );
        $content  .= $this->view( 'template/common/loader', $vars, $return );
        $content  .= $this->view( 'template/common/breadcrum', $vars, $return );
        if ( $_SESSION[ 'role' ] === 'Admin' ) {
            $content  .= $this->view( 'template/superadmin/topbar', $vars, $return );
            $content  .= $this->view( 'template/superadmin/sidebar', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'Accountant' ) {
            $content  .= $this->view( 'template/accountant/topbar', $vars, $return );
            $content  .= $this->view( 'template/accountant/sidebar', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'CEO' ) {
            $content  .= $this->view( 'template/ceo/topbar', $vars, $return );
            $content  .= $this->view( 'template/ceo/sidebar', $vars, $return );
        } else {
            $content  .= $this->view( 'template/agent/topbar', $vars, $return );
            $content  .= $this->view( 'template/agent/sidebar', $vars, $return );
        }

        if ( is_array( $template_name ) ) {
            //return all values in contents
            foreach ( $template_name as $file_to_load ) {
                $content .= $this->view( $file_to_load, $vars, $return );
            }
        } else {
            $content .= $this->view( $template_name, $vars, $return );
        }
        $content .= $this->view( 'template/common/footer', $vars, $return );
        $content .= $this->view( 'template/common/date_js', $vars, $return );
        $content .= $this->view( 'template/common/sweetalert_js', $vars, $return );
        $content .= $this->view( 'template/common/footerend', $vars, $return );
        if ( $_SESSION[ 'role' ] === 'Admin' ) {
            $content .= $this->view( 'template/common/script', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'Accountant' ) {
            $content .= $this->view( 'template/common/script', $vars, $return );
        } elseif ( $_SESSION[ 'role' ] === 'CEO' ) {
            $content .= $this->view( 'template/common/script', $vars, $return );
        } else {
            $content .= $this->view( 'template/common/script', $vars, $return );
        }
        $content .= $this->view( 'template/common/footerend', $vars, $return );

        echo $content;
    }

}