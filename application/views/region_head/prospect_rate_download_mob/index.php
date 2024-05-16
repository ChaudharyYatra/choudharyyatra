<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1><?php echo $module_title; ?></h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <!-- <th>Region Name</th> -->
                    <th>Mobile Number</th>
                    <th>Downloaded PDF</th>
                    <th>Date</th>
                    <th>Assign to Agent</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                    // $prospect_id=$info['id'];
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <!-- <td><?php //echo $info['booking_center']; ?></td> -->
                    <td><?php echo $info['mobile_number']; ?></td>
                    <td>
                      <?php 
                      if($info['pdf_name']=='prospect'){
                        ?>
                        Prospect
                      <?php } else { ?>
                        Rate Chart
                      <?php } ?>
                    </td>
                    <td><?php echo date('d-m-Y', strtotime($info['created_at'])); ?></td>
                    <td>
                      <?php if($info['agent_assign_status']== 'no'){?>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $info['id']; ?>" class="enq_id" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm btn_follow take_followup_btn" class="dropdown-item">Assign Agent</button> </a>
                      <?php } else {?>
                        <button type="button" disabled class="btn btn-success btn-sm btn_follow take_followup_btn" class="dropdown-item">Assigned</button>
                      <?php } ?>

                      <?php if($info['agent_assign_status']== 'yes'){?>  
                      <a data-bs-toggle="modal" data-bs-target="#agent_view<?php echo $info['id']; ?>" class="enq_id" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm btn_follow take_followup_btn" class="dropdown-item">View</button> </a>
                      <?php } ?>
                    </td>

                   
                  </tr>

                  <div class="modal fade" id="exampleModal<?php echo $info['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Assign Agent form</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?php echo $module_url_path;?>/assign_agent">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                <input type="hidden" name="prospect_id" id="prospect_id" value="<?php if(isset($info['id'])){ echo $info['id'];}?>">

                                  <label>Agent Name</label>
                                  <div class="form-group">
                                      <select class="select_css" name="agent_name" id="agent_name">
                                          <option value="">Select Agent</option>
                                          <?php foreach($agent_data as $agent_data_value){ ?>   
                                                  <option value="<?php echo $agent_data_value['id'];?>"><?php echo $agent_data_value['agent_name'];?></option>
                                                  <?php } ?>
                                      </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <a onclick="return confirm('Are You Sure You Want To submit This Record?')" ><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="modal fade" id="agent_view<?php echo $info['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Assign Agent form</h5> 
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                <input type="hidden" name="prospect_id" id="prospect_id" value="<?php if(isset($info['id'])){ echo $info['id'];}?>">

                                  <label>Assigned Agent Name</label>
                                  <div class="form-group">
                                    <input type="text" disabled class="form-control" name="agent_name_view" id="agent_name_view" required value="<?php if(isset($info['agent_name'])){ echo $info['agent_name'];}?>">
                                  </div>
                                </div>
                              </div>
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
