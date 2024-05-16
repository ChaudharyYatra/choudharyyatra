<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/dashboard";
        $this->module_url_path_followup_list    =  base_url().$this->config->item('agent_panel_slug')."/todays_domestic_followup_list";
        $this->module_url_path_inter_followup_list    =  base_url().$this->config->item('agent_panel_slug')."/todays_international_followup_list";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{
        $today= date('Y-m-d');

	      $agent_sess_name = $this->session->userdata('agent_name');
        $id = $this->session->userdata('agent_sess_id');

        date_default_timezone_set('Asia/Kolkata');
        $twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));

        $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('followup_status','no');  
        $this->db->where('booking_process','no');  
        $this->db->where('enquiry_type','Domestic'); 
        $this->db->where('booking_enquiry.created_at >', $twentyFourHoursAgo);
        $enquiry_data = $this->master_model->getRecords('booking_enquiry');
        $arr_data['enquiry_count_total'] = count($enquiry_data);
        // print_r($enquiry_data); die;

        $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $international_enquiry_data = $this->master_model->getRecords('international_booking_enquiry');
        $arr_data['international_enquiry_data_total'] = count($international_enquiry_data);
        // echo $today;
        // die;
        
        $this->db->where('agent_id',$id);  
        $this->db->where('created_at',$today);  
        $enquiry_data_today = $this->master_model->getRecords('booking_enquiry');
        $arr_data['todays_enquiry_count'] = count($enquiry_data_today);

        $this->db->where('agent_id',$id);  
        $this->db->where('created_at',$today);
        $international_enquiry_data_today = $this->master_model->getRecords('international_booking_enquiry');
        $arr_data['internatinal_enquiry_count'] = count($international_enquiry_data_today);

        $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $custom_domestic_booking_enquiry = $this->master_model->getRecords('custom_domestic_booking_enquiry');
        $arr_data['custom_domestic_booking_count'] = count($custom_domestic_booking_enquiry);

        $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('payment_confirmed_status','Payment Not Paid'); 
        $booking_payment_details_not_paid = $this->master_model->getRecords('booking_payment_details');
        $arr_data['booking_payment_details_not_paid_count'] = count($booking_payment_details_not_paid);
        // print_r($arr_data['booking_payment_details_not_paid_count']); die;

        $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('payment_confirmed_status','In Process'); 
        $this->db->group_by('booking_payment_details.enquiry_id'); 
        $booking_payment_details_in_process = $this->master_model->getRecords('booking_payment_details');
        $arr_data['booking_payment_details_in_process_count'] = count($booking_payment_details_in_process);
        // print_r($arr_data['booking_payment_details_in_process_count']); die;

        $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('payment_confirmed_status','Payment Completed'); 
        $this->db->group_by('booking_payment_details.enquiry_id'); 
        $booking_payment_details_completed = $this->master_model->getRecords('booking_payment_details');
        $arr_data['booking_payment_details_completed_count'] = count($booking_payment_details_completed);
        // print_r($arr_data['booking_payment_details_completed_count']); die;
        // print_r($booking_payment_details_completed); die;

        // print_r($arr_data['booking_payment_details_count']); die;
        // $this->db->where('agent_id',$id);  
        // $this->db->where('not_interested','no');  
        // $Domestic_not_interested_cust = $this->master_model->getRecords('booking_enquiry');
        // $arr_data['Domestic_not_interested_cust_count'] = count($Domestic_not_interested_cust);
        // print_r($arr_data['Domestic_not_interested_cust_count']); die;
        
        
        // $arr_data['total_enquiry_count'] = $enquiry_count + $internatinal_enquiry_count;
        // print_r($total_enquiry_count); die;
        // $arr_data['enquiry_count'] = count($enquiry_data);

        $record = array();
        $this->db->select("agent.agent_name, COUNT(booking_enquiry.id) AS enquiry_count");
        $this->db->from('agent');
        $this->db->where('agent.is_deleted', 'no');
        $this->db->where('booking_enquiry.booking_done', 'yes');
        $this->db->join('booking_enquiry', 'agent.id = booking_enquiry.agent_id', 'left');
        $this->db->group_by('agent.id'); // Group by agent.id
        $this->db->order_by('enquiry_count', 'desc'); // Order by enquiry_count in descending order
        $this->db->limit(5); // Limit the result to the top 5 agents

        $top_agent_wise_data = $this->db->get()->result_array();
        // print_r($top_agent_wise_data); die;

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['top_agent_wise_data']        = $top_agent_wise_data;
      //  $this->arr_view_data['total_enquiry_count']  = $total_enquiry_count;
        //$this->arr_view_data['enquiry_count']  = $enquiry_count;
       // $this->arr_view_data['enquiry_count_total']  = $enquiry_count_total;
        //$this->arr_view_data['internatinal_enquiry_count']  = $internatinal_enquiry_count;
        //$this->arr_view_data['international_enquiry_data_total']  = $international_enquiry_data_total;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
	}


    function enquiry_view()  
      {  
                $agent_id=$this->session->userdata('agent_sess_id');
                $arr_where     = array("agent_id" => $agent_id);
                $arr_update = array("is_view"=>'yes');
               $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);
                
            return true;
      }

      function international_view()  
      {  
                $agent_id=$this->session->userdata('agent_sess_id');
                $arr_where     = array("agent_id" => $agent_id);
                $arr_update = array("is_view"=>'yes');
               $this->master_model->updateRecord('international_booking_enquiry',$arr_update,$arr_where);
                
            return true;
      }

      function check_notification_count()  
      {  
             
                $agent_id=$this->session->userdata('agent_sess_id');
                $this->db->where('agent_id',$agent_id);
                $this->db->where('is_view','no');
                $arr_data = $this->master_model->getRecords('booking_enquiry'); 
                $count=count($arr_data);
                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }
                echo $count;
                }



                function check_international_count()  
      {  
             
                $agent_id=$this->session->userdata('agent_sess_id');
                $this->db->where('agent_id',$agent_id);
                $this->db->where('is_view','no');
                $arr_data = $this->master_model->getRecords('international_booking_enquiry'); 
                $count=count($arr_data);
                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }  
            echo $count;
      }


    // ===Domestic current date followup========================

    
    function todays_enquiry_view()  
    {  
              
              $agent_id=$this->session->userdata('agent_sess_id'); 
              $record = array();
              $fields = "domestic_followup.*,booking_enquiry.agent_id";
              $this->db->where('booking_enquiry.is_deleted','no');
              $this->db->where('booking_enquiry.agent_id',$agent_id);
              $this->db->join("booking_enquiry", ' booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
              $arr_data = $this->master_model->getRecords('domestic_followup',array('domestic_followup.is_last'=>'yes'),$fields);

                $count = count($arr_data);
                for($i=0;$i<$count;$i++)
                {
                 $aid=$arr_data[$i]['id'];
                  
                    $arr_update = array(
                        'is_view'   => 'yes'   
                    );
                    $arr_where     = array("id" => $aid);
                    $inserted_id = $this->master_model->updateRecord('domestic_followup',$arr_update,$arr_where);
                
                } 
                redirect($this->module_url_path_followup_list.'/index');
              
           
    }

                function todays_domestic_notification_count()  
                {  

                $today= date('Y-m-d');
                $agent_id=$this->session->userdata('agent_sess_id');
                $record = array();
                $fields = "domestic_followup.*,booking_enquiry.agent_id,booking_enquiry.is_view";
                $this->db->where('agent_id',$agent_id);
                $this->db->where('domestic_followup.is_view','no');
                $this->db->where('next_followup_date',$today);
                $this->db->join("booking_enquiry", 'domestic_followup.booking_enquiry_id= booking_enquiry.id','left');
                $arr_data = $this->master_model->getRecords('domestic_followup'); 
                // print_r($arr_data); die;
                $count=count($arr_data);
                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }
                echo $count;
                }

    // ==========================================================

    // ===International current date followup=================================

    function todays_international_view()  
    {  
              
              $agent_id=$this->session->userdata('agent_sess_id'); 
              $record = array();
              $fields = "international_followup.*,international_booking_enquiry.agent_id";
              $arr_where     = array("id" => $agent_id);
              $arr_update = array("is_view"=>'yes');
              $this->db->join("international_booking_enquiry", ' international_booking_enquiry.id=international_followup.international_booking_enquiry_id','left');
              $arr_data = $this->master_model->getRecords('international_followup',array('international_followup.is_last'=>'yes'),$fields);

                $count = count($arr_data);
                for($i=0;$i<$count;$i++)
                {
                 $aid=$arr_data[$i]['id'];
                  
                    $arr_update = array(
                        'is_view'   => 'yes'   
                    );
                    $arr_where     = array("id" => $aid);
                    $inserted_id = $this->master_model->updateRecord('international_followup',$arr_update,$arr_where);
                
                } 
                redirect($this->module_url_path_inter_followup_list.'/index');
              
           
    }
    // function todays_international_view()  
    // {  
              
    //           $agent_id=$this->session->userdata('agent_sess_id');
    //           $record = array();
    //           $fields = "international_followup.*,international_booking_enquiry.agent_id";
    //           $arr_where     = array("id" => $agent_id);
    //           $arr_update = array("is_view"=>'yes');
    //           $this->db->join("international_booking_enquiry", 'international_followup.international_booking_enquiry_id= international_booking_enquiry.id','left');
    //           $this->master_model->updateRecord('international_followup',$arr_update,$arr_where);
              
    //           redirect($this->module_url_path_inter_followup_list.'/index');
    // }

                function todays_international_notification_count()  
                {  

                $today= date('Y-m-d');
                $agent_id=$this->session->userdata('agent_sess_id');
                $record = array();
                $fields = "international_followup.*,international_booking_enquiry.agent_id,international_booking_enquiry.is_view";
                $this->db->where('agent_id',$agent_id);
                $this->db->where('international_followup.is_view','no');
                $this->db->where('next_followup_date',$today);
                $this->db->join("international_booking_enquiry", 'international_followup.international_booking_enquiry_id= international_booking_enquiry.id','left');
                $arr_data = $this->master_model->getRecords('international_followup'); 
                // print_r($arr_data); die;
                $count_arr=count($arr_data);
                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }
                echo $count_arr;
                }

    // ============================================================

    // todays total notification count

