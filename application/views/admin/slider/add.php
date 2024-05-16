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
              <form method="post" enctype="multipart/form-data" id="sliderform">
                <div class="card-body">
                 
                  <!-- <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                  <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Sub Title" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                  </div> -->
                  <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="image_name" id="image_name" required="required" accept="image/*"> <br><span class="text-danger">Image height should be 1150 & width should be 1880.</span>
                    <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                    <br>
                    <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 1850 px To Maximum 1900 px.</span>
                    <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 1130 px To Maximum 1170 px.</span><br>
                    <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 