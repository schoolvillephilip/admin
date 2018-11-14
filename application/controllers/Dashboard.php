<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if (!$this->session->userdata('logged_in')) {
            // Ursher the person to where he is coming from
            $from = $this->session->userdata('referred_from');
            if (!empty($from)) redirect($from);
            redirect('login');
        }
        if( $this->session->userdata('groups') < 1 ){
            header('Location: '. lang('site_domain'));
        }
    }



    public function index(){
        $page_data['page_title'] = 'Admin Dashboard';
        $page_data['pg_name'] = 'dashboard';
        $page_data['sub_name'] = 'dashboard';
        $page_data['page_title'] = 'Sellers Overview';
        $page_data['pg_name'] = 'sellers';
        $page_data['sub_name'] = 'sellers_overview';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('admin/dashboard', $page_data);
    }
}
