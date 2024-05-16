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
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
              
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
              <?php $this->load->view('account/layout/account_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if(count($arr_data) > 0 ) 
                { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Expense Type</th>
                    <th>Expense Category</th>
                    <th>Expense Place</th>
                    <th>Expense Date</th>
                    <th>Expense Amt</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['expense_type_name']; ?></td>
                    <td><?php echo $info['expense_category']; ?></td>
                    <td><?php echo $info['expense_place']; ?></td>
                    <td><?php echo $info['expense_date']; ?></td>
                    <td><?php echo $info['expense_amt']; ?></td>
                    <td>
                      <?php 
                        if($info['approval']=='yes'  && $info['hold']=='no')
                          {
                      ?>
                        Approved
                      <?php } else if($info['approval']=='no'  && $info['hold']=='yes'){?>
                        Hold
                      <?php } else { ?>
                        Pending
                      <?php } ?>
                    </td>

                    <td>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $i; ?>" class="enq_id" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item">Details</button> </a>
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


<?php  
                      
$i=1; 
foreach($arr_data as $info)
{ 

?>
  <div class="modal fade" id="exampleModal_<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Expenses Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo $module_url_path;?>/active_inactive">
            <div class="col-md-12">
              <div class="row">

              <input type="hidden" readonly class="form-control" name="expense_id" id="expense_id" value="<?php echo $info['package_id']; ?>" required>

                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Expense Type:</label>
                  <input type="text" readonly class="form-control" name="expense_type" id="expense_type" value="<?php echo $info['expense_type_name']; ?>" required>
                </div>
                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Expense Category:</label>
                  <input type="text" readonly class="form-control" name="expense_category" id="expense_category" value="<?php echo $info['expense_category']; ?>" required>
                </div>
                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Expense Place:</label>
                  <input type="text" readonly class="form-control" name="expense_place" id="expense_place" value="<?php echo $info['expense_place']; ?>" required>
                </div>
                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Expense Date:</label>
                  <input type="text" readonly class="form-control" name="expense_date" id="expense_date" value="<?php echo date("d-m-Y",strtotime($info['expense_date'])); ?>" required>
                </div>

                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Bill Number:</label>
                  <input type="text" readonly class="form-control" name="bill_number" id="bill_number" value="<?php echo $info['bill_number']; ?>" required>
                </div>
                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Total Pax:</label>
                  <input type="text" readonly class="form-control" name="total_pax" id="total_pax" value="<?php echo $info['total_pax']; ?>" required>
                </div>
                <div class="col-md-3 mb-2">
                  <label class="col-form-label">Expense Amount:</label>
                  <input type="text" readonly class="form-control" name="expense_amt" id="expense_amt" value="<?php echo $info['expense_amt']; ?>" required>
                </div>

                <div class="col-md-6 mb-2">
                  <label class="col-form-label">Upload Attatchment 1:</label><br>
                  <?php if(!empty($info['image_name'])){ ?>
                    <img src="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name']; ?>" width="40%">
                    <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                    <?php } ?>
                    <br>
                    <?php if(!empty($info['image_name'])){ ?>
                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name']; ?>">Download</a>
                        <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                  <?php } ?>
                </div>
                <div class="col-md-6 mb-2">
                  <label class="col-form-label">Upload Attatchment 2:</label><br>
                  <?php if(!empty($info['image_name_2'])){ ?>
                    <img src="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name_2']; ?>" width="40%">
                    <input type="hidden" name="old_new_name" id="old_new_name" value="<?php echo $info['image_name_2']; ?>">
                    <?php } ?>
                    <br>
                    <?php if(!empty($info['image_name_2'])){ ?>
                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name_2']; ?>">Download</a>
                        <input type="hidden" name="old_new_name" id="old_new_name" value="<?php if(!empty($info['image_name_2'])){echo $info['image_name_2'];}?>">
                  <?php } ?>
                </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <label class="col-form-label">Tour Expenses Remark:</label>
                  <textarea class="form-control" readonly name="tour_expenses_remark" id="tour_expenses_remark" required><?php echo $info['tour_expenses_remark']; ?></textarea>
                </div>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>

<?php $i++; } ?>
  


