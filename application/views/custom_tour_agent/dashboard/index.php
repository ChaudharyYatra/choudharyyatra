<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Create a data table
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Status');
            data.addColumn('number', 'Count');

            // PHP variables containing the data
            var totalEnquiry = <?php echo $custom_enquiry_data['custom_package_count']; ?>;
            var totalActive = <?php echo $custom_enquiry_data['total_isactive_count']; ?>;
            var totalDeleted = <?php echo $custom_enquiry_data['total_isdeleted_count']; ?>;

            // Add data to the data table
            data.addRow(['Enquiry', totalEnquiry]);
            data.addRow(['Active', totalActive]);
            data.addRow(['Deleted', totalDeleted]);

            // Set chart options
            var options = {
                title: 'Enquiry, Active, and Deleted Counts',
                titleTextStyle: {
                    color: '#FF0000', // Set the title text color to red
                    fontSize: 18,     // Set the title font size to 18px
                    bold: true        // Make the title text bold
                }
            };

            // Create a new pie chart and attach it to the 'piechart' div
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            // Draw the chart
            chart.draw(data, options);
        }
 

        google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart8);

function drawChart8() {
    // Create a data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Status');
    data.addColumn('number', 'Count');

    // PHP variable containing the data
    var chartData = <?php echo json_encode($enquiry_status); ?>;

    // Add the data from PHP to the data table
    data.addRow(['Total Enquiry', parseInt(chartData.total_enquiry_count)]);
    data.addRow(['Total Follow-up', parseInt(chartData.total_followup_count)]);
    data.addRow(['Booked', parseInt(chartData.total_booked_count)]);
    data.addRow(['Not Interested', parseInt(chartData.total_notintersted_count)]);

    // Set chart options
    var options = {
        title: 'Enquiry Status',
        titleTextStyle: {
            color: '#FF0000', // Set the title text color to red
            fontSize: 18,     // Set the title font size to 18px
            bold: true        // Make the title text bold
        }
    };

    // Create a new pie chart and attach it to the 'piechart' div
    var chart = new google.visualization.PieChart(document.getElementById('piechart6'));

    // Draw the chart
    chart.draw(data, options);
}


</script>
<style>
  .underline{
    text-decoration: none !important;
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php 
            if($arr_data['enquiry_count_total'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>custom_tour_agent/booking_enquiry/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['enquiry_count_total']; ?></h3>

                <p>All Custom Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['international_enquiry_data_total'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/international_booking_enquiry/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $arr_data['international_enquiry_data_total']; ?></h3>

                <p>Total International Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
          <?php } ?>

          <?php 
            if($arr_data['todays_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/booking_enquiry/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color:white;"><?php echo $arr_data['todays_enquiry_count']; ?></h3>

                <p style="color:white;">Todays Domestic Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div> 
            </a> 
          </div>
          <?php } ?>
          
          <?php 
            if($arr_data['internatinal_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/international_booking_enquiry/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $arr_data['internatinal_enquiry_count']; ?></h3>

                <p>Todays International Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>  
          </div>
          <?php } ?>

          

        </div>
        <!-- /.row -->
    </div>
    
<form method="post">
  <input type="hidden" name="enquiry_login_count" id="enquiry_login_count" value="<?php echo $this->session->userdata('agent_login_count');?>">
</form>
   

</section>



<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php 
            if($custom_enquiry_data >0 ){

          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Custom Enquiry Counts</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div id="piechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($enquiry_status >0 ){

          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Enquiry Status</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div id="piechart6" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
