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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>stationary/stationary_request/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $stationary_order_count; ?></h3>

                <p>Total Stationary Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>stationary/stationary_request/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $stationary_order_today_count; ?></h3>

                <p>Today's Stationary Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
       
          

        </div>
        <!-- /.row -->
    </div>
</section>
