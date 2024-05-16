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
              &nbsp;&nbsp;
                <?php
                  foreach($packages as $packages_info) 
                  { 
                    ?>
                  <a href="<?php echo $module_url_path;?>/add_new_instruction/<?php echo $packages_info['id']; ?>" title="Add"><button class="btn btn-primary">Add New Instruction</button></a>
                <?php } ?>
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

              <form method="post" enctype="multipart/form-data" id="edit_instruction_TM">
                <div class="card-body">
                  <div class="row">
                        <input type="hidden" readonly class="form-control" name="tour_no" id="tour_no" placeholder="Enter tour number" value="<?php echo $arr_data_main['tour_no'] ?>" required="required">
                    <?php
                    foreach($arr_data2 as $info) 
                    { 
                      ?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tour Number - Name</label><br>
                        <input type="text" readonly class="form-control" name="tour_number" id="tour_number" placeholder="Enter tour number" value="<?php echo $arr_data_main['tour_number']; ?>" required="required">
                      </div>
                    </div>
                       
                    <input type="hidden" readonly class="form-control" name="tm_intr_attachment_id" id="tm_intr_attachment_id" value="<?php echo $arr_data3['id'] ?>" required="required">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Attachment</label><br>
                        <input type="file" name="image_name" id="att_image_name">
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                      </div>
                    </div>
                    
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Attachment</label><br>
                        <?php if(!empty($arr_data_main['image_name'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/tm_instraction/<?php echo $arr_data_main['image_name']; ?>" width="50%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $arr_data_main['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($arr_data_main['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tm_instraction/<?php echo $arr_data_main['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($arr_data_main['image_name'])){echo $arr_data_main['image_name'];}?>">
                        <?php } ?>
                      </div>
                    </div>

                    <?php } ?>

                  </div>  
                  
                  <div class="row" id="main_row">

                    <?php
                    foreach($arr_data as $info) 
                    { 
                      ?>
                      <input type="hidden" readonly class="form-control" name="tm_intr_id[]" id="tm_intr_id" placeholder="Enter tour number" value="<?php echo $info['id'] ?>" required="required">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Enter Instruction Point</label><br>
                        <textarea type="text" class="form-control" name="instraction[]" id="instraction" placeholder="Enter Instraction" required="required"><?php echo $info['instraction']; ?></textarea>
                      </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Priority</label><br>
                            <select class="select_css" name="priority[]" id="priority" required="required">
                            <option value="">Select</option>
                            <option value="high" <?php if(isset($info['priority'])){if("high" == $info['priority']) {echo 'selected';}}?>>High</option>
                            <option value="medium" <?php if(isset($info['priority'])){if("medium" == $info['priority']) {echo 'selected';}}?>>Medium</option>
                            <option value="low" <?php if(isset($info['priority'])){if("low" == $info['priority']) {echo 'selected';}}?>>Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 mt-4">
                      <div class="form-group">
                        <a onclick="return confirm('Are You Sure You Want To Delete This Record? ')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; ?>" title="delete"><button value="<?php echo $info['id']; ?>" class="btn btn-primary delete_instruction">Delete</button></a>
                      </div>
                    </div>

                    <?php } ?>

                    <!-- <div class="col-md-4 mt-4">
                      <div class="form-group">
                          <label></label>
                          <button type="button" class="btn btn-primary" name="submit" value="add_more" name="add_more_instraction" id="add_more_instraction">Add More Instraction Points</button>
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
  
