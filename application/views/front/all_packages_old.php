    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/domestic_slider.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title;?></h1> -->
                    <h1 class="mb-3">Indian Destinations</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Packages</li>
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
            <div class="list-results d-flex align-items-center justify-content-between">
                <div class="list-results-sort">
                    <!--<p class="m-0">Showing 1-5 of <?php //echo $count; ?> results</p>-->
                </div>
                <div class="click-menu d-flex align-items-center justify-content-between">
                   
                    <div class="sortby d-flex align-items-center justify-content-between ml-2">
                        <select class="niceSelect" name="filter_val" id="filter_val">
                            <option value="" >Sort By</option>
                            <option value="low_to_high">Price: low to high</option>
                            <option value="high_to_low">Price: high to low</option>
                        </select> 
                    </div>
                </div>
            </div>

            <div class="row">
           <?PHP foreach($main_packages as $key => $main_packages_value) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="trend-item rounded box-shadow" data-aos="fade-up" data-duration="500">
                        <div class="trend-image position-relative">
                            <img src="<?php echo base_url(); ?>uploads/packages/<?php echo $main_packages_value['image_name']; ?>" alt="image" height="300px">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative w-100">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> <?php echo $main_packages_value['tour_number_of_days']; ?> Days Tours</span>
                                </div>
                            </div>
                            <h5 class="theme mb-1">Tour Number: <?php echo $main_packages_value['tour_number']; ?></h5>
                            <h3 class="mb-1"><a href="<?php echo base_url(); ?>packages/package_details/<?php echo $main_packages_value['id']; ?>"><?php echo mb_substr($main_packages_value['tour_title'], 0, 18); ?></a></h3>
                            <div class="rating-main d-flex align-items-center pb-2">
                            <div class="rating">
                                        <?php if($main_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($main_packages_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php } ?>
                                    </div>
                                
                            </div>
                           
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                    <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $main_packages_value['cost'];?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>    
                <!--<div class="col-lg-12">-->
                <!--    <div class="text-center">-->
                <!--        <a href="#" class="nir-btn">Load More <i class="fa fa-long-arrow-alt-right"></i></a>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </section>
    <!-- top Destination ends -->

    <!-- Discount action starts -->
    <!--<section class="discount-action pt-0" style="background-image:url(<?php echo base_url(); ?>assets/front/images/section-bg1.png); background-position:center;">-->
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
    <!--    <div class="section-shape  top-inherit bottom-0" style="background-image: url(images/shape6.png);"></div>-->
    <!--</section>-->
    <!-- Discount action Ends -->

    <!-- partner starts -->
    <!--<section class="our-partner pb-6 pt-6">-->
    <!--    <div class="container">-->
    <!--        <div class="section-title mb-6 w-75 mx-auto text-center">-->
    <!--            <h4 class="mb-1 theme1">Our Partners</h4>-->
    <!--            <h2 class="mb-1">Our Awesome <span class="theme">partners</span></h2>-->
    <!--            <p></p>-->
    <!--        </div>-->
    <!--        <div class="row align-items-center partner-in partner-slider">-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="images/cl-1.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="images/cl-5.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="images/cl-2.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="images/cl-3.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="images/cl-4.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-3 col-sm-6">-->
    <!--                <div class="partner-item p-4 py-2 rounded bg-lgrey">-->
    <!--                    <img src="images/cl-5.png" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- partner ends -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>