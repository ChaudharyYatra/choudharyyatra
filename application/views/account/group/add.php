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
              <form method="post" enctype="multipart/form-data" id="add_group">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" class="form-control" name="group_name" id="group_name" placeholder="Enter Group Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                      </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <label>Parent Group</label>
                            <input type="text" class="form-control" name="parent_group" id="parent_group" placeholder="Enter Parent Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required"> -->
                            <label>Parent Group</label>
                            <select class="select_css" style="width: 100%;" name="parent_group" id="parent_group">
                            <option value="">Select group name</option>
                            <?php
                                foreach($arr_data as $arr_data_info) 
                                { 
                                  // print_r($arr_data_info);
                            ?>
                                <option value="<?php echo $arr_data_info['id']; ?>"><?php echo $arr_data_info['group_name']; ?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="form-control" name="get_group_code" id="get_group_code">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Code</label>
                            <input type="text" class="form-control" name="group_code" id="group_code" placeholder="Enter Group Code" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
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
  
  <!-- <script>
    function update(){
      sel = document.getElementById("parent_group");
      display = document.getElementById("get_group_code");
      display.value = sel.value;
    }
  </script> -->

</body>
</html>
