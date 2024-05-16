<style>
.book-tbl {
    position: relative;
    display: inline-flex;
    width: 100%;
    margin-top: 5%;
    padding-bottom: 20px;
}

.new_seat_design_ul {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.new_seat_design_ul li {
    display: block;
    float: left;
    margin: 0 5px;
}

.label {
    display: inline-block;
    position: relative;
    width: 20px;
    color: #fff;
    background: #FBCF61;
    text-align: center;
    line-height: 22px;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.25s ease 0s;
    -webkit-transition: all 0.25s
}

.label:hover {
    background: #00B4F1;
}

.label:active {
    transition: 0;
    -webkit-transition: 0;
    -webkit-filter: brightness(.8);
}

input {
    display: none;
}

input:checked+label {
    background: #FF7541;
    color: #fff;
}

input:checked+label {
    animation: boom .5s;
    -webkit-animation: boom .5s;
}

@keyframes boom {
    25% {
        transform: scale(1.25);
    }
}

@-webkit-keyframes boom {
    25% {
        -webkit-transform: scale(1.25);
    }
}

input:disabled+label {
    color: #fff;
    background: #f00;
}

.book-txt {
    font-family: "Open Sans", sans-serif;
    text-align: center;
    color: #888;
}

.book-txt h2 {
    color: #FF7541;
}

.note {
    padding: 25px 0;
    font-size: 14px;
}

.note a {
    color: #FF7541;
    text-decoration: none;
}

.note a:hover {
    text-decoration: underline;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $module_title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?php echo $module_url_path; ?>/index/"><button
                                class="btn btn-primary">Back</button></a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation --> <?php $this->load->view('admin/layout/admin_alert'); ?> <div
                        class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $page_title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- <?php
                  // foreach($arr_data as $info) 
                   //{ 
                     ?> -->
                        <form method="post" enctype="multipart/form-data">
                        <input class="form-control" type="hidden" name="vehicle_id" value="<?php echo $vehicle_details_data['id']; ?>">
                        <input class="form-control" type="hidden" name="seat_capacity" value="<?php echo $vehicle_details_data['seat_capacity']; ?>">
                        <?php if(!empty($seat_preference_data)){?>
                        <input class="form-control" type="hidden" name="vpreference_id" value="<?php echo $seat_preference_data['vpreference_id']; ?>">
                        <?php } ?>
                            <div class="card-body">
                                <div class="row" id="main_row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Seat Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="First Class" Value="First Class" required="required"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">

                                                <?php 
                                                $fist_seats=[''];
                                                $second_seats=[''];
                                                $third_seats=[''];
                                                $array_combine=[''];

                                                if(!empty($seat_preference_data)){
                                                $fist_seats=explode(',',$seat_preference_data['first_cls_seats']);
                                                $second_seats=explode(',',$seat_preference_data['second_cls_seats']);
                                                $third_seats=explode(',',$seat_preference_data['third_cls_seats']);
                                                $array_combine = array_merge($second_seats,$third_seats);
                                                }

                                                $seat_count=$vehicle_details_data['seat_capacity'];
                                                for($a=1; $a<=$seat_count; $a++){
                                                ?>
                                                    <li>
                                                        <input class="first_class" id="first_class_i<?php echo $a;?>" value="<?php echo $a;?>" type="checkbox"
                                                        <?php if(in_array($a,$fist_seats)){ echo "checked";}elseif(in_array($a,$array_combine)){ echo "disabled";} ?> name="first_cls_seats[]"/>
                                                        <label class="label" for="first_class_i<?php echo $a;?>" style="width: 40px"><?php echo $a;?></label>
                                                    </li>
                                                <?php } ?>  
                                                   
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="first_class_price"
                                                id="first_class_price" placeholder="Enter Price" value="<?php if(!empty($seat_preference_data)) { echo $seat_preference_data['first_class_price'];} ?>"
                                                oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');"
                                                required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Seat Type</label>

                                            <input type="text" class="form-control" name="second_class"
                                                id="second_class" placeholder="First Class" Value="Second Class"
                                                required="required" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                
                                                <?php 
                                                $fist_seats=[''];
                                                $second_seats=[''];
                                                $third_seats=[''];
                                                $array_combine=[''];

                                                if(!empty($seat_preference_data)){
                                                $fist_seats=explode(',',$seat_preference_data['first_cls_seats']);
                                                $second_seats=explode(',',$seat_preference_data['second_cls_seats']);
                                                $third_seats=explode(',',$seat_preference_data['third_cls_seats']);
                                                $array_combine = array_merge($fist_seats,$third_seats);
                                                }
                                                $seat_count=$vehicle_details_data['seat_capacity'];
                                                for($a=1; $a<=$seat_count; $a++){
                                                ?>
                                                    <li>
                                                        <input class="second_class" id="second_class_i<?php echo $a;?>" now_selected="" type="checkbox" value="<?php echo $a;?>"
                                                        <?php if(in_array($a,$second_seats)){ echo "checked";}elseif(in_array($a,$array_combine)){ echo "disabled";} ?> name="second_cls_seats[]"/>
                                                        <label class="label" for="second_class_i<?php echo $a;?>"  style="width: 40px"><?php echo $a;?></label>
                                                    </li>
                                                <?php } ?>    
                                                    
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="second_class_price"
                                            value="<?php if(!empty($seat_preference_data)) {echo $seat_preference_data['second_class_price'];} ?>"
                                                id="second_class_price" placeholder="Enter Price" required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Seat Type</label>


                                            <input type="text" class="form-control" name="third_class" id="third_class"
                                                placeholder="Third Class" Value="third_class" required="required"
                                                readonly="readonly">

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!-- <label>Seat Numbers</label> -->
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">

                                                <?php 
                                                $fist_seats=[''];
                                                $second_seats=[''];
                                                $third_seats=[''];
                                                $array_combine=[''];

                                                if(!empty($seat_preference_data)){
                                                $fist_seats=explode(',',$seat_preference_data['first_cls_seats']);
                                                $second_seats=explode(',',$seat_preference_data['second_cls_seats']);
                                                $third_seats=explode(',',$seat_preference_data['third_cls_seats']);
                                                $array_combine = array_merge($second_seats,$fist_seats);
                                                }
                                                $seat_count=$vehicle_details_data['seat_capacity'];
                                                for($a=1; $a<=$seat_count; $a++){
                                                ?>
                                                    <li>
                                                        <input class="third_class" id="third_class_i<?php echo $a;?>" type="checkbox" value="<?php echo $a;?>"
                                                        <?php if(in_array($a,$third_seats)){ echo "checked";}elseif(in_array($a,$array_combine)){ echo "disabled";} ?> name="third_cls_seats[]"/>
                                                        <label class="label" for="third_class_i<?php echo $a;?>"  style="width: 40px"><?php echo $a;?></label>
                                                    </li>
                                                <?php } ?>  
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Add On Price</label>
                                            <input type="text" class="form-control" name="third_class_price"
                                                id="third_class_price" placeholder="Enter Price" value="<?php if(!empty($seat_preference_data)) { echo $seat_preference_data['third_class_price'];} ?>"
                                                oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');"
                                                required="required">
                                            <span class="error"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="row" id="main_row">

                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <label>Seat Type</label>

                                            <input type="text" class="form-control" name="window_class" id="window_class"

                                                placeholder="Third Class" Value="window_class" required="required"

                                                readonly="readonly">

                                        </div>

                                    </div>

                                    <div class="col-md-8">

                                        <div class="form-group">

                                        </div>

                                    </div>

                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <label>Add On Price</label>

                                            <input type="text" class="form-control" name="window_class_price"

                                                id="window_class_price" placeholder="Enter Price" value="<?php if(!empty($seat_preference_data)) { echo $seat_preference_data['window_class_price'];} ?>"

                                                oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');"

                                                required="required">

                                            <span class="error"><?php echo form_error('price'); ?></span>

                                        </div>

                                    </div>

                                    <hr>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control" name="submit" value="submit"
                                    style="width:10%;">Submit</button>
                                <a href="<?php echo $module_url_path; ?>/index/"><button type="button"
                                        class="btn btn-danger">Cancel</button></a>
                            </div>
                        </form>

                    </div>
                    <!-- <?php //} ?>   -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>