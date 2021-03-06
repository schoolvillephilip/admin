<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
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

    public function index()
    {
        if ($this->input->post()) {
            $data = array();
            foreach ($_POST as $key => $value) {
                $data[$key] = cleanit($value);
            }
            $update = $this->input->post('update');
            if (!empty($update)) {
                $id = $data['update'];
                unset($data['update']);
                if ($this->admin->update_data($id, $data, 'general_settings')) {
                    $this->session->set_flashdata('success_msg', 'General settings updated successfully.');
                } else {
                    $this->session->set_flashdata('error_msg', 'There was an error updating the general settings.');
                }
            } else {
                unset($data['update']);
                if ($this->admin->insert_data('general_settings', $data)) {
                    $this->session->set_flashdata('success_msg', 'General settings saved.');
                } else {
                    $this->session->set_flashdata('error_msg', 'There was an error saving the general settings.');
                }
            }
            redirect('settings');
        } else {
            $page_data['page_title'] = 'General Settings';
            $page_data['pg_name'] = 'settings';
            $page_data['sub_name'] = 'gen_set';
            $page_data['least_sub'] = '';
            $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                'first_name,last_name,email,profile_pic');
            $page_data['settings'] = $this->admin->get_row('general_settings');
            $this->load->view('settings/general', $page_data);
        }
    }

    public function mail()
    {
        $page_data['page_title'] = 'Mail Settings';
        $page_data['pg_name'] = 'settings';
        $page_data['sub_name'] = 'mail_set';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/mail', $page_data);
    }

    public function edit_footer()
    {
        $page_data['page_title'] = 'Edit Footer';
        $page_data['pg_name'] = 'settings';
        $page_data['sub_name'] = 'e_foot';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/edit_footer', $page_data);
    }

    //discount controllers here
    public function discount($page)
    {
        switch ($page) {
            case 'giftcards' :
                $page_data['page_title'] = 'Gift Cards';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'gift_card';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('settings/discount/gift', $page_data);
                break;
            case 'coupons' :
                $page_data['page_title'] = 'Discount Coupons';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'coupon';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('settings/discount/coupon', $page_data);
                break;
            case 'special' :
                $page_data['page_title'] = 'Special Offers';
                $page_data['pg_name'] = 'disc_opt';
                $page_data['sub_name'] = 'special';
                $page_data['least_sub'] = '';
                $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
                    'first_name,last_name,email,profile_pic');
                $this->load->view('settings/discount/special', $page_data);
                break;
            default:
                return redirect($page);
                break;

        }
    }


    /*
     * All Store Settings Controller Section
     * Pages
     * Payment Methods
     * Store Status
     * */

    public function payment(){
        $page_data['page_title'] = 'Payment Methods';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'payment_set';
        $page_data['least_sub'] = '';
        $page_data['methods'] = $this->admin->get_results('payment_methods')->result();
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        if( $this->input->post() ){
            $settings = '';
            $settings = trim($this->input->post('settings'));

            if( $settings ) {
                $settings = explode(',' , $settings);
                $settings = json_encode( $settings );
            }
//            $slug = trim(strtolower($this->input->post('name')));
//            $slug = preg_replace("/[^A-Za-z0-9\-]/", $slug);
            $data_array = array(
                'name' => $this->input->post('name', true),
                'settings'  => $settings,
                'notes'     => htmlentities($this->input->post('notes'), ENT_QUOTES,"UTF-8")
            );
            if( $this->admin->insert_data('payment_methods', $data_array) ) {
                $this->session->set_flashdata('success_msg', 'The Payment Method has been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error inserting the data.');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->load->view('settings/payment', $page_data);
        }
    }



    function payment_method_toggle(){
        if( $this->input->is_ajax_request() ){
            $op = $this->input->post('op');
            $id = $this->input->post('id');

            if( $this->admin->toggle_payment_method($op, $id) ){
                echo json_encode(array('status' => 1));
            }else{
                $this->session->set_flashdata('error_msg', 'There was an error performing that action. Contact webmaster');
                echo json_encode(array('status' => 0));
                exit;
            }
        }
    }

    public function store_status()
    {
        $page_data['page_title'] = 'Store Online/Offline';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'store_stat';
        $page_data['least_sub'] = '';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $this->load->view('settings/store_status', $page_data);
    }


    /*
     * Pages Settings controller
     * - Home Page
     * - Category
     * - Checkout
     * - Single Product
     * */

    public function home()
    {
        $page_data['page_title'] = 'Homepage Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'homepage';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['homepage_category'] = $this->admin->run_sql("SELECT h.*, c.name FROM homepage_setting h LEFT JOIN categories c ON (h.category_id = c.id)")->result();
        $page_data['homepage_slider'] = $this->admin->get_results('sliders')->result();
        $page_data['categories'] = $this->admin->get_results('categories', "( pid = 0 )")->result();
        $this->load->view('settings/pages/home', $page_data);
    }

    public function privacy()
    {
        $page_data['page_title'] = 'Privacy Policy Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'privacy';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['privacy'] = $this->admin->get_row('page_contents', array('type' => 'privacy'), 'content');
        if( $_POST ){
            $privacy = trim($_POST['privacy']);
            $check = $this->admin->get_row('page_contents', array('type' => 'privacy'), 'content');
            if( !$check ){
                $this->admin->insert_data('page_contents', array('content' => $privacy, 'type' => 'privacy') );
                $this->session->set_flashdata('success_msg', 'Terms and condition posted successfully.');
            }else{
                //update
                $this->admin->update_data('privacy', array('content' => $privacy) , 'page_contents', 'type');
                $this->session->set_flashdata('success_msg', 'Terms and condition updated successfully.');

            }
            redirect('settings/privacy');
        }else{
            $this->load->view('settings/pages/privacy', $page_data);
        }
    }

//    Terms page setttings
    public function terms(){
        $page_data['page_title'] = 'Terms &amp; Conditions Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'terms';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['terms'] = $this->admin->get_row('page_contents', array('type' => 'terms'), 'content');
        if( $_POST ){
            $terms = trim($_POST['terms']);
            $check = $this->admin->get_row('page_contents', array('type' => 'terms'), 'content');
            if( !$check ){

                $this->admin->insert_data('page_contents', array('content' => $terms, 'type' => 'terms') );
                $this->session->set_flashdata('success_msg', 'Terms and condition posted successfully.');
            }else{
                //update
                $this->admin->update_data('terms', array('content' => $terms) , 'page_contents', 'type');
                $this->session->set_flashdata('success_msg', 'Terms and condition updated successfully.');
            }
            redirect('settings/terms');
        }else{
            $this->load->view('settings/pages/terms', $page_data);
        }
    }


    public function agreement()
    {
        $page_data['page_title'] = 'Agreement Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'agreement';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['agreement'] = $this->admin->get_row('page_contents', array('type' => 'agreement'), 'content');
        if( $_POST ){
            $agreement = trim($_POST['agreement']);
            $check = $this->admin->get_row('page_contents', array('type' => 'agreement'), 'content');
            if( !$check ){

                $this->admin->insert_data('page_contents', array('content' => $agreement, 'type' => 'agreement') );
                $this->session->set_flashdata('success_msg', 'Agreement posted successfully.');

            }else{
                //update
                $this->admin->update_data('agreement', array('content' => $agreement) , 'page_contents', 'type');
                $this->session->set_flashdata('success_msg', 'Buyer Agreement updated successfully.');

            }
            redirect('settings/agreement');
        }else{
            $this->load->view('settings/pages/agreement', $page_data);
        }
    }

    // Social Responsiblity

    public function social()
    {
        $page_data['page_title'] = 'Social Responsibility Page Setting';
        $page_data['pg_name'] = 'social_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'social';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['social'] = $this->admin->get_row('page_contents', array('type' => 'social'), 'content');
        if( $_POST ){
            $social = trim($_POST['social']);
            $check = $this->admin->get_row('page_contents', array('type' => 'social'), 'content');
            if( !$check ){

                $this->admin->insert_data('page_contents', array('content' => $social, 'type' => 'social') );
                $this->session->set_flashdata('success_msg', 'Social Responsibility content posted successfully.');

            }else{
                //update
                $this->admin->update_data('social', array('content' => $social) , 'page_contents', 'type');
                $this->session->set_flashdata('success_msg', 'Social responsibility page updated successfully.');

            }
            redirect('settings/social');
        }else{
            $this->load->view('settings/pages/social', $page_data);
        }
    }

    /*
     * Seller Agreement*/
    public function seller_agreement()
    {
        $page_data['page_title'] = 'Seller Agreement Settings';
        $page_data['pg_name'] = 'store_settings';
        $page_data['sub_name'] = 'page_settings';
        $page_data['least_sub'] = 'seller_agreement';
        $page_data['profile'] = $this->admin->get_profile_details($this->session->userdata('logged_id'),
            'first_name,last_name,email,profile_pic');
        $page_data['agreement'] = $this->admin->get_row('page_contents', array('type' => 'seller_agreement'), 'content');
        if( $_POST ){
            $agreement = trim($_POST['agreement']);
            $check = $this->admin->get_row('page_contents', array('type' => 'seller_agreement'), 'content');
            if( !$check ){

                $this->admin->insert_data('page_contents', array('content' => $agreement, 'type' => 'seller_agreement') );
                $this->session->set_flashdata('success_msg', 'Seller Agreement posted successfully.');
                redirect('settings/agreement');
            }else{
                //update
                $this->admin->update_data('seller_agreement', array('content' => $agreement) , 'page_contents', 'type');
                $this->session->set_flashdata('success_msg', 'Seller Agreement updated successfully.');
                redirect('settings/agreement');
            }
        }else{
            $this->load->view('settings/pages/seller_agreement', $page_data);
        }
    }

    function process(){
        if( $_POST || $_FILES ){
            switch ($this->input->post('process_type')) {

                case 'upload_slider_image':
                    $url = trim($this->input->post('url'));
                    if( isset($_FILES)){
                        $image_name = rand(1000,50000);
                        $image_name = md5(md5($image_name));
                        $upload_result = $this->do_upload( $_FILES['slider_image']['tmp_name'], $image_name,SLIDER_IMAGE_FOLDER);

                        if( $upload_result ){
                            $data = array('image' => $image_name .'.'. $upload_result['format'], 'img_link' => $url );
                            $insert_id = $this->admin->insert_data('sliders', $data);
                            if( is_int( $insert_id )){
                                $this->session->set_flashdata('success_msg', 'The image has been added to the slider gallery');
                                redirect($_SERVER['HTTP_REFERER']);
                            }
                        }
                        $this->session->set_flashdata('error_msg', 'There was an error performing that action');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                    break;
                case 'call_to_action':
                    $url = $this->input->post('url');
                    $image = $this->input->post('cta_image', true);
                    $position = $this->input->post('position', true);
                    break;
                case 'modal':
                    $design_type = $this->input->post('design_type');
                    $modal_text = $this->input->post('modal_text');
                    $image = $this->input->post('modal_image');
                    $btn_type = $this->input->post('button_type');
                    $slider_bg_colour = $this->input->post('background_colour');
                    $btn_text = $this->input->post('btn_text');
                    break;
                case 'main_category':
                    // A big shot coming through
                    if( isset($_FILES) ){
                        $counts = sizeof($_FILES['image']['tmp_name']);
                        $files = $_FILES;
                        $content_array = array();
                        for ($x = 0; $x < $counts; $x++) {
                            $old_name = $files['image']['name'][$x];
                            $_FILES['image']['name'] = $files['image']['name'][$x];
                            $_FILES['image']['type'] = $files['image']['type'][$x];
                            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$x];
                            $_FILES['image']['error'] = $files['image']['error'][$x];
                            $_FILES['image']['size'] = $files['image']['size'][$x];
                            $image_name = rand(1000,50000) . '_' .  strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                            $upload_result = $this->do_upload( $_FILES['image']['tmp_name'], $image_name,CATEGORY_IMAGE_FOLDER);
                            $new_name = str_replace('.','_',$old_name);
                            if ($upload_result){
                                $image_position = $this->input->post($new_name.'_position');
                                $link = $this->input->post($new_name.'_url');
                                $json_array = array(
                                    'img' => $image_name,
                                    'position' => $image_position,
                                    'link'  => $link
                                );
                                array_push( $content_array, $json_array);
                                unset($json_array);
                            }
                            $old_name = '';
                        }// end of for loop
                        $content= json_encode( $content_array  );
                        $data = array(
                            'category_id' => $this->input->post('category_id'),
                            'position' => $this->input->post('position'),
                            'content' => $content
                        );
                        $insert_id = $this->admin->insert_data('homepage_setting', $data);
                        if( !$insert_id || !is_int($insert_id)){
                            $this->session->set_flashdata('error_msg', $insert_id);
                        }else{
                            $this->session->set_flashdata('success_msg', 'Homepage category has been saved. Need to publish...');
                        }
                    }
                    echo '';
                    break;
            }
        }
        else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    function action( $id, $action, $module ){
        $id = cleanit( $id );
        switch ( $module ) {
            case 'homepage_category':
                $table = 'homepage_setting';
                switch ( $action ) {
                    case 'deactivate':
                    case 'activate':
                        if( $this->admin->action($id, $action, $table)){
                            $this->session->set_flashdata('success_msg',' Action successful.');
                        }else{
                            $this->session->set_flashdata('error_msg', 'There was an error performing the action');
                        }
                        break;
                    case 'delete':
                        // Need the image

                        if( $this->admin->action($id, 'delete', $table)){
                            $image = $this->admin->get_row($table, "(id = {$id})")->image;
                            $explode = explode('.', $image);
                            $this->load->library('cloudinarylib');
                            $return = \Cloudinary\Uploader::destroy($explode[0]);
                            if( $return['result'] != 'ok '){
                                throw new Exception('There was an error removing the image from Cloudinary... Refresh page.');
                            }

                            $this->session->set_flashdata('success_msg',' Action successful.');
                        }else{
                            $this->session->set_flashdata('error_msg', 'There was an error performing the action');
                        }
                        break;
                    default:
                        $this->session->set_flashdata('error_msg', 'The action you are trying to perform is not define');
                        break;
                }
                break;
            case 'homepage_slider':
                $table = 'sliders';
                switch ( $action ) {
                    case 'deactivate':
                    case 'activate':
                        if( $this->admin->action($id, $action, $table)){
                            $this->session->set_flashdata('success_msg',' Action successful.');
                        }else{
                            $this->session->set_flashdata('error_msg', 'There was an error performing the action');
                        }
                        break;
                    case 'delete':
                        if( $this->admin->action($id, 'delete', $table)){
                            $this->session->set_flashdata('success_msg',' Action successful.');
                        }else{
                            $this->session->set_flashdata('error_msg', 'There was an error performing the action');
                        }
                        break;
                    default:
                        $this->session->set_flashdata('error_msg', 'The action you are trying to perform is not define');
                        break;
                }
                break;
            default:
                $this->sesion->set_flashdata('error_msg', 'Oops! Seems you are lost :( ');
                break;
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    /*
     * Local upload
     * */
    function upload_image($field, $path = SLIDER_IMAGE_PATH ){
        if( !file_exists( $path ) ) mkdir( $path, '0777');
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|JPG';
        $config['max_size'] = 1000;
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $this->session->set_flashdata('error_msg',$this->upload->display_errors());
            return false;
        } else {
//            $config['allowed_types'] = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp';
//            $config['image_library'] = 'gd2';
//            $config['source_image'] = $_SERVER['DOCUMENT_ROOT'] .'/contents/home/' . $this->upload->data('file_mame');
//            $config['create_thumb'] = TRUE;
//            $config['maintain_ratio'] = TRUE;
//            $config['width']         = 75;
//            $config['height']       = 50;
//            $this->load->library('image_lib', $config);
//            $this->image_lib->resize();
            return $this->upload->data('file_name');

        }
    }

    /*
     * Cloudinary Image upload
     * */
    function do_upload($filepath, $image_name, $folder)
    {
        $this->load->library('cloudinarylib');
        $return = \Cloudinary\Uploader::upload($filepath,
            array(
                "folder" => $folder,
                "public_id" => $image_name,
                "resource_type" => "image",
                "eager_async" => true,
                "quality" => 60,
                'eager' => array("width" => 630, "height" => 570, "crop" => "fill")
            )
        );
        return $return;
    }

}
