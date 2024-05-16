<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart10);

function drawChart10() {
   // Create a data table
   var data = new google.visualization.DataTable();
   data.addColumn('string', 'Stationary Name');
   data.addColumn('number', 'Request Count');

   // PHP variable containing the data for top 5 stationary names and their request counts
   var chartData = <?php echo json_encode($top_s_product); ?>;

   // Add the data from PHP to the data table
   chartData.forEach(function (row) {
      data.addRow([row.stationary_name, parseInt(row.request_count)]);
   });

   // Set chart options for a column chart
   var options = {
      title: 'Top 5 Stationary Names by Request Count',
      titleTextStyle: {
         color: '#FF0000', // Set the title text color to red
         fontSize: 18,     // Set the title font size to 18px
         bold: true        // Make the title text bold
      },
      colors: ['#64b5f6'], // Custom column color
      legend: 'none',      // Hide legend
      hAxis: {
         title: 'Stationary Name',
      },
      vAxis: {
         title: 'Request Count',
      },
      chartArea: {
        left: '10%',   // Adjust the left margin as needed
        width: '80%',  // Adjust the width as needed
        height: '70%'  // Adjust the height as needed
      },
   };

   // Create a new column chart and attach it to the 'piechart2' div
   var chart = new google.visualization.ColumnChart(document.getElementById('piechart9'));

   // Draw the chart
   chart.draw(data, options);
}

</script>

<style>
  .underline{
    text-decoration: none;
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
            if($arr_data['request_code_number'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>supervision/supervision_request/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['request_code_number']; ?></h3>
              <p>Request for code</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>


        <?php 
            if($arr_data['request_code_completed'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>supervision/supervision_request_completed/index">
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo  $arr_data['request_code_completed']; ?></h3>
              <p>Request for code Completed</p>
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
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Top 5 Stationary Names by Request Count</h3>

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
                <div id="piechart9" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
          

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->


