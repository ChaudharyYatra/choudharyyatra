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
                   { 
                    // print_r($arr_data); die;
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_bookingenquiry">
                <div class="card-body">
                <div class="row">
					          <div class="col-md-6">
                          <div class="form-group">
                            <label>Mr / Mrs</label><br>
                            <select class="select_css" name="mrandmrs" id="mrandmrs">
                              <option value="">select Mr / Mrs</option>
                              <option value="Mr" <?php if(isset($info['MrandMrs'])){if("Mr" == $info['MrandMrs']) {echo 'selected';}}?>>Mr</option>
                              <option value="Mrs" <?php if(isset($info['MrandMrs'])){if("Mrs" == $info['MrandMrs']) {echo 'selected';}}?>>Mrs</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" style="text-transform: capitalize;" name="first_name" id="first_name" placeholder="Enter First Name" value="<?php echo $info['first_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" style="text-transform: capitalize;" name="last_name" id="last_name" placeholder="Enter Last Name" value="<?php echo $info['last_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile number</label>
                                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" value="<?php echo $info['mobile_number']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                        </div>
					              <div class="col-md-6">
                              <div class="form-group">
                                <label>Whatsapp Mobile number</label>
                                <input type="text" class="form-control" name="wp_mobile_number" id="wp_mobile_number" placeholder="Enter Whatsapp Mobile Number" value="<?php echo $info['wp_mobile_number']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Enter Email Address" value="<?php echo $info['email']; ?>">
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
                                <label>Media source</label>
                                  <select class="form-control niceSelect" name="media_source_name" id="media_source_name" onfocus='this.size=3;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                      <option value="">Select media source</option>
                                      <?php
                                        foreach($media_source_data as $media_source_info){ 
                                      ?>
                                        <option value="<?php echo $media_source_info['id']; ?>" <?php if(isset($info['media_source_name'])){if($media_source_info['id'] == $info['media_source_name']) {echo 'selected';}}?> ><?php echo $media_source_info['media_source_name']; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                      </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tour Number-Name</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select Tour" style="width: 100%;" name="tour_number[]" id="tour_number" required="required">
                              <option value="">Select tour</option>
                              <?php
                              $title = $temparray=explode(',',$info['package_id']);
                              $c=count($title);
                                foreach($packages_data as $packages_data_value) 
                                { 
                                    for($i=0; $i<$c; $i++){
                                        $tid= $title[$i];
                                    }
                              ?>
                                <option value="<?php echo $packages_data_value['id']; ?>" <?php if(in_array($packages_data_value['id'], $title)) { echo "selected"; } ?>><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                            <?php  } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6" id="other_tour_name_div" style='display:none;'>
                              <div class="form-group">
                                <label>Enquiry Destination Name</label>
                                <input type="text" class="form-control" name="other_tour_name" id="other_tour_name" placeholder="Enter destination name" value="<?php echo $info['other_tour_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                        </div>
				                <div class="col-md-4">
                          <div class="form-group">
                            <label>Enter Seat Count</label>
                            <input type="text" class="form-control" name="enq_seat_count" id="enq_seat_count" placeholder="Enter seat count" value="<?php echo $info['seat_count']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                          </div>
                        </div>
                        <!-- <div class="col-md-6 mb-2">
                          <label class="col-form-label">Followup Date:</label> 
                          <input type="date" class="form-control" name="followup_date" id="followup_date" min="<?php //echo date("Y-m-d"); ?>" value="<?php //if(isset($info['followup_date'])){ echo $info['followup_date'];}?>" >
                        </div> -->

             

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
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
  

