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

      <img class="chaudhary_yatra_logo" src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block name_css"><?php echo $agent_sess_name = $this->session->userdata('agent_name'); ?></a></center>
          <center><h6 class="desig_css">[ Agent ]</h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
            </li>

            

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                SRA Details
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/add_sra_form/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add SRA Payment</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/sra_payment_record/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SRA Record</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/sra_all_payment_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SRA Particular Customer Record</p>
                </a>
              </li>

            </ul>
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
                <a href="<?php echo base_url(); ?>agent/followup_reason/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup Reason</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/add_qr_code/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add account and QR code master</p>
                </a>
               </li>

            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/website_visitor_data/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Website Visitor Enquiry
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/fixed_customized_enquiries/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Fixed & Customized Enquiries
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Domestic Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/domestic_booking_process/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Process</p>
                </a>
               </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domestic Booking Enquiry / New Enquiry</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/booking_enquiry_got_it/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Enquiry</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/followup_already_taken/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Followup Already Taken By Agent</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/todays_domestic_followup_list/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todays Followup</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/not_interested/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/all_general_enquiry/general_enquiry" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Enquiry Open to All Agent</p>
                </a>
               </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 International Enquiry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/inter_booking_process/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Process</p>
                </a>
              </li> -->
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/international_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>International Booking Enquiry</p>
                </a>
               </li>
               
               <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/todays_international_followup_list/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todays Followup</p>
                </a>
               </li> -->
               <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>agent/not_interested_international/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Interested Customers</p>
                </a>
               </li> -->
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Website Customized Enquiries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/website_visitor_data/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domestic Customised Enquiries</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/agent/international_website_visitor_data/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>International Customised Enquiries</p>
                </a>
               </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>agent/contact_general_enquiry/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               General Enquiries
              </p>
            </a>
          </li> -->

         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stationary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/stationary_order/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stationary Order</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/stationary_order_completed/completed" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Stationary Order</p>
                </a>
               </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/prospect_rate_download_mob/index" class="nav-link">
                <!-- <i class="nav-icon fas fa fa-user"></i> -->
                <i class="nav-icon fa fa-download" aria-hidden="true"></i>
                <p>
                    Document download list
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Booking Payment Status
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/pending_booking_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pending Payment Bookings
                  </p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/final_booking_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    In Process Bookings
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/booking_completed_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Completed Bookings
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/customer_cancel_tour/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Customer Request Cancel Tour
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/request_code_number/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Request Code Number
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>agent/login/logout" class="nav-link">
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
  