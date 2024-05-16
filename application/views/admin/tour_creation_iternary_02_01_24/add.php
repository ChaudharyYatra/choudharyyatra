<style>
        /* Add custom CSS for the accordion */
        .rotate-icon {
            transition: transform 0.3s ease;
        }
        .rotate-icon.collapsed {
            transform: rotate(-90deg);
        }

        .card-header{
        background-color: #cd85a8de;
        }
        .btn-link{
          color: #fff;
          font-weight: bold;
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
              
              <!-- <form id="form_123" method="post" enctype="multipart/form-data"> -->
                <div class="card-body">
                    <div class="row" id="">
                    
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Days</label>
                                <input type="text" class="form-control" name="total_days" id="tour_creation_total_days" placeholder="Enter Total Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                      </div>
                    </div>
                    <div id="accordion">
                        <!-- Dynamically generated fields will be placed here -->
                    </div>
                    
                    
                    <!-- <div class="row" id="main_row">
                    </div> -->
                     
                </div>
                <div id="Tourcreation_newFields"></div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:10%;">Submit</button> -->
					        <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
            </div>
              <!-- </form> -->
            
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

