<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if (!$this->session->userdata('logged_in')) {
            $from = $this->session->userdata('referred_from');
            if (!empty($from)) redirect($from);
            redirect('login');
        }
    }

    public function index(){
        $page_data['page_title'] = 'Admin Dashboard';
        $page_data['pg_name'] = 'dashboard';
        $page_data['sub_name'] = 'dashboard';
        $page_data['least_sub'] = '';
        $id = $this->session->userdata('logged_id');
        $page_data['profile'] = $this->admin->get_profile_details( $id,
            'first_name,last_name,email,profile_pic');
        if( $this->session->userdata('group_id') == 4 ){ # Sales Rep
            // Sales Rep Dashboard
            $page_data['completed_orders'] = $this->admin->get_num_rows('orders', array('agent' => $id, 'payment_status' => 'success'));
            $page_data['progress_orders'] = $this->admin->get_num_rows('orders', array('agent' => $id, 'payment_status != ' => 'completed'));
            $page_data['dispute_orders'] = $this->admin->get_num_rows('orders', array('agent' => $id, 'active_status = ' => 'returned'), array('active_status' => 'cancelled'));
            $this->load->view('salesrep/dashboard', $page_data);
        }else{
            $page_data['buyers_stats'] = $this->admin->get_num_rows('users');
            $page_data['sellers_stats'] = $this->admin->get_num_rows('sellers');
            $page_data['products_approved_stats'] = $this->admin->get_num_rows('products', array('product_status' => 'approved'));
            $page_data['products_pending_stats'] = $this->admin->get_num_rows('products', array('product_status' => 'pending'));
            $page_data['order_completed_stats'] = $this->admin->get_num_rows('orders', array('active_status' => 'completed'));
            $page_data['other_stats'] = $this->admin->get_num_rows('orders', array('active_status != ' => 'completed'));
            $today = get_now(); $next_monday = date('Y-m-d H:i:s', strtotime('next monday'));
            $this_monday = date('Y-m-d H:i:s', strtotime('last monday'));
            $seven_days = date('Y-m-d H:i:s', strtotime('7 day ago'));
            $page_data['new_product_count'] = $this->admin->run_sql("SELECT * FROM products WHERE (DATE(created_on) >= '{$seven_days}')")->num_rows();
            $page_data['new_user_count'] = $this->admin->run_sql("SELECT * FROM users WHERE SUBDATE(NOW(), 'INTERVAL 7 DAY')")->num_rows();
            $this_week_sales = $this->admin->run_sql("SELECT SUM(amount * qty ) amt FROM orders WHERE (DATE(order_date) >= '{$this_monday}' AND DATE(order_date) < '$next_monday') AND payment_made = 'success' GROUP BY order_code")->result_array();
            $page_data['this_week_sales'] = array_sum(array_column($this_week_sales, 'amt'));
            $page_data['new_buyer'] = $this->admin->run_sql("SELECT * FROM users WHERE (DATE(date_registered) >= '{$seven_days}')")->num_rows();
            $page_data['order_chart'] = $this->admin->order_chart();
            $today_sales = $this->admin->run_sql("SELECT SUM(amount * qty ) amt FROM orders WHERE DATE(order_date) = '{$today}' AND payment_made = 'success' GROUP BY order_code")->result_array();
            $page_data['today_sales'] = array_sum(array_column($today_sales, 'amt'));
            $this->load->view('dashboard', $page_data);
        }
    }
}
