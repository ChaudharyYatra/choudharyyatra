<style>
  .underline{
    text-decoration: none;
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <div class="row">
      <?php 
            if($arr_data['assign_staff_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php echo base_url(); ?>tour_operation_manager/assign_staff/main_index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['assign_staff_count']; ?></h3>

                <p>Assign Staff Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>



          <?php 
            if($arr_data['final_booking_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php echo base_url(); ?>tour_operation_manager/final_booking_details/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['final_booking_count']; ?></h3>

                <p>Final Booking Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
        </div>
        <!-- /.row -->
    </div>
</section>
