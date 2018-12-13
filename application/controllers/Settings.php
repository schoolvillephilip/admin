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
        if ($this->input->post()) {
            $data = array();
            foreach ($_POST as $key => $value) {
                $data[$key] = cleanit($value);
            }
            $update = $this->input->post('update');
            if (!empty($update)) {
                $id = $data['update'];
                unset($data['update']);
                if ($this->admin->update_data($id, $data, 'general_settings')) {
                    $this->session->set_flashdata('success_msg', 'General settings updated successfully.');
                } else {
                    $this->session->set_flashdata('error_msg', 'There was an error updating the general settings.');
                }
            } else {
                unset($data['update']);
                if ($this->admin->insert_data('general_settings', $data)) {
                    $this->session->set_flashdata('success_msg', 'General settings saved.');
                } else {
                    $this->session->set_flashdata('error_msg', 'There was an error saving the general settings.');
                }
            }
            redirect('settings');
        } else {
            $page_data['page_title'] = 'General Settings';
            $page_data['pg_name'] = 'settings';
            $page_data['sub_name'] = 'gen_set';
            $page_data['least_sub'] = '';
            $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                'first_name,last_name,email,profile_pic');
            $page_data['settings'] = $this->admin->get_row('general_settings');
            $this->load->view('settings/general', $page_data);
        }
    }

    public function mail()
    {
        $page_data['page_title'] = 'Mail Settings';
        $page_data['pg_name'] = 'settings';
        $page_data['sub_name'] = 'mail_set';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/mail', $page_data);
    }

    public function edit_footer()
    {
        $page_data['page_title'] = 'Edit Footer';
        $page_data['pg_name'] = 'settings';
        $page_data['sub_name'] = 'e_foot';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/edit_footer', $page_data);
    }

    //discount controllers here
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
                $this->load->view('settings/discount/gift', $page_data);
                break;
            case 'coupons' :
                $page_data['page_title'] = 'Discount Coupons';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'coupon';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('settings/discount/coupon', $page_data);
                break;
            case 'special' :
                $page_data['page_title'] = 'Special Offers';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'special';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('settings/discount/special', $page_data);
                break;
            default:
                return redirect($page);
                break;

        }
    }


    /*
     * All Store Settings Controller Section
     * Pages
     * Payment Methods
     * Store Status
     * */

    public function payment()
    {
        $page_data['page_title'] = 'Payment Methods';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'payment_set';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/payment', $page_data);
    }

    public function store_status()
    {
        $page_data['page_title'] = 'Store Online/Offline';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'store_stat';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/store_status', $page_data);
    }


    /*
     * Pages Settings controller
     * - Home Page
     * - Category
     * - Checkout
     * - Single Product
     * */

    public function home()
    {
        $page_data['page_title'] = 'Homepage Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'homepage';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/pages/home', $page_data);
    }

    public function privacy()
    {
        $page_data['page_title'] = 'Privacy Policy Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'privacy';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/pages/privacy', $page_data);
    }
    public function terms()
    {
        $page_data['page_title'] = 'Terms &amp; Conditions Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'terms';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/pages/terms', $page_data);
    }
    public function agreement()
        //Privacy policy Settings
    {
        $page_data['page_title'] = 'Agreement Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'agreement';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/pages/agreement', $page_data);
    }

    function process(){
        if( $_POST || $_FILES ){
            switch ($this->input->post('process_type')) {
                case 'upload_slider_image':
                    $url = $this->input->post('url');
                    $image = $this->input->post('slider_image', true);
                    break;
                case 'call_to_action':
                    $url = $this->input->post('url');
                    $image = $this->input->post('cta_image', true);
                    $position = $this->input->post('position', true);

                case 'modal':
                    $design_type = $this->input->post('design_type');
                    $modal_text = $this->input->post('modal_text');
                    $image = $this->input->post('modal_image');
                    $btn_type = $this->input->post('button_type');
                    $slider_bg_colour = $this->input->post('background_colour');
                    $btn_text = $this->input->post('btn_text');

            }
        }
    }


    function do_upload($file, $id){
        $config['upload_path'] = './data/sellers/' . $id . '/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg|bmp|pdf|doc|docx';
        $config['max_size'] = 10048;
        $config['overwrite'] = true;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file)) {
            return 'There was an error';
        } else {
            return $this->upload->data('file_name');
        }
    }
}
