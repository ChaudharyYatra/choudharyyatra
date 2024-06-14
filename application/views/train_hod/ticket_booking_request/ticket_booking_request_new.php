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
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($new_extra_services_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Service Name</th>
                    <th>Customer Name</th>
                    <th>Mobile No.</th>
                    <th>Created At</th>
                    <th>Select Handler</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                   $i=1; 
                   foreach($new_extra_services_data as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['service_name'] ?></td>
                    <td><?php echo $info['customer_name'] ?></td>
                    <td><?php echo $info['mobile_number'] ?></td>
                    <td><?php echo $info['created_at'] ?></td>
                    <td><select class="select_css extra_services_handler" name="extra_handler" id="extra_handler" onkeyup="validate()">
                            <option value="">Select</option>
                            <option attr_id="<?php echo $info['extra_id'] ?>" value="<?php echo $this->session->userdata('supervision_sess_id'); ?>">Self</option>
                            <?php
                            foreach($handler_list as $handler_list_info){ 
                            ?>
                            <option attr_id="<?php echo $info['extra_id'] ?>" value="<?php echo $handler_list_info['id'];?>"><?php echo $handler_list_info['supervision_name'];?></option>
                            
                            <?php } ?>
                        </select>
                    </td>
                    <!-- <td><a onclick="return confirm('Are You Sure You Want To Confirm Booking?')" href="<?php //echo $module_url_path;?>/booking_enquiry/<?php //echo $info['id']; ?>"><button type="submit" class="btn btn-primary" name="submit" value="submit">View</button></a></td> -->
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
