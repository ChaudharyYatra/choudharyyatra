    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/About_Us.png);">
        
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

    <!-- login section starts -->
    <section class="login-register pt-6 pb-6">
        <div class="container">
            <div class="log-main blog-full log-reg w-75 mx-auto">
                <div class="row">
                    <div class="col-lg-6 pe-4">
                        <h3 class="text-center border-b pb-2">Login</h3>
                        <form method="post" action="<?php echo base_url(); ?>user_login_reg/index" onsubmit="return validateloginForms()">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="email_login" id="email_login" placeholder="Email Address" value="">
                                <span class="text-danger float-left" id="emaillogin_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" class="form-control" name="pass_login" id="pass_login" placeholder="Password" value="">
                                <span class="text-danger float-left" id="passlogin_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2">
                                <!--<input type="checkbox" class="custom-control-input" id="exampleCheck3">-->
                                <!--<label class="custom-control-label mb-0" for="exampleCheck3">Remember me</label>-->
                                <a class="float-end" href="#">Lost your password?</a>
                            </div>
                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                <input type="submit" class="nir-btn w-100" id="submit_l" value="Login" name="login">
                            </div>
                            
                        </form>
                        
                    </div>
                    <div class="col-lg-6 ps-4">
                        <h3 class="text-center border-b pb-2">Register</h3>
                    
                        <form method="post" action="<?php echo base_url(); ?>user_login_reg/add" onsubmit="return validateregForms()">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="">
                                <span class="text-danger float-left" id="firstname_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="" >
                                <span class="text-danger float-left" id="lastname_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="emailid" id="emailid" placeholder="Email Address" value="">
                                <span class="text-danger float-left" id="emailid_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Mobile Number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="">
                                <span class="text-danger float-left" id="phoneno_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" type="text" class="form-control" name="password" id="password" placeholder="Password" value="">
                                <span class="text-danger float-left" id="password_error" style="display:none"></span>
                            </div>
                            <div class="form-group mb-2 d-flex">
                                <input type="checkbox" id="conditions" name="conditions" >&#160; I agree to Terms and Conditions <br>
                                <span class="text-danger" id="conditions_error" style="display:none"></span>
                            </div>
                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                <input type="submit" class="nir-btn" name="submit" value="Register">
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section Ends -->
