<?php

Class Seller_model extends CI_Model{

    // Insert data
    function insert_data($table = 'sellers', $data = array() ){
        try {
            $this->db->insert($table, $data);
            $result = $this->db->insert_id();
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

	// Login Customer
	function login($data = array(), $table_name = 'sellers'){
		if(!empty($data)) {
            $email = cleanit($data['email']);
            $this->db->where('email', $data['email']);
            if ($this->db->get($table_name)->row()){
                $this->db->where('email',$data['email']);
                $salt = $this->db->get($table_name)->row()->salt;
                if ($salt) {
                    $password = shaPassword($data['password'], $salt);
                    $this->db->where('email', $data['email']);
                    $this->db->where('password', $password);
                    $result = $this->db->get('sellers');
                    if ($result->num_rows() == 1) {
                    	$c_update = array('last_login' => get_now(), 'ip' => $_SERVER['REMOTE_ADDR'] );
                    	$this->db->where('email', $data['email']);
                    	$this->db->update($table_name, $c_update);
                        return $result->row(0)->id;
                    } else {
                        return false;
                    }
                }
            }
        }
	}

	// Create An Account for user

	function create_account( $data = array(), $table_name = 'sellers'){
		$result = '';
		if(!empty($data)){
			try {
				$this->db->insert($table_name, $data);
				$result = $this->db->insert_id();
			} catch (Exception $e) {
				$result = $e->getMessage();
			}
        }
        return $result;
    }

    // Update table
    function update_data( $access = '' , $data = array(), $table_name = 'sellers'){
        $this->db->where('id', $access);
        return $this->db->update( $table_name, $data );
    }

    // check if the password is correct

    function cur_pass_match($password = null, $access = '', $table = 'sellers'){
        if ($password) {
            $this->db->where('id', $access);
            $this->db->or_where('email', $access);
            $salt = $this->db->get('sellers')->row()->salt;
            $this->db->where('id', $access);
            $this->db->or_where('email', $access);
            $curpassword = $this->db->get($table)->row()->password;
            $password = shaPassword($password, $salt);
            if ($password === $curpassword) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Change Password 
    function change_password($password, $access = '', $table = 'sellers'){
        if($access == '') $access = $this->session->userdata('logged_id');
        $salt = salt(50);
        $password = shaPassword($password, $salt);
        $data = array(
            'password' => $password,
            'salt' => $salt
        );
        $this->db->where('id', $access);
        return $this->db->update($table, $data);
    }

    /**
     * @param $access : id
     * @param $details : string of data you only want to retrieve
     * @return mixed
     */
    function get_profile_details($access, $details ){
        $this->db->select($details);
        $this->db->where('id', $access);
        return $this->db->get('sellers')->row();
    }
    /**
     * @param $access : id
     * @param $details : Get all login user  profile details
     * @return mixed
     */
    function get_profile( $access ){
        $this->db->select("*");
        $this->db->where('id', $access);
        return $this->db->get('sellers')->row();
    }

    function get_specification( $sub_id){
        $this->db->select('specifications');
        $this->db->where('sub_category_id', $sub_id);
        $specs = $this->db->get('sub_category')->row();
        $return = array();

        if( !empty($specs->specifications) || $specs->specifications !== '' ){
            $decode = json_decode($specs->specifications);
            foreach ( $decode as $key => $value ){
                $this->db->select('spec_name,options,description,multiple_options');
                $this->db->from('specifications');
//                $this->db->where('tab', $type);
                $this->db->where('id', $value);
                $output = $this->db->get()->row_array();
                array_push( $return, $output );
            }
            return $return;
        }else{
            return '';
        }
    }

    function get_product($id, $status = '', $select = ''){
        $this->db->where('seller_id', $id);
        if( $status !== '' ) $this->db->where('product_status', $status );
        $this->db->select($select);
        $results = $this->db->get('products')->result_array();
        if( !empty($results) ){
            foreach ( $results as $result ){
                $this->db->where('product_id', $result['id'] );
                $this->db->select('AVG(sale_price) AS sale_price, AVG(discount_price) AS discount_price');
                $variation = $this->db->get('product_variation')->row_array();
                $results['sale_price'] = $variation['sale_price'];
                $results['discount_price'] = $variation['discount_price'];
            }
        }
        return $results;
    }

}
