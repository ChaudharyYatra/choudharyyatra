<style>
  .table-color{
    background:#00899f80;
  }
  .table-color-agent{
    background:#6c757d57;
    color:#000 !important;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
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
          <div class="col-12">
            <div class="card-body">
                  <?php  
                    foreach($arr_data_international_enquiry as $info) 
                        { 
                          ?>
                  <table id="example2" class="table table-bordered table-hover table-color-agent">
                    <tr>
                      <th>Agent Name</th>
                      <td><?php echo $info['agent_name']; ?></td>

                      <th>Region Name</th>
                      <td><?php echo $info['department']; ?></td>

                      <th>Centre Name</th>
                      <td><?php echo $info['booking_center']; ?></td>
                    </tr>
                  </table>
                  <?php } ?>
              </div>

            <div class="card-body">
                <?php  
                  foreach($arr_data_international_enquiry as $info) 
                      { 
                        ?>
                <table id="example2" class="table table-bordered table-hover table-color" style="width:50%;">
                  <tr>
                    <!--<th>Customer Name</th>-->
                    <td><?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?></td>

                    <!--<th>Mobile No.</th>-->
                    <td><?php echo $info['mobile_number']; ?></td>

                    <!--<th>Enquiry Date</th>-->
                    <td><b>Enquiry Date :</b> <?php echo date('d-m-Y', strtotime($info['c_date'])); ?></td>
                  </tr>
                </table>
                <?php } ?>
            </div>

              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Follow Up Date</th>
                    <th>Follow Up Time</th>
                    <th>Next Follow Up Date</th>
                    <th>Reason</th>
                    <th>Follow Up Comment</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['follow_up_date'] ?></td>
                    <td><?php if($i < 5)
                            {
                            echo date('d-m-Y', strtotime($info['follow_up_time']));
                              }else
                          {
                            echo "No Record";
                          }
                    ?></td>
                    <td><?php if($i < 5)
                            {
                            echo $info['next_followup_date'];
                              }else
                          {
                            echo "No Record";
                          }
                    ?></td>
                    <!-- <td><?php //echo $info['follow_up_time'] ?></td>
                    <td><?php //echo $info['next_followup_date'] ?></td> -->
                    <td><?php echo $info['create_followup_reason'] ?></td>
                    <td><?php echo $info['follow_up_comment'] ?></td>
                    
                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
                 <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
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
