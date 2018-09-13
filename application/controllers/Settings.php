<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
    public function __construct(){
        // @todo
        // Check if the user is already logged in
        // Also check where the user is coming from
        parent::__construct();
        $this->load->model('seller_model', 'seller');
         $this->session->set_userdata('referred_from', current_url());
        if( !$this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            if( !empty($this->session->userdata('referred_from')) ) redirect($this->session->userdata('referred_from'));
            redirect('login');
        }
        $this->output->enable_profiler(TRUE);
    }
    
    public function index(){
        $this->load->helper('query_helper');
        $page_data['profile'] = $this->seller->get_profile(base64_decode($this->session->userdata('logged_id')));
        $page_data['page_title'] = 'Profile Setting - Carrito';
        $page_data['pg_name'] = 'settings';
        $page_data['sub_name'] = 'profile';
        $this->load->view('settings', $page_data);
    }
}
