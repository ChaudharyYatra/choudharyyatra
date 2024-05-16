<style>
  .desig_css{
    color:white;
  }
  .name_css{
    text-decoration: none;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>region_head/dashboard" class="brand-link">

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block name_css"><?php echo $region_head_sess_name; ?></a></center>
          <center><h6 class="desig_css">[ Region Head ]</h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>region_head/agent/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Agents
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>region_head/prospect_rate_download_mob/index" class="nav-link">
              <i class="nav-icon fa fa-download" aria-hidden="true"></i>
              <p>
                Document Download List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Domestic Booking Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/followup_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/not_interested/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/booking_enquiry/general_enquiry" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Enquiry</p>
                </a>
               </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                International Booking Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/international_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/international_followup_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/not_interested_international/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stationary Details
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/stationary_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Orders</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/stationary_request_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requested Orders</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>region_head/stationary_not_received_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inprocess Orders</p>
                </a>
               </li>
               
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>region_head/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>region_head/login/logout" class="nav-link">
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