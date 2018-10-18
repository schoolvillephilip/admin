<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller
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

	public function index(){
		$page_data['page_title'] = 'Sellers Overview';
		$page_data['pg_name'] = 'sellers';
		$page_data['sub_name'] = 'sellers_overview';
		$page_data['profile'] = $this->admin->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');

		$q = '';
		if( isset($_GET['q']) ) $q = cleanit( $q );
		$page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;

        if( $page > 1 ) $page -= 1;
        $lists = (array) $this->admin->get_seller_lists($q);
        $count = count( $lists );
		$this->load->library('pagination');
        $this->config->load('pagination'); // Load d config
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url() ;
        $config['total_rows'] = $count; 
        $config['per_page'] = 100; 
        $config["num_links"] = 5;
        $this->pagination->initialize($config);
        $page_data['pagination'] = $this->pagination->create_links(); 
		$page_data['sellers'] = $this->admin->get_seller_lists( $q, (string)$config['per_page'], $page);
		$this->load->view('admin/sellers/overview', $page_data);
	}

	public function detail(){
		$id = cleanit(trim($this->uri->segment(3)));
		$page_data['page_title'] = 'Sellers Detail';
		$page_data['pg_name'] = 'sellers';
		$page_data['sub_name'] = 'sellers_detail';
		$page_data['profile'] = $this->admin->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$page_data['seller'] = $this->admin->get_profile($id);
		if( empty($page_data['seller']) || empty($id) ) {
			$this->session->set_flashdata('error_msg', 'Sorry the user details can not be found');
			redirect($_SERVER['HTTP_REFERRER']);
		}
		$page_data['sold_count'] = $this->admin->product_sold_count( $id );
		$page_data['product_count'] = $this->admin->product_count( $id );
		$page_data['products'] = $this->admin->get_product_list( $id);
		$this->load->view('admin/sellers/detail', $page_data);
	}

	public function approve(){
		$page_data['page_title'] = 'Approve Sellers';
		$page_data['pg_name'] = 'sellers';
		$page_data['sub_name'] = 'approve_sellers';
		$page_data['profile'] = $this->admin->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');


		$q = '';
		if( isset($_GET['q']) ) $q = cleanit( $q );
		$page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;

        if( $page > 1 ) $page -= 1;
        $lists = (array) $this->admin->get_seller_lists($q,'','','pending');
        $count = count( $lists );
		$this->load->library('pagination');
        $this->config->load('pagination'); // Load d config
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url() ;
        $config['total_rows'] = $count; 
        $config['per_page'] = 100; 
        $config["num_links"] = 5;
        $this->pagination->initialize($config);
        $page_data['pagination'] = $this->pagination->create_links(); 
		$page_data['sellers'] = $this->admin->get_seller_lists( $q, (string)$config['per_page'], $page, 'pending');

		$this->load->view('admin/sellers/approve', $page_data);
	}

}
