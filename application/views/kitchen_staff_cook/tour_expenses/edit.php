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
                <?php foreach($tour_expenses_all as $tour_expenses_all_info){ ?> 
                    <form method="post" enctype="multipart/form-data" id="edit_tour_expenses">   
                    <div class="row">
                        <!---======================== this tour title and tour date in select field and apply dependancy on tour title wise tour date ====================== -->

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                            <label>Tour No / Name</label>
                                <select class="form-control" name="tour_number" id="tour_number" onfocus='this.size=5;' onblur='this.size=1;' 
                                    onchange='this.size=1; this.blur();'>
                                <option value="">Select tour title</option>
                                <?php //foreach($packages_data as $packages_data_value){ ?> 
                                    <option value="<?php //echo $packages_data_value['id']; ?>" <?php //if($packages_data_value['id']==$tour_expenses_all_info['package_id']) { echo "selected"; } ?>><?php //echo $packages_data_value['tour_number'];?> -  <?php //echo $packages_data_value['tour_title'];?></option>
                                    <?php //} ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour date</label>
                                <select class="select_css" name="tour_date" id="tour_date" required>
                                <option value="">Select Tour Date</option>
                                        <?php //foreach($package_date as $package_date_value){ ?> 
                                        <option value="<?php //echo $package_date_value['id'];?>" <?php //if($package_date_value['id']==$tour_expenses_all_info['package_date_id']){echo "selected";} ?>><?php //echo $package_date_value['journey_date'];?></option>
                                        <?php //} ?>
                                </select>
                            </div>
                        </div> -->
                        <!---======================== this tour title and tour date in select field and apply dependancy on tour title wise tour date ====================== -->
                        <?php foreach($tour_expenses_all as $tour_expenses_all_info){ ?> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour No / Name</label>
                                <input type="text" class="form-control" name="tour_number" id="tour_number" value="<?php echo $tour_expenses_all_info['tour_number'];?> - <?php echo $tour_expenses_all_info['tour_title'];?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour date</label>
                                <input type="text" class="form-control" name="tour_date" id="tour_date" value="<?php echo $tour_expenses_all_info['journey_date'];?>" readonly>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expenses date</label>
                                <input type="date" class="form-control" name="expense_date" id="expense_date" placeholder="Enter Expense Date" required value="<?php echo $tour_expenses_all_info['expense_date'];?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pax type</label>
                                <select class="select_css" name="pax_type" id="pax_type" required>
                                    <option value="">Select Pax Type</option>
                                    <option value="Customer" <?php if(isset($tour_expenses_all_info['pax_type'])){if("Customer" == $tour_expenses_all_info['pax_type']) {echo 'selected';}}?>>Customer</option>
                                    <option value="Staff" <?php if(isset($tour_expenses_all_info['pax_type'])){if("Staff" == $tour_expenses_all_info['pax_type']) {echo 'selected';}}?>>Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expense Head</label>
                                <select class="select_css" name="expense_type" id="expense_type" required>
                                    <option value="">Select Expense Head</option>
                                    <?php foreach($expense_type_data as $expense_type_info){ ?> 
                                        <!-- <option value="<?php //echo $expense_type_info['id'];?>"><?php //echo $expense_type_info['expense_type_name'];?></option> -->
                                        <option value="<?php echo $expense_type_info['id']; ?>" <?php if($expense_type_info['id']==$tour_expenses_all_info['expense_type']) { echo "selected"; } ?>><?php echo $expense_type_info['expense_type_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub-Expenses Head</label>
                                <select class="form-control" name="expense_category" id="expense_category" onchange='Expenses_category(this.value); 
                                  this.blur();' onfocus='this.size=4;' onblur='this.size=1;'>
                                        <option value="">Select Sub-Expenses Head</option>
                                        <option value="Other" <?php if(isset($tour_expenses_all_info['expense_category_id'])){if("Other" == $tour_expenses_all_info['expense_category_id']) {echo 'selected';}}?>>Other</option>
                                        <?php foreach($expense_category_data as $expense_category_info){ ?> 
                                        <option value="<?php echo $expense_category_info['id'];?>" <?php if($expense_category_info['id']==$tour_expenses_all_info['expense_category_id']){echo "selected";} ?>><?php echo $expense_category_info['expense_category'];?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6" id="other_expense_category_div" style='display:none;'>
                            <div class="form-group">
                                <label>Other Sub-Expenses Head</label>
                                <input type="text" class="form-control mealplan_css" name="other_expense_category" id="other_expense_category" placeholder="Enter other sub expense category" value="<?php echo $tour_expenses_all_info['other_expense_category'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Place</label>
                                <input type="text" class="form-control" name="expense_place" id="expense_place" placeholder="Enter Place" required value="<?php echo $tour_expenses_all_info['expense_place'];?>">
                            </div>
                        </div>
                               
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bill Number</label>
                                <input type="text" class="form-control" name="bill_number" id="bill_number" placeholder="Enter bill Number" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $tour_expenses_all_info['bill_number'];?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Pax</label>
                                <input type="text" class="form-control" name="total_pax" id="total_pax" placeholder="Enter total pax" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $tour_expenses_all_info['total_pax'];?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bill Amount</label>
                                <input type="text" class="form-control" name="expense_amt" id="expense_amt" placeholder="Enter Expense Amount" required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $tour_expenses_all_info['expense_amt'];?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Upload Attachment</label>
                                <input type="file" name="image_name" id="image_name">
                                <br><span class="text-danger">Please select only PDF,JPG,PNG,JPEG,PDF format files.</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Uploaded Attachment</label><br>
                                <?php if(!empty($tour_expenses_all_info['image_name'])){ ?>
                                <img src="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $tour_expenses_all_info['image_name']; ?>" width="50%">
                                <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $tour_expenses_all_info['image_name']; ?>">
                                <?php } ?>

                                <?php if(!empty($tour_expenses_all_info['image_name'])){ ?>
                                    <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $tour_expenses_all_info['image_name']; ?>">Download</a>
                                    <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($tour_expenses_all_info['image_name'])){echo $tour_expenses_all_info['image_name'];}?>">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image_name_2" id="image_name_2">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                        </div>
                      
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Attachment</label><br>
                            <?php if(!empty($tour_expenses_all_info['image_name_2'])){ ?>
                              <img src="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $tour_expenses_all_info['image_name_2']; ?>" width="50%">
                              <input type="hidden" name="old_new_name" id="old_new_name" value="<?php echo $tour_expenses_all_info['image_name_2']; ?>">
                            <?php } ?>

                            <?php if(!empty($tour_expenses_all_info['image_name_2'])){ ?>
                              <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/<?php echo $tour_expenses_all_info['image_name_2']; ?>">Download</a>
                              <input type="hidden" name="old_new_name" id="old_new_name" value="<?php if(!empty($tour_expenses_all_info['image_name_2'])){echo $tour_expenses_all_info['image_name_2'];}?>">
                            <?php } ?>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Remark(optional)</label>
                                <textarea class="form-control" name="tour_expenses_remark" id="tour_expenses_remark" placeholder="Enter Expense Remark"><?php echo $tour_expenses_all_info['tour_expenses_remark'];?></textarea>
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
                <?php } ?>
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
  

</body>
</html>