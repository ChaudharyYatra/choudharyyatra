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
          <center><h6 class="desig_css">[ Kitchen Staff ]</h6></center>
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

          
          
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/suggestion_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Suggestion Module
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/instruction_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Instruction Module
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/tour_expenses/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Tour Expenses
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/customer_feedback/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Feedback From Customer 
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                My Tour Operation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>kitchen_staff_cook/asign_tour_to_manager/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Asigned Tour</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/birthday_and_anniversary/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Birthday & Anniversary Module</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/anniversary_module/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anniversary Module</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/attendance/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/tm_request_more_fund/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requested amt details</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/account_pay_amt/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requested amount pay from account</p>
                </a>
              </li> -->

            </ul>
          </li>
          
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/tm_account_details/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Account Details
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>kitchen_staff_cook/kitchen_staff_cook_photos/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kitchen Menu Photos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>kitchen_staff_cook/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>kitchen_staff_cook/change_password/change_password" class="nav-link">
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