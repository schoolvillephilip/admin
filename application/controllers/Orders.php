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
//        var_dump($page_data['orders'] );
		$this->load->view('orders/detail', $page_data);
	}

	// Mark order based on status
    /* When an order is marked as shipped, all the items should be marked as shipped by the order_code
     * When am order is marked as delivered ,completed, and returned the single Item will be marked as that status
     * */
	function mark_order(){
        if( $this->input->is_ajax_request() ){
            $status = $this->input->post('type');
            $order_code = $this->input->post('order_code');
            $id = $this->input->post('id');

            if( $this->admin->mark_order($status, $id, $order_code) ){
                if( $status == 'shipped' ){
                    // Send Mail to the buyer when the status is 'shipped'
                    $this->load->model('email_model', 'email');
                    $this->email->shipped_order( $order_code );
                    $this->session->set_flashdata('success_msg', 'The Order Item(s) has been marked has shipped');
                    echo '';
                    exit;
                }elseif( $status == 'returned'){
                    // Send mail to seller and notification
                    $this->session->set_flashdata('success_msg', 'The order Item has been marked has returned');
                    echo '';
                    exit;
                }else{
                    $this->session->set_flashdata('success_msg', 'The order Item has been marked has ' . $status );
                    echo exit;
                }
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo '';
                exit;
            }
        }
    }
}
