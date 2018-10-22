<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
        // @todo
        // Check if the user is already loggedin
        // Also check where the user is coming from
        // $this->session->set_userdata('referred_from', current_url());
        parent::__construct();
        $this->load->model('seller_model', 'seller');
        if( $this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            if( !empty($this->session->userdata('referred_from')) ) redirect($this->session->userdata('referred_from'));
            redirect(base_url());
        } 
    }

    public function index(){
        $page_data['page_title'] = 'Login to your seller account';
        $page_data['pg_name'] = 'login';
        $page_data['meta_tags'] = array( 'css/bootstrap.min.css','css/nifty.min.css','css/nifty-demo-icons.min.css','css/nifty-demo.min.css');
        $page_data['scripts'] = array('js/jquery.min.js','js/bootstrap.min.js', 'js/nifty.min.js');
        $this->load->view('seller/login', $page_data);
    }

    /*
     * @Incoming : accepts the login POST parameters : email and password
     * */
    public function process() {
        if(!$_POST){
            redirect('login');
        }else {
            // $this->output->enable_profiler(TRUE);
            $this->form_validation->set_rules('email', 'Email Address','trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean|min_length[6]|max_length[15]');
            $output_array['status'] = 'error';
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_msg','There was an error with the login information. Please fix the following <br />' . validation_errors() );
                redirect('login');
            }else{
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                $user_id = $this->seller->login($data);
                if( !is_numeric($user_id)) {
                    $this->session->set_flashdata('error_msg','Sorry! Incorrect username or password.');
                    redirect('seller/login');
                }else{
                    // @TODO
                    // Check if the user already have some products in the cart, and going to checkout
                    // Perform every other actions necessary
                    $session_data = array('logged_in' => true, 'logged_id' => base64_encode($user_id));
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('success_msg','You are now logged in!');
                    redirect('product');
                }
            }
        }
    }
}
