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
            <?php
                   foreach($arr_data as $info) 
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
                <table class="table table-bordered table-hover">
                  <!-- id="example2" this id removr mobile view problem -->
                  <tr>
					          <th>Full Name</th>
                    <td><?php echo $info['full_name']; ?></td>
					          <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>
                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>

                  </tr>
                  
                  <tr>
                    <?php if($info['package_id']=='Other'){?>
                      <th>Tour Name</th>
                      <td><?php echo $info['package_id']; ?> - <?php echo $info['other_tour_name']; ?></td>
                    <?php } else{ ?>
                      <th>Tour No</th>
                      <td><?php echo $info['package_id']; ?> - <?php echo $info['tour_title']; ?></td>
                    <?php } ?>
                      
                    <th>Check In Date</th>
                    <td><?php echo $info['checkin_date']; ?></td>
					  
                    <th>Check Out Date</th>
                    <td><?php echo $info['checkout_date']; ?></td>

                  </tr>

                  <tr>
                    <th>Number of Nights</th>
                    <td><?php echo $info['no_of_nights']; ?></td>
					  
                    <th>Hotel Type</th>
                    <td><?php echo $info['hotel_type']; ?></td>

                    <th>No Of Couple</th>
                    <td><?php echo $info['no_of_couple']; ?></td>
                  </tr>

                  <tr>
                    <?php if($info['meal_plan']=='Other'){?>
                      <th>Meal Plan</th>
                      <td><?php echo $info['meal_plan']; ?> - <?php echo $info['other_meal_plan']; ?></td>
                    <?php } else{ ?>
                      <th>Meal Plan</th>
                      <td><?php echo $info['meal_plan_name']; ?></td>
                    <?php } ?>
                    
                    
					  
                    <th>Total Adult</th>
                    <td><?php echo $info['total_adult']; ?></td>

                    <th>Total Child With Bed</th>
                    <td><?php echo $info['total_child_with_bed']; ?></td>
                  </tr>

                  <tr>
                    <th>Total Child Without Bed</th>
                    <td><?php echo $info['total_child_without_bed']; ?></td>
					  
                    <?php if($info['vehicle_type']=='Other'){?>
                      <th>Select Vehicle Type</th>
                      <td><?php echo $info['vehicle_type']; ?> - <?php echo $info['other_vehicle_name']; ?></td>
                    <?php } else{ ?>
                      <th>Select Vehicle Type</th>
                      <td><?php echo $info['vehicle_type_name']; ?></td>
                    <?php } ?>

                    
                    <?php if($info['vehicle_type']=='Other'){?>
                      <th>Pick Up From</th>
                      <td><?php echo $info['pick_up_from']; ?> - <?php echo $info['other_pickup_from_name']; ?></td>
                    <?php } else{ ?>
                      <th>Pick Up From</th>
                      <td><?php echo $info['pick_up_name']; ?></td>
                    <?php } ?>

                    
                  </tr>

                  <tr>
                    <th>Pickup Allo. Date</th>
                    <td><?php echo $info['pickup_date']; ?></td>
					  
                    <th>Pick Up Time</th>
                    <td><?php echo $info['pickup_time']; ?></td>

                    <?php if($info['drop_to']=='Other'){?>
                      <th>Drop to</th>
                      <td><?php echo $info['drop_to']; ?> - <?php echo $info['other_drop_to_name']; ?></td>
                    <?php } else{ ?>
                      <th>Drop to</th>
                      <td><?php echo $info['drop_to_name']; ?></td>
                    <?php } ?>

                    
                  </tr>

                  <tr>
                    <th>Drop Allocation Date</th>
                    <td><?php echo $info['drop_date']; ?></td>
					  
                    <th>Drop Time</th>
                    <td><?php echo $info['drop_time']; ?></td>

                    <th>Special Note</th>
                    <td><?php echo $info['special_note']; ?></td>
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
  </div>
  

</body>
</html>
