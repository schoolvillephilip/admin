<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

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
		// $q = '';
		// if( isset($_GET['q']) ) $q = cleanit( $q );
		// $page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;

  //       if( $page > 1 ) $page -= 1;
  //       $lists = (array) $this->admin->get_product_list();
  //       $count = count( $lists );
		// $this->load->library('pagination');
  //       $this->config->load('pagination'); // Load d config
  //       $config = $this->config->item('pagination');
  //       $config['base_url'] = current_url() ;
  //       $config['total_rows'] = $count; 
  //       $config['per_page'] = 100; 
  //       $config["num_links"] = 5;
  //       $this->pagination->initialize($config);
        // $page_data['pagination'] = $this->pagination->create_links(); 
		$page_data['products'] = $this->admin->get_product_list();
		$this->load->view('admin/product/overview', $page_data);
	}

	public function detail(){
		$id = cleanit(trim($this->uri->segment(3)));
		$page_data['page_title'] = 'Product Detail';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'product_detail';
		$page_data['profile'] = $this->admin->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$page_data['product'] = $this->admin->get_single_product_detail( $id );
		var_dump( $page_data['product'] );
		$this->load->view('admin/product/detail', $page_data);
	}

}
