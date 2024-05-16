<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    .btn_follow{padding: 2px 8px;}
</style>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/bus_seat_design/css/jquery.seat-charts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bus_seat_design/css/style.css">

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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="grid-50">
                    <div id="seat-map">
                        <div class="front-indicator">Bus Seat Reservation</div>
                        <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">From Front Row</h4>
                        <div id="bus-seat-map"></div>
                        <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">End of Seat Row</h4>
                    </div>
                </div>
                <div class="grid-50">
                    <div class="booking-details">

                        <form action="" method="post">

                            <h2>Booking Details</h2>

                            <h3> Selected Seats (<span id="counter">0</span>):</h3>
                            <ul id="selected-seats"></ul>

                            <h2>Total: <b>$<span id="total">0</span></b></h2>

                            <button type="button" id="checkout-button">Submit Book</button>

                        </form>

                        <div id="legend"></div>
                        <button id="reset-btn" type="button">Reset Bus Seat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>














      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
