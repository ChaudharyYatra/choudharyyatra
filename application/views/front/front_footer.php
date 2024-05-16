<style>
  .img_bot{
    margin-bottom: 1px;
  }
</style>
<!-- footer starts -->
<img class="img_bot" src="<?php echo base_url(); ?>assets/front/shape8_final.png" alt="image" width="100%"></img>
<footer class="pt-4 pb-2">
  
        <!-- <div class="section-shape top-0"></div> -->
        <!-- Instagram starts -->
        <!-- <div class="insta-main pb-10">
            <div class="container">
                <div class="insta-inner"> -->
                <!--<div class="follow-button">-->
                <!--    <h5 class="m-0 rounded"><i class="fab fa-instagram"></i> Follow on Instagrams</h5>-->
                <!--</div>-->
                <!-- <div class="row attract-slider">
                    <?php //if(count($social_media_link)>0) { foreach($social_media_link as $key => $social_media_link_value) { ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="insta-image rounded">
                            <a href="<?php //echo $social_media_link_value['social_media_link']; ?>" onclick="window.open(this.href,'_blank');return false;"><img src="<?php //echo base_url(); ?>uploads/social_media_link/<?php// echo $social_media_link_value['image_name']; ?>" alt="<?php //echo $social_media_link_value['social_media_link']; ?>"></a>
                        </div>
                    </div>
                    <?php //} } ?>
                </div>
                </div>    
            </div>
        </div> -->
        <!-- Instagram ends -->
        <?php if(count($website_basic_structure)>0) { foreach($website_basic_structure as $key => $website_basic_structure_value) { ?>
        <div class="footer-upper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 pe-4">
                        <div class="footer-about">
                            <?php if(!empty($website_basic_structure_value['location'])) { ?>
                            <img src="<?php echo base_url(); ?>uploads/website_logo/<?php echo $website_basic_structure_value['image_name']; ?>" alt="logo" class="logo_img" width="70%;">
                            
                            <?php } else { ?>
                            <!-- <img src="<?php //echo base_url(); ?>uploads/do_not_delete/logo.png" alt="logo"> -->
                            <?php } ?>
                            <p class="mt-3 short_des white">
                                <?php echo $website_basic_structure_value['short_description']; ?>
                            </p>

                            <!-- <h5 class="white">Location : </h5> -->
                            <li class="icon_set">
                                    <div class="icon-part white icon_size_w_add">
                                      <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="content-part">
                                      <b><p class="text_justify white"><span><a href="https://goo.gl/maps/mU5YbJmuEXqDoYpr7" target="_blank"><?php echo $website_basic_structure_value['location']; ?></a> </span></p></b>
                                      
                                    </div>
                                  </li>

                                <!-- <h5 class="white">Mobile No. : </h5> -->
                                  <li class="icon_set">
                                    <div class="icon-part white icon_size_w">
                                      <i class="fas fa-phone-volume"></i>
                                    </div>
                                    <div class="content-part">
                                      <b><p class="text_justify"><span><a href="tel:<?php echo $website_basic_structure_value['contact_number']; ?>"><?php echo $website_basic_structure_value['contact_number']; ?></a> </span></p></b>
                                      
                                    </div>
                                  </li>

                                <!-- <h5 class="white">Email Id : </h5> -->
                                  <li class="icon_set">
                                    <div class="icon-part white icon_size_w">
                                      <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="content-part">
                                      <b><p class="text_justify"><span><a href="mailto:<?php echo $website_basic_structure_value['email']; ?>"><?php echo $website_basic_structure_value['email']; ?></a> </span></p></b>
                                      
                                    </div>
                                  </li>

                            <!-- <ul>
                                <li class="white"><strong>Location:</strong> <?php //echo $website_basic_structure_value['location']; ?></li>
                                <li class="white"><strong>Contact Number:</strong> <?php //echo $website_basic_structure_value['contact_number']; ?></li>
                                <li class="white"><strong>Email:</strong> <?php //echo $website_basic_structure_value['email']; ?></li>
                                <li class="white"><strong>Website:</strong> <?php //echo $website_basic_structure_value['website_link']; ?></li>
                            </ul> -->
                        </div>
                    </div>
                   <div class="col-lg-3 col-md-3 col-sm-12 mb-4 pe-4">
                        
                        <div class="footer-links">
                            <h3 class="white">Quick links</h3>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>privacy_policy">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url(); ?>terms_and_conditions">Terms &amp; Conditions</a></li>
                                <li><a href="<?php echo base_url(); ?>tour_cancel_rules">Tour Cancel Rules</a></li>
                                <li><a href="<?php echo base_url(); ?>seat_reservation_rules">Seat Reservation Rules</a></li>
                                <li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
								                <li><a href="<?php echo base_url(); ?>faq">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                   
                    <div class="col-lg-5 col-md-5 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Map</h3>
                            <iframe class="rounded overflow-hidden" height="240" src="<?php echo $website_basic_structure_value['map']; ?>"></iframe>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        


        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                    <div class="copyright-text">
                        <p class="m-0 white">Designed & Developed by <img src="<?php echo base_url(); ?>uploads/do_not_delete/sumago.jpg" width="25px" height="25px" style="border-radius:20px;"> <a href="https://www.sumagoinfotech.com/"><span style="color:#ff343b;"><b>Sumago Infotech Pvt. Ltd.</b></span></a> © <?php echo date("Y"); ?> All rights reserved.</p>
                    </div>
                    <div class="social-links">
                        <ul>  
                        <li><a href="<?php echo $website_basic_structure_value['facebook_link']; ?>" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $website_basic_structure_value['instagram_link']; ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $website_basic_structure_value['twitter_link']; ?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                            <!-- <li><a href="<?php //echo $website_basic_structure_value['linkedin_link']; ?>" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li> -->
                        </ul>
                    </div>
                </div>    
            </div>
        </div>
        <?php } } ?>
        <div id="particles-js"></div>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <div class="floating_btn">
            <a class="wp_target" target="_blank" href="https://api.whatsapp.com/send?phone=+917588484848 &text=Hello">
                <div class="contact_icon">
                    <i class="fa fa-whatsapp my-float"></i>
                </div>
            </a>
            
        </div>


    </footer>
    <!-- footer ends -->
    <div class="enquiry-btn">
      <a href="<?php echo base_url(); ?>contact_us" class="button button-wiggle">Enquiry</a>
    </div>
    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

        <!-- login registration modal -->
      <div class="modal fade  log-reg" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content login_modal_height">
                <div class="modal-body">
                    <div class="post-tabs">
                  
                        <div class="tab-content blog-full" id="postsTabContent">
                       
                            <div aria-labelledby="login-tab" class="tab-pane fade active show" id="login"
                                role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-image rounded">
                                            <a href="#"
                                                style="background-image: url(<?php echo base_url(); ?>uploads/log.jpg);">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="text-center border-b pb-2 " style="color:white;">Login</h4>
                                        
                                        
                                        <form method="post" action="<?php echo base_url(); ?>user_profile/index" onsubmit="return validateloginForms()">
                                            <div class="form-group mb-2">
                                                <input type="text" class="form-control" name="mobile" id="mobile_login" placeholder="Mobile Number">
                                                <span class="text-danger float-left" id="mobilelogin_error" style="display:none"></span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" class="form-control" name="password" id="pass_login" placeholder="Password">
                                                     <i id="toggler"class="far fa-eye" style="position: absolute;right: 50px;top: 48%;transform: translateY(-50%);cursor: pointer;"></i>
                                                <span class="text-danger float-left" id="passlogin_error" style="display:none"></span>
                                                  
                                            </div>
                                            <div class="form-group mb-2">
                                                
                                                <a class="float-end" href="#" style="color:rgb(246, 242, 242);">Lost your password?</a>
                                            </div>
                                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                              <input type="submit" class="nir-btn w-100" id="submit_l" value="Login" name="submit">
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>



    <!-- *Scripts* -->
    
    <script src="<?php echo base_url(); ?>assets/front/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/particles.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/particlerun.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/plugin.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/custom-navscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/custom-swiper.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/custom-nav.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/custom-accordian.js"></script>
    
    

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // City change
    $('#department_id').on('change', function () {
      var did = $("#department_id").val();
      // alert(did);
     
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>international_packages/getAgent',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#agent_id').find('option').not(':first').remove();
       
          $.each(response,function(index,data){             
             $('#agent_id').append('<option value="'+data['id']+'">'+data['booking_center']+'</option>');
          });
        }
     });
   });
 });
 </script>

    <script>
    $(document).ready(function(){
     $(document).on('change', '#filter_val', function(event){
        var base_url = "<?php echo base_url();?>";
        var fil_val = $('#filter_val').val();
       
        if(fil_val=='low_to_high'){
        var url =window.location.origin;
        var final_url = base_url+"packages/all_packages_asc";
	    window.location.href = final_url;
        }else if(fil_val=='high_to_low')
        {
        var url =window.location.origin;
        var final_url = base_url+"packages/all_packages_desc";
	    window.location.href = final_url;
        };
     });
    });  
