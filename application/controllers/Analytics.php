<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if (!$this->session->userdata('logged_in')) {
            // Ursher the person to where he is coming from
            $from = $this->session->userdata('referred_from');
            if (!empty($from)) redirect($from);
            redirect('login');
        }
    }

    public function index()
    {
        redirect('analytics/overview');
    }

    public function overview()
    {
        $page_data['pg_name'] = 'analytics';
        $page_data['page_title'] = "Analytics Overview";
        $page_data['sub_name'] = "analytics_overview";
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['least_sub'] = "";
        $this->load->view('analytics/overview', $page_data);
    }
}