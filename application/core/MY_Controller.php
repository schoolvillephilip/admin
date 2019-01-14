<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Security Checks here
        $pages = array('dashboard', 'product', 'orders', 'brands', 'categories', 'sellers', 'account', 'settings', 'states', 'profile_settings', 'help', 'logout');
    }

//switch ($group) {
//case '1':
//echo 'Administrator';
//break;
//case '2':
//echo 'Manager';
//break;
//case '3':
//echo 'Accountant';
//break;
//case '4':
//echo 'Sales Rep';
//break;
//};
}