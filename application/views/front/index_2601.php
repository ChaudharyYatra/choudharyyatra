    <style>
    /* testimonial index page */
    .item_right{
    margin-left: 20% !important;
    } 
    </style>

    <!-- banner starts -->
    <section class="banner overflow-hidden">
        <div class="slider top50">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($sliders as $key => $sliders_value) { ?>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            
                            <div class="slide-image" style="background-image:url(<?php echo base_url(); ?>uploads/slider/<?php echo $sliders_value['image_name']; ?>)"></div>
                            <!-- <div class="swiper-content">
                                <div class="entry-meta mb-2">
                                    <h5 class="entry-category mb-0 white"><?php //echo $sliders_value['title']; ?></h5>
                                </div>
                                <h1 class="mb-2"><a href="#" class="white"><?php //echo $sliders_value['sub_title']; ?></a></h1>
                                <p class="white mb-4"><?php //echo $sliders_value['description']; ?></p>
                            </div> -->
                            <div class=""></div>
                        </div> 
                    </div>
                    <?php } ?>
                   
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
    <!-- banner ends -->

    <!-- form main starts -->
    <div class="form-main">
        <div class="section-shape top-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape-pat.png);"></div>
        <div class="container">
            <div class="row align-items-center form-content rounded position-relative ms-5 me-5">
                <div class="col-lg-2 p-0">
                    <h4 class="form-title form-title1 text-center p-4 py-5 white bg-theme mb-0 rounded-start d-lg-flex align-items-center"><i class="icon-location-pin fs-1 me-1"></i> Find Your Holidays</h4>
                </div>
                <div class="col-lg-10 px-4">
                    <form action="<?php echo base_url();?>home/all_packages_search" method="post">
                    <div class="form-content-in d-lg-flex align-items-center">
                        <div class="form-group me-2">
                            <div class="input-box">
                                <!-- <select class="niceSelect" name="destination_name" >
                                    <option value="">Select Destination</option>
                                    <?php //foreach($main_packages as $pack_data){  ?>
                                    <option value="<?php //echo $pack_data['tour_title'];?>"><?php //echo $pack_data['tour_title'];?></option>
                                    <?php //} ?>
                                </select> -->
                                    <input type="text" list="mylist" size="5" name="destination_name" placeholder="Where would you like to go?">
                                    <datalist id="mylist" style="margin-top:500px!important;">
                                        <?php foreach($main_packages as $pack_data){  ?>
                                            <option value="<?php echo $pack_data['tour_title'];?>"><?php echo $pack_data['tour_title'];?></option>
                                        <?php } ?>
                                        
                                    </datalist>
                            </div>                            
                        </div>
                            
                      
                        <div class="form-group mb-0 text-center">
                            <input type="submit" class="nir-btn w-100" id="submit" value="Search Now" name="submit" style="width:20px">
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form main ends -->