function todays_check_total_notification_count()  
{  
          $today= date('Y-m-d');
          $agent_id=$this->session->userdata('agent_sess_id');
          $record = array();
          $fields = "domestic_followup.*,booking_enquiry.agent_id,booking_enquiry.is_view";
          $this->db->where('agent_id',$agent_id);
          $this->db->where('domestic_followup.is_view','no');
          $this->db->where('next_followup_date',$today);
          $this->db->join("booking_enquiry", 'domestic_followup.booking_enquiry_id= booking_enquiry.id','left');
          $domestic_followup_count = $this->master_model->getRecords('domestic_followup'); 
          // print_r($arr_data); die;
          $todays_domestic_followup_count=count($domestic_followup_count);
          
          $today= date('Y-m-d');
          $agent_id=$this->session->userdata('agent_sess_id');
          $record = array();
          $fields = "international_followup.*,international_booking_enquiry.agent_id,international_booking_enquiry.is_view";
          $this->db->where('agent_id',$agent_id);
          $this->db->where('international_followup.is_view','no');
          $this->db->where('next_followup_date',$today);
          $this->db->join("international_booking_enquiry", 'international_followup.international_booking_enquiry_id= international_booking_enquiry.id','left');
          $inter_followup_count = $this->master_model->getRecords('international_followup'); 
          // print_r($arr_data); die;
          $todays_inter_followup_count=count($inter_followup_count);
          
          $todays_count= $todays_domestic_followup_count + $todays_inter_followup_count;

          // if($count > 0)  
          // {                     
          //     return $count;//return count
          // }  

          // else if($count == 0)
          // {                     
          //      echo false;
          // }
          echo $todays_count;
          }

// todays total notification count


// total notification count
function check_total_notification_count()  
      {  
             
                $agent_id=$this->session->userdata('agent_sess_id');
                $this->db->where('agent_id',$agent_id);
                $this->db->where('is_view','no');
                $booking_enquiry_count = $this->master_model->getRecords('booking_enquiry'); 
                $total_booking_enquiry_count=count($booking_enquiry_count);
                // print_r($total_booking_enquiry_count); die;

                $agent_id=$this->session->userdata('agent_sess_id');
                $this->db->where('agent_id',$agent_id);
                $this->db->where('is_view','no');
                $inter_booking_enquiry_count = $this->master_model->getRecords('international_booking_enquiry'); 
                $total_inter_booking_enquiry_count=count($inter_booking_enquiry_count);

                $count= $total_booking_enquiry_count + $total_inter_booking_enquiry_count;

                

                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }
                echo $count;
                }

// total notification count
   
}