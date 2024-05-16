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
               <?php
                   foreach($asigned_driver as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_asign_driver">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                        <label>Vehicle RTO Registration No</label>
                        <select class="select_css" name="vehicle_rto_registration" id="vehicle_rto_registration" required="required">
                            <option value="">Select RTO Registration No</option>
                            <?php
                                foreach($vehicle_details as $vehicle_details_info) 
                                { 
                            ?>
                                <option value="<?php echo $vehicle_details_info['id'];?>" <?php if(isset($info['RTO_registration'])){if($vehicle_details_info['id'] == $info['RTO_registration']) {echo 'selected';}}?>><?php echo $vehicle_details_info['registration_number'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Driver Name</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select Driver Name" style="width: 100%;" name="asign_driver_name[]" id="asign_driver_name" required="required">
                            <option value="">Select Driver Name</option>
                            <?php
                            $title =explode(',',$info['asign_driver_name']);
                            $c=count($title);
                            // print_r($c); die;
                            foreach($vehicle_driver as $vehicle_driver_info) 
                            { 
                                for($i=0; $i<$c; $i++){
                                    $tid= $title[$i];
                                }
                            ?>
                            <option value="<?php echo $vehicle_driver_info['id']; ?>" <?php if(in_array($vehicle_driver_info['id'], $title)) { echo "selected"; } ?>><?php echo $vehicle_driver_info['driver_name']; ?></option>
                        <?php  } ?>
                        </select>
                        </div>
                    </div>

                    </div>

                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
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
  