</script>


<script>
    $(document).ready(function(){
     $(document).on('change', '#internationa_filter_val', function(event){
        var base_url = "<?php echo base_url();?>";
        var int_fil_val = $('#internationa_filter_val').val();
       
        if(int_fil_val=='low_to_high'){
        var url =window.location.origin;
        var final_url = base_url+"international_packages/all_packages_asc";
	    window.location.href = final_url;
        }else if(int_fil_val=='high_to_low')
        {
        var url =window.location.origin;
        var final_url = base_url+"international_packages/all_packages_desc";
	    window.location.href = final_url;
        };
     });
    });  
</script>

  <script>
function validateregForms() 
{
  $("#firstname_error").hide();
  $("#lastname_error").hide();
  $("#emailid_error").hide();
  $("#phoneno_error").hide();
  $("#password_error").hide();
  $("#message_error").hide();
  $("#conditions_error").hide();
  
  var submiform='';
  
  var firstname = $('#firstname').val();
  if (firstname == '' || firstname ==null) 
  {
    $('#firstname_error').text('Please enter first name.');
    $('#firstname_error').show();
    submiform=false;
  }
  
  
  var lastname = $('#lastname').val();
  if (lastname == '' || lastname ==null) 
  {
    $('#lastname_error').text('Please enter last name.');
    $('#lastname_error').show();
    submiform=false;
  }
  
  var emailid = $('#emailid').val();
  if (emailid == '' || emailid ==null) 
  {
    $('#emailid_error').text('Please enter email address.');
    $('#emailid_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(emailid)) 
        {
           $('#emailid_error').text('Please enter valid email address.');
            $('#emailid_error').show();
            submiform=false;
        }
        else if(emailid)
        {
          var email_split = emailid.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#emailid_error').text('Please enter valid email address.');
              $('#emailid_error').show();
              submiform=false;
          }
        }
        // else
        // {
        //     isEmailExist();
        // }
  }
  
  var password = $('#password').val();
  if(password == '' || password ==null) 
  {
    $('#password_error').text('Please enter password.');
    $('#password_error').show();
    submiform=false;
  }
  else if(password.length < 8){
              $('#password_error').text('Password should be minimum 8 characters long.');
              $('#password_error').show();
              submiform=false;
             } 
  
  var phoneno = $('#phoneno').val();
  if (phoneno == '' || phoneno ==null) 
  {
    $('#phoneno_error').text('Please enter mobile number.');
    $('#phoneno_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#phoneno').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#phoneno_error').text('Please enter 10 digits mobile number');
              $('#phoneno_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#phoneno_error').text('Please enter 10 digits mobile number');
              $('#phoneno_error').show();
              submiform=false;
             } 
            }
  }

  var message = $('#message').val();
  if (message == '' || message ==null) 
  {
    $('#message_error').text('Please enter message.');
    $('#message_error').show();
    submiform=false;
  }
  
  if(!(firstname == '' || firstname ==null || lastname == '' || lastname ==null || emailid == '' || emailid ==null || password == '' || password ==null ||  phoneno == '' || phoneno ==null ))
  {
    if($('input[type=checkbox][name=conditions]:checked').length == 0)
      {
          $('#conditions_error').text('Accept terms and condtions.');
          $('#conditions_error').show();
          submiform=false;
      }
  }
      
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>

