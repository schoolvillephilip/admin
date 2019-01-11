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


	/*
	 * public 'id' => string '11' (length=2)
      public 'product_id' => string '2' (length=1)
      public 'order_code' => string '14782539' (length=8)
      public 'first_name' => string 'Jonathan' (length=8)
      public 'last_name' => string 'Griffin' (length=7)
      public 'phone' => string '080142445414' (length=12)
      public 'phone2' => string '' (length=0)
      public 'address' => string 'Planet Estate Viciao' (length=20)
      public 'area' => string 'ukwuano' (length=7)
      public 'state' => string 'Abia State' (length=10)
      public 'seller_id' => string '3' (length=1)
      public 'qty' => string '1' (length=1)
      public 'amount' => string '300000' (length=6)
      public 'order_date' => string '2018-12-10 16:20:58' (length=19)
      public 'status' => string '{"processing":{"msg":"Your order payment is processing","datetime":"2018-12-10 16:20:58"}}' (length=90)
      public 'active_status' => string 'pending' (length=7)
      public 'product_name' => string 'Samsung Galaxy J6 - Purple' (length=26)
      public 'legal_company_name' => string 'Schoolville Limited' (length=19)
      public 'email' => string 'philipsokoya@gmail.com' (length=22)
      public 'seller_email' => string 'philipsokoya@gmail.com' (length=22)*/

	// Mark order based on status
	function mark_order(){
        if( $this->input->is_ajax_request() ){
            $status = $this->input->post('type');
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $address = $this->input->post('address');

            if( $this->admin->mark_order( $id , $status) ){
                // Send Mail to the buyer when the status is 'shipped'
                try {
                    if( $status == 'shipped') {
                        $email_array = array('email' => $email, 'recipent' => $name, 'address' => $address);
                        $this->load->model('email_model', 'email');
                        $this->email->mark_order($email_array);
                    }
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
