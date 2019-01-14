<?php

Class Admin_model extends CI_Model{

    // Insert data
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

    // Login 
    function login($data = array(), $table_name = 'users'){
        if (!empty($data)) {
            $email = cleanit($data['email']);
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

    // Check user Persmission
    function hasPermission( $group_id, $key ){
        $this->db->select('permissions');
        $this->db->where('id', $group_id);
        $group = $this->db->get('groups');    
        if($group){
            $permission = json_decode($group->permissions,true);
            if($permission[$key] == true ){
                return true;
            }

            return false;
        }
    }

    // Create An Account for user

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

    // Update table
    function update_data($access = '', $data = array(), $table_name = 'users', $label = '')
    {
        if ($label != '') {
            $this->db->where($label, $access);
        } else {
            $this->db->where('id', $access);
        }
        return $this->db->update($table_name, $data);
    }

    // check if the password is correct

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

    // Change Password
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

    /**
     * @param $access : id
     * @param $details : Get all login user  profile details
     * @return mixed
     */
    function get_profile($access){
        $query =  "SELECT u.*,s.* FROM users u LEFT JOIN sellers s ON (s.uid = u.id) where u.id = {$access} OR s.uid = {$access}";
        return $this->db->query($query)->row();
    }

    /**
     * @param string $id
     * @return CI_DB_row
     */
    function get_single_category( $id ){
        $this->db->where('id', $id );
        return $this->db->get('categories')->row();
    }

    /**
     * Fetching all the children category
     * @param string $id
     * @return CI_DB_result
     */
    function get_children_categories($pid = ''){
        if ($id != '') $this->db->where('pid', $pid);
        return $this->db->get('categories')->result_array();
    }

    /**
     * @param string $slug
     * @return CI_DB_row
     */
    function check_slug( $slug ){
        do {
            $slug = $slug;
            $count = 0; 
            $this->db->where( 'slug', $slug);
            $this->db->from('categories');
            if( $this->db->count_all_results() >= 1 ){
                $number = random_string('nozero', 6);
                $slug = $slug.'-'.$number;
                $this->db->where('slug', $slug);
                $this->db->from('categories');
                $count = $this->db->count_all_results();
            }else{
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
    function get_seller_lists($search = '', $limit = '', $offset = '', $type = 'approved'){

        $query = "SELECT s.*, u.first_name, u.last_name,u.email,u.last_login, u.is_seller FROM sellers s LEFT JOIN users u ON (u.id = s.uid)";
        if( $search != '' ) $query .= " WHERE (first_name LIKE '%$search%') OR (last_name LIKE '%$search%') OR (email LIKE '%$search%')";
        if( $search != '' && $type != '' ) { $query .= " AND u.is_seller != 'approved' ";}else{ $query .= " WHERE u.is_seller != 'approved'"; }
        if( !empty($limit)) $query .= " LIMIT {$offset},{$limit} ";
//        die( $query );
        return $this->db->query($query)->result();
    }


    function get_user_lists($search = '', $limit = '', $offset = ''){
        $query = "SELECT * FROM users";

        if( $search != '' ) $query .= " WHERE (first_name LIKE %$search%) OR (last_name LIKE %$search%) OR (email LIKE %$search%)";
        if( !empty($limit)) $query .= " LIMIT {$offset},{$limit} ";
        return $this->db->query($query)->result();
    }

    /**
     * @param $id, $type( product_status) 
     * @return CI_DB_result
     */
    function get_product_list($id = '', $product_status = '', $args = array() ){
        $query = "SELECT p.id, p.product_status,p.sku, o.sold, p.product_name, p.created_on, p.category_id, p.product_line, p.product_status, p.seller_id, s.first_name, s.last_name,p.created_on FROM products as p
            LEFT JOIN users as s ON ( p.seller_id = s.id )
            LEFT JOIN ( SELECT SUM(qty) as sold, product_id, seller_id from orders GROUP BY orders.product_id) as o ON (p.id = o.product_id AND s.id = o.seller_id)";
        if( $id != '' ){
            $query .= " WHERE p.seller_id = $id";
        }
        if( $product_status != '' ){
            $query .= " AND p.product_status != 'approved'";
        }
        $query .= " GROUP BY p.id";
        return $this->db->query($query)->result();
    }

    function get_unapprove_product($id = ''){
        $query = "SELECT p.id, p.product_status,p.sku, p.product_name, p.created_on, p.category_id, p.product_line, p.product_status, p.seller_id, s.first_name, s.last_name,p.created_on FROM products as p
            LEFT JOIN users as s ON ( p.seller_id = s.id )";
        
            $query .= " WHERE p.product_status != 'approved'";
            if( $id != ''){ $query .= " AND p.seller_id = {$id} ";}

        $query .= " GROUP BY p.id";
        return $this->db->query($query)->result();
    }


    /**
     * @param $id
     * @return CI_DB_row
     */

    function get_single_product_detail($id){
        $query = "SELECT p.*, g.image_name, o.amount, o.quantity_sold, v.variation_qty, s.id as seller_id, s.first_name, s.last_name, s.email FROM products AS p
                    LEFT JOIN (SELECT ga.image_name, ga.seller_id FROM product_gallery ga WHERE ga.featured_image = 1 AND ga.product_id = $id LIMIT 1) g ON (p.seller_id = g.seller_id )
                    LEFT JOIN (SELECT SUM(ord.amount) as amount, ord.product_id, SUM(ord.qty) quantity_sold FROM orders AS ord GROUP BY ord.product_id ) AS o
                    ON ( o.product_id = p.id)
                    LEFT JOIN users AS s ON (p.seller_id = s.id )
                    LEFT JOIN (SELECT SUM(var.quantity) AS variation_qty, var.product_id FROM product_variation var GROUP BY var.product_id ) v
                    ON ( v.product_id = p.id)
                    WHERE p.id = $id GROUP BY p.id ";
        return $this->db->query($query)->row();
    }

    /**
     * @param $id
     * @return CI_DB_object
     */
    function get_orders( $id = ''){
        $query = "SELECT o.id,o.agent, o.product_id, o.order_code,b.first_name,b.last_name, b.phone,b.phone2, b.address, ar.name area, st.name state, o.seller_id, SUM(o.qty) qty, SUM(o.amount) amount, 
          o.order_date, o.status,o.active_status, p.product_name, s.legal_company_name, u.email,  su.email seller_email FROM orders o
        LEFT JOIN products p ON (o.product_id = p.id) 
        LEFT JOIN sellers s ON (o.seller_id = s.uid)
        LEFT JOIN users su ON (o.seller_id = su.id)
        LEFT JOIN billing_address b ON (o.billing_address_id = b.id )
        LEFT JOIN states st ON (b.sid = st.id)
        LEFT JOIN area ar ON (b.aid = ar.id)
        LEFT JOIN users u ON (o.buyer_id = u.id)";
        if( $id != '' ) {
            $query .= " WHERE o.order_code = '{$id}' OR o.id = '{$id}' GROUP BY o.product_id";
        }else{
            $query .= " GROUP BY o.order_code";
        }
        return $this->db->query($query)->result();
    }
    /*
     * Get orders for Sales Representative
     * */
    function get_orders_for_salesrep( $id, $uid = '' ){
        $query = "SELECT o.id,o.agent, o.product_id, o.order_code,b.first_name,b.last_name, b.phone,b.phone2, b.address, ar.name area, st.name state, o.seller_id, SUM(o.qty) qty, SUM(o.amount) amount, 
          o.order_date, o.status,o.active_status, p.product_name, s.legal_company_name, u.email,  su.email seller_email FROM orders o
        LEFT JOIN products p ON (o.product_id = p.id) 
        LEFT JOIN sellers s ON (o.seller_id = s.uid)
        LEFT JOIN users su ON (o.seller_id = su.id)
        LEFT JOIN billing_address b ON (o.billing_address_id = b.id )
        LEFT JOIN states st ON (b.sid = st.id)
        LEFT JOIN area ar ON (b.aid = ar.id)
        LEFT JOIN users u ON (o.buyer_id = u.id)";
        $query .= " WHERE o.agent = {$uid} AND o.active_status != 'completed'";
        if( $id != ''){
            $query .= " AND o.order_code = {$id} OR o.id = {$id}";
        }
        $query.= " GROUP BY o.order_code";
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

    

    /**
     * @param $sellerid, $title, $content
     * @return boolean
     */
    function notify_seller($seller_id, $title, $content){
        $data = array(
            'seller_id' => $seller_id,
            'title'     => $title,
            'content'   => $content,
            'created_on' => get_now()
        );
        try {
            $this->insert_data('sellers_notification_message', $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $id = product id, $sid = sellerid
     * @return boolean
     */

    function product_listing_action( $action, $pid,$sid ){
        $this->db->where('seller_id', $sid);
        $this->db->where('id', $pid);
        if( $this->db->get('products')->num_rows() < 1 ){
            return false;
        }else{
            // @TODO Switch action
            $this->db->select('product_name');
            $this->db->where('id', $pid);
            $product_name = $this->db->get('products')->row()->product_name;
            switch ($action) {
                case 'suspend':
                    if( $this->update_data($pid, array('product_status' => 'suspended'), 'products')){
                        $this->notify_seller($sid, 
                            'Your product listing has been suspended', "This is to notify you the product with ( $product_name ) has been suspended.  <br /> Contact support if not please with this action.<br /> Regards."
                        );
                        return true;
                    }
                    break;
                case 'approve':
                    if( $this->update_data($pid, array('product_status' => 'approved'), 'products')){
                            $this->notify_seller($sid, 
                                'Your product listing has been approved', "This is to notify you the product with ( $product_name ) has been " . $action . "ed  <br /> Check your listing <a href='" .lang('site_domain')."/" . urlify($product_name, $pid) ."'>Click here to see.</a><br /> Regards."
                            );
                            return true;
                        }
                        break;
                case 'delete':
                    // product_variation
                    $this->db->where('product_id', $pid);
                    $this->db->delete('product_variation');

                    // product gallery
                    $this->db->where('product_id', $pid);
                    $this->db->delete('product_gallery');

                    // main product
                    $this->db->where('id', $pid);
                    $this->db->delete('product');
                    // remove the images
                    // rmdir(base_url())
                    $this->notify_seller($sid, 
                            'Your product listing has been deleted', "This is to notify you the product with ( $product_name ) has been deleted.  <br /> Contact support if you are not happy with this action. <br /> Regards."
                        );
                    return true; 
                    break;
            }
        }
        return false;
    }
    /**
     * @param $id = product id, $sid = sellerid
     * @return boolean
     */

    function seller_account_action( $action, $sid ){
        $this->db->where('uid', $sid);
        if( $this->db->get('sellers')->num_rows() < 1 ){
            return false;
        }else{
            // Note: When an account is not approved, the products should be suspended
            switch ($action) {
                case 'suspend':
                    $status = $this->update_data($sid,array('status' => 'suspended'), 'sellers', 'uid');
                    if( $status ){
                        $this->notify_seller($sid, 
                            'Your account has been suspended', "This is to notify you that your account has been suspended. <br />Contact support<br /> Regards."
                        );
                    }
                    return $status;
                    break;

                case 'reject':
                    $status = $this->update_data($sid,array('status' => 'rejected'), 'sellers', 'uid');
                    if( $status ){
                        // Products to be deleted
                        $this->update_data($sid, array('product_status' => 'suspended'), 'products', 'seller_id');
                        $this->notify_seller($sid, 
                            'Your account has been rejected', "This is to notify you that your account has been suspended. <br />Contact support<br /> Regards."
                        );
                    }
                    break;

                case 'approve':
                    $status = $this->update_data($sid,array('status' => 'approved'), 'sellers', 'uid');
                    if( $status ){
                        // Update the user table row
                        $this->update_data($sid, array('is_seller' => 'approved'));
                        // We're suppose to activate all the products, but we still need to carefully check before setting them to approve
                        $this->notify_seller($sid,
                            'Your account has been approved', "Congrats, welcome to your seller dashboard.<br /> Regards."
                        );
                    }
                    return $status;
                    break;
                case 'delete':
                    $this->db->Where('uid', $sid);
                    if($this->db->delete('sellers')){
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

    function get_brands($id =''){
        if( $id != '') $this->db->where('id', $id);
        return $this->db->get('brands');
    }

    // The states for shipping price
    function get_states( $id = '' ){
        if( $id != '' ) $this->db->where('id', $id);
        return $this->db->get('states');
    }

    // area price

    function get_address_price( $id = ''){
        $select = "SELECT s.name state_name, a.id,a.name,a.price,a.sid as sid FROM states s INNER JOIN area a ON(a.sid = s.id)";
        if( $id != '' ) $select .= " WHERE a.id = $id";
        return $this->db->query($select);
    }


    /**
     * Return the num of rows of a table with certain conditions if found
     * @param $table
     * @param array $where
     * @param array $or_where
     * @return int
     */
    function get_num_rows($table, $where = array(), $or_where = array() ){
        if( !empty($where) ) {
            $this->db->where($where);
            $this->db->or_where($or_where);
        }
        return $this->db->get( $table )->num_rows();
    }


    // General function to SQL
    function run_sql( $query ){
        return $this->db->query( $query );
    }

    // Get row
    // Get a row of a paticular table
    // Return CI_row
    function get_row( $table_name, $condition = array() ){
        if( !empty( $conditionn ) ){
            $this->db->where( $condition );
        }
        return $this->db->get( $table_name )->row();
    }


    /**
     * @param $table_name
     * @param array $condition
     * @return array
     */
    function get_results($table_name = '', $condition = array() ){
        if( !empty( $condition) ){
            $this->db->where( $condition );
        }
        return $this->db->get( $table_name );
    }

    /**
     * @param $variation_name
     * @return int|string
     */
    function check_variation_option($variation_name ){
        $this->db->select('id');
        $this->db->where('name', $variation_name);
        $result = $this->db->get('options');
        if( $result->num_rows() > 0 ){
            $this->db->select('id');
            $this->db->where('name', $variation_name);
            return $this->db->get('options')->row()->id;
        }else{
            $this->db->insert('options', array('name' => $variation_name));
            return $this->db->insert_id();
        }
    }

    function get_options_name( $options = array() ){
        if( !empty( $options ) ) {
            $query = "SELECT name FROM options WHERE id IN ('".implode("','",$options)."')";
            return $this->db->query( $query )->result();
        }else{
            return '';
        }
    }

    /*
     * Delete, Activate or deactivate the homapge category Section board
     * */
    function action($id , $action, $table ){
        if( $action != 'delete'){
            $this->db->where('id', $id);
            if($action == 'deactivate'){
                $this->db->set('status', 'inactive');
            }else{
                $this->db->set('status', 'active');
            }
            return $this->db->update($table);
        }else{
            return $this->db->delete($table, array('id' => $id));
        }
    }


    function set_field( $table, $field, $set, $where ){
        $this->db->where($where);
        $this->db->set($field, $set, false);
        $this->db->update($table);
    }

    // Get payment request,
    // single or result
    /**
     * @param string $id
     * @return mixed
     */
    function get_payment_request($id = ''){
        $query = "SELECT p.id, p.transaction_code, p.amount,s.legal_company_name, s.uid, s.bank_name, s.account_name, s.account_number,s.account_type, s.balance 
          FROM payouts p JOIN sellers s ON(s.uid = p.user_id)";
        if( $id != '' ) {
            $query .= " WHERE p.id = {$id} AND p.status = 'processing' ";
            return $this->run_sql( $query )->row_array();
        }else{
            $query .= " WHERE p.status = 'processing' ORDER BY 'date_requested' DESC";
            return $this->run_sql( $query )->result();
        }
    }

    // Get payment history for Admin to rack
    function payment_history( $status = ''){
        $query = "SELECT p.*, s.legal_company_name, s.uid FROM payouts p JOIN sellers s ON (s.uid = p.user_id) ";
        if( $status != '' ) {
            $query .= " WHERE p.status = '" . $status . "'";
        }
        $query .= " ORDER BY p.id DESC";
        return $this->run_sql( $query )->result();
    }

    /*
     * Mark order status
     * {"processing":{"msg":"Your order payment is processing","datetime":"2018-12-10 16:20:58"}}
     * */
//UPDATE orders SET `status` = 2, `active_status` = shipped WHERE `order_code` = 73862195
    function mark_order( $status, $id, $order_code = ''){
//        $status, $id, $order_code
        $query = "SELECT status FROM orders";
//        $status_array = array();
        if( $status == 'shipped' ){
            $query .= " WHERE order_code = {$order_code}";
            $json = $this->run_sql( $query )->row();
            $json_array = json_decode( $json->status, true );
            $array = array("{$status}" => array('msg' => "Order was marked as {$status}", 'datetime' => get_now()));
            $status_array = array_merge( $json_array, $array);
            $status_array = json_encode( $status_array);
            try {
                $this->run_sql("UPDATE orders SET `status` = '$status_array', `active_status` = '{$status}' WHERE `order_code` = {$order_code}");
                return true;
            } catch (Exception $e) {
                return false;
            }
        }else{
            $query .= " WHERE id = {$id}";
            $json = $this->run_sql( $query )->row();
            $json_array = json_decode( $json->status, true );
            $array = array( "{$status}" => array('msg' => "Order was marked as {$status}", 'datetime' => get_now()) );
            $status_array= array_merge( $json_array, $array);
//            var_dump( $status_array );
//            exit;
            $status_array = json_encode( $status_array);
            try {
                $this->run_sql("UPDATE orders SET `status` = '$status_array', `active_status` = '{$status}' WHERE `id` = {$id}");
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    /*
     * Get agent by id or all agents
     * */
    function get_agent( $id = '' ){
        if( $id != '' ){
            return $this->get_profile_details($id, 'email,first_name,last_name,phone,gender');
        }else{
            $this->db->where('groups', 4);
            return $this->db->get('users')->result();
        }
    }

}
