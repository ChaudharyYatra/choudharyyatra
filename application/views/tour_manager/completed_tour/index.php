<style>
    .itinerary_css{
        text-decoration:none !important;
        color: white;
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
                    if($info['tour_status'] =='yes') {?>
                      <td>Completed Tour</td>
                     <?php }else{ ?>
                      <td>Running Tour</td>
                      <?php } ?>

                     <td>
                        <?php 
                        if($info['tour_status']=='yes')
                          {
                        ?>
                        <button class="btn btn-success btn-sm" disabled><a class="itinerary_css" href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							            echo rtrim($aid, '=').'/'.$info['tour_status']; ?>">Completed Tour</a></button>
                        <?php } else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							            echo rtrim($aid, '=').'/'.$info['tour_status']; ?>"><button class="btn btn-danger btn-sm">Complete Tour</button></a>
                        <?php } ?>
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
