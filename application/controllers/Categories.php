<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
		if (!$this->session->userdata('logged_in')) {
			// Ursher the person to where he is coming from
			$from = $this->session->userdata('referred_from');
			if (!empty($from)) redirect($from);
			redirect('login');
		}
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
            $variation_options = $this->input->post('variation_options');

            if( $this->input->post('has_variation') == true && empty( $variation_name) && empty( $variation_options) ){
                $this->session->set_flashdata('error_msg','Variation name and options can not be empty.' );
                redirect('categories/add');
            }else{
                // check if the option is available else add


            }

			$data = array(
				'pid'	=> $this->input->post('pid'),
				'title' => cleanit( $this->input->post('title')),
				'name' => cleanit($this->input->post('name')),
				'icon' => $this->input->post('icon'),
				'commission' => $this->input->post('commisission'),
				'specifications' => $specs,
				'description' => cleanit($this->input->post('description'))
			);

			if (isset($_FILES) && $_FILES['upload_image']['name'] != '' ) {
				$filename = $this->do_upload('upload_image');
				if ($filename !== false) {
					$data['image'] = $filename;
				} else {
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
			$page_data['categories'] = $this->admin->get_results('categories', "( pid = 0 )")->result();
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
            $pid =
			$data = array(
				'name' => $this->input->post('name'),
				'pid'	=> $this->input->post('pid'),
				'icon' => $this->input->post('icon'),
				'title' => $this->input->post('title'),
				'specifications' => $specs,
				'description' => $this->input->post('description')
			);
			if (isset($_FILES) && ($_FILES['image']['name'] != '' )) {
				$filename = $this->do_upload('image');
				if ($filename !== false) {
					$img = $this->input->post('img');
					$md5file = file_get_contents('./data/settings/categories/' . $filename);
					$md5file2 = file_get_contents('./data/settings/categories/' . $img);
					if (!empty($img) && (md5($md5file) == md5($md5file2))) {
						unlink(realpath('./data/settings/categories/' . $filename));
					} else {
						// still unlink, if not the same
						unlink(realpath('./data/settings/categories/' . $img));
						$data['image'] = $filename;
					}
				} else {
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
			$page_data['categories'] = $this->admin->get_all_categories();
			if (empty($page_data['category'])) {
				$this->session->set_flashdata('error_msg', 'The root category you are looking for does not exist...');
				redirect('categories');
			}
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
	function do_upload($file)
	{
		$config['upload_path'] = './data/settings/categories/';
		$config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg|bmp';
		$config['max_size'] = 10048;
		$config['max_width'] = 2000;
		$config['max_height'] = 2000;
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($file)) {
			// could append the file name...
			$error = array('error_msg' => $this->upload->display_errors());
			$this->session->set_flashdata($error);
			return false;
		} else {
			return $this->upload->data('file_name');
		}
	}

}
