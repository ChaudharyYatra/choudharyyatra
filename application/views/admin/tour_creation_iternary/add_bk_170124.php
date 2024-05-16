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
        .add_more{
          padding: 7px !important;
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
              <a href="<?php echo $module_url_tour_creation; ?>/index"><button class="btn btn-primary">Back</button></a>
              
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
            <?php //$this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form id="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Total Days</label>
                                      <input type="text" readonly class="form-control" name="total_days" id="tour_creation_total_days" placeholder="Enter Total Days" value="<?php echo $did; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Tour Number <span class="text-danger">*</label>
                                          <input type="number" readonly class="form-control" name="tour_number" id="tour_number" placeholder="Tour Number" required value="<?php echo $id; ?>">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Day Number <span class="text-danger">*</label>
                                          <input type="number" class="form-control" name="day_number" id="day_number" placeholder="Enter Day Number" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                      <label>Select District <span class="text-danger">*</label>
                                      <select class="select_css district" name="district" attr_district="district" required="required">
                                          <option value="">Select district</option>
                                          <?php
                                          foreach($district_data as $district_info){ 
                                          ?>
                                          <option value="<?php echo $district_info['id'];?>"><?php echo $district_info['district']; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <table border="1" class="table table-bordered" id="table">
                                              <thead>
                                                  <tr>
                                                      <th>Sr no.</th>
                                                      <th>Places <span class="text-danger">*</th>
                                                      <th>Time <span class="text-danger">*</th>
                                                      <th>Visit From Time <span class="text-danger">* </th>
                                                      <th>Visit To Time <span class="text-danger">* </th>
                                                      <th>Details</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php $i=1;?>
                                                  <tr>
                                                      <td><?php echo $i;?></td>
                                                      <td>
                                                          <select class="select_css select_place place_name" name="place_name[]" id="place_name" required="required">
                                                              <option value="">Select Place</option>
                                                          </select>
                                                      </td>
                                                      <td><input readonly type="input" name="time[]" id="time" value=""></td>
                                                      <td><input type="time" class="form-control" name="from_visit_time[]" id="from_visit_time" placeholder="Enter Visit Time" required></td>
                                                      <td><input type="time" class="form-control" name="to_visit_time[]" id="to_visit_time" placeholder="Enter Visit Time" required></td>
                                                      <td><input type="text" class="form-control" name="details[]" id="details" placeholder="Enter Details"></td>
                                                      <td>
                                                          <button class="add_more btn btn-success add-row" attr_add_id="1" id="add_tr" type="button">Add More</button>
                                                      </td>
                                                  </tr>
                                                  <?php $i++; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label style="display: block;">Upload Image <span class="text-danger">*</label>
                                          <input type="file" name="image_name" id="image_name" required="required">
                                          <br><span class="text-danger">Please select only JPG, PNG, JPEG format files.</span>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Itinerary For Day<span class="text-danger">*</span></label>
                                          <textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"></textarea>
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
                    <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
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

          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($tour_creation_iternary) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Name</th>
                    <th>District Name</th>
                    <th>Place Name</th>
                    <th>Day Number</th>
                    <th>Iternary Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($tour_creation_iternary as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['tour_title'];?></td>
                    <td><?php echo $info['district'];?></td>
                    <td><?php echo $info['city_place'];?></td>
                    <td><?php echo $info['day_number'];?></td>
                    <td><?php echo $info['iternary_desc'];?></td>
                    <!-- <td>
                        <?php 
                        //if($info['is_active']=='yes')
                          //{
                        ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php //} else { ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php //} ?>
                    </td> -->
                    <td>
                          <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>" title="View"><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;/&nbsp;
                          <a href="<?php echo $module_url_path;?>/edit/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>/<?php $pid=base64_encode($info['tour_creation_addmore']); 
					                  echo rtrim($pid, '='); ?>" title="Update"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                          
                    </td>
                  </tr>
                  <?php $i++; } ?>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

