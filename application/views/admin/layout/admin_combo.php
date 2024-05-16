<?php	
	$this->load->view("admin/layout/admin_header");
 	$this->load->view("admin/layout/admin_sidebar");
 	$this->load->view("admin/".$middle_content);
	$this->load->view("admin/layout/admin_footer");
?>