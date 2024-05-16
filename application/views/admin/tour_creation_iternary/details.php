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
              <a href="<?php echo $module_url_path; ?>/add/<?php echo $add_iternary_pack_id; ?>/<?php echo $add_iternary_total_days; ?>"><button class="btn btn-primary">Back</button></a>
              
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
            <?php
                   foreach($tour_creation_iternary as $info) 
                   { 
                    // print_r($info); die;
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                  <tr>
				          <th>Total Days</th>
                  <td><?php echo $info['total_days']; ?></td>

                  <th>Tour Number</th>
                  <td><?php echo $info['package_id']; ?></td>

                  </tr>
                  <tr>
                  <th>Day Number</th>
                  <td><?php echo $info['day_number']; ?></td>

                  <th>Select District</th>
                  <td><?php echo $info['dis']; ?></td>
                  </tr>

                  <tr>
                  <th>Upload Attachment</th>
                  <td>
                    <?php if(!empty($info['image_name'])){ ?>
                    <img src="<?php echo base_url(); ?>uploads/tour_creation_iternery_img/<?php echo $info['image_name']; ?>" width="30%">
                    <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                    <?php } ?>
                    <br>
                    <?php if(!empty($info['image_name'])){ ?>
                        <a class="btn-link pull-right text-center download_css" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_creation_iternery_img/<?php echo $info['image_name']; ?>">Download</a>
                        <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                    <?php } ?>
                  </td>

                  <th>Itinerary For Day</th>
                  <td><?php echo $info['iternary_desc']; ?></td>
                  </tr>
                </table>
              </div>
              
              <br>
              <div class="row">


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


    <?php
    // foreach($add_more_tour_creation_iternary as $info) 
    // { 
    // // print_r($info); die;
    ?>
    <?php if(!empty($add_more_tour_creation_iternary))
    { ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Place</th>
                    <th>Time</th>
                    <th>From Visit Time</th>
                    <th>To Visit Time</th>
                    <th>Details</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                   $i=1; 
                   foreach($add_more_tour_creation_iternary as $info)
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['city_place'] ?></td>
                    <td><?php echo $info['time'] ?></td>
                    <td><?php echo $info['from_visit_time'] ?></td>
                    <td><?php echo $info['to_visit_time'] ?></td>
                    <td><?php echo $info['details'] ?></td>
                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
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
    <?php } ?>
  </div>
  

</body>
</html>
