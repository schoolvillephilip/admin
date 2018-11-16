<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class States extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        if (!$this->session->userdata('logged_in')) {
            // Ursher the person to where he is coming from
            $from = $this->session->userdata('referred_from');
            if (!empty($from)) redirect($from);
            redirect('login');
        }
    }

    public function index(){
        $page_data['page_title'] = 'States Overview';
        $page_data['pg_name'] = 'states';
        $page_data['sub_name'] = 'states_overview';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['states'] = $this->admin->get_states();
        $page_data['areas'] = $this->admin->get_address_price();
        $this->load->view('states/areas', $page_data);
    }

    public function pickup_address(){
        $page_data['page_title'] = 'Pickup Address';
        $page_data['pg_name'] = 'states';
        $page_data['sub_name'] = 'pickup_address';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('states/pickup_address', $page_data);
    }

    function process(){
        if( $this->input->post() ){
            $type = $this->input->post('posting_type');
            switch ( $type ) {
                case 'state':
                    // check if state already esisting
                    $name = $this->input->post('state');
                    if( $this->admin->get_num_rows('states', array('name' => strtolower($name) ))){
                        $this->session->set_flashdata('error_msg', 'The state is already existing.');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                    if( is_int($this->admin->insert_data('states', array('name' => strtolower($name) ))) ){
                        $this->session->set_flashdata('success_msg', 'The state has been added successfully.');
                    }
                    redirect(base_url('states'));
                    break;  
                case 'areas':
                    $name = $this->input->post('area');
                    if( $this->admin->get_num_rows('area', array('name' => strtolower($name) ))){
                        $this->session->set_flashdata('error_msg', 'The Area Address is already existing.');
                        redirect(base_url('states'));
                    }
                    $data = array(
                        'sid' => $this->input->post('state'),
                        'name' => cleanit($this->input->post('area')),
                        'price' => cleanit($this->input->post('price'))
                    );
                    if( is_int($this->admin->insert_data('area', $data) ) ){
                        $this->session->set_flashdata('success_msg', 'The area address has been added successfully.');
                    }
                    redirect(base_url('states'));

                default:
                    redirect(base_url('states'));
                    break;
            }
        }
    }
}
