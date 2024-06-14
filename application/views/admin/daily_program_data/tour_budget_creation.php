
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    /* img{
        width:25% !important;
        height:25% !important;
    } */

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
            <?php
            // Encrypt variables
            $encrypted_id = rtrim(base64_encode($id), '=');
            // $encrypted_no_of_days = rtrim(base64_encode($no_of_days), '=');
            ?>
            <a href="<?php echo $day_to_day_program_module; ?>/take_days/<?php echo $encrypted_id; ?>"><button class="btn btn-primary">Back</button></a>
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
                      

                        
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Total Ticket Cost</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_ticket_cost_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Total Munciple Tax</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_municipal_amt_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Parking Cost</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_parking_cost_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>State Permit Cost</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_state_permit_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Daily Tax</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_daily_tax_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Per Person KM Rates</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $total_km_rate_per_person;?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Staff Salary</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $staff_day_salary;?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Grocery Cost Per Person</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $grocery_cost_per_person;?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Total Final Amount</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $total_all_final_cost;?>">
                                </div>
                            </div>
                        
                        


                    </div>
                    <!-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <a href="<?php //echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div> -->
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
  


