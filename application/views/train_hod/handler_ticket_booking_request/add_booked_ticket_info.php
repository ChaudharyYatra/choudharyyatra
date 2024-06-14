<style>
    .select2{
        width: 100%;   
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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url();?>train_hod/ticket_booking_request/add_booked_ticket_info/<?php echo $extra_sevice_id; ?>/<?php echo $sra_no; ?>" enctype="multipart/form-data" id="add_asign_driver">
              <input type="hidden" class="form-control" name="extra_services_id" id="extra_services_id" value="<?php echo $extra_sevice_id; ?>" placeholder="Enter Ticket Amount">

              <input type="hidden" class="form-control" name="srano" id="srano" value="<?php echo $sra_no; ?>" placeholder="Enter Ticket Amount">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Booking Status</label>
                                <select class="form-control"  name="ticket_status" id="ticket_status" required="required">
                                    <option value="">Select Driver Name</option>  
                                    <option value="Booked">Booked</option>
                                    <option value="RAC">RAC</option>
                                    <option value="Waiting">Waiting</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ticket Amount</label>
                                <input type="text" class="form-control" name="orignal_ticket_cost" id="orignal_ticket_cost" placeholder="Enter Ticket Amount">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ticket Image / Pdf</label><br>
                                <input type="file" name="ticket_photo" id="ticket_photo" required="required">
                                <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
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
  

</body>
</html>
