    
    <style>
        .label_color{
            color: black;
        }
        .mealplan_css{
            border: 1px solid red !important;
        }
        .star_color{
            color: red;
        }
        /* .ui-datepicker-calendar{
            display:none !important;
        }
        .ui-datepicker-header{
            display:none !important;
        }
        #ui-datepicker-div{
            display:none !important;
        } */
        </style>
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Booking.png);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Customized International</h1><h1 class="mt-5">Booking Enquiry</h1>
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
                                <form class="mb-2" method="post" onsubmit="return custom_enquiry_form()">
                                    <h5>Fill your information</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="label_color">Full Name<span class="star_color"> *</span></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Email<span class="star_color"> *</span></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Mobile No.<span class="star_color"> *</span></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="label_color">Mobile No.(optional)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="full_name" id="full_name" placeholder="Enter full name">
                                                <span class="text-danger float-left" id="full_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="email" id="email" placeholder="Enter Email">
                                                <span class="text-danger float-left" id="email_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="mobile_number1" id="mobile_number1" placeholder="Enter mobile number">
                                                <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <input type="text" name="mobile_number2" id="mobile_number2" placeholder="Enter mobile number">
                                                <span class="text-danger float-left" id="mobile_number2_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="label_color">Checkin Date<span class="star_color"> *</span></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label_color">Checkout Date<span class="star_color"> *</span></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label_color">No Of Nights<span class="star_color"> *</span></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="text" placeholder="" autocomplete="off" class="checkin_date" name="checkin_date" id="checkin_date">
                                                <span class="text-danger float-left" id="chechin_date_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="text" placeholder="" autocomplete="off" class="checkout_date" name="checkout_date" id="checkout_date">
                                                <span class="text-danger float-left" id="checkout_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <!-- <div id="result"></div> -->
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <input type="text" class="no_of_nights" name="no_of_nights" id="no_of_nights" readonly>
                                                <span class="text-danger float-left" id="no_of_nights_error" style="display:none"></span>
                                            </div>
                                        </div>
                                    

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="label_color">Hotel Type<span class="star_color"> *</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="selectall" name="hotel_type[]" id="hotel_type" value="All Hotels">&nbsp;&nbsp;All Hotels
                                                    <!-- <span class="text-danger float-left" id="email_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="2 STAR">&nbsp;&nbsp; 2 STAR
                                                    <!-- <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="3 STAR">&nbsp;&nbsp; 3 STAR
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="4 STAR">&nbsp;&nbsp; 4 STAR
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="5 STAR">&nbsp;&nbsp; 5 STAR
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="HOMESTAYS WITHOUT POOL">&nbsp;&nbsp; HOMESTAYS WITHOUT POOL
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="BEACH PROPERTIES">&nbsp;&nbsp; BEACH PROPERTIES
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-2">
                                                    <input type="checkbox" class="xyz" name="hotel_type[]" id="hotel_type" value="DELUXE COTTAGES">&nbsp;&nbsp; DELUXE COTTAGES
                                                    <!-- <span class="text-danger float-left" id="wp_mobile_number_error" style="display:none"></span> -->
                                                </div>
                                            </div><br>
                                            <span class="text-danger float-left" id="hotel_type_error" style="display:none"></span>
                                        </div>
                                    </div>

                                        

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <label class="label_color">No Of Couple<span class="star_color"> *</span></label>
                                                <input type="text" name="no_of_couple" id="no_of_couple">
                                                <span class="text-danger float-left" id="no_of_couple_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <label class="label_color">Meal Plan<span class="star_color"> *</span></label>
                                                    <select class="niceSelect" name="meal_plan" id="meal_plan" onchange='Mealplan(this.value); 
                                                            this.blur();'>
                                                        <option value="">Select Meal Plan</option>
                                                        <option value="Other">Other</option>
                                                        <?php foreach($meal_plan as $meal_plan_info){ ?> 
                                                            <option value="<?php echo $meal_plan_info['id'];?>"><?php echo $meal_plan_info['meal_plan_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="meal_plan_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3" id="other_meal_plan_div" style='display:none;'>
                                            <div class="form-group">
                                                <label>Other Meal Plan Name<span class="star_color"> *</span></label>
                                                <input type="text" class="form-control mealplan_css" name="meal_plan_name" id="meal_plan_name" placeholder="Enter meal plan name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            <span class="text-danger float-left" id="meal_plan_name_error" style="display:none"></span>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                            <label class="label_color">Total Adult<span class="star_color"> *</span></label>
                                                <input type="text" name="total_adult" id="total_adult" placeholder="">
                                                <span class="text-danger float-left" id="total_adult_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                            <label class="label_color">Total Child With Bed<span class="star_color"> *</span></label>
                                                <input type="text" name="total_child_with_bed" id="total_child_with_bed" placeholder="">
                                                <span class="text-danger float-left" id="total_child_with_bed_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                            <label class="label_color">Total Child Without Bed<span class="star_color"> *</span></label>
                                                <input type="text" name="total_child_without_bed" id="total_child_without_bed" placeholder="">
                                                <span class="text-danger float-left" id="total_child_without_bed_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <label class="label_color">Select Vehicle Type<span class="star_color"> *</span></label>
                                                    <select class="niceSelect" name="vehicle_type" id="vehicle_type" onchange='Vehicle(this.value); 
                                                            this.blur();'>
                                                        <option value="">Select vehicle type</option>
                                                        <option value="Other">Other</option>
                                                        <?php foreach($vehicle_type as $vehicle_type_info){ ?> 
                                                            <option value="<?php echo $vehicle_type_info['id'];?>"><?php echo $vehicle_type_info['vehicle_type_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="vehicle_type_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3" id="other_vehicle_type_div" style='display:none;'>
                                            <div class="form-group">
                                                <label>Other Vehicle Name<span class="star_color"> *</span></label>
                                                <input type="text" class="form-control mealplan_css" name="other_vehicle_name" id="other_vehicle_name" placeholder="Enter vehicle name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            <span class="text-danger float-left" id="other_vehicle_name_error" style="display:none"></span>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <label class="label_color">Pick Up From<span class="star_color"> *</span></label>
                                                    <select class="niceSelect" name="pick_up_from" id="pick_up_from" onchange='Pickupfrom(this.value); 
                                                            this.blur();'>
                                                        <option value="">Select Pick Up From</option>
                                                        <option value="Other">Other</option>
                                                        <?php foreach($pick_up_from as $pick_up_from_info){ ?> 
                                                            <option value="<?php echo $pick_up_from_info['id'];?>"><?php echo $pick_up_from_info['pick_up_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="pick_up_from_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="other_pickup_from_div" style='display:none;'>
                                            <div class="form-group">
                                                <label>Other Pick Up From Name<span class="star_color"> *</span></label>
                                                <input type="text" class="form-control mealplan_css" name="other_pickup_from_name" id="other_pickup_from_name" placeholder="Enter Pick Up name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            <span class="text-danger float-left" id="other_pickup_from_name_error" style="display:none"></span>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <label class="label_color">Pickup Allo. Date<span class="star_color"> *</span></label>
                                                <input type="date" name="pickup_date" id="pickup_date" min="<?php echo date("Y-m-d"); ?>">
                                                <span class="text-danger float-left" id="pickup_date_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <label class="label_color">Pick Up Time<span class="star_color"> *</span></label>
                                                <input type="time" name="pickup_time" id="pickup_time">
                                                <span class="text-danger float-left" id="pickup_time_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                <label class="label_color">Drop to<span class="star_color"> *</span></label>
                                                    <select class="niceSelect" name="drop_to" id="drop_to" onchange='dropto(this.value); 
                                                            this.blur();'>
                                                        <option value="">Select Drop To</option>
                                                        <option value="Other">Other</option>
                                                        <?php foreach($drop_to as $drop_to_info){ ?> 
                                                            <option value="<?php echo $drop_to_info['id'];?>"><?php echo $drop_to_info['drop_to_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span class="text-danger float-left" id="drop_to_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="other_dropto_div" style='display:none;'>
                                            <div class="form-group">
                                                <label>Other Drop To Name<span class="star_color"> *</span></label>
                                                <input type="text" class="form-control mealplan_css" name="other_drop_to_name" id="other_drop_to_name" placeholder="Enter Drop To Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            <span class="text-danger float-left" id="other_drop_to_name_error" style="display:none"></span>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                            <label class="label_color">Drop Allocation Date<span class="star_color"> *</span></label>
                                                <input type="date" name="drop_date" id="drop_date" min="<?php echo date("Y-m-d"); ?>">
                                                <span class="text-danger float-left" id="drop_date_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-2">
                                            <label class="label_color">Drop Time<span class="star_color"> *</span></label>
                                                <input type="time"  name="drop_time" id="drop_time">
                                                <span class="text-danger float-left" id="drop_time_error" style="display:none"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="label_color">Describe Your Visit Places & Special Notes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <textarea type="text" name="special_note" id="special_note" placeholder="Enter Special Note"></textarea>
                                                        <span class="text-danger float-left" id="special_note_error" style="display:none"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                           
                                <div class="booking-terms border-t pt-3 mt-3">
                                    <!-- <form class="d-lg-flex align-items-center"> -->
                                        <div class="form-group mb-2 w-75">
                                            <!--<input type="checkbox"> By continuing, you agree to the <a href="#">Terms and Conditions.</a>-->
                                        </div>
                                        <!-- <a href="#" class="nir-btn float-lg-end w-25" name="submit">CONFIRM BOOKING</a> -->
                                        <input type="submit" class="nir-btn float-lg-end w-25" id="submit" value="submit" name="submit">

                                    </form>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- top Destination ends -->
