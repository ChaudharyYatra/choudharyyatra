
    <!-- BreadCrumb Starts -->  
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url(<?php echo base_url(); ?>uploads/do_not_delete/agents.png);">
        
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

    <!-- agent-list starts -->
    <?php if(count($agents_list)>0) { ?>
    <section class="about-us pt-6" style="background-image:url(<?php echo base_url(); ?>assets/front/images/background_pattern.png); background-position:bottom right;">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="travellers-info mb-4">
                                <h4>Agent List</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="table_head">
                                        <th>Department</th>
                                        <th>Booking Center</th>
                                        <th>Agent Name</th>
                                        <th>Contact Number</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody class="table_body">
                                        <?php foreach($agents_list as $key => $agents_list_value) { ?>

                                                <tr>
                                                    <td><?php echo $agents_list_value['department']; ?></td>
                                                    <td><?php echo $agents_list_value['booking_center']; ?></td>
                                                    <td><?php echo $agents_list_value['agent_name']; ?></td>
                                                    <td><?php echo $agents_list_value['mobile_number1']; ?>,<?php echo $agents_list_value['mobile_number2']; ?></td>
                                                </tr>

                                        <?php } ?>  

                                    </tbody>   
                                </table>
                                
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <!-- agent-list ends -->
    <?php } ?>