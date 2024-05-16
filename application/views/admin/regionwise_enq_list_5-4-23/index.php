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
               <a href="<?php echo $module_url_path_back; ?>/index"><button class="btn btn-primary">Back</button></a> 
              
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Tour Type</th>
                    <th>Tour No.</th>
                    <th>Tour Title</th>
                    <th>Agent Name</th>
                    <th>Customer Name</th>
                    <th>Mobile Number</th>
                    <th>Enquiry Date</th>
                    <th>Follow up Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($add_attributes as $info) 
                    { 
                        // $enq_id=$info['id'];
                        // $query=$this->db->query("select * from domestic_followup where booking_enquiry_id=$enq_id");
                        // $followupdata=$query->result_array();
                        // print_r($followupdata); die;
                        // $count= count($followupdata);

                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['enquiry_type']; ?></td>
                    <td><?php echo $info['tour_number']; ?></td>
                    <td><?php echo $info['tour_title'];?></td>
                    <td><?php echo $info['agent_name'];?></td>
                    <td><?php echo $info['first_name'];?> <?php echo $info['last_name'];?></td>
                    <td><?php echo $info['mobile_number'];?></td>
                    <td><?php echo date("Y-m-d",strtotime($info['created_at'])); ?></td>
                    <td>
                    <?php
                          if($info['followup_status']=='no')
                          {
                      ?>
                       <h5 style="color:green;">New</h5>
                    <?php        
                          } else if($info['not_interested']=='no'){
                      ?>
                     <h5 style="color:red;">Not Interested</h5>
                     <?php 
                          } else{
                        ?>
                      <h5 style="color:blue;">Followup</h5>
                      <?php } ?>
                     
                    </td>
                    
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