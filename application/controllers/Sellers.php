<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller
{

	public function __construct(){
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
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id')	,
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
		$page_data['sellers'] = $this->admin->get_seller_lists( $q, (string)$config['per_page'], $page, 'approved');
//		 var_dump($page_data['sellers']);
		$this->load->view('sellers/overview', $page_data);
	}

    public function all_users(){
        $page_data['page_title'] = 'All Users';
        $page_data['pg_name'] = 'sellers';
        $page_data['sub_name'] = 'users';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id')	,
            'first_name,last_name,email,profile_pic');
        $q = '';
        if( isset($_GET['q']) ) $q = cleanit( $q );
        $page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;

        if( $page > 1 ) $page -= 1;
        $lists = (array) $this->admin->get_user_lists($q);
        $count = count( $lists );
        $this->load->library('pagination');
        $this->config->load('pagination'); // Load d config
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url() ;
        $config['total_rows'] = $count;
        $config['per_page'] = 10;
        $config["num_links"] = 5;
        $this->pagination->initialize($config);
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['users'] = $this->admin->get_user_lists( $q, (string)$config['per_page'], $page);
        $this->load->view('sellers/all_users', $page_data);
    }

	public function detail(){
		$id = cleanit(trim($this->uri->segment(3)));
		$page_data['page_title'] = 'Sellers Detail';
		$page_data['pg_name'] = 'sellers';
		$page_data['sub_name'] = 'sellers_detail';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id')	,
			'first_name,last_name,email,profile_pic');

		$page_data['seller'] = $this->admin->get_profile($id);
		if( empty($page_data['seller']) || empty($id) ) {
			$this->session->set_flashdata('error_msg', 'Sorry the user details can not be found');
			redirect($_SERVER['HTTP_REFERRER']);
		}
		$page_data['sold_count'] = $this->admin->product_sold_count($id );
		$page_data['product_count'] = $this->admin->product_count($id );

		$page_data['products'] = $this->admin->get_product_list($id,'',array('is_limit' => false));
		$this->load->view('sellers/detail', $page_data);
	}

	public function approve(){
		$page_data['page_title'] = 'Approve Sellers';
		$page_data['pg_name'] = 'sellers';
		$page_data['sub_name'] = 'approve_sellers';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id')	,
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
		$this->load->view('sellers/approve', $page_data);
	}

//	function approve_seller(){
//		if( $this->input->post() ){
//			$data['is_seller'] = 'approved';
//			if( $this->admin->update_data($this->input->post('seller_id'), array('is_seller' => 'approved'), 'users') ){
//				// .. update the seller's table also
//				$this->admin->update_data($this->input->post('seller_id'), array('status' => 'approved'), 'sellers', 'uid' );
//				$this->session->set_flashdata('success_msg','The seller account has been approved');
//			}
//		}
//		redirect($_SERVER['HTTP_REFERER']);
//	}

	function action( $action ='' , $seller_id = ''){
		if( !empty($action) && !empty( $seller_id ) ) {
			if( $this->admin->seller_account_action( $action, $seller_id) ){
				$this->session->set_flashdata('success_msg','The seller account has been '.$action);
			}else{
				$this->session->set_flashdata('error_msg','The seller account has been ' .$action);
			}
		}else{
            $this->session->set_flashdata('error_msg', 'The action you are trying to perform is not allowed.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function update_user_role(){
        if( $this->input->is_ajax_request() ){
            $update_type = $this->input->post('update_type');
            $update_value = $this->input->post('update_value');
            $update_id = $this->input->post('update_id');

            if( $this->admin->update_role($update_type, $update_value, $update_id) ){
                $activity_log = array('uid' => $this->session->userdata('logged_id'),
                    'context' => "The user with {$update_id} has been updated to {$update_type}"
                );
                $this->admin->insert_data(TABLE_SYSTEM_ACTIVITIES, $activity_log);
                echo json_encode(array('status' => 1));
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo json_encode(array('status' => 0));
                exit;
            }
        }
    }

}
