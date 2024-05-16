<!-- <style>
  .table-color{
    background:#00899f80;
  }
  
</style> -->
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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
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
                    <th>Customer Name</th>
                    <th>Mobile No.</th>
                    <th>Enquiry Date</th>
					          <th>Follow Up Date</th>
                    <th>Follow Up Time</th>
                    <th>Next Follow Up Date</th>
                    <th>Follow Up Comment</th>
                    <!-- <th>Followup status?</th> -->
                    <!-- <th>Action</th> -->
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
                    <td><?php echo $info['first_name'] ?> <?php echo $info['last_name'] ?></td>
                    <td><?php echo $info['mobile_number'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($info['created_at'])); ?></td>
					          <td><?php echo date('d-m-Y', strtotime($info['follow_up_date'])); ?></td>
                    <td><?php echo $info['follow_up_time'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($info['next_followup_date'])); ?></td>
                    <td><?php echo $info['follow_up_comment'] ?></td>
                    <!-- <td>
                        <?php 
                        //if($info['is_followup_status']=='no')
                          {
                        ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_followup_status']; ?>"><button class="btn btn-danger btn-sm">No</button></a>
                        <?php //} else { ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_followup_status']; ?>"><button class="btn btn-success btn-sm">Yes</button> </a>
                        <?php } ?>
                    </td> -->
                    <!-- <td> -->
                    <!-- <a href="<?php //echo $module_url_path;?>/edit/<?php //echo $info['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php //echo $i; ?>" data-bs-whatever="Form"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp; -->
                      <!-- <a href="<?php //echo $module_url_path;?>/index/<?php //echo $info['id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Form"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                      <!-- <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php //echo $module_url_path;?>/delete/<?php //echo $info['id']; ?>" title="Delete"> <i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a> -->
                      <!-- <a href="<?php //echo $module_url_path;?>/index/<?php //echo $info['id']; ?>"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                    <!-- </td> -->
                    
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
  

</body>
</html>
