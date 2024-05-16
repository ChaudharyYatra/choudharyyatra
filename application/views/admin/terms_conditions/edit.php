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
              <form method="post" enctype="multipart/form-data" id="edit_termscondition">
                <div class="card-body">
                  <div class="form-group">
                  <label>Terms Conditions <span class="text-danger">*</span></label>
                  <textarea class="form-control" name="terms_conditions" id="full_description" placeholder="Enter Terms Conditions" required="required" ><?php echo $info['terms_conditions']; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Upload PDF</label><br>
                    <input type="file" name="image_name" id="image_name_terms" accept="application/pdf" >
                    <br><span class="text-danger">Please upload only PDF files.</span>
                    <br><span class="text-danger" id="pdf_format" style="display:none;">You selected wrong file format.</span>
                  </div>
                  
                   <div class="form-group">
                    <label>Uploaded PDF</label><br>
                    <?php if(!empty($info['pdf'])){ ?>
                              <a class="btn-link pull-right text-center" download="" href="<?php echo base_url(); ?>uploads/terms_conditions/<?php echo $info['pdf']; ?>">Download</a>
                              <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['pdf']; ?>">
                              <?php } ?>
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
  