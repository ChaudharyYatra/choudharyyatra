<!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/c_s.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title; ?></h1> -->
                    <h1 class="mb-3">Reach Upto Us</h1>
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
<!-- contact starts -->
    <section class="contact-main pt-4 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <!-- <h3 class="mb-1">CONTACT US</h3> -->
                                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Still thinking..? Start Packing <br><span class="theme" data-aos="fade-up" data-duration="500">Call us</span></h2>
                                <span>
                                    <img class="mb_for_img_cont" src=<?php echo base_url(); ?>heading_img.png height="30%" width="30%" alt></img>
                                </span>
                            </div>
                             <?php foreach($website_basic_structure as $key => $website_basic_structure_value) { ?>
                            
                            
                            <div class="contact-info-content row mb-1 pt-2">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-box-color px-4 py-5 border-all text-center rounded box-shadow1 h-100" data-aos="flip-left" data-aos-duration="1000">
                                        <div class="info-icon mb-2">
                                            <i class="fas fa-map-marker-alt theme-icon" style="font-size:36px"></i>
                                        </div>
                                        <div class="info-content">
                                            <h4>Office Location</h4>
                                            <p class="m-0"><?php echo $website_basic_structure_value['location']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-box-color px-4 py-5 border-all text-center rounded box-shadow1 h-100" data-aos="flip-left" data-aos-duration="1000">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-phone theme-icon" style="font-size:36px"></i>
                                        </div>
                                        <div class="info-content">
                                            <h4>Phone Number</h4>
                                            <p class="m-0"><?php echo $website_basic_structure_value['contact_number']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="info-item bg-box-color px-4 py-5 border-all text-center justify-content-center rounded box-shadow1 h-100" data-aos="flip-left" data-aos-duration="1000">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope theme-icon" style="font-size:36px"></i>
                                        </div>
                                        <div class="info-content">
                                            <h4>Email Address</h4>
                                            <p class="m-0"><?php echo $website_basic_structure_value['email']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="contact-form1" class="contact-us-form">
                                <div class="row">
                                   
                                    
                                    <div class="col-lg-6">
                                        <div id="contactform-error-msg"></div>
                                        
                                        <form method="post" action="<?php echo base_url();?>contact_us/index" onsubmit="return validatecontactForms()" data-aos="fade-up" data-duration="500">
                                            <div class="form-group mb-2">
                                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="fname_error" style="display:none"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="lname_error" style="display:none"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                                                <span class="text-danger float-left" id="email_error" style="display:none"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="mobile_error" style="display:none"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <textarea type="text" name="message" class="form-control form_css" id="message" placeholder="Message"></textarea>
                                                <span class="text-danger float-left" id="msg_error" style="display:none"></span>
                                            </div>
                                            <div class="comment-btn text-right">
                                                <input type="submit" class="nir-btn" name="submit" value="Send Message">
                                            </div>
                                        </form>
                                        
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="map rounded overflow-hiddenb rounded mb-md-4" data-aos="fade-up" data-duration="500">
                                            <div style="width: 100%">
                                                <iframe height="450" class="map-border" src="<?php echo $website_basic_structure_value['map']; ?>"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
