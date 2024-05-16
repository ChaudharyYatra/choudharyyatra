<style>
    .scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	width: 93%;
	/* background: #F5F5F5; */
	overflow-y: scroll;
	margin-bottom: 25px;
}

.force-overflow
{
	min-height: 350px;
}
/*
 *  STYLE 3
 */

 #style-3::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

#style-3::-webkit-scrollbar-thumb
{
	background-color: #000000;
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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 col-sm-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
                
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                 <?php
                   foreach($package_data as $package_data_info) 
                   { 
                     ?>
                  <tr>
                    <th>Tour Name</th>
                    <td><?php echo $package_data_info['tour_number']; ?> - <?php echo $package_data_info['tour_title']; ?></td>

                    <th>Journey Date</th>
                    <td><?php echo date("d-m-Y",strtotime($package_data_info['journey_date'])); ?></td>
                      
                  </tr>
                  <?php } ?>

                  <!-- 
                  <?php
                   //foreach($arr_data as $arr_data_info) 
                   //{ 
                     ?>
                  <tr>
                  <th>Day</th>
                    <td><?php //echo $arr_data_info['day_number']; ?></td>

                    <th>Daywise Itinerary</th>
                    <td><?php //echo $arr_data_info['iternary_desc']; ?></td>
                  </tr>
                  <?php //} ?> -->


                    
                  </table>
                    <br>
                    
                  <?php if($arr_data[0]['iternary_desc']!= '') {?>
                    <div class="scrollbar" id="style-3">
                    <div class="force-overflow">
                  <?php
                   foreach($arr_data as $arr_data_info) 
                   { 
                     ?>
                    
                    <div class="col-md-12">
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Day <?php echo $arr_data_info['day_number']; ?></h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-6 mt-1" style="text-align: justify;">
                                    <?php echo $arr_data_info['iternary_desc']; ?>
                                  </div>
                                  <div class="col-md-6 text-center">
                                    <img src="<?php echo base_url(); ?>uploads/package_iternary/<?php echo $arr_data_info['image_name']; ?>" width="100%;" height="70%;" alt="Slider Image">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                   
                   <?php } ?>
              </div>
              </div>
                <?php } ?>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  