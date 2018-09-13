<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller{

    public function __construct(){
        // @todo
        // Check if the user is already logged in
        // Also check where the user is coming from
        // $this->session->set_userdata('referred_from', current_url());
        parent::__construct();
        $this->load->model('seller_model', 'seller');
        if( !$this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            if( !empty($this->session->userdata('referred_from')) ) redirect($this->session->userdata('referred_from'));
            redirect('login');
        }        
    }

    public function index(){
        $page_data['page_title'] = 'Register to be part of the community';
        $page_data['pg_name'] = 'register';
        $page_data['meta_tags'] = array( 'bootstrap.min.css','nifty.min.css','nifty-demo-icons.min.css','nifty-demo.min.css');
        $page_data['scripts'] = array('jquery.min.js','bootstrap.min.js', 'nifty.min.js');
        $this->load->view('dashboard', $page_data);
    }
}
