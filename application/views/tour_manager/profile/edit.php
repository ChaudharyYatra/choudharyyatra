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
            <!-- <ol class="breadcrumb float-sm-right">
              <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
            </ol> -->
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
                   foreach($arr_data as $info) 
                   { 
                    
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_agentprofile">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tour Manager Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo $info['supervision_name']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" value="<?php echo $info['email']; ?>" required>
                        <span id="email_result"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Mobile Number" value="<?php echo $info['mobile_number1']; ?>" required>
                        <span id="email_result"></span>
                      </div>
                    </div>
                    
                    
                    
                    <!-- <div class="col-md-6">
                      <label>Photo</label>
                      <div class="form-group">
                        <input type="file" name="image_name" id="image_name" placeholder="Enter Photo" value="<?php echo $info['image_name']; ?>">
                        <span id="email_result"></span>
                        <br><span class="text-danger">Image height should be 530 & width should be 800.</span>
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                        <br>
                        <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span></br>
                        <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span></br>
                        <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                      </div>
                    </div> -->
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="btn_agent">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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