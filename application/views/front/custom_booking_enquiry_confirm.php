
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/About_Us.png);">
        <!--<div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>-->
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Thank You</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thank You</li>
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
                <div class="col-lg-8 col-xs-12 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="booking-box-title d-md-flex align-items-center bg-title p-4 mb-4 rounded text-md-start text-center">
                                <i class="fa fa-check px-4 py-3 bg-white rounded title fs-5"></i>
                                <div class="title-content ms-md-3">
                                    <h3 class="mb-1 white">Thank You....! For your enquiry.</h3>
                                    <p class="mb-0 white">Our Agent Will Contact You Soon.</p>
                                </div>
                            </div>
                            
                            
                             <!-- <div class="booking-border mb-4">
                                <h4 class="border-b pb-2 mb-2"><?php //echo 'Agents List'; ?></h4>
                                <table>
                                    <tr>
                                        <td>Department</td>
                                        <td>Booking Center</td>
                                        <td>Agent Name</td>
                                        <td>Contact Number</td>
                                    </tr>
                                    <?php //foreach($agents_list as $key => $agents_list_value) { ?>
                                    <tr>
                                        <td><?php //echo $agents_list_value['department']; ?></td>
                                        <td><?php //echo $agents_list_value['booking_center']; ?></td>
                                        <td><?php //echo $agents_list_value['agent_name']; ?></td>
                                        <td><?php //echo $agents_list_value['mobile_number1']; ?>,<?php //echo $agents_list_value['mobile_number2']; ?></td>
                                    </tr>
                                    <?php //} ?>
                                </table>
                            </div> -->
                            
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 mb-4 ps-4">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <div class="sidebar-item bordernone bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                                <h4>Need Booking Help?</h4>
                                <div class="sidebar-module-inner">
                                    <?php foreach($website_basic_structure as $key => $website_basic_structure_value) { ?>
                                    <ul class="help-list">
                                        <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Contact Number</span>: <?php echo $website_basic_structure_value['contact_number']; ?></li>
                                        <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Email</span>: <?php echo $website_basic_structure_value['email']; ?></li>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top Destination ends -->


   
