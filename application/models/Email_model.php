<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
    // Insert data
    function insert_data($table = 'error_logs', $data = array()){
        try {
            $this->db->insert($table, $data);
            $result = $this->db->insert_id();
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    function reset_password( $data ){
        $post = array(
            'subject' => 'Reset Password Confirmation',
            'to' => $data['email'],
            'template' => 'UserPasswordReset',
            'merge_recipent' => $data['recipent'],
            'merge_reset_link' => $data['reset_link'],
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    // Welcome user for new account creates
    function welcome_user( $data ){
        $post = array(
            'subject' => 'Welcome to ' . lang('app_name'),
            'to' => $data['email'],
            'template' => 'WelcomeNewUser',
            'merge_recipent' => $data['recipent'],
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    // Order completed
    function payment_made_to_seller( $data ){
        $post = array(
            'subject' => 'Payment Made To Your Account',
            'to' => $data['email'],
            'template' => 'SellerPaymentCompleted',
            'merge_recipent' => $data['recipent'],
            'merge_amount' => $data['amount'],
            'merge_bank_details' => $data['bank_detail'],
            'merge_payment_id' => $data['payment_id'],
            'merge_timestamp' => get_now(),
            'isTransactional' => false
        );
        return $this->send_now($post);
    }

    // Curl function to send
    function send_now($post){
        $url = 'https://api.elasticemail.com/v2/email/send';
        try{
            $post['from'] = 'philo4u2c@gmail.com';
            $post['fromName'] = 'Onitshamarket';
            $post['apikey'] = 'f818fbbb-bb76-4de0-ad47-e458303b0d12';
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));
            $result = curl_exec($ch);
            curl_close ($ch);
            return $result;
        }catch(Exception $ex){
            $this->session->set_flashdata('error_msg',$ex->getMessage());
            return false;
        }
    }
}