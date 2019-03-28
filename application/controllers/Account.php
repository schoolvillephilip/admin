<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        if( $this->input->post() ){
            // Lets start
            $report_type = $period = $status =  $query = '';
            $table_template = '<table id="statement-table" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Order Code</th>
                            <th>Product Name</th><th>Qty</th><th>Amount</th><th class="min-tablet">Date Initiated</th></tr></thead><tbody></tbody></table>';
            $report_type = $_POST['report_type'];
            switch ($report_type){
                case 'orders':
                case 'all':
                    $query = "SELECT o.order_code,  o.product_id, p.product_name, o.seller_id seller_id, s.legal_company_name, 
                              qty, amount, pay.name payment_method,
                              o.delivery_charge, o.commission,
                              SUM(amount + delivery_charge) total
                              FROM orders o 
                              JOIN products p ON(p.id = o.product_id) 
                              JOIN payment_methods pay ON(pay.id = o.payment_method) 
                              JOIN sellers s ON(s.uid = o.seller_id)";
                    if( $_POST['period'] ){
                        // If period was set
                        $period = $_POST['period'];
                        switch ($period) {
                            case 'this_month':
                                $query .= " WHERE MONTH(order_date) = MONTH(CURRENT_DATE) ";
                                break;
                            case 'last_month':
                                $query .= " WHERE order_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ";
                                break;
                            case 'last_3_months':
                                $query .= " WHERE order_date > DATE_SUB(NOW(), INTERVAL 3 MONTH) ";
                                break;
                            case 'this_year':
                                $query .= " WHERE YEAR(order_date) = YEAR(CURRENT_DATE) ";
                                break;
                            case 'last_year':
                                $last_year = date('Y', strtotime('last year'));
                                $query .= " WHERE YEAR(order_date) = '{$last_year}' ";
                                break;
                            default:
                                //all period
                                break;
                        }
                    }
                    if( $_POST['status'] ){
                        // If status was set
                        $status = $_POST['status'];
                        switch ($status) {
                            case 'success':
                                $query .= " AND payment_made = 'success'";
                                break;
                            case 'fail':
                                $query .= " AND payment_made = 'fail'";
                                break;
                            case 'pending':
                                $query .= " AND payment_made = 'pending ";
                                break;
                            default:
                                //all status
                                break;
                        }
                    }
                    $query .= " GROUP BY product_id, order_code ORDER BY o.id ASC";
                    $results = $this->admin->run_sql($query)->result();

                    if( $results ){
                        $gross_total = '';
                        $table_template ='<table id="statement-table" class="table table-striped table-bordered" cellspacing="0" width="100%">';
                        $table_template .= '<thead><tr><th>Order Code</th>
                            <th>Product Name</th><th>Seller</th><th>Qty</th><th>Payment Method</th><th>Amount</th><th>Delivery Charge</th><th>Commission</th><th>Total</th></tr></thead>';
                        $table_template .= '<tbody>';
                        foreach ($results as $result ){
                            $body = '';
                            $table_template .= '<tr>';
                                $body = '<td><a class="btn-link" href="' .base_url('orders/detail/' . $result->order_code). '">' .$result->order_code. '</a></td>';
                                $body .= '<td><a class="btn-link" href="' .base_url('product/detail/' . $result->product_id). '">' .$result->product_name. '</a></td>';
                                $body .= '<td><a class="btn-link" href="' .base_url('sellers/detail/' . $result->seller_id). '">' .$result->legal_company_name. '</a></td>';
                                $body .= '<td>'. $result->qty. '</td>';
                                $body .= '<td>'. $result->payment_method. '</td>';
                                $body .= '<td>'. ngn($result->amount). '</td>';
                                $body .= '<td>'. ngn($result->delivery_charge). '</td>';
                                $body .= '<td>'. ngn($result->commission). '</td>';
                                $body .= '<td>'. ngn($result->total). '</td>';
                            $table_template .= $body;
                            $table_template .= '</tr>';
                            $gross_total += $result->total;
                        }
                        $table_template .= '</tbody>';
                        $table_template .= '</table>';
                        $extras = '<div class="row">';
                        $extras .= "<div class='col-md-offset-4 col-md-pull-4'>";
                                $extras .= '<p><h3>Gross Total : </h3>' . ngn($gross_total);
                                $extras .= '</p>';
                        $extras .= '</div>';
                        $extras .= '</div>';
                        $table_template .= $extras;
                    }
                    $period = preg_replace("/[^A-Za-z]/", ' ', $_POST['period']);
                    $status = $_POST['status'];
                    $page_data['page_title'] = "Account Statement For {$_POST['report_type']} - Period: {$period} - status: {$status}";
                    $page_data['statement_table'] = $table_template;
                    break;

                case 'ap':
                    // Account payable
                    $query = "SELECT o.order_code,  o.product_id, p.product_name, qty, amount, o.order_Date,o.seller_id seller_id, s.legal_company_name
                              FROM orders o 
                              JOIN products p ON(p.id = o.product_id) 
                              JOIN sellers s ON(s.uid = o.seller_id)";
                    if( $_POST['period'] ){
                        // If period was set
                        $period = $_POST['period'];
                        switch ($period) {
                            case 'this_month':
                                $query .= " WHERE MONTH(order_date) = MONTH(CURRENT_DATE) ";
                                break;
                            case 'last_month':
                                $query .= " WHERE order_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ";
                                break;
                            case 'last_3_months':
                                $query .= " WHERE order_date > DATE_SUB(NOW(), INTERVAL 3 MONTH) ";
                                break;
                            case 'this_year':
                                $query .= " WHERE YEAR(order_date) = YEAR(CURRENT_DATE) ";
                                break;
                            case 'last_year':
                                $last_year = date('Y', strtotime('last year'));
                                $query .= " WHERE YEAR(order_date) = '{$last_year}' ";
                                break;
                            default:
                                //all period
                                break;
                        }
                    }
                    if( $_POST['status'] ){
                        // If status was set
                        $status = $_POST['status'];
                        switch ($status) {
                            case 'success':
                                $query .= " AND payment_made = 'success'";
                                break;
                            case 'fail':
                                $query .= " AND payment_made = 'fail'";
                                break;
                            case 'pending':
                                $query .= " AND payment_made = 'pending ";
                                break;
                            default:
                                //all status
                                break;
                        }
                    }
                    $query .= " GROUP BY product_id";
                    $results = $this->admin->run_sql($query)->result();
                    if( $results ){
                        $gross_total = '';
                        $table_template ='<table id="statement-table" class="table table-striped table-bordered" cellspacing="0" width="100%">';
                        $table_template .= '<thead><tr><th>Order Code</th>
                            <th>Product Name</th><th>Seller</th><th>Qty</th><th>Amount</th></tr></thead>';
                        $table_template .= '<tbody>';
                        foreach ($results as $result ){
                            $body = '';
                            $table_template .= '<tr>';
                            $body = '<td><a class="btn-link" href="' .base_url('orders/detail/' . $result->order_code). '">' .$result->order_code. '</a></td>';
                            $body .= '<td><a class="btn-link" href="' .base_url('sellers/detail/' . $result->seller_id). '">' .$result->legal_company_name. '</a></td>';
                            $body .= '<td>'. $result->qty. '</td>';
                            $body .= '<td>'. ngn($result->amount). '</td>';
                            $table_template .= $body;
                            $table_template .= '</tr>';
                            $gross_total += $result->amount;
                        }
                        $table_template .= '</tbody>';
                        $table_template .= '</table>';
                        $extras = '<div class="row">';
                        $extras .= "<div class='col-md-offset-4 col-md-pull-4'>";
                        $extras .= '<p><h3>Gross Total : </h3>' . ngn($gross_total);
                        $extras .= '</p>';
                        $extras .= '</div>';
                        $extras .= '</div>';
                        $table_template .= $extras;
                    }
                    $period = preg_replace("/[^A-Za-z]/", ' ', $_POST['period']);
                    $status = $_POST['status'];
                    $page_data['page_title'] = "Account Statement For {$_POST['report_type']} - Period: {$period} - status: {$status}";
                    $page_data['statement_table'] = $table_template;
                    break;

                case 'ar':
                    // Account Receivable
                    $query = "SELECT o.order_code,  o.product_id, p.product_name, qty, o.commission, o.order_Date
                              FROM orders o 
                              JOIN products p ON(p.id = o.product_id) ";
                    if( $_POST['period'] ){
                        // If period was set
                        $period = $_POST['period'];
                        switch ($period) {
                            case 'this_month':
                                $query .= " WHERE MONTH(order_date) = MONTH(CURRENT_DATE) ";
                                break;
                            case 'last_month':
                                $query .= " WHERE order_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ";
                                break;
                            case 'last_3_months':
                                $query .= " WHERE order_date > DATE_SUB(NOW(), INTERVAL 3 MONTH) ";
                                break;
                            case 'this_year':
                                $query .= " WHERE YEAR(order_date) = YEAR(CURRENT_DATE) ";
                                break;
                            case 'last_year':
                                $last_year = date('Y', strtotime('last year'));
                                $query .= " WHERE YEAR(order_date) = '{$last_year}' ";
                                break;
                            default:
                                //all period
                                break;
                        }
                    }
                    if( $_POST['status'] ){
                        // If status was set
                        $status = $_POST['status'];
                        switch ($status) {
                            case 'success':
                                $query .= " AND payment_made = 'success'";
                                break;
                            case 'fail':
                                $query .= " AND payment_made = 'fail'";
                                break;
                            case 'pending':
                                $query .= " AND payment_made = 'pending ";
                                break;
                            default:
                                //all status
                                break;
                        }
                    }
                    $query .= " GROUP BY product_id";
                    $results = $this->admin->run_sql($query)->result();
                    if( $results ){
                        $gross_total = '';
                        $table_template ='<table id="statement-table" class="table table-striped table-bordered" cellspacing="0" width="100%">';
                        $table_template .= '<thead><tr><th>Order Code</th>
                            <th>Product Name</th><th>Seller</th><th>Qty</th><th>Commission</th></tr></thead>';
                        $table_template .= '<tbody>';
                        foreach ($results as $result ){
                            $body = '';
                            $table_template .= '<tr>';
                            $body = '<td><a class="btn-link" href="' .base_url('orders/detail/' . $result->order_code). '">' .$result->order_code. '</a></td>';
                            $body .= '<td><a class="btn-link" href="' .base_url('sellers/detail/' . $result->seller_id). '">' .$result->legal_company_name. '</a></td>';
                            $body .= '<td>'. $result->qty. '</td>';
                            $body .= '<td>'. ngn($result->commission). '</td>';
                            $table_template .= $body;
                            $table_template .= '</tr>';
                            $gross_total += $result->commission;
                        }
                        $table_template .= '</tbody>';
                        $table_template .= '</table>';
                        $extras = '<div class="row">';
                        $extras .= "<div class='col-md-offset-4 col-md-pull-4'>";
                        $extras .= '<p><h3>Gross Total : </h3>' . ngn($gross_total);
                        $extras .= '</p>';
                        $extras .= '</div>';
                        $extras .= '</div>';
                        $table_template .= $extras;
                    }
                    $period = preg_replace("/[^A-Za-z]/", ' ', $_POST['period']);
                    $status = $_POST['status'];
                    $page_data['page_title'] = "Account Statement For {$_POST['report_type']} - Period: {$period} - status: {$status}";
                    $page_data['statement_table'] = $table_template;
                    break;

                default:
                    // ALL
                    break;


            };
        }
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

        $delivery_charge = $this->admin->run_sql("SELECT SUM(distinct(delivery_charge)) amount FROM orders WHERE payment_made = 'success' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code")->result_array();
        $page_data['delivery_charge'] = array_sum(array_column($delivery_charge, 'amount'));
        $commission = $this->admin->run_sql("SELECT SUM(commission) amount FROM orders WHERE payment_made = 'success' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code, product_id")->result_array();
        $page_data['commission'] = array_sum(array_column( $commission, 'amount'));
        $order_count = $this->admin->run_sql("SELECT SUM(qty) total FROM orders WHERE payment_made = 'success' AND YEAR(order_date) ='{$this_year}' GROUP BY order_code")->result_array();
        $page_data['order_count'] = array_sum(array_column( $order_count, 'total'));
        $avg = $this->admin->run_sql("SELECT SUM(qty) qty, COUNT(DISTINCT(buyer_id)) buyers FROM orders WHERE payment_made = 'success'")->result_array();

        // Successful Transactions
        $success_transaction = $this->admin->run_sql("SELECT SUM(amount * qty) amount FROM orders WHERE payment_made = 'success' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code")->result_array();
        $page_data['success_transaction'] = array_sum(array_column($success_transaction, 'amount'));

        // pending -Incoming payment ; probably payment on delivery
        $incoming_payment = $this->admin->run_sql("SELECT SUM(amount * qty) amount FROM orders WHERE payment_made = 'pending' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code")->result_array();
        $page_data['incoming_payment'] = array_sum(array_column($incoming_payment, 'amount'));

        // Failed transactions
        $failed_transaction = $this->admin->run_sql("SELECT SUM(amount * qty ) amount FROM orders WHERE payment_made = 'fail' AND YEAR(order_date) = '{$this_year}' GROUP BY order_code")->result_array();
        var_dump( $failed_transaction );
        exit;
        $page_data['failed_transaction'] = array_sum(array_column($failed_transaction, 'amount'));

        $page_data['avg_order'] = (array_sum(array_column( $avg, 'qty')) > 0 ) ? array_sum(array_column( $avg, 'qty')) / array_sum(array_column( $avg, 'buyers')) : 0;
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
        $page_data['profile'] = $this->admin->get_profile( $this->session->userdata('logged_id'));
        $this->load->view('account/txn_overview', $page_data);
    }
}
