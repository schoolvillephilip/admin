<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->session->set_userdata('referred_from', current_url());
        $this->load->model('seller_model', 'seller');
        if( !$this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            if( !empty($this->session->userdata('referred_from')) ) redirect($this->session->userdata('referred_from'));
            redirect('login');
        }        
    }

    public function index(){
        $status = cleanit($this->uri->segment(2));
        // could check for the status, and if not in the array - Ursher them to where coming from
        $page_data['page_title'] = 'Manage all products';
        $page_data['pg_name'] = 'manage_product';
        $page_data['sub_name'] = $status;
        $page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
            'first_name,last_name,email,profile_pic');
        // get product
        $page_data['products'] = $this->seller->get_product( base64_decode($this->session->userdata('logged_id')), $status,
            'id,product_name,sku,created_on,product_status');
        $this->load->view('manage', $page_data);
    }

}
