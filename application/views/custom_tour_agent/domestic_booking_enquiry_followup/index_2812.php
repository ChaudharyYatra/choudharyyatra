<style>
  .table-color{
    background:#00899f80;
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
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path_booking_enq; ?>/index"><button class="btn btn-primary">List</button></a>
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
          <div class="card-body">
              <?php  
                foreach($arr_data_details as $info) 
                    { 
                      ?>
              <table id="example2" class="table table-bordered table-hover table-color">
                <tr>
                  <th>Customer Name</th>
                  <td><?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?></td>

                  <th>Mobile No.</th>
                  <td><?php echo $info['mobile_number']; ?></td>

                  <th>Enquiry Date</th>
                  <td><?php echo $info['created_at']; ?></td>
                </tr>
              </table>
              <?php } ?>
          </div>
        </div>
          
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
                    <!-- <th>Enquiry Date</th> -->
					          <th>Follow Up Date</th>
                    <th>Follow Up Time</th>
                    <th>Next Follow Up Date</th>
                    <th>Follow Up Comment</th>
                    <th>Followup status?</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <!-- <td><?php //echo $info['created_at'] ?></td> -->
					          <td><?php echo $info['follow_up_date'] ?></td>
                    <td><?php echo $info['follow_up_time'] ?></td>
                    <td><?php echo $info['next_followup_date'] ?></td>
                    <td><?php echo $info['follow_up_comment'] ?></td>
                    <td>
                        <?php 
                        if($info['is_followup_status']=='no')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['is_followup_status']; ?>"><button class="btn btn-danger btn-sm">No</button></a>
                        <?php } else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['is_followup_status']; ?>"><button class="btn btn-success btn-sm">Yes</button> </a>
                        <?php } ?>
                    </td>
                    <td>
                    <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i; ?>" data-bs-whatever="Form"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                      <!-- <a href="<?php //echo $module_url_path;?>/index/<?php //echo $info['id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Form"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                      <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; ?>" title="Delete"> <i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                      <!-- <a href="<?php //echo $module_url_path;?>/index/<?php //echo $info['id']; ?>"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                    </td>
                    
                  </tr>
                  <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="<?php echo $module_url_path;?>/edit/<?php echo $info['id'] ?>">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <label class="col-form-label">Follow Up Date:</label>
                                <input type="date" class="form-control" name="follow_up_date" id="follow_up_date" value="<?php if(isset($info['follow_up_date'])){ echo $info['follow_up_date'];}?>">
                              </div>
                              <div class="col-md-6">
                                <label class="col-form-label">Follow Up Time:</label>
                                <input type="time" class="form-control" name="follow_up_time" id="follow_up_time" value="<?php if(isset($info['follow_up_time'])){ echo $info['follow_up_time'];}?>">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-6">
                                <label class="col-form-label">Next followup Date:</label>
                                <input type="date" class="form-control" name="next_followup_date" id="next_followup_date" value="<?php if(isset($info['next_followup_date'])){ echo $info['next_followup_date'];}?>">
                              </div>
                              <div class="col-md-3">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <label class="col-form-label">Follow Up Comment:</label>
                                <textarea class="form-control" name="follow_up_comment" id="follow_up_comment" value=""><?php if(isset($info['follow_up_comment'])){ echo $info['follow_up_comment'];}?></textarea>
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
