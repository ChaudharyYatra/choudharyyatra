
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/policy_header.jpg);">
        
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

    <?php if(count($privacy_policy)>0) { foreach($privacy_policy as $key => $privacy_policy_value) { ?>
    <section class="about-us pt-6" style="background-image:url(<?php echo base_url(); ?>assets/front/images/background_pattern.png); background-position:bottom right;">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-12 ps-4">
                        <!-- <h3 class="theme d-inline-block mb-3 d-flex justify-content-center"><?php //echo 'Privacy Policy'; ?></h3> -->
                        <div class="about-content text-center text-lg-start Para">
                            <p class="border-b mb-2 pb-2"><?php echo $privacy_policy_value['privacy_policy']; ?></p>
                            <div class="download-btn">
                                <?php if(!empty($privacy_policy_value['pdf'])) { ?><a class="nir-btn" download="" href="<?php echo base_url(); ?>uploads/privacy_policy/<?php echo $privacy_policy_value['pdf']; ?>">Download PDF</a><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <?php } } ?>