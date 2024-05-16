<!-- about-us starts -->
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/agentlist2.jpg);">
        
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <!-- <h1 class="mb-3"><?php //echo $page_title; ?></h1> -->
                    <h1 class="mb-3">Our Representatives</h1>
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

    <!-- about-us starts -->
    <?php if(count($agents_list)>0) { ?>
    <section class="about-us pt-4" style="background-image:url(<?php echo base_url(); ?>assets/front/images/background_pattern.png); background-position:bottom right;">
        <div class="container">
                    <div class="contact-info-title text-center mb-4 px-5">
                        <h2 class="mb-1" data-aos="fade-up" data-duration="500">Call me to <span class="theme" data-aos="fade-up" data-duration="500">Travel the world</span></h2>
                    </div>
            <div class="about-image-box" id="accordionFlushExample">
                <div class="row d-flex align-items-center justify-content-between" id="flush-headingOne">
                    <div class="travellers-info mb-4" data-aos="fade-up" data-duration="500">
                               <?php
                               $cnt=1;
                               foreach($department_list as $key => $department_list_value) {
                                        $aid=$department_list_value['id'];
                                        
                                    $adata=$this->db->query("select * from agent where department='$aid' AND agent.is_deleted='no' AND agent.is_active='yes'");
                                    $agent_data=$adata->result_array($adata);   
                               ?>
                                     <h4 style="text-align:center; background-color: #029e9d; color: #fff;" class="table_head_main accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseOne<?php echo $cnt;?>" aria-expanded="false" aria-controls="flush-collapseOne"><?php echo strtoupper($department_list_value['department']);?> REGIONAL OFFICES</h4>
                                    
                                    <table class="table table-bordered accordion-collapse collapse" id="flush-collapseOne<?php echo $cnt;?>" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <thead>
                                    <tr class="table_head">
                                        <th>Sr. No.</th>
                                        <th>City</th>
                                        <th>Contact Number</th>
                                        <th>Booking Centre</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody class="table_body">
                                        <?php 
                                        
                                        foreach($agent_data as $key => $agents_list_value) { ?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo ucfirst($agents_list_value['city']); ?></td>
                                                    <td><?php echo $agents_list_value['mobile_number1']; ?>, <?php echo $agents_list_value['mobile_number2']; ?></td>
                                                    <td><?php echo $agents_list_value['booking_center']; ?></td>
                                                </tr>
                                        <?php 
                                        $cnt++;
                                        } ?>  

                                    </tbody>   
                                </table>
                                     
                                     
                                     
                                     
                                <?php 
                                       
                                       } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- about-us ends -->
    <?php } ?>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>