<style>
    .card-bg{
        background-color: #F6F6F6;
    }

    .offcanvas-end{
      width: 800px !important;
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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
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
              
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="add_itinerary">
                    
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                    <label>Select Tour Number</label> 
                                    <select class="form-control" style="width: 100%;" name="tour_number" id="tour_number" required="required">
                                      <option value="">Select Tour Number</option>
                                      <?php
                                        foreach($packages_data as $packages_info) 
                                        { 
                                      ?>
                                        <option value="<?php echo $packages_info['id']; ?>"><?php echo $packages_info['tour_number']; ?></option>
                                      <?php } ?>
                                    </select>
                                    <span class="error"><?php echo form_error('tour_number'); ?></span>
                                    <!-- <input type="text" class="form-control" name="tour_days" id="tour_days" placeholder="Enter seat count" > -->
                              </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tour Name</label> 
                                    <input type="text" readonly class="form-control" name="tour_name" id="tour_name" placeholder="Enter tour name" required="required">
                                    <span class="error"><?php echo form_error('tour_name'); ?></span>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tour Total Days</label> 
                                    <input type="text" readonly class="form-control" name="tour_days" id="tour_days" placeholder="Enter tour days" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                            <!-- <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php //echo $agent_booking_enquiry_data_info['id']; ?>"> -->
                          
                    
                    <table class="table table-bordered" style="width:100%" id="tour_itinerary">
                        
                        <colgroup>
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 15%;">
                        </colgroup>
                            <thead>
                                <tr style="background:#a19f9f; color:white;">
                                    <th style="width:10%;">Day</th>
                                    <th style="width:10%;">Reporting Time (Optional)</th>
                                    <th style="width:10%;">Reporting Place (Optional)</th>
                                    <th style="width:10%;">Extra Remarks (Optional)</th>
                                    <th style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                          
                            </tbody>
                    </table>
                    

                    <div class="card-footer">
                      <button type="button" class="btn btn-primary" name="submit_str" id="submit_str" value="submit_str">Save & Submit</button> 
                      <a href="<?php echo $module_url_path; ?>/add"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div>
                </form>
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>

       
      <div id="off_can">
        
          

      </div>




        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <!-- Off Canvas -->
  
