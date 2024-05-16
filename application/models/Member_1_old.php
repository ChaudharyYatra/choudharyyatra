<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_1 extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
        
    }
    function booking_enquiry_count()
    {
        $query = $this
            ->db
            ->get('booking_enquiry');

        return $query->num_rows();
    }

    function booking_enquiry($limit, $start, $col, $dir)
    {
        $query = $this
            ->db
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('booking_enquiry');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
}