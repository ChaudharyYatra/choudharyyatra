<?php
class Package_model extends CI_Model {
    public function search_packages($zone_name = null, $tour_name = null, $tour_days = null) {
        // $this->db->select('*');
        // $this->db->from('packages');

        // $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost,
        zone_master.zone_name,packages.tour_title,packages.tour_number_of_days";
        $this->db->where('packages.is_deleted','no');
        // $this->db->where('zone_master.zone_name',$zone_master);
        // $this->db->where('packages.tour_title',$tour_name);
        // $this->db->where('packages.tour_number_of_days',$tour_days);    
        // $this->db->where('zone_master.id',$zone_master);
        // $this->db->where('package_type','1');
        // $this->db->where('MONTH(package_date.journey_date)', date('m'));
	    // $this->db->where('YEAR(package_date.journey_date)', date('Y'));
	    // $this->db->order_by('id', 'RANDOM');
	    // $this->db->limit(7);
        $this->db->join("package_date", 'packages.id=package_date.package_id','right');
        $this->db->join("zone_master", 'packages.zone_name=zone_master.id','right');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_date.package_id');
        $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no','zone_master.zone_name'=>$zone_master),$fields);
        // $main_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($main_packages_all); die;

 

        if ($zone_name) {
            $this->db->where('zone_name', $zone_name);
            
        }

        if ($tour_name) {
            $this->db->like('tour_title', $tour_name);
        }

        if ($tour_days) {
            $this->db->where('tour_number_of_days', $tour_days);
        }

        $query = $this->db->get();
        return $query->result();
    }
}
?>