<script>
    function validateloginForms() 
{
  $("#mobilelogin_error").hide();
  $("#passlogin_error").hide();
  
  
  var submiform='';
  
  var mobilelogin = $('#mobile_login').val();
  if (mobilelogin == '' || mobilelogin ==null) 
  {
    $('#mobilelogin_error').text('Please enter mobile number.');
    $('#mobilelogin_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#mobile_login').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#mobilelogin_error').text('Please enter 10 digits mobile number');
              $('#mobilelogin_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#mobilelogin_error').text('Please enter 10 digits mobile number');
              $('#mobilelogin_error').show();
              submiform=false;
             } 
            }
  }
  // else
  // {
  //     var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  //       if(!regex.test(emaillogin)) 
  //       {
  //          $('#emaillogin_error').text('Please enter valid email address.');
  //           $('#emaillogin_error').show();
  //           submiform=false;
  //       }
  //       else if(emaillogin)
  //       {
  //         var email_split = emaillogin.split('@');
  //         var count = (email_split[1].match(/\./g) || []).length;
  //         if(count > 2)
  //         {
  //             $('#emailid_error').text('Please enter valid email address.');
  //             $('#emailid_error').show();
  //             submiform=false;
  //         }
  //       }
       
  // }
  
  var password = $('#pass_login').val();
  if (password == '' || password ==null) 
  {
    $('#passlogin_error').text('Please enter password.');
    $('#passlogin_error').show();
    submiform=false;
  }
    
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
</script>



<script>
function validatecontactForms() 
{
  $("#fname_error").hide();
  $("#lname_error").hide();
  $("#email_error").hide();
  $("#mobile_error").hide();
  $("#message_error").hide();
  
  
  var submiform='';
  
  var firstname = $('#first_name').val();
  if (firstname == '' || firstname ==null) 
  {
    $('#fname_error').text('Please enter first name.');
    $('#fname_error').show();
    submiform=false;
  }
  
  
  var lastname = $('#last_name').val();
  if (lastname == '' || lastname ==null) 
  {
    $('#lname_error').text('Please enter last name.');
    $('#lname_error').show();
    submiform=false;
  }
  
  var emailid = $('#email').val();
  if (emailid == '' || emailid ==null) 
  {
    $('#email_error').text('Please enter email address.');
    $('#email_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(emailid)) 
        {
           $('#email_error').text('Please enter valid email address.');
            $('#email_error').show();
            submiform=false;
        }
        else if(emailid)
        {
          var email_split = emailid.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#email_error').text('Please enter valid email address.');
              $('#email_error').show();
              submiform=false;
          }
        }    
  }
  
  
  var phoneno = $('#mobile').val();
  if (phoneno == '' || phoneno ==null) 
  {
    $('#mobile_error').text('Please enter mobile number.');
    $('#mobile_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#mobile').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#mobile_error').text('Please enter 10 digits mobile number');
              $('#mobile_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#mobile_error').text('Please enter 10 digits mobile number');
              $('#mobile_error').show();
              submiform=false;
             } 
            }
  }

  
  var message = $('#message').val();
  if (message == '' || message ==null) 
  {
    $('#msg_error').text('Please enter message.');
    $('#msg_error').show();
    submiform=false;
  }
  
      
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>

