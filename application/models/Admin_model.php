<?php

Class Admin_model extends CI_Model
{

    // Insert data
    function insert_data($table = 'sellers', $data = array())
    {
        try {
            $this->db->insert($table, $data);
            $result = $this->db->insert_id();
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    // Login Customer
    function login($data = array(), $table_name = 'sellers')
    {
        if (!empty($data)) {
            $email = cleanit($data['email']);
            $this->db->where('email', $data['email']);
            if ($this->db->get($table_name)->row()) {
                $this->db->where('email', $data['email']);
                $salt = $this->db->get($table_name)->row()->salt;
                if ($salt) {
                    $password = shaPassword($data['password'], $salt);
                    $this->db->where('email', $data['email']);
                    $this->db->where('password', $password);
                    $result = $this->db->get('sellers');
                    if ($result->num_rows() == 1) {
                        $c_update = array('last_login' => get_now(), 'ip' => $_SERVER['REMOTE_ADDR']);
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

    function create_account($data = array(), $table_name = 'sellers')
    {
        $result = '';
        if (!empty($data)) {
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
    function update_data($access = '', $data = array(), $table_name = 'sellers', $label = '')
    {
        if ($label != '') {
            $this->db->where($label, $access);
        } else {
            $this->db->where('id', $access);
        }
        return $this->db->update($table_name, $data);
    }

    // check if the password is correct

    function cur_pass_match($password = null, $access = '', $table = 'sellers')
    {
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
    function change_password($password, $access = '', $table = 'sellers')
    {
        if ($access == '') $access = $this->session->userdata('logged_id');
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
    function get_profile_details($access, $details)
    {
        $this->db->select($details);
        $this->db->where('id', $access);
        return $this->db->get('sellers')->row();
    }

    /**
     * @param $access : id
     * @param $details : Get all login user  profile details
     * @return mixed
     */
    function get_profile($access)
    {
        $this->db->select("*");
        $this->db->where('id', $access);
        return $this->db->get('sellers')->row();
    }

    /**
     * @param string $id
     * @return CI_DB_result
     */
    function get_root_categories($id = '')
    {
        if ($id != '') {
            $this->db->where('root_category_id', $id);
            return $this->db->get('root_category')->row();
        } else {
            return $this->db->get('root_category');
        }
    }

    /**
     * @param string $id
     * @return CI_DB_result
     */
    function get_categories($id = '')
    {
        if ($id != '') {
            $output = $this->db->query('SELECT c.name, c.category_id, 
                              c.root_category_id, r.name as root_name 
                              FROM category AS c INNER JOIN root_category AS r 
                              ON c.root_category_id = r.root_category_id WHERE category_id = ? ', $id)->row();
            return $output;
        } else {
            $this->db->select('c.name,c.category_id, c.root_category_id, r.name as root_name')
                ->from('category as c, root_category as r')
                ->where('c.root_category_id = r.root_category_id');
            return $this->db->get();
        }
    }

    /**
     * Fetching all the category details associated with a root id
     * @param string root $id
     * @return CI_DB_result
     */
    function get_categories_by_rootid($id = '')
    {
        if ($id != '') $this->db->where('root_category_id', $id);
        return $this->db->get('category')->result_array();
    }

    /**
     * @param string $id
     * @return CI_DB_result
     */
    function get_sub_categories($id = '')
    {
        if ($id != '') $this->db->where('sub_category_id');
        return $this->db->get('sub_category');
    }

    /**
     * @param $id
     * @return CI_DB_result
     */
    function get_specifications($id = '')
    {
        if ($id != '') {
            $this->db->where('id', $id);
            return $this->db->get('specifications')->row();
        } else {
            return $this->db->get('specifications');
        }
    }

    function get_sub_detail($id = '')
    {
        $output = $this->db->query('SELECT sub.sub_category_id, sub.name, sub.specifications, cat.category_id category_id, cat.name category_name, root.root_category_id root_category_id, root.name root_category_name
        FROM sub_category AS sub INNER JOIN root_category root ON sub.root_category_id = root.root_category_id INNER JOIN category cat ON sub.category_id  = cat.category_id
        WHERE sub_category_id =  ? ', $id)->row();
        return $output;
    }

    /**
     * @param $type = 
     * @return CI_DB_result
     */
    function get_seller_lists($search = '', $limit = '', $offset = '', $type = ''){
        $query = "SELECT id,first_name, last_name, email, legal_company_name, main_category,profile_pic,reg_no, last_login FROM sellers";
        if( $search != '' ) $query.= " WHERE (first_name LIKE %$search%) OR (last_name LIKE %$search%) OR (legal_company_name LIKE %$search%) OR (email LIKE %$search%)";
        if( $search != '' && $type != '' ) {
            $query .= " AND account_status = '$type'";
        }elseif( $search == '' && $type != '' ) $query .= " WHERE account_status = '$type'";
        if( !empty($limit)) $query .= " LIMIT {$offset},{$limit} ";
        
        return $this->db->query($query)->result();
    }

    /**
     * @param $id, $type( product_status) 
     * @return CI_DB_result
     */
    function get_product_list($id = '', $product_status = ''){
        $query = "SELECT p.id, p.sku, o.sold, p.product_name, p.created_on, p.rootcategory, p.category, p.product_line, p.product_status, p.seller_id, s.first_name, s.last_name FROM products as p
            LEFT JOIN sellers as s ON ( p.seller_id = s.id )
            LEFT JOIN ( SELECT SUM(qty) as sold, product_id, seller_id from orders GROUP BY orders.product_id) as o ON (p.id = o.product_id AND s.id = o.seller_id)";

        if( $id != '' ) $query .= " WHERE o.seller_id = $id AND p.seller_id = $id";
        if( $id != '' && $product_status != '' ){
            $query .= " AND p.product_status = '$product_status'";
        }elseif( $product_status != '' ){
            $query .= " WHERE o.seller_id = $id ";
        }
        $query .= " GROUP BY p.id";
        return $this->db->query($query)->result();
    }

    /**
     * @param $id
     * @return CI_DB_row
     */

    function product_sold_count($id){
        $query = "SELECT COUNT(qty) as sold FROM orders WHERE seller_id = $id AND status = 'completed'";
        return $this->db->query($query)->row();
    }

    /**
     * @param $id
     * @return CI_DB_result
     */

    function product_count($id){
        $query = "SELECT COUNT(*) as prod FROM products WHERE seller_id = $id";
        return $this->db->query($query)->row();
    }

}
