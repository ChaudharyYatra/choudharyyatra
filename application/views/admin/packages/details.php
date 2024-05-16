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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <th>Academic Year</th>
                    <td><?php echo $info['year']; ?></td>

                    <th>Tour Days</th>
                    <td><?php echo $info['tour_number_of_days']; ?></td>
                      
                    <th>Tour Name</th>
                    <td><?php echo $info['tour_title']; ?></td>
                  </tr>

                  <tr>
                  <th>Tour No.</th>
                    <td><?php echo $info['tour_number']; ?></td>

                    <th>Rating</th>
                    <td><?php echo $info['rating']; ?></td>

                    <th>Destinations</th>
                    <td><?php echo $info['destinations']; ?></td>
                    
                  </tr>

                  <tr>
                    <th>Package Starting From Cost</th>
                    <td>Rs. <?php echo $info['cost']; ?></td>
                    <th>Image</th>
                    <td><img src="<?php echo base_url(); ?>uploads/packages/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                  
                    <th>Short Description</th>
                    <td><?php echo $info['short_description']; ?></td>
                  </tr>

                  </table>
              </div>
              
        <br>
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-full_description-tab" data-toggle="pill" href="#custom-tabs-one-full_description" role="tab" aria-controls="custom-tabs-one-full_description" aria-selected="true">Full Description</a>
                  </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-inclusion-tab" data-toggle="pill" href="#custom-tabs-one-inclusion" role="tab" aria-controls="custom-tabs-one-inclusion" aria-selected="false">Inclusion</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-terms_conditions-tab" data-toggle="pill" href="#custom-tabs-one-terms_conditions" role="tab" aria-controls="custom-tabs-one-terms_conditions" aria-selected="false">Terms and Conditions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-terms_conditions-tab" data-toggle="pill" href="#custom-tabs-one-itinerary" role="tab" aria-controls="custom-tabs-one-terms_itinerary" aria-selected="false">Upload Itinerary PDF</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-contact_us-tab" data-toggle="pill" href="#custom-tabs-one-contact_us" role="tab" aria-controls="custom-tabs-one-contact_us" aria-selected="false">Contact Us</a>
                  </li> -->
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-full_description" role="tabpanel" aria-labelledby="custom-tabs-one-full_description-tab">
                    <?php echo $info['full_description']; ?>
                  </div>
                 
                  <div class="tab-pane fade" id="custom-tabs-one-inclusion" role="tabpanel" aria-labelledby="custom-tabs-one-inclusion-tab">
                    <!-- <?php //echo $info['inclusion']; ?> -->
                    <?php if(!empty($info['inclusion_img'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/inclusion_img/<?php echo $info['inclusion_img']; ?>" width="30%">
                                      <input type="hidden" name="old_inclusion_name" id="old_inclusion_name" value="<?php echo $info['inclusion_img']; ?>" required="required">
                                      <?php } ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-terms_conditions" role="tabpanel" aria-labelledby="custom-tabs-one-terms_conditions-tab">
                    <!-- <?php //echo $info['terms_conditions']; ?> -->
                    <?php if(!empty($info['tc_img'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/tc_img/<?php echo $info['tc_img']; ?>" width="30%">
                                      <input type="hidden" name="old_tc_name" id="old_tc_name" value="<?php echo $info['tc_img']; ?>" required="required">
                                      <?php } ?>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-itinerary" role="tabpanel" aria-labelledby="custom-tabs-one-terms_itinerary-tab">
                    <!-- <?php //echo $info['terms_conditions']; ?> -->
                    <?php if(!empty($info['pdf_name'])){ ?>
                              <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/package_daywise_program/<?php echo $info['pdf_name']; ?>">Download</a>
                                      <input type="hidden" name="old_pdf_name" id="old_pdf_name" value="<?php if(!empty($info['pdf_name'])){echo $info['pdf_name'];}?>">
                                      <?php } ?>
                  </div>
                  <!-- <div class="tab-pane fade" id="custom-tabs-one-contact_us" role="tabpanel" aria-labelledby="custom-tabs-one-short_contact_us-tab">
                    <?php //echo $info['contact_us']; ?>
                  </div> -->

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>


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