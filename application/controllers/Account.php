<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller
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
        $id = $this->session->userdata('logged_id');
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Account Statement";
        $page_data['sub_name'] = "statement";
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile($id);
        $this->load->view('account/statement', $page_data);
    }

    public function sales_report()
    {
        $uid = $this->session->userdata('logged_id');
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Sales Report";
        $page_data['sub_name'] = "sales_report";
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile( $uid );
        // queries
        $this_year = date('Y', strtotime('this year'));
        $page_data['total_sales'] = $this->admin->run_sql("SELECT SUM(amount) amount FROM orders WHERE active_status = 'completed' AND YEAR(order_date) = '{$this_year}'")->row();
        $page_data['delivery_charge'] = $this->admin->run_sql("SELECT SUM(delivery_charge) amount FROM orders WHERE active_status = 'completed' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code")->row();

        $page_data['commission'] = $this->admin->run_sql("SELECT SUM(commission) amount FROM orders WHERE active_status = 'completed' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code")->row();
        $page_data['order_count'] = $this->admin->run_sql("SELECT SUM(qty) total FROM orders WHERE active_status = 'completed' AND YEAR(order_date) ='{$this_year}' GROUP BY order_code")->row();
        $avg = $this->admin->run_sql("SELECT SUM(qty) qty, COUNT(DISTINCT(buyer_id)) buyers FROM orders WHERE active_status='completed'")->row();
        $page_data['avg_order'] = $avg->qty/$avg->buyers;
        $page_data['top_orders'] = $this->admin->top_20_sales();
        $page_data['order_chart'] = $this->admin->order_chart();
        $page_data['gross_chart'] = "";
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
        // Queries
        $next_monday = date('Y-m-d', strtotime('next monday'));
        $today = get_now();
        $page_data['this_week'] = $this->admin->run_sql("SELECT SUM(amount) amt FROM payouts WHERE status = 'completed' AND DATE(date_approved) >='{$today}' AND DATE(date_approved) < '{$next_monday}' ")->row();
        $page_data['payment_history'] = $this->admin->run_sql("SELECT SUM(amount) amount FROM payouts WHERE status = 'completed'")->row();

        $this->load->view('account/payout', $page_data);
    }

    function payment_request(){
        if( $this->input->is_ajax_request() && $this->input->post()){
            $id = $this->input->post('id');
            echo json_encode( $this->admin->get_payment_request( $id ));
            exit; 
        }
    }

    function payment_made(){
        $pid = $this->input->post('pid', true);
        $uid = $this->input->post('uid', true);
        $amount = $this->input->post('amount', true);
        $bank_details = $this->input->post('bank_details', true);
        $payment_id = $this->input->post('txn_code', true);
        if( $pid && $uid ){
            try {
                $approved_by = $this->session->userdata('logged_id');
                $updatedata = array('status' => 'completed', 'date_approved' => get_now(), 'approved_by' => $approved_by);
                $this->admin->update_data($pid, $updatedata, 'payouts');
                $user = $this->admin->get_profile($uid);
                $recipent = 'Dear '. $user->legal_company_name;
                $email_array = array(
                    'email' => $user->email,
                    'recipent' => $recipent,
                    'amount'   => $amount,
                    'bank_details' => $bank_details,
                    'payment_id'    => $payment_id
                );
                $this->load->model('email_model', 'email');
                $this->email->payment_made_to_seller( $email_array );
                $this->session->set_flashdata('success_msg', 'Payment has been marked completed...');
                $activity_log = array('uid' => $this->session->userdata('logged_id'),'context' => "An amount of ".ngn($amount)." was just made to {$recipent} ( {$user->email} )"
                    );
                $this->admin->insert_data(TABLE_SYSTEM_ACTIVITIES, $activity_log);
                $seller = array('seller_id' => $uid,'title' => 'Payment Made',
                    'content' => "A payment was just made to your bank details ({$bank_details}). Thanks for partnering with us."
                );
                $this->admin->insert_data(TABLE_SELLER_NOTIFICATION_MESSAGE, $seller );
            } catch (Exception $e) {
                $this->session->set_flashdata('error_msg', "Error : " . $e);
            }
            redirect('account/payout');
        }
    }
    // Payment History in the system
    public function history()
    {
        $id = $this->session->userdata('logged_id');
        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Payout History";
        $page_data['sub_name'] = "history";
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile( $id );
        $page_data['histories'] = $this->admin->payment_history();
        $this->load->view('account/history', $page_data);
    }

    public function txn_overview()
    {

        $page_data['pg_name'] = 'report';
        $page_data['page_title'] = "Transaction Overview";
        $page_data['sub_name'] = "statement";
        $page_data['least_sub'] = '';
        $page_data['txn_chart'] = "";
        $page_data['profile'] = $this->admin->get_profile();
        $this->load->view('account/txn_overview', $page_data);
    }
}
