<style>
    .itinerary_css{
        text-decoration:none !important;
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
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
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
              <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  //if(count($arr_data) > 0 ) 
              //{ ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Type</th>
                    <th>Tour Details</th>
                    <th>Tour Date</th>
                    <!-- <th>Advance Payment Done From Accountant</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data_assign_staff as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <?php if($info['package_type']!="Special Limited Offer"){
                      ?>
                    <td><?php echo $info['package_type'] ?></td>
                    <?php }else{
                      ?>
                      <td>Special Limited Offer</td>
                    <?php } ?>
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['journey_date'])) ?></td>
                    <!-- <td><?php //echo $info['advance_amt'] ?></td> -->
                    
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a href="<?php echo $module_url_path;?>/all_expenses/<?php $aid=base64_encode($info['package_id']); 
					                  echo rtrim($aid, '='); ?>/<?php $did=base64_encode($info['package_date_id']); 
					                  echo rtrim($did, '='); ?>" class="itinerary_css"><button class="dropdown-item">View All Expenses</button></a>
                          
                          <!-- <a href="<?php //echo $module_url_path;?>/edit/<?php //$aid=base64_encode($info['package_id']); 
					                  //echo rtrim($aid, '='); ?> /<?php //$did=base64_encode($info['package_date_id']); 
					                  //echo rtrim($did, '='); ?>" class="itinerary_css"><button class="dropdown-item">show Tour Expenses</button></a> -->
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                </table>
                 <?php //} else
            //     { echo '<div class="alert alert-danger alert-dismissable">
            //     <i class="fa fa-ban"></i>
            //     <b>Alert!</b>
            //     Sorry No records available
            //   </div>' ; } ?>
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
