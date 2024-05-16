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
             
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if(count($hotel_allocated_room_data) > 0 ) 
                { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th>SN</th> -->
                    <th>Room Type</th>
                    <th>Room Number</th>
                    <th>Room Occupancy</th>
                    <th>Bed Type</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                  //  foreach($hotel_allocated_room_data as $info) 
                  //  { 
                    // print_r($info); die;
                     ?>
                  
                    
                    
                    <?php 
                    
                        $quali1=array();
                        $one_bed_AC = $hotel_allocated_room_data['one_bed_AC'];
                        $quali1 = explode(',',$one_bed_AC);

                        $quali2=array();
                        $two_bed_AC = $hotel_allocated_room_data['two_bed_AC'];
                        $quali2 = explode(',',$two_bed_AC);

                        $quali3=array();
                        $three_bed_AC = $hotel_allocated_room_data['three_bed_AC'];
                        $quali3 = explode(',',$three_bed_AC);

                        $quali4=array();
                        $four_bed_AC = $hotel_allocated_room_data['four_bed_AC'];
                        $quali4 = explode(',',$four_bed_AC);

                        $quali5=array();
                        $one_bed_Non_AC = $hotel_allocated_room_data['one_bed_Non_AC'];
                        $quali5 = explode(',',$one_bed_Non_AC);

                        $quali6=array();
                        $two_bed_Non_AC = $hotel_allocated_room_data['two_bed_Non_AC'];
                        $quali6 = explode(',',$two_bed_Non_AC);

                        $quali7=array();
                        $three_bed_Non_AC = $hotel_allocated_room_data['three_bed_Non_AC'];
                        $quali7 = explode(',',$three_bed_Non_AC);

                        $quali8=array();
                        $four_bed_Non_AC = $hotel_allocated_room_data['four_bed_Non_AC'];
                        $quali8 = explode(',',$four_bed_Non_AC);

                        // print_r($quali1); die;

                        if(!empty($quali1)){

                          for($i=0;$i<count($quali1);$i++){
                            $room_id=$quali1[$i];
                            $query = $this->db->query("select * from hotel_room where id=$room_id");
                            $Result_data = $query->row();
                            // print_r($Result_data); die;
                          
                    ?>

                  <tr>

                    
                    <td>
                      <?php echo $Result_data->room_type ?>
                    </td>
                    <td>
                      <?php echo $Result_data->room_number ?>
                    </td>
                    <td>
                      <?php echo $Result_data->occupancy ?>
                    </td>
                    <td>
                      <?php echo $Result_data->bed_type ?>
                    </td>
                    
                    
                  </tr>
                  
                  <?php }  } 

                      if(!empty($quali5)){

                        for($i=0;$i<count($quali5);$i++){
                          $room_id=$quali5[$i];
                          $query = $this->db->query("select * from hotel_room where id=$room_id");
                          $Result_data = $query->row();
                  
                  ?>

                      <tr>

                      
                      <td>
                        <?php echo $Result_data->room_type ?>
                      </td>
                      <td>
                        <?php echo $Result_data->room_number ?>
                      </td>
                      <td>
                        <?php echo $Result_data->occupancy ?>
                      </td>
                      <td>
                        <?php echo $Result_data->bed_type ?>
                      </td>


                      </tr>

                  <?php } }

                    if(!empty($quali2)){

                      for($i=0;$i<count($quali2);$i++){
                        $room_id=$quali2[$i];
                        $query = $this->db->query("select * from hotel_room where id=$room_id");
                        $Result_data = $query->row();

                  ?>    

                    <tr>

                                          
                    <td>
                      <?php echo $Result_data->room_type ?>
                    </td>
                    <td>
                      <?php echo $Result_data->room_number ?>
                    </td>
                    <td>
                      <?php echo $Result_data->occupancy ?>
                    </td>
                    <td>
                      <?php echo $Result_data->bed_type ?>
                    </td>


                    </tr>

                    <?php } } 

                      if(!empty($quali6)){

                        for($i=0;$i<count($quali6);$i++){
                          $room_id=$quali6[$i];
                          $query = $this->db->query("select * from hotel_room where id=$room_id");
                          $Result_data = $query->row();
                    ?>

                      <tr>

                                            
                      <td>
                        <?php echo $Result_data->room_type ?>
                      </td>
                      <td>
                        <?php echo $Result_data->room_number ?>
                      </td>
                      <td>
                        <?php echo $Result_data->occupancy ?>
                      </td>
                      <td>
                        <?php echo $Result_data->bed_type ?>
                      </td>


                      </tr>

                    <?php } } ?>
                  
                  </tbody>
                  
                </table>
                <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
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
