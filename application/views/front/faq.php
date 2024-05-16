

    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/faq.png);">
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

    <!-- About detail Start -->
    <section class="faq-main pb-6 pt-6">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto">
                <h2 class="mb-1">Frequently Asked <span class="theme">Questions</span></h2>
                <p>Below you'll find answers to the questions we get asked the most about tours.</p>
            </div>
            <div class="faq-accordian">
                <div class="row">
                    <?php foreach($faq_details_data as $faq_details){ ?>
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion1">
                            <div class="accrodion accrodion_down_border">
                                <div class="accrodion-title">
                                    <h5><?php echo $faq_details['question'];?></h5>
                                </div>
                                <div class="accrodion-content" style="display: block;">
                                    <div class="inner">
                                        <p><?php echo $faq_details['answer'];?></p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
                
                </div>
                 
            </div>
                <div class="section-title mb-6 text-center w-75 mx-auto booking-border">
                    <h3 class="border-b mb-1">Still have a question? <span class="theme">Go on, contact us!</span></h3>
                    <p class="mb-0">Got a question? We're here to answer! If you don't see your question here, drop us a line on our Contact Page.</p>
                    <div class="booking-border text-center mt-2">
                        <a href="<?php echo base_url(); ?>contact_us" class="nir-btn me-2"><i class="fa fa-edit"></i> Contact Us</a>    
                    </div>
                </div>
                            
        </div>
    </section>
    <!-- About detail Ends -->   

    <!-- Call To Action Starts -->
    <!-- <section class="call-to-action pb-0 bg-lgrey border-t">
        <div class="container">
            <div class="section-title text-center w-75 mx-auto mb-5 px-5">
                <h2 class="mb-2">Do You Have Any <span class="theme">Questions?</span></h2>
                <p class="mb-0">As opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum</p>
            </div>  
            <div class="reservation-main">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <img src="images/trending/trending4.jpg" alt="" class="rounded">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <form method="post" action="#" class="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                   <div class="form-group mb-2">
                                        <label>Full Name</label>
                                            <input type="text" id="full-name">
                                    </div> 
                                </div>
                                <div class="col-lg-6 col-md-6">
                                   <div class="form-group mb-2">
                                        <label>Phone No.</label>
                                        <input type="text" id="phone-no">
                                    </div> 
                                </div>
                                <div class="col-lg-6 col-md-6">
                                   <div class="form-group mb-2">
                                        <label>Email Address</label>
                                            <input type="email" id="email-name">
                                    </div> 
                                </div>
                                <div class="col-lg-6 col-md-6">
                                   <div class="form-group mb-2">
                                        <label>Destionation</label>
                                        <div class="input-box">
                                            <select class="niceSelect">
                                                <option value="1">Albania</option>
                                                <option value="2">Belgium</option>
                                                <option value="3">Canada</option>
                                            </select>
                                        </div>                             
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group mb-2">
                                    <label>Message</label>
                                    <textarea name="message" placeholder="Type your message here..."></textarea>
                                   </div>
                               </div>
                            </div>
                            
                            <div class="comment-btn text-center">
                                <input type="submit" class="nir-btn" id="submit2" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Call To Action Ends -->

