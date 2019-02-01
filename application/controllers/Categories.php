<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// View All categories
	public function index()
	{
		$page_data['page_title'] = 'Site Category';
		$page_data['pg_name'] = 'select_category';
		$page_data['sub_name'] = 'category';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$page_data['categories'] = $this->admin->get_results('categories')->result();
		$this->load->view('category/categories', $page_data);
	}

	// Create
	public function add(){
		if( $this->input->post() ) {
			$this->form_validation->set_rules('name', 'Name','trim|required|xss_clean');
			$this->form_validation->set_rules('title', 'Title','trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description','trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error_msg','There was an error with the data provided ' . validation_errors() );
                redirect('categories/add');
            }
            $specifications = $this->input->post('specifications');
            $specs = !empty($specifications) ? json_encode($specifications) : '';
            $variation_name = $this->input->post('variation_name');
            $variation = $this->input->post('variation_options');
            $opt ='';
            if( $this->input->post('has_variation') == true && empty( $variation_name) && empty( $variation) ){
                $this->session->set_flashdata('error_msg','Variation name and options can not be empty.' );
                redirect('categories/add');
            }elseif( !empty( $variation)){
                $options_array = array();
                $options = explode(',', $variation);
                foreach( $options as $option ){
                    $option = strtoupper( $option );
                    $id = $this->admin->check_variation_option( $option );
                    array_push( $options_array, $id);
                }
                $opt = json_encode( $options_array);
            }
            $commission = $this->input->post('commission');
			$data = array(
				'pid'	=> $this->input->post('pid'),
				'title' => cleanit( $this->input->post('title')),
				'name' => cleanit($this->input->post('name')),
				'icon' => $this->input->post('icon'),
				'commission' => !empty( $commission) ? $commission : 3,
				'specifications' => $specs,
				'variation_name' => $variation_name,
				'variation_options' => $opt,
				'description' => cleanit($this->input->post('description'))
			);

			if (isset($_FILES) && $_FILES['upload_image']['name'] != '' ) {
                $upload_array = array(
                    'folder' => STATIC_CATEGORY_FOLDER,
                    'filepath' => $_FILES['upload_image']['tmp_name'],
                );
                $this->cloudinarylib->upload_image( $upload_array );
                $return = $this->cloudinarylib->get_result('filename');
				if($return){
				    $data['image'] = $return;
				    unset($upload_array);
                }else{
				    $this->session->set_flashdata('error_msg','There was an error with that image');
                    redirect($_SERVER['HTTP_REFERER']);
                }
			}
			// Slug
			$slug = urlify( $this->input->post('name') );
			$data['slug'] = $this->admin->check_slug( $slug );
			if ($this->admin->insert_data('categories', $data)) {
				$this->session->set_flashdata('success_msg', 'The category has been created successfully.');
			} else {
				$this->session->set_flashdata('error_msg', 'There was an error creating the root category.');
			}
			redirect('categories');

		}else{
			$page_data['page_title'] = 'Add Category';
			$page_data['pg_name'] = 'add_category';
			$page_data['sub_name'] = 'category';
            $page_data['least_sub'] = '';
			$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
				'first_name,last_name,email,profile_pic');
			$page_data['specifications'] = $this->admin->get_specifications();
			$page_data['options'] = $this->admin->get_results('options')->result();
			$page_data['categories'] = $this->admin->get_results('categories')->result();
			$this->load->view('category/add', $page_data);
		}
	}
	// Category Edit
	public function edit(){
		$id = cleanit($this->uri->segment(3));
		if ($this->input->post()) {
			// update
			$specifications = $this->input->post('specifications');
            $specs = !empty($specifications) ? json_encode($specifications) : '';
			$data = array(
				'name' => $this->input->post('name'),
				'pid'	=> $this->input->post('pid'),
				'icon' => $this->input->post('icon'),
				'title' => $this->input->post('title'),
				'commission' => $this->input->post('commission'),
				'specifications' => $specs,
				'description' => $this->input->post('description')
			);
			if (isset($_FILES) && ($_FILES['image']['name'] != '' )) {
                $upload_array = array(
                    'folder' => STATIC_CATEGORY_FOLDER,
                    'filepath' => $_FILES['image']['tmp_name'],
                );
                $this->cloudinarylib->upload_image( $upload_array );
                $filename = $this->cloudinarylib->get_result('filename');
				if ($filename) {
					$img = $this->input->post('img');
					$name = explode('.', $img);
					$public_id = STATIC_CATEGORY_FOLDER . $name[0];
					$this->cloudinarylib->delete_image( $public_id );
                    $data['image'] = $filename;
                    unset( $upload_array );
                } else {
				    $this->session->set_flashdata('error_msg', ' There was an error updating the category image...');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			if ($this->admin->update_data($this->input->post('id'), $data, 'categories')) {
				$this->session->set_flashdata('success_msg', 'The specification has been updated successfully.');
			} else {
				$this->session->set_flashdata('error_msg', 'There was an error updating the specification.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$page_data['page_title'] = 'Edit Category';
			$page_data['pg_name'] = 'select_category';
			$page_data['sub_name'] = 'category';
            $page_data['least_sub'] = '';
			$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
				'first_name,last_name,email,profile_pic');
			$page_data['category'] = $this->admin->get_single_category($id);
			$page_data['options'] = $this->admin->get_options_name(json_decode($page_data['category']->variation_options));
			$page_data['categories'] = $this->admin->get_results('categories')->result();
			if (empty($page_data['category'])) {
				$this->session->set_flashdata('error_msg', 'The root category you are looking for does not exist...');
				redirect('categories');
			}
            $page_data['options_array'] = $this->admin->get_results('options')->result();
			$page_data['specifications'] = $this->admin->get_specifications();
			$this->load->view('category/category_detail', $page_data);
		}
	}
	public function specification()
	{
		if ($this->input->post()) {
			$option = $this->input->post('options');
			if (!empty($option)) {
				$option_explode = explode(',', $option);
				$opt = json_encode($option_explode);
			} else {
				$opt = '';
			}
			$multiple = ($this->input->post('multiple') === 'on') ? true : false;
			$data = array(
				'spec_name' => cleanit($this->input->post('spec_name')),
				'options' => $opt,
				'multiple_options' => $multiple,
				'description' => cleanit($this->input->post('description'))
			);
			if ($this->admin->insert_data('specifications', $data)) {
				$this->session->set_flashdata('success_msg', 'The specification has been saved successfully.');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('error_msg', 'There was an error saving the specification.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$page_data['page_title'] = 'Select Specification';
			$page_data['pg_name'] = 'select_category';
			$page_data['sub_name'] = 'specification';
            $page_data['least_sub'] = '';
			$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
				'first_name,last_name,email,profile_pic');
			$page_data['specifications'] = $this->admin->get_specifications();
			$this->load->view('category/specification', $page_data);
		}
	}
	public function specification_detail()
	{
		$id = cleanit($this->uri->segment(3));
		if (!isset($id)) redirect($_SERVER['HTTP_REFERER']);
		if ($this->input->post()) {
			// update
			$option = $this->input->post('options');
			if (!empty($option)) {
				$option_explode = explode(',', $option);
				$opt = json_encode($option_explode);
			} else {
				$opt = '';
			}
			$multiple = ($this->input->post('multiple') === 'on') ? true : false;
			$data = array(
				'spec_name' => cleanit($this->input->post('spec_name')),
				'options' => $opt,
				'multiple_options' => $multiple,
				'description' => cleanit($this->input->post('description'))
			);
			if ($this->admin->update_data($this->input->post('id'), $data, 'specifications')) {
				$this->session->set_flashdata('success_msg', 'The specification has been updated successfully.');
			} else {
				$this->session->set_flashdata('error_msg', 'There was an error updating the specification.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$page_data['page_title'] = 'Specification Detail';
			$page_data['pg_name'] = 'select_category';
			$page_data['sub_name'] = 'specification_detail';
            $page_data['least_sub'] = '';
			$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
				'first_name,last_name,email,profile_pic');
			$page_data['specification'] = $this->admin->get_specifications($id);
			$this->load->view('category/specification_detail', $page_data);
		}
	}

	function delete(){
	    if( $this->input->is_ajax_request() ){
	        $id = $this->input->post('id');
	        echo $this->admin->action($id, 'delete', 'categories');
	        exit;
        }
    }
	/**
	 * @param int : root_category_id
	 * @return:  JSON categories id, name
	 */
	function append_category() {
		$id = $this->input->post('id');
		if (!is_null($id)) {
			echo json_encode($this->admin->get_children_categories($id), JSON_UNESCAPED_SLASHES);
		}
		exit;
	}

	// upload function
	function do_upload($filepath, $folder){
        $this->load->library('cloudinarylib');
        $return = \Cloudinary\Uploader::upload($filepath,
            array(
                "folder" => $folder,
                "resource_type" => "image",
                "eager_async" => true,
                "quality" => 60
            )
        );
        $explode = explode('/', $return['public_id']);
        $file_name = end( $explode );
        return $file_name .'.'. $return['format'];
	}

}
