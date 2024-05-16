<style>
  .card_title {
    /* display: inline-block; */
    width: 50px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
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
              <a href="<?php echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
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
              <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card">
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">Add Slider Content</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  
                  if(count($arr_data) > 0 ) 
                   {
                       ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Type</th>
                    <th>Tour Name</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Action</th>
                    <!-- <th>Is Active?</th> -->
                    <th>Remark</th>
                    <th>Action</th>
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
                    <td><?php echo $info['package_type'] ?></td>
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <td class="card_title"><?php echo mb_substr($info['description'], 0, 18) ?>...</td>
                    <!-- <td> -->
                      <!-- <img src="<?php //echo base_url(); ?>uploads/suggestion_image/<?php //echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Slider Image"> -->
                        <!-- <?php //if(!empty($info['image_name'])){ ?>
                          <img src="<?php //echo base_url(); ?>uploads/suggestion_image/<?php //echo $info['image_name']; ?>" width="50%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php //echo $info['image_name']; ?>">
                        <?php //} ?>
                        <?php //if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php //echo base_url(); ?>uploads/suggestion_image/<?php //echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php //if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php //} ?> -->
                    <!-- </td> -->
                    <td><?php echo $info['priority'] ?></td>
                    <td><?php echo $info['status'] ?></td>
                    <!-- <td>
                        <?php 
                        //if($info['is_active']=='yes')
                          //{
                        ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //$aid=base64_encode($info['id']); 
							            //echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php //} else { ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //$aid=base64_encode($info['id']); 
							            //echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php //} ?>
                    </td> -->
                      <?php
                      if($info['admin_remark']!==''){
                        ?>
                        <td class="card_title"><?php echo mb_substr($info['admin_remark'], 0, 18) ?>...</td>
                      <?php } else { ?>
                        <td>No Remark form Admin</td>
                      <?php } ?>
                    <td>
                    <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); 
					            echo rtrim($aid, '='); ?>" title="View"><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;/&nbsp;
                    <a href="<?php echo $module_url_path;?>/edit/<?php $aid=base64_encode($info['id']); 
					            echo rtrim($aid, '='); ?>" title="Update"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                    <a href="<?php echo $module_url_path;?>/delete/<?php $aid=base64_encode($info['id']); 
					            echo rtrim($aid, '='); ?>" onclick="return confirm('Are You Sure You Want To Delete This Record?')"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                    </td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                 <?php } else
                {echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
              </div>' ; } ?>
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
