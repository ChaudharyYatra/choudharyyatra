<style>
  .img-size{
/* 	padding: 0;
	margin: 0; */
	height: 500px;
	width: 100%;
	background-size: cover;
	overflow: hidden;
}
.modal-content {
   /* width: 700px; */
  border:none;
}
.modal-body {
   /* padding: 0; */
}

.carousel-control-prev-icon {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
	width: 30px;
	height: 48px;
}
.carousel-control-next-icon {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
	width: 30px;
	height: 48px;
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
                    <th>Agent Name - Boooking Center</th>
                    <th>Stationary Type</th>
                    <th>Image</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Stationary Remark</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                     ?>
                  <tr id="tableHolder">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['agent_name']; ?> - <?php echo $info['booking_center']; ?></td>
                    <td><?php echo $info['stationary_name']; ?></td>
                    <!-- <td><?php //echo $info['image_name']; ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image"></td>
                    <!-- <td><?php //if(!empty($info['image_name2'])){ echo $info['image_name2'];} ?></td> -->

                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code2/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>
                    
                    <!-- <td><?php //if(!empty($info['image_name3'])){ echo $info['image_name3'];} ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code3/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>

                    <td><?php echo $info['stationary_remark']; ?></td>

                    <!-- <td>
                      <a href="<?php //echo $module_url_path;?>/details/<?php //echo $info['id'];  ?>" ><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;
                    </td> -->
                    <?php if($info['enter_code']!=''){ ?>
                      <td>
                        <button class="btn bg-success btn-md" data-toggle="modal" data-target="#myModal1_<?php echo $info['id'] ?>">
                          Done
                        </button>
                      </td>
                    <?php } else if($info['is_hold']=='yes' && $info['superviser_id']!=$iid){ ?>
                      <td>
                        <button class="btn bg-danger btn-md newid" id="to_change" title="This Request Hold By <?php echo $info['supervision_name'] ?>" data-toggle="modal" >
                          Hold
                        </button>
                      </td>
                    <?php } else{ ?>
                      <td>
                        <button class="btn btn-primary btn-md newid" data-toggle="modal" attr_hold="<?php echo $info['id'] ?>" data-target="#myModal1_<?php echo $info['id'] ?>">
                          Allocate
                        </button>
                      </td>
                    <?php } ?>

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
<!-- modal -->
<div class="modal fade" id="myModal1_<?php echo $info['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h4 class="modal-title" id="myModalLabel">Send Code</h4>
        </div>
        <div class="modal-body">
           <!-- carousel -->
          <div
               id='carouselExampleIndicators_<?php echo $info['id'] ?>'
               class='carousel slide'
               data-ride='carousel'
               >
            <ol class='carousel-indicators'>
              <li
                  data-target='#carouselExampleIndicators_<?php echo $info['id'] ?>'
                  data-slide-to='0'
                  class='active'
                  ></li>
              <li
                  data-target='#carouselExampleIndicators_<?php echo $info['id'] ?>'
                  data-slide-to='1'
                  ></li>
              <li
                  data-target='#carouselExampleIndicators_<?php echo $info['id'] ?>'
                  data-slide-to='2'
                  ></li>
            </ol>
            <div class='carousel-inner' style="height:80vh;">
              <div class='carousel-item active'>
                <img class='img-size img-responsive' src='<?php echo base_url(); ?>uploads/stationary_request_code/<?php echo $info['image_name']; ?>' alt='First slide' />
              </div>
              <div class='carousel-item'>
                <img class='img-size img-responsive' src='<?php echo base_url(); ?>uploads/stationary_request_code2/<?php echo $info['image_name']; ?>' alt='Second slide' />
              </div>
              <div class='carousel-item'>
                <img class='img-size img-responsive' src='<?php echo base_url(); ?>uploads/stationary_request_code3/<?php echo $info['image_name']; ?>' alt='Second slide' />
              </div>
            </div>
            <a
               class='carousel-control-prev'
               href='#carouselExampleIndicators_<?php echo $info['id'] ?>'
               role='button'
               data-slide='prev'
               >
              <span class='carousel-control-prev-icon'
                    aria-hidden='true'
                    ></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a
               class='carousel-control-next'
               href='#carouselExampleIndicators_<?php echo $info['id'] ?>'
               role='button'
               data-slide='next'
               >
              <span
                    class='carousel-control-next-icon'
                    aria-hidden='true'
                    ></span>
              <span class='sr-only'>Next</span>
            </a>
          </div>

            <form method="post" action="<?php echo $module_url_path; ?>/edit" >
            <input type="hidden" class="form-control" name="sup_r_id" id="sup_r_id" value="<?php echo $info['id']; ?>">
            <?php if($info['enter_code']!=''){ ?>
              <input type="text" readonly class="form-control" name="enter_code" id="enter_code" placeholder="Enter Code" value="<?php echo $info['enter_code'] ?>" required>
            <?php } else{ ?>
              <input type="text" class="form-control" name="enter_code" id="enter_code" placeholder="Enter Code" value="<?php echo $info['enter_code'] ?>" required>
            <?php } ?>
        </div>
        
        <div class="modal-footer">
          <?php if($info['enter_code']!=''){ ?>
            <button type="submit" hidden class="btn btn-primary" name="send" value="send" id="send">Send</button>
          <?php } else{ ?>
            <button type="submit" class="btn btn-primary" name="send" value="send" id="send">Send</button>
          <?php } ?>
          <button type="button" attr_cancle_btn="<?php echo $info['id'] ?>" class="btn btn-default release" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
  
