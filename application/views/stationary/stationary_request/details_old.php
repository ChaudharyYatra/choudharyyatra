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
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
              <form method="post" enctype="multipart/form-data" action="<?php echo $module_url_path;?>/send">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Stationary Name</th>
                    <th>Quantity</th>
                    <th>Sending Quantity</th>
                    <!-- <th>Action</th> -->
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
                          <input type="hidden" class="form-control" name="s_id[]" id="s_id" value="<?php echo $info['id'] ?>" />
                          <input type="hidden" class="form-control" name="o_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
                        </td>
                        <td><?php echo $info['stationary_name'] ?></td>
                        <td><?php echo $info['stationary_qty'] ?></td>
                        <td>
                        <?php 
                          if($info['send_qty']=='0')
                            {
                          ?>
                            <input type="text" name="send_qty[]" class="send_qty" id="send_qty_<?php echo $info['id'] ?>" onkeyup="send_qty()" required/>
                          <?php } 
                            if($info['send_qty']>'0')
                            {
                          ?>
                            <input type="text" name="send_qty[]" class="send_qty" id="send_qty" value="<?php echo $info['send_qty'] ?>" disabled/>
                          <?php } 
                          else { ?>
                            <input type="text" name="send_qty[]" class="send_qty" id="send_qty" value="<?php echo $info['send_qty'] ?>" required/>
                          <?php } ?>
                        </td>
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
                        <!-- <td>
                        <button type="button" id="not_in_stock" class="btn btn-primary">Not in stock</button>
                        </td> -->
                      </tr>
                      
                      <?php $i++; } ?>

                      <input type="hidden" class="form-control" name="s_send" id="s_send" value="<?php echo implode (",",$s_send); ?>" />

                  </tbody>
                  
                </table>
                <center>
                <!-- <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button> data-bs-toggle="modal" data-bs-target="#exampleModal"-->
                <button type="button" id="submit" name="submit" class="btn btn-primary sendButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Courier/ Transport Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo $module_url_path;?>/send_receipt">
            <div class="col-md-12">
              <div class="row">
              <input type="text" class="form-control" name="o_id" id="o_id" value="<?php echo $info['order_id'] ?>" />
                <div class="col-md-12 mb-4">
                  <label>Courier Company Name</label>
                    <div class="input-group">
                        <select class="form-control niceSelect" name="courier_company_name[]" id="courier_company_name" onfocus='this.size=4;' onblur='this.size=1;' 
                            onchange='this.size=1; this.blur();' required="required">
                            <option value="">Select courier company name</option>

                            <?php foreach($courier_company_name_data as $courier_company_name){ ?> 
                            <option value="<?php echo $courier_company_name['id'];?>"><?php echo $courier_company_name['courier_company_name'];?></option> 
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                  <label class="col-form-label">Upload receipt:</label>
                  <input type="file" name="courier_receipt" id="courier_receipt" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label class="col-form-label">Courier Comment:</label>
                  <textarea class="form-control" name="courier_comment" id="courier_comment" required></textarea>
                  
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button>
            </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button>
      </div>
    </div>
  </div>
</div>
  

</body>
</html>
