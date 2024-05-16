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
            <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button class="btn btn-primary">Back</button></a>          
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
                    <div class="row" id="main_row">
                   
                    </div>
                    
                    
                 <div class="row" id="main_row">
                      <div class="col-md-2">
                              <div class="form-group">
                                <label>Day Number</label>
                                <input type="text" class="form-control" name="day_number" id="day_number" value="<?php echo $info['day_number'];?>" placeholder="Enter Day Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                      </div>

                      <div class="col-md-10">
                             <div class="form-group">
                            <label>Privacy Policy <span class="text-danger">*</span></label>
                            <textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Privacy Policy" required="required"><?php echo $info['iternary_desc'];?></textarea>
                    </div>
                      </div>
                     
              </div>
              <div id="newFields"></div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:20%;">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
 
</body>


</html>
