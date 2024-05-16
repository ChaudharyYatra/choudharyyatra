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
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="edit_expense_category">
                <div class="card-body">
                <div class="row" id="main_row">
                    <?php
                    foreach($expense_category_data as $expense_category_info) 
                    { 
                        ?>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Expense Type</label>
                            <select class="select_css" name="expense_type[]" id="expense_type" required>
                            <option value="">Select Expense Type</option>
                            <?php foreach($arr_data as $info){ ?> 
                                <option value="<?php echo $info['id'];?>" <?php if(isset($expense_category_info['expense_type'])){if($info['id'] == $expense_category_info['expense_type']) {echo 'selected';}}?>><?php echo $info['expense_type_name'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                        <label>Expense Category</label>
                        <input type="text" class="form-control" name="expense_category[]" id="expense_category" placeholder="Enter Expense Category" value="<?php echo $expense_category_info['expense_category'];?>">
                        <!-- <input type="text" readonly class="form-control" name="expense_type_id[]" id="expense_type_id" placeholder="Enter tour number" value="<?php //echo $info['id'] ?>" required="required"> -->
                        <input type="hidden" readonly class="form-control" name="expense_category_id[]" id="expense_category_id" placeholder="Enter tour number" value="<?php echo $expense_category_info['id'] ?>" required="required">
                    </div>
                    </div>

                    <div class="col-md-2 mt-4">
                        <div class="form-group">
                            <label></label>
                            <button type="button" class="btn btn-primary" name="submit" value="add_more" name="add_more_category" id="add_more_category">Add More</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
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
