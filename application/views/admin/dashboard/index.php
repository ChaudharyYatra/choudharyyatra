<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          // Create a data table
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Package Type');
          data.addColumn('number', 'Package Count');

          // PHP variable containing the data
          var chartData = <?php echo json_encode($package_type_wise_data); ?>;

          // Add the data from PHP to the data table
          data.addRows(chartData.map(function (row) {
            return [row.package_type, parseInt(row.package_count)];
          }));

          // Set chart options
          var options = {
            title: 'Package Type - wise Package Counts',
            titleTextStyle: {
            color: '#FF0000', // Set the title text color to red
            fontSize: 18,     // Set the title font size to 18px
            bold: true,      // Make the title text bold
          }
          };

          // Create a new pie chart and attach it to the 'piechart' div
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

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



google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart3);

function drawChart3() {
   // Create a data table
   var data = new google.visualization.DataTable();
   data.addColumn('string', 'Month');
   data.addColumn('number', 'Package Count');

   // PHP variable containing the data for month-wise package counts with tour title
   var chartData = <?php echo json_encode($month_wise_data); ?>;

   // Add the data from PHP to the data table
   data.addRows(chartData.map(function (row) {
      return [row.month, parseInt(row.package_count)];
   }));

   // Set chart options for a column chart
   var options = {
      title: 'Month-wise Package Counts',
      titleTextStyle: {
         color: '#FF0000', // Set the title text color to red
         fontSize: 18,     // Set the title font size to 18px
         bold: true        // Make the title text bold
      },
      colors: ['#64b5f6'], // Custom column color
      legend: 'none',      // Hide legend
      hAxis: {
         title: 'Month',
      },
      vAxis: {
         title: 'Package Count',
      },
      chartArea: {
        left: '10%',   // Adjust the left margin as needed
        //  bottom: '10%',    // Adjust the top margin as needed
         width: '500%', // Adjust the width as needed
         height: '70%', // Adjust the height as needed
      },
   };

   // Create a new column chart and attach it to the 'piechart2' div
   var chart = new google.visualization.ColumnChart(document.getElementById('piechart2'));

   // Draw the chart
   chart.draw(data, options);
}


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


// Load Google Charts library
google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart5);

function drawChart5() {
    // Create a data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Package Name');
    data.addColumn('number', 'Booking Converted Count');

    // PHP variable containing the data for the top package
    var chartData = <?php echo json_encode($booking_max_package_data); ?>;

    // Add the data to the data table
    data.addRows([[chartData.tour_title, parseInt(chartData.package_count)]]);

    // Set chart options
    var options = {
        title: 'Top Packages by Booking Conversion',
        titleTextStyle: {
            color: '#FF0000', // Set the title text color to red
            fontSize: 18,     // Set the title font size to 18px
            bold: true        // Make the title text bold
        },
        colors: ['#64b5f6'], // Custom column color
        legend: 'none',      // Hide legend
        hAxis: {
            title: 'Package Name'
        },
        vAxis: {
            title: 'Booking Converted Count'
        },
        chartArea: {
            left: '10%',   // Adjust the left margin as needed
            width: '80%',  // Adjust the width as needed
            height: '70%'  // Adjust the height as needed
        }
    };

    // Create a new column chart and attach it to the 'piechart' div
    var chart = new google.visualization.ColumnChart(document.getElementById('piechart4'));

    // Draw the chart
    chart.draw(data, options);
}


google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart6);

function drawChart6() {
    // Create a data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Vehicle Type');
    data.addColumn('number', 'Vehicle Count');

    // PHP variable containing the data
    var chartData = <?php echo json_encode($vehicle_type_data); ?>;

    // Loop through the data and add rows to the data table
    for (var i = 0; i < chartData.length; i++) {
        data.addRow([chartData[i].vehicle_type_name, parseInt(chartData[i].vehicle_type_count)]);
    }

    // Set chart options
    var options = {
        title: 'Vehicle Type - wise Vehicle Counts',
        titleTextStyle: {
            color: '#FF0000', // Set the title text color to red
            fontSize: 18,     // Set the title font size to 18px
            bold: true,       // Make the title text bold
        }
    };

    // Create a new pie chart and attach it to the 'piechart' div
    var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

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
    data.addRow(['Total Enquiry', parseInt(chartData.total_enquiey_count)]);
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



google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart9);

