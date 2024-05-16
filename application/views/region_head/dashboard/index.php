<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart4);

function drawChart4() {
   // Create a data table
   var data = new google.visualization.DataTable();
   data.addColumn('string', 'Agent Name');
   data.addColumn('number', 'Booking Converted Count');

   // PHP variable containing the data for top agents
   var chartData = <?php echo json_encode($top_agent_wise_data); ?>;

   // Add the data from PHP to the data table
   data.addRows(chartData.map(function (row) {
      return [row.agent_name, parseInt(row.enquiry_count)];
   }));

   // Set chart options for a column chart
   var options = {
      title: 'Top Agents by Booking Conversion',
      titleTextStyle: {
         color: '#FF0000', // Set the title text color to red
         fontSize: 18,     // Set the title font size to 18px
         bold: true        // Make the title text bold
      },
      colors: ['#64b5f6'], // Custom column color
      legend: 'none',      // Hide legend
      hAxis: {
         title: 'Agent Name',
      },
      vAxis: {
         title: 'Booking Converted Count',
      },
      chartArea: {
         left: '10%',   // Adjust the left margin as needed
         width: '80%',  // Adjust the width as needed
         height: '70%', // Adjust the height as needed
      },
   };

   // Create a new column chart and attach it to the 'piechart3' div
   var chart = new google.visualization.ColumnChart(document.getElementById('piechart3'));

   // Draw the chart
   chart.draw(data, options);
}

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart1);

function drawChart1() {
   // Create a data table
   var data = new google.visualization.DataTable();
   data.addColumn('string', 'Agent');
   data.addColumn('number', 'Enquiry Count');

   // PHP variable containing the data
   var chartData = <?php echo json_encode($agent_wise_data); ?>;

   // Add the data from PHP to the data table
   data.addRows(chartData.map(function (row) {
      return [row.agent_name, parseInt(row.enquiry_count)];
   }));

   // Set chart options with custom colors
   var options = {
      title: 'Agent-wise Enquiry Counts',
      titleTextStyle: {
         color: '#FF0000', // Set the title text color to red
         fontSize: 18,     // Set the title font size to 18px
         bold: true        // Make the title text bold
      },
      colors: ['#e57373', '#64b5f6', '#81c784', '#ffb74d', '#9575cd', '#4dd0e1', '#81c784'] // Custom slice colors
   };

   // Create a new pie chart and attach it to the 'piechart' div
   var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

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
    var chartData = <?php echo json_encode($agent_status); ?>;

    // Add the data from PHP to the data table
    data.addRow(['Total Agents', parseInt(chartData.total_agent_count)]);
    data.addRow(['Total Active Agents', parseInt(chartData.total_isactive_count)]);
    data.addRow(['Total Deleted Agents', parseInt(chartData.total_isdeleted_count)]);

    // Set chart options
    var options = {
        title: 'Agent Status',
        titleTextStyle: {
            color: '#FF0000', // Set the title text color to red
            fontSize: 18,     // Set the title font size to 18px
            bold: true        // Make the title text bold
        }
    };

    // Create a new pie chart and attach it to the 'piechart6' div
    var chart = new google.visualization.PieChart(document.getElementById('piechart7'));

    // Draw the chart
    chart.draw(data, options);
}

google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart9);

function drawChart9() {
    // Create a data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Status');
    data.addColumn('number', 'Count');

    // PHP variable containing the stationary order status data
    var chartData = <?php echo json_encode($stationary_status); ?>;

    // Add the stationary order status data to the data table
    data.addRow(['Completed', parseInt(chartData.total_completed_count)]);
    data.addRow(['In Process', parseInt(chartData.total_inprocess_count)]);
    data.addRow(['Requested', parseInt(chartData.total_requested_count)]);

    // Set chart options
    var options = {
        title: 'Stationary Order Status',
        titleTextStyle: {
            color: '#FF0000',
            fontSize: 18,
            bold: true
        }
    };

    // Create a new pie chart and attach it to the 'piechart7' div
    var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

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
            if($arr_data['booking_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/booking_enquiry/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['booking_enquiry_count']; ?></h3>
              <p>Domestic - New</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['booking_enquiry_follow_up_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/followup_booking_enquiry/index">
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo  $arr_data['booking_enquiry_follow_up_count']; ?></h3>
              <p>Domestic - Followup</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['not_interested_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/not_interested/index">
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo  $arr_data['not_interested_count']; ?></h3>
              <p>Domestic - Not Interested</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['international_booking_enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/international_booking_enquiry/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['international_booking_enquiry_count']; ?></h3>
              <p>International - New</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['international_booking_enquiry_followup_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/international_followup_booking_enquiry/index">
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo  $arr_data['international_booking_enquiry_followup_count']; ?></h3>
              <p>International - Followup</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['international_not_interested_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/not_interested_international/index">
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo  $arr_data['international_not_interested_count']; ?></h3>
              <p>International - Not Interested</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['stationary_request_details'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/stationary_request_details/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['stationary_request_details']; ?></h3>
              <p>Stationary Requested Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['stationary_not_received_details'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/stationary_not_received_details/index">
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo  $arr_data['stationary_not_received_details']; ?></h3>
              <p>Stationary Inprocess Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['stationary_details'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/stationary_details/index">
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo  $arr_data['stationary_details']; ?></h3>
              <p>Stationary Completed Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php 
            if($arr_data['total_agent_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>region_head/agent/index">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo  $arr_data['total_agent_count']; ?></h3>
              <p>Total Agents</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>
          

        </div>
        <!-- /.row -->
    </div>
</section>

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php 
            if($top_agent_wise_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title text-white">Top Agents by Booking Conversion</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus text-white"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div id="piechart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($agent_wise_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title text-white">Agent-wise Enquiry Counts</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus text-white"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div id="piechart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($agent_status >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title text-white">Agent Status</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus text-white"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div id="piechart7" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->


          <?php 
            if($stationary_status >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title text-white">Stationary Status</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus text-white"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <div id="piechart5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
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