<script>
function validateEnquiryForms() 
{
  $("#first_name_error").hide();
  $("#last_name_error").hide();
  $("#email_error").hide();
  $("#mobile_number_error").hide();
  $("#gender_error").hide();
  $("#media_source_name_error").hide();
  // $("#department_id_error").hide();
  // $("#agent_id_error").hide();
  $("#wp_mobile_number_error").hide();
  
  var submiform='';
  
  var first_name = $('#first_name').val();
  if (first_name == '' || first_name ==null) 
  {
    $('#first_name_error').text('Please enter first name.');
    $('#first_name_error').show();
    submiform=false;
  }
  
  
  var last_name = $('#last_name').val();
  if (last_name == '' || last_name ==null) 
  {
    $('#last_name_error').text('Please enter last name.');
    $('#last_name_error').show();
    submiform=false;
  }
  
  var email = $('#email').val();
  if (email == '' || email ==null) 
  {
    $('#email_error').text('Please enter email address.');
    $('#email_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) 
        {
           $('#email_error').text('Please enter valid email address.');
            $('#email_error').show();
            submiform=false;
        }
        else if(email)
        {
          var email_split = email.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#email_error').text('Please enter valid email address.');
              $('#email_error').show();
              submiform=false;
          }
        }
        // else
        // {
        //     isEmailExist();
        // }
  }
  
  
  var mobile_number = $('#mobile_number').val();
  if (mobile_number == '' || mobile_number ==null) 
  {
    $('#mobile_number_error').text('Please enter mobile number.');
    $('#mobile_number_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#mobile_number').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#mobile_number_error').text('Please enter 10 digits mobile number');
              $('#mobile_number_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#mobile_number_error').text('Please enter 10 digits mobile number');
              $('#mobile_number_error').show();
              submiform=false;
             } 
            }
  }
	
	var wp_mobile_number = $('#wp_mobile_number').val();
  if (wp_mobile_number == '' || wp_mobile_number ==null) 
  {
    $('#wp_mobile_number_error').text('Please enter whatsapp mobile number.');
    $('#wp_mobile_number_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#wp_mobile_number').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#wp_mobile_number_error').text('Please enter 10 digits whatsapp mobile number');
              $('#wp_mobile_number_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#wp_mobile_number_error').text('Please enter 10 digits whatsapp mobile number');
              $('#wp_mobile_number_error').show();
              submiform=false;
             } 
            }
  }

  var gender = $('#gender').val();
  if (gender == '' || gender ==null) 
  {
    $('#gender_error').text('Please select gender.');
    $('#gender_error').show();
    submiform=false;
  }

  var media_source_name = $('#media_source_name').val();
  if (media_source_name == '' || media_source_name ==null) 
  {
    $('#media_source_name_error').text('Please select media source.');
    $('#media_source_name_error').show();
    submiform=false;
  }

	// var department_id = $('#department_id').val();
  // if (department_id == '' || department_id ==null) 
  // {
  //   $('#department_id_error').text('Please select department.');
  //   $('#department_id_error').show();
  //   submiform=false;
  // }
	
  // var agent_id = $('#agent_id').val();
  // if (agent_id == '' || agent_id ==null) 
  // {
  //   $('#agent_id_error').text('Please select Booking Centre.');
  //   $('#agent_id_error').show();
  //   submiform=false;
  // }

  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>

<script>
function contactEnquiryForms() 
{
  $("#first_name_error").hide();
  $("#last_name_error").hide();
  $("#email_error").hide();
  $("#mobile_number_error").hide();
  $("#gender_error").hide();
  $("#media_source_name_error").hide();
  $("#department_id_error").hide();
  $("#agent_id_error").hide();
  $("#wp_mobile_number_error").hide();
  $("#tour_number").hide();
  $("#other_tour_name_div").hide();
  
  var submiform='';
  
  var first_name = $('#first_name').val();
  if (first_name == '' || first_name ==null) 
  {
    $('#first_name_error').text('Please enter first name.');
    $('#first_name_error').show();
    submiform=false;
  }
  
  
  var last_name = $('#last_name').val();
  if (last_name == '' || last_name ==null) 
  {
    $('#last_name_error').text('Please enter last name.');
    $('#last_name_error').show();
    submiform=false;
  }
  
  var email = $('#email').val();
  if (email == '' || email ==null) 
  {
    $('#email_error').text('Please enter email address.');
    $('#email_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) 
        {
           $('#email_error').text('Please enter valid email address.');
            $('#email_error').show();
            submiform=false;
        }
        else if(email)
        {
          var email_split = email.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#email_error').text('Please enter valid email address.');
              $('#email_error').show();
              submiform=false;
          }
        }
        // else
        // {
        //     isEmailExist();
        // }
  }
  
  
  var mobile_number = $('#mobile_number').val();
  if (mobile_number == '' || mobile_number ==null) 
  {
    $('#mobile_number_error').text('Please enter mobile number.');
    $('#mobile_number_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#mobile_number').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#mobile_number_error').text('Please enter 10 digits mobile number');
              $('#mobile_number_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#mobile_number_error').text('Please enter 10 digits mobile number');
              $('#mobile_number_error').show();
              submiform=false;
             } 
            }
  }
	
	var wp_mobile_number = $('#wp_mobile_number').val();
  if (wp_mobile_number == '' || wp_mobile_number ==null) 
  {
    $('#wp_mobile_number_error').text('Please enter whatsapp mobile number.');
    $('#wp_mobile_number_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#wp_mobile_number').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#wp_mobile_number_error').text('Please enter 10 digits whatsapp mobile number');
              $('#wp_mobile_number_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#wp_mobile_number_error').text('Please enter 10 digits whatsapp mobile number');
              $('#wp_mobile_number_error').show();
              submiform=false;
             } 
            }
  }

  var gender = $('#gender').val();
  if (gender == '' || gender ==null) 
  {
    $('#gender_error').text('Please select gender.');
    $('#gender_error').show();
    submiform=false;
  }

  var media_source_name = $('#media_source_name').val();
  if (media_source_name == '' || media_source_name ==null) 
  {
    $('#media_source_name_error').text('Please select media source.');
    $('#media_source_name_error').show();
    submiform=false;
  }

	var department_id = $('#department_id').val();
  if (department_id == '' || department_id ==null) 
  {
    $('#department_id_error').text('Please select department.');
    $('#department_id_error').show();
    submiform=false;
  }
	
  var agent_id = $('#agent_id').val();
  if (agent_id == '' || agent_id ==null) 
  {
    $('#agent_id_error').text('Please select Booking Centre.');
    $('#agent_id_error').show();
    submiform=false;
  }

  var tour_number = $('#tour_number').val();
  if (tour_number == '' || tour_number ==null) 
  {
    $('#tour_number1').text('Please Select Tour.');
    $('#tour_number1').show();
    submiform=false;
  }

  var tour_number_other = $('#tour_number').val();
  if(tour_number_other == 'other'){
  var other_tour_name = $('#other_tour_name').val();
  if (other_tour_name == '' || other_tour_name ==null) 
  {
    $('#other_tour_name1').text('Please Enter Destination Name.');
    $('#other_tour_name1').show();
    submiform=false;
  }
}

  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>

