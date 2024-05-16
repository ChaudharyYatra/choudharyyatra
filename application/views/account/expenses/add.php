<style>
  .mealplan_css{
            border: 1px solid red !important;
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
              <form method="post" enctype="multipart/form-data" id="add_expenses">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <label>Parent Group</label>
                            <input type="text" class="form-control" name="parent_group" id="parent_group" placeholder="Enter Parent Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required"> -->
                            <label>Voucher Type</label>
                            <select class="select_css" style="width: 100%;" name="voucher_type" id="voucher_type">
                            <option value="">Select Voucher Type</option>
                            <?php
                                foreach($voucher_types as $voucher_types_info) 
                                { 
                                  // print_r($arr_data_info);
                            ?>
                                <option value="<?php echo $voucher_types_info['id']; ?>"><?php echo $voucher_types_info['voucher_type']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Particular(for which expenses)</label>
                            <input type="text" class="form-control" name="particular_expenses" id="particular_expenses" placeholder="" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name</label>
                            <select class="select_css" style="width: 100%;" name="company_name" id="company_name">
                            <option value="">Select Company Name</option>
                            <?php
                                foreach($company_information as $company_information_info) 
                                { 
                                  // print_r($arr_data_info);
                            ?>
                                <option value="<?php echo $company_information_info['id']; ?>"><?php echo $company_information_info['company_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Account Number</label>
                            <input readonly type="text" class="form-control" name="account_no" id="account_no" placeholder="Enter account number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Details</label>
                            <textarea class="form-control" name="expenses_details" id="expenses_details" placeholder="Enter details"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Expenses Type</label> <br>
                            <input type="radio" id="single_expenses_type" name="tour_expenses_type" value="1" onclick="main();"/>&nbsp;&nbsp;&nbsp;Single&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="multiple_expenses_type" name="tour_expenses_type" value="0" onclick="sub();"/>&nbsp;&nbsp;&nbsp;Multiple<br>
                        </div>
                    </div> 

                    <div class="col-md-6" id="particular_expenses_div" style='display:none;'>
                        <div class="form-group">
                            <label>Particular(for which expenses)</label>
                            <input type="text" class="form-control" name="single_particular_expenses" id="single_particular_expenses" placeholder="" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>

                    <!-- <div class="col-md-6" id="amount_div" style='display:none;'>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="single_amount" id="single_amount" placeholder="Enter amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div> -->

                    <div class="col-md-6" id="single_total_amount_div" style='display:none;'>
                        <div class="form-group">
                            <label>Bill Amount</label>
                            <input type="text" class="form-control" name="single_total_amount" id="single_total_amount" placeholder="Enter total amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div> 

                    <div class="col-md-6" id="multiple_total_amount_div" style='display:none;'>
                        <div class="form-group">
                            <label>Bill Amount</label>
                            <input readonly type="text" class="form-control" name="multiple_total_amount" id="multiple_total_amount" placeholder="Enter total amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div> 

                    <div class="col-md-12 cash_payment_div" id="sub_main_tour_div1" style='display:none;'>
                        <div class="form-group">
                            <table border="1" class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Particular(for which expense)</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="particular_expenses[]" id="particular_expenses<?php echo $i;?>" placeholder="Enter particular expenses"></td>
                                        <td><input type="text" class="form-control amount" name="amount[]" id="amount<?php echo $i;?>" placeholder="Enter amount"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" attr_add_id="1" name="submit" value="expenses_add_more" id="expenses_add_more">Add More</button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
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
  
  <script>
    function sub(){
    document.getElementById('sub_main_tour_div1').style.display = 'block';
    document.getElementById('particular_expenses_div').style.display = 'none';
    document.getElementById('single_total_amount_div').style.display = 'none';
    document.getElementById('multiple_total_amount_div').style.display = 'block';
    // document.getElementById('amount_div').style.display = 'none';
    // document.getElementById('total_amount_div').style.display = 'block';
    }
    function main(){
    document.getElementById('sub_main_tour_div1').style.display = 'none';
    document.getElementById('particular_expenses_div').style.display = 'block';
    document.getElementById('single_total_amount_div').style.display = 'block';
    document.getElementById('multiple_total_amount_div').style.display = 'none';
    // document.getElementById('amount_div').style.display = 'block';
    // document.getElementById('total_amount_div').style.display = 'none';
    }
</script>

</body>
</html>
