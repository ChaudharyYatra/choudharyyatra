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
              
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row" id="">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Total Days</label>
                          <input type="text" class="form-control" name="total_days_hotel" id="total_days_hotel" placeholder="Enter Total Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                      </div>
                  </div>
                  <table class="table table-bordered" style="width:100%" id="traveller_table_add">
                    <thead>
                      <tr>
                        <th>Day Number</th>
                        <th>Select State</th>
                        <th>Select City</th>
                        <th>Select Hotel</th>
                        <th>Short Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="" id="main_row_hotel">
                    </tbody>
                  </div>
                  <div id="newFields"></div>
              </table>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:10%;">Submit</button>
					          <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" name="abc">Cancel</button></a>
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

