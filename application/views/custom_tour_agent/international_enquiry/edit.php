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
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($arr_data as $info) 
                  //  print_r($arr_data); die;
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="custom_edit_internationalenquiry">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name</label><br>
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" value="<?php echo $info['first_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last Name</label><br>
                          <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo $info['last_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $info['email']; ?>" placeholder="Enter Email" pattern="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label>Mobile number </label>
                        <input type="text"  class="form-control" name="mobile_number" id="mobile_number" value="<?php echo $info['mobile_number']; ?>" maxlength="10" minlength="10" placeholder="Enter mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label>WhatsApp Mobile number</label>
                        <input type="text" class="form-control" placeholder="WhatsApp Mobile Number" name="wp_mobile_number" id="wp_mobile_number" value="<?php echo $info['wp_mobile_number']; ?>" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender </label> <br>
                                &nbsp;&nbsp;<input type="radio" name="gender" id="male" value="Male" <?php if(isset($info['gender'])){if($info['gender']=='Male') {echo'checked';}}?>>&nbsp;&nbsp;Male
                                &nbsp;&nbsp;<input type="radio" name="gender" id="female" value="Female" <?php if(isset($info['gender'])){if($info['gender']=='Female') {echo'checked';}}?>>&nbsp;&nbsp;Female <br>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Number-Name</label>
                                <select class="form-control" class="niceSelect" data-placeholder="Select tour" style="width: 100%;" name="tour_number" required="required">
                                    <option value="">Select Tour</option>
                                    <?php foreach($packages_data as $packages_data_value) { ?>
                                        <!-- <option value="<?php //echo $packages_data_value['id'];?>"><?php //echo $packages_data_value['tour_number'];?> -  <?php //echo $packages_data_value['tour_title'];?></option> -->
                                        <option value="<?php echo $packages_data_value['id'];?>" <?php if(isset($info['package_id'])){if($packages_data_value['id'] == $info['package_id']) {echo 'selected';}}?>><?php echo $packages_data_value['tour_number'];?> - <?php echo $packages_data_value['tour_title'];?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Media Source</label>
                                <select class="form-control" class="niceSelect" name="media_source_name" id="media_source_name">
                                    <option value="">Media Source</option>
                                    <?php foreach($media_source_data as $media_source_info){ ?> 
                                        <!-- <option value="<?php //echo $media_source_info['id'];?>"><?php //echo $media_source_info['media_source_name'];?></option> -->
                                        <option value="<?php echo $media_source_info['id']; ?>" <?php if(isset($info['media_source_name'])){if($media_source_info['id'] == $info['media_source_name']) {echo 'selected';}}?> ><?php echo $media_source_info['media_source_name']; ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                      </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                  <!-- <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button>  -->
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
