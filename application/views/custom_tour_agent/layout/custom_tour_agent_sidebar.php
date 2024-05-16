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
          <center><a href="#" class="name_css"><?php echo $custom_agent_name; ?></a></center>
          <center><h6 class="desig_css">[ Custom Tour Agent ]</h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>custom_tour_agent/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>custom_tour_agent/followup_reason/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup reason</p>
                </a>
               </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>custom_tour_agent/vehicle_type/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Type</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>custom_tour_agent/pickup_from/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pick Up From</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>custom_tour_agent/drop_to/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Drop To</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>custom_tour_agent/meal_plan/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Meal Plan</p>
                </a>
               </li>

            </ul>
          </li>
          
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>agent/website_visitor_data/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Customised Enquiries
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>custom_tour_agent/booking_enquiry/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Custom Booking Enquiry</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>custom_tour_agent/international_enquiry/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>International Booking Enquiry</p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 International Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/inter_booking_process/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Process</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/international_booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>International Booking Enquiry</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/todays_international_followup_list/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todays Followup</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/not_interested_international/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>
            </ul>
          </li> -->
               
         <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stationary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/stationary_order/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stationary Order</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/stationary_order_completed/completed" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Stationary Order</p>
                </a>
               </li>
            </ul>
          </li> -->

          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>custom_tour_agent/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>custom_tour_agent/login/logout" class="nav-link">
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