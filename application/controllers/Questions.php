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
        $page_data['questions'] = $this->admin->get_questions();
        $this->load->view('questions', $page_data);
    }

    function action(){
        if( $this->input->is_ajax_request() && $this->input->post() ){
            $qid = $this->input->post('qid');
            $action = $this->input->post('action');
            if( $action == 'approve' && $this->admin->update_data( $qid, array('status' => 'approved'), 'qna')){
                $this->session->set_flashdata('success_msg', 'The question has been approved, the seller will be able to see it from her end.');
                echo '{"status" : 1}';
            }elseif( $action == 'decline' && $this->admin->action($qid,'delete','qna')){
                $this->session->set_flashdata('success_msg', 'The question has been declined.');
                echo '{"status" : 1}';
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo '{"status" : 0}';
            }
            exit;
        }
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