<script>
  $(document).ready(function(){
  $('#dept_id').on('change',function(){
    var site_path = '<?php echo  base_url(); ?>';
    var dept_id = $(this).val();
    if(dept_id != ''){
        $.ajax({
            url: ""+site_path+"packages/agent_fetch_by_department_id",
            method: 'POST',
            dataType:"json",
            data :{dept_id:dept_id},
            beforeSend: function(){
                       $('#preloader-loader').css("display", "block");
                     },
            success: function(response){
              console.log(response);
                $("#agent_id").html('');             
            },
            complete: function(){
                              $('#preloader-loader').css("display", "none");
                      },
        })
    }
  });
 });
</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>


<script>
    $(document).ready(function(){
     $(document).on('change', '#filter_val_cat', function(event){
        var base_url = "<?php echo base_url();?>";
        var fil_val = $('#filter_val_cat').val();
       
        if(fil_val=='low_to_high'){
        var filt= 'asc';
        var url =window.location.origin;
        var final_url = base_url+"tour_list/all_main_category_list/"+filt;
	    window.location.href = final_url;
        }else if(fil_val=='high_to_low')
        {
            var filt= 'dsc';
        var url =window.location.origin;
        var final_url = base_url+"tour_list/all_main_category_list/"+filt;
	    window.location.href = final_url;
        };
     });
    });  
</script>

<script>
    $(document).ready(function(){
     $(document).on('change', '#filter_val_cat_sub', function(event){
        var base_url = "<?php echo base_url();?>";
        var fil_val = $('#filter_val_cat_sub').val();
        var pid = $('#pid').val();
       //alert(pid);
        if(fil_val=='low_to_high'){
        var filt= 'asc';
        var url =window.location.origin;
        var final_url = base_url+"tour_list/index/"+pid+'/'+filt;
	    window.location.href = final_url;
        }else if(fil_val=='high_to_low')
        {
            var filt= 'dsc';
        var url =window.location.origin;
        var final_url = base_url+"tour_list/index/"+pid+'/'+filt;
	    window.location.href = final_url;
        };
     });
    });  
</script>

