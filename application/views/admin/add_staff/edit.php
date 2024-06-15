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
            <?php
              // Assuming $tour_creation_id and $tour_no_of_days are already defined

              // Encode the IDs
              $encoded_tour_creation_id = rtrim(base64_encode($tour_creation_id), '=');
              $encoded_tour_no_of_days = rtrim(base64_encode($tour_no_of_days), '=');
            ?>

            <ol class="breadcrumb float-sm-right">
                <a href="<?php echo $module_url_path; ?>/index/<?php echo $encoded_tour_creation_id; ?>/<?php echo $encoded_tour_no_of_days; ?>">
                    <button class="btn btn-primary">Back</button>
                </a>
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
              
              <form method="post" enctype="multipart/form-data" id="edit_staff">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                          <div class="form-group">
                            

                          </div>
                      </div>

                    
                    <table class="table table-bordered" id="edit_main_row_for_state_master">
                        <colgroup>
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="hotel_room_rate">Start Date</th>
                                <th class="hotel_room_rate">Staff Role</th>
                                <th class="hotel_room_rate">Per Day Salary</th>
                                <th class="hotel_room_rate">End Date</th>
                            </tr>
                        </thead>
                        <tbody id="hotel_room_body">
                        <?php
                        foreach($arr_data as $info) 
                        { 
                          ?>
                            <tr>
                                <td class="hotel_room_rate">
                                  <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo $info['start_date']; ?>" placeholder="Enter start date" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                <select class="form-control" name="role_type" id="role_type" required="required">
                                  <option value="">Select role type</option>
                                  <?php
                                    foreach($role_type as $role_type_info) 
                                    { 
                                  ?>
                                    <option value="<?php echo $role_type_info['id'];?>" <?php if($role_type_info['id']==$info['role_type']) { echo "selected"; }?>><?php echo $role_type_info['role_name']; ?></option>
                                  <?php } ?>
                                </select>
                                </td>
                                <!-- <td class="hotel_room_rate">
                                  <select class="select_css row_set1 name" name="staff_name" id="staff_name" required="required">
                                    <option value="">select name</option>
                                    <?php
                                        //foreach($supervision as $supervision_info) 
                                        //{ 
                                    ?>
                                        <option value="<?php //echo $supervision_info['id']; ?>" <?php //if($supervision_info['id']==$info['staff_name']) { echo "selected"; } ?>><?php //echo $supervision_info['supervision_name']; ?></option>
                                    <?php //} ?>
                                  </select>
                                </td> -->
                                <td class="hotel_room_rate">
                                <input type="text" class="form-control" name="daywise_salary" id="daywise_salary" value="<?php echo $info['daywise_salary']; ?>" placeholder="Enter daywise salary" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                                </td>

                                <td class="hotel_room_rate">
                                  <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo $info['end_date']; ?>" placeholder="Enter end date">
                                </td>
                                
                            </tr>
                            <?php } ?>  
                        </tbody>
                    </table>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index/<?php echo $encoded_tour_creation_id; ?>/<?php echo $encoded_tour_no_of_days; ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
                </div>
              </form>
              
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
