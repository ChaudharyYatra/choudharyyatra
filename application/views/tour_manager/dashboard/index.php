<style>
  .underline{
    text-decoration: none !important;
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
        <div class="row">
          <?php 
            if($arr_data['tour_expenses_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php echo base_url(); ?>tour_manager/tour_expenses/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['tour_expenses_count']; ?></h3>

                <p>Tour Expenses Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['suggestion_data_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php echo base_url(); ?>tour_manager/suggestion_module/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $arr_data['suggestion_data_count']; ?></h3>

                <p>Suggestion Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
          <?php } ?>

          <!-- <?php 
            //if($arr_data['todays_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php //echo base_url(); ?>agent/booking_enquiry/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color:white;"><?php //echo $arr_data['todays_enquiry_count']; ?></h3>

                <p style="color:white;">Todays Domestic Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
          <?php //} ?> -->
          
          <!-- <?php 
            //if($arr_data['internatinal_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a class="underline" href="<?php //echo base_url(); ?>agent/international_booking_enquiry/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php //echo $arr_data['internatinal_enquiry_count']; ?></h3>

                <p>Todays International Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>  
          </div>
          <?php //} ?> -->

          

        </div>
        <!-- /.row -->
    </div>
    
<form method="post">
  <input type="hidden" name="enquiry_login_count" id="enquiry_login_count" value="<?php echo $this->session->userdata('agent_login_count');?>">
</form>
   

</section>
