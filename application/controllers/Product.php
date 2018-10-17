<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if (!$this->session->userdata('logged_in')) {
            // Usher the person to where he is coming from
            $from = $this->session->userdata('referred_from');
            if (!empty($from)) redirect($from);
            redirect('login');
        }
    }

    public function index(){
        $page_data['page_title'] = 'Product Overview';
        $page_data['pg_name'] = 'product';
        $page_data['sub_name'] = 'product_overview';
        $page_data['profile'] = $this->admin->get_profile_details(base64_decode($this->session->userdata('logged_id')),
            'first_name,last_name,email,profile_pic');
		$page_data['products'] = $this->admin->get_product_list();
        $this->load->view('admin/product/overview', $page_data);
    }

}
