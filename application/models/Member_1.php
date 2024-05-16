<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_1 extends CI_Model{
    
        public $table;
        public $column_order;
        public $column_search;
        public $order;

    public function __construct(){
        parent::__construct();
        $this->table = 'booking_enquiry';

        $this->column_order = array(null, 'ftaken_by','agent_id','MrandMrs','first_name','last_name','email','mobile_number','gender','media_source_name','package_id','booking_date','seat_count','followup_date','enquiry_from','wp_mobile_number','other_tour_name','followup_status','is_view','not_interested','enquiry_type','booking_process','Bus_Status','booking_done','message','i_got_it','booking_status','booking_taken_by','is_deleted','created_at');

        $this->column_search = array(null, 'ftaken_by','agent_id','MrandMrs','first_name','last_name','email','mobile_number','gender','media_source_name','package_id','booking_date','seat_count','followup_date','enquiry_from','wp_mobile_number','other_tour_name','followup_status','is_view','not_interested','enquiry_type','booking_process','Bus_Status','booking_done','message','i_got_it','booking_status','booking_taken_by','is_deleted','created_at');

        $this->order = array('first_name' => 'asc');

    }
    public function getRows($postData){
        $this ->_get_datatables_query($postData);
        if($postData['length']!= -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results;
    }

    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($postData){
        $this->db->from($this->table);

        $i=0;
        foreach($this->column_search as $item){
            if($postData['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }

                if(count($this->column_search) -1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


}