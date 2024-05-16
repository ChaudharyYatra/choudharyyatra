<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    .btn_follow{padding: 2px 8px;};
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

            <form method="post" enctype="multipart/form-data" id="bus_seat_selection">
                <div class="card-body card-bg">
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Tour</label>
                            <select class="select_css" name="pack_id" id="pack_id">
                              <option value="">Select Package</option>
                                <?php foreach($packages_data_booking as $packages_data_booking){ ?>  
                                  <option value="<?php echo $packages_data_booking['id'];?>"><?php echo $packages_data_booking['tour_title'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Tour</label>
                            <select class="select_css" name="pack_date_id" id="pack_date_id">
                              <option value="">Select Date</option>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <button type="submit" class="btn btn-success mt-4" name="submit" value="Search" id="search">Search </button> 
                          <button type="button" class="btn btn-danger mt-4" >Cancel</button>
                        </div>
                      </div>
                    </div>
                </div>
              </form>
              <div class="">

                  <div id="seat-map">
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">From Front Row</h4>

                      <div id="bus-seat-map" class="seatCharts-container" tabindex="0" aria-activedescendant="4_2"><div class="seatCharts-row">
                        <?php 
                        $total_seats=$bus_open_data['seat_capacity'];
                        for($i=1;$i<$total_seats;$i++)
                        {
                            ?>
                            <div class="seatCharts-cell seatCharts-space"><?php echo $i; ?></div>
                      <?php
                                              }
                                              ?>
                          <div class="seatCharts-cell seatCharts-space">1</div>
                          <div id="1_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="1" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell window-first-class available">1</div>
                          <div id="1_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="2" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell available first-class">2</div>
                          <div class="seatCharts-cell seatCharts-space"></div>
                          <div id="1_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="3" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell available first-class">3</div>
                          <div id="1_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="4" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell available window-first-class">4</div>
                          </div>
                          <div class="seatCharts-row">
                          <div class="seatCharts-cell seatCharts-space">2</div>
                          <div id="2_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="5" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell window-first-class available">5</div>
                          <div id="2_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="6" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell first-class available">6</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="2_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="7" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell available first-class">7</div>
                          <div id="2_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="8" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell available window-first-class">8</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">3</div>
                          <div id="3_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="9" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell window-first-class available">9</div>
                          <div id="3_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="10" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell available first-class">10</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="3_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="11" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell first-class available">11</div>
                          <div id="3_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="12" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell window-first-class available">12</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">4</div>
                          <div id="4_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="13" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell window-first-class available">13</div>
                          <div id="4_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="14" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell first-class available">14</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="4_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="15" seat_type="first-class" seat_price="1500" class="seatCharts-seat seatCharts-cell first-class available">15</div>
                          <div id="4_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="16" seat_type="window-first-class" seat_price="1800" class="seatCharts-seat seatCharts-cell window-first-class available">16</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">5</div>
                          <div id="5_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="17" seat_type="window-second-class" seat_price="1300" class="seatCharts-seat seatCharts-cell window-second-class available">17</div>
                          <div id="5_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="18" seat_type="second-class" seat_price="1000" class="seatCharts-seat seatCharts-cell available second-class">18</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="5_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="19" seat_type="second-class" seat_price="1000" class="seatCharts-seat seatCharts-cell second-class available">19</div>
                          <div id="5_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="20" seat_type="window-second-class" seat_price="1300" class="seatCharts-seat seatCharts-cell window-second-class available">20</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">6</div>
                          <div id="6_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="21" seat_type="window-second-class" seat_price="1300" class="seatCharts-seat seatCharts-cell available window-second-class">21</div>
                          <div id="6_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="22" seat_type="second-class" seat_price="1000" class="seatCharts-seat seatCharts-cell available second-class">22</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="6_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="23" seat_type="second-class" seat_price="1000" class="seatCharts-seat seatCharts-cell second-class available">23</div>
                          <div id="6_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="24" seat_type="window-second-class" seat_price="1300" class="seatCharts-seat seatCharts-cell window-second-class available">24</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">7</div>
                          <div id="7_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="25" seat_type="window-second-class" seat_price="1300" class="seatCharts-seat seatCharts-cell available window-second-class">25</div>
                          <div id="7_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="26" seat_type="second-class" seat_price="1000" class="seatCharts-seat seatCharts-cell available second-class">26</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="7_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="27" seat_type="second-class" seat_price="1000" class="seatCharts-seat seatCharts-cell available second-class">27</div>
                          <div id="7_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="28" seat_type="window-second-class" seat_price="1300" class="seatCharts-seat seatCharts-cell window-second-class available">28</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">8</div>
                          <div id="8_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="29" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">29</div>
                          <div id="8_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="30" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">30</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="8_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="31" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">31</div>
                          <div id="8_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="32" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">32</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">9</div>
                          <div id="9_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="33" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">33</div>
                          <div id="9_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="34" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell economy-class available">34</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="9_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="35" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">35</div>
                          <div id="9_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="36" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">36</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">10</div>
                          <div id="10_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="37" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">37</div>
                          <div id="10_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="38" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">38</div>
                          <div class="seatCharts-cell seatCharts-space"></div><div id="10_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="39" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">39</div>
                          <div id="10_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="40" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">40</div></div>
                          <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">11</div>
                          <div id="11_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="41" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">41</div>
                          <div id="11_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="42" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">42</div>
                          <div id="11_3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="43" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">43</div>
                          <div id="11_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="44" seat_type="economy-class" seat_price="500" class="seatCharts-seat seatCharts-cell available economy-class">44</div>
                          <div id="11_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" data_id="45" seat_type="window-economy-class" seat_price="800" class="seatCharts-seat seatCharts-cell available window-economy-class">45</div>
                      </div></div>
                     
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">End of Seat Row</h4>
                  </div>
              </div>
                <div class="grid-50">
                  <div class="booking-details">

                  </div>
                </div>
              </div>
            
              <div class="card-footer">
                <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button> -->
                <button type="button" class="btn btn-success booknow_submit" name="booknow_submit" value="Book Now" id="booknow_submit">Submit & Proceed</button> 
                <a href=""><button type="button" class="btn btn-warning" name="back_btn">Back</button></a>
                <a href=""><button type="button" class="btn btn-danger" >Cancel</button></a>
              </div>
    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
