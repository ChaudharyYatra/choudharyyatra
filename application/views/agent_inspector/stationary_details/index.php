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
                    <!-- <th>Agent Center</th> -->
                    <th>Request Date</th>
                    <th>Dispatch Date</th>
                    <th>Action</th>
                    <th>View Receipt </th>
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
                    <!-- <td><?php //echo $info['booking_center'] ?></td> -->
                    <td><?php echo date("d-m-Y",strtotime($info['created_at'])); ?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['dispatch_date'])); ?></td>
                    <td>
                    <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); echo rtrim($aid, '='); ?>
" ><button type="button" class="btn btn-primary">View</button></a>
                     
                    </td>

                    <td>
                    <button type="button" class="btn btn-primary" name="courier_receipt" data-toggle="modal" id="courier_receipt" data-target="#exampleModal_<?php echo $info['id'];?>
">
                      View Receipt
                    </button>
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
      <div class="modal" id="exampleModal_<?php echo $info['id'] ?>">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content modal-c">
      
        <!-- Modal Header -->
        <div class="modal-header modal-h">
          <h4 class="modal-title">Courier Receipt</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php if(!empty($info['courier_receipt'])) { ?>
                <img src="<?php echo base_url(); ?>uploads/courier_receipt/<?php echo $info['courier_receipt']; ?>" width="100%"/> 
          <?php } ?>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>
    <?php } ?>

     <!-- The Modal -->
  
  

</body>
</html>
