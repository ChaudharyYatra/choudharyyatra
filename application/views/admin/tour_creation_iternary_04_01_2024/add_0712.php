<style>
        /* Add custom CSS for the accordion */
        .rotate-icon {
            transition: transform 0.3s ease;
        }
        .rotate-icon.collapsed {
            transform: rotate(-90deg);
        }

        .card-header{
        background-color: #cd85a8de;
        }
        .btn-link{
          color: #fff;
          font-weight: bold;
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button class="btn btn-primary">Back</button></a>
              
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>


          <?php if(empty($arr_data)){ ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <!-- <form id="form_123" method="post" enctype="multipart/form-data"> -->
                <div class="card-body">
                    <div class="row" id="">
                    
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Days</label>
                                <input type="text" class="form-control" name="total_days" attr_input_type="new" id="tour_creation_total_days" placeholder="Enter Total Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                      </div>
                    </div>
                    <div id="accordion">
                        <!-- Dynamically generated fields will be placed here -->
                    </div>
                    
                </div>
                <div id="Tourcreation_newFields"></div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:10%;">Submit</button> -->
                    <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
                  </div>
                </div>
              <!-- </form> -->
            </div>
            <!-- /.card -->



          <?php } 
          else { 
          ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>

                <div class="card-body">
                    <div class="row" id="">
                    
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Days</label>
                                <input type="text" class="form-control" name="total_days" id="tour_creation_total_days" attr_input_type="old" attr_prev_days="<?php echo $added_day_count;?>" placeholder="Enter Total Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                <input type="hidden" class="form-control" name="prev_days_val" id="prev_days_val" value="<?php echo $added_day_count;?>" placeholder="Enter Total Days">
                              </div>
                      </div>
                    </div>
                  <?php for($i=0; $i<$added_day_count; $i++)
            {
              $check_day=$i+1; ?>

                    <div id="accordion">


                    <form id="form_123" class="form_cls" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header" id="heading<?php echo $check_day;?>" data-toggle="collapse" data-target="#collapse<?php echo $check_day;?>" aria-expanded="false" aria-controls="collapse<?php echo $check_day;?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" >
                                    Day <?php echo $check_day;?> Fields
                                    <i class="rotate-icon"></i>
                                </button>
                            </h5>
                        </div>
                        
                        <div id="collapse<?php echo $check_day;?>" class="collapse" aria-labelledby="heading<?php echo $check_day;?>" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tour Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="tour_number[]" id="tour_number" placeholder="Tour Number" required value="<?php echo $id; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Day Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="day_number[]" id="day_number" placeholder="Enter Day Number" required value="<?php echo $check_day;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label>Select District <span class="text-danger">*</label>
                                                <select class="select_css district" name="district[]" attr_district="district" required="required" attr_day="<?php echo $check_day;?>">
                                                    <option value="">Select district</option>
                                                    <?php
                                                    foreach($district_data as $district_info){ 
                                                    ?>
                                                    <option value="<?php echo $district_info['select_district']; ?> "><?php echo $district_info['district']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table border="1" class="table table-bordered" id="table_<?php echo $check_day;?>">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr no.</th>
                                                                <th>Places <span class="text-danger">*</th>
                                                                <th>Time <span class="text-danger">*</th>
                                                                <th>Visit Time <span class="text-danger">*</th>
                                                                <th>Details</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                          $sr_no=1;
                                                          $iternaryDescValue = '';
                                                          foreach($arr_data as $pack_iternary_data)
                                                          {  

                                                            if($check_day==$pack_iternary_data['day_number']){
                                                              // print_r($pack_iternary_data);
                                                              // die;
                                                              $district_id=$pack_iternary_data['district'];
                                                             $iternaryDescValue=$pack_iternary_data['iternary_desc'];
                                                              // die;
                                                              $query = $this->db->query("select * from citywise_place_master where select_district=$district_id");
                                                              $place_data=$query->result_array();
                                                              // print_r($place_data);
                                                              // die;
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $sr_no; ?></td>
                                                                <td>
                                                                    <select class="select_css select_place place_name<?php echo $sr_no; ?>" name="place_name[]" id="place_name" attr_time="<?php echo $sr_no; ?>" required="required">
                                                                          <option value="">Select Place</option>
                                                                        <?php foreach($place_data as $places_final_array)
                                                                            {  ?>
                                                                        <option value="<?php echo $places_final_array['id'];?>" 
                                                                        <?php if($pack_iternary_data['place_name']==$places_final_array['id']){echo 'selected';} ?>><?php echo $places_final_array['place_name'];?></option>
                                                                        <?php } ?>    
                                                                    </select>
                                                                </td>
                                                                <td><input readonly type="input" name="time[]" id="time" value="<?php echo $pack_iternary_data['time'];?>"></td>
                                                                <td><input type="time" class="form-control" name="visit_time[]" id="visit_time" value="<?php echo $pack_iternary_data['visit_time'];?>" placeholder="Enter Visit Time" required></td>
                                                                <td><input type="text" class="form-control" name="details[]" id="details" placeholder="Enter Details" value="<?php echo $pack_iternary_data['details'];?>"></td>
                                                                <td>
                                                                              <?php if($sr_no==1){ ?>
                                                                    <button class="btn btn-success add-row" id="add_tr<?php echo $check_day; ?>" type="button" data-day="<?php echo $check_day; ?>">Add row</button>
                                                                                <?php }else{ ?>
                                                                                  <h6>NA</h6>
                                                                                  <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } 
                                                            $sr_no++;
                                                      } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="display: block;">Upload Image <?php echo $check_day;?> <span class="text-danger">*</label>
                                                    <input type="file" name="image_name[]" id="image_name" required="required">
                                                    <br><span class="text-danger">Please select only JPG, PNG, JPEG format files.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Itinerary For Day <?php echo $check_day;?> <span class="text-danger">*</span></label>
                                                    <textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"><?php echo $iternaryDescValue; ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-success add-row_district" type="button" data-day="<?php echo $check_day;?>">Add another district</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary form-control daywise_submit" style="width:10%;">Submit</button>
                        </div>
                    </div>
                </form>

                    </div>
                    
              <?php } ?>


                </div>
                <div id="Tourcreation_newFields"></div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:10%;">Submit</button> -->
                    <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
                  </div>
                </div>
              <!-- </form> -->
            </div>
            <!-- /.card -->
            </div>
          <?php     
                  } 
              //   } 
              // }
              ?>
            






            
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

