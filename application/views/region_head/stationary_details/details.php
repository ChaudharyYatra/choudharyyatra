<style>
  .table-color{
    background:#00899f80;
  }
  .table-color-agent{
    background:#6c757d57;
    color:#000 !important;
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
          <div class="col-12">
            <div class="card-body">
                <?php  
                  foreach($arr_data_s_order as $info) 
                      { 
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
              <form method="post" enctype="multipart/form-data" action="<?php echo $module_url_path;?>/send">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Stationary Name</th>
                    <th>Quantity</th>
                    <th>Sending Quantity</th>
                    <th>Recevied Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                      <?php  
                      
                      $i=1; 
                      foreach($arr_data as $info) 
                      { 
                        ?>
                      <tr>
                        <td><?php echo $i; ?>
                          <input type="hidden" class="form-control" name="s_id[]" id="s_id" value="<?php echo $info['id'] ?>" />
                        </td>
                        <td><?php echo $info['stationary_name'] ?></td>
                        <td><?php echo $info['stationary_qty'] ?></td>
                        <td>
                        <?php 
                          if($info['send_qty']=='0')
                            {
                          ?>
                            <input type="text" name="send_qty[]" class="send_qty" id="send_qty" onkeyup="send_qty()" required />
                          <?php } else { ?>
                            <input type="text" name="send_qty[]" class="send_qty" id="send_qty" value="<?php echo $info['send_qty'] ?>" disabled />
                          <?php } ?>
                        </td>
                        <td><?php echo $info['received_qty'] ?></td>
                      </tr>
                      
                      <?php $i++; } ?>
                    

                  </tbody>
                  
                </table>
                
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



  

</body>
</html>
