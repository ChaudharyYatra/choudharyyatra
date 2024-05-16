<?php if( !defined('BASEPATH')) exit('No direct script access alloed');

class Master_model extends CI_Model
{
	 function __construct()
  {
    parent::__construct(); // construct the Model class
  }
	/*
		# function getRecordCount($tbl_name,$condition=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) return number of rows
		# Parameters : 
			$tbl_name* =name of table 
			$condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
		
		# How to call:
			$this->master_model->getRecordCount('tbl_name',$condition_array);
	*/

	function all_enq($limit, $start, $col, $dir, $block = 0) {
		$this->db->select('a.id, packages.tour_number, packages.tour_title, agent.agent_name, a.first_name, a.last_name, a.email, a.mobile_number');
		$this->db->from('booking_enquiry a');
		$this->db->where('a.is_deleted','no');
		$this->db->where('followup_status','no');
		$this->db->where('booking_process','no');
		$this->db->join("packages", 'a.package_id=packages.id','left');
		$this->db->join("agent", 'a.agent_id=agent.id','left');
		 
		 $this->db->limit($limit, $start);
		 
		 $this->db->order_by("a." . $col, $dir);
		 return $this->db->get()->result();
	 }

	 function all_enq_count($block = 0) {
		$this->db->select('a.id, packages.tour_number, packages.tour_title, agent.agent_name, a.first_name, a.last_name, a.email, a.mobile_number');
		$this->db->from('booking_enquiry a');
		$this->db->where('a.is_deleted','no');
		$this->db->where('followup_status','no');
		$this->db->where('booking_process','no');
		$this->db->join("packages", 'a.package_id=packages.id','left');
		$this->db->join("agent", 'a.agent_id=agent.id','left');
       
        return $this->db->get()->num_rows();
    }


	function enq_search($limit, $start, $search, $col, $dir, $block = 0) {
        $this->db->select('a.id, packages.tour_number, packages.tour_title, agent.agent_name, a.first_name, a.last_name, a.email, a.mobile_number');
		$this->db->from('booking_enquiry a');
		$this->db->where('a.is_deleted','no');
		$this->db->where('followup_status','no');
		$this->db->where('booking_process','no');
		$this->db->join("packages", 'a.package_id=packages.id','left');
		$this->db->join("agent", 'a.agent_id=agent.id','left');
        
       
        $this->db->group_start();
        
        $this->db->or_like('a.first_name', $search);
        $this->db->or_like('a.last_name', $search);
        $this->db->or_like('a.email', $search);
        $this->db->or_like('a.mobile_number', $search);
        $this->db->or_like('packages.tour_number', $search);
        $this->db->or_like('packages.tour_title', $search);
        $this->db->or_like('agent.agent_name', $search);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        $this->db->order_by("a." . $col, $dir);
        return $this->db->get()->result();
    }

    function enq_search_count($search, $block = 0) {
        $this->db->select('a.id, packages.tour_number, packages.tour_title, agent.agent_name, a.first_name, a.last_name, a.email, a.mobile_number');
		$this->db->from('booking_enquiry a');
		$this->db->where('a.is_deleted','no');
		$this->db->where('followup_status','no');
		$this->db->where('booking_process','no');
		$this->db->join("packages", 'a.package_id=packages.id','left');
		$this->db->join("agent", 'a.agent_id=agent.id','left');
        

        $this->db->group_start();
        
        $this->db->or_like('a.first_name', $search);
        $this->db->or_like('a.last_name', $search);
        $this->db->or_like('a.email', $search);
        $this->db->or_like('a.mobile_number', $search);
        $this->db->or_like('packages.tour_number', $search);
        $this->db->or_like('packages.tour_title', $search);
        $this->db->or_like('agent.agent_name', $search);
        $this->db->group_end();
        return $this->db->get()->num_rows();
    }
	
	public function getRecordCount($tbl_name,$condition=FALSE)
	{
		if(is_array($condition))
		{
		if($condition!="" && count($condition)>0)
		{
			foreach($condition as $key=>$val)
			{
				$this->db->where($key,$val);
			}
		}
		}
		else if(!is_array($condition) && $condition!="")
		{$this->db->where($condition);}
		
		$num=$this->db->count_all_results($tbl_name);
		return $num;
	}
	
	/*
		# function getRecords($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$limit=FALSE,$start=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) return array of records from table
		# Parameters : 
			1) $tbl_name* =name of table 
			2) $condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
			3) $select=('col1,col2,col3');
			4) $order_by=array('colname1'=>order,'colname2'=>order); Order='ASC OR DESC'
			5) $limit= limit for paging
			6) $start=start for paging
		
		# How to call:
			$this->master_model->getRecords('tbl_name',$condition_array,$select,...);
			
		# In case where we need joins, you can pass joins in controller also.
		Ex: 
			$this->db->join('tbl_nameB','tbl_nameA.col=tbl_nameB.col','left');
			$this->master_model->getRecords('tbl_name',$condition_array,$select,...);
			
		# Instruction 
			1) check number of counts in controller or where you are displying records
			
	*/
	
