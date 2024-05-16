<style>
  .designation{
    color:#fff;
  }
  a{
    text-decoration:none;
  }
  .desig_css{
    color:white;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>supervision/dashboard" class="brand-link">

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block"><?php echo $supervision_sess_name; ?></a></center>
          <center><h6 class="desig_css"><?php echo $supervision_role_name; ?></h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>supervision/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
          <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domestic Booking Enquiry</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="<?php //echo base_url(); ?>agent/international_booking_enquiry/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               International Booking Enquiry
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/supervision_request/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Requests For Code
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/supervision_request_completed/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Code Allocation Completed
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>stationary/stationary_order_reject/reject" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reject Stationary Order</p>
                </a>
          </li> -->
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/login/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>