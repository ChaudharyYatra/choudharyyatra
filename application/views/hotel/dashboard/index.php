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
            if($arr_data['hotel_room'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php echo base_url(); ?>hotel/hotel_details/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['hotel_room']; ?></h3>

                <p>Total Room Count</p>
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
            <a class="underline" href="<?php echo base_url(); ?>hotel/final_booking_details/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['final_booking_count']; ?></h3>

                <p>final booking count</p>
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
