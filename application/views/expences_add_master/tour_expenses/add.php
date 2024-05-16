
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    img{
        width:25% !important;
        height:25% !important;
    }

    table{
        table-layout: fixed;
        display: block;
        overflow: auto;
    }
    .for_row_set .row_set{
        width:135px;

    }
    .for_row_set .row_set1{
        width:70px;

    }
    .mealplan_css{
            border: 1px solid red !important;
        }

    .cash_payment_div{
        border: 1px solid red;
        padding: 10px;
        margin-top:10px;
        margin-bottom:40px;
    }
    .add_more_css{
        margin-top:30px;
    }

    .remove_color .form-control{
        color: black !important;
    }
    .remove_color .select_css{
        color: black !important;
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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
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
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="add_tour_expenses">   
                    <div class="row">
                        <!---======================== this tour title and tour date in select field and apply dependancy on tour title wise tour date ====================== -->
                        
                        <!---======================== this tour title and tour date in select field and apply dependancy on tour title wise tour date ====================== -->


                        <div class="col-md-6">
                            <div class="form-group remove_color">
                                <label>Expenses Date</label>
                                <input type="date" class="form-control" name="expense_date" id="expense_date" placeholder="Enter Expense Date" max="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Place</label>
                                <input type="text" class="form-control" name="expense_place" id="expense_place" placeholder="Enter Place" required oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Expenses Type</label> <br>
                                <input type="radio" id="single_expenses_type" name="tour_expenses_type" value="1" onclick="main();"/>&nbsp;&nbsp;&nbsp;Single&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="multiple_expenses_type" name="tour_expenses_type" value="0" onclick="sub();"/>&nbsp;&nbsp;&nbsp;Multiple<br>
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bill Number</label>
                                <input type="text" class="form-control" name="bill_number" id="bill_number" placeholder="Enter bill Number" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>        

                        <div class="col-md-6">
                            <div class="form-group remove_color">
                                <label>Bill Date</label>
                                <input type="date" class="form-control" name="bill_date" id="bill_date" placeholder="Enter Bill Date" max="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group remove_color">
                                <label>Pax type (Expense for)</label>
                                <select class="select_css" name="pax_type" id="pax_type" required>
                                    <option value="">Select Pax Type</option>
                                    <option value="Customer">Customer</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Pax</label>
                                <input type="text" class="form-control" name="total_pax" id="total_pax" placeholder="Enter total pax" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>

                        <div class="col-md-6" id="expenses_head_div" style='display:none;'>
                            <div class="form-group">
                                <label>Expense Head</label>
                                <select class="select_css" name="expense_type" id="expense_type" >
                                    <option value="">Select Expense Head Type</option>
                                    <?php foreach($expense_type_data as $expense_type_info){ ?> 
                                        <option value="<?php echo $expense_type_info['id'];?>"><?php echo $expense_type_info['expense_type_name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="sub_expenses_head_div" style='display:none;'>
                            <div class="form-group">
                                <label>Sub-Expenses Head</label>
                                <select class="select_css" name="expense_category" id="expense_category" onchange='Expenses_category(this.value);'>
                                        <option value="">Select Sub-Expenses Head </option>
                                        
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bill Amount</label>
                                <input type="text" class="form-control" name="expense_amt" id="expense_amt" placeholder="Enter Expense Amount" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>

                        <div class="col-md-6" id="other_expense_category_div" style='display:none;'>
                            <div class="form-group">
                                <label>Other Sub-Expenses Head</label>
                                <input type="text" class="form-control mealplan_css" name="other_expense_category" id="other_expense_category" placeholder="Enter other sub expense category" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload Photo/PDF</label><br>
                                <input type="file" name="image_name" id="image_name" accept="image/png, image/jpg, image/jpeg, image/pdf">
                                <br><span class="text-danger">Please select only PDF,JPG,PNG,JPEG format files.</span>
                            </div>
                        </div>

                        <div class="col-md-12 cash_payment_div" id="sub_main_tour_div1" style='display:none;'>
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>Expense Head</th>
                                            <th>Sub-Expenses Head</th>
                                            <th>Product Name</th>
                                            <th>Unit</th>
                                            <th>Quantity</th>
                                            <th>Total Amt.</th>
                                            <th>Per Unit Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                            <td>
                                                <select class="select_css expense_type" name="expense_type_row[]" id="expense_type_row<?php echo $i;?>" >
                                                    <option value="">Select </option>
                                                    <?php foreach($expense_type_data as $expense_type_info){ ?> 
                                                        <option value="<?php echo $expense_type_info['id'];?>"><?php echo $expense_type_info['expense_type_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select_css sub_expenses_head" name="expense_category_row[]" id="expense_category_row<?php echo $i;?>">
                                                        <option value="">Select </option>
                                                        
                                                </select>
                                                <br>
                                                <input style="display: none;margin-top: 8px;" type="text" class="form-control other-input" name="other_name[]" id="other_name<?php echo $i;?>" placeholder="Enter name" >
                                            </td>
                                            
                                            <td>
                                                <select class="select_css" name="product_name[]" id="product_name<?php echo $i;?>" >
                                                    <option value="">Select </option>
                                                    <?php foreach($expense_category as $expense_category_info){ ?> 
                                                        <option value="<?php echo $expense_category_info['id'];?>"><?php echo $expense_category_info['expense_category'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select_css" name="measuring_unit[]" id="measuring_unit<?php echo $i;?>" >
                                                    <option value="">Select </option>
                                                    <?php foreach($measuring_unit as $measuring_unit_info){ ?> 
                                                        <option value="<?php echo $measuring_unit_info['id'];?>"><?php echo $measuring_unit_info['unit_type'];?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </td>
                                            <td><input type="text" class="form-control quantity" name="quantity[]" id="quantity<?php echo $i;?>" placeholder="Enter quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></td>
                                            <td><input type="text" class="form-control rate" name="rate[]" id="rate<?php echo $i;?>" placeholder="Enter rate" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></td>
                                            <td><input readonly type="text" class="form-control per_unit_rate" name="per_unit_rate[]" id="per_unit_rate" placeholder="Enter per unit rate"></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" attr_add_id="1" name="submit" value="expenses_add_more" id="expenses_add_more">Add More</button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Upload Photo/PDF</label>
                            <input type="file" name="image_name_2" id="image_name_2" accept="image/png, image/jpg, image/jpeg, image/pdf">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expenses Details(optional)</label>
                                <textarea class="form-control" name="tour_expenses_remark" id="tour_expenses_remark" placeholder="Enter Expense Remark"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <!-- <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button>  -->
                        <!-- <a href="<?php //echo $module_booking_basic_info; ?>/add/<?php //echo $enquiry_id;?>/1"><button type="button" class="btn btn-warning" name="back_btn">Back</button></a> -->
                        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div>
                </form>
                
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
<!-- tour expenses in that single and multiple click script-->
<script>
    function sub(){
    document.getElementById('sub_main_tour_div1').style.display = 'block';
    document.getElementById('expenses_head_div').style.display = 'none';
    document.getElementById('sub_expenses_head_div').style.display = 'none';
    }
    function main(){
    document.getElementById('sub_main_tour_div1').style.display = 'none';
    document.getElementById('expenses_head_div').style.display = 'block';
    document.getElementById('sub_expenses_head_div').style.display = 'block';
    document.getElementById('expense_type').value = "";
    document.getElementById('expense_category').value = "";
    }
</script>
<!-- tour expenses in that single and multiple click script-->

