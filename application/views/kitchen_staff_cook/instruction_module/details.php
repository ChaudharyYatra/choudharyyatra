<style>
  .table-color{
    background:#00899f80;
  }
  .table-color-agent{
    background:#6c757d57;
    color:#000 !important;
  }
  
  .top-strip15{
    width: 15%;
  }
  .top-strip20{
    width: 20%;
  }
</style>

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
              <a href="<?php echo $module_url_path; ?>/index/<?php $aid=base64_encode($id); echo rtrim($aid, '=');?>/<?php $did=base64_encode($did); echo rtrim($did, '=');?>"><button class="btn btn-primary">Back</button></a>
              
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
           
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                      <?php  
                        foreach($arr_data_top as $info) 
                            { 
                              ?>
                      <table id="" class="table table-bordered table-hover table-color-agent">
                        <tr>
                          <th class="top-strip15">Tour Number - Name</th>
                          <td class="top-strip20"><?php echo $info['tour_number']; ?></td>

                          <th class="top-strip15">Upload Attachment</th>
                          <td class="top-strip20">
                            <?php if(!empty($info['image_name'])){ ?>
                              <img src="<?php echo base_url(); ?>uploads/tm_instraction/<?php echo $info['image_name']; ?>" width="20%">
                              <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                            <?php } ?>

                            <?php if(!empty($info['image_name'])){ ?>
                              <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tm_instraction/<?php echo $info['image_name']; ?>">Download</a>
                              <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                            <?php } ?>
                          </td>
                          
                        </tr>
                      </table>
                      <?php } ?>
                </div>
            
              <div class="card-body">
                
                <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>instraction</th>
                    <th>priority</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $i=1; 
                      foreach($arr_data as $info) 
                      { 
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $info['instraction']; ?></td>
                        <td><?php echo $info['priority']; ?></td>
                        <!-- <td>
                          
                        </td> -->
                      </tr>
                    <?php $i++; } ?>
                  </tbody>
                  
                  </table>
                  
              </div>
            
              
        <br>
        <div class="row">


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
