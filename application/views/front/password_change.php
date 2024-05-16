<!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>assets/front/images/bg/bg1.jpg);">
        <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(<?php echo base_url(); ?>assets/front/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Password Change</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <!-- BreadCrumb Ends --> 

    <!-- contact starts -->
    <section class="contact-main pt-6 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white border rounded">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <h3 class="mb-1">User Password Change</h3>
                                <!-- <p class="mb-0">Sagittis posuere id nam quis vestibulum vestibulum a facilisi at elit hendrerit scelerisque sodales nam dis orci.</p> -->
                            </div>
                            <div class="contact-info-content row mb-1">
                                
                            </div>
                            <div id="contact-form1" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-2">
                        
                                    </div>
                                    <div class="col-lg-8" class="border-all">

                                        <form method="post" action="#" name="contactform2" id="contactform2">
                                            <div class="form-group mb-2">
                                                <input type="text" name="old_pass" class="form-control" id="old_pass" placeholder="Enter Old Password">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="new_password" id="pass" class="form-control" placeholder="Enter New Password">
                                            </div>
                                            <span id="wrong_pass_alert"></span>
                                            <div class="form-group mb-2">
                                                <input type="password" name="confirm_pass" id="confirm_pass"  class="form-control" placeholder="Enter Confirm Password" onkeyup="validate_password()">
                                            </div>
                                            <span id="wrong_pass_alert"></span>
                                            
                                            <div class="comment-btn text-center">
                                                <input type="submit" id="create" class="nir-btn" name="submit" id="submit2" value="Send Message" onclick="wrong_pass_alert()">
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-lg-2">
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->

    <script>

        function validate() {
        var password1 = $("#old_pass").val();
        var password2 = $("#pass").val();
        if (password1 != password2) {
            $(".error-msg").html("Old Password and New Password Are Same .").show();
        } else {
            $(".error-msg").html("").hide();
            // ValidatePassword();
        }
        }


        function validate_password() {
 
            var pass = document.getElementById('pass').value;
            var confirm_pass = document.getElementById('confirm_pass').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                  = 'Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    'Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
 
        function wrong_pass_alert() {
            if (document.getElementById('pass').value != "" &&
                document.getElementById('confirm_pass').value != "") {
                alert("Your Password Change successfully");
            } 
        }
    </script>
