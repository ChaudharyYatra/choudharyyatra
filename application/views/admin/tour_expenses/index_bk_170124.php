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
              <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  //if(count($arr_data) > 0 ) 
              //{ ?>

                <table id="example1" class="table table-bordered table-striped">
                    <form>
                    <tr>
                    <th>Tour Details</th>
                    <td><select class="form-control" name="tour_number" id="tour_number" onfocus='this.size=5;' onblur='this.size=1;' 
                                    onchange='this.size=1; this.blur();'>
                                <option value="">Select tour Details</option>
                                <!-- <option value="Other">Other</option> -->
                                <?php foreach($packages_data as $packages_data_value){ ?> 
                                    <option value="<?php echo $packages_data_value['id'];?>"><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                                <?php } ?>
                                </select>
                    </td>

                    <th>Tour Date</th>
                    <td><select class="select_css" name="tour_date" id="tour_date" required>
                            <option value="">Select Tour Date</option>
                            <?php foreach($expense_type_data as $expense_type_info){ ?> 
                                <option value="<?php echo $expense_type_info['id'];?>"><?php echo $expense_type_info['expense_type_name'];?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                    <button type="button" class="btn btn-primary" name="submit" value="submit" id="expenses_submit">search</button>
                    </td>
                    </tr>
                    </form>

                </table>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                    <th>SN</th>
                    <th>Expense Type</th>
                    <th>Expense Category</th>
                    <th>Expense Place</th>
                    <th>Bill Number</th>
                    <th>Total Pax</th>
                    <th>Expense Amount</th>
                    <th>Expense Date</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Expense Remark</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody id="tid">
                  
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
