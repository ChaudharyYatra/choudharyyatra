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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php 
            if($arr_data['enquiry_count_total'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/booking_enquiry/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['enquiry_count_total']; ?></h3>

                <p>Total Domestic Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['international_enquiry_data_total'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/international_booking_enquiry/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $arr_data['international_enquiry_data_total']; ?></h3>

                <p>Total International Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
          <?php } ?>

          <?php 
            if($arr_data['todays_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/international_booking_enquiry/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $arr_data['todays_enquiry_count']; ?></h3>

                <p>Todays Domestic Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
          <?php } ?>
          
          <?php 
            if($arr_data['internatinal_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $arr_data['internatinal_enquiry_count']; ?></h3>

                <p>Todays International Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>  
          </div>
          <?php } ?>

        </div>
        <!-- /.row -->
    </div>
    
<form method="post">
  <input type="hidden" name="enquiry_login_count" id="enquiry_login_count" value="<?php echo $this->session->userdata('agent_login_count');?>">
</form>
   

<!-- Modal -->
<div class="modal fade" id="agent_change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" class="danger">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Do you want to Change Password ?
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url(); ?>agent/change_password/change_password"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yes</button></a>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >NO</button>
      </div>
    </div>
  </div>
</div>

</section>
