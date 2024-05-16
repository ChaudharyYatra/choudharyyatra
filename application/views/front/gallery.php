
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/gallery.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title; ?></h1> -->
                    <h1 class="mb-3">Photo Album</h1>
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

   <!-- Gallery starts -->
    <div class="gallery pt-4 pb-0">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto">
                <!-- <h4 class="mb-1 theme1">Our Gallery</h4> -->
                <h2 class="mb-1">See the Happiness of <span class="theme">our travelers</span></h2>
                <!-- <p>Taking pictures is savoring life intensely, every hundredth of a second.</p> -->
            </div>
            <div class="row">
            <?php if(count($gallery)>0) { foreach($gallery as $key => $gallery_value) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="gallery-item mb-4 rounded overflow-hidden" data-aos="fade-up" data-duration="500">
                        <div class="gallery-image">
                            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $gallery_value['image_name']; ?>" alt="image" height="300px">
                        </div>
                        <div class="gallery-content">
                            <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100"><?php echo $gallery_value['title']; ?></h5>
                            <ul>
                            <li><a href="<?php echo base_url(); ?>uploads/gallery/<?php echo $gallery_value['image_name']; ?>" data-lightbox="gallery" data-title="<?php echo $gallery_value['title']; ?>"><i class="fa fa-eye"></i></a></li>
                           
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } } ?>
                
            </div>
        </div>
    </div>
    <!-- Gallery Ends -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>