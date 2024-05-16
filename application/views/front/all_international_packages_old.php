    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/International_banner.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title;?></h1> -->
                    <h1 class="mb-3">International Destinations</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title;?></li>
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
                   
                </div>
                <div class="click-menu d-flex align-items-center justify-content-between">
                    <div class="sortby d-flex align-items-center justify-content-between ml-2">
                        <select class="niceSelect" name="internationa_filter_val" id="internationa_filter_val">
                            <option value="" >Sort By</option>
                            <option value="low_to_high">Price: low to high</option>
                            <option value="high_to_low">Price: high to low</option>
                        </select> 
                    </div>
                </div>
            </div>

            <div class="row">
           <?PHP foreach($international_packages as $key => $international_packages_value) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="trend-item rounded box-shadow" data-aos="fade-up" data-duration="500">
                        <div class="trend-image position-relative">
                            <img src="<?php echo base_url(); ?>uploads/international_packages/<?php echo $international_packages_value['image_name']; ?>" alt="image" height="300px">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative w-100">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> <?php echo $international_packages_value['tour_number_of_days']; ?> Days Tours</span>
                                </div>
                            </div>
                            <h5 class="theme mb-1">Tour Number: <?php echo $international_packages_value['tour_number']; ?></h5>
                            <h3 class="mb-1"><a href="<?php echo base_url(); ?>international_packages/package_details/<?php echo $international_packages_value['id']; ?>"><?php echo mb_substr($international_packages_value['tour_title'], 0, 18); ?></a></h3>
                            <div class="rating-main d-flex align-items-center pb-2">
                            <div class="rating">
                                        <?php if($international_packages_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
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
                            <!-- <p class=" border-b pb-2 mb-2"><?php //echo mb_substr($international_packages_value['short_description'], 0, 70); ?></p> -->
                            
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                    <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $international_packages_value['cost'];?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>    
            </div>
        </div>
    </section>
    <!-- top Destination ends -->


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>