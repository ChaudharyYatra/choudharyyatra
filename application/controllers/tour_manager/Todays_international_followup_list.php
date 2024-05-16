<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Todays_international_followup_list extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/todays_international_followup_list";
        $this->module_title       = "Todays International Followup List";
        $this->module_url_slug    = "todays_international_followup_list";
        $this->module_view_folder = "todays_international_followup_list/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
        $today= date('Y-m-d');

        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
        
        $record = array();
        $fields = "international_followup.*,international_booking_enquiry.first_name,international_booking_enquiry.last_name	,international_booking_enquiry.created_ats";
        $this->db->where('international_followup.is_deleted','no');
        $this->db->where('next_followup_date',$today);
		  $this->db->where('international_booking_enquiry.agent_id',$id);
        $this->db->join("international_booking_enquiry", 'international_followup.international_booking_enquiry_id=international_booking_enquiry.id','left');
        $arr_data = $this->master_model->getRecords('international_followup');
        // print_r($arr_data); die;

        
         
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title."";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }


     // Active/Inactive
  
//   public function active_inactive($id,$type)
//   {
//       if(is_numeric($id) && ($type == "yes" || $type == "no") )
//       {   
//           $this->db->where('id',$id);
//           $arr_data = $this->master_model->getRecord('domestic_followup');
//             // print_r($arr_data); die;
//         //   $enq_id = $arr_data['booking_enquiry_id'];
//           if(empty($arr_data))
//           {
//              $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//              redirect($this->module_url_path.'/index');
//           }   

//           $arr_update =  array();

//           if($type == 'no')
//           {
//               $arr_update['is_followup_status'] = "yes";
//           }
//           else
//           {
//               $arr_update['is_followup_status'] = "no";
//           }
          
//           if($this->master_model->updateRecord('domestic_followup',$arr_update,array('id' => $id)))
//           {
//               $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
//           }
//           else
//           {
//            $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
//           }
//       }
//       else
//       {
//          $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//       }
//       redirect($this->module_url_path.'/index');   
//   }



//     public function edit($id)
//     {
//             if ($id=='') 
//             {
//                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//                 redirect($this->module_url_path.'/index');
//             }   
    
//             if(is_numeric($id))
//             {   
//                 $this->db->where('id',$id);
//                 $arr_data = $this->master_model->getRecord('domestic_followup');
//                 $edit_id = $arr_data['international_booking_enquiry_id'];
//                 if($this->input->post('submit'))
//                 {
//                     $this->form_validation->set_rules('follow_up_date', 'follow up date', 'required');
//                     $this->form_validation->set_rules('follow_up_time', 'follow up time', 'required');
//                     $this->form_validation->set_rules('next_followup_date', 'next follow up time', 'required');
//                     $this->form_validation->set_rules('follow_up_comment', 'follow up comment', 'required');
                
//                     if($this->form_validation->run() == TRUE)
//                     {
//                     $follow_up_date  = $this->input->post('follow_up_date'); 
//                     $follow_up_time  = $this->input->post('follow_up_time'); 
//                     $next_followup_date  = $this->input->post('next_followup_date'); 
//                     $follow_up_comment  = $this->input->post('follow_up_comment'); 

//                     $arr_update = array(
//                     'follow_up_date'   =>   $follow_up_date,
//                     'follow_up_time'          => $follow_up_time,
//                     'next_followup_date'          => $next_followup_date,
//                     'follow_up_comment'          => $follow_up_comment
                        
//                     );
                    
//                         $arr_where     = array("id" => $id);
//                         $this->master_model->updateRecord('domestic_followup',$arr_update,$arr_where);
//                         if($id > 0)
//                         {
//                             $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
//                         }
//                         else
//                         {
//                             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
//                         }
//                         redirect($this->module_url_path.'/index/'.$edit_id);
//                     }   
//                 }
//             }
//             else
//             {
//                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//                 redirect($this->module_url_path.'/index');
//             }
            
//             $this->db->order_by('id','desc');
//             $this->db->where('is_deleted','no');
//             $international_followup_data = $this->master_model->getRecords('domestic_followup');
            
//             $this->arr_view_data['arr_data']        = $arr_data;
//             $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
//             $this->arr_view_data['module_title']    = $this->module_title;
//             $this->arr_view_data['module_url_path'] = $this->module_url_path;
//             $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
//             $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
//     }

//      public function delete($id)
//      {
         
//          if(is_numeric($id))
//          {   
//              $this->db->where('id',$id);
//              $arr_data = $this->master_model->getRecord('domestic_followup');
//              $delete_id = $arr_data['international_booking_enquiry_id'];
 
//              if(empty($arr_data))
//              {
//                  $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//                  redirect($this->module_url_path);
//              }
//              $arr_update = array('is_deleted' => 'yes');
//              $arr_where = array("id" => $id);
                  
//              if($this->master_model->updateRecord('domestic_followup',$arr_update,$arr_where))
//              {
//                  $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
//              }
//              else
//              {
//                  $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
//              }
//          }
//          else
//          {
            
//                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//          }
//          redirect($this->module_url_path.'/index/'.$delete_id);  
//      }

}