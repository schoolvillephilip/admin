<?php
if(!function_exists('salt')){
 	function salt($length) {
	     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789;:?.>,<!@#$%^&*()-_=+|';
	     $randStringLen = $length;

	     $randString = "";
	     for ($i = 0; $i < $randStringLen; $i++) {
	         $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
	     }

	     return $randString;
	}
}

if(!function_exists('generate_token')){
 	function generate_token($length) {
	     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	     $randStringLen = $length;

	     $randString = "";
	     for ($i = 0; $i < $randStringLen; $i++) {
	         $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
	     }

	     return $randString;
	}
}

if (!function_exists('shaPassword')) {
	function shaPassword($field = "", $salt = "")  {
		if($field) {
			return hash('sha256', $field.$salt);
		}
	}
}

if (!function_exists('accountStatus')){
	function accountStatus( $stat = "" ){
		switch ($stat) {
			case 'suspended':
				return '<label class="label label-info">' . ucfirst( $stat ). '</label>';
				break;
			case 'approved':
				return '<label class="label label-warning">' . ucfirst( $stat ). '</label>';
				break;			
			default:
				return '<label class="label label-success">' . ucfirst( $stat ). '</label>';
				break;
		}
	}
}

if (!function_exists('neatDate')) {
    function neatDate($dt){
        $bdate = $dt;
        $bdate = str_replace('/', '-', $bdate);
        $nice_date = date('d M., Y', strtotime($bdate));
        return $nice_date;
    }
}


if (!function_exists('productStatus')) {
    function productStatus($status){
        switch ($status) {
        	case 'pending':
        		return '<label class="label label-table label-warning">' . ucfirst( $status ). '</label>';
        		break;
        	case 'approved':
        		return '<label class="label label-table label-success">' . ucfirst( $status ). '</label>';
        		break;  
        	case 'missing_images':
				return '<label class="label label-table label-info">' . ucfirst( $status ). '</label>';
				break;      	
        	default:
        		return '<label class="label label-table label-danger">' . ucfirst( $status ). '</label>';
        		break;
        }
    }
}

if (!function_exists('neatTime')) {
    function neatTime($dt){
        $bdate = $dt;
        $bdate = str_replace('/', '-', $bdate);
        $nice_date = date('g:i a', strtotime($bdate));
        return $nice_date;
    }
}

if (!function_exists('plushrs')) {
	function plushrs($dt, $hrs){
		$pure = strtotime($dt);
		$plus = ($pure + 60*60*$hrs);
		$newPure = date('Y-m-d H:i:s', $plus);
		return $newPure;
	}
}

if (!function_exists('ngn')) {
	function ngn($amt = ''){
        if ($amt == '') $amt = '0';
           return '₦'.number_format($amt, 2, '.', ',');
	}
}

if (!function_exists('get_now')) {
	function get_now(){
		return gmdate("Y-m-d H:i:s", time());
	}
}

function get_percentage($total, $number){
 	if ( $total > 0 ) {
 		return round($number / ($total / 100),2);
  	} else {
    	return 0;
  	}
}

function ago($time){
	$time = strtotime($time);
	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	$lengths = array("60","60","24","7","4.35","12","10");

	$now = time();

	   $difference     = $now - $time;
	   $tense         = "ago";

	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	   $difference /= $lengths[$j];
	}

	$difference = round($difference);

	if($difference != 1) {
	   $periods[$j].= "s";
	}

	return "$difference $periods[$j] ago ";
}

if (!function_exists('ngn')) {
    function ngn($amt){
        return '₦'.number_format($amt, 0, '.', ',');
    }
}

function cleanit($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function urlify($string, $id =''){
    $new_string = strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
    if( $id != '' ){
    	return $new_string .'-'.$id.'/';    	
    }else{
    	return $new_string;  
    }
}

/*
 * Check if the logged in adin has the specific priviledge
 * Return bool */
if( !function_exists('has_permission')){
    function has_permission( $key){
        $CI =& get_instance();
        $group_id = $this->session->userdata('group_id');
        $result = $CI->db->query("SELECT permissions FROM admin_groups WHERE id = ? ", array($group_id))->row();
        if( $result ){
            $permission = json_decode( $result->permissions, true);
            $key = trim($key);
            if( $permission[$key] == true){
                return true;
            }
            return false;
        }
        return false;
    }
}

if (!function_exists('paymentStatus')) {
    function paymentStatus($status)
    {
        switch ($status) {
            case 'pending':
                return '<label class="label label-table label-info" title="Payment is yet to be validated by seller">' . ucfirst($status) . '</label>';
                break;
            case 'completed':
                return '<label class="label label-table label-success">' . ucfirst($status) . '</label>';
                break;
            case 'processing':
                return '<label class="label label-table label-warning" title="Payment has been validated, but not yet paid">' . ucfirst($status) . '</label>';
                break;
            default:
                return '<label class="label label-table label-danger">' . ucfirst($status) . '</label>';
                break;
        }
    }
}

if (!function_exists('paymentMethod')) {
    function paymentMethod($id)
    {
        switch ($id) {
            case 1:
                return 'Payment on delivery';
                break;
            case 2:
                return 'Interswitch Webpay';
                break;
            case 3:
                return 'Payment Via Bank Transfer';
                break;
            default:
                return 'Payment mehod not understood';
                break;
        }
    }
}