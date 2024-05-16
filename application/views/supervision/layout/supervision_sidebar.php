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

      <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Choudhary Yatra" style="width:100%;"></img>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
        <!-- $supervision_role = $this->session->userdata('supervision_role'); -->
                
          <center><a href="#" class="d-block"><?php echo $supervision_sess_name; ?></a></center>  
          <center><h6 class="desig_css"><?php echo $supervision_role_name = $this->session->userdata('supervision_role_name'); ?></h6></center>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php if($this->session->userdata['supervision_role']=='3') {?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>supervision/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
    

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/supervision_request/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Requests for code
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>supervision/supervision_request_completed/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Code alocation completed
              </p>
            </a>
          </li>
          
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
              Change password
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

        <?php } elseif($this->session->userdata['supervision_role']=='10') {?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_add_master/dashboard/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_add_master/tour_expenses/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Add expenses
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_add_master/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>expences_add_master/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change password
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
        <?php } elseif($this->session->userdata['supervision_role']=='4'){?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
    

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/assign_staff/main_index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Assign staff
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/assign_expences_checker/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Assign expences checker
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tours
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/completed_tours/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed tours</p>
                </a>
               </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Hotel advance payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>tour_operation_manager/hotel_advance_payment/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Hotel advance payment req to accountent
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>tour_operation_manager/hotel_advance_payment/advance_pay_detail" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Hotel advance payment request completed
                </p>
              </a>
            </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Request more fund
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/more_fund_request/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request fund from tour manager</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_operation_manager/account_pay_amt/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requested amount pay from account</p>
                </a>
               </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/tour_expences/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Tour expences
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/final_booking_details/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Final booking
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/replace_tm_request_bus/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                TM request replace bus
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_operation_manager/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change password
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
        
        
        <?php } elseif($this->session->userdata['supervision_role']=='5'){?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>

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
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                  Accounting masters
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/Company_information/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Company name</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/voucher_types/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Voucher types</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/ledgers/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Ledgers</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/group/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Groups</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/subgroup/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Subgroups</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/ledger_accounts/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Ledger Accounts</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/opening_balances/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Opening Balances</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/depreciation_masters/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Depreciation Masters</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/fixed_assets/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Fixed Assets</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/bank_reconciliation/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bank Reconciliation</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/audit_trail/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Audit Trail</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/expenses/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Expenses</p>
                              </a>
                            </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                  Inventory Masters
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/items/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Items</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/stock_categories/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Stock Categories</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/batch_masters/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Batch masters</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/warranty_masters/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Warranty Masters</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/serial_number/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Serial Number</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/godowns/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Godowns</p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="<?php echo base_url(); ?>account/mrp_masters/index" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>MRP Masters</p>
                              </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                  Payroll Masters
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/employees_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employees Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/designation_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Designation Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/departments_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Departments Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/grades_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Grades Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/payroll_setup_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payroll Setup Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/payment_schedule/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payment Schedule</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/leave_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Leave Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/advances_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Advances Master</p>
                                </a>
                              </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                  Statutory Masters
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/taxes_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Taxes Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/currencies_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Currencies Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/statutory_reports_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Statutory Reports</p>
                                </a>
                              </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Other Masters
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/bank_accounts/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bank Accounts</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/customers_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customers Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/suppliers_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suppliers Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/budgets_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Budgets Master</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="<?php echo base_url(); ?>account/price_lists_master/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Price Lists Master</p>
                                </a>
                              </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Hotel advance payment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/hotel_advance_payment_req/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Hotel advance payment request
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/hotel_advance_payment_req/advance_pay_detail" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Hotel advance payment request completed
                  </p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Request more fund
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/more_fund_request_acc/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request fund from tour manager</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/account_pay_amt_details/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request fund from my side</p>
                </a>
               </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/tour_expences/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Tour expenses
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/other_tour_expences/tourwise_expences" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Other Tour expences
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>account/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change password
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

        <?php } elseif($this->session->userdata['supervision_role']=='6'){?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/suggestion_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Suggestion module
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/instruction_module/index" class="nav-link">
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/instruction_module/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Instruction Module
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php //echo base_url(); ?>tour_manager/tour_expenses/index" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Tour Expenses
              </p>
            </a>
          </li>

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
                <a href="<?php //echo base_url(); ?>tour_manager/asign_tour_to_manager/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Asigned Tour</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/request_replace_bus/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Replace Bus</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/birthday_and_anniversary/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Birthday & Anniversary Module</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/tour_photos/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tour Photos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php //echo base_url(); ?>tour_manager/attendance/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>tour_manager/account_pay_amt/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requested amount pay from account</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change password
              </p>
            </a>
          </li>
               
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/login/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
           </li>
        </ul>

        <?php } elseif($this->session->userdata['supervision_role']=='7'){?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>kitchen_staff_cook/dashboard/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                My tour operation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>kitchen_staff_cook/asign_tour_to_manager/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My asigned tour</p>
                </a>
              </li>
            </ul>
          </li>
          
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>kitchen_staff_cook/kitchen_staff_cook_photos/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kitchen menu photos</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>tour_manager/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change password
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
        <?php } elseif($this->session->userdata['supervision_role']=='9'){?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>expences_checker/dashboard/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>expences_checker/tour_expenses/index" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                Tour expenses
                </p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>expences_checker/profile/index" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Profile
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>expences_checker/change_password/change_password" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Change password
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

        <?php } elseif($this->session->userdata['supervision_role']=='11'){?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>office_branch_staff/dashboard/index" class="nav-link">
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
                <a href="<?php echo base_url(); ?>office_branch_staff/add_sra_form/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add SRA Payment</p>
                </a>
               </li>

            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>office_branch_staff/profile/index" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
               Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>office_branch_staff/change_password/change_password" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
              Change password
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

        <?php }?>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
