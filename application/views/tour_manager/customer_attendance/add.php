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
                        <div class="col-md-1">
                            
                        </div>  
                        <div class="col-md-2">
                            <label>Tour Details -</label>
                        </div>  
                        <div class="col-md-2">
                            <div><?php echo $tour_arr_data_value['tour_number']; ?> - <?php echo $tour_arr_data_value['tour_title']; ?></div>
                        </div>
                        <div class="col-md-2">  
                            <label>Tour Date -</label>
                        </div>
                        <div class="col-md-2">  
                            <div><?php echo date('d-m-Y', strtotime($tour_arr_data_value['journey_date'])); ?></div>
                        </div>
                        <div class="col-md-1">  
                            <label>Day-</label>
                        </div>
                        <div class="col-md-1">  
                            <div><?php echo $day_id; ?></div>
                        </div>
                        
                    </div>
                <?php } ?>
                   </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
              <form method="post">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th class="text-center">Traveller List</th>
                    <th class="text-center">Morning Attendance</th>
                    <th class="text-center">Evening Attendance</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=0; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td class="text-center"><?php echo $info['first_name'] ?> <?php echo $info['middle_name'] ?> <?php echo $info['last_name'] ?>
                        <input type="text" class="form-control" name="traveller_id[]" id="traveller_id" value="<?php echo $info['id']; ?>" placeholder="Enter seat count">
                    </td>
                    <td class="text-center"><input type="radio" name="m_attendance[<?php echo $i; ?>]" id="m_attendance" value="Present">&nbsp;&nbsp;Present
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="m_attendance[<?php echo $i; ?>]" id="m_attendance" value="Absent">&nbsp;&nbsp;Absent
                    </td>
                    <td class="text-center"><input type="radio" name="e_attendance[<?php echo $i; ?>]" id="e_attendance" value="Present">&nbsp;&nbsp;Present
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="e_attendance[<?php echo $i; ?>]" id="e_attendance" value="Absent">&nbsp;&nbsp;Absent
                    </td>
                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>

                <div class="card-footer">
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                  </div>
                </div>

                </form>
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
