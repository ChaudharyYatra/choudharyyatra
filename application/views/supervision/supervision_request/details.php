<style>
  .table-color{
    background:#00899f80;
  }
  .table-color-agent{
    background:#6c757d57;
    color:#000 !important;
  }
  
  .offcanvas-end{
    width:600px !important;
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
                <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
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
                  foreach($arr_data_s_order as $info) 
                      { 
					 // print_r($info);
					  //die;
                        ?>
                <table id="example2" class="table table-bordered table-hover table-color-agent">
                  <tr>
                    <!-- <th>Request no.</th>
                    <td><?php //echo $info['id']; ?></td> -->
                    <th>Agent Name</th>
                    <td><?php echo $info['agent_name']; ?></td>
                    <th>Agent Region</th>
                    <td><?php echo $info['department']; ?></td>

                    <th>Agent Center</th>
                    <td><?php echo $info['booking_center']; ?></td>
                  </tr>
                </table>
                <?php } ?>
              </div>

              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
               { ?>
               <form method="post" enctype="multipart/form-data" action="#">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Document Type</th>
                      <th>Image</th>
                      <th>Image 2</th>
                      <th>Image 3</th>
                      <th>Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <?php  
                      
                      $i=1; 
                      $s_send = []; 
                      foreach($arr_data as $info)
                      { 
                        // print_r($arr_data);  die;
                        array_push($s_send,$info['id']);
                        ?>
                      <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $info['stationary_name']; ?></td>
                      <!-- <td><?php //echo $info['image_name']; ?></td> -->
                      <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image"></td>
                      <!-- <td><?php //if(!empty($info['image_name2'])){ echo $info['image_name2'];} ?></td> -->

                      <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code2/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>
                      
                      <!-- <td><?php //if(!empty($info['image_name3'])){ echo $info['image_name3'];} ?></td> -->
                      <td><img src="<?php echo base_url(); ?>uploads/stationary_request_code3/<?php echo $info['image_name']; ?>" width="70px;" height="50px;" alt="Image Not Uploded"></td>

                      <td><?php echo $info['stationary_remark']; ?></td>
                       
                      </tr>

                      
                      <!-- <div id="sending">

                      </div> -->
                      
                        
                                            
                      <?php $i++; } ?>

                      <input type="hidden" class="form-control" name="s_send" id="s_send" value="<?php echo implode (",",$s_send); ?>" />

                  </tbody>
                  
                </table>

                <center>
                <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> data-bs-toggle="modal" data-bs-target="#exampleModal"-->
                <!-- <button type="button" id="submit" name="submit" class="btn btn-primary sendButton">
                  Send
                </button> -->
               </center>
                </form>
                <!-- <button class="btn">Send<button> -->
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
  function send_qty() {
	 if(document.getElementById("send_qty").value==="") { 
            document.getElementById('button').disabled = false; 
        } else { 
            document.getElementById('button').disabled = true;
        }
    }
</script>

<?php  
                      
$i=1; 
$s_send = []; 
foreach($arr_data as $info)
{ 
  // print_r($arr_data);  die;
  array_push($s_send,$info['id']);
  ?>

  <!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header float-right">
          <h5>Stationary details</h5>
          <div class="text-right">
            <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
          </div>
      </div>
      <?php 
            if($info['series_yes_no']=='Yes'){
            ?>
        <div class="modal-body">
            


          <!-- <div> -->

          
          <form method="post" action="<?php echo $module_url_path;?>/save_details"> 
          <input type="hidden" class="form-control order_id" name="order_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
            <input type="hidden" class="form-control order_d_id" name="order_d_id" id="order_d_id" value="<?php echo $info['id'] ?>" />
            <input type="hidden" class="form-control order_d_id" name="form_type" id="form_type" value="searies" />
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Financial Year</th>
                  <th scope="col">Series</th>
                  <th scope="col">Remark</th>
                </tr>
              </thead>
              
              <input type="hidden" class="form-control order_id" name="order_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
              <input type="hidden" class="form-control order_d_id" name="order_d_id" id="order_d_id" value="<?php echo $info['id'] ?>" />
              <tbody id="series_yes">
                
                
              </tbody>
      
            </table>
            </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submit" name="save" value="save">Save</button>
        <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> -->
      </div>
          <?php } else{ ?>
            <div class="modal-body">
            
            <form method="post" action="<?php echo $module_url_path;?>/save_details" > 
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Financial Year</th>
                  <th scope="col">Remark</th>
                </tr>
              </thead>
              <tbody id="series_no">
              <tr>
                  <td>
                    <select class="form-control" style="width: 100%;" name="academic_year[]" id="academic_year" required="required">
                      <option value="">Select Year</option>
                      <?php
                          foreach($academic_years_data as $academic_years_info) 
                          { 
                      ?>
                          <option value="<?php echo $academic_years_info['id']; ?>"><?php echo $academic_years_info['year']; ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  
                  
                  <td>
                    <textarea class="form-control" name="remark[]" id="remark">   </textarea>  
                  </td>
               </tr>
                
              </tbody>
            </table>
          
          

          </div>


        <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submit" name="save" value="save">Save</button>
        <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> -->
      </div>
      </form>
      <?php } ?>
    </div>
  </div>
</div>

<?php $i++; } ?>