	public function getRecords($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$start=FALSE,$limit=FALSE)
	{
		if($select!="")
		{$this->db->select($select);}
		
		if((is_array($condition) && count($condition)>0) && $condition!="")
		{
			$condition=$condition;
		}
		else
		{$condition=array();}
		
		if((is_array($order_by) && count($order_by)>0) && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$this->db->order_by($key,$val);}
		}
		if($limit!="" || $start!="")
		{
			$this->db->limit($limit,$start);
		}
		$rst=$this->db->get_where($tbl_name,$condition);
		return $rst->result_array();
	}
	
	// pass where condition as string
	public function getRecordsByString($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$start=FALSE,$limit=FALSE)
	{
		if($select!="")
		{$this->db->select($select);}
		
		if($condition)
		{
			$this->db->where($condition);
		}
		 
		
		if((is_array($order_by) && count($order_by)>0) && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$this->db->order_by($key,$val);}
		}
		if($limit!="" || $start!="")
		{
			$this->db->limit($limit,$start);
		}
		$rst=$this->db->get($tbl_name);
		return $rst->result_array();
	}
	
	// get single record
	public function getRecord($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE)
	{
		if($select!="")
		{$this->db->select($select);}
		
		if(count(array($condition))>0 && $condition!="")
		{
			$condition=$condition;
		}
		else
		{$condition=array();}
		if($order_by && count($order_by)>0 && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$this->db->order_by($key,$val);}
		}
		 
		$rst=$this->db->get_where($tbl_name,$condition);
		return $rst->row_array();
	}

	//This function fetches records by date
	public function getRecordsByDate($tbl_name,$fieldname,$fromdate,$toDate){

		$this->db->where($fieldname.' >=', $fromdate);
		$this->db->where($fieldname.' <=', $toDate);
		$rst = $this->db->get($tbl_name);
		return $rst->result_array();
	}
	
	public function insertRecord($tbl_name,$data_array,$insert_id=true)
	{
		if($this->db->insert($tbl_name,$data_array))
		{
			if($insert_id==true)
			{return $this->db->insert_id();}
			else
			{return true;}
		}
		else
		{return false;}
	}
	
	/*
		# function updateRecord($tbl_name,$data_array,$pri_col,$id)
		# * indicates paramenter is must
		# Use : 
			1) updates record, on successful updates return true.
		# Parameters : 
			1) $tbl_name* = name of table 
			2) $data_array* = array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
			3) $pri_col* = primary key or column name depending on which update query need to fire.
			4) $id* = primary column or condition column value.

		# How to call:
			$this->master_model->updateRecord('tbl_name',$data_array,$pri_col,$id)
	*/
	public function updateRecord($tbl_name,$data_array,$where_arr)
	{
		$this->db->where($where_arr,NULL,FALSE);
		if($this->db->update($tbl_name,$data_array))
		
		
		{return true;}
		else
		{return false;}
	}
	
	
	/*
		# function deleteRecord($tbl_name,$pri_col,$id)
		# * indicates paramenter is must
		# Use : 
			1) delete record from table, on successful deletion returns true.
		# Parameters : 
			1) $tbl_name* = name of table 
			2) $pri_col* = primary key or column name depending on which update query need to fire.
			3) $id* = primary column or condition column value.

		# How to call:
			$this->master_model->deleteRecord('tbl_name','pri_col',$id)
		# It will useful while deleting record from  single table. delete join will not work here.
	*/
// 	public function deleteRecord($tbl_name,$pri_col,$id)
// 	{
// 		$this->db->where($pri_col,$id);
// 		if($this->db->delete($tbl_name))
// 		{return true;}
// 		else
// 		{return false;}
// 	}


