<style>
    .itinerary_css{
        text-decoration:none !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
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
            
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Expense Date</th>
                    <th>Expense Head</th>
                    <th>Sub-Expenses Head</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data_assign_staff as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['expense_date'])) ?></td>
                    <td>
                      <?php
                          if($info['expense_type_name']!='')
                            { 
                        ?>
                          <?php echo $info['expense_type_name']; ?>
                      <?php } else{?>
                          Multiple Expences
                      <?php } ?>
                    </td>
                    <td>
                      <?php
                            if($info['expense_category']!='')
                              { 
                          ?>
                            <?php echo $info['expense_category']; ?>
                      <?php } else{?>
                            Multiple Expences
                      <?php } ?>
                    </td>
                    <td>
                      <?php 
                        if($info['approval']=='no' && $info['hold']=='yes')
                          {
                        ?>
                        Hold
                        
                        <?php } else if($info['approval']=='yes'  && $info['hold']=='no'){ ?>
                          Approved
                      <?php } else if($info['approval']=='no'  && $info['hold']=='pending'){ ?>
                        Pending
                      <?php } ?>
                    </td>

                    <td>
                          <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>" class="itinerary_css"><i class="fas fa-eye" aria-hidden="true" style="color:black" ;="" title="view"></i></a> &nbsp;/&nbsp;

                          <a href="<?php echo $module_url_path;?>/edit/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>" class="itinerary_css"><i class="fas fa-edit" aria-hidden="true" style="color:blue" ;="" title="edit"></i></a> &nbsp;/&nbsp;
                          
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; 
					                  ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red"; title="delete"></i></a>
                        
                    </td>
                    
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                </table>
                 <?php //} else
            //     { echo '<div class="alert alert-danger alert-dismissable">
            //     <i class="fa fa-ban"></i>
            //     <b>Alert!</b>
            //     Sorry No records available
            //   </div>' ; } ?>
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