function drawChart9() {
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
  .css_amt_not_paid{
    margin: 6%;
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
      </div>
    </section>

    

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php 
            if($arr_data['package_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['package_count']; ?></h3>
              <p>Domestic Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['international_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['international_count']; ?></h3>
                <p>International Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['custom_domestic_packages_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo  $arr_data['custom_domestic_packages_count']; ?></h3>
              <p>Custom Domestic Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          

          <?php 
            if($arr_data['custom_inter_packages_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/packages/index">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo  $arr_data['custom_inter_packages_count']; ?></h3>
              <p>Custom International Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['package_mapping_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/package_mapping/index">
            <div class="small-box bg-info">
              <div class="inner">
              <h3><?php echo  $arr_data['package_mapping_count']; ?></h3>
              <p>Main Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>


          <?php 
            if($arr_data['agent_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/agent/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['agent_count']; ?></h3>

                <p>Total Agents</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <!-- <?php 
            //if($arr_data['enquiry_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <a href="<?php //echo base_url(); ?>admin/contact_us/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php //echo  $arr_data['enquiry_count']; ?></h3>
                <p>Contact Us</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php //} ?> -->
          <!-- ./col -->

          <?php 
            if($arr_data['bus_open_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/bus_open/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $arr_data['bus_open_count']; ?></h3>
                <p>Bus Open Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->
          

          <?php 
            if($arr_data['enquiry_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/client_reviews/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo  $arr_data['reviews_count']; ?></h3>
                <p>Client Reviews</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          
          <?php 
            if($arr_data['total_enquiry_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $arr_data['total_enquiry_count']; ?></h3>
                <p>Total Packages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            
          </div>
          <?php } ?>
          
          <?php 
            if($visiter_c>0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $visiter_c; ?></h3>
                <p>Website Visiter Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            
          </div>
          <?php } ?>



          <?php 
            if($arr_data['vehicle_driver_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/vehicle_driver/index">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo  $arr_data['vehicle_driver_count']; ?></h3>
                <p>Vehicle Driver Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          

          <?php 
            if($arr_data['final_booking_count'] >0 ){

          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/final_booking_details/index">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo  $arr_data['final_booking_count']; ?></h3>
                <p>Final Booking Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>


          <?php 
            if($arr_data['vehicle_owner_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/vehicle_owner/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo  $arr_data['vehicle_owner_count']; ?></h3>
                <p>Vehicle Owner</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->

          <?php 
            if($arr_data['vehicle_data_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?php echo base_url(); ?>admin/vehicle_details/index">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo  $arr_data['vehicle_data_count']; ?></h3>
                <p>Vehicle Count</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
          <!-- ./col -->


          <?php 
            if($arr_data['booking_payment_details_not_paid_count'] >0 ){
          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>admin/pending_booking_details/agent_index">
            
            <div class="small-box bg-info">
              <div class="inner">
                <div class="css_amt_not_paid">
                  <div class="row">
                    <div class="col-md-3">
                      <h3><?php echo $arr_data['booking_payment_details_not_paid_count']; ?></h3>
                    </div>
                    <div class="col-md-9">
                      <p>Booking Done But Amount Not Paid</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>


          <?php 
            if($arr_data['booking_payment_details_in_process_count'] >0 ){
          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>admin/in_process_booking_details/agent_index">
            
            <div class="small-box bg-success">
              <div class="inner">
                <div class="css_amt_not_paid">
                  <div class="row">
                    <div class="col-md-3">
                      <h3><?php echo $arr_data['booking_payment_details_in_process_count']; ?></h3>
                    </div>
                    <div class="col-md-9">
                      <p>Booking Done But Amount In Process</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['booking_payment_details_completed_count'] >0 ){
          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>admin/final_booking_details/agent_index">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <div class="css_amt_not_paid">
                  <div class="row">
                    <div class="col-md-3">
                      <h3 style="color:white;"><?php echo $arr_data['booking_payment_details_completed_count']; ?></h3>
                    </div>
                    <div class="col-md-9">
                      <p style="color:white;">Booking Done And Amount Completed</p>
                    </div>
                  </div>
                </div>
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
            if($package_type_wise_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Package Type - wise Package Counts</h3>
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
            if($agent_wise_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Agent-wise Enquiry Counts</h3>

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
                <div id="piechart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($month_wise_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title text-white">Month-wise Package Counts</h3>

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
                <div id="piechart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($top_agent_wise_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Top Agents by Booking Conversion</h3>

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
                <div id="piechart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($booking_max_package_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Top Packages by Booking Conversion</h3>

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
                <div id="piechart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($vehicle_type_data >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Vehicle Type - wise Vehicle Counts</h3>

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
                <div id="piechart5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
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

          <?php 
            if($agent_status >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Agent Status</h3>

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
                <div id="piechart7" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <?php } ?>
          <!-- /.col (LEFT) -->

          <?php 
            if($top_s_product >0 ){
          ?> 
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title text-white">Top 5 Stationary Names by Request Count</h3>

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
                <div id="piechart9" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
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

