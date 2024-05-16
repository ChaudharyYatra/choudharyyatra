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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a> -->
              
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
          <div class="col-md-12" id="bank_detail_alert">
            <!-- jquery validation -->
            <!-- <?php //$this->load->view('tour_manager/layout/agent_alert'); ?> -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                      <form method="post" enctype="multipart/form-data" id="suugestion_add">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Brank Name</label>
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account No.</label>
                                    <input type="text" class="form-control" name="acc_no" id="acc_no" placeholder="Enter Account No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Holder Name</label>
                                    <input type="text" class="form-control" name="acc_holder_nm" id="acc_holder_nm" placeholder="Enter Account Holder Name">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Enter Branch Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Branch Code</label>
                                    <input type="text" class="form-control" name="branch_code" id="branch_code" placeholder="Enter Branch Code">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>IFSC Code</label>
                                    <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="Enter ifsc Code">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CIF No</label>
                                    <input type="text" class="form-control" name="cif_no" id="cif_no" placeholder="Enter cif_no">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN No</label>
                                    <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter Pan Card No">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Aadhaar No</label>
                                    <input type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" placeholder="Enter Aadhaar No">
                                </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
                            <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                          </div>
                        </form>
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



  <style>
  .card_title {
    /* display: inline-block; */
    width: 50px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
}
  </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" id="acc_details"
          >
              <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card">
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">Add Slider Content</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  
                  if(count($tm_account_details) > 0 ) 
                   {
                       ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Brank Name</th>
                    <th>Account No.</th>
                    <th>Account Holder Name</th>
                    <th>Branch Name</th>
                    <!-- <th>Is Active?</th> -->
                    <!-- <th>Branch Code</th>
                    <th>IFSC Code</th>
                    <th>CIF No</th>
                    <th>PAN No</th>
                    <th>Aadhaar No</th> -->
                    <th>Action</th>
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
                    <td><?php echo $info['bank_name'] ?></td>
                    <td><?php echo $info['account_no'] ?></td>
                    <td><?php echo $info['acc_holder_nm'] ?></td>
                    <td><?php echo $info['branch_name'] ?></td>
                    <!-- <td><?php //echo $info['branch_code'] ?></td>
                    <td><?php //echo $info['ifsc_code'] ?></td>
                    <td><?php //echo $info['cif_no'] ?></td>
                    <td><?php //echo $info['pan_no'] ?></td>
                    <td><?php //echo $info['aadhaar_no'] ?></td> -->

                    <td>
                    <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); 
					            echo rtrim($aid, '='); ?>" title="View"><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;/&nbsp;
                    <a href="<?php echo $module_url_path;?>/edit/<?php $aid=base64_encode($info['id']); 
					            echo rtrim($aid, '='); ?>" title="Update"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                    <a href="<?php echo $module_url_path;?>/delete/<?php $aid=base64_encode($info['id']); 
					            echo rtrim($aid, '='); ?>" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                    </td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                 <?php } else
                {echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
              </div>' ; } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>

 