<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

    public function __construct(){
        // Check if the user is already logged in
        // Also check where the user is coming from
        // $this->session->set_userdata('referred_from', current_url());
        parent::__construct();
        if( $this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            $from = $this->session->userdata('referred_from');
            if( !empty( $from ) ) redirect($from);
            redirect(base_url());
        }        
    }

    public function index(){
        $page_data['page_title'] = 'Register to be part of the community';
        $page_data['pg_name'] = 'register';
        $page_data['meta_tags'] = array('css/bootstrap.min.css','css/nifty.min.css','css/nifty-demo-icons.min.css','css/nifty-demo.min.css');
        $page_data['scripts'] = array('js/jquery.min.js','js/bootstrap.min.js', 'js/nifty.min.js');
        $this->load->view('register', $page_data);
    }

    /*
     * @Incoming : accepts the sign up POST parameters
     * result : string (success | error )
     * */
    function process(){  
        // $this->output->enable_profiler(TRUE);    
        $this->form_validation->set_rules('firstname', 'First Name','trim|required|xss_clean');
        $this->form_validation->set_rules('lastname', 'Last Name','trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address','trim|required|xss_clean|valid_email|is_unique[sellers.email]',array('is_unique' => 'Sorry! This %s has already been registered!'));
        // $this->form_validation->set_message('is_unique', 'The %s is already taken');
        $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean|min_length[8]|max_length[15]');
        $this->form_validation->set_rules('confirm_password', 'Password','trim|required|xss_clean|min_length[8]|max_length[15]|matches[password]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error_msg','<strong>There was an error when creating the account. Please fix the following</strong> <br />' . validation_errors() );
            redirect('register');
        }else{
            $salt = salt(50);
            $data = array(
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'salt' => $salt,
                'password' => shaPassword($this->input->post('password'), $salt),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'date_registered' => get_now(),
                'last_login' => get_now()
            );

            $user_id = $this->seller->create_account($data, 'sellers');
            if( !is_numeric($user_id) ) {
                // check if site is live
                // if( $lang['site_state'] == 'development' ) {
                //     $output_array['message'] = $user_id;
                // }
                $this->session->set_flashdata('error_msg','Sorry! There was an error creating your account.' . $user_id);
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
                $id = $this->seller->login($data);
                $session_data = array('logged_in' => true, 'logged_id' => $id, 'email' => $this->input->post('email'));
                $this->session->set_userdata($session_data);
                $this->session->set_flashdata('success_msg','Account created and logged in successfully!');
                // To ursher them to where they are coming from...
                redirect('product');
            }
        } 
    }
}