<script>
function validateinternationalreviewForms() 
{
  $("#name_error").hide();
  $("#email_error").hide();
  $("#message_error").hide();
  
  
  var submiform='';
  
  var name = $('#name').val();
  if (name == '' || name ==null) 
  {
    $('#name_error').text('Please enter name.');
    $('#name_error').show();
    submiform=false;
  }
  

  var emailid = $('#email').val();
  if (emailid == '' || emailid ==null) 
  {
    $('#email_error').text('Please enter email address.');
    $('#email_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(emailid)) 
        {
           $('#email_error').text('Please enter valid email address.');
            $('#email_error').show();
            submiform=false;
        }
        else if(emailid)
        {
          var email_split = emailid.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#email_error').text('Please enter valid email address.');
              $('#email_error').show();
              submiform=false;
          }
        }    
  }
  
  

 
  
  var message = $('#message').val();
  if (message == '' || message ==null) 
  {
    $('#msg_error').text('Please enter message.');
    $('#msg_error').show();
    submiform=false;
  }
  
      
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>

<script>
function validatedomesticreviewForms() 
{
  $("#name_error").hide();
  $("#email_error").hide();
  $("#message_error").hide();
  
  
  var submiform='';
  
  var name = $('#name').val();
  if (name == '' || name ==null) 
  {
    $('#name_error').text('Please enter name.');
    $('#name_error').show();
    submiform=false;
  }
  

  var emailid = $('#email').val();
  if (emailid == '' || emailid ==null) 
  {
    $('#email_error').text('Please enter email address.');
    $('#email_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(emailid)) 
        {
           $('#email_error').text('Please enter valid email address.');
            $('#email_error').show();
            submiform=false;
        }
        else if(emailid)
        {
          var email_split = emailid.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#email_error').text('Please enter valid email address.');
              $('#email_error').show();
              submiform=false;
          }
        }    
  }
  
  

 
  
  var name = $('#review').val();
  if (name == '' || name ==null) 
  {
    $('#message_error').text('Please enter review.');
    $('#message_error').show();
    submiform=false;
  }
      
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>



<!--<script src="https://unpkg.com/aos@2s.3.1/dist/aos.js"></script>-->
<!--<script>-->
<!--  AOS.init();-->
<!--</script>-->


<script>
function custom_enquiry_form() 
{
  $("#full_name_error").hide();
  $("#email_error").hide();
  $("#mobile_number_error").hide();
  $("#mobile_number2_error").hide();
  $("#chechin_date_error").hide();
  $("#checkout_error").hide();
  $("#no_of_nights_error").hide();
  $("#no_of_couple_error").hide();
  $("#meal_plan_error").hide();
  // $("#meal_plan_name_error").hide();
  $("#total_adult_error").hide();
  $("#total_child_with_bed_error").hide();
  $("#total_child_without_bed_error").hide();
  $("#vehicle_type_error").hide();
  // $("#other_vehicle_name_error").hide();
  $("#pick_up_from_error").hide();
  // $("#other_pickup_from_name_error").hide();
  $("#pickup_date_error").hide();

  $("#pickup_time_error").hide();
  $("#drop_to_error").hide();
  // $("#other_drop_to_name_error").hide();
  $("#drop_date_error").hide();
  $("#drop_time_error").hide();
  // $("#special_note_error").hide();


  var submiform='';
  
  var full_name_error = $('#full_name').val();
  if (full_name_error == '' || full_name_error ==null) 
  {
    $('#full_name_error').text('Please enter full name.');
    $('#full_name_error').show();
    submiform=false;
  }
  
  var email = $('#email').val();
  if (email == '' || email ==null) 
  {
    $('#email_error').text('Please enter email address.');
    $('#email_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) 
        {
           $('#email_error').text('Please enter valid email address.');
            $('#email_error').show();
            submiform=false;
        }
        else if(email)
        {
          var email_split = email.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#email_error').text('Please enter valid email address.');
              $('#email_error').show();
              submiform=false;
          }
        }
        // else
        // {
        //     isEmailExist();
        // }
  }
  
  
var mobile_number = $('#mobile_number1').val();
  if (mobile_number == '' || mobile_number ==null) 
  {
    $('#mobile_number_error').text('Please enter mobile number.');
    $('#mobile_number_error').show();
    submiform=false;
  }
  else
  {
      var mobNum = $('#mobile_number1').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#mobile_number_error').text('Please enter 10 digits mobile number');
              $('#mobile_number_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#mobile_number_error').text('Please enter 10 digits mobile number');
              $('#mobile_number_error').show();
              submiform=false;
             } 
            }
  }

  var mobile_number = $('#mobile_number2').val();
 
  if (mobile_number!= '') 
  {
      var mobNum = $('#mobile_number2').val();
      var filter = /^\d*(?:\.\d{1,2})?$/;
        if(filter.test(mobNum)) {
            if(mobNum.length < 10){
                  $('#mobile_number2_error').text('Please enter 10 digits mobile number');
              $('#mobile_number2_error').show();
              submiform=false;
             } 
            }
            
         if(filter.test(mobNum)) {
            if(mobNum.length > 10){
                  $('#mobile_number2_error').text('Please enter 10 digits mobile number');
              $('#mobile_number2_error').show();
              submiform=false;
             } 
            }
  }
	
	
  var chechin_date_error = $('#checkin_date').val();
  if (chechin_date_error == '' || chechin_date_error ==null) 
  {
    $('#chechin_date_error').text('Please select check in date.');
    $('#chechin_date_error').show();
    submiform=false;
  }

  var checkout_error = $('#checkout_date').val();
  if (checkout_error == '' || checkout_error ==null) 
  {
    $('#checkout_error').text('Please select check out date.');
    $('#checkout_error').show();
    submiform=false;
  }

	var no_of_nights_error = $('#no_of_nights').val();
  if (no_of_nights_error == '' || no_of_nights_error ==null) 
  {
    $('#no_of_nights_error').text('Please Enter no of nights.');
    $('#no_of_nights_error').show();
    submiform=false;
  }

  var no_of_couple_error = $('#no_of_couple').val();
  if (no_of_couple_error == '' || no_of_couple_error ==null) 
  {
    $('#no_of_couple_error').text('Please Enter no of couple.');
    $('#no_of_couple_error').show();
    submiform=false;
  }

  var meal_plan_error = $('#meal_plan').val();
  if (meal_plan_error == '' || meal_plan_error ==null) 
  {
    $('#meal_plan_error').text('Please select meal plan.');
    $('#meal_plan_error').show();
    submiform=false;
  }

  // var meal_plan_name_error = $('#meal_plan_name').val();
  // if (meal_plan_name_error == '' || meal_plan_name_error ==null) 
  // {
  //   $('#meal_plan_name_error').text('Please Enter Other meal plan.');
  //   $('#meal_plan_name_error').show();
  //   submiform=false;
  // }

  var total_adult_error = $('#total_adult').val();
  if (total_adult_error == '' || total_adult_error ==null) 
  {
    $('#total_adult_error').text('Please enter total adult.');
    $('#total_adult_error').show();
    submiform=false;
  }

  var total_child_with_bed_error = $('#total_child_with_bed').val();
  if (total_child_with_bed_error == '' || total_child_with_bed_error ==null) 
  {
    $('#total_child_with_bed_error').text('Please enter total child with bed.');
    $('#total_child_with_bed_error').show();
    submiform=false;
  }

  var total_child_without_bed_error = $('#total_child_without_bed').val();
  if (total_child_without_bed_error == '' || total_child_without_bed_error ==null) 
  {
    $('#total_child_without_bed_error').text('Please enter total child with bed.');
    $('#total_child_without_bed_error').show();
    submiform=false;
  }

  var vehicle_type_error = $('#vehicle_type').val();
  if (vehicle_type_error == '' || vehicle_type_error ==null) 
  {
    $('#vehicle_type_error').text('Please select vehicle type.');
    $('#vehicle_type_error').show();
    submiform=false;
  }

  // var other_vehicle_name_error = $('#other_vehicle_name').val();
  // if (other_vehicle_name_error == '' || other_vehicle_name_error ==null) 
  // {
  //   $('#other_vehicle_name_error').text('Please Enter Other vehicle type.');
  //   $('#other_vehicle_name_error').show();
  //   submiform=false;
  // }

  // var other_pickup_from_name_error = $('#other_pickup_from_name').val();
  // if (other_pickup_from_name_error == '' || other_pickup_from_name_error ==null) 
  // {
  //   $('#other_pickup_from_name_error').text('Please Enter Other Pickup From.');
  //   $('#other_pickup_from_name_error').show();
  //   submiform=false;
  // }

  var pick_up_from_error = $('#pick_up_from').val();
  if (pick_up_from_error == '' || pick_up_from_error ==null) 
  {
    $('#pick_up_from_error').text('Please select pickup from.');
    $('#pick_up_from_error').show();
    submiform=false;
  }

  var pickup_date_error = $('#pickup_date').val();
  if (pickup_date_error == '' || pick_up_from_error ==null) 
  {
    $('#pickup_date_error').text('Please select pickup date.');
    $('#pickup_date_error').show();
    submiform=false;
  }

  var pickup_time_error = $('#pickup_time').val();
  if (pickup_time_error == '' || pickup_time_error ==null) 
  {
    $('#pickup_time_error').text('Please select pickup time.');
    $('#pickup_time_error').show();
    submiform=false;
  }

  var drop_to_error = $('#drop_to').val();
  if (drop_to_error == '' || drop_to_error ==null) 
  {
    $('#drop_to_error').text('Please select drop to.');
    $('#drop_to_error').show();
    submiform=false;
  }

  // var other_drop_to_name_error = $('#other_drop_to_name').val();
  // if (other_drop_to_name_error == '' || other_drop_to_name_error ==null) 
  // {
  //   $('#other_drop_to_name_error').text('Please Enter Other Drop To.');
  //   $('#other_drop_to_name_error').show();
  //   submiform=false;
  // }

  var drop_date_error = $('#drop_date').val();
  if (drop_date_error == '' || drop_date_error ==null) 
  {
    $('#drop_date_error').text('Please select drop date.');
    $('#drop_date_error').show();
    submiform=false;
  }

  var drop_time_error = $('#drop_time').val();
  if (drop_time_error == '' || drop_time_error ==null) 
  {
    $('#drop_time_error').text('Please select drop time.');
    $('#drop_time_error').show();
    submiform=false;
  }
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}

