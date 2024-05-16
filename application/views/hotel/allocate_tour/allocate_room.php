<style>
.book-tbl {
    position: relative;
    display: inline-flex;
    width: 100%;
    margin-top: 2%;
    padding-bottom: 10px;
}

.new_seat_design_ul {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1rem;
}

.new_seat_design_ul li {
    display: block;
    float: left;
    margin: 0 5px;
}

.label {
    display: inline-block;
    position: relative;
    width: 50px;
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
hr{
    width: 98% !important;
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
                    <!-- jquery validation --> <?php $this->load->view('tour_manager/layout/agent_alert'); ?> <div
                        class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $page_title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
        
                        <?php
            if(!empty($hotel_allocated_room_data)){
                   foreach($hotel_allocated_room_data as $hotel_r_info) 
                   { 
                     ?>
                        <form method="post" enctype="multipart/form-data">

                            <div class="card-body">
                                <div class="row" id="main_row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="One Bed" Value="One Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        // print_r($info); die;
                                                        if($info['bed_type']=='One Bed' && $info['room_type']=='AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['one_bed_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="one_bed_AC[]" id="i<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="i<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Non-AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='One Bed' && $info['room_type']=='Non-AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['one_bed_Non_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="one_bed_Non_AC[]" id="ii<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="ii<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="Two Bed" Value="Two Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='Two Bed' && $info['room_type']=='AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['two_bed_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="two_bed_AC[]" id="j<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="j<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Non-AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='Two Bed' && $info['room_type']=='Non-AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['two_bed_Non_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="two_bed_Non_AC[]" id="jj<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="jj<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="Three Bed" Value="Three Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='Three Bed' && $info['room_type']=='AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['three_bed_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="three_bed_AC[]" id="l<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="l<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Non-AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='Three Bed' && $info['room_type']=='Non-AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['three_bed_Non_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="three_bed_Non_AC[]" id="ll<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="ll<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <hr>
                                </div>

                                <div class="row" id="main_row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Room Type</label>

                                            <input type="text" class="form-control" name="first_class" id="first_class"
                                                placeholder="Four Bed" Value="Four Bed" required="required"
                                                readonly>

                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='Four Bed' && $info['room_type']=='AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['four_bed_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="four_bed_AC[]" id="k<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="k<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Non-AC Rooms :</label>
                                            <div class="book-tbl">
                                                <ul class="new_seat_design_ul">
                                                <?php 
                                                $i=1; 
                                                    foreach($arr_data as $info) 
                                                    { 
                                                        if($info['bed_type']=='Four Bed' && $info['room_type']=='Non-AC'){
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            $quali1=array();
                                                            $p = $hotel_r_info['four_bed_Non_AC'];
                                                            $quali1 = explode(',',$p);
                                                            // print_r($quali1); die;
                                                        ?>
                                                        <input name="four_bed_Non_AC[]" id="kk<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" <?php if(in_array($info['room_number'],$quali1)) {echo 'checked';}?> />
                                                        <label class="label" for="kk<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                    </li>

                                                <?php $i++;} }?>
                                                </ul>
                                            </div>


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
                    <?php } } else {?>  

                    <form method="post" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="row" id="main_row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Room Type</label>

                                        <input type="text" class="form-control" name="first_class" id="first_class"
                                            placeholder="One Bed" Value="One Bed" required="required"
                                            readonly>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    
                                                    if($info['bed_type']=='One Bed' && $info['room_type']=='AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="one_bed_AC[]" id="i<?php echo $i?>" type="checkbox" value="<?php echo $info['id'] ?>" >
                                                    <label class="label" for="i<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Non-AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='One Bed' && $info['room_type']=='Non-AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="one_bed_Non_AC[]" id="ii<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" />
                                                    <label class="label" for="ii<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <hr>
                            </div>

                            <div class="row" id="main_row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Room Type</label>

                                        <input type="text" class="form-control" name="first_class" id="first_class"
                                            placeholder="Two Bed" Value="Two Bed" required="required"
                                            readonly>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='Two Bed' && $info['room_type']=='AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="two_bed_AC[]" id="j<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" />
                                                    <label class="label" for="j<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Non-AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='Two Bed' && $info['room_type']=='Non-AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="two_bed_Non_AC[]" id="jj<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" />
                                                    <label class="label" for="jj<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <hr>
                            </div>

                            <div class="row" id="main_row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Room Type</label>

                                        <input type="text" class="form-control" name="first_class" id="first_class"
                                            placeholder="Three Bed" Value="Three Bed" required="required"
                                            readonly>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='Three Bed' && $info['room_type']=='AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="three_bed_AC[]" id="l<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" />
                                                    <label class="label" for="l<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Non-AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='Three Bed' && $info['room_type']=='Non-AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="three_bed_Non_AC[]" id="ll<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>"  />
                                                    <label class="label" for="ll<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <hr>
                            </div>

                            <div class="row" id="main_row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Room Type</label>

                                        <input type="text" class="form-control" name="first_class" id="first_class"
                                            placeholder="Four Bed" Value="Four Bed" required="required"
                                            readonly>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='Four Bed' && $info['room_type']=='AC'){
                                                ?>
                                                <li>
                                                    
                                                    <input name="four_bed_AC[]" id="k<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" />
                                                    <label class="label" for="k<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Non-AC Rooms :</label>
                                        <div class="book-tbl">
                                            <ul class="new_seat_design_ul">
                                            <?php 
                                            $i=1; 
                                                foreach($arr_data as $info) 
                                                { 
                                                    if($info['bed_type']=='Four Bed' && $info['room_type']=='Non-AC'){
                                                ?>
                                                <li>
                                                   
                                                    <input name="four_bed_Non_AC[]" id="kk<?php echo $i?>" type="checkbox" value="<?php echo $info['room_number'] ?>" />
                                                    <label class="label" for="kk<?php echo $i?>"><?php echo $info['room_number'] ?></label>
                                                </li>

                                            <?php $i++;} }?>
                                            </ul>
                                        </div>


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
                <!-- /.card -->
                <?php } ?>
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