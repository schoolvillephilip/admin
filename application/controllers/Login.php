<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
        // @todo
        // Check if the user is already logged in
        // Also check where the user is coming from
        // $this->session->set_userdata('referred_from', current_url());
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if( $this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            $referred_from = $this->session->userdata('referred_from');
            if( !empty( $referred_from ) ) {redirect( $referred_from );}else{ redirect('dashboard');}
        } 
    }

    public $referred_from = '';

    public function index(){
        $page_data['page_title'] = 'Login to your admin account';
        $page_data['pg_name'] = 'login';
        $this->load->view('login', $page_data);
    }


    public function process() {
        if(!$_POST){
            redirect('login');
        }else {
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (!isset($response['success']) || $response['success'] !== true) {
                $this->session->set_flashdata('error_msg', 'There was an error validating the captcha, please try again.');
                redirect('login');
            }
            $this->form_validation->set_rules('email', 'Email Address','trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean|min_length[6]|max_length[15]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_msg','There was an error with the login information. Please fix the following <br />' . validation_errors() );
                redirect('login');
            }else{
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                $user = $this->admin->login($data);
                if( !$user ) {

                    $this->session->set_flashdata('error_msg','Sorry! Incorrect username or password.');
                    redirect('login');
                }else{  
                    if( $user->groups < 1 ) {
                        // Not in admin group
                        redirect( lang('site_domain'));
                    }else{
                        /*
                         * 1- administrator
                         * 2- manager
                         * 3- accountant
                         * 4- sales
                         * */
                        $session_data = array('logged_in' => true, 'logged_id' => $user->id , 'group_id' => $user->groups );
                        $this->session->set_userdata($session_data);
                        $this->session->set_flashdata('success_msg','You are now logged in!');
                        redirect('dashboard');                        
                    }                  
                }
            }
        }
    }
}
