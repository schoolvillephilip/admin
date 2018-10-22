<?php

Class Account_model extends CI_Model
{


    /**
     * @param $access : id
     * @param $details : string of data you only want to retrieve
     * @return mixed
     */
    function get_user($access, $details)
    {
        $this->db->select($details);
        $this->db->where('id', $access);
        return $this->db->get('usee')->row();
    }

}
