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
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['states'] = $this->admin->get_states();
        $page_data['areas'] = $this->admin->get_address_price();
        $this->load->view('states/areas', $page_data);
    }

    public function pickup_address(){
        if( !$this->input->post() ){
            $page_data['page_title'] = 'Pickup Address';
            $page_data['pg_name'] = 'states';
            $page_data['sub_name'] = 'pickup_address';
            $page_data['least_sub'] = '';
            $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                'first_name,last_name,email,profile_pic');
            $page_data['areas'] = $this->admin->get_results( 'area' );
            $page_data['pickup_address'] = $this->admin->get_results('pickup_address')->result();
            $this->load->view('states/pickup_address', $page_data);
        }else{
            $data = array(
                'title' => cleanit( $this->input->post('title')),
                'phones'    => cleanit($this->input->post('phones')),
                'emails'     => cleanit($this->input->post('email')),
                'address'   => cleanit($this->input->post('address')),
                'enable'    => $this->input->post('enable'),
                'available_area'     => json_encode($this->input->post('areas'))
            );
            if( $this->admin->insert_data('pickup_address', $data) ){
                $this->session->set_flashdata('success_msg','The Pickup Address has been added.');
            }else{
                $this->session->set_flashdata('error_msg', 'Error adding the pickup address');
            }
            redirect('states/pickup_address');
        }
    }

    function process(){
        if( $this->input->post() ){
            $type = $this->input->post('posting_type');
            switch ( $type ) {
                case 'state':
                    // check if state already esisting
                    $name = $this->input->post('state');
                    if( $this->admin->get_num_rows('states', array('name' => ucwords($name) ))){
                        $this->session->set_flashdata('error_msg', 'The state is already existing.');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                    if( is_int($this->admin->insert_data('states', array('name' => ucwords($name) ))) ){
                        $this->session->set_flashdata('success_msg', 'The state has been added successfully.');
                    }
                    redirect('states');
                    break;  
                case 'areas':
                    $name = $this->input->post('area');
                    if( $this->admin->get_num_rows('area', array('name' => strtolower($name) ))){
                        $this->session->set_flashdata('error_msg', 'The Area Address is already existing.');
                        redirect(base_url('states'));
                    }
                    $data = array(
                        'sid' => $this->input->post('state'),
                        'name' => cleanit($this->input->post('area'))
                    );
                    $this->db->trans_begin();

                    $aid = $this->admin->insert_data('area', $data);
                    // Lets insert the price
                    $price = trim($this->input->post('price'));

                    $area_price = explode('|', $price);
                    $count = count( $area_price );
                    $weight_data = array();
                    for ($x = 0; $x < $count; $x++){
                        $explode = explode( '=',$area_price[$x] );
                        if( $explode ) {
                            $res['aid'] = $aid;
                            $res['weight'] = trim($explode[0]);
                            $res['amount'] = trim($explode[1]);
                        }
                        array_push( $weight_data, $res );
                    }
                    $this->admin->insert_batch('delivery_amount', $weight_data);

                    if($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        // error
                        $this->session->set_flashdata('error_msg', 'There was an error adding the area and its respective price');
                        redirect('states/');

                    }else{
                        $this->db->trans_commit();
                        $this->session->set_flashdata('success_msg', 'The area and price has been added successfully.');
                        redirect('states/');

                    }
                default:
                    redirect('states');
                    break;
            }
        }
    }
}
