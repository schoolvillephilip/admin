<?php

Class Admin_model extends CI_Model
{

    // Insert data
    function login($data = array(), $table_name = 'users')
    {
        if (!empty($data)) {
//            $email = cleanit($data['email']);
            $this->db->where('is_admin', 1);
            $this->db->where('email', $data['email']);
            if ($this->db->get($table_name)->row()) {
                $this->db->where('email', $data['email']);
                $salt = $this->db->get($table_name)->row()->salt;
                if ($salt) {
                    $password = shaPassword($data['password'], $salt);
                    $this->db->where('email', $data['email']);
                    $this->db->where('password', $password);
                    $result = $this->db->get('users');
                    if ($result->num_rows() == 1) {
                        $c_update = array('last_login' => get_now(), 'ip' => $_SERVER['REMOTE_ADDR']);
                        $this->db->where('email', $data['email']);
                        $this->db->update($table_name, $c_update);
                        return $result->row();
                    } else {
                        return false;
                    }
                }
            }
        }
    }

    // Login 

    function hasPermission($group_id, $key)
    {
        $this->db->select('permissions');
        $this->db->where('id', $group_id);
        $group = $this->db->get('groups');
        if ($group) {
            $permission = json_decode($group->permissions, true);
            if ($permission[$key] == true) {
                return true;
            }

            return false;
        }
    }

    // Check user Persmission

    function create_account($data = array(), $table_name = 'users')
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

    function insert_batch( $table_name = 'area', $data = array() ){
        if( !empty($data)) {
            try {
                return $this->db->insert_batch($table_name, $data);
            } catch (Exception $e ) {
                return $e->getMessage();
            }
        }
    }

    // Create An Account for user

    function cur_pass_match($password = null, $access = '', $table = 'users')
    {
        if ($password) {
            $this->db->where('id', $access);
            $this->db->or_where('email', $access);
            $salt = $this->db->get('users')->row()->salt;
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

    // Update table

    function change_password($password, $access = '', $table = 'users')
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

    // check if the password is correct

    /**
     * @param $access : id
     * @param $details : Get all login user  profile details
     * @return mixed
     */
    function get_profile($access)
    {
        $query = "SELECT u.*,s.* FROM users u LEFT JOIN sellers s ON (s.uid = u.id) where u.id = {$access} OR s.uid = {$access}";
        return $this->db->query($query)->row();
    }

    // Change Password

    /**
     * @param string $id
     * @return CI_DB_row
     */
    function get_single_category($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('categories')->row();
    }

    /**
     * Fetching all the children category
     * @param string $id
     * @return CI_DB_result
     */
    function get_children_categories($pid = '')
    {
        if ($pid != '') $this->db->where('pid', $pid);
        return $this->db->get('categories')->result_array();
    }

    /**
     * @param string $slug
     * @return CI_DB_row
     */
    function check_slug($slug)
    {
        do {
            $slug = $slug;
            $count = 0;
            $this->db->where('slug', $slug);
            $this->db->from('categories');
            if ($this->db->count_all_results() >= 1) {
                $number = random_string('nozero', 6);
                $slug = $slug . '-' . $number;
                $this->db->where('slug', $slug);
                $this->db->from('categories');
                $count = $this->db->count_all_results();
            } else {
                $count = 0;
            }
        } while ($count >= 1);
        return $slug;
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
    function get_all_seller_lists($search = '', $limit = '', $offset = '', $type = 'approved')
    {
        $query = "SELECT s.*, u.first_name, u.last_name,u.email,u.last_login, u.is_seller FROM sellers s LEFT JOIN users u ON (u.id = s.uid)";
        if (!empty($limit)) $query .= " LIMIT {$offset},{$limit} ";
        return $this->db->query($query)->result();
    }

    /**
     * @param $type =
     * @return CI_DB_result
     */
    function get_seller_lists($search = '', $limit = '', $offset = '', $type = 'approved')
    {

        $query = "SELECT s.*, u.first_name, u.last_name,u.email,u.last_login, u.is_seller FROM sellers s LEFT JOIN users u ON (u.id = s.uid)";
        if ($search != '') $query .= " WHERE (first_name LIKE '%$search%') OR (last_name LIKE '%$search%') OR (email LIKE '%$search%')";
        if ($search != '' && $type != '') {
            $query .= " AND u.is_seller != 'approved' ";
        } else {
            $query .= " WHERE u.is_seller != 'approved'";
        }
        if (!empty($limit)) $query .= " LIMIT {$offset},{$limit} ";
//        die( $query );
        return $this->db->query($query)->result();
    }

    /*
     * Return all users based on type or all
     * */
    function get_user_lists($search = '', $limit = '', $offset = '', $user_type ='')
    {
        $query = "SELECT * FROM users";
        if ($search != '') $query .= " WHERE (first_name LIKE '%$search%') OR (last_name LIKE '%$search%') OR (email LIKE '%$search%')";

        if( $user_type != '' ){
            $prepend = ( $search != '' ) ? " AND " : " WHERE ";
            switch ($user_type){
                case 'sales_rep':
                    $query .= $prepend ." groups = 4 ";
                    break;
                case 'accountant':
                    $query .= $prepend ." groups = 3 ";
                    break;
                case 'manager':
                    $query .= $prepend ." groups = 2 ";
                    break;
                default:
                    $query .= $prepend ." groups = 0 ";
                    break;
            }
        }
        if (!empty($limit)) $query .= " LIMIT {$offset},{$limit} ";
        return $this->db->query($query)->result();
    }

    /**
     * @param $id , $type( product_status)
     * @return CI_DB_result
     */
    function get_product_list($id = '', $product_status = '', $args = array())
    {
        $query = "SELECT p.id, p.product_status,p.sku, o.sold, p.product_name, p.created_on, p.category_id, p.product_line, p.product_status, p.seller_id, s.first_name, s.last_name,p.created_on FROM products as p
            LEFT JOIN users as s ON ( p.seller_id = s.id )
            LEFT JOIN ( SELECT SUM(qty) as sold, product_id, seller_id from orders GROUP BY orders.product_id) as o ON (p.id = o.product_id AND s.id = o.seller_id)";
        if ($id != '') {
            $query .= " WHERE (p.seller_id = $id";
        }
        if ($product_status != '') {
            if( $id != '' ){
                $query .= " AND p.product_status == '{$product_status}'";
            }else{
                $query .= " WHERE p.product_status == '{$product_status}'";
            }
        }
        if (!empty($args) && !empty($args['str'])) {
            $str = $args['str'];
            if( $id != '' || $product_status != '' ){
                $query .= " AND p.product_name LIKE '%{$str}%' )";
            }else{
                $query .= " WHERE p.product_name LIKE '%{$str}%'";
            }
        }
//        die($query );
        $limit = $args['is_limit'];
        if ($limit == true) {
            $query .= " GROUP BY p.id ORDER BY p.created_on DESC LIMIT " . $args['offset'] . "," . $args['limit'];
        } else {
            $query .= " GROUP BY p.id ORDER BY p.created_on DESC";
        }
        $query_result = $this->db->query($query);
        if( $query_result ){
            return $query_result->result();
        }else{
            return '';
        }
    }

    function get_unapprove_product($id = '')
    {
        $query = "SELECT p.id, p.product_status,p.sku, p.product_name, p.created_on, p.category_id, p.product_line, p.product_status, p.seller_id, s.first_name, s.last_name,p.created_on FROM products as p
            LEFT JOIN users as s ON ( p.seller_id = s.id )";

        $query .= " WHERE (p.product_status != 'approved' AND p.product_status != 'draft')";
        if ($id != '') {
            $query .= " AND p.seller_id = {$id} ";
        }

        $query .= " GROUP BY p.id ORDER BY p.created_on DESC ";
        return $this->db->query($query)->result();
    }

    /**
     * @param $id
     * @return CI_DB_row
     */

    function get_single_product_detail($id)
    {
        $query = "SELECT p.*, g.image_name, o.amount, o.quantity_sold, v.variation_qty, s.id as seller_id, s.first_name, s.last_name, s.email FROM products AS p
                    LEFT JOIN (SELECT ga.image_name, ga.seller_id FROM product_gallery ga WHERE ga.featured_image = 1 AND ga.product_id = {$id} LIMIT 1) g ON (p.seller_id = g.seller_id )
                    LEFT JOIN (SELECT SUM(ord.amount) as amount, ord.product_id, SUM(ord.qty) quantity_sold FROM orders AS ord GROUP BY ord.product_id ) AS o
                    ON ( o.product_id = p.id)
                    LEFT JOIN users AS s ON (p.seller_id = s.id )
                    LEFT JOIN (SELECT SUM(var.quantity) AS variation_qty, var.product_id FROM product_variation var GROUP BY var.product_id ) v
                    ON ( v.product_id = p.id)
                    WHERE p.id = $id GROUP BY p.id ";
        return $this->db->query($query)->row();
    }

    /**
     * Select all orders
     * $type = payment_made = pending|success|fail
     * $user_id = logged in user sales rep or admin
     * args = pagination or other get query
     */
    function get_orders_by_type( $type = '', $args = array()){
        $query = "SELECT id, product_id, order_code, txnref, agent, payment_method, SUM(qty) qty, SUM(amount) amount, active_status, order_date FROM orders";
        switch ($type) {
            case 'success':
                $query .= " WHERE payment_made = 'success'";
                break;
            case 'fail':
                $query .= " WHERE payment_made = 'fail'";
                break;
            case 'pending':
                $query .= " WHERE payment_made = 'pending'";
                break;
            default:
                $query .= " WHERE payment_made IN ('pending', 'fail', 'success')";
        }
        if( $this->session->userdata('group_id') == 4 ){
            $agent_id = $this->session->userdata('logged_id');
            $query .= " AND agent = {$agent_id}";
        }
        $limit = $args['is_limit'];
        if( $limit ){
            $query .= " GROUP BY order_code ORDER BY id DESC LIMIT " . $args['offset'] . "," . $args['limit'];
        }else{
            $query .= " GROUP BY order_code ORDER BY id DESC ";
        }
//        die( $query );

        return $this->db->query( $query )->result();
    }

    function get_order_detail($id = '')
    {
        $query = "SELECT o.id,o.agent,o.payment_method, o.product_id,o.billing_address_id, o.pickup_location_id, o.order_code,o.seller_id,
            SUM(o.qty) qty, SUM(o.amount) amount, 
            o.order_date, o.order_code, o.txnref, o.responseCode, o.paymentDesc, o.status,o.active_status, p.product_name, s.legal_company_name, 
            s.seller_phone seller_phone, su.phone seller_phone2, u.email,  su.email seller_email,
            u.first_name, u.last_name , u.email, u.phone
            FROM orders o
            LEFT JOIN products p ON (o.product_id = p.id) 
            LEFT JOIN sellers s ON (o.seller_id = s.uid)
            LEFT JOIN users su ON (o.seller_id = su.id)
            LEFT JOIN users u ON (o.buyer_id = u.id)";
        $query .= " WHERE (o.order_code = '{$id}' OR o.id = '{$id}')  GROUP BY o.product_id";
        return $this->db->query($query)->result();
    }

    /*
     * */

    /**
     * @param $id
     * @return CI_DB_row
     */

    function product_sold_count($id)
    {
        $query = "SELECT COUNT(qty) as sold FROM orders WHERE seller_id = $id AND status = 'completed'";
        return $this->db->query($query)->row();
    }

    /**
     * @param $id
     * @return CI_DB_result
     */

    function product_count($id)
    {
        $query = "SELECT COUNT(*) as prod FROM products WHERE seller_id = $id";
        return $this->db->query($query)->row();
    }

    /**
     * @param $id = product id, $sid = sellerid
     * @return boolean
     */

    function product_listing_action($action, $pid, $sid)
    {
        $this->db->where('seller_id', $sid);
        $this->db->where('id', $pid);
        if ($this->db->get('products')->num_rows() < 1) {
            return false;
        } else {
            // @TODO Switch action
            $this->db->select('product_name');
            $this->db->where('id', $pid);
            $product_name = $this->db->get('products')->row()->product_name;
            switch ($action) {
                case 'suspend':
                    if ($this->update_data($pid, array('product_status' => 'suspended'), 'products')) {
                        $this->notify_seller($sid,
                            'Your product listing has been suspended', "This is to notify you the product with ( $product_name ) has been suspended.  <br /> Contact support if not please with this action.<br /> Regards."
                        );
                        return true;
                    }
                    break;
                case 'approve':
                    if ($this->update_data($pid, array('product_status' => 'approved'), 'products')) {
                        $this->notify_seller($sid,
                            'Your product listing has been approved', "This is to notify you the product with ( $product_name ) has been " . $action . "ed  <br /> Check your listing <a class='btn-link' href='" . lang('site_domain') . '/product/' . urlify($product_name, $pid) . "/'>Click here to see it live.</a><br /> Regards."
                        );
                        return true;
                    }
                    break;
                case 'delete':
                    // product_variation
                    try {
                        $this->db->where('product_id', $pid);
                        $this->db->delete('product_variation');

                        // product gallery
                        $this->db->where('product_id', $pid);
                        $this->db->delete('product_gallery');

                        // main product
                        $this->db->where('id', $pid);
                        $this->db->delete('products');
                        // remove the images
                        // rmdir(base_url())
                        $this->notify_seller($sid,
                            'Your product listing has been deleted', "This is to notify you the product with ( $product_name ) has been deleted.  <br /> Contact support if you are not happy with this action. <br /> Regards."
                        );
                        return true;
                        break;
                    } catch (Exception $e) {
                    }
            }
        }
        return false;
    }

    function update_data($access = '', $data = array(), $table_name = 'users', $label = '')
    {
        if ($label != '') {
            $this->db->where($label, $access);
        } else {
            $this->db->where('id', $access);
        }
        return $this->db->update($table_name, $data);
    }

    /**
     * @param $sellerid , $title, $content
     * @return boolean
     */
    function notify_seller($seller_id, $title, $content)
    {
        $data = array(
            'seller_id' => $seller_id,
            'title' => $title,
            'content' => $content,
            'created_on' => get_now()
        );
        try {
            $this->insert_data('sellers_notification_message', $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function insert_data($table = 'users', $data = array())
    {
        try {
            $this->db->insert($table, $data);
            $result = $this->db->insert_id();
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

    /**
     * @param $id = product id, $sid = sellerid
     * @return boolean
     */

    function seller_account_action($action, $sid)
    {
        $this->db->where('uid', $sid);
        if ($this->db->get('sellers')->num_rows() < 1) {
            return false;
        } else {
            // Note: When an account is not approved, the products should be suspended
            $this->load->model('email_model', 'email');
            $seller_detail = $this->run_sql("SELECT u.email, s.legal_company_name FROM users u LEFT JOIN sellers s ON (s.uid = u.id) WHERE u.id = {$sid}")->row();
            switch ($action) {
                case 'suspend':
                    $status = $this->update_data($sid, array('is_seller' => 'suspended'), 'users');
                    if ($status) {
                        $this->notify_seller($sid,
                            'Your account has been suspended', "This is to notify you that your account has been suspended. <br />Contact support<br /> Regards."
                        );

                        $email_array = array(
                            'email'     => $seller_detail->email,
                            'recipent'  => 'Dear ' . ucwords($seller_detail->legal_company_name).',',
                            'type'      => 'suspend'
                        );

                        $this->email->send_seller_account_email($email_array);
                    }
                    return $status;
                    break;

                case 'reject':

                    $status = $this->update_data($sid, array('is_seller' => 'rejected'), 'users');
                    $this->db->where('uid', $sid);
                    $this->db->delete('sellers');
                    if ($status) {
                        $email_array = array(
                            'email'     => $seller_detail->email,
                            'recipent'  => 'Dear ' . ucwords($seller_detail->legal_company_name).',',
                            'type'      => 'reject'
                        );
                        $this->email->send_seller_account_email($email_array);
                    }
                    break;

                case 'approve':
                    $status = $this->update_data($sid, array('is_seller' => 'approved'), 'users');
                    if ($status) {
                        // Update the user table row
                        $this->update_data($sid, array('is_seller' => 'approved'));
                        // We're suppose to activate all the products, but we still need to carefully check before setting them to approve
                        $this->notify_seller($sid,
                            'Your account has been approved', "Congrats, we are glad to have you on board.<br /> Regards."
                        );
                        $email_array = array(
                            'email'     => $seller_detail->email,
                            'recipent'  => 'Dear ' . ucwords($seller_detail->legal_company_name).',',
                            'type'      => 'approve'
                        );
                        $this->email->send_seller_account_email($email_array);
                    }

                    return $status;
                    break;
                case 'delete':
                    $this->db->Where('uid', $sid);
                    if ($this->db->delete('sellers')) {
                        return $this->update_data($sid, array('is_seller' => 'blocked'));
                    }
                    break;
                default:
                    # code...
                    break;
            }
        }
        return false;
    }

    function get_brands($id = '')
    {
        if ($id != '') $this->db->where('id', $id);
        return $this->db->get('brands');
    }

    function get_states($id = '')
    {
        if ($id != '') $this->db->where('id', $id);
        return $this->db->get('states');
    }

    // The states for shipping price

    function get_address_price($id = '')
    {
        $select = "SELECT s.name state_name, a.id,a.name,a.sid as sid FROM states s INNER JOIN area a ON(a.sid = s.id)";
        if ($id != '') $select .= " WHERE a.id = $id";
        return $this->db->query($select);
    }

    // area price

    /**
     * Return the num of rows of a table with certain conditions if found
     * @param $table
     * @param array $where
     * @param array $or_where
     * @return int
     */
    function get_num_rows($table, $where = array(), $or_where = array())
    {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
            $this->db->or_where($or_where);
        }
        return $this->db->get($table)->num_rows();
    }

    function get_row($table_name, $condition = array(), $select = '')
    {
        if( $select != '' ) $this->db->select($select);
        if (!empty($condition)) {
            $this->db->where($condition);
            return $this->db->get($table_name)->row();
        }else{
            return $this->db->get($table_name)->row();
        }
    }


    /*
     * Get unanswered questions
     * */
    function get_questions( $args = ''){
        $query = "SELECT q.id, q.question, q.qtimestamp,q.display_name, p.id pid, p.product_name, p.product_description, g.image_name, s.legal_company_name FROM qna q 
          LEFT JOIN products p ON (p.id = q.pid)
          LEFT JOIN sellers s ON (s.uid = p.seller_id) 
          LEFT JOIN product_gallery g ON (p.id = g.product_id AND g.featured_image = 1) WHERE q.status = 'pending'";
        return $this->db->query( $query )->result();
    }


    function run_sql($query)
    {
        return $this->db->query($query);
    }
    //End Question Approval Page Data

    // Get row
    // Get a row of a paticular table
    // Return CI_row

    /**
     * @param $table_name
     * @param array $condition
     * @return array
     */


    function get_results($table_name = '', $condition = array())
    {
        if (!empty($condition)) {
            $this->db->where($condition);
        }
        return $this->db->get($table_name);
    }

    /**
     * @param $variation_name
     * @return int|string
     */
    function check_variation_option($variation_name)
    {
        $this->db->select('id');
        $this->db->where('name', $variation_name);
        $result = $this->db->get('options');
        if ($result->num_rows() > 0) {
            $this->db->select('id');
            $this->db->where('name', $variation_name);
            return $this->db->get('options')->row()->id;
        } else {
            $this->db->insert('options', array('name' => $variation_name));
            return $this->db->insert_id();
        }
    }

    function get_options_name($options = array())
    {
        if (!empty($options)) {
            $query = "SELECT name FROM options WHERE id IN ('" . implode("','", $options) . "')";
            return $this->db->query($query)->result();
        } else {
            return '';
        }
    }

    /*
     * Basically used for Homepage settings
     * On Setting controller
    */

    function action($id, $action, $table)
    {
        if ($action != 'delete') {
            $this->db->where('id', $id);
            if ($action == 'deactivate') {
                $this->db->set('status', 'inactive');
            } else {
                $this->db->set('status', 'active');
            }
            return $this->db->update($table);
        } else {
            return $this->db->delete($table, array('id' => $id));
        }
    }


    function delete( $access, $table){
        $this->db->where( $access);
        return $this->db->delete($table);
    }

    /*
     * Activate or deactivate the homapge category Section board
     * */

    function set_field($table, $field, $set, $where)
    {
        $this->db->where($where);
        $this->db->set($field, $set, false);
        $this->db->update($table);
    }

    /**
     * @param string $id
     * @return mixed
     */
    function get_payment_request($id = '')
    {
        $query = "SELECT p.id, p.transaction_code, p.amount,s.legal_company_name, s.uid, s.bank_name, s.account_name, s.account_number,s.account_type, s.balance 
          FROM payouts p JOIN sellers s ON(s.uid = p.user_id)";
        if ($id != '') {
            $query .= " WHERE p.id = {$id} AND p.status = 'processing' ";
            return $this->run_sql($query)->row_array();
        } else {
            $query .= " WHERE p.status = 'processing' ORDER BY 'date_requested' DESC";
            return $this->run_sql($query)->result();
        }
    }

    // Get payment request,
    // single or result

    function payment_history($status = '')
    {
        $query = "SELECT p.*, s.legal_company_name, s.uid FROM payouts p JOIN sellers s ON (s.uid = p.user_id) ";
        if ($status != '') {
            $query .= " WHERE p.status = '" . $status . "'";
        }
        $query .= " ORDER BY p.id DESC";
        return $this->run_sql($query)->result();
    }

    // Get payment history for Admin to rack

    function mark_order($status, $id, $order_code = '')
    {
//        $status, $id, $order_code
        $query = "SELECT status, payment_method FROM orders";
//        $status_array = array();
        if ($status == 'shipped') {
            $query .= " WHERE order_code = {$order_code}";
            $json = $this->run_sql($query)->row();
            $json_array = json_decode($json->status, true);
            $array = array("{$status}" => array('msg' => "Order was marked as {$status}", 'datetime' => get_now()));
            $status_array = array_merge($json_array, $array);
            $status_array = json_encode($status_array);
            try {
                $this->run_sql("UPDATE orders SET `status` = '$status_array', `active_status` = '{$status}' WHERE `order_code` = {$order_code}");
                return true;
            } catch (Exception $e) {
                return false;
            }
        } else {
            $query .= " WHERE id = {$id}";
            $json = $this->run_sql($query)->row();
            $json_array = json_decode($json->status, true);
            $array = array("{$status}" => array('msg' => "Order was marked as {$status}", 'datetime' => get_now()));
            $status_array = array_merge($json_array, $array);
            $status_array = json_encode($status_array);

            try {

                if( $json->payment_method == 1 ){ //payment on delivery
                    $this->run_sql("UPDATE orders SET `status` = '$status_array', `active_status` = '{$status}', `payment_made` = 'success' WHERE `id` = {$id}");
                }else{
                    $this->run_sql("UPDATE orders SET `status` = '$status_array', `active_status` = '{$status}' WHERE `id` = {$id}");
                }

                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    /*
     * Mark order status
     * {"processing":{"msg":"Your order payment is processing","datetime":"2018-12-10 16:20:58"}}
     * */
    //UPDATE orders SET `status` = 2, `active_status` = shipped WHERE `order_code` = 73862195

    function get_agent($id = '')
    {
        if ($id != '') {
            return $this->get_profile_details($id, 'email,first_name,last_name,phone,gender');
        } else {
            $this->db->where('groups', 4);
            return $this->db->get('users')->result();
        }
    }

    /*
     * Get agent by id or all agents
     * */

    /**
     * @param $access : id
     * @param $details : string of data you only want to retrieve
     * @return mixed
     */
    function get_profile_details($access, $details)
    {
        $this->db->select($details);
        $this->db->where('id', $access);
        return $this->db->get('users')->row();
    }

    /*
     * Update user roles
     *  */

    function update_role($update_type, $update_value, $update_id)
    {
        switch ($update_type):
            case "admin_right":
                $action = 'is_admin';
                break;
            case "admin_group":
                $action = 'groups';
                break;
            Default:
                $action = "";
                break;
        endswitch;
        $query = "UPDATE `users` SET " . $action . " = " . $update_value . " WHERE `users`.`id` = $update_id;";
        try {
            $this->run_sql($query);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /*
     * Get top 20 sales
     * */
    function top_20_sales()
    {
        $query = "SELECT p.product_name, p.id, SUM(o.qty) no_of_sales FROM orders o LEFT JOIN products p ON (p.id = o.product_id) 
        WHERE payment_made = 'success' GROUP BY o.product_id ORDER BY o.qty LIMIT 0,20";
        return $this->run_sql($query)->result();
    }

    /* Get order chart for sales*/
    function order_chart()
    {
        $query = "SELECT
                SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
                SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
                SUM(IF(month = 'Mar', total, 0)) AS 'Mar',
                SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
                SUM(IF(month = 'May', total, 0)) AS 'May',
                SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
                SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
                SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
                SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
                SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
                SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
                SUM(IF(month = 'Dec', total, 0)) AS 'Dec',
                SUM(total) AS total_yearly
                FROM (
            SELECT DATE_FORMAT(order_date, '%b') AS month, SUM(qty) as total
            FROM orders
            WHERE order_date <= NOW() and order_date >= Date_add(Now(),interval - 12 month)
            AND payment_made = 'success'
            GROUP BY order_code, DATE_FORMAT(order_date, '%m-%Y')) as sub";
        return $this->run_sql($query)->row_array();
    }

    /*
     * Payment method toggle
     *  */
    function toggle_payment_method($op, $id)
    {
        switch ($op) {
            case "enable":
                $status = 1;
                break;
            case "disable":
                $status = 0;
                break;
            default:
                $status = 0;
        }
        $query = "UPDATE payment_methods SET `status` = '$status' WHERE `id` = $id";
        try {
            $this->run_sql($query);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /*
     * */
    function get_order_seller($id)
    {
        $query = "SELECT o.seller_id, p.product_name FROM orders o LEFT JOIN p ON(p.id = o.product_id) WHERE o.id = ?";
        return $this->db->get('orders', array($id))->row();
    }


    /*
    *Function to get the parent category of a particular category
    *Called the parent_recurssive
    */

    function get_parent_details($id)
    {
        $array = $this->parent_slug_top($id);
        return $this->db->query("SELECT name, slug, description, specifications FROM categories WHERE id IN ('" . implode("','", $array) . "')")->result();
    }

    /*
        Return an object (name, slug, description, specifications) of all the parent of a category
    */

    function parent_slug_top($id)
    {
        // Select category
        $GLOBALS['array_variable'] = array();
        $select_category = "SELECT id, slug FROM categories WHERE id = {$id}";
        $result = $this->db->query($select_category);
        if ($result->num_rows() >= 1) {
            $pid = $result->row()->id;
            $this->parent_recurssive($pid);
            $array = array_filter($GLOBALS['array_variable']);
            $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
            $new_array = array();
            foreach ($it as $v) {
                array_push($new_array, $v);
            }
            array_push($new_array, $id); // Lets push its own ID also
            return $new_array;
        } else {
            return $GLOBALS['array_variable'];
        }

    }
    /*
    *Called by the parent_slug top, helps to generate the parent id
    */

    function parent_recurssive($pid)
    {
        $category_pid = $pid;
        $total_categories = $this->db->get('categories')->result_array();
        $count = count($total_categories);

        $data = array();
        for ($i = 0; $i < $count; $i++) {
            if ($total_categories[$i]['id'] == $category_pid) {
                array_push($data, $total_categories[$i]['pid']);
            }
        }
        array_push($GLOBALS['array_variable'], $data);
        foreach ($data as $key => $value) {
            $this->parent_recurssive($value);
        }
    }

    /**
     * @param $oroduct_id
     * @return CI_DB_result_array
     */

    function return_order( $oid ){
        $query = "SELECT u.first_name, u.email, u.phone, u.wallet, o.buyer_id, o.order_code, o.product_id, o.amount, o.qty FROM orders o 
        LEFT JOIN users u ON (u.id = o.buyer_id) WHERE o.id = {$oid}";
        return $this->run_sql( $query)->row_array();
    }


    function get_shipping_type( $id , $type = 'pickup'){
        if( $type  == 'delivery'){
            $select = "SELECT b.first_name, b.last_name, b.phone, b.phone2, b.address, s.name state, a.name area FROM billing_address b
            LEFT JOIN states s ON (s.id = b.sid)
            LEFT JOIN area a ON (a.id = b.aid) WHERE b.id = {$id}";
            return $this->db->query( $select )->row();
        }else{
            // Pickup Location
            $select = "SELECT title, phones, emails, address FROM pickup_address WHERE id = {$id}";
            return $this->db->query( $select )->row();
        }
    }

    /**
     * @param $oroduct_id
     * @return CI_DB_result_array
     */

    function get_product_gallery($id)
    {
        $this->db->select('image_name,featured_image');
        $this->db->where('product_id', $id);
        return $this->db->get('product_gallery')->result();
    }





}
