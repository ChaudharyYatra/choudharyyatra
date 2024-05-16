<style>
    .itinerary_css{
        text-decoration:none !important;
        color:white;
    }
    .itinerary_css:hover{
        /* text-decoration:none !important; */
        color:white;
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
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
              
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
                    <th>Package Type</th>
                    <th>Tour Title</th>
                    <th>Journey Date</th>
                    <th>Tour Status</th>
                    <!-- <th>Is Active?</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <?php if($info['package_type']!="Special Limited Offer"){
                      ?>
                    <td><?php echo $info['package_type'] ?></td>
                    <?php }else{
                      ?>
                      <td>Special Limited Offer</td>
                    <?php } ?>
					
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <?php if($info['journey_date']!=''){?>
                    <td><?php echo date("d-m-Y",strtotime($info['journey_date'])); ?></td>
                    <?php } else {?>
                      <td> --- </td>
                      <?php }?>

                    <?php 
                    $today= date('Y-m-d');
                    if($info['journey_date'] > $today) {?>
                      <td> upcoming Tour </td>
                    <?php } else if($info['journey_date'] == $today){
                      ?>
                    <td> Running Tour </td>
                    <?php 
                     } else{
                    ?>
                    <td> Done Tour </td>
                     <?php } ?>
                    

                     <td>
                        <button class="btn btn-primary">
                            <a href="<?php echo $module_url_take_attendance;?>/take_attendance/<?php $aid=base64_encode($info['package_id']); 
                                    echo rtrim($aid, '='); ?>/<?php $did=base64_encode($info['did']); 
                                    echo rtrim($did, '='); ?>" class="itinerary_css">Attendance</button></a>
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
  

</body>
</html>
