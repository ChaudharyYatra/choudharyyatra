    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Booking.png);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
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

    <!-- top Destination starts -->
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-6">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <!-- <h3 class="border-b pb-2 mb-2">Your Information</h3> -->
                                <form class="mb-2" method="post" onsubmit="return validateEnquiryForms()">
                                    <h5>Fill your information</h5>
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
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                
                                                <div class="input-box">
                                                    <select class="niceSelect" name="gender" id="gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
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

                                        <!-- <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                
                                                <div class="input-box">
                                                    <select class="" name="department_id" id="department_id">
                                                        <option value="">Select Department</option>
                                                        <?php //foreach($department_data as $department){ ?> 
                                                            <option value="<?php //echo $department['id'];?>"><?php //echo $department['department'];?></option>
                                                        <?php //} ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="department_id_error" style="display:none"></span>

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group mb-2">
                                                
                                                <div class="input-box">
                                                    <select class="" name="agent_id" id="agent_id">
                                                        <option value="">Select Booking Centre</option>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="agent_id_error" style="display:none"></span>

                                            </div>
                                        </div>    -->

                                    </div>
                                
                            </div>
                           
                                <div class="booking-terms border-t pt-3 mt-3">
                                        <div class="form-group mb-2 w-75">
                                        </div>
                                        <input type="submit" class="nir-btn float-lg-end w-25" id="submit" value="submit" name="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- top Destination ends -->
