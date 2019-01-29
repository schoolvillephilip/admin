<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $page_data['page_title'] = 'Customer Questions';
        $page_data['pg_name'] = 'questions';
        $page_data['sub_name'] = '';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        //$page_data['questions'] = $this->admin->get_message($this->session->userdata('logged_id'));
        $this->load->view('questions', $page_data);
    }



}