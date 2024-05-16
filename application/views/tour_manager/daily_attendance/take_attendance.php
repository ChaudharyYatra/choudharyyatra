<style>
    .itinerary_css{
        text-decoration:none !important;
        color:white;
    }
    .itinerary_css:hover{
        /* text-decoration:none !important; */
        color:white;
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
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
            <div class="card-header">
            <?php foreach($tour_arr_data as $tour_arr_data_value) 
                   {  ?>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Tour Details -</label>
                        </div>  
                        <div class="col-md-3">
                            <div><?php echo $tour_arr_data_value['tour_number']; ?> - <?php echo $tour_arr_data_value['tour_title']; ?></div>
                        </div>
                        <div class="col-md-3">  
                            <label>Tour Date -</label>
                        </div>
                        <div class="col-md-3">  
                            <div><?php echo date('d-m-Y', strtotime($tour_arr_data_value['journey_date'])); ?></div>
                        </div>
                    </div>
                <?php } ?>
                   </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Days</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <?php  
                   foreach($arr_data as $info) 
                   { 
                     ?>
                    <input type="hidden" class="form-control" name="tour_no_of_days" id="tour_no_of_days" placeholder="Enter seat count" value="<?php echo $info['tour_number_of_days']; ?>" readonly>
                  <?php  } ?>
                  <tbody id="daily_attendance_table_add">
                  
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
