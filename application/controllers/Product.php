<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$page_data['page_title'] = 'Product Overview';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'product_overview';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');

        $str = cleanit($this->input->get('q'));
        $page = isset($_GET['page']) ? xss_clean($_GET['page']) : 0;
        if ($page > 1) $page -= 1;
        $array = array('str' => $str, 'is_limit' => false);
        $x = (array)$this->admin->get_approved_list($array);
        $count = (count($x));
        $this->load->library('pagination');
        $this->config->load('pagination');
        $config = $this->config->item('pagination');
        $config['base_url'] = current_url();
        $config['total_rows'] = $count;
        $config['per_page'] = 50;
        $config["num_links"] = 5;
        $this->pagination->initialize($config);
        $array['limit'] = $config['per_page'];
        $array['offset'] = $page * 50;
        $array['is_limit'] = true;
        $page_data['pagination'] = $this->pagination->create_links();
		$page_data['products'] = $this->admin->get_approved_list($array );
		$this->load->view('product/overview', $page_data);
	}

	public function detail(){
		$id = cleanit($this->uri->segment(3));
		$page_data['page_title'] = 'Product Detail';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'product_detail';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$page_data['product'] = $this->admin->get_single_product_detail( $id );
		$page_data['variations'] = $this->admin->get_results('product_variation', "(product_id = {$id})")->result();
		$this->load->view('product/detail', $page_data);
	}

    public function edit()
    {
        if (!$this->input->post()) {
            $id = cleanit($this->uri->segment(3));
            $check = $this->admin->get_row('products', array('id' => $id));
            if( !$check ){
                $this->session->set_flashdata('error_msg', 'You are trying to access an invalid product.');
                redirect('dashboard');
            }
            $uid = $this->session->userdata('logged_id');
            $page_data['pg_name'] = 'product';
            $page_data['sub_name'] = 'edit_product';
            $page_data['least_sub'] = 'edit_product';
            $page_data['profile'] = $this->admin->get_profile_details($uid,
                'first_name,last_name,email,profile_pic');
            $page_data['product'] = $this->admin->get_row('products', array('id' => $id) );
            $category_id = $page_data['product']->category_id;
            $spec_result = $this->admin->get_parent_details($category_id);
            $specification_array = $categories_name = array();
            foreach ($spec_result as $result) {
                $categories_name[] = $result->name;
                if ($result->specifications !== '') {
                    $decode = json_decode($result->specifications);
                    $x = 0;
                    $spec_array = array();
                    foreach ($decode as $key => $value) {
                        $specification = $this->admin->get_specifications($value);
                        if ($specification) {
                            $spec_array['category_name'] = $result->name;
                            $spec_array['description'] = $result->description;
                            $spec_array['specifications'][$x]['spec_id'] = $value;
                            $spec_array['specifications'][$x]['spec_name'] = $specification->spec_name;
                            $spec_array['specifications'][$x]['spec_options'] = $specification->options;
                            $spec_array['specifications'][$x]['multiple_options'] = $specification->multiple_options;
                            $spec_array['specifications'][$x]['spec_description'] = $specification->description;
                            $x++;
                        }
                    }
                    array_push($specification_array, $spec_array);
                }
            }
            $page_data['categories_name'] = $categories_name;
            $page_data['features'] = $specification_array;
            $category_details = $this->admin->get_row('categories', array('id' => $category_id) );
            $option_array = array();
            if (!empty($category_details->variation_options)) {
                $options = json_decode($category_details->variation_options);
                foreach ($options as $option) {
                    $option_name = $this->admin->get_row('options'," (id = {$option})")->name;
                    array_push($option_array, $option_name);
                }
            }
            $page_data['variation_name'] = $category_details->variation_name;
            $page_data['variation_options'] = $option_array;
            $page_data['variations'] = $this->admin->get_results('product_variation', array('product_id' => $id))->result();
            $page_data['product_id'] = $id;
            $page_data['page_title'] = 'Edit product ( ' . $page_data['product']->product_name . ' )';
            $page_data['brands'] = $this->admin->get_results('brands')->result();
            $page_data['categories'] = $this->admin->run_sql("SELECT id, name FROM categories")->result();
            $this->load->view('product/edit', $page_data);
        } else {
            // Process
            $id = $this->input->post('product_id');
            $seller_id = $this->input->post('seller_id');
            $pricing_error = $image_error = 0;
            $return['status'] = 'error';
            $return['message'] = '';
            // Product Block
            $certifications = $this->input->post('certifications');
            $from_overseas = ( $this->input->post('from_overseas') == 'on' ) ? 1 : 0;
            $certifications = (!empty($certifications)) ? json_encode($certifications) : '[]';
            $warranty_type = $this->input->post('warranty_type');
            $warranty_type = (!empty($warranty_type)) ? json_encode($warranty_type) : '[]';
            $colour_family = $this->input->post('colour_family');
            $colour_family = (!empty($colour_family)) ? json_encode($colour_family) : '[]';
            $description = nl2br($this->input->post('product_description', true));
            $in_the_box = nl2br($this->input->post('in_the_box',true));
            $highlights = nl2br($this->input->post('highlights',true));
            $product_warranty = nl2br($this->input->post('product_warranty',true));
            $warranty_address = nl2br($this->input->post('warranty_address',true));
            $product_table = array(
                'product_name' => cleanit($this->input->post('product_name', true)),
                'brand_name' => cleanit($this->input->post('brand_name', true)),
                'category_id' => cleanit($this->input->post('category_id', true)),
                'model' => cleanit($this->input->post('model', true)),
                'main_colour' => $this->input->post('main_colour'),
                'product_description' => $description,
                'youtube_id' => cleanit($this->input->post('youtube_id',true)),
                'in_the_box' => $in_the_box,
                'highlights' => $highlights,
                'product_line' => cleanit($this->input->post('product_line',true)),
                'colour_family' => $colour_family,
                'main_material' => $this->input->post('main_material',true),
                'dimensions' => cleanit($this->input->post('dimensions',true)),
                'weight' => cleanit($this->input->post('weight',true)),
                'product_warranty' => $product_warranty,
                'warranty_type' => $warranty_type,
                'warranty_address' => $warranty_address,
                'certifications' => $certifications,
                'from_overseas' => $from_overseas,
            );
            //     Product Features Block
            // Since we are getting the specification name; we loop through the specification json
            // SELECT id FROM specifications WHERE spec_name = 'POST_KEY'
            $attributes = array();
            foreach ($_POST as $post => $value) {
                if (substr_compare('attribute_', $post, 0, 10) == 0) {
                    // @TODO: fix the multiple value
                    $feature_name = explode('_', $post);
                    if (is_array($post) && !empty($value)) {
                        $x = json_encode($value);
                        $attributes[$feature_name[1]] = json_encode(json_decode($x));
                    } elseif (!empty($value)) {
                        $attributes[$feature_name[1]] = trim($value);
                    }
                }
            }
            $product_table['attributes'] = json_encode($attributes);
            // update product table
            $this->admin->update_data($id, $product_table, 'products');
            // Product Variation Block
            $count_check = sizeof($this->input->post('variation_id'));
            // Declare all variables
            $variation = $this->input->post('variation',true);
            $isbn = $this->input->post('isbn',true);
            $sku = $this->input->post('sku',true);
            $quantity = $this->input->post('quantity',true);
            $sale_price = $this->input->post('sale_price',true);
            $discount_price = $this->input->post('discount_price',true);
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $variation_id = $this->input->post('variation_id');
            if ($count_check > 0){
                for ($i = 0; $i < $count_check; $i++) {
                    $variation_id['id'] = $variation_id[$i];
                    $variation_data['variation'] = cleanit($variation[$i]);
                    $variation_data['sku'] = cleanit($sku[$i]);
                    $variation_data['quantity'] = cleanit($quantity[$i]);
                    $variation_data['sale_price'] = cleanit($sale_price[$i]);
                    $variation_data['discount_price'] = cleanit($discount_price[$i]);
                    $variation_data['start_date'] = $start_date[$i];
                    $variation_data['end_date'] = $end_date[$i];
                    if ($variation_data['quantity'] < 1) $variation_data['quantity'] = 10;
                    if ($variation_id['id'] == 'new') {
                        $variation_data['product_id'] = $id;
                        $this->admin->insert_data('product_variation', $variation_data);
                    } else {
                        $this->admin->update_data( $variation_id['id'] , $variation_data, 'product_variation' );
                    }

                }
            }
            // Product Gallery Block
            if (isset($_FILES) && !empty($_FILES)) {
                $counts = sizeof($_FILES['file']['tmp_name']);
                $product_gallery = array();
                $files = $_FILES;
                for ($x = 0; $x < $counts; $x++) {
                    $old_name['old_name'] = $files['file']['name'][$x];
                    $_FILES['file']['name'] = $files['file']['name'][$x];
                    $_FILES['file']['type'] = $files['file']['type'][$x];
                    $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$x];
                    $_FILES['file']['error'] = $files['file']['error'][$x];
                    $_FILES['file']['size'] = $files['file']['size'][$x];
                    // check if we have the file already uploaded
                    $curl = $this->curl_get_file_size(PRODUCTS_IMAGE_PATH . $old_name['old_name']) ;
                    if( $curl == '' || $curl == 'unknown' ){
                        $product_gallery['featured_image'] = (isset($_POST['featured_image']) && ($old_name['old_name'] == $_POST['featured_image'])) ? 1 : 0;
                        if ($counts == 1) $product_gallery['featured_image'] = 1;
                        if ( !$this->admin->update_data( $old_name['old_name'] , $product_gallery, 'product_gallery','image_name') ) {
                            $image_error++;
                        }
                    }else {
                        // we have a new file to upload
                        $image_upload_array = array(
                            'folder' =>   PRODUCT_IMAGE_FOLDER,
                            'filepath'  => $_FILES['file']['tmp_name'],
                            'eager' => array("width" => 630, "height" => 570, "crop" => "fill")
                        );
                        $this->cloudinarylib->upload_image( $image_upload_array );
                        $image_name = $this->cloudinarylib->get_result();
                        if ($image_name) {
                            $product_gallery = array(
                                'product_id' => $id,
                                'seller_id' => $seller_id,
                                'created_at' => get_now()
                            );
                            $product_gallery['image_name'] = $image_name;
                            if ($counts == 1) $product_gallery['featured_image'] = 1;
                            if (!is_int($this->admin->insert_data('product_gallery', $product_gallery))) {
                                $image_error++;
                            }
                        } else {
                            $image_error++;
                        }
                    }
                }// end of for loop
            }

            // Check for errors
            if ($pricing_error > 0) {
                $return['message'] = 'Error: There was an error updating one of the pricing variation. Retry or contact the webmaster';
            } elseif ($image_error > 0) {
                $return['message'] = 'Error: There was an error updating one of the Image. Retry or contact the webmaster';
            } else {
                // New product mail to be sent to the seller
                $return['status'] = 'success';
                $return['message'] = 'Success: Your product has been updated.';
            }
            $this->session->set_flashdata($return['status'] . '_msg', $return['message']);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    /*
     * Curl to get file size
     * Used for editing of product
     * */
    function curl_get_file_size( $url ) {
        // Assume failure.
        $result = -1;
        $curl = curl_init( $url );
        // Issue a HEAD request and follow any redirects.
        curl_setopt( $curl, CURLOPT_NOBODY, true );
        curl_setopt( $curl, CURLOPT_HEADER, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
        $data = curl_exec( $curl );
        curl_close( $curl );
        if( $data ) {
            $content_length = "unknown";
            $status = "unknown";
            if( preg_match( "/^HTTP\/1\.[01] (\d\d\d)/", $data, $matches ) ) {
                $status = (int)$matches[1];
            }
            if( preg_match( "/Content-Length: (\d+)/", $data, $matches ) ) {
                $content_length = (int)$matches[1];
            }
            // http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
            if( $status == 200 || ($status > 300 && $status <= 308) ) {
                $result = $content_length;
            }
        }
        return $result;
    }

    /*
     * Load all images for a single product
     * To be used for product edit...*/
    public function load_images($id = '')
    {
        if (!$this->input->is_ajax_request()) redirect(base_url());
        $galleries = $this->admin->get_product_gallery($id);
        $result = array();
        foreach ($galleries as $gallery) {
            $img_name = $gallery->image_name;
            $obj['filename'] = $img_name;
            $obj['fileURL'] = PRODUCTS_IMAGE_PATH . $img_name;
//            $obj['fileURL'] = base_url('data/products/' . $id . '/' . $img_name);
//            $obj['filesize'] = filesize(realpath('./data/products/' . $id . '/' . $img_name));
            $obj['filesize'] = $this->curl_get_file_size(PRODUCTS_IMAGE_PATH . $img_name);
            $obj['featured'] = $gallery->featured_image;
            $result[] = $obj;
        }
        header('Content-type: text/json');
        header('Content-type: application/json');
        echo json_encode($result);
        exit;
    }

	public function approve($pid = '', $sid =''){
		$page_data['page_title'] = 'Approve Product';
		$page_data['pg_name'] = 'product';
		$page_data['sub_name'] = 'approve_product';
        $page_data['least_sub'] = '';
		$page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
			'first_name,last_name,email,profile_pic');
		$page_data['products'] = $this->admin->get_unapprove_product();
		$this->load->view('product/approve', $page_data);
	}

	public function action($action, $pid = '', $sid =''){
		$pid = cleanit($pid);
		$sid = cleanit( $sid);
		if( $this->admin->product_listing_action($action, $pid, $sid) ){
			$this->session->set_flashdata('success_msg', 'The product has been ' . $action . 'd successfully.');
            // Track the action
            $activity_log = array('uid' => $this->session->userdata('logged_id'),
                'context' => "The product with the Id (" . $pid . ") was " . $action. "d"
            );
            $this->admin->insert_data(TABLE_SYSTEM_ACTIVITIES, $activity_log);
            if( $action == "approve") {
                redirect(base_url('product/approve/'));
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            $this->session->set_flashdata('error_msg', 'Oops! There was error processing the action');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// Delete product variation row
    //
    public function delete_variation_row(){
        $vid = $this->input->post('vid', true);
        echo $this->admin->delete( array('id' => $vid ), 'product_variation');
        exit;
    }
    /*
     * Upload  description image
     * */
    function description_image_upload(){
        if( !$this->input->is_ajax_request()) redirect(base_url());
        if( $_FILES ){
            $allowed = array('png', 'jpg', 'jpeg', 'gif');
            $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
            if( !in_array(strtolower($extension), $allowed)){
                echo '{"status" : "error"}'; exit;
            }
            $data = array(
                'folder' =>   PRODUCT_DESCRIPTION_FOLDER,
                'filepath'  => $_FILES['file']['tmp_name'],
                'eager' => array("width" => 400, "height" => 400, "crop" => "fill")
            );
            $this->cloudinarylib->upload_image( $data );
            echo $this->cloudinarylib->get_result('full_url');
            exit;
        }
    }

    /*
     * Delete description image
     * */
    function decription_image_remove(){
        if( !$this->input->is_ajax_request()) redirect(base_url());
        $src = $this->input->post('src');
        // lets build the public id
        $explode = explode( '/', $src);
        $image_name = explode('.', end( $explode));
        $public_id = PRODUCT_DESCRIPTION_FOLDER . $image_name[0];
        echo $this->cloudinarylib->delete_image( $public_id );
        exit;
    }

    function product_image_remove(){
        if( !$this->input->is_ajax_request()) redirect(base_url());
        $image_name = $this->input->post('image_name');
        $explode = explode('.',  $image_name);
        $public_id = PRODUCT_IMAGE_FOLDER . $explode[0];
        // delete from DB
        if( $this->admin->delete(array('image_name' => $image_name), 'product_gallery') ){
            echo $this->cloudinarylib->delete_image( $public_id );
            exit;
        }
    }

    // Method to send a seller message
    function message_seller(){
        $seller_id = $this->input->post('seller_id');
        $title = $this->input->post('title');
        $content = $this->input->post('message');

        if ( $this->admin->notify_seller($seller_id, $title, $content) ){
            $this->session->set_flashdata('success_msg', 'Message has been sent to seller.');
        }else{
            $this->session->set_flashdata('error_msg', 'There was an error sending the message to the seller');
        }
        redirect( $_SERVER['HTTP_REFERER'] );
    }


}
