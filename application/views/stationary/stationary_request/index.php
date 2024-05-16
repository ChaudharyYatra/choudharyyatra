<style>
  #imageModalBody, #imageModalBody .img-fluid{
    max-width: 1300px;
    min-width: 250px;
    min-height: 250px;
}
#imageModalBody .img-fluid {
    transform-origin: top left;
    -webkit-transform-origin: top left;
    -ms-transform-origin: top left;
}
#imageModalBody.rotate90 .img-fluid {
    transform: rotate(90deg) translateY(-100%);
    -webkit-transform: rotate(90deg) translateY(-100%);
    -ms-transform: rotate(90deg) translateY(-100%);
}
#imageModalBody.rotate180 .img-fluid {
    transform: rotate(180deg) translate(-100%, -100%);
    -webkit-transform: rotate(180deg) translate(-100%, -100%);
    -ms-transform: rotate(180deg) translateX(-100%, -100%);
}
#imageModalBody.rotate270 .img-fluid {
    transform: rotate(270deg) translateX(-100%);
    -webkit-transform: rotate(270deg) translateX(-100%);
    -ms-transform: rotate(270deg) translateX(-100%);
}
.rotate-left{
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 512 512'%3E%3Cpath d='M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z'/%3E%3C/svg%3E");
}
.rotate-right{
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 512 512'%3E%3Cpath d='M500.333 0h-47.411c-6.853 0-12.314 5.729-11.986 12.574l3.966 82.759C399.416 41.899 331.672 8 256.001 8 119.34 8 7.899 119.526 8 256.187 8.101 393.068 119.096 504 256 504c63.926 0 122.202-24.187 166.178-63.908 5.113-4.618 5.354-12.561.482-17.433l-33.971-33.971c-4.466-4.466-11.64-4.717-16.38-.543C341.308 415.448 300.606 432 256 432c-97.267 0-176-78.716-176-176 0-97.267 78.716-176 176-176 60.892 0 114.506 30.858 146.099 77.8l-101.525-4.865c-6.845-.328-12.574 5.133-12.574 11.986v47.411c0 6.627 5.373 12 12 12h200.333c6.627 0 12-5.373 12-12V12c0-6.627-5.373-12-12-12z'/%3E%3C/svg%3E");
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
                    <th>Office Name - Address</th>
                    <th>Order Number</th>
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
                    <td><?php echo $info['fld_agency_name'] ?> - <?php echo $info['fld_office_address'] ?></td>
                    <td><?php echo $info['order_no'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($info['created_at'])); ?></td>
                    <td>
                    <?php 
                        if($info['dispatch_date']!="")
                          {
                        ?>
                      <?php echo date('d-m-Y', strtotime($info['dispatch_date'])); ?>
                    <?php } else { ?>
                      <P>Not Dispatch</p>
                      <?php } ?>
                    </td>
                    <td>
                      <a href="<?php echo $module_url_path;?>/details/<?php echo $info['id'];?>" ><button type="button" class="btn btn-primary">View</button></a>
                    </td>
                    <td><button type="button" class="btn btn-primary" name="courier_receipt" id="courier_receipt" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $info['id'] ?>">View Receipt</button></td>

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
        <button type="button" onclick="zoomin()"> Zoom In</button>
        <button type="button" onclick="zoomout()"> Zoom Out</button>
        <span class="fa fa-rotate-left rotate-left" title="Rotate Left"></span><span class="fa fa-rotate-right rotate-right" title="Rotate Right"></span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body main">
        <div id="imageModalBody" data-rotation="0" class="rotate0">
          <?php if(!empty($info['courier_receipt'])) { ?>
            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/courier_receipt/<?php echo $info['courier_receipt']; ?>" width="100%" id="img"/> 
          <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
  

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</body>
</html>
