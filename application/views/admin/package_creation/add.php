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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a> -->
              
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
              <form method="post" enctype="multipart/form-data" id="">
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">

                      <div class="accordion" id="accordionExample">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Accordion Item #1
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                              <form method="post" enctype="multipart/form-data" id="">
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                            <label>Select Tour Number</label> 
                            <select class="form-control" style="width: 100%;" name="tour_number" id="tour_number" required="required">
                              <option value="">Select Tour Number</option>
                              <?php
                                foreach($packages_data as $packages_info) 
                                { 
                              ?>
                                <option value="<?php echo $packages_info['id']; ?>"><?php echo $packages_info['tour_number']; ?></option>
                              <?php } ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="tour_days" id="tour_days" placeholder="Enter seat count" > -->
                      </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Tour Name</label> 
                            <input type="text" readonly class="form-control" name="tour_name" id="tour_name" placeholder="Enter tour name" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tour Total Days</label> 
                            <input type="text" readonly class="form-control" name="tour_days" id="tour_days" placeholder="Enter tour days" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tour Start Date</label> 
                            <input type="date" class="form-control" name="tour_start_date" id="tour_start_date" placeholder="Enter Tour Start Date" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tour End Date</label> 
                            <input type="date" class="form-control" name="tour_end_date" id="tour_end_date" placeholder="Enter Tour End Date" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Inclusion</label>
                        <textarea class="form-control" name="inclusion" id="inclusion" placeholder="Enter Inclusion" required="required"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Terms & Conditions</label>
                        <textarea class="form-control" name="terms_conditions" id="terms_conditions" placeholder="Enter Terms & Condition" required="required"></textarea>
                        </div>
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Accordion Item #2
                              </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                              </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div>
                        </div>
                            
                      </div>
                    </div>

                  </div>
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
