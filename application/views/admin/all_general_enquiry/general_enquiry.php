<style>
  .a_text{
    text-decoration: none;
  }
  .take_followup_btn{
    padding: 3%;
  }
</style>

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
              <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
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
                    <th>Enquiry Date</th>
                    <!-- <th>Followup form</th>
                    <th>Followup List</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    $enq_id=$info['id'];
                    $query=$this->db->query("select * from domestic_followup where booking_enquiry_id=$enq_id");
                    $followupdata=$query->result_array();
                    // print_r($followupdata); die;
                    $count= count($followupdata);
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['tno']; ?></td>
                    <td><?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?></td>
                    <td><?php echo $info['tour_title']; ?></td>
                    <td><?php echo $info['email']; ?></td>
                    <td><?php echo $info['mobile_number']; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['created_at'])); ?></td>

                  <!-- <td>
                      <?php
                          //if($count > 0)
                          //{
                      ?>
                      <h6>Follow Already Taken</h6>
                      <?php        
                          //}else{
                      ?>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php //echo $i; ?>" class="enq_id" data-bs-whatever="Form" data-enq-id="<?php echo $enq_id;?>"><button type="button" class="btn btn-primary btn-sm btn_follow take_followup_btn" class="dropdown-item">Take Followup</button> </a>
                      <a href="<?php //echo $module_url_path_booking_basic_info;?>/add/<?php //echo $enq_id; ?>"><button type="button" class="btn btn-primary btn-sm btn_follow mt-1" class="dropdown-item">Booking</button></a>                     
                    </td>
                     <?php //} ?>
                     
                    <td>
                    <a href="<?php //echo $module_url_path_domestic_followup;?>/index/<?php //echo $info['id']; ?>"><button type="button" class="btn btn-primary btn-sm btn_follow" class="dropdown-item">View</button></a>
                    </td> -->
                    
                

              

                  </tr>

                <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Next followup form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="<?php echo $module_url_path_domestic_followup;?>/domestic_followup">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6 mb-2">
                                <label class="col-form-label">Next followup Date:</label> 
                                <input type="date" class="form-control" name="next_followup_date" id="next_followup_date" min="<?php echo date("Y-m-d"); ?>" value="<?php if(isset($domestic_followup_info['next_followup_date'])){ echo $domestic_followup_info['next_followup_date'];}?>" required>
                                <input type="hidden" name="enquiry_id" id="enquiry_id" value="<?php if(isset($info['id'])){ echo $info['id'];}?>">
                              </div>
                              <div class="col-md-6 mb-2">
                                <label class="col-form-label">Next Follow Up Time:</label>
                                <input type="time" class="form-control" name="follow_up_time" id="follow_up_time" required>
                              </div>
                              <div class="col-md-12 mb-2">
                                <label>Select Reason</label>
                                  <div class="input-group">
                                      <select class="form-control niceSelect" name="followup_reason" id="followup_reason" onfocus='this.size=4;' onblur='this.size=1;' 
                                          onchange='this.size=1; this.blur();' required="required">
                                          <option value="">Select reason</option>

                                          <?php foreach($followup_reason_data as $followup_reason){ ?> 
                                          <option value="<?php echo $followup_reason['id'];?>"><?php echo $followup_reason['create_followup_reason'];?></option> 
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <label class="col-form-label">Follow Remark:</label>
                                <textarea class="form-control" name="follow_up_comment" id="follow_up_comment" required></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
                            <a onclick="return confirm('Are You Sure You Want To submit This Follow Up Record?')" href="<?php echo $module_url_path;?>/booking_enquiry/<?php echo $info['id']; ?>"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a>
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

<!-- Modal -->
<div class="modal fade" id="booking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SRA Form Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

  
  
<script>
  


  var exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = exampleModal.querySelector('.modal-title')
    var modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = 'Client Followup ' + recipient
    modalBodyInput.value = recipient
})
</script>


</body>
</html>
