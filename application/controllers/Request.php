<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect("/");
    }
    public function brand()
    {
        $page_data['page_title'] = 'Seller Brand Request';
        $page_data['pg_name'] = 'select_category';
        $page_data['sub_name'] = 'seller_request_brand';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['categories'] = $this->admin->get_results('categories')->result();
        $page_data['brands'] = $this->admin->get_results('brands', '(status = 0)');
        $this->load->view('brands/brand_request', $page_data);
    }
    public function approve_brand(){
        $id = $this->uri->segment(3);
        if( !$id )redirect($_SERVER['HTTP_REFERER']);
        if($this->admin->update_data( $id, array('status' => '1'), 'brands')){
            $this->session->set_flashdata('success_msg', 'The Brand Has Been Approved Successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
        }
        redirect('request/brand');
    }
}
