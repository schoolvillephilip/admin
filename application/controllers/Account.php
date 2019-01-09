<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if (!$this->session->userdata('logged_in')) {
            $from = $this->session->userdata('referred_from');
            if (!empty($from)) redirect($from);
            redirect('login');
        }
    }

    //FAQ
    public function index()
    {
        redirect('account/statement');
    }

    public function statement()
    {
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Account Statement";
        $page_data['sub_name'] = "statement";
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile($this->session->userdata('logged_id'));
        $this->load->view('account/statement', $page_data);
    }

    public function sales_report()
    {
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Sales Report";
        $page_data['sub_name'] = "sales_report";
        $page_data['least_sub'] = '';
        $page_data['order_chart'] = "";
        $page_data['gross_chart'] = "";
        $page_data['profile'] = $this->admin->get_profile($this->session->userdata('logged_id'));
        $this->load->view('account/report', $page_data);
    }
    public function payout()
    {
        $uid = $this->session->userdata('logged_id');
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Payout Requests";
        $page_data['sub_name'] = "payout";
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile($uid);
        $page_data['requests'] = $this->admin->get_payment_request();
        $this->load->view('account/payout', $page_data);
    }
    public function history()
    {
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Payout History";
        $page_data['sub_name'] = "history";
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile($this->session->userdata('logged_id'));
        $this->load->view('account/history', $page_data);
    }

    public function txn_overview()
    {
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Transaction Overview";
        $page_data['sub_name'] = "statement";
        $page_data['least_sub'] = '';
        $page_data['txn_chart'] = "";
        $page_data['profile'] = $this->admin->get_profile($this->session->userdata('logged_id'));
        $this->load->view('account/txn_overview', $page_data);
    }
}
