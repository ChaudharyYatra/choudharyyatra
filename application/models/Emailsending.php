<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class emailsending extends CI_Model
{ 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	// SMTP email setting here
	public function setting_smtp()
	{
		$permission=TRUE;
		if($permission==TRUE)
		{
			$config['protocol']    	= 'smtp';
			$config['smtp_host']    = 'smtp.googlemail.com';
			$config['smtp_port']    = '26';
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = 'maheshmhaske500@gmail.com';
			$config['smtp_pass']    = 'Mahesh@2309';
			$config['charset']    	= 'utf-8';
			$config['newline']    	= "\r\n";
			$config['mailtype'] 	= 'html'; // or html
			$config['validation'] 	= TRUE; // bool whether to validate email or not  
			$this->email->initialize($config);
		}
	}
  
	public function sendmail($info_arr)
	{	
    	$this->setting_smtp();
 		$this->email->clear(TRUE);
 		$this->email->set_newline("\r\n");
 		$this->email->from("mhaskem01@gmail.com"," ESDS ");
 		$this->email->to("vivkepatilss23@gmail.com");
 		$this->email->subject('test');
 		$this->email->set_mailtype("html");
		$this->email->message("Hellloooooo");
		$this->email->send(FALSE);
		{ 
			//$this->email->print_debugger();
		   // echo $this->email->print_debugger(array('headers'));  
			return true;
		}
	}

	public function sendmail_attach($info_arr,$other_info,$path)
	{
		$this->setting_smtp();
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from($info_arr['from']," ");
		$this->email->to($info_arr['to']);
		$this->email->subject($info_arr['subject']);
		$this->email->set_mailtype("html");
		$data['base_url']=base_url();
		$this->email->message($this->load->view('email/'.$info_arr['view'],$other_info,true)); 
		$this->email->attach($path);
		if($this->email->send())
		{return true;}           	

	}

}

?>