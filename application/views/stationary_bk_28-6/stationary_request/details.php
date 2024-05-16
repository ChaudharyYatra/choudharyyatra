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
                    <th>Order no.</th>
                    <td><?php echo $info['order_no']; ?></td>
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
               <form>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Stationary Name</th>
                      <th>Quantity</th>
                      <th>Sending Quantity</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <?php  
                      
                      $i=1; 
                      $s_send = []; 
                      foreach($arr_data as $info)
                      { 
                        array_push($s_send,$info['id']);
                        ?>
                      <tr>
                        <td><?php echo $i; ?>
                          <input type="hidden" class="form-control stationary_order_id" name="stationary_order_id[]" id="s_id" value="<?php echo $info['id'] ?>" />
                          <input type="hidden" class="form-control order_id" name="order_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
                        </td>
                        <td><?php echo $info['stationary_name'] ?></td>
                        <td><?php echo $info['stationary_qty'] ?></td>
                        <td>
                        <?php 
                          if($info['send_qty']=='0')
                            {
                          ?>
                            <input type="text" name="send_qty[]" class="send_qty" attr-series_yes_no="<?php echo $info['series_yes_no'] ?>" attr_stid="<?php echo $info['stid'];?>" id="send_qty_<?php echo $info['id'] ?>" onkeyup="send_qty()" required/>
                          <?php } 
                            if($info['send_qty']>'0' && $info['is_sended']=='yes')
                            {
                          ?>
                            <input type="text" name="send_qty[]" class="send_qty" attr-series_yes_no="<?php echo $info['series_yes_no'] ?>" attr_stid="<?php echo $info['stid'];?>" id="send_qty" value="<?php echo $info['send_qty'] ?>" disabled/>
                          <?php } 
                          else { ?>
                            <input type="text" name="send_qty[]" class="send_qty" attr-series_yes_no="<?php echo $info['series_yes_no'] ?>" attr_stid="<?php echo $info['stid'];?>" id="send_qty" required/>
                          <?php } ?>
                        </td>
                        <td>
                        <!-- <button class="btn btn-primary send" name="send" id="send" attr_send_val="<?php //echo $info['send_qty'] ?>" attr-series_yes_no="<?php //echo $info['series_yes_no'] ?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo_<?php //echo $i; ?>">
                          Send
                        </button> -->
                        
                        <button type="button" class="btn btn-primary send details" name="send" id="send" data-toggle="modal" data-target="#exampleModal_<?php echo $i; ?>">
                          Details
                        </button>
                        
                        </td>
                       
                      </tr>











                   
                      <?php $i++; } ?>

                      <input type="hidden" class="form-control" name="s_send" id="s_send" value="<?php echo implode (",",$s_send); ?>" />

                  </tbody>
                  
                </table>

                <center>
                <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> data-bs-toggle="modal" data-bs-target="#exampleModal"-->
                <button type="button" id="submit" name="submit_new" class="btn btn-primary sendButton">
                  Send
                </button>
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
         <form> 
        <div class="modal-body">

          <input type="hidden" class="form-control order_id" name="order_id" id="order_id" value="<?php echo $info['order_id'] ?>" />
            <input type="hidden" class="form-control order_d_id" name="order_d_id" id="order_d_id" value="<?php echo $info['id'] ?>" />
            <input type="hidden" class="form-control order_d_id" name="form_type" id="form_type" value="searies" />
            <table class="table table-bordered mytable">
              <thead>
                <tr>
                  <th scope="col">Financial Year</th>
                  <th scope="col">Series</th>
                  <th scope="col">Remark</th>
                </tr>
              </thead>
              <tbody id="series_yes">
                
                
              </tbody>
      
            </table>
            
          </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_series" name="save_series" data-dismiss="modal" value="save">Save</button>
        <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> -->
      </div>
      </form>
          <?php } else{ ?>
            <div class="modal-body">
            
            <form> 
            <input type="hidden" class="form-control order_id" name="order_id" id="order_id_no_series" value="<?php echo $info['order_id'] ?>" />
            <input type="hidden" class="form-control order_d_id" name="order_d_id" id="order_d_id_no_series" value="<?php echo $info['id'] ?>" />
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
                    <select class="form-control" style="width: 100%;" name="academic_year" id="a_year_no_series" required="required">
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
                    <!-- <textarea class="form-control" name="remark" id="">  </textarea>   -->
            <input type="text" class="form-control" name="remark" value="" id="remark_no_series" placeholder="Remark"/>

                  </td>
               </tr>
                
              </tbody>
            </table>
          
          

          </div>


        <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_no_series" data-dismiss="modal" name="save" value="save">Save</button>
        <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> -->
      </div>
      </form>
      <?php } ?>
    </div>
  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="exampleModal_send" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form method="post" action="<?php echo $module_url_path;?>/send_receipt" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Courier/ Transport Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="col-md-12">
              <div class="row">
              <input type="hidden" class="form-control" name="od_id" id="od_id" value="" />
              <input type="hidden" class="form-control" name="o_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
			  <input type="hidden" class="form-control" name="agent_id" id="agent_id" value="<?php echo $info['agent_id'] ?>" />
                <div class="col-md-7 mb-4">
                  <label>Courier Company Name</label>
                    <div class="input-group">
                        <select class="form-control niceSelect" name="courier_company_name" id="courier_company_name" onfocus='this.size=4;' onblur='this.size=1;' 
                            onchange='this.size=1; this.blur();' required="required">
                            <option value="">Select courier company name</option>

                            <?php foreach($courier_company_name_data as $courier_company_name){ ?> 
                            <option value="<?php echo $courier_company_name['id'];?>"><?php echo $courier_company_name['courier_company_name'];?></option> 
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-5 mb-2">
                  <label class="col-form-label">Dispatch Date:</label>
                  <input type="date" class="form-control" name="dispatch_date" id="dispatch_date" required="required" max="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="col-md-12 mb-2">
                  <label class="col-form-label">Upload receipt:</label>
                  <input type="file" name="courier_receipt" id="courier_receipt" required="required">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label class="col-form-label">Courier Comment:</label>
                  <textarea class="form-control" name="courier_comment" id="courier_comment" required="required"></textarea>
                  
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button>
            </div> -->
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit_doc" name="submit_doc" value="send">Send</button>
      </div>
    </div>

    </form>
  </div>
</div>

<?php $i++; } ?>




