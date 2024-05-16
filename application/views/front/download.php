<style>
    .region_css{
        margin-left: 10px;
    }
</style>
<!-- contact starts -->
    <section class="contact-main pt-4 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <span>
                                </span>
                                <!-- <h3 class="mb-1">CONTACT US</h3> -->
                                <h2 class="mb-1" data-aos="fade-up" data-duration="500"> <span class="theme" data-aos="fade-up" data-duration="500">Downloads</span></h2>
                                
                            </div>
                             <?php foreach($website_basic_structure as $key => $website_basic_structure_value) { ?>
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <img class="mb_for_img_cont" src=<?php echo base_url(); ?>uploads\do_not_delete\pdf.PNG height="60%" width="30%" alt></img>
                                            <h3 class="mb-1 text-center">Prospect</h3>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <img class="mb_for_img_cont" src=<?php echo base_url(); ?>uploads\do_not_delete\pdf.PNG height="60%" width="30%" alt></img>
                                            <h3 class="mb-1 text-center">Rate Chart</h3>
                                    </div>
                                </div>
                                    <form method="post" id="mobileForm">
                                    <div class="row">
                                        <div class="col-lg-2">
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <select class="select_css region_css" name="region_office_location" id="region_office_location">
                                                    <option value="">Select Region Office Location</option>
                                                    <?php foreach($department_data as $department_data_value){ ?>   
                                                            <option value="<?php echo $department_data_value['id'];?>"><?php echo $department_data_value['department'];?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mt-4">
                                                    <input type="text" placeholder="Mobile Number" name="mobile_number" id="mobile_number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                                    <span class="text-danger float-left" id="mobile_number_error" style="display:none"></span>
                                                </div>
                                                <br><br>
                                                <div class="text-center">
                                                    <input type="button" class="nir-btn" id="submit" value="Download" name="submit" onclick="return downloadForms()">

                                                    <?php foreach($arr_data as $info) { ?>
                                                    <a style="display: none;" class="btn-link pull-right text-center" id="prospect_btn" download="" href="<?php echo base_url(); ?>uploads/prospect_pdf/<?php echo $info['prospect_pdf']; ?>">Download</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            </form> 
                                    
                                            <div class="col-lg-6">
                                                <form method="post" id="rateForm">
                                                    <div class="form-group mt-4">
                                                        <input type="text" placeholder="Mobile Number" name="mobile_number" id="rate_mobile_number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <span class="text-danger float-left" id="mobile_number_error_rate" style="display:none"></span>
                                                    </div>
                                                    <br><br>
                                                    <div class="text-center">
                                                        <input type="button" class="nir-btn" id="submit" value="Download" name="submit" onclick="return downloadrateForms()">

                                                        <?php foreach($arr_data as $info) { ?>
                                                        <a style="display: none;" class="btn-link pull-right text-center" id="rate_btn" download="" href="<?php echo base_url(); ?>uploads/rate_chart_pdf/<?php echo $info['rate_chart_pdf']; ?>">Download</a>
                                                        <?php } ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

