<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
		if (!$this->session->userdata('logged_in')) {
			$from = $this->session->userdata('referred_from');
			if (!empty($from)) redirect($from);
			redirect('login');
		}
	}

	public function index(){
		$page_data['page_title'] = 'Brands';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'brands';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
        $page_data['brands'] = $this->admin->get_results('brands');
		$this->load->view('brands/all_brands', $page_data);
	}


    public function add(){
        if( $this->input->post() ){
            $this->form_validation->set_rules('brand_name', 'Brand name','trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Brand description','trim|required|xss_clean|min_length[6]');
            if( $this->form_validation->run() == FALSE ){
                $this->session->set_flashdata('error_msg', 'Please fix the following errors'. validation_errors());
                redirect('brands/add');
            }
            $data = array(
                'brand_name' => trim($this->input->post('brand_name')),
                'description' => $this->input->post('description')
            );
            if( $this->admin->insert_data('brands', $data) ){
                $this->session->set_flashdata('success_msg', 'The brand name has been added.');                
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error adding the brand.');
            }
            redirect('brands');
        }else{
            $page_data['page_title'] = 'Brands';
            $page_data['pg_name'] = 'brand';
            $page_data['sub_name'] = 'add_brand';
            $page_data['least_sub'] = '';
            $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                'first_name,last_name,email,profile_pic');
            $this->load->view('brands/add', $page_data);
        }
    }

    public function detail( $id = ''){
        $id = $this->uri->segment(3);
        if( !$id )redirect($_SERVER['HTTP_REFERER']);
        $page_data['page_title'] = 'Brands';
        $page_data['pg_name'] = 'brand';
        $page_data['sub_name'] = 'add_brand';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['brand'] = $this->admin->get_row( 'brands', "( WHERE id = {$id})" );
        // echo($page_data['brand']->brand_name );
        $this->load->view('brands/detail', $page_data);
        
    }


    function process(){
        $id = $this->input->post('id');
        $this->form_validation->set_rules('brand_name', 'Brand name','trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Brand description','trim|required|xss_clean|min_length[6]');
        if( $this->form_validation->run() == FALSE ){
            $this->session->set_flashdata('error_msg', 'Please fix the following errors'. validation_errors());
            redirect('brands/add');
        }
        $data = array(
            'brand_name' => trim($this->input->post('brand_name')),
            'description' => $this->input->post('description')
        );
        if( $this->admin->update_data($id, $data, 'brands') ){
            $this->session->set_flashdata('success_msg', 'The brand name has been updated.');                
        }else{
            $this->session->set_flashdata('error_msg', 'There was an error updating the brand.');
        }
        redirect('brands');
    }

    // upload function
    function do_upload($file){
        $config['upload_path']          = './data/settings/categories/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG|jpeg|bmp';
        $config['max_size']             = 10048;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['overwrite']			= false;
        $config['encrypt_name'] 		= true;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload( $file )){
            // could append the file name...
            $error = array('error_msg' => $this->upload->display_errors());
            $this->session->set_flashdata($error);
            return false;
        }else{
            return $this->upload->data('file_name');
        }
    }

}
