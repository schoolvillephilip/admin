<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $page_data['page_title'] = 'Customer Questions';
        $page_data['pg_name'] = 'questions';
        $page_data['sub_name'] = '';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['questions'] = $this->admin->get_results('qna', "( status != 'approved')")->result();
        $this->load->view('questions', $page_data);
    }

    function approve_question(){
        if( $this->input->is_ajax_request() ){
            $qid = $this->input->post('qid');

            if( $this->admin->approve_question($qid) ){
                echo json_encode(array('status' => 1));
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo json_encode(array('status' => 0));
                exit;
            }
        }
    }

    function decline_question(){
        if( $this->input->is_ajax_request() ){
            $qid = $this->input->post('qid');

            if( $this->admin->action($qid,'delete','qna') ){
                echo json_encode(array('status' => 1));
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo json_encode(array('status' => 0));
                exit;
            }
        }
    }

}