</script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $('.checkin_date').datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    minDate: 'dateToday',
});
$('.checkout_date').datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    minDate: 'dateToday',
});
$('.checkin_date').datepicker().bind("change", function () {
    var minValue = $(this).val();
    minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
    $('.checkout_date').datepicker("option", "minDate", minValue);
    calculate();
});
$('.checkout_date').datepicker().bind("change", function () {
    var maxValue = $(this).val();
    maxValue = $.datepicker.parseDate("yy-mm-dd", maxValue);
    $('.checkin_date').datepicker("option", "maxDate", maxValue);
    calculate();
});

function calculate() {
    var d1 = $('.checkin_date').datepicker('getDate');
    var d2 = $('.checkout_date').datepicker('getDate');
    var oneDay = 24*60*60*1000;
    var diff = 0;
    if (d1 && d2) {
  
      diff = Math.round(Math.abs((d2.getTime() - d1.getTime())/(oneDay)));
    }
    $('.no_of_nights').val(diff);
  }
  </script>

<script type="text/javascript">
  function Mealplan(val){
  var element=document.getElementById('other_meal_plan_div');
	var element2=document.getElementById('meal_plan_name');
    if(val=='Other')
    element.style.display='block';
    else  
    element.style.display='none';
	element2.value="";	
    }

</script>
<script type="text/javascript">
function Vehicle(val){
  var element=document.getElementById('other_vehicle_type_div');
	var element2=document.getElementById('other_vehicle_name');
    if(val=='Other')
    element.style.display='block';
    else  
    element.style.display='none';
	  element2.value="";	
    }
  </script>
  <script type="text/javascript">
  function Pickupfrom(val){
  var element=document.getElementById('other_pickup_from_div');
	var element2=document.getElementById('other_pickup_from_name');
    if(val=='Other')
    element.style.display='block';
    else  
    element.style.display='none';
	  element2.value="";	
    }
  </script>
  <script type="text/javascript">
  function dropto(val){
  var element=document.getElementById('other_dropto_div');
	var element2=document.getElementById('other_drop_to_name');
    if(val=='Other')
    element.style.display='block';
    else  
    element.style.display='none';
	  element2.value="";	
    }
  </script>

  <script>
  $(".selectall").click(function(){
          $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

  });
  </script>

