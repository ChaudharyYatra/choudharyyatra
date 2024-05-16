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
              <?php
                   foreach($expenses_account as $info) 
                   { 
                    // print_r($info); die;
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_expenses">
                <div class="card-body">
                 <div class="row">
                 <input type="hidden" class="form-control quantity" name="add_more_expenses_id" id="add_more_expenses_id" placeholder="Enter quantity" value="<?php echo $info['id']; ?>" required>
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
                                //   print_r($arr_data_info);
                            ?>
                                <option value="<?php echo $voucher_types_info['id']; ?>" <?php if($voucher_types_info['id']==$info['voucher_type_id']) { echo "selected"; } ?>><?php echo $voucher_types_info['voucher_type']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
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
                                <option value="<?php echo $company_information_info['id']; ?>" <?php if($company_information_info['id']==$info['company_name_id']) { echo "selected"; } ?>><?php echo $company_information_info['company_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Account Number</label>
                            <input readonly type="text" class="form-control" name="account_no" id="account_no" placeholder="Enter account number" value="<?php echo $info['acc_no']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Details</label>
                            <textarea class="form-control" name="expenses_details" id="expenses_details"  placeholder="Enter details"><?php echo $info['expenses_details']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Expenses Type</label> <br>
                        <?php if($info['tour_expenses_type'] == '0'){?>
                            <input disabled type="radio" id="single_expenses_type" name="tour_expenses_type" value="1" onclick="main();" <?php if(isset($info['tour_expenses_type'])){if($info['tour_expenses_type']=='1') {echo'checked';}}?>/>&nbsp;&nbsp;&nbsp;Single&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="multiple_expenses_type" name="tour_expenses_type" value="0" onclick="sub();" <?php if(isset($info['tour_expenses_type'])){if($info['tour_expenses_type']=='0') {echo'checked';}}?>/>&nbsp;&nbsp;&nbsp;Multiple<br>
                        <?php }else{ ?>
                            <input type="radio" id="single_expenses_type" name="tour_expenses_type" value="1" onclick="main();" <?php if(isset($info['tour_expenses_type'])){if($info['tour_expenses_type']=='1') {echo'checked';}}?>/>&nbsp;&nbsp;&nbsp;Single&nbsp;&nbsp;&nbsp;
                            <input disabled type="radio" id="multiple_expenses_type" name="tour_expenses_type" value="0" onclick="sub();" <?php if(isset($info['tour_expenses_type'])){if($info['tour_expenses_type']=='0') {echo'checked';}}?>/>&nbsp;&nbsp;&nbsp;Multiple<br>
                        <?php } ?>
                        </div>
                    </div> 

                    <?php if($info['tour_expenses_type'] == '1'){?>
                    <div class="col-md-6" id="particular_expenses_div">
                        <div class="form-group">
                            <label>Particular(for which expenses)</label>
                            <input type="text" class="form-control" name="single_particular_expenses" id="single_particular_expenses" value="<?php echo $info['single_particular_expenses']; ?>" placeholder="">
                        </div>
                    </div>
                    
                    <div class="col-md-6" id="single_total_amount_div">
                        <div class="form-group">
                            <label>Bill Amount</label>
                            <input type="text" class="form-control" name="single_total_amount" id="single_total_amount" placeholder="Enter total amount" value="<?php echo $info['single_total_amount']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div> 
                    <?php } ?>

                    <?php if($info['tour_expenses_type'] == '0'){?>
                    <div class="col-md-6" id="multiple_total_amount_div">
                        <div class="form-group">
                            <label>Bill Amount <?php echo $info['multiple_total_amount']; ?></label>
                            <input readonly type="text" class="form-control" name="multiple_total_amount" id="multiple_total_amount" placeholder="Enter total amount" value="<?php echo $info['multiple_total_amount']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div> 
                    <div class="col-md-6">
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label></label>
                            <?php if($info['tour_expenses_type'] == '0'){?>
                            <button type="button" class="btn btn-primary add_more_css float-end mb-2" attr_add_id="0" name="submit" value="expenses_edit_more" id="expenses_edit_more">Add More Product</button>
                            <?php } ?>
                        </div>
                    </div> 

                    <?php if($info['tour_expenses_type'] == '0'){?>
                    <div class="col-md-12 cash_payment_div" id="sub_main_tour_div1">
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
                                    <?php $i=1;
                                    foreach($multiple_expenses_account as $multiple_expenses_account_info) 
                                    { 
                                      // print_r($multiple_expenses_account_info);
                                    ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="particular_expenses[]" id="particular_expenses<?php echo $i;?>" placeholder="Enter particular expenses" value="<?php echo $multiple_expenses_account_info['particular_expenses']; ?>"></td>
                                        <td><input type="text" class="form-control amount" name="amount[]" id="amount<?php echo $i;?>" placeholder="Enter amount" value="<?php echo $multiple_expenses_account_info['amount']; ?>"></td>
                                        <td>
                                          <input type="hidden" class="form-control" name="expenses_company_name_id[]" id="expenses_company_name_id" value="<?php echo $multiple_expenses_account_info['id']; ?>" placeholder="Enter per unit rate" required>
                                          <!-- <a onclick="return confirm('Are You Sure You Want To Delete This Record? ')" href="<?php //echo $module_url_path;?>/add_more_delete/<?php //echo $multiple_expenses_account_info['id']; ?>" title="delete"><button value="<?php //echo $multiple_expenses_account_info['id']; ?>" class="btn btn-primary delete_instruction">Delete</button></a> -->
                                          <button type="button" value="<?php echo $multiple_expenses_account_info['id']; ?>" class="btn btn-primary delete_instruction"  value="<?php echo $multiple_expenses_account_info['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <?php } }?>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
              <?php } ?>
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
