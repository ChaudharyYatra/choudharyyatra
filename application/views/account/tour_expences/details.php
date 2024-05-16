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
          <!-- left column -->
          <div class="col-md-12 col-sm-12">
            <!-- jquery validation -->
            <?php $this->load->view('account/layout/account_alert'); ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  
                  <tr>  
                    <th>Expense Type</th>
                    <td><?php echo $info['expense_type_name']; ?></td>

                    <th>Expense Category</th>
                    <td><?php echo $info['expense_category']; ?></td>
					  
                    <th>Expense Place</th>
                    <td><?php echo $info['expense_place']; ?></td>

                  </tr>

                  <tr>
                    <th>Expense Date</th>
                    <td><?php echo $info['expense_date']; ?></td>

                    <th>Bill Number</th>
                    <td><?php echo $info['bill_number']; ?></td>

                    <th>Total Pax</th>
                    <td><?php echo $info['total_pax']; ?></td>
					  
                  </tr>

                  <tr>
                    <th>Expense Amt</th>
                    <td><?php echo $info['expense_amt']; ?></td>

                    <th>Upload Attatchment 1</th>

                    <td>

                        <?php if(!empty($info['image_name'])){ ?>
                        <img src="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name']; ?>" width="20%">
                        <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>

                    </td>

                    <th>Upload Attatchment 2</th>
                    <td>
                        <?php if(!empty($info['image_name_2'])){ ?>
                        <img src="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name_2']; ?>" width="20%">
                        <input type="hidden" name="old_new_name" id="old_new_name" value="<?php echo $info['image_name_2']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name_2'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $info['image_name_2']; ?>">Download</a>
                            <input type="hidden" name="old_new_name" id="old_new_name" value="<?php if(!empty($info['image_name_2'])){echo $info['image_name_2'];}?>">
                        <?php } ?>

                    </td>
					  
                  </tr>
                  <tr>
                    <th>Tour Expenses Remark</th>
                    <td><?php echo $info['tour_expenses_remark']; ?></td>

                    <th></th>
                    <td></td>

                    <th></th>
                    <td></td>
					  
                  </tr>

                  </table>
              </div>
              
            <br>
            <div class="row">


            </div>
            <?php } ?>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
