<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

	public function __construct()
	{
		// @todo
		// Check if the user is already logged in
		// Also check where the user is coming from
		// $this->session->set_userdata('referred_from', current_url());
		parent::__construct();
		$this->load->model('seller_model', 'seller');
		if (!$this->session->userdata('logged_in')) {
			// Ursher the person to where he is coming from
			$from = $this->session->userdata('referred_from');
			if (!empty($from)) redirect($from);
			redirect('login');
		}
//        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
//        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
//        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
//        $this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		$page_data['page_title'] = 'Choose Category';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'select_category';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('choose_category', $page_data);
	}

	public function root_category()
	{
		$page_data['page_title'] = 'Select Root Category';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'root_category';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/root_category', $page_data);
	}

	public function root_category_detail()
	{
		$page_data['page_title'] = 'Root Category Detail';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'root_category_detail';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/root_category_detail', $page_data);
	}

	public function category()
	{
		$page_data['page_title'] = 'Select Category';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'category';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/category', $page_data);
	}

	public function category_detail()
	{
		$page_data['page_title'] = 'Category Detail';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'category_detail';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/category_detail', $page_data);
	}

	public function sub_category()
	{
		$page_data['page_title'] = 'Select Sub Category';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'sub_category';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/sub_category', $page_data);
	}

	public function sub_category_detail()
	{
		$page_data['page_title'] = 'Sub Category Detail';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'sub_category_detail';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/sub_category_detail', $page_data);
	}

	public function specification()
	{
		$page_data['page_title'] = 'Select Specification';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'specification';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/specification', $page_data);
	}

	public function specification_detail()
	{
		$page_data['page_title'] = 'Specification Detail';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'specification_detail';
		$page_data['profile'] = $this->seller->get_profile_details(base64_decode($this->session->userdata('logged_id')),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/specification_detail', $page_data);
	}

}
