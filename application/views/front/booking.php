

    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>assets/front/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Booking</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 

    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <h3 class="border-b pb-2 mb-2">Traveller Information</h3>
                                <form class="mb-2">
                                    <!-- <h5>Let us know who you are</h5> -->
                                    <div class="row">
                                        <!-- <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <label>Title</label>
                                                <div class="input-box">
                                                    <select class="niceSelect">
                                                        <option value="0">Select</option>
                                                        <option value="1">Mr.</option>
                                                        <option value="2">Mrs.</option>
                                                    </select>
                                                </div>                            
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label><h6 class="mb-0">First Name</h6></label>
                                                <!-- <input type="text" placeholder="First Name" value="<?php //echo $traveler_details_data[0]['first_name']; ?>"> -->
                                                <p><?php echo $traveler_details_data[0]['first_name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label><h6 class="mb-0">Last Name</h6></label>
                                                <!-- <input type="text" placeholder="Last Name" value="<?php //echo $traveler_details_data[0]['last_name']; ?>"> -->
                                                <p><?php echo $traveler_details_data[0]['last_name']; ?> </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label><h6 class="mb-0">Email Address</h6></label>
                                                <!-- <input type="email" placeholder="Email Address" value="<?php //echo $traveler_details_data[0]['email']; ?>"> -->
                                                <p><?php echo $traveler_details_data[0]['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label><h6 class="mb-0">Mobile Number</h6></label>
                                                <!-- <input type="text" placeholder="Phone No." value="<?php //echo $traveler_details_data[0]['mobile']; ?>"> -->
                                                <p><?php echo $traveler_details_data[0]['mobile']; ?> </p>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="input-box">
                                                    <select class="niceSelect">
                                                        <option value="0">Select Gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>                            
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>DOB</label>
                                                <div class="input-box">
                                                    <input id="date-range" type="date">
                                                </div> 
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label>Select Country</label>
                                                <div class="input-box">
                                                    <select class="niceSelect">
                                                        <option value="0">Albania</option>
                                                        <option value="1">Malaysia</option>
                                                        <option value="2">Singapore</option>
                                                        <option value="3">Japan</option>
                                                        <option value="4">Thailand</option>
                                                    </select>
                                                </div>                            
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <label>Select City</label>
                                                <div class="input-box">
                                                    <select class="niceSelect">
                                                        <option value="0">Istanbul</option>
                                                        <option value="1">London</option>
                                                        <option value="2">Texas</option>
                                                        <option value="3">Tokyo</option>
                                                        <option value="4">Bangkok</option>
                                                    </select>
                                                </div>                            
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Address Line 1</label>
                                                <input type="text" placeholder="Address line 1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Address Line 2</label>
                                                <input type="text" placeholder="Address line 2">
                                            </div>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="customer-information">
                                <i class="fa fa-grin-wink rounded fs-1 bg-theme white p-3 px-4"></i>
                                <div class="customer-info ps-4">
                                    <h6 class="mb-1">Tour Dates</h6>
                                    <div class="trend-check border-b pb-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="description mb-2">
                                <div class="row">
                                <h5 class="mb-2">Tour Dates</h5>
                                    <?php  
                                        foreach($package_date_details_data as $key => $packages_data_value) { ?>
                                        <div class="col-lg-3 col-md-3 mb-2">
                                            <div class="desc-box bg-grey p-3 rounded">
                                                <p class="mb-0"><?php echo date('d F Y', strtotime($packages_data_value['journey_date'])); ?></p>
                                            </div>   
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <div class="customer-information card-information">
                                <h3 class="border-b pb-2 mb-2">How do you want to pay?</h3>

                                <div class="trending-topic-main">
                                    <!-- tab navs -->
                                    <ul class="nav nav-tabs nav-pills nav-fill w-50" id="postsTab1" role="tablist">
                                        <li class="nav-item me-2 ms-0" role="presentation">
                                            <button aria-controls="card" aria-selected="false" class="nav-link active" data-bs-target="#card" data-bs-toggle="tab" id="card-tab" role="tab" type="button">Credit/Debit card</button>
                                        </li>
                                        <li class="nav-item m-0" role="presentation">
                                            <button aria-controls="paypal" aria-selected="true" class="nav-link" data-bs-target="#paypal" data-bs-toggle="tab" id="paypal-tab" role="tab" type="button">Digital Payment</button>
                                        </li>
                                    </ul>
                                    <!-- tab contents -->
                                    <div class="tab-content" id="postsTabContent1">
                                        <!-- card posts -->
                                        <div aria-labelledby="card-tab" class="tab-pane fade active show" id="card" role="tabpanel">
                                            <form>
                                                <h5 class="mb-2 border-b pb-2"><i class="fa fa-credit-card"></i> Credit Card</h5>
                                                <div class="row align-items-center">
                                                    <div class="col-md-8">
                                                        <div class="card-detail">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-2">
                                                                        <label>Card Holder Number</label>
                                                                        <input type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-2">
                                                                        <label>Card Number</label>
                                                                        <input type="text" placeholder="**** **** **** ****">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-2">
                                                                        <label>Expiry Date</label>
                                                                        <input type="text" placeholder=" Expiry Date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>CVC/CVV</label>
                                                                        <input type="text" placeholder="CVC/CVV">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="<?php echo base_url(); ?>assets/front/images/cc.png" alt=""class="rounded">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- paypal posts -->
                                        <div aria-labelledby="paypal-tab" class="tab-pane fade" id="paypal" role="tabpanel">
                                            <div class="paypal-card">
                                                <h5 class="mb-2 border-b pb-2"><i class="fab fa-paypal"></i> Paypal</h5>
                                                <ul class="">
                                                    <li class="d-block">To make the payment process secure and complete you will be redirected to Paypal Website.</li>
                                                    <li class="d-block">
                                                        <a href="" class="theme">Checkout via Paypal <i class="fa fa-long-arrow-alt-right"></i></a>
                                                    </li>
                                                    <li class="d-block">The total Amount you will be charged is: <span class="fw-bold theme">$ 245.50</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-terms border-t pt-3 mt-3">
                                    <form class="d-lg-flex align-items-center">
                                        <div class="form-group mb-2 w-75">
                                            <input type="checkbox"> By continuing, you agree to the <a href="#">Terms and Conditions.</a>
                                        </div>
                                        <a href="<?php echo base_url(); ?>confirm_booking/add/<?php echo '1'; ?>" class="nir-btn float-lg-end w-25">CONFIRM BOOKING</a>
                                    </form>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 ps-ld-4">
                    <div class="sidebar-sticky">
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Your Booking Details</h4>
                            <div class="trend-full border-b pb-2 mb-2">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                       <div class="trend-item2 rounded">
                                            <a href="destination-single1.html" style="background-image: url(<?php echo base_url(); ?>uploads/packages/<?php echo $packages_details_data[0]['image_name']; ?>);"></a>
                                             <div class="color-overlay"></div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-8 col-md-8 ps-0">
                                        <div class="trend-content position-relative">
                                            <div class="rating mb-1">
                                                <!-- <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span> -->
                                                <!-- <small>200 Reviews</small> -->
                                                <?php if($packages_details_data[0]['rating']=='1') { ?>
                                                    <span class="fa fa-star checked"></span>
                                                <?php }
                                                if($packages_details_data[0]['rating']=='2') {
                                                ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <?php }
                                                if($packages_details_data[0]['rating']=='3') {
                                                ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <?php }
                                                if($packages_details_data[0]['rating']=='4') {
                                                ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <?php }
                                                if($packages_details_data[0]['rating']=='5') {
                                                ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <?php } ?>
                                            </div>
                                            <h5 class="mb-1"><a href="#"><?php echo $packages_details_data[0]['tour_title']; ?></a></h5>
                                            <h6 class="theme mb-0"><i class="icon-location-pin"></i> Croatia</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-check border-b pb-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="trend-check-item bg-grey rounded p-3 mb-2">
                                            <p class="mb-0">Check In</p>
                                            <h6 class="mb-0">Thu 21 Feb 2022</h6>
                                            <small>15:00 - 22:00</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="trend-check-item bg-grey rounded p-3 mb-2">
                                            <p class="mb-0">Check Out</p>
                                            <h6 class="mb-0">Tue 24 Feb 2022</h6>
                                            <small>1:00 - 10:00</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-check border-b pb-2 mb-2">
                                <p class="mb-0">Total days of tour:</p>
                                <h6 class="mb-0"><?php echo $packages_details_data[0]['tour_number_of_days']; ?> </h6>
                                <small><a href="#" class="theme text-decoration-underline">travelling on different dates?</a></small>
                            </div>
                            <!-- <div class="trend-check">
                                <p class="mb-0">You Selected:</p>
                                <h6 class="mb-0">Superior Double Rooms <span class="float-end fw-normal">1 room, 3 adults</span> </h6>
                                <small><a href="#" class="theme text-decoration-underline">Change your selection</a></small>
                            </div> -->

                        </div>  
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Your Price Summary</h4>
                            <table>
                                <tbody>
                                    <!-- <tr>
                                        <td> Superior Twin</td>
                                        <td class="theme2"><?php //echo $packages_details_data[0]['cost']; ?></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Number of Travellers</td>
                                        <td class="theme2">3</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Tax & fee</td>
                                        <td class="theme2">$50.00</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Booking Fee</td>
                                        <td class="theme2">Free</td>
                                    </tr> -->
                                    <tr>
                                        <td>Total Cost (Rs.)</td>
                                        <td class="theme2"><?php echo $packages_details_data[0]['cost']; ?></td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-title">
                                    <tr>
                                        <th class="font-weight-bold white">Amount</th>
                                        <th class="font-weight-bold white"><?php echo $packages_details_data[0]['cost']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Your Payment Schedule</h4>
                            <p class="mb-0">Before you stay you'll pay <span class="float-end">$40.00</span></p>
                        </div>
                        <!-- <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3">
                            <h4>Do you have a promo code?</h4>
                            <input type="text" name="">
                            <a href="#" class="nir-btn-black mt-2">Apply</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top Destination ends -->

    <!-- Discount action starts -->
    <section class="discount-action pt-0" style="background-image:url(<?php echo base_url(); ?>assets/front/images/section-bg1.png); background-position:center;">
        <div class="container">
            <div class="call-banner rounded pt-10 pb-14">
                <div class="call-banner-inner w-75 mx-auto text-center px-5">
                    <div class="trend-content-main">
                        <div class="trend-content mb-5 pb-2 px-5">
                            <h5 class="mb-1 theme">Love Where Your're Going</h5>
                            <h2><a href="detail-fullwidth.html">Explore Your Life, <span class="theme1"> Travel Where You Want!</span></a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="video-button text-center position-relative">
                             <div class="call-button text-center">
                                <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo">
                                    <i class="fa fa-play bg-blue"></i>
                                </button>
                            </div>
                            <div class="video-figure"></div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>    
        <div class="white-overlay"></div>
        <div class="white-overlay"></div>
        <div class="section-shape  top-inherit bottom-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape6.png);"></div>
    </section>
    <!-- Discount action Ends -->

    <!-- partner starts -->
    <section class="our-partner pb-6 pt-6">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <h4 class="mb-1 theme1">Our Partners</h4>
                <h2 class="mb-1">Our Awesome <span class="theme">partners</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
            <div class="row align-items-center partner-in partner-slider">
                <div class="col-md-3 col-sm-6">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey">
                        <img src="<?php echo base_url(); ?>assets/front/images/cl-1.png" alt="">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey">
                        <img src="<?php echo base_url(); ?>assets/front/images/cl-5.png" alt="">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey">
                        <img src="<?php echo base_url(); ?>assets/front/images/cl-2.png" alt="">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey">
                        <img src="<?php echo base_url(); ?>assets/front/images/cl-3.png" alt="">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey">
                        <img src="<?php echo base_url(); ?>assets/front/images/cl-4.png" alt="">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="partner-item p-4 py-2 rounded bg-lgrey">
                        <img src="<?php echo base_url(); ?>assets/front/images/cl-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- partner ends -->


