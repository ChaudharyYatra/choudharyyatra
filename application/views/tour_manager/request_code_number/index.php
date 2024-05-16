<style>
  .a_text{
    text-decoration: none;
  }
  .take_followup_btn{
    padding: 3%;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Document Type</th>
                    <th>Image</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Remark</th>
                    <th>Code</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['stationary_name']; ?></td>
                    <!-- <td><?php //echo $info['image_name']; ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image"></td>
                    <!-- <td><?php //if(!empty($info['image_name2'])){ echo $info['image_name2'];} ?></td> -->

                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code2/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>
                    
                    <!-- <td><?php //if(!empty($info['image_name3'])){ echo $info['image_name3'];} ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code3/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>

                    <td><?php echo $info['stationary_remark']; ?></td>
                    
                    <td><?php echo $info['enter_code']; ?></td>

                    <td>
                      <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['id'];  ?>" ><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                      <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                    </td>
                    
                    

                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
                <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
              </div>' ; } ?>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


