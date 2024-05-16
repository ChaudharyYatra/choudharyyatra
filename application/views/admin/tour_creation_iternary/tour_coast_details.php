<style>
        /* Add custom CSS for the accordion */
        .rotate-icon {
            transition: transform 0.3s ease;
        }
        .rotate-icon.collapsed {
            transform: rotate(-90deg);
        }

        .card-header{
        background-color: #cd85a8de;
        }
        .btn-link{
          color: #fff;
          font-weight: bold;
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
              <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button class="btn btn-primary">Back</button></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  if(count($tour_creation_iternary) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Day NO.</th>
                    <th>District Name</th>
                    <th>Place Name</th>
                    <th>Hall Rate</th>
                    <th>Separate Room Rate</th>
                    <th>Dharmshala Rate</th>
                    <th>State Tax</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($tour_creation_iternary  as $info) 
                   { 
                     ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $info['day_number'];?></td>
                        <td><?php echo $info['district'];?></td>
                        <td><?php echo $info['city_place'];?></td>
                        <td><?php echo $info['approximate_hall_rate'];?> /-</td>
                        <td><?php echo $info['separate_room_rate'];?> /-</td>
                        <td><?php echo $info['dharmshala_rate'];?> /-</td>
                        <td><?php echo $info['state_tax'];?> /-</td>
                        <td><?php echo $info['ticket_cost'];?> /-</td>
                   </tr>
                   <?php } ?>
                  </tbody>
                </table>
             <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

