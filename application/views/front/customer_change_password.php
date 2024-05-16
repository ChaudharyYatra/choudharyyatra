
<style>
    .view_btn{
        padding-left:10px;
        padding-right:10px;
        padding-top:10px;
        padding-bottom:10px;
        margin-bottom:-7px;
    }
    .table_css_img{
        padding:15px !important;
    }

    .td_css_img{
        text-align:center;
    }
    .header_css{
        background-color: bisque;
    }

    .input-group-text {
    padding: 1rem 0.75rem !important;
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
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                            
                            <div class="col-md-12">
            <!-- jquery validation -->
            <!-- <?php //$this->load->view('admin/layout/admin_alert'); ?> -->
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="card-title"><?php echo $page_title; ?></h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="add_changepassword">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                            <h6>Old Password</h6>
                              <div class="input-group">
                                <input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Old Password" required/>
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password1"></span>
                                  </div>
                                </div>
                              </div>
                      </div>

                      <div class="col-md-6">
                            <h6>New Password</h6>
                              <div class="input-group">
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password2"></span>
                                  </div>
                                </div>
                              </div> 
                      </div>

                      <div class="col-md-6 mt-3">
                            <h6>Confirm Password</h6>
                              <div class="input-group">
                                <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="Confirm Password" onChange="checkPasswordMatch();" required>
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password"></span>
                                  </div>
                                </div> 
                              </div>
                      </div>
                      
                </div>
                <!-- <div class="registrationFormAlert" id="divCheckPasswordMatch"> -->
                <!-- /.card-body -->
                <div class="card-footer mt-5">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					          <a href="<?php echo base_url(); ?>customer_dashboard/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
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
                                    <li class="active"><a href="<?php echo base_url(); ?>customer_change_password/change_password">Change Password</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog Ends -->  


    <script>
  
  var password = document.getElementById("new_password"), 
      confirm_password = document.getElementById("confirm_pass");

  function validatePassword(){
    if(new_password.value != confirm_pass.value) {
      confirm_pass.setCustomValidity("New password & confirm pasword Don't Match");
    } else {
      confirm_pass.setCustomValidity('');
    }
  }

  new_password.onchange = validatePassword;
  confirm_pass.onkeyup = validatePassword;

</script>

<!-- Eye Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#confirm_pass");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

<script>
$("body").on('click', '.toggle-password2', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#new_password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

<script>
$("body").on('click', '.toggle-password1', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#old_pass");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        <?php if ($this->session->flashdata('success_message')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $this->session->flashdata('success_message') ?>',
            });
        <?php elseif ($this->session->flashdata('error_message')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= $this->session->flashdata('error_message') ?>',
            });
        <?php endif; ?>
    </script>
</body>
</html>