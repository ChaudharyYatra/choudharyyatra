<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stationary extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/stationary";
        $this->module_title       = "Stationary";
        $this->module_title_stock       = "Stationary Stock";
        $this->module_url_slug    = "stationary";
        $this->module_view_folder = "stationary/";    
       
	}

	public function index()
	{  
      
        $record = array();
        $fields = "stationary.*,academic_years.year";
        $this->db->order_by('stationary.id','desc');
        $this->db->where('stationary.is_deleted','no');
        $this->db->join("academic_years", 'academic_years.id=stationary.financial_year','left');
        $arr_data = $this->master_model->getRecords('stationary',array('stationary.is_deleted'=>'no'),$fields);

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add()
    { 
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('stationary_name', 'Stationary Name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
               
                $stationary_name        = $this->input->post('stationary_name'); 
                $stationary_quantity        = $this->input->post('stationary_quantity'); 
                $series_yes_no        = $this->input->post('series_yes_no'); 
                $financial_year  = $this->input->post('financial_year');
                $from_series	  = $this->input->post('from_series');
                $to_series  = $this->input->post('to_series');
                $stationary_remark  = $this->input->post('stationary_remark');
                $pages_per_book  = $this->input->post('pages_per_book');

                if($series_yes_no=='Yes'){
                $add = $to_series - $from_series;
                $result = $add+1;
                
                $total_books= $result/$pages_per_book;

                $arr_insert = array(
                    'stationary_name'       =>   $stationary_name,
                    'stationary_quantity'   =>   $stationary_quantity,
                    'series_yes_no'   =>   $series_yes_no,
                    'financial_year'   =>   $financial_year,
                    'from_series'   =>   $from_series,
                    'to_series'   =>   $to_series,
                    'stationary_remark'   =>   $stationary_remark
                );
                
                $inserted_id = $this->master_model->insertRecord('stationary',$arr_insert,true);
                $insertid = $this->db->insert_id();

                for($i=0;$i<$total_books;$i++)
                {
                   $final_book_count=$i+1;
                   $to_series_data=$pages_per_book*$final_book_count;
                   $from_series_data=$to_series_data-$pages_per_book+1;
                   
                   
                    $arr_insert_details = array(
                        'stationary_id'       =>   $insertid,
                        'from_series'   =>   $from_series_data,
                        'to_series'   =>   $to_series_data,
                        'book_no'   =>   $final_book_count,
                        'total_book'=>$total_books
                    );
                    // print_r($arr_insert_details);
                    $inserted_id = $this->master_model->insertRecord('stationary_details',$arr_insert_details,true);

                }

            }else
            {
                $arr_insert = array(
                    'stationary_name'       =>   $stationary_name,
                    'stationary_quantity'   =>   $stationary_quantity,
                    'series_yes_no'   =>   $series_yes_no,
                    'financial_year'   =>   $financial_year,
                    'from_series'   =>   $from_series,
                    'to_series'   =>   $to_series,
                    'stationary_remark'   =>   $stationary_remark
                );
                
                $inserted_id = $this->master_model->insertRecord('stationary',$arr_insert,true);
                
            }
               
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Stationary Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $academic_years_data = $this->master_model->getRecords('academic_years');

        $this->arr_view_data['academic_years_data']  = $academic_years_data;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('stationary');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('stationary',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');   
    }

    
    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('stationary');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('stationary',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
            }
            else
            {
                $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
            }
        }
        else
        {
           
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');  
    }
    // Edit - Get data for edit
    
   public function edit($id)
    {
        
	   $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('stationary');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('stationary_name', 'Stationary Name', 'required');
                
                if($this->form_validation->run() == TRUE)
                {

                    $stationary_name        = $this->input->post('stationary_name'); 
                    $stationary_quantity        = $this->input->post('stationary_quantity'); 
                    $series_yes_no        = $this->input->post('series_yes_no'); 
                    $financial_year  = $this->input->post('financial_year');
                    $from_series	  = $this->input->post('from_series');
                    $to_series  = $this->input->post('to_series');
                    $stationary_remark  = $this->input->post('stationary_remark');

                    $arr_update = array(
                        'stationary_name' => $stationary_name,
                        'stationary_quantity' => $stationary_quantity,
                        'series_yes_no'   =>   $series_yes_no,
                        'financial_year'   =>   $financial_year,
                        'from_series'   =>   $from_series,
                        'to_series'   =>   $to_series,
                        'stationary_remark'   =>   $stationary_remark
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('stationary',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');
                }   
            }
        }

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $academic_years_data = $this->master_model->getRecords('academic_years');
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['academic_years_data']  = $academic_years_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function add_stock($id)
    {
        
        $id=base64_decode($id);
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         else
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecord('stationary');
             $stationary_qty=$arr_data['stationary_quantity'];

             $this->db->order_by('id','desc');
             $this->db->where('stationary_id',$id);
             $this->db->limit(1); 
             $arr_data_details = $this->master_model->getRecord('stationary_details');
             $last_book_no=$arr_data_details['book_no'];
             $lot_no=$arr_data_details['lot_no'];

             if($this->input->post('submit'))
             {
                 $this->form_validation->set_rules('stationary_quantity', 'Stationary Name', 'required');
                 
                 if($this->form_validation->run() == TRUE)
                 {
                    
                    $stationary_name     = $this->input->post('stationary_name'); 
                    $stationary_quantity = $this->input->post('stationary_quantity'); 
                    $financial_year      = $this->input->post('financial_year');
                    $from_series         = $this->input->post('from_series');
                    $to_series           = $this->input->post('to_series');
                    $stationary_remark   = $this->input->post('stationary_remark');
                    $pages_per_book      = $this->input->post('pages_per_book');
                    $series_yes_no        = $this->input->post('series_yes_no'); 

                    if($series_yes_no =='Yes'){
                        echo 'hiiii';
                        die;
                    $final_stationary_qty=$stationary_qty+$stationary_quantity; 
                    $series_diff = $to_series - $from_series;
                    $result_total_pages = $series_diff+1;
                    $total_books= $result_total_pages/$pages_per_book;
                    $total_books=round($total_books);
                   
                    $arr_insert = array(
                         'stationary_quantity'   =>   $final_stationary_qty
                     );
                    
                     {
                        $arr_where_od     = array("id" => $id);
                        $result = $this->master_model->updateRecord('stationary',$arr_insert,$arr_where_od);
                    }    
                        $lot_no=$lot_no+1;
                     for($i=0;$i<$total_books;$i++)
                     {
                        $for_series=$total_books+$i;
                        $final_book_no=$last_book_no+$i+1;
                    //    
                     $from_series_data=$pages_per_book*$for_series;
                    $final_from=$from_series;
                     $to_series_data=$final_from+$pages_per_book-1;
                     
                       
                         $arr_insert_details = array(
                             'stationary_id'       =>   $id,
                             'lot_no' => $lot_no,
                             'from_series'   =>   $from_series,
                             'to_series'   =>  $to_series_data,
                             'book_no'   =>   $final_book_no,
                             'total_book'=>$total_books
                         );
                         
                         $inserted_id = $this->master_model->insertRecord('stationary_details',$arr_insert_details,true);
                         $from_series=$from_series+$pages_per_book;
                         $to_series=$to_series+$pages_per_book;
                     }
                    }else{
                        echo 'else';
                       
                        $lot_no=$lot_no+1;
                    $final_stationary_qty=$stationary_qty+$stationary_quantity; 

                        $arr_insert = array(
                            'stationary_quantity'   =>   $final_stationary_qty
                        );
                        // print_r($arr_insert_details);
                        $arr_where_od     = array("id" => $id);
                        $inserted_id = $this->master_model->updateRecord('stationary',$arr_insert,$arr_where_od);

                    }
                    //  die;
                                    
                     if($inserted_id > 0)
                     {    
                         $this->session->set_flashdata('success_message'," Stationary Added Successfully.");
                         redirect($this->module_url_path.'/index');
                     }
                     else
                     {
                         $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                     }
                     redirect($this->module_url_path.'/index');
                 }   
             }
         }
 
         $this->db->order_by('id','desc');
         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
         $academic_years_data = $this->master_model->getRecords('academic_years');
         
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['academic_years_data']  = $academic_years_data;
         $this->arr_view_data['page_title']      = "Add ".$this->module_title_stock;
         $this->arr_view_data['module_title']    = $this->module_title_stock;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add_stock";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);

    }

    public function get_series()
	{  
        $from_series_no= $this->input->post('from_series_no');
        $stationary_id_no      = $this->input->post('stationary_id_no');
        $this->db->order_by('from_series','asc');
         $this->db->where('stationary_id',$stationary_id_no);
         $this->db->limit(1); 
         $academic_years_data = $this->master_model->getRecord('stationary_details');
        $from_series=$academic_years_data['from_series'];
         $this->db->order_by('to_series','desc');
         $this->db->where('stationary_id',$stationary_id_no);
         $this->db->limit(1); 
         $academic_years_data = $this->master_model->getRecord('stationary_details');
       $to_series=$academic_years_data['to_series'];

        if($from_series<=$from_series_no && $to_series>=$from_series_no)
        {
            echo '123';
        }else{
            echo '456';

        }
    // echo "1234";
        
	}
   
}