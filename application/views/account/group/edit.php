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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($qr_code_master_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_group">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" class="form-control" name="group_name" id="group_name" placeholder="Enter Group Name" value="<?php echo $info['group_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Parent Group</label>
                            <!-- <input type="text" class="form-control" name="parent_group" id="parent_group" placeholder="Enter Parent Name" value="<?php //echo $info['parent_group']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required"> -->
                            <select class="select_css" style="width: 100%;" name="parent_group" id="parent_group" required="required">
                            <option value="">Select group name</option>
                            <?php
                                foreach($arr_data_group as $arr_data_group_info) 
                                { 
                            ?>
                                <option value="<?php echo $arr_data_group_info['id']; ?>" <?php if($arr_data_group_info['id']==$info['parent_group']) { echo "selected"; } ?>><?php echo $arr_data_group_info['group_name']; ?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="form-control" name="get_group_code" id="get_group_code">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Code</label>
                            <input type="text" class="form-control" name="group_code" id="group_code" placeholder="Enter Group Code" value="<?php echo $info['group_code']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
