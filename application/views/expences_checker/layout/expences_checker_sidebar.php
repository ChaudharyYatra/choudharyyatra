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
    <a href="<?php echo base_url(); ?>expences_checker/dashboard" class="brand-link">

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <center><a href="#" class="d-block name_css"><?php echo $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name'); ?></a></center>
          <center><h6 class="desig_css">[ Expenses Checker ]</h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>expences_checker/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_checker/asign_tour_manager/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Tour Expenses
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_checker/other_tour_expences/tourwise_expences" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Other Expenses
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_checker/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_checker/login/logout" class="nav-link">
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