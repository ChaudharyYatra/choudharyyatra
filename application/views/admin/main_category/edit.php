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
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required="required" value="<?php echo $info['title']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Sub Title:</label>
                    <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Sub Title" required="required" value="<?php echo $info['sub_title']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" required="required" value="<?php echo $info['description']; ?>"><?php echo $info['description']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Upload Images:</label>
                    <input type="file" name="upload_image" id="upload_image" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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
  

</body>
</html>
