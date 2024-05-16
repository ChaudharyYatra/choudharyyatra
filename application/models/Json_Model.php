<?php 

class Json_Model extends CI_model {

    public function insert_json_in_db($json_data){
        $this->db->insert('traveller_attendance', $json_data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

?>