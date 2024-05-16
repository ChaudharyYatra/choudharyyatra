<!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/c_s.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title; ?></h1> -->
                    <h1 class="mb-3">Reach to Us</h1>
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
                                <span>
                                    <img class="mb_for_img_cont" src=<?php echo base_url(); ?>uploads\do_not_delete\contact_img.PNG height="30%" width="30%" alt></img>
                                </span>
                                <!-- <h3 class="mb-1">CONTACT US</h3> -->
                                <h2 class="mb-1" data-aos="fade-up" data-duration="500">Still thinking..? <span class="theme" data-aos="fade-up" data-duration="500">Call us & Start Packing</span></h2>
                                
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

                            <div class="col-md-12 mt-3">
                                <div class="map rounded overflow-hiddenb rounded mb-md-1" data-aos="fade-up" data-duration="500">
                                    <div style="width: 100%; border:1px solid black; border-radius:10px;">
                                        <iframe height="450" class="map-border" src="<?php echo $website_basic_structure_value['map']; ?>"></iframe>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="contact-form1" class="contact-us-form mt-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="contactform-error-msg"></div>
                                        
                                    <form class="mb-2" method="post" onsubmit="return contactEnquiryForms()">
                                    <h5>&nbsp; Fill your information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                
                                                <input type="text" placeholder="First Name" name="first_name" id="first_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="first_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                
                                                <input type="text" placeholder="Last Name" name="last_name" id="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="last_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                
                                                <input type="text" placeholder="Email Address" name="email" id="email">
                                                <span class="text-danger float-left" id="email_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                
                                                <input type="text" placeholder="Mobile Number" name="mobile_number" id="mobile_number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span>
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group mb-2">
                                                
                                                <input type="text" placeholder="WhatsApp Mobile Number" name="wp_mobile_number" id="wp_mobile_number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <!-- <label>Tour number</label> -->
                                                <select class="niceSelect" name="tour_number" id="tour_number" onchange='CheckColors(this.value); 
                                                this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                                    <option value="">Select tour title</option>
                                                    <option value="Other">Other</option>
                                                    <?php foreach($packages_data as $packages_data_value){ ?> 
                                                        <option value="<?php echo $packages_data_value['id'];?>"><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger float-left" id="tour_number1" style="display:none"></span>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6" id="other_tour_name_div" style='display:none;'>
                                            <div class="form-group">
                                                <!-- <label>Enquiry destination name</label> -->
                                                <input type="text" class="" name="other_tour_name" id="other_tour_name" placeholder="Enter destination name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            <span class="text-danger float-left" id="other_tour_name1" style="display:none"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                
                                                <div class="input-box">
                                                    <select class="niceSelect" name="gender" id="gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="gender_error" style="display:none"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="media_source_name" id="media_source_name">
                                                        <option value="">Media Source</option>
                                                        <?php foreach($media_source as $media_source_info){ ?> 
                                                            <option value="<?php echo $media_source_info['id'];?>"><?php echo $media_source_info['media_source_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="media_source_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="niceSelect" name="department_id" id="department_id">
                                                        <option value="">Select Region</option>
                                                        <?php foreach($department_data as $department){ ?> 
                                                            <option value="<?php echo $department['id'];?>"><?php echo $department['department'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="department_id_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <select class="" name="agent_id" id="agent_id">
                                                        <option value="">Select Yout Nearest Booking Centre</option>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="agent_id_error" style="display:none"></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <textarea type="text" name="message" class="form-control form_css" id="message" placeholder="Message"></textarea>
                                                    <span class="text-danger float-left" id="msg_error" style="display:none"></span>
                                                </div> 
                                            </div>  
                                        </div>  
                                    </div>
                                
                           
                                    <div class="booking-terms border-t pt-1 mt-1">
                                    <!-- <form class="d-lg-flex align-items-center"> -->
                                        <div class="form-group mb-2 w-75">
                                            <!--<input type="checkbox"> By continuing, you agree to the <a href="#">Terms and Conditions.</a>-->
                                        </div>
                                        <!-- <a href="#" class="nir-btn float-lg-end w-25" name="submit">CONFIRM BOOKING</a> -->
                                        <input type="submit" class="nir-btn float-lg-end w-25" id="submit" value="submit" name="submit">
                                    </div>
                                </form>
                                        <!-- <form method="post" action="<?php //echo base_url();?>contact_us/index" onsubmit="return validatecontactForms()" data-aos="fade-up" data-duration="500">
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
                                        </form> -->
                                        
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
