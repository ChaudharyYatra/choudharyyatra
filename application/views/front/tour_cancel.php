
<style>
    .view_btn{
        padding-left:10px;
        padding-right:10px;
        padding-top:10px;
        padding-bottom:10px;
        margin-bottom:-7px;
    }

    .table_css{
        border-radius: 10px;
    }
</style>
<!-- BreadCrumb Starts -->  
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/Packages.png);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3"><?php echo $page_title;?></h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upcoming Tour</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends --> 

    <!-- blog starts -->
    <section class="blog package_list">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-8 ps-lg-4">
                    <div class="listing-inner">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="list-results d-flex align-items-center justify-content-between">
                                    <div class="list-results-sort">
                                        <p class="m-0">Showing 1-5 of 80 results</p>
                                    </div>
                                    <div class="click-menu d-flex align-items-center justify-content-between">
                                        <div class="change-list me-2 rounded overflow-hidden"><a href="post-list-1.html"><i class="fa fa-bars bg-grey"></i></a></div>
                                        <div class="change-grid f-active me-2 rounded overflow-hidden"><a href="post-grid-1.html"><i class="fa fa-th"></i></a></div>
                                        <div class="sortby d-flex align-items-center justify-content-between ml-2">
                                            <select class="niceSelect">
                                                <option value="1" >Sort By</option>
                                                <option value="2">Average rating</option>
                                                <option value="3">Price: low to high</option>
                                                <option value="4">Price: high to low</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            <!-- <div class="col-lg-6">
                                <div class="trend-item box-shadow bg-white mb-4 rounded overflow-hidden">
                                    <div class="trend-image">
                                        <img class="img_br_no" src="../uploads/packages/p1.jpg" alt="image">
                                    </div>
                                    <div class="trend-content-main p-4 pb-2">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">Technology</h5>
                                            <h4><a href="detail-1.html">How a developer duo at Deutsche Bank keep remote alive.</a></h4>
                                            <p class="mb-3">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            </p>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-author mb-2">
                                                    <img src="images/reviewer/2.jpg" alt="" class="rounded-circle me-1">
                                                    <span>Sollmond Nell</span>
                                                </div>
                                                <div class="entry-button d-flex align-items-center mb-2">
                                                    <a href="#" class="nir-btn">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-lg-12 col-md-12">
                                <h4>Cancel Tour</h4>

                                <div id="contact-form1" class="mt-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="contactform-error-msg"></div>
                                        
                                        <!-- onsubmit="return contactEnquiryForms()" -->
                                    <form class="mb-2" method="post">
                                    <h5>&nbsp; Tour information</h5>
                                    <div class="row">
                                        <?php foreach($tour_details as $key => $tour_details_value) { ?>
                                            <input type="hidden" placeholder="Tour no / name" name="traveller_id" id="traveller_id" readonly value="<?php echo $tour_details_value['traveler_id'];?>">
                                            <input type="hidden" placeholder="Tour no / name" name="agent_id" id="agent_id" readonly value="<?php echo $tour_details_value['take_enquiry_by_agent_id'];?>">

                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <input type="text" placeholder="Tour no / name" name="tour_name" id="tour_name" readonly value="<?php echo $tour_details_value['tour_title'];?>">
                                                <span class="text-danger float-left" id="first_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <input type="text" placeholder="Tour date" name="tour_date" id="tour_date" readonly value="<?php echo date("d-m-Y",strtotime($tour_details_value['journey_date']));?>">
                                                <span class="text-danger float-left" id="last_name_error" style="display:none"></span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group mb-2">
                                                <div class="input-box">
                                                    <textarea type="text" name="reason" class="form-control form_css" id="reason" placeholder="Write Reason"></textarea>
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

                            <?php  if(count($tour_details_view) > 0 ) 
                                { ?>

                            <div class="col-lg-12 col-md-12 mt-5">
                                <h4>Cancelled Tour View</h4>

                                
                                <table class="table table-bordered author_bg table_css">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Tour Name</th>
                                            <th>Tour Date</th>
                                            <th>Reason</th>
                                            <th>Cancel Tour Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            $i=1; 
                                            foreach($tour_details_view as $info) 
                                            { 
                                            // print_r($info); die;
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $info['tour_title'] ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($info['journey_date'])) ?></td>
                                            <td><?php echo $info['reason'] ?></td>
                                            <td><?php echo $info['tour_cancel_status'] ?></td>
                                        </tr>

                                        <?php $i++; } ?>
                  
                                    </tbody>
                                    
                                </table>
                            </div>

                            <?php } ?>
                                
                                        
                                        
                                        
                                    

                                
                            </div>
                            
                        </div>

                        <!-- <div class="pagination-main text-center">
                            <ul class="pagination">
                                <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>

                <!-- sidebar starts -->
                <div class="col-lg-4 pe-lg-4">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <!-- <div class="sidebar-item">
                                <h4 class="">Search Here</h4>
                                <div class="newsletter-form rounded overflow-hidden position-relative">
                                    <form>
                                        <input type="text" placeholder="Search your keyword here..">
                                        <input type="submit" class="nir-btn bordernone rounded-0 position-absolute end-0" value="Search">
                                    </form>
                                </div>
                            </div> -->

                            <div class="author-news mb-4 box-shadow p-5 text-center rounded overflow-hidden border-all author_bg">
                                <div class="author-news-content">
                                    <div class="author-thumb mb-1">
                                        <img src="<?php echo base_url(); ?>uploads/do_not_delete/profile.jpg" alt="author">
                                    </div>
                                    <div class="author-content">
                                        <h3 class="title mb-1"><a href="#"><?php echo $cust_sess_name ?> <?php echo $cust_sess_lname ?></a></h3>
                                        <!-- <p class="mb-2">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p> -->
                                        <!-- <div class="header-social">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f rounded"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus-g rounded"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter rounded"></i></a></li>
                                            </ul>
                                        </div> -->

                                        <a href=""><p>Profile</p></a>
                                        <!-- <a href=""><p>Tour Instruction</p></a> -->

                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-item mb-4">
                                <h4 class="">All Categories</h4>
                                <ul class="sidebar-category">
                                    <li><a href="<?php echo base_url(); ?>customer_dashboard/index">Dashboard</a></li>
                                    <li><a href="<?php echo base_url(); ?>tour_instruction/index">Tour Instruction</a></li>
                                    <li><a href="<?php echo base_url(); ?>previous_tour/index">Previous Tour</a></li>
                                    <li><a href="<?php echo base_url(); ?>upcoming_tour/index">Upcoming Tour</a></li>
                                    <li><a href="<?php echo base_url(); ?>customer_cancelled_tour/index">Cancelled Tour</a></li>
                                    <li><a href="<?php echo base_url(); ?>feedback/index">Feedback</a></li>
                                </ul>
                                
                            </div>

                            <!-- <div class="popular-post sidebar-item mb-4">
                                <div class="sidebar-tabs">
                                    <div class="post-tabs">
                                        
                                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab1" role="tablist">
                                            <li class="nav-item d-inline-block" role="presentation">
                                                <button aria-selected="false" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button>
                                            </li>
                                            <li class="nav-item d-inline-block" role="presentation">
                                                <button aria-selected="true" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="postsTabContent1">
                                            
                                            <div aria-labelledby="popular-tab" class="tab-pane fade active show" id="popular" role="tabpanel">
                                                <article class="post mb-2 border-b pb-2">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending1.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">An Incredibly Easy Method That Works For All</a></h5>
                                                            <div class="date">10 Apr 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>

                                                <article class="post border-b pb-2 mb-2">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending2.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">15 Unheard Ways To Achieve Greater Walker</a></h5>
                                                            <div class="date">29 Mar 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>

                                                <article class="post mb-2 border-b pb-2">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending1.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">An Incredibly Easy Method That Works For All</a></h5>
                                                            <div class="date">10 Apr 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>

                                                <article class="post">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending4.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">15 Unheard Ways To Achieve Greater Walker</a></h5>
                                                            <div class="date">21 Feb 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>
                                        </div>
                                            
                                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                                <article class="post mb-2 border-b pb-2">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending5.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">10 Ways To Immediately Start Selling Furniture</a></h5>
                                                            <div class="date">08 Mar 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>

                                                <article class="post border-b pb-2 mb-2">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending6.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">Photography Photo modify and Beautiful Walker</a></h5>
                                                            <div class="date">18 Jan 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>

                                                <article class="post mb-2 border-b pb-2">
                                                        <div class="s-content d-flex align-items-center justify-space-between">
                                                            <div class="sidebar-image w-25 me-3 rounded">
                                                                <a href="detail-1.html"><img src="images/trending/trending1.jpg" alt=""></a>
                                                            </div>
                                                            <div class="content-list w-75">
                                                                <h5 class="mb-1"><a href="detail-1.html">An Incredibly Easy Method That Works For All</a></h5>
                                                                <div class="date">10 Apr 2021</div>
                                                            </div>    
                                                        </div> 
                                                    </article>

                                                <article class="post">
                                                    <div class="s-content d-flex align-items-center justify-space-between">
                                                        <div class="sidebar-image w-25 me-3 rounded">
                                                            <a href="detail-1.html"><img src="images/trending/trending3.jpg" alt=""></a>
                                                        </div>
                                                        <div class="content-list w-75">
                                                            <h5 class="mb-1"><a href="detail-1.html">1Certified Graphic Design with Free Project Course</a></h5>
                                                            <div class="date">12 Feb 2021</div>
                                                        </div>    
                                                    </div> 
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="sidebar-item mb-4">
                                <h4 class="">Tags</h4>
                                <ul class="sidebar-tags">
                                    <li><a href="#">Tour</a></li>
                                    <li><a href="#">Rental</a></li>
                                    <li><a href="#">City</a></li>
                                    <li><a href="#">Yatch</a></li>
                                    <li><a href="#">Activity</a></li>
                                    <li><a href="#">Museum</a></li>
                                    <li><a href="#">Beauty</a></li>
                                    <li><a href="#">Classic</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Designs</a></li>
                                    <li><a href="#">Featured</a></li>
                                    <li><a href="#">Free Style</a></li>
                                    <li><a href="#">Programs</a></li>
                                    <li><a href="#">Travel</a></li>
                                </ul>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog Ends -->  



</body>
</html>