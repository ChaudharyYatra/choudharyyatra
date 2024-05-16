    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Packages.png);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3"><?php echo $page_title; ?></h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- top Destination starts -->
    <?php foreach($package_details as $key => $package_details_value) { ?>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        
                        <div class="single-full-title border-b mb-2 pb-2">
                                <div class="single-title">
                                    <h2 class="mb-1"><?php echo $package_details_value['tour_title']; ?></h2>
                                    <div class="rating-main d-md-flex align-items-center">
                                        <p class="mb-0 me-2">Tour Number: <?php echo $package_details_value['tour_number']; ?></p>
                                    </div>
                                    <div class="rating-main d-md-flex align-items-center">
                                        <p class="mb-0 me-2">Tour Days: <?php echo $package_details_value['tour_number_of_days']; ?></p>
                                    </div>
                                </div>
                        </div>
                        
                        <div id="tour_dates" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden tour_dates">
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <div class="eentry-button d-flex align-items-center mb-2">
                                                    <h4 class="nir-btn">Tour Dates</h4>
                                            </div>
                                            <p class="mb-2">
                                                <div class="row">
                                                    <?php foreach($package_date_details_data as $key => $packages_data_value) { ?>
                                                    <div class="col-sm-6">
                                                        <div class="p-2 rounded">
                                                            <div class="sidebar-item mb-4">
                                                                <ul class="sidebar-tags">
                                                                    <li><a><?php echo date('d F Y', strtotime($packages_data_value['journey_date'])); ?><br>Single Sharing Per Seat: ₹ <?php echo $packages_data_value['single_seat_cost']; ?><br>Twin Sharing Per Seat: ₹ <?php echo $packages_data_value['twin_seat_cost']; ?><br>3/4 Sharing Per Seat: ₹ <?php echo $packages_data_value['three_four_sharing_cost']; ?></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                <?php } ?>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                        </div>
                        
                        
                        
                        <div id="iternary" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden iternary">
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <div class="eentry-button d-flex align-items-center mb-2">
                                                    <h4 class="nir-btn">Iternary</h4>
                                            </div>
                                            <p class="mb-2">
                                                <p><?php echo $package_details_value['iternary']; ?></p>
                                            </p>
                                        </div>
                                    </div>
                        </div>
                                
                          
                        
                         <div id="inclusion" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden inclusion">
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <div class="eentry-button d-flex align-items-center mb-2">
                                                    <h4 class="nir-btn">Inclusion</h4>
                                            </div>
                                            <p class="mb-3">
                                                <p><?php echo $package_details_value['inclusion']; ?></p>
                                            </p>
                                        </div>
                                    </div>
                        </div>
                        <div id="highlight">
                            <div class="description-images mb-4">
                                <img src="<?php echo base_url(); ?>uploads/packages/<?php echo $package_details_value['image_name']; ?>" alt="<?php echo $package_details_value['image_name']; ?>" class="w-100 rounded">
                            </div>

                            
                            <div id="description" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden inclusion description">
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <div class="eentry-button d-flex align-items-center mb-2">
                                                    <h4 class="nir-btn">Description</h4>
                                            </div>
                                            <p class="mb-2">
                                                <p><?php echo $package_details_value['full_description']; ?></p>
                                            </p>
                                        </div>
                                    </div>
                           </div>
                        </div>
                        <div id="terms_conditions" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden inclusion terms_conditions">
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <div class="eentry-button d-flex align-items-center mb-2">
                                                    <h4 class="nir-btn">Terms & Conditions</h4>
                                            </div>
                                            <p class="mb-3">
                                                <p><?php echo $package_details_value['terms_conditions']; ?></p>
                                            </p>
                                        </div>
                                    </div>
                        </div>
                      
                        
                        <div id="contact_us" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden inclusion contact_us">
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <div class="eentry-button d-flex align-items-center mb-2">
                                                    <h4 class="nir-btn">Contact Us</h4>
                                            </div>
                                            <p class="mb-3">
                                                <p><?php echo $package_details_value['contact_us']; ?></p>
                                            </p>
                                        </div>
                                    </div>
                        </div>
                        
                        
                        <!--<div id="single-map" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden inclusion single-map">-->
                        <!--            <div class="trend-content-main p-4 pb-2">-->
                        <!--                <div class="trend-content">-->
                        <!--                    <div class="eentry-button d-flex align-items-center mb-2">-->
                        <!--                            <h4 class="nir-btn">Map</h4>-->
                        <!--                    </div>-->
                        <!--                    <p class="mb-3">-->
                        <!--                        <iframe class=" rounded overflow-hidden" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>-->
                        <!--                    </p>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--</div>-->
                        
                        <a href="<?php echo base_url();?>packages/booking_enquiry/<?php echo $package_details_value['id']; ?>" class="nir-btn white">Book Now</a>
                       
                    </div>
                </div>

                <div class="col-lg-4 ps-lg-4">
                    <div class="sidebar-sticky sticky1">
                        <div class="tabs-navbar bg-lgrey mb-4 bordernone rounded overflow-hidden">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="tabs" class="nav nav-tabs bordernone mb-0">
                                        <!--<li class="active">-->
                                        <li>
                                            <a data-toggle="tab" href="#tour_dates" class="rounded box-shadow mb-2 border-all">Tour Dates</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#iternary" class="rounded box-shadow mb-2 border-all">Iternary</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#inclusion" class="rounded box-shadow mb-2 border-all">Inclusion</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#highlight" class="rounded box-shadow mb-2 border-all">Highlight</a>
                                        </li>
                                        
                                        <li>
                                            <a data-toggle="tab" href="#terms_conditions" class="rounded box-shadow mb-2 border-all">Terms & Conditions</a>
                                        </li>
                                        
                                        <li>
                                            <a data-toggle="tab" href="#contact_us" class="rounded box-shadow mb-2 border-all">Contact Us</a>
                                        </li>
                                        
                                        <!--<li>-->
                                        <!--    <a data-toggle="tab" href="#single-map" class="rounded box-shadow mb-2 border-all">Map</a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a data-toggle="tab" href="#single-review" class="rounded box-shadow mb-2 border-all">Reviews</a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a data-toggle="tab" href="#single-comments" class="rounded box-shadow mb-2 border-all">Comments</a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a data-toggle="tab" href="#single-add-review"  class="rounded box-shadow mb-2 border-all">Add Reviews</a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
        
    
    
    <?php } ?>
    <!-- top Destination ends -->
    
    
    
    <!-- Discount action starts -->
    <!--<section class="discount-action pt-0" style="background-image:url(<?php //echo base_url(); ?>assets/front/images/section-bg1.png); background-position:center;">-->
    <!--    <div class="container">-->
    <!--        <div class="call-banner rounded pt-10 pb-14">-->
    <!--            <div class="call-banner-inner w-75 mx-auto text-center px-5">-->
    <!--                <div class="trend-content-main">-->
    <!--                    <div class="trend-content mb-5 pb-2 px-5">-->
    <!--                        <h5 class="mb-1 theme">Love Where Your're Going</h5>-->
    <!--                        <h2><a href="detail-fullwidth.html">Explore Your Life, <span class="theme1"> Travel Where You Want!</span></a></h2>-->
    <!--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
    <!--                    </div>-->
    <!--                    <div class="video-button text-center position-relative">-->
    <!--                         <div class="call-button text-center">-->
    <!--                            <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo">-->
    <!--                                <i class="fa fa-play bg-blue"></i>-->
    <!--                            </button>-->
    <!--                        </div>-->
    <!--                        <div class="video-figure"></div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>     -->
    <!--    </div>    -->
    <!--    <div class="white-overlay"></div>-->
    <!--    <div class="white-overlay"></div>-->
    <!--    <div class="section-shape  top-inherit bottom-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape6.png);"></div>-->
    <!--</section>-->
    <!-- Discount action Ends -->

    <!-- partner starts -->
    <!--<section class="our-partner pb-6 pt-6">-->
    <!--    <div class="container">-->
    <!--        <div class="section-title mb-6 w-75 mx-auto text-center">-->
    <!--            <h4 class="mb-1 theme1">Our Partners</h4>-->
    <!--            <h2 class="mb-1">Our Awesome <span class="theme">partners</span></h2>-->
    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>-->
    <!--        </div>-->
    <!--        <div class="row align-items-center partner-in partner-slider">-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/front/images/cl-1.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/front/images/cl-5.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/front/images/cl-2.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/front/images/cl-3.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/front/images/cl-4.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/front/images/cl-5.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- partner ends -->