<?php foreach($core_features as $key => $core_features_value) { ?>
    <!-- about-us starts -->
    <section class="about-us pb-0 pt-10" style="background-image:url(<?php echo base_url(); ?>assets/front/images/shape4.png); background-position:center;">
        <div class="container">
            
        <!-- w-50 -->
            <div class="section-title mb-6 w-75 mx-auto text-center">
                
                <span>
                    <img src=<?php echo base_url(); ?>uploads\do_not_delete\get_to_know.png height="30%" width="30%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500"> <span class="theme">We Will Take Care  Of You</span></h2>
                <h4 class="mb_for_img" data-aos="fade-up" data-duration="500"><b>As We Provide Best</b></h4>
                <!-- We are best at providing -->
            </div>

            <!-- why us starts -->
            <div class="why-us">
                <div class="why-us-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInX">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fa fa-h-square white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_one_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_one_description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInY visible">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fa fa-plane white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_two_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_two_description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInY visible">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fas fa-hamburger white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_three_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_three_description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="why-us-item p-5 pt-4 pb-4 border rounded bg-white h-95 box_shadow animated flipInY visible">
                                <div class="why-us-content">
                                    <div class="why-us-icon mb-1">
                                        <i class="fa fa-user white" style="font-size:48px;"></i>
                                    </div>
                                    <h4 class="white"><?php echo $core_features_value['feature_four_title']; ?></h4>
                                    <p class="mb-2"><?php echo $core_features_value['feature_four_description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->
<?php } ?>


<!-- <section class="" style="margin-top:-50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <img src=<?php //echo base_url(); ?>IndiaMap.png height="70%" width="60%" alt></img>
                </div>
            </div>
        </div>
    </div>
</section> -->



    <!-- best tour Starts -->
    <section class="trending bg-grey pt-16 pb-5">
        <div class="section-shape top-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape8.png);"></div>
        <div class="container">
        <div class="section-title mb-6 w-75 mx-auto text-center">
                
                <span>
                    <img src=<?php echo base_url(); ?>india.png height="30%" width="60%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Our <span class="theme" data-aos="fade-up" data-duration="500">Indian Destinations</span></h2>  
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">Let's Explore Our Own Colorful Land</h4>
            </div>
            <div class="trend-box">
                <div class="row item-slider">
                    <?php  
                   foreach($main_packages as $key => $main_packages_value) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
						<a href="<?php echo base_url(); ?>packages/package_details/<?php echo $main_packages_value['id']; ?>">
                        <div class="trend-item rounded box-shadow bg-white" data-aos="fade-left" data-duration="100">
                            <div class="trend-image position-relative">
                                <img src="<?php echo base_url(); ?>uploads/packages/<?php echo $main_packages_value['image_name']; ?>" alt="<?php echo $main_packages_value['image_name']; ?>" height="250px">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> <?php echo $main_packages_value['tour_number_of_days']; ?> Days Tours</span>
                                    </div>
                                </div>
                               <h5 class="theme mb-1">Tour Number: <?php echo $main_packages_value['tour_number']; ?></h5>
                                <h3 class="mb-1 card_title"><?php echo mb_substr($main_packages_value['tour_title'], 0, 18); ?></h3>
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
                                        <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $main_packages_value['cost']; ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
							</a>
                    </div>
                    <?php } ?>
                   
                </div>
            </div>  
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url(); ?>packages/all_packages" class="nir-btn">View All Packages</a>
                </div>
        </div>
    </section>
    <!-- best tour Ends -->

        <!-- Speciality Tours Deal Starts -->
        <section class="trending pt-17 pb-1 top" style="background-image: url(images/shape4.png);">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <span>
                    <img src=<?php echo base_url(); ?>uploads\do_not_delete\Trending.png height="30%" width="30%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Trending <span class="theme" data-aos="fade-up" data-duration="500">Destinations </span></h2>  
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">Let's Experience The Season's Speciality</h4>
            </div>
            <div class="trend-box">
                <div class="row item-slider">
                <?php foreach($package_mapping_data as $pm_data){ ?>    
                    <div class="col-lg-4">
                        <div class="trend-item1 rounded box-shadow bg-white mb-4" data-aos="fade-left" data-duration="100">
                            <a href="<?php echo base_url(); ?>tour_list/index/<?php echo $pm_data['id']; ?>" class="white">
                            <div class="trend-image position-relative">
                                <img src="<?php echo base_url(); ?>uploads/package_mapping/<?php echo $pm_data['image_name']; ?>" alt="image" class="">
                                <div class="trend-content1 p-4">
                                    <h3 class="mb-1 white card_title"><?php echo mb_substr($pm_data['package_title'], 0, 18); ?></h3>
                                    
                                    <!-- <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0 white">Starting from <span class="theme1 fw-bold fs-5">₹ <?php //echo $pm_data['cost']; ?></span></p>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="overlay"></div>
                            </div>
                            </a>
                        </div>
                    </div>
                  <?php } ?>
                </div>
                    <div class="col-lg-12 text-center">
                        <a href="<?php echo base_url(); ?>tour_list/all_main_category_list" class="nir-btn">View All Packages</a>
                    </div>
            </div>    
        </div>
    </section>
    <!-- Speciality Tours Deal Ends -->

    <!-- <section class="" style="margin-top:-50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <img src=<?php //echo base_url(); ?>WorldMap.png height="70%" width="60%" alt></img>
                </div>
            </div>
        </div>
    </div>
    </section> -->

    <!-- top Destination starts -->
    <section class="trending bg-grey pb-3 pt-5">
    <div class="section-shape top-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape8.png);"></div>
        <div class="container">
            <div class="section-title mb-6 mt-8 w-75 mx-auto text-center">
                <span>
                    <img src=<?php echo base_url(); ?>international1.png height="20%" width="60%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Our <span class="theme" data-aos="fade-up" data-duration="500">International Destinations</span></h2>
                <h4 class="mb-1 theme_sub_title" data-aos="fade-up" data-duration="500">Let's Fly To Another Country</h4>
            </div>
            <div class="row align-items-center">
                <div class="row item-slider">
                    <?php if(count($international_packages)>0) { foreach($international_packages as $key => $international_packages_value) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
						<a href="<?php echo base_url(); ?>international_packages/package_details/<?php echo $international_packages_value['id']; ?>">
                        <div class="trend-item rounded box-shadow bg-white card_bg" data-aos="fade-left" data-duration="100">
                            <div class="trend-image position-relative">
                                <img src="<?php echo base_url(); ?>uploads/international_packages/<?php echo $international_packages_value['image_name']; ?>" alt="<?php echo $international_packages_value['image_name']; ?>" height="250px">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> <?php echo $international_packages_value['tour_number_of_days']; ?> Days Tours</span>
                                    </div>
                                </div>
                               <h5 class="theme mb-1">Tour Number: <?php echo $international_packages_value['tour_number']; ?></h5>
                                <h3 class="mb-1 card_title"><?php echo mb_substr($international_packages_value['tour_title'], 0, 18); ?></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    
                                    <div class="rating">
                                        <?php if($international_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_value['rating']=='5') {
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
                                        <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $international_packages_value['cost']; ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
							</a>
                    </div>
                    <?php } } ?>
                   
                </div>
                
            </div>
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url(); ?>international_packages/all_packages" class="nir-btn">View All Packages</a>
                </div>
        </div>
    </section>
    <!-- top Destination ends -->


    <!-- testimonial starts -->
    <section class="testimonial pt-10 pb-20"  style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Good_Reviews.png);">   
        <div class="container">
            <div class="testimonial-in">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="section-title">
                            <h4 class="mb-1 theme1" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine">Our Testimonials</h4>
                            <h2 class="mb-1 white" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine">Good Reviews By <span class="theme">Clients</span></h2>
                            <p class="mb-0 white" data-aos="fade-right" data-aos-offset="1s00" data-aos-easing="ease-in-sine">Reviews given by our clients about their tours.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row about-slider">
                            <?php if(count($client_reviews)>0) { foreach($client_reviews as $key => $client_reviews_value) { ?>
                            <div class="col-md-4 item" data-aos="fade-left" data-aos-offset="100" data-aos-easing="ease-in-sine">
                                <div class="testimonial-item1 item_right">
                                    <div class="details d-flex">
                                        <i class="fa fa-quote-left fs-1 mb-0"></i>
                                        <div class="author-content ms-4">
                                            <p class="mb-4 white fs-5 fw-normal"><?php echo $client_reviews_value['review']; ?></p>
                                            
                                            <div class="author-info d-flex align-items-center">
                                                <img src="<?php echo base_url(); ?>uploads/client_reviews/<?php echo $client_reviews_value['image_name']; ?>" alt="<?php echo $client_reviews_value['name']; ?>">
                                                <div class="author-title ms-3">
                                                    <h5 class="m-0 theme1"><?php echo $client_reviews_value['name']; ?></h5>
                                                    <span class="white"><?php echo $client_reviews_value['designation']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 

        <div class="dot-overlay"></div>   
    </section>
    <!-- testimonial Ends -->

    <!-- offer Packages Starts -->
    <!-- <section class="trending trend-packages pt-0 pb-0 z-index3">
        <div class="container">
            <div class="trend-box mt-minus">
                <div class="row review-slider1 mx-0">
                    <?php //if(count($random_packages)>0) { foreach($random_packages as $key => $random_packages_value) { ?>
                    <div class="col-lg-6 px-2">
						<a href="<?php //echo base_url(); ?>packages/package_details/<?php //echo $random_packages_value['id']; ?>">
                        <div class="trend-full bg-white rounded box-shadow overflow-hidden card_bg">
                            <div class="row m-0">
                               
                                <div class="col-lg-12 col-md-12">
                                    <div class="trend-content py-3 position-relative">
                                        <h5 class="theme mb-1">Tour Number: <?php //echo $random_packages_value['tour_number']; ?></h5>
                                        <h3 class="mb-1"><?php //echo $random_packages_value['tour_title']; ?></h3>
                                        <div class="rating-main d-flex align-items-center pb-2">
                                            <div class="rating">
                                                 <?php //if($random_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //}
                                        //if($random_packages_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php //} ?>
                                            </div>
                                           
                                        </div>
                                        <p><?php //echo mb_substr($random_packages_value['short_description'], 0, 20); ?> </p>
                                        <div class="trend-meta border-b pb-2 mb-2">
                                            <div class="entry-author theme">
                                                <i class="icon-calendar"></i>
                                                <span> <?php //echo $random_packages_value['tour_number_of_days']; ?></span>
                                            </div>
                                        </div>
                                        <div class="entry-meta">
                                            <div class="entry-author d-flex align-items-center">
                                                <p class="mb-0">Starting from <i class="fa fa-inr" aria-hidden="true"></i><span class="theme fw-bold fs-5"> <?php echo $random_packages_value['cost']; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
							</a>
                    </div>
                    <?php //} } ?>
                </div>
            </div>    
        </div>
    </section> -->
    <!-- offer Packages Ends -->

    <!-- our teams starts -->
    <section class="our-team pb-0">
        <div class="container">
              
            <div class="section-title mb-6 w-75 mx-auto text-center">
                <span>
                    <img src=<?php echo base_url(); ?>uploads\do_not_delete\meet_our_expert.png height="30%" width="30%" alt></img>
                </span>
                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Meet <span class="theme" data-aos="fade-up" data-duration="500">Our Experts</span></h2>
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">Team Working Together To Make Your Trip Memorable</h4>
                <!-- <p>A person who shows the way to others.</p> -->
            </div>  
            <div class="team-main">
                <div class="row shop-slider">
                    <?php if(count($tour_guides)>0) { foreach($tour_guides as $key => $tour_guides_value) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="team-list rounded" data-aos="flip-left" data-aos-duration="3000">
                            <div class="team-image">
                                <img src="<?php echo base_url(); ?>uploads/tour_guides/<?php echo $tour_guides_value['image_name']; ?>" alt="<?php echo $tour_guides_value['name']; ?>">
                            </div>
                            <div class="team-content text-center p-3 bg-theme">
                               <h4 class="mb-0 white"><?php echo $tour_guides_value['name']; ?></h4>
                                <p class="mb-0 white"><?php echo $tour_guides_value['designation']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- our teams Ends -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

 