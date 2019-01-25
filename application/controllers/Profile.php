<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        $page_data['profile'] = $this->admin->get_profile($this->session->userdata('logged_id'));
//        $page_data['page_title'] = 'Profile Setting';
//        $page_data['pg_name'] = 'settings';
//        $page_data['sub_name'] = 'profile';
//        $page_data['categories'] = $this->admin->get_results('categories', "id, name", "( pid = 0 )");
//        $this->load->view('settings', $page_data);
        redirect('profile/change_password/');
    }

    public function process()
    {
        if ($this->input->post()) {
            $uid = $this->session->userdata('logged_id');
            $page_data['profile'] = $this->admin->get_profile($this->session->userdata('logged_id'));
            switch ($this->input->post('process_type')) {
                case 'profile':
                    $this->form_validation->set_rules('name', 'First name and last name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('bank_name', 'Bank name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('bvn', 'Bank Verification Number', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('account_name', 'Account name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('account_number', 'Account number', 'trim|required|xss_clean');
                    if ($this->form_validation->run() === false) {
                        $this->session->set_flashdata('error_msg', '<strong>There was an error updating your information...</strong> <br />' . validation_errors());
                        redirect('settings');
                    } else {
                        $data = $user_data = array();
                        $name = explode(' ', $this->input->post('name'));
                        $user_data['first_name'] = $name[0];
                        $user_data['last_name'] = $name[1];
                        $data['legal_company_name'] = $this->input->post('legal_company_name');
                        $data['address'] = $this->input->post('address');
                        $data['tin'] = $this->input->post('tin');
                        $data['reg_no'] = $this->input->post('reg_no');
                        $data['license_to_sell'] = $this->input->post('license_to_sell');
                        $data['own_brand'] = $this->input->post('own_brand');
                        $data['no_of_products'] = $this->input->post('no_of_products');
                        $data['main_category'] = $this->input->post('main_category');
                        $data['bank_name'] = $this->input->post('bank_name');
                        $data['bvn'] = $this->input->post('bvn');
                        $data['seller_phone'] = $this->input->post('seller_phone');
                        $data['account_name'] = $this->input->post('account_name');
                        $data['account_number'] = $this->input->post('account_number');
                        // update user table
                        $this->admin->update_data(array('id' => $uid), $user_data, 'users');
                        if ($this->admin->update_data(array('uid' => $uid), $data, 'sellers')) {
                            $this->session->set_flashdata('success_msg', 'Success: Your information has been saved successfully.');
                        } else {
                            $this->session->set_flashdata('error_msg', 'There was an error updating your information.');
                        }
                    }
                    redirect($_SERVER['HTTP_REFERER']);
                    break;
                case 'terms':
                    // terms and condition
                    $this->form_validation->set_rules('terms', 'Terms and condition', 'trim|required|xss_clean');
                    if ($this->form_validation->run() == false) {
                        $this->session->set_flashdata('error_msg', 'Error: Please fix the error <br />' . validation_errors());
                    } else {
                        if ($this->admin->update_data(array('uid' => $uid), array('terms' => cleanit($this->input->post('terms'))), 'sellers')) {
                            $this->session->set_flashdata('success_msg', 'Success: Your information has been saved successfully.');
                        } else {
                            $this->session->set_flashdata('error_msg', 'There was an error updating your information.');
                        }
                    }
                    redirect('settings');
                    break;
                case 'logo':
                    break;
                default:
                    break;
            }
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function do_upload($file, $id)
    {
        $config['upload_path'] = './data/sellers/' . $id . '/';
        $config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg|bmp|pdf|doc|docx';
        $config['max_size'] = 10048;
        $config['overwrite'] = true;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file)) {
            return 'There was an error';
        } else {
            return $this->upload->data('file_name');
        }
    }

    // Upload function

    public function change_password()
    {
        $id = $this->session->userdata('logged_id');
        $page_data['profile'] = $this->admin->get_profile($id);
        if (!$this->input->post()) {
            $page_data['page_title'] = "Seller's Profile Setting - " . lang('app_name');
            $page_data['pg_name'] = 'settings';
            $page_data['sub_name'] = 'change_password';
            $this->load->view('change_password', $page_data);
        } else {
            $this->form_validation->set_rules('current_password', 'Current password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[new_password]');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error_msg', 'Error: Please fix the following error.' . validation_errors());
            } else {
                if (!$this->admin->cur_pass_match($this->input->post('current_password'), $id)) {
                    $this->session->set_flashdata('error_msg', 'Error: The current password does not match');
                } else {
                    $this->admin->change_password($this->input->post('new_password'), $id);
                    $this->session->set_flashdata('success_msg', 'Success: Password changed.');
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
