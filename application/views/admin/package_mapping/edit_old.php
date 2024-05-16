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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                 
                  <div class="form-group">
                    <label>Package Title</label>
                    <input type="text" class="form-control" name="package_title" id="package_title" placeholder="Enter Package Title" required="required" value="<?php echo $info['package_title']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Academic Year</label>
                    <select class="form-control" style="width: 100%;" name="academic_year" id="academic_year" required="required">
                        <option value="">Select Year</option>
                        <?php
                                   foreach($academic_years_data as $academic_years_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $academic_years_info['id']; ?>" <?php if($academic_years_info['id']==$info['academic_year']) { echo "selected"; } ?>><?php echo $academic_years_info['year']; ?></option>
                               <?php } ?>
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Packages</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select a Packages" style="width: 100%;" name="package_id[]" id="package_id" required="required">
                        <option value="">Select Package</option>
                        <?php
                           foreach($packages_data as $packages_info) 
                           { 
                               
                        ?>
                           <option value="<?php echo $packages_info['id']; ?>" <?php if($packages_info['id']==$info['package_id']) { echo "selected"; } ?>><?php echo $packages_info['tour_title']; ?></option>
                       <?php } ?>
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description" required="required" value="<?php echo $info['description']; ?>"><?php echo $info['description']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Rating</label>
                    <input type="number" class="form-control" name="rating" placeholder="Enter Rating" min="1" max="5" required="required" value="<?php echo $info['rating']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Package Cost</label>
                    <input type="text" class="form-control" name="cost" placeholder="Enter Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['cost']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Tour Number of Days</label>
                    <input type="text" class="form-control" name="tour_number_of_days" id="tour_number_of_days" placeholder="Enter Tour Number of Days" oninput="this.value = this.value.replace(/[^0-9a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['tour_number_of_days']; ?>">
                  </div>
                       
                  <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="image_name" id="image_name" >
                  </div>
                  
                  <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php if(!empty($info['image_name'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/package_mapping/<?php echo $info['image_name']; ?>" width="50%">
                                      <input type="text" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                                      <?php } ?>
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
  