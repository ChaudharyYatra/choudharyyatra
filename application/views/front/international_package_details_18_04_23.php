<style>
        table.scrolldown tbody td, thead th {
  width : 260px;
  /* border-right: 2px solid black; */
}
    </style> 

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
    <section class="trending pt-6 pb-0 bg-lgrey overflow-hidden package_details_p_color">
        <div class="tabs-navbar1 bg-white sticky1 bordernone py-3">
            <ul id="tabs" class="nav nav-tabs bordernone mb-0 overflow-visible">
                <li><a data-toggle="tab" href="#highlight">Highlight</a></li>
				<li><a data-toggle="tab" href="#dates">Dates & Cost</a></li>
                <li><a data-toggle="tab" href="#iternary">Itinerary</a></li>
                <li><a data-toggle="tab" href="#inclusion">Inclusion</a></li>
                <li><a data-toggle="tab" href="#terms_condition">Terms & Conditions</a></li>
                <li><a data-toggle="tab" href="#contact_us">Contact Us</a></li>      
				<!-- <li><a data-toggle="tab" href="#review">Review</a></li> -->
                <li class="active"><a data-toggle="tab" href="<?php echo base_url();?>international_packages/booking_enquiry/<?php echo $package_details_value['id']; ?>" class="bordernone">Book Now</a></li>
            </ul>
        </div>
       
        <div class="container">
            <div class="single-content">
                <div id="highlight">
                    <div class="single-full-title border-b mb-2 pb-2">
                        <div class="single-title text-center">
                            <h2 class="mb-1"><?php echo $package_details_value['tour_title'];?></h2>
                            <div class="rating-main">                              
                                <p class="mb-0 me-2 d-inline-block">Tour Number : <?php echo $package_details_value['tour_number'];?></p>
                                <div class="rating me-2 d-inline-block">
                                        <?php if($package_details_value['rating']=='1') { ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($package_details_value['rating']=='2') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($package_details_value['rating']=='3') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($package_details_value['rating']=='4') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <?php }
                                        if($package_details_value['rating']=='5') {
                                        ?>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <?php } ?>
                                    
                                </div>
                                <!-- <span>(100 Reviews)</span> -->
                            </div>
                        </div>
                    </div>

                    <div class="description-images mb-4">
                    <?php if(!empty($package_details_value['international_package_full_image'])) { ?><img src="<?php echo base_url(); ?>uploads/international_package_full_image/<?php echo $package_details_value['international_package_full_image']; ?>" alt="image" class="w-100 rounded package_d_height" >
                         <?php }?>
                    </div>
                

                    <div class="description mb-2 text_justify">
                        <h4 class="text-center">Description</h4>
                       <?php echo $package_details_value['full_description'];?>
                    </div>

                </div>
            	
				<div id="dates" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden dates">
                <div class="trend-content-main p-4 pb-2">
                    <div class="trend-content">
                        <div class="eentry-button d-flex justify-content-center align-items-center mb-2">
                                <h4>Tour Dates & Costs</h4>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table_head">
                                <th>Dates</th>
                                <th>Single Per Seat</th>
                                <th>Twin Sharing Per Seat</th>
                                <th>3/4 Sharing Per Seat</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php foreach($package_date_details_data as $date_data){ ?>        
                            <tr>
                                <td><?php echo date('d-m-Y', strtotime($date_data['journey_date'])); ?></td>
                                <td>₹ <?php echo $date_data['single_seat_cost'];?></td>
                                <td>₹ <?php echo $date_data['twin_seat_cost'];?></td>
                                <td>₹ <?php echo $date_data['three_four_sharing_cost'];?></td>
                            </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
				
                <div  id="iternary"  class="accrodion-grp faq-accrodion mb-4"data-grp-name="faq-accrodion">
                <h4 class="text-center">Itinerary</h4>
                <h5 class="text-center">Download Our Brief Daily Program</h5>
                
                <div class="download-btn">
                    
                    <?php 
                    if(!empty($package_details_value['pdf_name'])) { 
                    ?><button type="button" class="btn nir-btn" data-bs-toggle="modal" data-bs-target="#itineraryModal_<?php echo $package_details_value['id'] ?>">
                    Check Daily Routinea 
                    </button><?php } ?> 
                </div>

                <!-- <?php 
                //$status ='active';
                //foreach($package_iternary_data as $iternary_data)
                //{
                ?>
                    <div class="accrodion <?php //echo $status;?>">
                        <div class="accrodion-title rounded">
                            <h5 class="mb-0"><span>Day <?php //echo $iternary_data['day_number'];?></span></h5>
                        </div>
                        <div class="accrodion-content" style="display: block;">
                            <div class="inner">
                                <p><?php //echo $iternary_data['iternary_desc'];?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                //$status='';
                //} ?>     -->
                    
                </div>

                <div id="inclusion" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden inclusion">
                    <div class="trend-content-main p-4 pb-2">
                        <div class="trend-content">
                            <div class="eentry-button d-flex justify-content-center align-items-center mb-2">
                            <h4>Inclusion</h4>
                            </div>
                            <p class="mb-3">
                                <!--<p>Inclusion</p>-->
                                <!-- <?php //echo $package_details_value['inclusion'];?> -->
                                <div class="download-btn">
                                    <?php 
                                    if(!empty($package_details_value['inclusion_img'])) { 
                                    ?><button type="button" class="btn nir-btn" data-bs-toggle="modal" data-bs-target="#InclusionModal_<?php echo $package_details_value['id'] ?>">
                                    View 
                                    </button><?php } ?> 
                                </div>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="terms_condition" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden terms_condition">
                    <div class="trend-content-main p-4 pb-2">
                        <div class="trend-content">
                            <div class="eentry-button d-flex justify-content-center align-items-center mb-2">
                                    <h4>Terms & Conditions</h4>
                            </div>
                            <p class="mb-3">
                                <!-- <?php //echo $package_details_value['terms_conditions'];?> -->
                                <div class="download-btn">
                                    <?php 
                                    if(!empty($package_details_value['tc_img'])) { 
                                    ?><button type="button" class="btn nir-btn" data-bs-toggle="modal" data-bs-target="#tcModal_<?php echo $package_details_value['id'] ?>">
                                    Read
                                    </button><?php } ?> 
                                </div>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="contact_us" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden contact_us">
                    <div class="trend-content-main p-4 pb-2">
                        <div class="trend-content">
                            <div class="eentry-button d-flex justify-content-center align-items-center mb-2">
                                    <h4>Contact Us</h4>
                            </div>
                            <p class="mb-3">
                                <!-- <?php //echo $package_details_value['contact_us'];?> -->
                                <center>
                                    <a href="<?php echo base_url(); ?>agent_list/index"><button type="button" class="btn nir-btn">
                                    Contact your nearest branch
                                    </button></a>
                                </center>
                            </p>
                        </div>
                    </div>
                </div>
				
				<!-- <div id="review" class="trend-item box-shadow bg-white mb-2 rounded overflow-hidden review">
                    <div class="trend-content-main p-4 pb-2">
                        <div class="trend-content">
                            <div class="eentry-button d-flex justify-content-center align-items-center mb-2">
                                    <h4>Write A Review</h4>
                            </div>
                            <div class="contact-form-wrapper d-flex justify-content-center">
                                <form method="POST" action="<?php //echo base_url();?>international_packages/international_package_review" class="contact-form" onsubmit="return validateinternationalreviewForms()">
                                    <div>
                                    <input type="hidden" name="package_id" class="form-control rounded border-white mb-3 form-input" id="package_id" value="<?php //echo $package_details_value['id'];?>">
                                        <input type="text" name="name" class="form-control rounded border-white mt-3 form-input" id="name" placeholder="Name">
                                        <span class="text-danger float-left" id="name_error" style="display:none"></span>
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" class="form-control rounded border-white mt-3 form-input" placeholder="Email address">
                                        <span class="text-danger float-left" id="email_error" style="display:none"></span>
                                    </div>
                                    <div>
                                        <textarea id="message" name="message" id="message" class="form-control rounded border-white mb-1 mt-3 form-text-area" rows="5" cols="30" placeholder="Message"></textarea>
                                        <span class="text-danger float-left" id="msg_error" style="display:none"></span>
                                    </div>
                                    <div class="comment-btn text-center">
                                        <input type="submit" class="nir-btn" name="submit" value="Submit Review">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <?php } ?>
    <!-- top Destination ends -->

    <?php foreach($package_details as $key => $international_packages_all_value) { ?>
<!-- itinerary modal -->
<div class="modal fade" id="itineraryModal_<?php echo $international_packages_all_value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content modal-c">
            <div class="modal-header modal-h">
                <h5 class="modal-title" id="exampleModalLabel">Itinerary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-b">
            <!-- <?php //echo $international_packages_all_value['id'] ?> -->
            <?php if(!empty($international_packages_all_value['pdf_name'])) { ?>
            <img src="<?php echo base_url(); ?>uploads/international_package_daywise_program/<?php echo $international_packages_all_value['pdf_name']; ?>" width="100%"/> 
            <?php } ?>
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
            <img src="<?php echo base_url(); ?>uploads/international_inclusion_img/<?php echo $international_packages_all_value['inclusion_img']; ?>" width="100%"/> 
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
            <img src="<?php echo base_url(); ?>uploads/international_tc_img/<?php echo $international_packages_all_value['tc_img']; ?>" width="100%" style=""/> 
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
                        <?php foreach($international_packages_all_dates as $international_packages_all_dates_value){ ?>        
                            <tr>
                                <td><?php echo date('d-m-Y', strtotime($international_packages_all_dates_value['journey_date'])); ?></td>
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