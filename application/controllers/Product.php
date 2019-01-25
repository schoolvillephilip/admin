<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$page_data['page_title'] = 'Product Overview';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'product_overview';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');

        $str = cleanit($this->input->get('q'));
        $page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;
        if ($page > 1) $page -= 1;
        $array = array('str' => $str, 'is_limit' => false);
        $x = (array)$this->admin->get_product_list('','',$array);
        $count = (count($x));
        $this->load->library('pagination');
        $this->config->load('pagination');
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url();
        $config['total_rows'] = $count;
        $config['per_page'] = 100;
        $config["num_links"] = 5;
        $this->pagination->initialize($config);
        $array['limit'] = $config['per_page'];
        $array['offset'] = $page;
        $array['is_limit'] = true;
        $page_data['pagination'] = $this->pagination->create_links();
		$page_data['products'] = $this->admin->get_product_list( '','',$array );
		$this->load->view('product/overview', $page_data);
	}

	public function detail(){
		$id = cleanit(trim($this->uri->segment(3)));
		$page_data['page_title'] = 'Product Detail';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'product_detail';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$page_data['product'] = $this->admin->get_single_product_detail( $id );
		$this->load->view('product/detail', $page_data);
	}

	public function approve($pid = '', $sid =''){
		$page_data['page_title'] = 'Approve Product';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'approve_product';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$page_data['products'] = $this->admin->get_unapprove_product();
		$this->load->view('product/approve', $page_data);
	}

	public function action($action, $pid = '', $sid =''){
		$pid = cleanit($pid);
		$sid = cleanit( $sid);
		if( $this->admin->product_listing_action($action, $pid, $sid) ){
			$this->session->set_flashdata('success_msg', 'The product has been ' . $action . 'ed successfully.');
            // Track the action
            $activity_log = array('uid' => $this->session->userdata('logged_id'),
                'context' => "The product with the Id (" . $pid . ") was " . $action. "ed"
            );
            $this->admin->insert_data(TABLE_SYSTEM_ACTIVITIES, $activity_log);
			redirect('product');
		}else{
			$this->session->set_flashdata('error_msg', 'Oops! There was error processing the action');
			redirect('product');
		}
	}
}
