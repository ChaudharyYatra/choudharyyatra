<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>SN</th>
                    <th>Agent Name</th>
                    <th>Agent Region</th>
                    <th>Order Number</th>
                    <th>Request Date</th>
                    <th>Dispatch Date</th>
					  <th>View Receipt </th>
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
                    <td><?php echo $info['agent_name'] ?></td>
                    <td><?php echo $info['department'] ?></td>
                    <td><?php echo $info['order_no'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($info['created_at'])); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($info['dispatch_date'])); ?></td>
					  <td><button type="button" class="btn btn-primary" name="courier_receipt" id="courier_receipt" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $info['id'] ?>">View Receipt</button></td>
                    <!-- <td>
                        <?php 
                        //if($info['is_active']=='yes')
                          //{
                        ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php //} else { ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php //} ?>
                    </td> -->
                    <td>
                    <a href="<?php echo $module_url_path;?>/details/<?php echo $info['id'];?>" ><button type="button" class="btn btn-primary">View</button></a>
                      <!-- <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a href="<?php //echo $module_url_path;?>/details/<?php //echo $info['id'];?>" ><button class="dropdown-item">View</button></a>
                          <a href="<?php //echo $module_url_path;?>/edit/<?php //echo $info['id']; ?>" ><button class="dropdown-item">Edit</button></a>
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php //echo $module_url_path;?>/delete/<?php //echo $info['id']; ?>" title="Delete"><button class="dropdown-item">Delete</button></a>
                        </div>
                      </div> -->
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

 <!-- Modal -->
<?php  
                  
$i=1; 
foreach($arr_data as $info) 
{ 
  ?>
<div class="modal fade" id="exampleModal_<?php echo $info['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content modal-c">
      <div class="modal-header modal-h">
        <h5 class="modal-title" id="exampleModalLabel">Courier Receipt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <?php //echo $info['id'] ?> -->
        <?php if(!empty($info['courier_receipt'])) { ?>
          <img src="<?php echo base_url(); ?>uploads/courier_receipt/<?php echo $info['courier_receipt']; ?>" width="100%"/> 
        <?php } ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<?php } ?>
  

</body>
</html>
