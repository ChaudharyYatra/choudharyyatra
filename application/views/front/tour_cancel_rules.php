
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/tourCancelRule.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3"><?php echo $page_title; ?></h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 
<?php if(count($tour_cancel_rules)>0) { foreach($tour_cancel_rules as $key => $tour_cancel_rules_value) { ?>
    <section class="about-us pt-6" style="background-image:url(<?php echo base_url(); ?>assets/front/images/background_pattern.png); background-position:bottom right;">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-12 ps-4">
                        <!-- <h3 class="theme d-inline-block mb-3 d-flex justify-content-center"><?php //echo 'Tour Cancel Rules'; ?></h3> -->
                        <div class="about-content text-center text-lg-start Para">
                            <p class="border-b mb-2 pb-2"><?php echo $tour_cancel_rules_value['rules']; ?></p>
                    
                            <div class="download-btn">
                                <?php if(!empty($tour_cancel_rules_value['pdf'])) { ?><a class="nir-btn" download="" href="<?php echo base_url(); ?>uploads/tour_cancel_rules/<?php echo $tour_cancel_rules_value['pdf']; ?>">Download PDF</a><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <?php } } ?>