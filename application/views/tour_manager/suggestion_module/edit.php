<style>
  .mealplan_css{
            border: 1px solid red !important;
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
            <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($suggestion_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="suugestion_edit">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>City</label>
                            <select class="form-control" name="city" id="city" onchange='citycheck(this.value); 
                            this.blur();' onfocus='this.size=5;' onblur='this.size=1;' 
                                  onchange='this.size=1; this.blur();'>
                              <option value="">Select city</option>
                              <option value="Other" <?php if(isset($info['city'])){if("Other" == $info['city']) {echo 'selected';}}?>>other</option>
                              <?php foreach($city as $city_info){ ?> 
                                <option value="<?php echo $city_info['id'];?>" <?php if(isset($info['city'])){if($city_info['id'] == $info['city']) {echo 'selected';}}?>><?php echo $city_info['city_name'];?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>

                      <?php if($info['city']!='Other'){?>
                      <div class="col-md-6" id="other_city_div" style='display:none;'>
                        <div class="form-group">
                          <label>Enquiry destination name</label>
                          <input type="text" class="form-control mealplan_css" name="other_city" id="other_city" placeholder="Enter destination name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <?php } else { ?>
                        <div class="col-md-6" id="other_city_div" style='display:block;'>
                        <div class="form-group">
                          <label>Enquiry destination name</label>
                          <input type="text" class="form-control mealplan_css" name="other_city" id="other_city" placeholder="Enter destination name" value="<?php echo $info['other_city'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <?php } ?>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Package Type</label><br>
                          <select class="select_css" name="package_type" id="package_type">
                          <option value="">Select package type</option>
                                <?php
                                  foreach($package_type as $package_type_info) 
                                  { 
                                ?>
                                <option value="<?php echo $package_type_info['id'];?>" <?php if(isset($info['package_type'])){if($package_type_info['id'] == $info['package_type']) {echo 'selected';}}?>><?php echo $package_type_info['package_type'];?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tour No / Name</label>
                            <select class="form-control" name="tour_number" id="tour_number" onfocus='this.size=5;' onblur='this.size=1;' 
                                  onchange='this.size=1; this.blur();'>
                              <option value="">Select tour title</option>
                              <!-- <option value="Other">Other</option> -->
                              <?php foreach($packages_data as $packages_data_value){ ?> 
                                <option value="<?php echo $packages_data_value['id'];?>" <?php if(isset($info['tour_number'])){if($packages_data_value['id'] == $info['tour_number']) {echo 'selected';}}?>><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>

                      

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Priority</label><br>
                            <select class="select_css" name="priority" id="priority">
                            <option value="">select Priority</option>
                            <option value="High" <?php if(isset($info['priority'])){if("High" == $info['priority']) {echo 'selected';}}?>>High</option>
                            <option value="Medium" <?php if(isset($info['priority'])){if("Medium" == $info['priority']) {echo 'selected';}}?>>Medium</option>
                            <option value="Low" <?php if(isset($info['priority'])){if("Low" == $info['priority']) {echo 'selected';}}?>>Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Upload Attachment</label>
                            <input type="file" name="image_name" id="image_name">
                            <br><span class="text-danger">Please select only PDF,JPG,PNG,JPEG,PDF format files.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Attachment</label><br>
                        <?php if(!empty($info['image_name'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name']; ?>" width="50%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>
                      </div>
                    </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image_name_2" id="image_name_2">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Attachment</label><br>
                            <?php if(!empty($info['image_name_2'])){ ?>
                              <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_2']; ?>" width="50%">
                              <input type="hidden" name="old_new_name" id="old_new_name" value="<?php echo $info['image_name_2']; ?>">
                            <?php } ?>

                            <?php if(!empty($info['image_name_2'])){ ?>
                              <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_2']; ?>">Download</a>
                              <input type="hidden" name="old_new_name" id="old_new_name" value="<?php if(!empty($info['image_name_2'])){echo $info['image_name_2'];}?>">
                            <?php } ?>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Inclusion Image</label><br>
                            <input type="file" name="image_name_3" id="image_name_3">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Attachment</label><br>
                            <?php if(!empty($info['image_name_3'])){ ?>
                              <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_3']; ?>" width="50%">
                              <input type="hidden" name="old_inclusion_name" id="old_inclusion_name" value="<?php echo $info['image_name_3']; ?>">
                            <?php } ?>

                            <?php if(!empty($info['image_name_3'])){ ?>
                              <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_3']; ?>">Download</a>
                              <input type="hidden" name="old_inclusion_name" id="old_inclusion_name" value="<?php if(!empty($info['image_name_3'])){echo $info['image_name_3'];}?>">
                            <?php } ?>
                          </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"><?php echo $info['description'];?></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 