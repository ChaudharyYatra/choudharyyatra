<style>
  .mealplan_css{
            border: 1px solid red !important;
        }
  </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                  // foreach($arr_data as $info) 
                   //{ 
                     ?>
              <form method="post" enctype="multipart/form-data" id="suugestion_edit">
                <div class="card-body">
                    <div class="row">
                    <?php
                        foreach($arr_data as $packages_data_info) 
                        { 
                        ?>
                          <div class="col-md-6">
                                <div class="form-group">
                                    <label>Package Type</label>
                                    <input type="text" readonly class="form-control" name="package_type_name" id="package_type_name" placeholder="Enter package type" value="<?php echo $packages_data_info['package_type'];?>">
                                    <input type="hidden" class="form-control" name="package_type" id="package_type" placeholder="Enter package type" value="<?php echo $packages_data_info['pack_id'];?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tour No / Name</label>
                                    <input type="text" readonly class="form-control" name="tour_number_name" id="tour_number_name" placeholder="Enter package type" value="<?php echo $packages_data_info['tour_number'];?> - <?php echo $packages_data_info['tour_title'];?>">
                                    <input type="hidden" class="form-control" name="tour_number" id="tour_number" placeholder="Enter package type" value="<?php echo $packages_data_info['pid'];?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Request Amount For More Fund</label>
                                    <input type="text" class="form-control" name="request_more_fund" id="request_more_fund" placeholder="Enter More Fund Amt" value="<?php echo $packages_data_info['more_fund_amt'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Transaction</label>
                                  <select class="select_css" name="select_transaction" id="select_transaction" onchange='account_details(this.value); 
                                  this.blur();'>
                                      <option value="">Select Transaction</option>
                                      <option value="Bank Transfer" <?php if(isset($packages_data_info['select_transaction'])){if("Bank Transfer" == $packages_data_info['select_transaction']) {echo 'selected';}}?>>Bank Transfer</option>
                                      <option value="UPI" <?php if(isset($packages_data_info['select_transaction'])){if("UPI" == $packages_data_info['select_transaction']) {echo 'selected';}}?>>UPI</option>
                                      <option value="Mobile Number" <?php if(isset($packages_data_info['select_transaction'])){if("Mobile Number" == $packages_data_info['select_transaction']) {echo 'selected';}}?>>Mobile Number</option>
                                  </select>
                              </div>
                            </div>

                          <?php if($packages_data_info['select_transaction']=='UPI'){?>
                          <div class="col-md-6" id="upi_no_div" style='display:block;'>
                              <div class="form-group">
                                  <label>UPI No</label>
                                  <input type="text" class="form-control" name="upi_no" id="upi_no" value="<?php echo $packages_data_info['upi_no'];?>" placeholder="Enter UPI No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                          </div>
                          <?php }else{ ?>
                            <div class="col-md-6" id="upi_no_div" style='display:none;'>
                              <div class="form-group">
                                  <label>UPI No</label>
                                  <input type="text" class="form-control" name="upi_no" id="upi_no" placeholder="Enter UPI No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                          </div>
                          <?php } ?>


                          <?php if($packages_data_info['select_transaction']=='Mobile Number'){?>
                          <div class="col-md-6" id="mob_no_div" style='display:block;'>
                              <div class="form-group">
                                  <label>Mobile No</label>
                                  <input type="text" class="form-control" name="mob_no" id="mob_no" value="<?php echo $packages_data_info['mob_no'];?>" placeholder="Enter Mob No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                          </div>
                          <?php }else{ ?>
                            <div class="col-md-6" id="mob_no_div" style='display:none;'>
                              <div class="form-group">
                                  <label>Mobile No</label>
                                  <input type="text" class="form-control" name="mob_no" id="mob_no" placeholder="Enter Mob No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                            </div>
                          <?php } ?>

                <?php if($packages_data_info['select_transaction']=='Bank Transfer'){?>
                <div id="bank_details_div" style='display:block;'>
                <table id="example1 bank_details" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Account No</th>
                    <th>Bank Name</th>
                    <th>Branch Name</th>
                    <th>Select Bank Detail</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($tm_account_details as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['account_no'] ?></td>
                    <td><?php echo $info['bank_name'] ?></td>
                    <td><?php echo $info['branch_name'] ?></td>
                    
                    <td> &nbsp;&nbsp;<input type="radio" name="Select" id="Select" value="<?php echo $info['id'];?> " <?php if(isset($packages_data_info['Select_bank'])){if($packages_data_info['Select_bank']== $info['id']) {echo'checked';}}?>>&nbsp;&nbsp;Select</td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                </div>
                <?php }else{ ?>
                <div id="bank_details_div" style='display:none;'>
                <table id="example1 bank_details" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Account No</th>
                    <th>Bank Name</th>
                    <th>Branch Name</th>
                    <th>Select Bank Detail</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($tm_account_details as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['account_no'] ?></td>
                    <td><?php echo $info['bank_name'] ?></td>
                    <td><?php echo $info['branch_name'] ?></td>
                    <td> &nbsp;&nbsp;<input type="radio" name="Select" id="Select" value="<?php echo $info['id'];?> <?php if(isset($packages_data_info['Select_bank'])){if($packages_data_info['Select_bank']== $info['id']) {echo'checked';}}?>">&nbsp;&nbsp;Select</td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                </div>
                <?php } ?>

                <?php } ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
              </form>
              <?php //} ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 