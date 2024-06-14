<style>
  .tourmanager{
    text-decoration:none;
  }
  .desig_css{
    color:white;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>agent/dashboard" class="brand-link">

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block tourmanager"><?php echo $supervision_sess_name; ?></a></center>
          <center><h6 class="desig_css"><?php echo $this->session->userdata('supervision_role_name'); ?></h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>kitchen_staff_cook/dashboard/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
          </li>

            <?php 
            
            if($this->session->userdata('supervision_role')=='12'){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>train_hod/ticket_booking_request/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Extra Services</p>
                </a>
              </li>
            <?php }else if($this->session->userdata('supervision_role')=='13'){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>train_hod/handler_ticket_booking_request/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Extra Services</p>
                </a>
              </li>
              <?php } ?>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>train_hod/ticket_booking_request/my_assigned_extra_services" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Assigned Extra Services Requests</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>train_hod/ticket_booking_request/my_assigned_booked_extra_services" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booked Extra Services</p>
                </a>
              </li>


        
           
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>