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

                <table id="" class="table table-bordered table-striped">
                    <form>
                    <tr>
                        <th>Agent Name</th>
                        <td><select class="form-control" name="agent_name" id="agent_name" onfocus='this.size=5;' onblur='this.size=1;' 
                                onchange='this.size=1; this.blur();'>
                                <option value="">Select Agent Name</option>
                                
                                <!-- <option value="Other">Other</option> -->
                                <?php foreach($agent_data as $agent_data_value){ ?> 
                                    <option value="<?php echo $agent_data_value['id'];?>"><?php echo $agent_data_value['agent_name'];?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <th>From Date</th>
                        <td><input type="date" class="form-control" name="from_date" id="from_date"></td>

                        <th>To Date</th>
                        <td><input type="date" class="form-control" name="to_date" id="to_date"></td>
                    </tr>

                    <tr>
                        <th>Enquiry Status</th>
                        <td>
                            <input type="checkbox" class="selectall" name="enquiry_status[]" id="enquiry_status" value="All">&nbsp;&nbsp;All
                            &nbsp;&nbsp;<input type="checkbox" name="enquiry_status[]" id="enquiry_status" value="Final Payment">&nbsp;&nbsp;Final Payment
                            &nbsp;&nbsp;<input type="checkbox" name="enquiry_status[]" id="enquiry_status" value="In Process Of Payment">&nbsp;&nbsp;In Process Of Payment
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="enquiry_status[]" id="enquiry_status" value="Payment Not Paid">&nbsp;&nbsp;Payment Not Paid  
                        </td>

                        <td>
                            <button type="button" class="btn btn-primary" name="submit" value="submit" id="agentwise_payment_submit">search</button>
                        </td>
                    </tr>
                    </form>
                </table>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>Email address</th>
                    <th>Mobile No</th>
                    <th>Gender</th>
                    <th>Package Name</th>
                    <th>Payment Status</th>
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
