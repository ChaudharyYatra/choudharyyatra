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
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_relation">
                <div class="card-body">
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
                                        <!-- <option value="<?php //echo $packages_info['id']; ?>"><?php //echo $packages_info['tour_number']; ?></option> -->
                                        <option value="<?php echo $packages_info['id']; ?>" <?php if($packages_info['id']==$info['tour_number']) { echo "selected"; } ?>><?php echo $packages_info['tour_number']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="tour_days" id="tour_days" placeholder="Enter seat count" > -->
                            </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tour Name</label> 
                                    <input type="text" readonly class="form-control" name="tour_name" id="tour_name" placeholder="Enter tour name" value="<?php echo $info['tour_name']; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tour Total Days</label> 
                                    <input type="text" readonly class="form-control" name="tour_days" id="tour_days" placeholder="Enter tour days" value="<?php echo $info['tour_days']; ?>" required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tour Start Date</label> 
                                    <input type="date" class="form-control" name="tour_start_date" id="tour_start_date" placeholder="Enter Tour Start Date" value="<?php echo $info['tour_start_date']; ?>" required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tour End Date</label> 
                                    <input type="date" class="form-control" name="tour_end_date" id="tour_end_date" placeholder="Enter Tour End Date" value="<?php echo $info['tour_end_date']; ?>" required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Inclusion</label>
                                <textarea class="form-control" name="inclusion" id="inclusion" placeholder="Enter Inclusion" required="required"><?php echo $info['inclusion']; ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Terms & Conditions</label>
                                <textarea class="form-control" name="terms_conditions" id="terms_conditions" placeholder="Enter Terms & Condition" required="required"><?php echo $info['terms_conditions']; ?></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
              <?php } ?>
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
 
