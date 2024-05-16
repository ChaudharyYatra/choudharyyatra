<!-- BreadCrumb Starts -->  
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Packages.png);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3"><?php echo $page_title;?></h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Main Category Lists</li>
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
        <div class="row flex-row-reverse">
            <div class="col-lg-8">
                <div class="list-results d-flex align-items-center justify-content-between">
                    <div class="list-results-sort">
                        <!--<p class="m-0">Showing 1-5 of 80 results</p>-->
                    </div>
                    <div class="click-menu d-flex align-items-center justify-content-between">
                        <div class="sortby d-flex align-items-center justify-content-between ml-2">
                           <select class="niceSelect" name="filter_val_cat" id="filter_val_cat">
                        <option value="" >Sort By</option>
                        <option value="low_to_high">Price: low to high</option>
                        <option value="high_to_low">Price: high to low</option>
                    </select> 
                        </div>
                    </div>
                </div>

                <div class="destination-list">
                    
                    <?php foreach($package_mapping as $package_mapping_data){ ?>
                    <div class="trend-full bg-white rounded box-shadow overflow-hidden p-4 mb-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-3">
                               <div class="trend-item2 rounded">
                                    <a href="#" style="background-image: url(<?php echo base_url(); ?>uploads/package_mapping/<?php echo $package_mapping_data['image_name'];?>);"></a>
                                     <div class="color-overlay"></div>
                                </div> 
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="trend-content position-relative text-md-start text-center">
                                    <small><?php echo $package_mapping_data['tour_number_of_days'];?></small>
                                    <h3 class="mb-1"><a href="<?php echo base_url(); ?>tour_list/index/<?php echo $package_mapping_data['id']; ?>"><?php echo $package_mapping_data['package_title'];?></a></h3>
                                    <!--<h6 class="theme mb-0"><i class="icon-location-pin"></i>India</h6>-->
                                    <!--<p class="mt-4 mb-0">Taking Safety Measures <br><a href="#"><span class="theme"> Free cancellation</span></a></p>-->
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="trend-content text-md-end text-center">
                                    <div class="rating">
                                    <?php if($package_mapping_data['rating']=='1') { ?>
                                    <span class="fa fa-star checked"></span>
                                    <?php }
                                    if($package_mapping_data['rating']=='2') {
                                    ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <?php }
                                    if($package_mapping_data['rating']=='3') {
                                    ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <?php }
                                    if($package_mapping_data['rating']=='4') {
                                    ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <?php }
                                    if($package_mapping_data['rating']=='5') {
                                    ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <?php } ?>
                                </div>
                                    <small>200 Reviews</small>
                                    <div class="trend-price my-2">
                                        <span class="mb-0">Starting From</span>
                                        <h3 class="mb-0"><i  class="fa fa-inr" aria-hidden="true" style="font-size:15px"></i><?php echo $package_mapping_data['cost'];?></h3>
                                        <!--<small>Per Adult</small>-->
                                    </div>
                                    <a href="<?php echo base_url(); ?>tour_list/index/<?php echo $package_mapping_data['id']; ?>" class="nir-btn">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>







                    <div class="text-center">
                        <!--<a href="#" class="nir-btn">Load More <i class="fa fa-long-arrow-alt-right"></i></a>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pe-lg-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <!--<div class="sidebar-item mb-1 mt-2">-->
                        <!--    <h3 class="">Indian Tours</h3>-->
                        <!--    <ul class="sidebar-category1">-->
                        <!--        <li><input type="checkbox" checked> Goa<span class="float-end">92</span></li>-->
                        <!--        <li><input type="checkbox"> Gujarat <span class="float-end">22</span></li>-->
                        <!--        <li><input type="checkbox"> Kashmir <span class="float-end">35</span></li>-->
                        <!--        <li><input type="checkbox"> Andhra Pradesh <span class="float-end">41</span></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="sidebar-item mb-1">-->
                        <!--    <h3 class="">World Tours</h3>-->
                        <!--    <ul class="sidebar-category1">-->
                        <!--        <li><input type="checkbox" checked> America<span class="float-end">92</span></li>-->
                        <!--        <li><input type="checkbox"> Nepal <span class="float-end">22</span></li>-->
                        <!--        <li><input type="checkbox"> Japan China <span class="float-end">35</span></li>-->
                        <!--        <li><input type="checkbox"> Africa <span class="float-end">41</span></li>-->
                        <!--    </ul>-->
                        <!--</div>-->

                        <!--<div class="sidebar-item mb-4">-->
                        <!--    <h3 class="">Days Duration Type</h3>-->
                        <!--    <ul class="sidebar-category1">-->
                        <!--        <li><input type="checkbox" checked> 5 to 8 Days <span class="float-end">92</span></li>-->
                        <!--        <li><input type="checkbox"> 4 to 9 Days <span class="float-end">22</span></li>-->
                        <!--        <li><input type="checkbox"> 10 to 12 Days <span class="float-end">35</span></li>-->
                        <!--        <li><input type="checkbox"> 30 to 40 Days <span class="float-end">41</span></li>-->
                        <!--    </ul>-->
                        <!--</div>-->

                        <div class="sidebar-item mb-4">
                            <h3 class="">Price Duration Type</h3>
                            <div class="range-slider mt-0">
                                <p class="text-start mb-2">Price Range</p>
                                <div data-min="0" data-max="2000" data-unit="$" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                                    <span class="min-value"><i class="fa fa-rupee"></i>0</span> 
                                    <span class="max-value"><i class="fa fa-rupee"></i>100000</span>
                                    <div class="ui-slider-range ui-widget-header ui-corner-all full" style="left: 0%; width: 100%;"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="sidebar-item">
                            <h3>Reviews Related Destinations</h3>
                            <div class="sidebar-destination">
                                <div class="row about-slider">
                                    <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                                        <div class="trend-item1">
                                            <article class="post reviews mb-3 border-b pb-3">
                                                <div class="s-content d-flex align-items-center justify-space-between">
                                                    <div class="sidebar-image w-25 me-3">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/trending/trending1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="content-list w-75">
                                                        <h5 class="mb-1"><a href="#">An Incredibly Easy Method That Works For All</a></h5>
                                                        <div class="date">10 Apr 2021</div>
                                                    </div>    
                                                </div> 
                                            </article>
                                            <article class="post mb-3 border-b pb-3">
                                                <div class="s-content d-flex align-items-center justify-space-between">
                                                    <div class="sidebar-image w-25 me-3">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/trending/trending1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="content-list w-75">
                                                        <h5 class="mb-1"><a href="#">An Incredibly Easy Method That Works For All</a></h5>
                                                        <div class="date">10 Apr 2021</div>
                                                    </div>    
                                                </div> 
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                        <div class="trend-item1">
                                            <article class="post mb-3 border-b pb-3">
                                                <div class="s-content d-flex align-items-center justify-space-between">
                                                    <div class="sidebar-image w-25 me-3">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/trending/trending1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="content-list w-75">
                                                        <h5 class="mb-1"><a href="#">An Incredibly Easy Method That Works For All</a></h5>
                                                        <div class="date">10 Apr 2021</div>
                                                    </div>    
                                                </div> 
                                            </article>
                                            <article class="post mb-3 border-b pb-3">
                                                <div class="s-content d-flex align-items-center justify-space-between">
                                                    <div class="sidebar-image w-25 me-3">
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/trending/trending1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="content-list w-75">
                                                        <h5 class="mb-1"><a href="#">An Incredibly Easy Method That Works For All</a></h5>
                                                        <div class="date">10 Apr 2021</div>
                                                    </div>    
                                                </div> 
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top Destination ends -->

</body>
</html>