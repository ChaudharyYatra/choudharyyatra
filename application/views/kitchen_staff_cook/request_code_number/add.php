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
              <form method="post" enctype="multipart/form-data" id="add_request_code">
                <div class="card-body">
                 <div class="row">
					 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Document Type <span class="req_field">*</span></label>
                        <select class="form-control niceSelect" name="stationary_type" id="stationary_type" onfocus='this.size=5;' onblur='this.size=1;' 
                              onchange='this.size=1; this.blur();' >
                            <option value="">Select Type</option>
                            <?php
                              foreach($stationary_data as $stationary_data_info){ 
                            ?>
                              <option value="<?php echo $stationary_data_info['id']; ?>"><?php echo $stationary_data_info['stationary_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
					 
                  <div class="col-md-6">
                    <label>Select image <span class="req_field">*</span></label>
                    <div class="form-group">
                      <input type="file" name="image_name" id="image_name">
                    </div>
                  </div>
					 
                  <div class="col-md-6">
                    <label>Select image2 (Optional)</label>
                    <div class="form-group">
                      <input type="file" name="image_name2" id="image_name2">
                    </div>
                  </div>

					        <div class="col-md-6">
                    <label>Select image3 (Optional)</label>
                    <div class="form-group">
                      <input type="file" name="image_name3" id="image_name3">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Remark (Optional)</label>
                        <textarea class="form-control" name="stationary_remark" id="stationary_remark" placeholder="Enter stationary remark"></textarea>
                    </div>
                  </div>
                      
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
  

</body>
</html>
