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
              <a href="<?php echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
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
              <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Tour No.</th>
                    <th>Customer Name</th>
                    <th>Package</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>Enquiry Date</th>
                    <th>Followup form</th>
                    <th>Followup List</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    $enq_id=$info['id'];
                    $query=$this->db->query("select * from international_followup where international_booking_enquiry_id=$enq_id and is_followup_status='yes'");
                    $followupdata=$query->result_array();
                    $count= count($followupdata);
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['pid']; ?></td>
                    <td><?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?></td>
                    <td><?php echo $info['tour_title']; ?></td>
                    <td><?php echo $info['email']; ?></td>
                    <td><?php echo $info['mobile_number']; ?></td>
                    <td><?php echo ucfirst($info['gender']); ?></td>
                    <td><?php echo date("Y-m-d",strtotime($info['created_at'])); ?></td>

                    <td>
                      <?php
                          if($count >= 3)
                          {
                      ?>
                      <h5 style="color:red;">Not Interested</h5>
                       <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?php //echo $i;?>">Status</button> -->
                      <?php        
                          }else{
                      ?>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="international_enq_id" data-bs-whatever="Form" inter-data-enq-id="<?php echo $enq_id;?>"><i class="fa fa-file" aria-hidden="true"></i></a>
                      
                      </td>
                     <?php } ?>

                      <td>
                       <a href="<?php echo $module_url_path_international_followup;?>/index/<?php echo $info['id']; ?>"><i class="fa fa-file" aria-hidden="true"></i></a>
                      </td>


                    <td>
                      <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['id'];  ?>" ><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                      <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                    </td>
                    <!-- <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a href="<?php //echo $module_url_path;?>/edit/<?php //echo $info['id'];  ?>" ><button class="dropdown-item">Edit</button></a>
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php //echo $module_url_path;?>/delete/<?php //echo $info['id']; ?>" title="Delete"><button class="dropdown-item">Delete</button></a>
                          
                        </div>
                      </div>
                    </td> -->

                  </tr>

                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="<?php echo $module_url_path;?>/international_followup">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <label class="col-form-label">Follow Up Date:</label>
                                <input type="date" class="form-control" name="follow_up_date" id="follow_up_date" value="<?php if(isset($domestic_followup_info['follow_up_date'])){ echo $domestic_followup_info['follow_up_date'];}?>">
                                <input type="hidden" name="international_booking_enquiry_id" id="international_booking_enquiry_id" value="<?php if(isset($info['id'])){ echo $info['id'];}?>">
                              </div>
                              <div class="col-md-6">
                                <label class="col-form-label">Follow Up Time:</label>
                                <input type="time" class="form-control" name="follow_up_time" id="follow_up_time">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-6">
                                <label class="col-form-label">Next followup Date:</label>
                                <input type="date" class="form-control" name="next_followup_date" id="next_followup_date" value="<?php if(isset($domestic_followup_info['next_followup_date'])){ echo $domestic_followup_info['next_followup_date'];}?>">
                              </div>
                              <div class="col-md-3">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <label class="col-form-label">Follow Up Comment:</label>
                                <textarea class="form-control" name="follow_up_comment" id="follow_up_comment"></textarea>
                              </div>
                            </div>
                            
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                  
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
