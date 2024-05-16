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
              <form method="post" enctype="multipart/form-data" id="all_traveller_info">
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if(count($arr_data) > 0 ) 
                { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Total One Bed Rooms</th>
                    <th>Total Two Bed Rooms</th>
                    <th>Total Three Bed Rooms</th>
                    <th>Total Four Bed Rooms</th>
                    <th>Allocate Rooms</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $j=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                    $sr_no=$j-1;
                    // print_r($info); die;
                     ?>

                  <tr>
                    <td><?php echo $j; ?></td>
                    <td><?php echo $info['mr/mrs'] ?> <?php echo $info['first_name'] ?> <?php echo $info['middle_name'] ?> <?php echo $info['last_name'] ?></td>
                    
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_1']!==''){
                        echo $info['total_allocated_rooms_1'] ;
                        $bed_type1 = 'One Bed';
                        $room_type1 = 'AC';
                      } else{
                        echo '0';
                        $bed_type1 = '';
                        $room_type1 = '';
                      }
                      
                      ?>
                    </td>
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_2']!==''){
                        echo $info['total_allocated_rooms_2'] ;
                        $bed_type2 = 'Two Bed';
                        $room_type2 = 'AC';
                      } else{
                        echo '0';
                        $bed_type2 = '';
                        $room_type2 = '';
                      }
                      
                      ?>
                    </td>
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_3']!==''){
                        echo $info['total_allocated_rooms_3'] ;
                        $bed_type3 = 'Three Bed';
                        $room_type3 = 'AC';
                      } else{
                        echo '0';
                        $bed_type3 = '';
                        $room_type3 = '';
                      }
                      
                      ?>
                      </td>
                    <td>
                      <?php 
                      if($info['total_allocated_rooms_4']!==''){
                        echo $info['total_allocated_rooms_4'] ;
                        $bed_type4 = 'Four Bed';
                        $room_type4 = 'AC';
                      } else{
                        echo '0';
                        $bed_type4 = '';
                        $room_type4 = '';
                      }
                      
                      ?>
                    </td>

                    <td>
                      
                      <input type="hidden" class="traveller_id" name="traveller_id[]" id="traveller_id" value="<?php echo $info['traveller_id']; ?>">
                      
                      <select class="select2 allocate_rooms" multiple="multiple" data-placeholder="Allocate rooms" style="width: 100%;" name="allocate_rooms[<?php echo $sr_no; ?>][]" id="allocate_rooms<?php echo $j; ?>" required="required">
                          <option value="">Allocate Rooms</option>
                          <?php
                              // print_r($all_room_data); die;
                              for($i=0;$i<count($all_room_data);$i++){
                                $room_id=$all_room_data[$i];
                                $query = $this->db->query("select * from hotel_room where id=$room_id");
                                $result_data = $query->row();

                          ?>
                         
                            <option value="<?php echo $result_data->id; ?>"><?php echo $result_data->room_type; ?> - <?php echo $result_data->room_number; ?> - <?php echo $result_data->bed_type; ?></option>
                        <?php } ?>
                      </select>
                      
                    
                    </td>
                    
                    
                  </tr>
                  
                  <?php $j++; } ?>
                  
                  </tbody>
                  
                </table>
                
                <center><button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button></center>

                <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
                </div>' ; } ?>
               
              </div>
              </form>
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
