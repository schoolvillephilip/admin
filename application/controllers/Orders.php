<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $type = cleanit( $this->uri->segment(3));
        $page_data['page_title'] = 'Orders Overview';
        $page_data['pg_name'] = 'orders';
        $page_data['sub_name'] = 'orders_overview';
        $page_data['least_sub'] = '';
        $id = $this->session->userdata('logged_id');
        $page_data['profile'] = $this->admin->get_profile_details( $id,
            'first_name,last_name,email,profile_pic, groups');
        // Site Administrator // Manager // Sales_rep
        $page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;
        if ($page > 1) $page -= 1;
        $array = array('is_limit' => false);
        $x = (array)$this->admin->get_orders_by_type( $type, $array);
        $count = (count($x));
        $this->load->library('pagination');
        $this->config->load('pagination');
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url();
        $config['total_rows'] = $count;
        $config['per_page'] = 100;
        $config["num_links"] = 10;
        $this->pagination->initialize($config);
        $array['limit'] = $config['per_page'];
        $array['offset'] = $page;
        $array['is_limit'] = true;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['orders'] = $this->admin->get_orders_by_type( $type, $array );

        if( $this->session->userdata('group_id') == 4 ) { # Sales Rep
            $this->load->view('salesrep/orders/overview', $page_data);
        }else{
            $page_data['agents'] = $this->admin->get_agent();
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
        $page_data['orders'] = $this->admin->get_order_detail( $order_code, $uid );
        if( $this->session->userdata('group_id') == 4 ){ # Sales Rep
            $this->load->view('salesrep/orders/detail', $page_data);
        }else{
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
        // Some crazy checks
        $group = $this->session->userdata('group_id');
        if( $group > 2  ){
            $this->session->set_flashdata('error_msg', "Watch your step... The ground is slippery because you don't have the role to do this :(");
            echo json_decode(array('status' => 0 ));
            exit;
        }
	    $order_code = $this->input->post('order_code');
	    $agent_id = $this->input->post('agent_id');
        try {
            // Mail the agent
            $this->admin->update_data($order_code, array('agent' => $agent_id), 'orders',  'order_code');
            $this->session->set_flashdata('success_msg','The Order Items has been assigned to the agent');
            echo json_encode(array('status' => 1));
            exit;
        } catch (Exception $e) {
            $this->session->set_flashdata('error_msg','There was an error performing the action.');
        }
        echo json_encode(array('status' => 0));
        exit;
    }

    function validate_order(){
        // Crazy checks as ususl
        if( !in_array($this->session->userdata('group_id'), array(1,3))){
            $this->session->set_flashdata('error_msg', "Watch your step... The ground is slippery because you don't have the admin role to do this :(");
            echo '';
            exit;
        }
        $order_code = $this->input->post('order_code');
        $row = $this->admin->run_sql("SELECT txnref, SUM(amount) amount, delivery_charge, status,active_status FROM orders WHERE order_code = {$order_code}")->row();
        $total = $row->amount + $row->delivery_charge;
        $validate_array = array(
            'amount' => $total * 100,
            'txn_ref' => $row->txnref
        );
        $this->load->library('sitelib');
        $response = $this->sitelib->interswitch_curl( $validate_array );
        if( $response ){
            $ResponseDescription = (isset($response['ResponseDescription'])) ? $response['ResponseDescription'] : 'Payment was not successful';
            $PaymentReference = (isset($response['PaymentReference'])) ? $response['PaymentReference'] : null;
            $RetrievalReferenceNumber = (isset($response['RetrievalReferenceNumber'])) ? $response['RetrievalReferenceNumber'] : null;
            if($response['ResponseCode'] !== '00') {
                // Transaction get K-leg
                $json_array = json_decode($row->status, true);
                $array = array("cancelled" => array('msg' => "Order was marked as cancelled : {$ResponseDescription}", 'datetime' => get_now()));
                $status_array = array_merge($json_array, $array);
                $status_array = json_encode($status_array);
                $update_array = array(
                    'status' => $status_array,
                    'active_status' => 'cancelled',
                    'payment_made' => 'fail',
                    'paymentDesc'   => $ResponseDescription,
                    'payRef'        => $PaymentReference,
                    'responseCode'  => $response['ResponseCode']
                );
                $this->admin->update_data( $order_code, $update_array, 'orders', 'order_code');
                $this->session->set_flashdata('error_msg', 'Transaction is invalid:' . $ResponseDescription .' and the transaction reference number is:' . $row->txnref);
                echo '';
                exit;
            }else{
                // Order is successful
                $update_array = array(
                    'active_status' => 'certified',
                    'payment_made' => 'success',
                    'paymentDesc'   => $response['ResponseDescription'],
                    'payRef'        => $PaymentReference,
                    'retRef'        => $RetrievalReferenceNumber,
                    'apprAmt'       => $response['Amount'] / 100,
                    'responseCode'  => $response['ResponseCode']
                );
                $this->admin->update_data( $order_code, $update_array, 'orders', 'order_code');
                $this->session->set_flashdata('success_msg', 'The payment is valid, and has been marked has valid...');
                echo '';
                exit;
            }
        }
    }


    // View payment via bank transfer
    public function bank_transfer_view(){
        $page_data['page_title'] = 'Bank Transfer Payment Overview';
        $page_data['pg_name'] = 'orders';
        $page_data['sub_name'] = 'orders_overview';
        $page_data['least_sub'] = '';
        $id = $this->session->userdata('logged_id');
        $page_data['profile'] = $this->admin->get_profile_details( $id,
            'first_name,last_name,email,profile_pic, groups');
        $order_code = cleanit($this->uri->segment(3));
        $page_data['order'] = $this->admin->payment_by_bank_details( $order_code );
        $page_data['order_code'] = $order_code;
//        var_dump($page_data['order']); exit;
        $this->load->view('orders/bank_transfer', $page_data);
    }


    function bank_transfer_process(){

        $order = $o = $this->input->post('order');
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $phone = $this->input->post('phone');
        $name = $this->input->post('name');
        $json_array = json_decode($status, true);
        $update_array = array();
        switch ($action) {
            case 'cancelled':
                $array = array("cancelled" => array('msg' => "Order was marked as cancelled : Transaction not completed.", 'datetime' => get_now()));
                $status_array = array_merge($json_array, $array);
                $update_array['status'] = json_encode($status_array);
                $update_array['active_status'] = 'cancelled';
                $update_array['payment_made'] = 'fail';
                try {
                    $this->admin->update_data($order, $update_array, 'orders', 'order_code');
                    // Release the order back
                    $orders = $this->admin->run_sql("SELECT qty, product_variation_id FROM orders WHERE order_code = '{$order}'")->result();
                    foreach( $orders as $order ){
                        $this->admin->set_field('product_variation', 'quantity', "quantity+{$order->qty}", array('id' => $order->product_variation_id));
                    }
                    $this->session->set_flashdata('success_msg', "The order has been marked as cancelled.");
                } catch (Exception $e) {
                    $this->session->set_flashdata('error_msg', "There was an error updating the order." . $e);
                }
                break;
            case 'certified':
                $array = array("certified" => array('msg' => "Order payment verification was successful.", 'datetime' => get_now()));
                $status_array = array_merge($json_array, $array);
                $update_array['status'] = json_encode($status_array);
                $update_array['active_status'] = 'certified';
                $update_array['payment_made'] = 'success';
                try {
                    $this->admin->update_data($order, $update_array, 'orders', 'order_code');
                    $this->session->set_flashdata('success_msg', "The order has been marked has certified/success.");
                } catch (Exception $e) {
                    $this->session->set_flashdata('error_msg', "There was an error updating the order.");
                }
                // send SMS to the user First Install Africasta
//                $buyer_message = "Dear {$name}, your order {$order} payment has been verified. Kindly login to your Onitshamarket.com account to view order status.";
//                $sms_array = array( $phone => $buyer_message );
//                $this->load->library('AfricaSMS', $sms_array);
//                $this->africasms->sendsms();
                break;
            default:
                break;
        }
//        die( $order );
        redirect( 'orders/bank_transfer_view/' . $o .'/');
    }
}
