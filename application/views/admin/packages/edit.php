<style>
  .hide {
    display: none;
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
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_package">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
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
                      </div>
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
                          <label>Tour Type</label> <br>
                            <input type="radio" id="main_tour" name="tour_type" onclick="main();"
                            value="1" <?php if(isset($info['tour_type'])){if($info['tour_type']=='1') {echo'checked';}}?>/>
                                <label for="Yes" id="main_tour">Main Tour</label> &nbsp;&nbsp;
                            <input type="radio" id="sub_tour" name="tour_type" value="0" onclick="sub();"
                            value="0" <?php if(isset($info['tour_type'])){if($info['tour_type']=='0') {echo'checked';}}?>/>
                                <label for="No" id="sub_tour">Sub Tour</label> <br>
                        </div>
                      </div>

                      <?php if($info['tour_type']=='1') { ?>
                      <div class="col-md-6 hide" id="sub_main_tour_div1">
                        <div class="form-group">
                          <label>Select Main Tour</label>
                          <select class="select_css" name="main_tour_id" id="main_tour_id">
                          <option value="">Select main tour</option>
                                <?php
                                  foreach($packages_tour_type as $packages_tour_type_info) 
                                  { 
                                ?>
                            <option value="<?php echo $packages_tour_type_info['id'];?>" <?php if(isset($info['main_tour_id'])){if($packages_tour_type_info['id'] == $info['main_tour_id']) {echo 'selected';}}?>><?php echo $packages_tour_type_info['tour_title'];?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </div>
                      <?php } else { ?>
                      <div class="col-md-6" id="sub_main_tour_div1" >
                        <div class="form-group">
                          <label>Select Main Tour</label>
                          <select class="select_css" name="main_tour_id" id="main_tour_id">
                          <option value="">Select main tour</option>
                                <?php
                                  foreach($packages_tour_type as $packages_tour_type_info) 
                                  { 
                                ?>
                            <option value="<?php echo $packages_tour_type_info['id'];?>" <?php if(isset($info['main_tour_id'])){if($packages_tour_type_info['id'] == $info['main_tour_id']) {echo 'selected';}}?>><?php echo $packages_tour_type_info['tour_title'];?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </div>
                      <?php } ?>

                      <?php if($info['package_type'] == '7') { ?>
                      <div class="col-md-6 c_from_date">
                              <div class="form-group">
                                <label>From Date</label>
                                <input type="date" class="form-control" name="from_date" placeholder="Enter Destinations" required="required" value="<?php echo $info['from_date']; ?>">
                              </div>
                        </div>
                       <div class="col-md-6 c_from_date">
                              <div class="form-group">
                                <label>To Date</label>
                                <input type="date" class="form-control" name="to_date" placeholder="Enter Rating" required="required" value="<?php echo $info['to_date']; ?>">
                              </div>
                        </div>
                        <?php } ?>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour Number</label>
                                <input type="text" class="form-control" name="tour_number" id="tour_number" placeholder="Enter Tour Number" oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['tour_number']; ?>">
                                <input type="hidden" class="form-control" name="original_tour_number" id="original_tour_number" placeholder="Enter Tour Number" value="<?php echo $info['tour_number']; ?>">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour Title</label>
                                <input type="text" class="form-control" name="tour_title" id="tour_title" placeholder="Enter Tour Title" required="required" value="<?php echo $info['tour_title']; ?>">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Destinations</label>
                                <input type="text" class="form-control" name="destinations" id="destinations" placeholder="Enter Destinations" required="required" value="<?php echo $info['destinations']; ?>">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Rating</label>
                                <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating" min="1" max="5" required="required" value="<?php echo $info['rating']; ?>">
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Package Starting From Cost</label>
                            <input type="text" class="form-control" name="cost" id="cost" placeholder="Enter Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['cost']; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tour Number of Days</label>
                            <input type="text" class="form-control" name="tour_number_of_days" id="tour_number_of_days" placeholder="Enter Tour Number of Days" oninput="this.value = this.value.replace(/[^0-9a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['tour_number_of_days']; ?>">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Bording  Office/ Location</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select Bording  Office/ Location" style="width: 100%;" name="boarding_office[]" id="boarding_office" required="required">
                              <option value="">Select Boarding  Office/ Location</option>
                              <?php
                              $title = explode(',',$info['boarding_office']);
                              $c=count($title);
                                foreach($agent_data as $agent_info) 
                                { 
                                    for($i=0; $i<$c; $i++){
                                        $tid= $title[$i];
                                    }
                              ?>
                                <option value="<?php echo $agent_info['id']; ?>" <?php if(in_array($agent_info['id'], $title)) { echo "selected"; } ?>><?php echo $agent_info['booking_center']; ?></option>
                            <?php  } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label>hotel Type</label>
                              <select class="select_css" name="hotel_type" id="hotel_type" required>
                                <option value="">Select hotel type</option>
                                <?php foreach($hotel_type_info as $hotel_type_info_value){ ?> 
                                    <option value="<?php echo $hotel_type_info_value['id'];?>" <?php if(isset($info['hotel_type'])){if($hotel_type_info_value['id'] == $info['hotel_type']) {echo 'selected';}}?>><?php echo $hotel_type_info_value['hotel_type_name'];?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Zone Name</label>
                              <select class="select_css" name="zone_name" id="zone_name" required>
                                <option value="">Select zone</option>
                                <?php foreach($zone_info as $zone_info_value){ ?> 
                                    <option value="<?php echo $zone_info_value['id'];?>" <?php if(isset($info['zone_name'])){if($zone_info_value['id'] == $info['zone_name']) {echo 'selected';}}?>><?php echo $zone_info_value['zone_name'];?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Image</label><br>
                            <input type="file" name="image_name" id="image_name_package">
                            <br><span class="text-danger">Image height should be 530 & width should be 800.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                             
                            <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span>
                            <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span>
                            <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                        </div>
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Uploaded Image</label><br>
                          <?php if(!empty($info['image_name'])){ ?>
                                    <img src="<?php echo base_url(); ?>uploads/packages/<?php echo $info['image_name']; ?>" width="50%">
                                    <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                                    <?php } ?>
                        </div>
                      </div>



                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Itinerary PDF</label><br> 
                            <input type="file" name="pdf_name" id="pdf_name_package" accept="application/pdf" value="">
                            <br><span class="text-danger">PDF size should be less than 2MB.</span>
                            <br><span class="text-danger">Please upload only PDF files.</span>
                            <br><span class="text-danger" id="pdf_format" style="display:none;">You selected wrong file format.</span>
                             <br>
                             
                    <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span>
                    <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span>
                    <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded PDF</label><br>
                            <?php if(!empty($info['pdf_name'])){ ?>
                              <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/package_daywise_program/<?php echo $info['pdf_name']; ?>">Download</a>
                                      <input type="hidden" name="old_pdf_name" id="old_pdf_name" value="<?php if(!empty($info['pdf_name'])){echo $info['pdf_name'];}?>">
                                      <?php } ?>
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" maxlenght="70" placeholder="Enter Short Description" required="required" value="<?php echo $info['short_description']; ?>"><?php echo $info['short_description']; ?></textarea>
                            <span class="text-danger">Please enter upto 70 characters</span></br>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Image</label><br>
                            <input type="file" name="package_full_image" id="full_image_name">
                            <br><span class="text-danger">Image height should be 605 & width should be 1920.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                             
                    <span class="text-danger" id="full_img_width" style="display:none;">Image Width should be Minimum 1919 px To Maximum 1922px.</span>
                    <span class="text-danger" id="full_img_height" style="display:none;">Image Height should be Minimum 600 px To Maximum 406 px.</span>
                    <span class="text-danger" id="full_img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php if(!empty($info['package_full_image'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/package_full_image/<?php echo $info['package_full_image']; ?>" width="50%">
                                      <input type="hidden" name="old_new_name" id="old_new_name" value="<?php echo $info['package_full_image']; ?>" required="required">
                                      <?php } ?>
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Full Description / Overview</label>
                            <textarea class="form-control" name="full_description" id="full_description" required="required"><?php echo $info['full_description']; ?></textarea>
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Inclusion Image</label><br>
                            <input type="file" name="inclusion_img" id="inclusion_img">
                            <br><span class="text-danger">Image height should be 605 & width should be 1920.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                             
                          <span class="text-danger" id="full_img_width" style="display:none;">Image Width should be Minimum 1919 px To Maximum 1922px.</span>
                          <span class="text-danger" id="full_img_height" style="display:none;">Image Height should be Minimum 600 px To Maximum 406 px.</span>
                          <span class="text-danger" id="full_img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php if(!empty($info['inclusion_img'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/inclusion_img/<?php echo $info['inclusion_img']; ?>" width="50%">
                                      <input type="hidden" name="old_inclusion_name" id="old_inclusion_name" value="<?php echo $info['inclusion_img']; ?>" required="required">
                                      <?php } ?>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Terms & Conditions Image</label><br>
                            <input type="file" name="tc_img" id="tc_img">
                            <br><span class="text-danger">Image height should be 605 & width should be 1920.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                             
                          <span class="text-danger" id="full_img_width" style="display:none;">Image Width should be Minimum 1919 px To Maximum 1922px.</span>
                          <span class="text-danger" id="full_img_height" style="display:none;">Image Height should be Minimum 600 px To Maximum 406 px.</span>
                          <span class="text-danger" id="full_img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php if(!empty($info['tc_img'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/tc_img/<?php echo $info['tc_img']; ?>" width="50%">
                                      <input type="hidden" name="old_tc_name" id="old_tc_name" value="<?php echo $info['tc_img']; ?>" required="required">
                                      <?php } ?>
                          </div>
                      </div>

                      <!-- <div class="col-md-4">
                          <div class="form-group">
                            <label>Tour Dates Image</label><br>
                            <input type="file" name="tour_dates" id="tour_dates">
                            <br><span class="text-danger">Image height should be 605 & width should be 1920.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                             
                          <span class="text-danger" id="full_img_width" style="display:none;">Image Width should be Minimum 1919 px To Maximum 1922px.</span>
                          <span class="text-danger" id="full_img_height" style="display:none;">Image Height should be Minimum 600 px To Maximum 406 px.</span>
                          <span class="text-danger" id="full_img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php //if(!empty($info['tour_dates'])){ ?>
                                      <img src="<?php //echo base_url(); ?>uploads/tour_dates/<?php //echo $info['tour_dates']; ?>" width="50%">
                                      <input type="hidden" name="old_tour_dates_name" id="old_tour_dates_name" value="<?php //echo $info['tour_dates']; ?>" required="required">
                                      <?php //} ?>
                          </div>
                      </div> -->
                    
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
  
  <script>
    function sub(){
    document.getElementById('sub_main_tour_div1').style.display = 'block';
    }
    function main(){
    document.getElementById('sub_main_tour_div1').style.display = 'none';
    document.getElementById('main_tour_id').value = "";
    }
</script>