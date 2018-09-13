<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        // @todo
        // Check if the user is already logged in
        // Also check where the user is coming from
        // $this->session->set_userdata('referred_from', current_url());
        parent::__construct();
        $this->load->model('seller_model', 'seller');
        if( !$this->session->userdata('logged_in') ){
            // Ursher the person to where he is coming from
            if( !empty($this->session->userdata('referred_from')) ) redirect($this->session->userdata('referred_from'));
            redirect('login');
        }        
    }

    public function index(){
        $page_data['page_title'] = 'Register to be part of the community';
        $page_data['pg_name'] = 'register';
        $page_data['meta_tags'] = array('css/bootstrap.min.css',
            'css/nifty.min.css','css/nifty-demo-icons.min.css','css/nifty-demo.min.css',
            'plugins/bootstrap-validator/bootstrapValidator.min.css',
            'plugins/dropzone/dropzone.min.html', 'plugins/bootstrap-markdown/css/bootstrap-markdown.min.css',
            'plugins/bootstrap-select/bootstrap-select.min.css','plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'
        );
        $page_data['scripts'] = array('js/jquery.min.js','js/bootstrap.min.js', 'js/nifty.min.js', 'js/demo/nifty-demo.min.js',
            'plugins/dropzone/dropzone.min.js','plugins/dropzone/dropzone.min.js','js/demo/form-file-upload.js',
            'plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js', 'plugins/bootstrap-validator/bootstrapValidator.min.js',
            'js/demo/form-wizard.js','plugins/bootstrap-markdown/js/bootstrap-markdown.js', 'plugins/bootstrap-select/bootstrap-select.min.js',
            'plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
        $this->load->view('dashboard', $page_data);
    }
}
