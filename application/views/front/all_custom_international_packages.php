<style>
        table.scrolldown tbody td, thead th {
  width : 260px;
  /* border-right: 2px solid black; */
}

table.scrolldown tbody{
    height : auto !important;
}
.card_price{
    font-size: 60%;
}
.card_price1{
    font-size: 58%;
}
.card_price2{
    font-size: 80%;
}
</style>  

<!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/International_banner.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title;?></h1> -->
                    <h1 class="mb-3">Custom International </h1><h1 class="mt-5">Destinations</h1>
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
           <?PHP foreach($international_packages_all as $key => $international_packages_all_value) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="trend-item rounded box-shadow card_bg" data-aos="fade-up" data-duration="500">
                        <div class="trend-image position-relative">
                            <img src="<?php echo base_url(); ?>uploads/packages/<?php echo $international_packages_all_value['image_name']; ?>" alt="image" height="250px">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-4 position-relative w-100">
                            <div class="new-trend2 bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> <?php echo $international_packages_all_value['tour_number_of_days']; ?> Days Tours</span>
                                </div>
                            </div>
                            <div class="new-trend term-btn bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <span class="fw-bold">Tour No. <?php echo $international_packages_all_value['tour_number']; ?></span>
                                </div>
                            </div>
                            <!-- <h5 class="theme mb-1">Tour Number: <?php //echo $international_packages_all_value['tour_number']; ?></h5> -->
                            <!-- <h3 class="mb-1 card_title"><a href="<?php //echo base_url(); ?>international_packages/package_details/<?php //echo $international_packages_all_value['id']; ?>"><?php //echo mb_substr($international_packages_all_value['tour_title'], 0, 18); ?></a></h3> -->
                            <h3 class="mb-1 card_title"><?php echo mb_substr($international_packages_all_value['tour_title'], 0, 18); ?></h3>
                            <div class="rating-main d-flex align-items-center pb-1">
                            <div class="rating">
                                        <?php if($international_packages_all_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_all_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_all_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_all_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($international_packages_all_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php } ?>
                                    </div>
                                     &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="entry-meta">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0">Starting from<span class="theme fw-bold fs-5">
                                            <?php 
                                                if($international_packages_all_value['cost']>0){
                                                ?>
                                                <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $international_packages_all_value['cost'];?></span></p>
                                                <?php } else{
                                                ?>
                                                <i class="fa fa-inr" aria-hidden="true"></i> <span class="card_price">On Demand</span> </span></p>
                                                <?php } ?>
                                        </div>
                                
                                    </div>
                            </div>
                            <!-- <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                    <p class="mb-2">Tour Date&nbsp;<span class="theme fw-bold"> <?php //echo $international_packages_all_value['journey_date'];?></span> <a href="" class="package-date" data-bs-toggle="modal" data-bs-target="#tour_dates_Modal_<?php //echo $international_packages_all_value['id'] ?>">..More Dates</a></p> 
                                </div>
                            </div> -->
                            <!-- <p class=" border-b pb-2 mb-2"><?php //echo mb_substr($international_packages_all_value['short_description'], 0, 70); ?></p> -->
                            
                            <!-- <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                    <p class="mb-0">Starting from<span class="theme fw-bold fs-5"> <i class="fa fa-inr" aria-hidden="true"></i> <?php //echo $international_packages_all_value['cost'];?></span></p>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="#" class="nir-btn term-btn white fw-bold btn-width" data-bs-toggle="modal" data-bs-target="#InclusionModal_<?php echo $international_packages_all_value['id'] ?>">Inclusion</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="#" class="nir-btn term-btn fw-bold btn-width white" data-bs-toggle="modal" data-bs-target="#itineraryModal_<?php echo $international_packages_all_value['id'] ?>">Itinerary</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="<?php echo base_url(); ?>agent_list/index" class="nir-btn term-btn fw-bold btn-width white">Contact Us</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <a href="#" class="nir-btn term-btn fw-bold btn-width white" data-bs-toggle="modal" data-bs-target="#tcModal_<?php echo $international_packages_all_value['id'] ?>">T & C</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <a href="<?php echo base_url(); ?>custom_inter_booking_enquiry/custom_inter_package_details/<?php echo $international_packages_all_value['id']; ?>">
                        <div class="card-footer card_readmore" id="button-2">
                            <div id="slide"></div>
                                <small class="card_css fw-bold">View More</small>
                        </div>
                        </a>
                        
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

<?php foreach($international_packages_all as $key => $international_packages_all_value) { ?>
<!-- itinerary modal -->
<div class="modal fade" id="itineraryModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Itinerary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b" style="height:425px;">
                <div id="" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                        <div class="responsive-wrapper"
                            style="-webkit-overflow-scrolling: touch;">

                            <?php if(!empty($international_packages_all_value['pdf_name'])) { ?>
                            <embed src="<?php echo base_url(); ?>uploads/package_daywise_program/<?php echo $international_packages_all_value['pdf_name']; ?>#toolbar=0" type="application/pdf" frameborder="0" width="100%"  height="400px">
                            
                            <?php }?> 
                        </div>

                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Inclusion modal -->
<div class="modal fade" id="InclusionModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Inclusion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $international_packages_all_value['id'] ?> -->
            <?php if(!empty($international_packages_all_value['inclusion_img'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/inclusion_img/<?php echo $international_packages_all_value['inclusion_img']; ?>" width="100%"/> 
            <?php } ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Terms & Condition modal -->
<div class="modal fade" id="tcModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Terms & Condition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $international_packages_all_value['id'] ?> -->
            <?php if(!empty($international_packages_all_value['tc_img'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/tc_img/<?php echo $international_packages_all_value['tc_img']; ?>" width="100%" style=""/> 
            <?php } ?>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Date modal -->
<div class="modal fade" id="tour_dates_Modal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Dates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <table class="table table-bordered scrolldown">
                            <thead>
                            <tr class="table_head">
                                <th>Dates</th>
                                <th>Single Per Seat</th>
                                <th>Twin Sharing Per Seat</th>
                                <th>3/4 Sharing Per Seat</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                        <?php 
                        $record = array();
                        $fields = "package_date.*";
                        $this->db->where('packages.id',$international_packages_all_value['id']);
                        $this->db->where('packages.is_deleted','no');
                        $this->db->where('packages.is_active','yes');
                        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
                        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
                        // $this->db->group_by('package_id');
                        $international_packages_dates = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
                        
                        foreach($international_packages_dates as $international_packages_all_dates_value){ ?>        
                            <tr>
                                <td><?php echo isset($international_packages_all_dates_value['journey_date']) && $international_packages_all_dates_value['journey_date']!=''? date('d-m-Y', strtotime($international_packages_all_dates_value['journey_date'])):''; ?></td>
                                <td>₹ <?php echo $international_packages_all_dates_value['single_seat_cost'];?></td>
                                <td>₹ <?php echo $international_packages_all_dates_value['twin_seat_cost'];?></td>
                                <td>₹ <?php echo $international_packages_all_dates_value['three_four_sharing_cost'];?></td>
                            </tr>
                        <?php } ?>
                            </tbody>
                        </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<?php } ?>