public function deleteRecord($tbl_name,$id)
	{
		$this->db->where($id);
		if($this->db->delete($tbl_name))
		{return true;}
		else
		{return false;}
	}
	
	/* 
		# function createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) create thumb of uploaded image.
		# Parameters : 
			1) $file_name* = name of uploaded file 
			2) $path* = path of directory
			3) $width* = width of thumb
			4) $height* = height of thumb
			5) $maintain_ratio = if need to maintain ration of original image then pass true, in this case thumb may vary in
								height and width provided. default it is FALSE.

		# How to call:
			$this->master_model->createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
			
		# !!Important : thumb foler  name must be 'thumb'
	*/
	public function createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
	{
		$config_1['image_library']='gd2';
		 $config_1['source_image']= $path.$file_name;	
		$config_1['create_thumb']=TRUE;
		$config_1['maintain_ratio']=$maintain_ratio;
		$config_1['thumb_marker']='';
 		$config_1['new_image']=$path."thumb/".$file_name; 
		$config_1['width']=$width;
		$config_1['height']=$height;
		
		$this->image_lib->initialize($config_1);
		$this->image_lib->resize();
		
		if (!$this->image_lib->resize()) {
		echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
	}
	
	public function resize_image($file_name,$path,$width,$height,$maintain_ratio=FALSE)
	{
		//echo $file_name ;exit;
		$config_1['image_library']='gd2';
		$config_1['source_image']= $path."original/".$file_name;	
		$config_1['create_thumb']=TRUE;
		$config_1['maintain_ratio']=$maintain_ratio;
		$config_1['thumb_marker']='';
		$config_1['new_image']=$path.$file_name;
		$config_1['width']=$width;
		$config_1['height']=$height;
		
		$this->image_lib->initialize($config_1);
		$this->image_lib->resize();
		
		if (!$this->image_lib->resize()) {
		echo $this->image_lib->display_errors();
		}
		
		unlink($path."original/".$file_name); 
		$this->image_lib->clear();
	}
	
	/* create slug */
	function create_slug($phrase,$tbl_name,$slug_col,$pri_col='',$id='',$maxLength=100000000000000)
	{
		$result = strtolower($phrase);
		$result = preg_replace("/[^A-Za-z0-9\s-._\/]/", "", $result);
		$result = trim(preg_replace("/[\s-]+/", " ", $result));
		$result = trim(substr($result, 0, $maxLength));
		$result = preg_replace("/\s/", "-", $result);
		$slug=$result;
		if($id!="")
		{
			$this->db->where($pri_col.' !=' ,$id);
		}
		$rst=$this->db->get_where($tbl_name,array($slug_col=>$slug));
		
		if($rst->num_rows() > 0)
		{
			$count=$rst->num_rows()+1;
			return $slug=$slug.$count;
		}
		else
		{return $slug;}
	}
	
	public function video_image($url)
	{
		$image_url = parse_url($url);
		if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
		$array = explode("&", $image_url['query']);
		return "http://img.youtube.com/vi/".substr($array[0], 2)."/0.jpg";
		} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".substr($image_url['path'], 1).".php"));
		return $hash[0]["thumbnail_large"];
		}
	}
	
	public function image_upload($file_name,$user_id,$config)
	{ 
		$this->load->library('upload');
		$this->upload->initialize($config);
	
		if($this->upload->do_upload('product_image'))
		{ 
			return true;
		}
		else
		{
			print_r($this->upload->display_errors());	exit;
		}
	}
	
	 public function send_sms($mobile=NULL,$text=NULL)
 	{
 		if($mobile!=NULL && $text!=NULL)
 		{
 			$url ="http://www.hindit.co.in/API/pushsms.aspx?loginID=T1esdscp&password=eSdS@19&mobile=".$mobile."&text=".urlencode($text)."&senderid=ESDSCP&route_id=2&Unicode=0";
			//$url ="http://www.hindit.co.in/API/pushsms.aspx?loginID=T1esdscp&password=eSdS@19&mobile=8857870782&text=".urlencode($text)."&senderid=ESDSCP&route_id=2&Unicode=0";
 			$string = preg_replace('/\s+/', '', $url);
 			$x = curl_init($string);
 			curl_setopt($x, CURLOPT_HEADER, 0);	
 			curl_setopt($x, CURLOPT_FOLLOWLOCATION, 0);
 			curl_setopt($x, CURLOPT_RETURNTRANSFER, 1);			
 			$reply = curl_exec($x);
 			 if($reply)
 			{
 				
				$respond = strip_tags($reply);
				$respond = preg_replace('/\s+/', ' ', $respond);
				
				$inser_array=array('responce'=>$respond,'body'=>$text,'mobile'=>$mobile,'status'=>'success');
 			}
 			else
 			{
 				$respond = strip_tags($reply);
				$respond = preg_replace('/\s+/', ' ', $respond);
				$inser_array=array('responce'=>$respond,'body'=>$text,'mobile'=>$mobile,'status'=>'fail');
 			}
 			$this->insertRecord('cp_sms_logs',$inser_array); 
			//print_r($inser_array);
 			curl_close($x);
 			//$res = $this->sms_balance_notify($reply);
 		}
 	}
	
	//insert multiple records as single array
	public function insertBatch($tbl_name, $data){

		$result = $this->db->insert_batch($tbl_name, $data); 
		return $result;
	}
	
	public function upload_file($field_name = NULL, $files = NULL, $config = NULL)
    {
        $this->load->library('upload');
		// check for empty parameters -
        if($field_name == NULL or $files == NULL or $config == NULL)
        {
            return FALSE;
        }
    
        // define array for uploaded file names -
        $file_name_array = array();
        
        // define array for file upload error -
        $file_error_array = array();
        $_FILES = $files;
           
            
       if($_FILES[$field_name]['error'] === 0){
                // initialize config for file
                
                //added by rahul for get original name with timestamp
                $config['encrypt_name']=FALSE;
                $prefix=isset($config['prefix']) && !empty($config['prefix'])? $config['prefix']:'';
                // $config['file_name']=$prefix.pathinfo($files[$field_name]['name'][$i], PATHINFO_FILENAME).'_'.time();
                $config['file_name']= $config['file_name'] ? $config['file_name'] :$this->session->userdata('user_id').'_'.time();
                
                $this->upload->initialize($config);
                
                // upload file -
                if($this->upload->do_upload($field_name))
                {
                    // get uploaded file data -
                    $file_info = $this->upload->data();
                    
                    // store file name in array -
                    $file_name_array[] = $file_info['file_name'];
                }
                else
                {
                    // get file upload error -
                    $error =  $this->upload->display_errors();
                    
                    // srore error in array -
                    $file_error_array = $error; //Rahul B
                    // $file_error_array[$files[$field_name]['name'][$i]] = $error;// bhagwan
                }
            }
        
        
        // define array for response -
        $response = array();
        
        // file name array and file error array store in response array -
        $response[0] = $file_name_array;
        $response[1] = $file_error_array;
        
        // return response array -
        return $response;
    }
    
	//Added by Priyanka Wadnere for getting max of any field from any table 
 	public function next_id($prim_key, $tbl_name)
	{
	   $this->db->select_max($prim_key, 'max');
	   $query = $this->db->get($tbl_name); 
	   
	   $max = $query->row()->max;
	   if($max == 0){
	     $next_id = 1;
	   }else{
	     $next_id = $max+1;
	  }
	  return $next_id;
	}
	
	//This function fetches records by field and value
	public function getRecordByFieldValue($tbl_name,$field,$value){ 
		$this->db->where($field, $value);
		$this->db->where('is_deleted', 0);
		$rst = $this->db->get($tbl_name);
		return $rst->row_array();
	}




	public function get_user_module_list() {
		$table = 'permission_mst';
		$where = array('user_id' => $this->login_id);
		$fields = 'is_view';
		$config = array('table' => $table, 'where' => $where, 'fields' => $fields);
		$query = $this->read($config);
		$result = $resp = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			if ($result[0]['is_view'] != '') {
				$module_list = explode(',', $result[0]['is_view']);
				foreach ($module_list as $module_id) {
					$resp[] = $this->get_module_by_id($module_id);
				}
			}
		}
		return $resp;
	}
 
	private function get_module_by_id($module_id) {
		$table = 'module_master';
		$where = array('status' => '0', 'id' => $module_id);
		$fields = 'id as module_id,module_name,slug';
		$config = array('table' => $table, 'where' => $where, 'fields' => $fields);
		$query = $this->read($config);
		$return_array = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$return_array = $result[0];
		}
		return $return_array;
	}

	public function get_module_list() {
		$table = 'module_master';
		$where = array('status' => '0');
		$fields = 'id as module_id,module_name,slug';
		$config = array('table' => $table, 'where' => $where, 'fields' => $fields);
		$query = $this->read($config);
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	
	function DuplicateRecord($table, $primary_key_field, $primary_key_val) {
	   /* CREATE SELECT QUERY */
	   $this->db->where($primary_key_field, $primary_key_val);
	   $query = $this->db->get($table);
		foreach ($query->result() as $row){
		   foreach($row as $key=>$val){
			  if($key != $primary_key_field){
				/* Below code can be used instead of passing a data array directly to the insert or update functions */
				$this->db->set($key, $val);
			  }//endif
		   }//endforeach
		}//endforeach
		/* insert the new record into table*/
		return $this->db->insert($table);
	}
	
	public function getSingleRecord($tbl_name,$condition=FALSE,$select=FALSE)
	{
		if($select!="")
		{$this->db->select($select);}
		
		if((is_array($condition) && count($condition)>0) && $condition!="")
		{
			$condition=$condition;
		}
		else
		{$condition=array();}
		
		
		$rst=$this->db->get_where($tbl_name,$condition);
		return $rst->row_array();
	}

	public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
	
}
?>