<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $order_code = $this->input->get('order_code', true);
        $page_data['page_title'] = 'Orders Overview';
        $page_data['pg_name'] = 'orders';
        $page_data['sub_name'] = 'orders_overview';
        $page_data['least_sub'] = '';
        $id = $this->session->userdata('logged_id');
        $page_data['profile'] = $this->admin->get_profile_details( $id,
            'first_name,last_name,email,profile_pic, groups');

        if( $this->session->userdata('group_id') == 4 ) { # Sales Rep
            $page_data['orders'] = $this->admin->get_orders_for_salesrep( $order_code, $id);
            $this->load->view('salesrep/orders/overview', $page_data);
        }else{
            // Site Administrator // Manager
            if( !$order_code) $order_code = '';
            $page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;
            if ($page > 1) $page -= 1;
            $array = array('is_limit' => false);
            $x = (array)$this->admin->get_orders( $order_code,$array);
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
            $page_data['orders'] = $this->admin->get_orders( $order_code, $array );
            $this->load->view('orders/overview', $page_data);
        }
    }

    public function detail(){
        $order_code = cleanit( $this->uri->segment(3));
        $uid = $this->session->userdata('logged_id');
		$page_data['page_title'] = 'Orders Detail';
		$page_data['pg_name'] = 'orders';
		$page_data['sub_name'] = 'orders_detail';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details( $uid,
			'first_name,last_name,email,profile_pic,groups');
        if( $this->session->userdata('group_id') == 4 ){ # Sales Rep
            $page_data['orders'] = $this->admin->get_orders_for_salesrep( $order_code, $uid );
            $this->load->view('salesrep/orders/detail', $page_data);
        }else{
            $page_data['orders'] = $this->admin->get_orders( $order_code , array('is_limit' => false));

            $this->load->view('orders/detail', $page_data);
        }
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
                    try {
                        $this->email->shipped_order( $order_code );
                        $this->session->set_flashdata('success_msg', 'The Order Item(s) has been marked has shipped');
                        echo json_encode(array('status' => 1));
                        exit;
                    } catch (Exception $e) {
                        $email_error = array( 'error_action' => "Error: When marking an order - {$order_code} ", 'error_message' => $e, 'datetime' => get_now());
                        $this->admin->insert_data('error_logs', $email_error);
                    }
                }elseif( $status == 'returned'){
                    // Send mail to seller and notification
                    // lets do some calculation and return the buyers money to his wallet
                    $response = $this->admin->return_order( $id );
                    if( $response ) {
                        // send SMS to the buyer
                        $buyer_msg = "Hello {$response['first_name']},a refund amount for an item returned has been credited to your waller. Onitshamarket.com";
                        $sms_array = array($response['phone'] => $buyer_msg);
                        $this->load->library('AfricaSMS', $sms_array);
                        $this->africasms->sendsms();
                    }
                    try {
//                        $this->email->returned_order( $response );
                        $this->session->set_flashdata('success_msg', 'The order Item has been marked has returned');
                        $seller = $this->admin->get_order_seller($id);
                        $this->admin->notify_seller( $seller->seller_id, 'Product Returned',
                            "Notifying you that the product ( " . $seller->product_name ." ) was just returned, and the product money has been refunded.");
                        //Do we still need to send the SMS or email
                        echo json_encode(array('status' => 1));
                        exit;
                    } catch (Exception $e) {
                        $email_error = array( 'error_action' => "Error: When marking an order - {$order_code} ", 'error_message' => "The order unique id - {$id}. Error message {$e}.", 'datetime' => get_now());
                        $this->admin->insert_data('error_logs', $email_error);
                    }
                    echo json_encode(array('status' => 1));
                    exit;
                }else{
                    $this->session->set_flashdata('success_msg', 'The order Item has been marked has ' . $status );
                    echo json_encode(array('status' => 1));
                    exit;
                }
                // The logged in user that perform the action
                $action = array(
                    'uid' => $this->session->userdata('logged_id'),
                    'context' => "The %s marked the item(s) has {$status}. Having Order #{$order_code} - {$id}"
                );
                $this->admin->insert_data(TABLE_SYSTEM_ACTIVITIES, $action);
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo json_encode(array('status' => 0));
                exit;
            }
        }
    }

    /*
     * Assign an agent to an order items
     * */
    function assign_agent(){
	    $order_code = $this->input->post('order_code');
	    $agent_id = $this->input->post('agent_id');
        try {
            $this->admin->update_data($order_code, array('agent' => $agent_id),TABLE_ORDERS,  'order_code');
            // Mail the agent
            $this->session->set_flashdata('success_msg','The Order Items has been assigned to the agent');
            echo json_encode(array('status' => 1));
            exit;
        } catch (Exception $e) {
            $this->session->set_flashdata('error_msg','There was an error performing the action.');
        }
        echo json_encode(array('status' => 0));
        exit;
    }
}
