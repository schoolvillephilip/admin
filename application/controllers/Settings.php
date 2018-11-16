<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{

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

	public function index()
	{
		$page_data['page_title'] = 'General Settings';
		$page_data['pg_name'] = 'settings';
		$page_data['sub_name'] = 'gen_set';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/settings/general', $page_data);
	}

    public function mail()
    {
        $page_data['page_title'] = 'Mail Settings';
        $page_data['pg_name'] = 'settings';
        $page_data['sub_name'] = 'mail_set';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('admin/settings/mail', $page_data);
    }
    public function payment()
    {
        $page_data['page_title'] = 'Payment Methods';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'payment_set';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('admin/settings/payment', $page_data);
    }
    public function discount($page)
    {
        switch ($page) {
            case 'giftcards' :
                $page_data['page_title'] = 'Gift Cards';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'gift_card';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('admin/settings/discount/gift', $page_data);
                break;
            case 'coupons' :
                $page_data['page_title'] = 'Discount Coupons';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'coupon';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('admin/settings/discount/coupon', $page_data);
                break;
            case 'special' :
                $page_data['page_title'] = 'Special Offers';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'special';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('admin/settings/discount/special', $page_data);
                break;
            default:

        }
    }








	/*
     * Pages Settings controller
	 * - Home Page
	 * - Category
	 * - Checkout
	 * - Single Product
     * */

	public function home()
		//Home Page
	{
		$page_data['page_title'] = 'Homepage Settings';
		$page_data['pg_name'] = 'store_settings';
		$page_data['sub_name'] = 'page_settings';
		$page_data['least_sub'] = 'homepage';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$this->load->view('admin/settings/pages/home', $page_data);
	}
}
