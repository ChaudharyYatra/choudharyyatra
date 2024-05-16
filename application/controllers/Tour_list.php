<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_list extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index($id,$inf=false)
     {
        
         $where_in_packages_ids = array();
         
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
        $package_id_list = $this->master_model->getSingleRecord('package_mapping',array('is_deleted'=>'no','is_active'=>'yes','id'=>$id),'group_concat(package_id) as package_ids');
        
        if($package_id_list)
            {
                $where_in_packages_ids = explode(',',$package_id_list['package_ids']);
            }
            
        
         $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('id',$id);
        $this->db->order_by('id','DESC');
        $package_mapping = $this->master_model->getRecords('package_mapping');
        
        if(!empty($where_in_packages_ids))
                        {
                        	$this->db->where_in('id', $where_in_packages_ids);
                      	}
         if($inf == ''){ 
         	$where['packages.is_deleted'] = 'no';
         	$where['packages.is_active'] = 'yes';
			$packages_data = $this->master_model->getRecords('packages', $where);
         }else if($inf == 'asc'){
         	$where['packages.is_deleted'] = 'no';
         	$where['packages.is_active'] = 'yes';
         	$this->db->order_by('cost','ASC');
			$packages_data = $this->master_model->getRecords('packages', $where); 
         }else if($inf == 'dsc'){
         	$where['packages.is_deleted'] = 'no';
         	$where['packages.is_active'] = 'yes';
         	$this->db->order_by('cost','DESC');
			$packages_data = $this->master_model->getRecords('packages', $where);  
         }     
         
         $data = array('middle_content' => 'main_category_tour_sub_list',
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
						'packages_data'       => $packages_data,
						'page_title'    => 'Packages List',
						'pid' => $id,
						);
        $this->arr_view_data['page_title']     =  "Tour List";
        $this->arr_view_data['middle_content'] =  "main_category_tour_sub_list";
        $this->load->view('front/common_view',$data);
     }
     
     
     public function all_main_category_list($inf=false)
     {
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
        $package_id_list = $this->master_model->getSingleRecord('package_mapping',array('is_deleted'=>'no','is_active'=>'yes'),'group_concat(package_id) as package_ids');
         $package_mapping=array();
        if($inf == ''){
         $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->group_by('package_title');
        $this->db->order_by('id','DESC');
        $package_mapping = $this->master_model->getRecords('package_mapping');
        }else if($inf == 'asc'){
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->group_by('package_title');
        $this->db->order_by('cost','ASC');
        $package_mapping = $this->master_model->getRecords('package_mapping');    
        }else if($inf == 'dsc'){
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->group_by('package_title');
        $this->db->order_by('cost','DESC');
        $package_mapping = $this->master_model->getRecords('package_mapping');    
        }
        
         $data = array('middle_content' => 'main_category_tour_list.php',
                        'page_title'  => "Main Category List",
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
						'package_mapping'       => $package_mapping
						);
        $this->arr_view_data['middle_content'] =  "main_category_tour_list.php";
        $this->load->view('front/common_view',$data);
     }


	

}