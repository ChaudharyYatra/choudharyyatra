<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    // Create a data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Agent Name');
    data.addColumn('number', 'Enquiry Count');

    // PHP variable containing the data for the top agent
    var chartData = <?php echo json_encode($top_agent_wise_data); ?>;

    // Add the data to the data table
    for (var i = 0; i < chartData.length; i++) {
        data.addRow([chartData[i].agent_name, parseInt(chartData[i].enquiry_count)]);
    }

    // Set chart options
    var options = {
        title: 'Top Agents by booking Count',
        titleTextStyle: {
            color: '#FF0000', // Set the title text color to red
            fontSize: 18,     // Set the title font size to 18px
            bold: true        // Make the title text bold
        },
        colors: ['#64b5f6'], // Custom column color
        legend: 'none',      // Hide legend
        hAxis: {
            title: 'Agent Name'
        },
        vAxis: {
            title: 'Enquiry convert into booking Count'
        },
        chartArea: {
            left: '10%',   // Adjust the left margin as needed
            width: '80%',  // Adjust the width as needed
            height: '70%'  // Adjust the height as needed
        }
    };

    // Create a new column chart and attach it to the 'piechart4' div
    var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));

    // Draw the chart
    chart.draw(data, options);
}

    </script>



<style>
  .underline{
    text-decoration: none !important;
  }
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
            <a class="underline" href="<?php echo base_url(); ?>agent/booking_enquiry/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['enquiry_count_total']; ?></h3>

                <p>Total Domestic Enquiries</p>
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

          <?php 
            if($arr_data['custom_domestic_booking_count'] >0 ){

          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/fixed_customized_enquiries/index">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $arr_data['custom_domestic_booking_count']; ?></h3>

                <p>Fixed Customized Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>

          <?php 
            if($arr_data['booking_payment_details_not_paid_count'] >0 ){
          ?> 
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a class="underline" href="<?php echo base_url(); ?>agent/pending_booking_details/index">
            
            <div class="small-box bg-info">
              <div class="inner">
                <div class="css_amt_not_paid">
                  <div class="row">
                    <div class="col-md-2">
                      <h3><?php echo $arr_data['booking_payment_details_not_paid_count']; ?></h3>
                    </div>
                    <div class="col-md-10">
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
            <a class="underline" href="<?php echo base_url(); ?>agent/final_booking_details/index">
            
            <div class="small-box bg-success">
              <div class="inner">
                <div class="css_amt_not_paid">
                  <div class="row">
                    <div class="col-md-2">
                      <h3><?php echo $arr_data['booking_payment_details_in_process_count']; ?></h3>
                    </div>
                    <div class="col-md-10">
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
            <a class="underline" href="<?php echo base_url(); ?>agent/final_booking_details/index">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <div class="css_amt_not_paid">
                  <div class="row">
                    <div class="col-md-2">
                      <h3 style="color:white;"><?php echo $arr_data['booking_payment_details_completed_count']; ?></h3>
                    </div>
                    <div class="col-md-10">
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
    
<form method="post">
  <input type="hidden" name="enquiry_login_count" id="enquiry_login_count" value="<?php echo $this->session->userdata('agent_login_count');?>">
</form>
   

</section>


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Top Agents by booking Count</h3>
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
                <div id="columnchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 500px;"></div>
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