<script type="text/javascript">
    function CheckColors(val){
    var element=document.getElementById('other_tour_name_div');
	var element2=document.getElementById('other_tour_name');
    if(val=='Other')
    element.style.display='block';
    else  
    element.style.display='none';
	element2.value="";	
    }

</script>


<script>
function validateFeedbackForms() 
{
  $("#categories_error").hide();
  $("#rating_error").hide();
  $("#msg_error").hide();
  $("#image_name_error").hide();
  
  var submiform='';


  var gender = $('#categories').val();
  if (gender == '' || gender ==null) 
  {
    $('#categories_error').text('Please select categories.');
    $('#categories_error').show();
    submiform=false;
  }

  var gender = $('#rating').val();
  if (gender == '' || gender ==null) 
  {
    $('#rating_error').text('Please select rating.');
    $('#rating_error').show();
    submiform=false;
  }

  var gender = $('#message').val();
  if (gender == '' || gender ==null) 
  {
    $('#msg_error').text('Please enter feedback.');
    $('#msg_error').show();
    submiform=false;
  }

  var gender = $('#image_name').val();
  if (gender == '' || gender ==null) 
  {
    $('#image_name_error').text('Please select image.');
    $('#image_name_error').show();
    submiform=false;
  }

  
  
  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
    
</script>

<script>
    $(document).ready(function() {
    var start = 0; // Starting index
    var limit = 10; // Number of records to load initially

    var dataTable = $('#data-table').DataTable({
        "paging": false, // Disable DataTables pagination
        "searching": false, // Disable DataTables search
        "ordering": false, // Disable DataTables sorting
        "info": false, // Disable DataTables info
        "scrollY": "10000px", // Set the height of the scrollable area
        "scrollCollapse": true,
        "ajax": {
            "url": "<?php echo base_url('packages/all_packages'); ?>", // Replace with your controller and method
            "type": "POST",
            "data": function(d) {
                d.start = start; // Pass start and limit parameters to the server
                d.length = limit;
            },
            "dataSrc": "data" // The data source property in your JSON response
        }
    });

    // Detect when the user scrolls to the bottom
    $('#data-table').on('scroll', function() {
        var container = $(this);
        if (container.scrollTop() + container.innerHeight() >= container[0].scrollHeight) {
            // User has scrolled to the bottom, load more data
            start += limit; // Update the starting index
            dataTable.ajax.reload(); // This will trigger the server-side request with updated parameters
        }
    });
});

</script>

<!-- Download prospect and rate chart pdf -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function downloadForms() {

    var mobileNumber = document.getElementById('mobile_number').value;
    var region_office_location = document.getElementById('region_office_location').value;

    if (region_office_location == '') {
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: 'Please Select Region Office Location.',
        });
        return false; // Prevent the form from submitting
    }
    // Validate the mobile number
    var mobileRegex = /^[6-9]\d{9}$/;
    if (!mobileRegex.test(mobileNumber)) {
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: 'Please enter a valid 10-digit mobile number ,then click on Download button.',
        });
        return false; // Prevent the form from submitting
    }

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('download/insertMobileNumber'); ?>',
        data: { mobile_number: mobileNumber,
          region_office_location:region_office_location
        },
        success: function(response) {
          // alert(response)
            if (response= true) {
              // alert(response)
              $("#prospect_btn").get(0).click();
              Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'PDF Downloaded successfully!',
                }).then(function() {
                    // Optionally, you can refresh the page after the user dismisses the alert
                    location.reload();
                });
                
            } else {
                // Handle error
            }
        }
    });

    return false; // Prevent the form from submitting via traditional means
}
</script>

<script>
function downloadrateForms() {

    var mobileNumber = document.getElementById('rate_mobile_number').value;
    var region_office_location = document.getElementById('region_office_location').value;

    // Validate the mobile number

    if (region_office_location == '') {
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: 'Please Select Region Office Location.',
        });
        return false; // Prevent the form from submitting
    }
    var mobileRegex = /^[6-9]\d{9}$/;
    if (!mobileRegex.test(mobileNumber)) {
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: 'Please enter a valid 10-digit mobile number ,then click on Download button.',
        });
        return false; // Prevent the form from submitting
    }

    // var mobileRegex = /^[6-9]\d{9}$/;
    

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('download/insertrateMobileNumber'); ?>',
        data: { mobile_number: mobileNumber,
          region_office_location:region_office_location
        },
        success: function(response) {
          // alert(response)
            if (response= true) {
              // alert(response)
              $("#rate_btn").get(0).click();
              Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'PDF Downloaded successfully!',
                }).then(function() {
                    // Optionally, you can refresh the page after the user dismisses the alert
                    location.reload();
                });
                
            } else {
                // Handle error
            }
        }
    });

    return false; // Prevent the form from submitting via traditional means
}
</script>


<!-- End Download prospect and rate chart pdf -->


</body>
</html>