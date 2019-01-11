<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller{

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
        $page_data['page_title'] = 'Orders Overview';
        $page_data['pg_name'] = 'orders';
        $page_data['sub_name'] = 'orders_overview';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['orders'] = $this->admin->get_orders();

        $this->load->view('orders/overview', $page_data);
    }

    public function detail(){

        $id = cleanit( $this->uri->segment(3));
		$page_data['page_title'] = 'Orders Detail';
		$page_data['pg_name'] = 'orders';
		$page_data['sub_name'] = 'orders_detail';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
        $page_data['orders'] = $this->admin->get_orders( $id );
		$this->load->view('orders/detail', $page_data);
	}

	// Mark order based on status
	function mark_order(){
        if( $this->input->is_ajax_request() ){
            $status = $this->input->post('type');
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            if( $this->admin->mark_order( $id , $status) ){
                // Send Mail
                try {
                    $email_array = array('email' => $email);
                    $this->load->model('email_model', 'email');
                    $this->email->mark_order($email_array);
                    echo json_encode(array('status' => 'success'));
                    exit;
                } catch (Exception $e) {
                    echo json_encode(array('status' => 'error' , 'msg' => $e));
                    exit;
                }
            }
        }
    }
}
