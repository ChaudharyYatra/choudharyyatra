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
            <!-- <ol class="breadcrumb float-sm-right">
               <a href="<?php //echo $module_url_path; ?>/import"><button class="btn btn-primary">Add</button></a> 
              
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('region_head/layout/region_head_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile Number</th>
                    <th>Near By Region</th>
                    <th>Nearest Area</th>
                    <th>Interested In - Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Total Seat</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // $enq_id=$info['id'];
                    // $query=$this->db->query("select * from domestic_followup where booking_enquiry_id=$enq_id AND domestic_followup.is_last='yes'");
                    // $followupdata=$query->row_array();
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?></td>
                    <td><?php echo $info['email'];?></td>
                    <td><?php echo $info['mobile_number'];?></td>
                    <td><?php echo $info['department'];?></td>
                    <td><?php echo $info['booking_center'];?></td>
                    <td><?php echo $info['interested_in'];?> - <?php echo $info['interested_in_gr_int'];?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['form_date']));?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['to_date'])); ?></td>
                    <td><?php echo $info['total_seat'];?></td>
                    <td>
                      <a href="<?php echo $module_booking_enquiry;?>/add/<?php echo $info['id'];  ?>"><button type="button" class="btn btn-primary btn-sm btn_follow" class="dropdown-item">Generate Enquiry</button></a>
                    </td>
                    
                    <div class="modal fade" id="modal-default<?php echo $i;?>">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Followup Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="<?php echo $module_url_path;?>/edit/<?php echo $info['id'] ?>">
                                <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label class="col-form-label">Follow Up Date:</label>
                                    <input type="date" class="form-control" name="follow_up_date" id="follow_up_date" value="<?php if(isset($followupdata['follow_up_date'])){ echo $followupdata['follow_up_date'];}?>">
                                    </div>
                                    <div class="col-md-6">
                                    <label class="col-form-label">Follow Up Time:</label>
                                    <input type="time" class="form-control" name="follow_up_time" id="follow_up_time" value="<?php if(isset($followupdata['follow_up_time'])){ echo $followupdata['follow_up_time'];}?>">
                                    </div>
                                    <div class="col-md-12">
                                    <label class="col-form-label">Follow Up Comment:</label>
                                    <textarea class="form-control" name="follow_up_comment" id="follow_up_comment" value=""><?php if(isset($followupdata['follow_up_comment'])){ echo $followupdata['follow_up_comment'];}?></textarea>
                                    </div>
                                </div>
                                </div>
                                
                            </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
      <!-- /.modal -->
                    
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