<style>
  .card_title {
    /* display: inline-block; */
    width: 50px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
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
              <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card">
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">Add Slider Content</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  
                  if(count($arr_data) > 0 ) 
                   {
                       ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
					<th>Tour Details</th>
					<th>Tour Date</th>
                    <th>uploaded Image</th>
                    <th>Customer Feedback</th>
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
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
					<td><?php echo date("d-m-Y",strtotime($info['journey_date'])); ?></td>
                    <td>
                      <img src="<?php echo base_url(); ?>uploads/feedback_photo/<?php echo $info['image_name']; ?>" width="70px;" height="70px;" alt="Slider Image">

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/feedback_photo/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>
                    </td>
                    <td><?php echo $info['feedback'] ?></td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                 <?php } else
                {echo '<div class="alert alert-danger alert-dismissable">
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
