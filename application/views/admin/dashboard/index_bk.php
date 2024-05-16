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
            if($arr_data['package_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['package_count']; ?></h3>
              <p>Domestic Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->


          <?php 
            if($arr_data['package_mapping_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/package_mapping/index">
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo  $arr_data['package_mapping_count']; ?></h3>
              <p>Main Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          
          <?php 
            if($arr_data['international_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/international_packages/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $arr_data['international_count']; ?></h3>
                <p>International Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['agent_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/agent/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo  $arr_data['agent_count']; ?></h3>

                <p>Total Agents</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/contact_us/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $arr_data['enquiry_count']; ?></h3>
                <p>Contact Us</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['enquiry_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/client_reviews/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['reviews_count']; ?></h3>
                <p>Client Reviews</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $total_enquiry_count; ?></h3>
                <p>Total Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            
          </div>

          <!-- ./col -->



          <?php 
            //if($arr_data['todays_new_domestic_enquiry_count'] >0 ){

          ?> 
          <!-- <div class="col-lg-3 col-6">
            <a href="<?php //echo base_url(); ?>admin/booking_enquiry/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php //echo  $arr_data['todays_new_domestic_enquiry_count']; ?></h3>
                <p>Todays New Domestic Enquiry </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php //} ?> -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
    </div>
</section>
