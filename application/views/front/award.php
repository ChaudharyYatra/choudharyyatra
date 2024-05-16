
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/award_slider.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title; ?></h1> -->
                    <h1 class="mb-3">Accreditations</h1>
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

    <!-- Award Gallery starts -->
    <div class="gallery pt-4 pb-0">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto">
                <!-- <h4 class="mb-1 theme1">Our Award's</h4> -->
                <h2 class="mb-1">Our <span class="theme">Achievements</span></h2>
                <h4 class="mb_for_img theme_sub_title" data-aos="fade-up" data-duration="500">When Hard Work Received Recognition</h4>
                <!-- <p>When Hard Work Received Recognition.</p> -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="gallery-item mb-4 rounded overflow-hidden" data-aos="fade-up" data-duration="500">
                        <div class="gallery-image">
                            <img src="<?php echo base_url(); ?>uploads/do_not_delete/awards-big4.jpg" alt="image" height="300px">
                        </div>
                        <div class="gallery-content">
                            <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">International Award</h5>
                            <ul>
                            <li><a href="<?php echo base_url(); ?>uploads/do_not_delete/awards-big4.jpg" data-lightbox="gallery" data-title=""><i class="fa fa-eye"></i></a></li>
                            
                            </ul>
                        </div>
                    </div>
                </div>
            
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="gallery-item mb-4 rounded overflow-hidden" data-aos="fade-up" data-duration="500">
                    <div class="gallery-image">
                        <img src="<?php echo base_url(); ?>uploads/do_not_delete/awards-big5.jpg" alt="image" height="300px">
                    </div>
                    <div class="gallery-content">
                        <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">International Award</h5>
                        <ul>
                        <li><a href="<?php echo base_url(); ?>uploads/do_not_delete/awards-big5.jpg" data-lightbox="gallery" data-title=""><i class="fa fa-eye"></i></a></li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                </div>
            <div class="row">
                <?php if(count($award)>0) { foreach($award as $key => $award_value) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="gallery-item mb-4 rounded overflow-hidden" data-aos="fade-up" data-duration="500">
                            <div class="gallery-image">
                                <img src="<?php echo base_url(); ?>uploads/award/<?php echo $award_value['image_name']; ?>" alt="image" height="290px">
                            </div>
                            <div class="gallery-content">
                                <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100"><?php echo $award_value['title']; ?></h5>
                                <ul>
                                <li><a href="<?php echo base_url(); ?>uploads/award/<?php echo $award_value['image_name']; ?>" data-lightbox="gallery" data-title="<?php echo $award_value['title']; ?>"><i class="fa fa-eye"></i></a></li>
                            
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                
            </div>
        </div>
    </div>
    <!-- Award Gallery Ends -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>