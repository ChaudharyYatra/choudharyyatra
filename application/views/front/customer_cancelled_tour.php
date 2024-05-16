
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
                        <li class="breadcrumb-item active" aria-current="page">Cancelled Tour</li>
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
                                <h4>Tour</h4>

                                <?php  if(count($arr_data) > 0 ) 
                                { ?>

                                <table class="table table-bordered author_bg table_css">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Tour Name</th>
                                            <th>Tour Date</th>
                                            <th>Boarding Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php  
                                            $i=1; 
                                            foreach($arr_data as $info) 
                                            { 
                                            // print_r($info); die;
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $info['tour_title'] ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($info['journey_date'])) ?></td>
                                            <td><?php echo $info['booking_center'] ?></td>
                                            <td><a href="<?php echo base_url(); ?>tour_cancel/index/<?php echo $info['package_id']; 
                                                 ?>/<?php echo $info['package_date_id'];
                                                 ?>/<?php echo $info['enquiry_id']; 
                                                 ?>" class="nir-btn view_btn"><b>Cancel tour</b></a></td>
                                        </tr>

                                        <?php $i++; } ?>
                  
                                    </tbody>
                                    
                                </table>
                                
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
                                        <img src="../uploads/do_not_delete/profile.jpg" alt="author">
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
                                    <li class="active"><a href="<?php echo base_url(); ?>customer_cancelled_tour/index">Cancelled Tour</a></li>
                                    <li><a href="<?php echo base_url(); ?>feedback/index">Feedback</a></li>
                                    <li><a href="<?php echo base_url(); ?>customer_change_password/change_password">Change Password</a></li>
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