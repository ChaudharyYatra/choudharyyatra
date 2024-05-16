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
        .download_css{
          text-decoration: none;
          color: blue;
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
              <a href="<?php echo $module_url_path; ?>/add/<?php echo $package_no; ?>/<?php echo $tour_days; ?>"><button class="btn btn-primary">Back</button></a>
              
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <?php //foreach($tour_creation_iternary_data as $tour_creation_iternary_info){
                    // print_r($tour_creation_iternary_info); die; 
                    ?>  -->
                <form id="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Total Days</label>
                                      <input type="text" readonly class="form-control" name="total_days" id="tour_creation_total_days" placeholder="Enter Total Days" value="<?php echo $tour_creation_iternary_data['total_days'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Tour Number <span class="text-danger">*</label>
                                          <input type="number" readonly class="form-control" name="tour_number" id="tour_number" placeholder="Tour Number" value="<?php echo $tour_creation_iternary_data['package_id'];?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Day Number <span class="text-danger">*</label>
                                          <input type="number" class="form-control" name="day_number" id="day_number" placeholder="Enter Day Number" value="<?php echo $tour_creation_iternary_data['day_number'];?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>Select District <span class="text-danger">*</label>
                                      <select class="select_css district" name="district" attr_district="district" required="required">
                                          <option value="">Select district</option>
                                          <?php
                                          foreach($district_data as $district_info){
                                            // print_r($district_info); die; 
                                          ?>
                                          <option value="<?php echo $district_info['id']; ?>" <?php if($district_info['id']==$tour_creation_iternary_data['district']) { echo "selected"; } ?>><?php echo $district_info['district']; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                                  <input type="hidden" class="form-control" name="tour_creation_iternary_id" id="tour_creation_iternary_id" value="<?php echo $tour_creation_iternary_data['id']; ?>">
                                  <div class="col-md-12">
                                    <div class="form-group float-right">
                                      <button class="btn btn-success add-row" attr_add_id="0" id="edit_tr" type="button">Add More</button>
                                    </div>
                                  </div>

                                  <!-- <?php //} ?> -->
                                  
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <table border="1" class="table table-bordered" id="table">
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
                                              <?php foreach($tour_creation_iternary as $tour_creation_iternary_info){ ?>
                                              <tbody>
                                                  <?php $i=1;?>
                                                  <tr>
                                                      <td><?php echo $i;?></td>
                                                      <td>
                                                          <select class="select_css select_place place_name" name="place_name[]" id="place_name<?php echo $i;?>" required="required">
                                                              <option value="">Select Place</option>
                                                              <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                              <option value="<?php echo $citywise_place_master_info['id']; ?>" <?php if($citywise_place_master_info['id']==$tour_creation_iternary_info['place_name']) { echo "selected"; } ?>><?php echo $citywise_place_master_info['place_name']; ?></option>
                                                              <?php } ?>
                                                          </select>
                                                      </td>
                                                      <td><input readonly type="input" name="time[]" id="time<?php echo $i;?>" value="<?php echo $tour_creation_iternary_info['time']; ?>"></td>
                                                      <td><input type="time" class="form-control" name="visit_time[]" id="visit_time<?php echo $i;?>" placeholder="Enter Visit Time" required value="<?php echo $tour_creation_iternary_info['visit_time']; ?>"></td>
                                                      <td><input type="text" class="form-control" name="details[]" id="details<?php echo $i;?>" placeholder="Enter Details" value="<?php echo $tour_creation_iternary_info['details']; ?>"></td>
                                                      <td>
                                                      <a onclick="return confirm('Are You Sure You Want To Delete This Record? ')" href="<?php echo $module_url_path;?>/add_more_delete/<?php echo $tour_creation_iternary_info['add_more_tour_creation_id']; ?>" title="delete"><button value="<?php echo $tour_creation_iternary_info['add_more_tour_creation_id']; ?>" class="btn btn-primary delete_instruction">Delete</button></a>
                                                      </td>
                                                  </tr>
                                                  <?php $i++; ?>
                                              </tbody>
                                              <?php } ?>
                                          </table>
                                      </div>
                                  </div>
                                  
                                  <!-- <div class="col-md-6">
                                      <div class="form-group">
                                          <label style="display: block;">Upload Image <span class="text-danger">*</label>
                                          <input type="file" name="image_name" id="image_name" required="required">
                                          <br><span class="text-danger">Please select only JPG, PNG, JPEG format files.</span>
                                      </div>
                                  </div> -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Upload Attachment</label>
                                          <input type="file" name="image_name" id="image_name">
                                          <br><span class="text-danger">Please select only PDF,JPG,PNG,JPEG,PDF format files.</span>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="form-group">
                                          <label>Uploaded Attachment</label><br>
                                          <?php if(!empty($tour_creation_iternary_data['image_name'])){ ?>
                                          <img src="<?php echo base_url(); ?>uploads/tour_creation_iternery_img/<?php echo $tour_creation_iternary_data['image_name']; ?>" width="50%">
                                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $tour_creation_iternary_data['image_name']; ?>">
                                          <?php } ?>
                                            <br>
                                          <?php if(!empty($tour_creation_iternary_data['image_name'])){ ?>
                                              <a class="btn-link pull-right text-center download_css" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_creation_iternery_img/<?php echo $tour_creation_iternary_data['image_name']; ?>">Download</a>
                                              <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($tour_creation_iternary_data['image_name'])){echo $tour_creation_iternary_data['image_name'];}?>">
                                          <?php } ?>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Itinerary For Day<span class="text-danger">*</span></label>
                                          <textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"><?php echo $tour_creation_iternary_info['iternary_desc']; ?></textarea>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <!-- <button class="btn btn-success add-row_district" type="button" data-day="${day}">Add another district</button> -->
                      </div>
                  </div>
                    <!-- </div> -->

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:10%;">Submit</button> -->
                    <input type="submit" class="btn btn-primary form-control" name="submit" style="width:10%;"></input>
                    <a href="<?php echo $module_url_path; ?>/add/<?php echo $package_no; ?>/<?php echo $tour_days; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
                  </div>
                  </div>
                </form>
              <!-- </form> -->
            
            </div>
            <!-- /.card -->
            </div>
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

