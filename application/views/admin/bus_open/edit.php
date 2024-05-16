<style>
.book-tbl {
    position: relative;
    display: inline-flex;
    width: 100%;
    margin-top: 5%;
    padding-bottom: 20px;
}

.new_seat_design_ul {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.new_seat_design_ul li {
    display: block;
    float: left;
    margin: 0 5px;
}

.label {
    display: inline-block;
    position: relative;
    width: 20px;
    color: #fff;
    background: #FBCF61;
    text-align: center;
    line-height: 22px;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.25s ease 0s;
    -webkit-transition: all 0.25s
}

.label:hover {
    background: #00B4F1;
}

.label:active {
    transition: 0;
    -webkit-transition: 0;
    -webkit-filter: brightness(.8);
}

input {
    display: none;
}

input:checked+label {
    background: #FF7541;
    color: #fff;
}

input:checked+label {
    animation: boom .5s;
    -webkit-animation: boom .5s;
}

@keyframes boom {
    25% {
        transform: scale(1.25);
    }
}

@-webkit-keyframes boom {
    25% {
        -webkit-transform: scale(1.25);
    }
}

input:disabled+label {
    color: #fff;
    background: #f00;
}

.book-txt {
    font-family: "Open Sans", sans-serif;
    text-align: center;
    color: #888;
}

.book-txt h2 {
    color: #FF7541;
}

.note {
    padding: 25px 0;
    font-size: 14px;
}

.note a {
    color: #FF7541;
    text-decoration: none;
}

.note a:hover {
    text-decoration: underline;
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data"  id="edit_bus_open">
                <div class="card-body">
                    <div class="row">
                    <?php foreach($arr_data as $info){ ?> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Details</label>
                                <select class="form-control" name="tour_number" id="tour_number">
                                <option value="">Select tour title</option>
                                <?php foreach($packages_data as $packages_data_value){ ?> 
                                    <option value="<?php echo $packages_data_value['id'];?>" <?php if(isset($info['package_id'])){if($packages_data_value['id'] == $info['package_id']) {echo 'selected';}}?> ><?php echo $packages_data_value['tour_number'];?> - <?php echo $packages_data_value['tour_title'];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Date</label>
                                <select class="select_css" name="tour_date" id="tour_date">
                                  <option value="">Select Tour Date</option>
                                  <?php foreach($add_journey_date as $add_journey_date_value){ ?> 
                                    <option value="<?php echo $add_journey_date_value['p_date_id'];?>" <?php if(isset($info['package_date_id'])){if($add_journey_date_value['p_date_id'] == $info['package_date_id']) {echo 'selected';}}?> ><?php echo $add_journey_date_value['journey_date'];?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Bus Type</label><br>
                            <select class="select_css" name="vehicle_bus_type" id="vehicle_bus_type_bus_open">
                              <option value="">Select Bus Type</option>
                                <?php
                                    foreach($record_bus_type as $bus_type_info) 
                                    { 
                                  ?>
                                  <option value="<?php echo $bus_type_info['bus_id'];?>" <?php if(isset($info['vehicle_bus_type'])){if($bus_type_info['bus_id'] == $info['vehicle_bus_type']) {echo 'selected';}}?>><?php echo $bus_type_info['bus_type']. ' ==> '. $bus_type_info['seat_capacity'];?> Seater</option>
                                <?php } ?>
                              </select>
                          </div>
                        </div>

                        <?php
                        
                          foreach($arr_data as $arr_data_info) 
                          { 
                            $admin_hold_seats=explode(',',$arr_data_info['admin_hold_seats']);
                            // print_r($admin_hold_seats); die;
                        ?>
                        
                          <input type="text" id="admin_hold_seats" name="admin_hold_seats" value="<?php echo $arr_data_info['admin_hold_seats'];?>">
                        <?php } ?>

                        <div class="col-md-8">
                          <div class="form-group">
                              <!-- <label>Seat Numbers</label> -->
                              <div class="book-tbl">
                                  <ul class="new_seat_design_ul" id="append_pref_data">
                                    
                                  </ul>
                              </div>
                          </div>
                        </div>
                       
                        
                      <?php } ?>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
