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
                <table id="" class="table table-bordered table-hover">
                <tr>
                    <th>Package Type</th>
                    <td><?php echo $info['package_type']; ?></td>

                    <th>Tour Name</th>
                    <td><?php echo $info['tour_number']; ?> - <?php echo $info['tour_title']; ?></td>

                    <th>Date</th>
                    <td><?php echo date("d-m-Y",strtotime($info['created_at'])); ?></td>

                   </tr>
                   <tr>
                    <th>City</th>
                    <td><?php echo $info['city_name']; ?></td>
                  
                    <?php if($info['city']=='Other'){?>
                      <th>Other City Name</th>
                      <td><?php echo $info['other_city']; ?></td>
                    <?php }?>

                    <th>Status</th>
                    <td><?php echo $info['status']; ?></td>

					          

                   </tr>

                    <tr>
                    <th>Upload Attatchment</th>
                    <td>
                      <?php if(!empty($info['image_name'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name']; ?>" width="20%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>
                    </td>

                    <th>Upload Attatchment</th>
                    <td>
                      <?php if(!empty($info['image_name_2'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_2']; ?>" width="20%">
                          <input type="hidden" name="old_new_name" id="old_new_name" value="<?php echo $info['image_name_2']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name_2'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_2']; ?>">Download</a>
                            <input type="hidden" name="old_new_name" id="old_new_name" value="<?php if(!empty($info['image_name_2'])){echo $info['image_name_2'];}?>">
                        <?php } ?>
                    </td>

                    <th>Upload Attatchment</th>
                    <td>
                      <?php if(!empty($info['image_name_3'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_3']; ?>" width="20%">
                          <input type="hidden" name="old_inclusion_name" id="old_inclusion_name" value="<?php echo $info['image_name_3']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name_3'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/suggestion_image/<?php echo $info['image_name_3']; ?>">Download</a>
                            <input type="hidden" name="old_inclusion_name" id="old_inclusion_name" value="<?php if(!empty($info['image_name_3'])){echo $info['image_name_3'];}?>">
                        <?php } ?>
                    </td>

                  </tr>
                  <tr>
                  <th>Priority</th>
                    <td><?php echo $info['priority']; ?></td>

                    <th>What You Want To Suggest</th>
                    <td><?php echo $info['description']; ?></td>

                    <th>Remark</th>
                    <td><?php echo $info['admin_remark']; ?></td>
                  </tr>

                  </table>
              </div>
              
        <br>
        <div class="row">


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
  

</body>
</html>
