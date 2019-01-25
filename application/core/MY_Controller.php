<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Security Checks here
        //  Are you logged in ?
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }elseif($this->session->userdata('logged_in') && in_array($this->session->userdata('group_id'), array_keys(USER_ROLES))){
            // Logged in and in group
            $group = $this->session->userdata('group_id');
            $controller = trim($this->uri->segment(1));
            if( !in_array( $controller, USER_ROLES[$group]) ){
                $this->session->set_flashdata('error_msg', "Sorry, you don't have the priviledge to access that page.");
                redirect( $_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect('https://www.onitshamarket.com');
        }
    }
}