<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>assets/admin/index3.php" class="brand-link">
      <!--<img src="<?php //echo base_url(); ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <!--<span class="brand-text font-weight-light">AdminLTE 3</span>-->
      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.jpeg" alt="Chaudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="<?php echo base_url(); ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          <center><a href="#" class="d-block">Admin</a></center>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/academic_year/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Academic Year</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/department/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
               </li>
               
                <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/tour_cancel_rules/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tour Cancel Rules</p>
                </a>
               </li>
               
                <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/seat_reservation_rules/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seat Reservation Rules</p>
                </a>
               </li>
            </ul>
          </li>
          
          
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Package
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--<li class="nav-item">-->
              <!--  <a href="<?php //echo base_url(); ?>admin/main_category/index" class="nav-link">-->
              <!--    <i class="far fa-circle nav-icon"></i>-->
              <!--    <p>Main Category</p>-->
              <!--  </a>-->
              <!-- </li>-->
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/packages/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Packages</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/package_mapping/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Packages Mapping</p>
                </a>
               </li>

               
<!-- 
               <li class="nav-item">
                <a href="<?php //echo base_url(); ?>admin/package_dates/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package Dates</p>
                </a>
               </li> -->
            </ul>
          </li>

          <li class="nav-item">
                <a href="<?php echo base_url(); ?>agent/booking_enquiry/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Enquiry</p>
                </a>
               </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/agent/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Agent
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/traveler/index" class="nav-link">
              <i class="nav-icon fas fa fa-user-secret"></i>
              <p>
                Traveler/User
              </p>
            </a>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-tachometer-alt"></i>-->
          <!--    <p>-->
          <!--      Dashboard-->
          <!--      <i class="right fas fa-angle-left"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/index.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Dashboard v1</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/index2.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Dashboard v2</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/index3.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Dashboard v3</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="<?php echo base_url(); ?>assets/admin/widgets.php" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Widgets-->
          <!--      <span class="right badge badge-danger">New</span>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-copy"></i>-->
          <!--    <p>-->
          <!--      Layout Options-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--      <span class="badge badge-info right">6</span>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/top-nav.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Top Navigation</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/top-nav-sidebar.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Top Navigation + Sidebar</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/boxed.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Boxed</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/fixed-sidebar.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Fixed Sidebar</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/fixed-sidebar-custom.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Fixed Sidebar <small>+ Custom Area</small></p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/fixed-topnav.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Fixed Navbar</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/fixed-footer.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Fixed Footer</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/layout/collapsed-sidebar.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Collapsed Sidebar</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-chart-pie"></i>-->
          <!--    <p>-->
          <!--      Charts-->
          <!--      <i class="right fas fa-angle-left"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/charts/chartjs.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>ChartJS</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/charts/flot.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Flot</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/charts/inline.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Inline</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/charts/uplot.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>uPlot</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-tree"></i>-->
          <!--    <p>-->
          <!--      UI Elements-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/general.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>General</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/icons.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Icons</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/buttons.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Buttons</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/sliders.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Sliders</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/modals.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Modals & Alerts</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/navbar.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Navbar & Tabs</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/timeline.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Timeline</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/UI/ribbons.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Ribbons</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item menu-open">-->
          <!--  <a href="#" class="nav-link active">-->
          <!--    <i class="nav-icon fas fa-edit"></i>-->
          <!--    <p>-->
          <!--      Forms-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/forms/general.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>General Elements</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/forms/advanced.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Advanced Elements</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/forms/editors.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Editors</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/forms/validation.php" class="nav-link active">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Validation</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-table"></i>-->
          <!--    <p>-->
          <!--      Tables-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/tables/simple.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Simple Tables</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/tables/data.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>DataTables</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/tables/jsgrid.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>jsGrid</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-header">EXAMPLES</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="<?php echo base_url(); ?>assets/admin/calendar.php" class="nav-link">-->
          <!--    <i class="nav-icon far fa-calendar-alt"></i>-->
          <!--    <p>-->
          <!--      Calendar-->
          <!--      <span class="badge badge-info right">2</span>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="<?php echo base_url(); ?>assets/admin/gallery.php" class="nav-link">-->
          <!--    <i class="nav-icon far fa-image"></i>-->
          <!--    <p>-->
          <!--      Gallery-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="<?php echo base_url(); ?>assets/admin/kanban.php" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-columns"></i>-->
          <!--    <p>-->
          <!--      Kanban Board-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon far fa-envelope"></i>-->
          <!--    <p>-->
          <!--      Mailbox-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/mailbox/mailbox.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Inbox</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/mailbox/compose.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Compose</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/mailbox/read-mail.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Read</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-book"></i>-->
          <!--    <p>-->
          <!--      Pages-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/invoice.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Invoice</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/profile.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Profile</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/e-commerce.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>E-commerce</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/projects.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Projects</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/project-add.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Project Add</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/project-edit.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Project Edit</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/project-detail.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Project Detail</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/contacts.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Contacts</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/faq.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>FAQ</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/contact-us.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Contact us</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon far fa-plus-square"></i>-->
          <!--    <p>-->
          <!--      Extras-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="#" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>-->
          <!--          Login & Register v1-->
          <!--          <i class="fas fa-angle-left right"></i>-->
          <!--        </p>-->
          <!--      </a>-->
          <!--      <ul class="nav nav-treeview">-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/login.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Login v1</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/register.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Register v1</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/forgot-password.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Forgot Password v1</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/recover-password.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Recover Password v1</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="#" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>-->
          <!--          Login & Register v2-->
          <!--          <i class="fas fa-angle-left right"></i>-->
          <!--        </p>-->
          <!--      </a>-->
          <!--      <ul class="nav nav-treeview">-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/login-v2.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Login v2</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/register-v2.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Register v2</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/forgot-password-v2.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Forgot Password v2</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="<?php echo base_url(); ?>assets/admin/examples/recover-password-v2.php" class="nav-link">-->
          <!--            <i class="far fa-circle nav-icon"></i>-->
          <!--            <p>Recover Password v2</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/lockscreen.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Lockscreen</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/legacy-user-menu.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Legacy User Menu</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/language-menu.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Language Menu</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/404.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Error 404</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/500.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Error 500</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/pace.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Pace</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/examples/blank.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Blank Page</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/starter.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Starter Page</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-search"></i>-->
          <!--    <p>-->
          <!--      Search-->
          <!--      <i class="fas fa-angle-left right"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/search/simple.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Simple Search</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="<?php echo base_url(); ?>assets/admin/search/enhanced.php" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Enhanced</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-header">MISCELLANEOUS</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="<?php echo base_url(); ?>assets/admin/iframe.php" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-ellipsis-h"></i>-->
          <!--    <p>Tabbed IFrame Plugin</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="https://adminlte.io/docs/3.1/" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-file"></i>-->
          <!--    <p>Documentation</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-header">MULTI LEVEL EXAMPLE</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="fas fa-circle nav-icon"></i>-->
          <!--    <p>Level 1</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-circle"></i>-->
          <!--    <p>-->
          <!--      Level 1-->
          <!--      <i class="right fas fa-angle-left"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="#" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Level 2</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="#" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>-->
          <!--          Level 2-->
          <!--          <i class="right fas fa-angle-left"></i>-->
          <!--        </p>-->
          <!--      </a>-->
          <!--      <ul class="nav nav-treeview">-->
          <!--        <li class="nav-item">-->
          <!--          <a href="#" class="nav-link">-->
          <!--            <i class="far fa-dot-circle nav-icon"></i>-->
          <!--            <p>Level 3</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="#" class="nav-link">-->
          <!--            <i class="far fa-dot-circle nav-icon"></i>-->
          <!--            <p>Level 3</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--        <li class="nav-item">-->
          <!--          <a href="#" class="nav-link">-->
          <!--            <i class="far fa-dot-circle nav-icon"></i>-->
          <!--            <p>Level 3</p>-->
          <!--          </a>-->
          <!--        </li>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--    <li class="nav-item">-->
          <!--      <a href="#" class="nav-link">-->
          <!--        <i class="far fa-circle nav-icon"></i>-->
          <!--        <p>Level 2</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="fas fa-circle nav-icon"></i>-->
          <!--    <p>Level 1</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-header">LABELS</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon far fa-circle text-danger"></i>-->
          <!--    <p class="text">Important</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon far fa-circle text-warning"></i>-->
          <!--    <p>Warning</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon far fa-circle text-info"></i>-->
          <!--    <p>Informational</p>-->
          <!--  </a>-->
          <!--</li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <!--<div class="content-wrapper">-->
    <!-- Content Header (Page header) -->
  <!--  <section class="content-header">-->
  <!--    <div class="container-fluid">-->
  <!--      <div class="row mb-2">-->
  <!--        <div class="col-sm-6">-->
  <!--          <h1>Validation</h1>-->
  <!--        </div>-->
  <!--        <div class="col-sm-6">-->
  <!--          <ol class="breadcrumb float-sm-right">-->
  <!--            <li class="breadcrumb-item"><a href="#">Home</a></li>-->
  <!--            <li class="breadcrumb-item active">Validation</li>-->
  <!--          </ol>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div><!-- /.container-fluid -->-->
  <!--  </section>-->