<?php
 class pagination_model extends CI_Model 
 {
    //--- Get total record
   public function allrecord($title){
        if(!empty($title)){
            $this->db->like('tour_title',$title);
		}
		$this->db->select('id');
		$this->db->from('packages');
        //$this->db->where('DELETE_STATUS','N'); //IF YOU WANT WHERE CONDITION THEN USE THIS CODE
        $rs = $this->db->get();
		$rs->num_rows();
		return $rs->num_rows();
    }
	//--- fetch record list with search offset
    public function data_list($limit,$offset,$title){	
		if(!empty($title)){
            $this->db->like('tour_title',$title);
		}
		$this->db->select('id,tour_number,tour_title');
		$this->db->from('packages');
		//$this->db->where('DELETE_STATUS','N'); //IF YOU WANT WHERE CONDITION THEN USE THIS CODE
		$this->db->order_by('id','DESC');
        $this->db->limit($limit,$offset);
        $rs = $this->db->get();
		return $rs->result(); 
    }	
}
?>