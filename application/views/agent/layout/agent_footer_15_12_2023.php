</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <!--<b>Version</b> 3.2.0-->
    </div>
    <center><strong>Copyright &copy; <?php echo date(
        "Y"
    ); ?>.</strong> All rights reserved.</center>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>

<?php if(!empty($bus_info)){ ?>

var js_array =<?php echo json_encode($bus_info);?>;

// console.log(js_array);

  <?php   }else{ ?>

        var js_array=[];

   <?php  } ?>

</script>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/codemirror.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js">
</script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
</script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>

<!-- Page specific script -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/codemirror.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>


<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
</script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/dropzone/min/dropzone.min.js"></script>



<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js">
</script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

<script src="<?php echo base_url();?>assets/admin/bus_seat_design/js/jquery.seat-charts.js"></script>
<script src="<?php echo base_url();?>assets/admin/bus_seat_design/js/script.js"></script> 

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

<script>
$(document).ready(function() {
    // var email = $('#agent_sess_id').val();  
    var agent_id = '1';
    //alert(email);
    if (agent_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>agent/dashboard/check_notification_count",
            method: "POST",
            data: {
                agent_id: agent_id
            },
            success: function(responce) {
                if (responce > 0) {
                    $('#notification_count').append('<i class="fas fa-envelope mr-2"></i> ' +
                        responce + ' Domestic Packages');

                } else {
                    $('#notification_count').html('No Enquiry');
                }
            }
        });
    }
});
</script>

<script>
$(document).ready(function() {
    $("#notification_count").click(function() {
        // var email = $('#agent_sess_id').val();  
        var agent_id = '0';
        //alert(email);
        if (agent_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>agent/dashboard/enquiry_view",
                method: "POST",
                data: {
                    agent_id: agent_id
                },
                success: function(responce) {
                    if (responce = true) {
                        // alert(responce);
                        // redirect($this->module_url_path.'agent/booking_enquiry/index');
                        window.location.href =
                            "<?= base_url() ?>agent/booking_enquiry/index";
                    }
                }
            });
        }
    });
});
</script>


<script>
$(document).ready(function() {
    // var email = $('#agent_sess_id').val();  
    var agent_id = '1';
    //alert(email);
    if (agent_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>agent/dashboard/check_international_count",
            method: "POST",
            data: {
                agent_id: agent_id
            },
            success: function(responce) {
                if (responce > 0) {
                    $('#international_count').append('<i class="fas fa-users mr-2"></i> ' +
                        responce + ' International Packages');
                    // $('#btn_agent').prop('disabled', true)

                } else {
                    $('#international_count').html('No Enquiry');
                    //  $('#btn_agent').prop('disabled', false)
                }
            }
        });
    }
});
</script>

<script>
$(document).ready(function() {
    $("#international_count").click(function() {
        // var email = $('#agent_sess_id').val();  
        var agent_id = '1';
        //alert(email);
        if (agent_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>agent/dashboard/international_view",
                method: "POST",
                data: {
                    agent_id: agent_id
                },
                success: function(responce) {
                    if (responce = true) {
                        // redirect($this->module_url_path.'agent/booking_enquiry/index');
                        window.location.href =
                            "<?= base_url() ?>agent/international_booking_enquiry/index";
                    }
                }
            });
        }
    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {

    <?php
    $this->db->where("id", $this->session->userdata("agent_sess_id"));
    $check_login_data = $this->master_model->getRecord(
        "agent",
        "",
        "password_change"
    );
    if (
        $check_login_data["password_change"] == "no" &&
        $this->router->fetch_method() == "change_password"
    ) { ?>
    $("#agent_change_password").modal("show");
    <?php }
    ?>
});
</script>
<script type="text/javascript">
//      $(document).ready(function(){
//           var login_count = $('#enquiry_login_count').val();
//           if(login_count <=3){
//               $("#agent_change_password").modal("show"); 
//           }
//      });
</script>

<script>
$(document).ready(function() {
    $('.enq_id').click(function(event) {
        $("#enquiry_id").val($(this).attr("data-enq-id"))
    });
});
</script>

<script>
$(document).ready(function() {
    $('.international_enq_id').click(function(event) {
        $("#international_booking_enquiry_id").val($(this).attr("inter-data-enq-id"))
    });
});
</script>

<!-- todays_domestic_notification_count -->
<!-- ===================================== -->

<script>
$(document).ready(function() {
    // var email = $('#agent_sess_id').val();  
    var agent_id = '1';
    //alert(email);
    if (agent_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>agent/dashboard/todays_domestic_notification_count",
            method: "POST",
            data: {
                agent_id: agent_id
            },
            success: function(responce) {
                if (responce > 0) {
                    $('#todays_domestic_count').append('<i class="fas fa-envelope mr-2"></i> ' +
                        responce + ' Todays Domestic Followup Enquiry');
                    // $('#btn_agent').prop('disabled', true)

                } else {
                    $('#todays_domestic_count').html('<h6> No Enquiry </h6>');
                    //  $('#btn_agent').prop('disabled', false)
                }
            }
        });
    }
});
</script>

<script>
$(document).ready(function() {
    $("#todays_domestic_count").click(function() {
        // var email = $('#agent_sess_id').val();  
        var agent_id = '0';
        //alert(email);
        if (agent_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>agent/dashboard/todays_enquiry_view",
                method: "POST",
                data: {
                    agent_id: agent_id
                },
                success: function(responce) {
                    if (responce = true) {
                        window.location.href =
                            "<?= base_url() ?>agent/todays_domestic_followup_list/index";
                        //  redirect($this->module_url_path.'agent/domestic_booking_enquiry_followup/index');
                    }
                }
            });
        }
    });
});
</script>

<!-- =========================================== -->

<!-- ========international current date followup=================================== -->
<script>
$(document).ready(function() {
    // var email = $('#agent_sess_id').val();  
    var agent_id = '1';
    //alert(email);
    if (agent_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>agent/dashboard/todays_international_notification_count",
            method: "POST",
            data: {
                agent_id: agent_id
            },
            success: function(responce) {
                //  console.log(responce);
                //  console.log('jjjjjjjjjjjjjjjjjjjj');
                if (responce > 0) {
                    $('#todays_international_count').append(
                        '<i class="fas fa-envelope mr-2"></i> ' + responce +
                        ' Todays Inter Followup Enquiry');
                    // $('#btn_agent').prop('disabled', true)

                } else {
                    $('#todays_international_count').html('<h6> No Enquiry </h6>');
                    //  $('#btn_agent').prop('disabled', false)
                }
            }
        });
    }
});
</script>

<script>
$(document).ready(function() {
    $("#todays_international_count").click(function() {
        // var email = $('#agent_sess_id').val();  
        var agent_id = '0';
        //alert(email);
        if (agent_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>agent/dashboard/todays_international_view",
                method: "POST",
                data: {
                    agent_id: agent_id
                },
                success: function(responce) {
                    if (responce = true) {
                        window.location.href =
                            "<?= base_url() ?>agent/todays_international_followup_list/index";
                        //  redirect($this->module_url_path.'agent/international_booking_enquiry_followup/index');
                    }
                }
            });
        }
    });
});
</script>

<!-- Seat add  -->

<script>
$(document).ready(function() {
    var count = $('#seat_count_add').val();

    var d_count = $('#d_hidden').val();
    // alert(d_count); 
    for (var i = 0; i < d_count; i++) {
        var img_count = parseInt(i) + 1 + parseInt(count);
        var inc = i+2;

        // alert(img_count);
        var structure = $(`<tr>
        <input type="hidden" class="form-control" name="travaller_info_id[]" id="travaller_info_id" value="">
                                    <td>
                                    <input type="radio" id="yes" name="for_credentials[]" value="">
                          
                                    </td>
                                    <td>
                                        <select class="select_css row_set1" name="mrandmrs[]" id="mrandmrs">
                                            <option value="">select Mr / Mrs</option>
                                            <?php
                                            foreach($courtesy_titles_data as $courtesy_titles_data_info){ 
                                            ?>
                                            <option value="<?php echo $courtesy_titles_data_info['id'];?>" <?php if(isset($all_traveller_info_value['mr/mrs'])){if($courtesy_titles_data_info['id'] == $all_traveller_info_value['mr/mrs']) {echo 'selected';}}?>><?php echo $courtesy_titles_data_info['courtesy_titles_name'];?></option>
                                            
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" style="text-transform: capitalize;" class="form-control row_set first_name" name="first_name[]" id="first_name` + img_count + `" attr_for_search="` + img_count + `" autocomplete="off"
                                    value="" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '');">
                                        
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" style="text-transform: capitalize;" name="middle_name[]" id="middle_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '');">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" style="text-transform: capitalize;" name="last_name[]" id="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '');">
                                    </td>
                                    <td>
                                        <input type="date" class="form-control row_set" name="dob[]" id="dob" max="<?php echo date(
                                            "Y-m-d"
                                        ); ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="age[]" id="age" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </td>
                                    <td>
                                        <select class="select_css row_set" name="relation[]" id="relation">
                                            <option value="">Select</option>
                                            <?php foreach (
                                                $relation_data
                                                as $relation_data_info
                                            ) { ?>
                                            <option value="<?php echo $relation_data_info["id"]; ?>"><?php echo $relation_data_info["relation"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control row_set" name="anniversary_date[]" id="anniversary_date" max="<?php echo date(
                                            "Y-m-d"
                                        ); ?>" value="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" maxlength="10" minlength="10" name="mobile_number[]" id="mobile_number" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </td>
                                    
                                    <td>
                                    <input type="file" name="image_name[]" id="image_name` + img_count +
            `" onchange="encodeImgtoBase64traveller_img(this)" attr_id="` + img_count + `">

                                    <input type="hidden" id="document_file_traveller_img` + img_count + `" name="document_file_traveller_img[]"
                                        value="">
                                        <div id="imagePreview_traveller_img` + img_count + `" class="mt-2 img_size_cast">
                                            <img class="traveller_img" src="<?php echo base_url(); ?>assets/uploads/inter_traveller/" width="100%" />
                                        </div>
                                    </td>
                                    <td>
                                        <input type="file" name="aadhar_image_name[]" id="aadhar_image_name` +
            img_count + `" onchange="encodeImgtoBase64aadhar_img(this)" attr_id="` + img_count + `">
    
                                        <input type="hidden" id="document_file_aadhar_img` + img_count + `" name="document_file_aadhar_img[]"
                                            value="">
                                            <div id="imagePreview_aadhar_img` + img_count + `" class="mt-2 img_size_cast">
                                                <img src="<?php echo base_url(); ?>assets/uploads/traveller_aadhar/" width="100%" />
                                            </div>
                                    </td>
                                    <td>
                                        <button type="button" id="resetBtn" class="btn btn-danger resetBtn" name="Clear" value="Reset">Delete</button>
                                    </td>

                                </tr>`);


        //alert(i);                       
        $('#traveller_table_add').append(structure);
    }

});
</script>
<!-- Auto calculate AGE as we select DOB -->
<!-- <script>
$(function() {
    var calculateAge = function(time) {
        var months = Math.round(time / (24 * 60 * 60 * 1000 * 30));
        //alert(months);
        var years = parseInt(months / 12);
        //alert(years);
        months = months % 12;
        return years;
    };

    // return years +" yrs and " + months + " months";

    $('input[name="dob[]"]').change(function() {
        var birthDate = new Date($(this).val()).getTime();
        var presentDate = new Date().getTime();

        var age = presentDate - birthDate;
        var currentRow = $(this).closest("tr");
        var col3 = currentRow.find('input[name="age[]"]').val(calculateAge(age));
        //alert(birthDate);
        //alert(presentDate);

        // $('input[name="age[]"]').val(calculateAge(age));
    });
});
</script> -->

<!-- <script>
$(function() {
    var calculateAge = function(time) {
        var months = Math.round(time / (24 * 60 * 60 * 1000 * 30));
        var years = parseInt(months / 12);
        months = months % 12;
        return years;
    };

    $('input[name^="dob["]').change(function() {
        var birthDate = new Date($(this).val()).getTime();
        var presentDate = new Date().getTime();
        var age = presentDate - birthDate;
        var currentRow = $(this).closest("tr");
        var index = $(this).attr('name').match(/\[(.*?)\]/)[1];
        var col3 = currentRow.find('input[name="age[' + index + ']"]').val(calculateAge(age));
    });
});
</script> -->
<script>
  $(function() {
    var calculateAge = function(time) {
      var birthDate = new Date(time);
      var presentDate = new Date();
      
      var years = presentDate.getFullYear() - birthDate.getFullYear();
      var months = presentDate.getMonth() - birthDate.getMonth();

      if (presentDate.getDate() < birthDate.getDate()) {
        months--;
      }

      if (months < 0) {
        years--;
        months += 12;
      }

      return years;
    };

    $('input[name^="dob["]').change(function() {
      var birthDate = new Date($(this).val()).getTime();
      var age = calculateAge(birthDate);
      var currentRow = $(this).closest("tr");
      var index = $(this).attr('name').match(/\[(.*?)\]/)[1];
      var col3 = currentRow.find('input[name="age[' + index + ']"]').val(age);
    });
  });
</script>

<!-- ================================================================================================ -->


<!-- Add Stationary request multiple at one time -->
<script>
var i = 1;
$('#add_more').click(function() {
    //   alert('hhhh');
    i++;
    var structure = $(`<div class="row w-100" id="new_row${i}">
                    <div class="col-md-5">
                    <div class="form-group">
                 <label>Stationary Requirement:</label>
                    <div class="input-group">
                        <select name="stationary_name[]" class="form-control" id="stationary_name"  required="required"> 
                        <option value="">Select Stationary Requirement</option>
                        <?php foreach ($stationary_data as $stationary) { ?> 
                                    <option value="<?php echo $stationary[
                                        "id"
                                    ]; ?>"><?php echo $stationary[
    "stationary_name"
]; ?></option> 
                                    <?php } ?>
                         </select>
                   </div>
                   </div>
                     </div>

                    <div class="col-md-4">
                             <div class="form-group ml-2">
                                <label>Quantity</label>
                                <div class="input-group">
                                <input type="text" class="form-control" name="stationary_qty[]" id="stationary_qty" placeholder="Enter Stationary Quantity"  required="required">
                              </div>
                              </div>
                      </div>
                      

                    <div class="col-md-3 mt-4 d-flex justify-content-center align-self-center">
                        <div class="form-group ml-2">
                        <label></label>
                            <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">X</button>
                        </div>
                    </div> 
              </div>`);
    $('#main_row').append(structure);

});


$(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#new_row' + button_id).remove();
});
</script>

<script>
$(document).ready(function() {
    $(".btn_follow").click(function() {
        // alert('jjjjjjjjjj');
        var btn_data = $(this).attr('attr-test');
        // alert(btn_data);
        // if(btn_data=='no'){
        $('.modal_follow').modal('show');
        // }
    });
});
</script>
<script>
$(document).ready(function() {
    $(".btn_follow_form").click(function() {
        // alert('jjjjjjjjjj');
        var btn_data = $(this).attr('attr-test');
        // alert(btn_data);
        // if(btn_data=='no'){
        $('.modal_follow_form').modal('show');
        // }
    });
});
</script>

<script>
$(".received_qty").each(function() {
    var received_qty = $(this).val();
    // alert(send_qty);
    if (received_qty != '') {
        $('.cancel_status').hide();
        $('#received').attr("disabled", true);
    } else {
        $('.cancel_status').show();
        $('#received').attr("disabled", false);
    }
});
</script>

<!-- jquery validation on add Booking Enquiry -->
<script>
jQuery.validator.addMethod("noSpace", function(value, element) {
    return value.indexOf(" ") < 0 && value != "";
}, "No space please and don't leave it empty");
</script>

<script>
$(document).ready(function() {
    $('#add_bookingenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            first_name: {
                required: true,
                noSpace: true,
            },
            last_name: {
                required: true,
                noSpace: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            wp_mobile_number: {
                // required: true,
                maxlength: 10,
                minlength: 10
            },
            email_address: {
                required: true,
                email: true,
                // regxp: '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
            },
            gender: {
                required: true,
            },
            tour_number: {
                required: true,
            },
            media_source_name: {
                required: true,
            },
            mrandmrs: {
                required: true,
            },
            enq_seat_count: {
                required: true,
            },
            other_tour_name: {
                required: function(element) {
                    var action = $("#tour_number").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }

        },

        messages: {
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            wp_mobile_number: {
                // required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email_address: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            gender: {
                required: "Please enter gender",
            },
            tour_number: {
                required: "Please enter tour number",
            },
            media_source_name: {
                required: "Please enter media source name",
            },
            mrandmrs: {
                required: "Please enter Mr / Mrs",
            },
            enq_seat_count: {
                required: "Please enter seat count",
            },
            other_tour_name: {
                required: "Please enter destination name",
            }


        }
    });

});
</script>
<!-- jquery validation on add Booking Enquiry -->

<!-- jquery validation on edit Booking Enquiry -->
<script>
$(document).ready(function() {

    $('#edit_bookingenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            first_name: {
                required: true,
                noSpace: true,
            },
            last_name: {
                required: true,
                noSpace: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            wp_mobile_number: {
                // required: true,
                maxlength: 10,
                minlength: 10
            },
            email_address: {
                required: true,
                email: true
            },
            gender: {
                required: true,
            },
            tour_number: {
                required: true,
            },
            media_source_name: {
                required: true,
            },
            mrandmrs: {
                required: true,
            },
            enq_seat_count: {
                required: true,
            },
            other_tour_name: {
                required: function(element) {
                    var action = $("#tour_number").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }

        },

        messages: {
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            wp_mobile_number: {
                // required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email_address: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            gender: {
                required: "Please enter gender",
            },
            tour_number: {
                required: "Please enter tour number",
            },
            media_source_name: {
                required: "Please enter media source name",
            },
            mrandmrs: {
                required: "Please enter Mr / Mrs",
            },
            enq_seat_count: {
                required: "Please enter seat count",
            },
            other_tour_name: {
                required: "Please enter destination name",
            }


        }
    });

});
</script>
<!-- jquery validation on edit Booking Enquiry -->

<script>
$(document).ready(function() {
    $('#add_request_code').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            stationary_type: {
                required: true,
            },
            image_name: {
                required: true,
            },

        },

        messages: {
            stationary_type: {
                required: "Please select stationary type",
            },
            image_name: {
                required: "Please select image",
            },


        }
    });

});
</script>

<script>
$(document).ready(function() {
    $('#edit_request_code').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            stationary_type: {
                required: true,
            },
            old_img_name: {
                required: true,
            },

        },

        messages: {
            stationary_type: {
                required: "Please select stationary type",
            },
            old_img_name: {
                required: "Please select image",
            },


        }
    });

});
</script>
<!-- jquery validation on add Booking Enquiry -->

<!-- jquery validation on add international Enquiry -->
<script>
$(document).ready(function() {

    $('#add_internationalenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            first_name: {
                required: true,
                noSpace: true,
            },
            last_name: {
                required: true,
                noSpace: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            wp_mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            email_address: {
                required: true,
                email: true
            },
            gender: {
                required: true,
            },
            packages: {
                required: true,
            },
            media_source_name: {
                required: true,
            },
            other_tour_name: {
                required: function(element) {
                    var action = $("#packages").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }

        },

        messages: {
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            wp_mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email_address: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            gender: {
                required: "Please enter gender",
            },
            packages: {
                required: "Please enter tour number",
            },
            media_source_name: {
                required: "Please enter media source name",
            },
            other_tour_name: {
                required: "Please enter destination name",
            }


        }
    });

});
</script>
<!-- jquery validation on add international Enquiry -->

<script>
$(document).ready(function() {
    var element = document.getElementById('other_tour_name_div');
    //var element2=document.getElementById('other_tour_name');
    var tno = $("#packages").val();
    if(tno != undefined){
    if (tno == 'Other') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
        //element2.value="";
    }
    }
});
</script>

<!-- jquery validation on edit international Enquiry -->
<script>
$(document).ready(function() {

    $('#edit_internationalenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            first_name: {
                required: true,
                noSpace: true,
            },
            last_name: {
                required: true,
                noSpace: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            wp_mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            email_address: {
                required: true,
                email: true
            },
            gender: {
                required: true,
            },
            packages: {
                required: true,
            },
            media_source_name: {
                required: true,
            },
            other_tour_name: {
                required: function(element) {
                    var action = $("#packages").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }

        },

        messages: {
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            wp_mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email_address: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            gender: {
                required: "Please enter gender",
            },
            packages: {
                required: "Please enter tour number",
            },
            media_source_name: {
                required: "Please enter media source name",
            },
            other_tour_name: {
                required: "Please enter destination name",
            }


        }
    });

});
</script>
<!-- jquery validation on edit international Enquiry -->

<!-- jquery validation on edit agent profile -->
<script>
$(document).ready(function() {

    $('#edit_agentprofile').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            city: {
                required: true,
            },
            booking_center: {
                required: true,
            },
            agent_name: {
                required: true,
            },
            mobile_number1: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            mobile_number2: {
                maxlength: 10,
                minlength: 10
            },
            email: {
                required: true,
                email: true
            },
            office_address: {
                required: true,
            },
            old_img_name: {
                required: true,
            }

        },

        messages: {
            city: {
                required: "Please enter city name",
            },
            booking_center: {
                required: "Please enter booking center",
            },
            agent_name: {
                required: "Please enter agent name",
            },
            mobile_number1: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            mobile_number2: {
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            office_address: {
                required: "Please enter office address",
            },
            old_img_name: {
                required: "Please upload image",
            }


        }
    });

});
</script>
<!-- jquery validation on edit agent profile -->

<!-- jquery validation on add profile(change password) -->
<script>
$(document).ready(function() {

    $('#add_changepassword').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            old_pass: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 6,
                notEqualTo: "#old_pass"
            },
            confirm_pass: {
                required: true,
                equalTo: "#new_password",
                minlength: 6
            }
        },

        messages: {
            old_pass: {
                required: "Please enter old password",
            },
            new_password: {
                required: "Please enter new password",
                minlength: "Please enter 6 digit or character length",
                notEqualTo: "New password and Old Password Same",
            },
            confirm_pass: {
                required: "Please enter confirm password",
                equalTo: "New password and Confirm Password can't match",
                minlength: "Please enter 6 digit or character length"
            }

        }
    });

});
</script>

<script>
$('#received').attr("disabled", true);

$('.received_qty').on('keyup', function() {

    var p = $(this).val();
    console.log(p);
    var currentRow = $(this).closest("tr");
    var col3 = currentRow.find("td:eq(2)").text();
    console.log(parseInt(col3));
    if (parseInt(p) <= parseInt(col3) && p > 0) {

        $(".received_qty").each(function() {
            var s_send = $(this).val();
            if (s_send != '') {
                $('#received').attr("disabled", false);
            } else {
                $('#received').attr("disabled", true);
            }
        });
    } else {
        $('#received').attr("disabled", true);
        alert('Please enter less or exact quantity sent');
    }
});
</script>
<!-- jquery validation on add profile(change password)  -->

<!-- todays notification count ------------------------------------------------------>

<script>
$(document).ready(function() {
    // var email = $('#agent_sess_id').val();  
    var agent_id = '1';
    //alert(email);
    if (agent_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>agent/dashboard/todays_check_total_notification_count",
            method: "POST",
            data: {
                agent_id: agent_id
            },
            success: function(todays_responce) {
                //  console.log(todays_responce);
                //  console.log('jjjjjjjjjjjjjjjjjjjj');
                if (todays_responce > 0) {
                    $('#todays_notification_count').append('' + todays_responce + '');
                    // $('#btn_agent').prop('disabled', true)

                } else {
                    $('#todays_notification_count').html('No Followup');
                    //  $('#btn_agent').prop('disabled', false)
                }
            }
        });
    }
});
</script>

<!-- todays notification count =------------------------------------------------>

<!-- total notification count ------------------------------------------------------>
<script>
$(document).ready(function() {
    // var email = $('#agent_sess_id').val();  
    var agent_id = '1';
    //alert(email);
    if (agent_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>agent/dashboard/check_total_notification_count",
            method: "POST",
            data: {
                agent_id: agent_id
            },
            success: function(responce) {
                //  console.log(responce);
                //  console.log('jjjjjjjjjjjjjjjjjjjj');
                if (responce > 0) {
                    $('#total_notification_count').append('' + responce + '');
                    // $('#btn_agent').prop('disabled', true)

                } else {
                    $('#total_notification_count').html('No Enquiry');
                    //  $('#btn_agent').prop('disabled', false)
                }
            }
        });
    }
});
</script>
<!-- total notification count =------------------------------------------------>


<!--Approve profile change request----------------->

<!-- Approve profile edit using ajax -->

<script>
$("#submit").click(function() {

    var temp_tbl_id = $("#submit").val();
    // alert(temp_tbl_id);

    if (temp_tbl_id != '') {
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>admin/profile_edit_req/approve',
            data: {
                request_id: temp_tbl_id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                console.log(response);
                if (response = true) {
                    window.location.href = "<?= base_url() ?>admin/profile_edit_req/index";

                } else {
                    alert('error');

                }
            },

        });
    }
    // else{
    //      $('.sendButton').attr("disabled", true);
    // }
});
</script>

<script type="text/javascript">
function CheckColors(val) {
    var element = document.getElementById('other_tour_name_div');
    var element2 = document.getElementById('other_tour_name');
    if (val == 'Other')
        element.style.display = 'block';
    else
        element.style.display = 'none';
    element2.value = "";
}
</script>

<!-- jquery validation on add booking basic info-->
<script>
$(document).ready(function() {

    $('#booking_basic_info').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            booking_office: {
                required: true,
            },
            boarding_office_location: {
                required: true,
            },
            mrandmrs: {
                required: true,
            },
            surname: {
                required: true,
                noSpace: true,
            },
            first_name: {
                required: true,
                noSpace: true,
            },
            middle_name: {
                required: true,
                noSpace: true,
            },
            tour_no: {
                required: true,
            },
            tour_date: {
                required: true,
            },
            hotel_type: {
                required: true,
            },
            seat_count: {
                required: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            media_source_name: {
                required: true,
            },
            gender: {
                required: true,
            }

        },

        messages: {
            booking_office: {
                required: "Please enter booking office",
            },
            boarding_office_location: {
                required: "Please select boarding office location",
            },
            mrandmrs: {
                required: "Please select Mr / Mrs",
            },
            surname: {
                required: "Please enter surname",
            },
            first_name: {
                required: "Please enter first name",
            },
            middle_name: {
                required: "Please enter middle name",
            },
            tour_no: {
                required: "Please select tour no",
            },
            tour_date: {
                required: "Please select tour date",
            },
            hotel_type: {
                required: "Please enter hotel type",
            },
            seat_count: {
                required: "Please enter seat count",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            media_source_name: {
                required: "Please select media source name",
            },
            gender: {
                required: "Please select gender",
            }
        }
    });

});
</script>
<!-- jquery validation on add booking basic info -->

<!-- jquery validation on add bus seat selection-->
<script>
$(document).ready(function() {

    $('#bus_seat_selection').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            boarding_office_location: {
                required: true,
            },
            tour_no: {
                required: true,
            },
            tour_date: {
                required: true,
            },
            hotel_type: {
                required: true,
            }
        },

        messages: {
            boarding_office_location: {
                required: "Please select boarding office location",
            },
            tour_no: {
                required: "Please select tour no",
            },
            tour_date: {
                required: "Please select tour date",
            },
            hotel_type: {
                required: "Please enter hotel type",
            }
        }
    });

});
</script>
<!-- jquery validation on add bus seat selection -->

<!-- jquery validation on add all traveller info-->
<script>
$(document).ready(function() {
    $('#all_traveller_info').validate({ 
        // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("td,span,div"))
        },
        rules: {
            area: {
                required: true,
            },
            all_traveller_state: {
                required: true,
            },
            all_traveller_district: {
                required: true,
            },
            all_traveller_taluka: {
                required: true,
            },
            all_traveller_city: {
                required: true,
            },
            pincode: {
                required: true,
            },
            email_id: {
                required: true,
            }
        },

        messages: {
            area: {
                required: "Please enter area",
            },
            all_traveller_state: {
                required: "Please select state",
            },
            all_traveller_district: {
                required: "Please select district",
            },
            all_traveller_taluka: {
                required: "Please select taluka",
            },
            all_traveller_city: {
                required: "Please enter city",
            },
            pincode: {
                required: "Please enter pincode",
            },
            email_id: {
                required: "Please enter email id",
            }
        }
    });
    $('[id^="mrandmrs"]').each(function() {
        // alert("cccccc");
        $(this).rules('add', {
            required: true,
            // minlength: 2,
            messages: {
                required: "Select mr&mrs",
                // minlength: "Enter at least {0} characters",
            }
        })
    });
    $('[id^="first_name"]').each(function() {
        $(this).rules('add', {
            required: true,
            // minlength: 2,
            messages: {
                required: "Enter first name",
                // minlength: "Enter at least {0} characters",
            }
        })
    });
    $('[id^="middle_name"]').each(function() {
        $(this).rules('add', {
            required: true,
            // minlength: 2,
            messages: {
                required: "Enter middle name",
                // minlength: "Enter at least {0} characters",
            }
        })
    });
    $('[id^="last_name"]').each(function() {
        $(this).rules('add', {
            required: true,
            // minlength: 2,
            messages: {
                required: "Enter last name",
                // minlength: "Enter at least {0} characters",
            }
        })
    });
    $('[id^="age"]').each(function() {
        $(this).rules('add', {
            required: true,
            // minlength: 2,
            messages: {
                required: "Enter age",
                // minlength: "Enter at least {0} characters",
            }
        })
    });

    $('[id^="relation"]').each(function() {
        $(this).rules('add', {
            required: true,
            // minlength: 2,
            messages: {
                required: "Enter relation",
                // minlength: "Enter at least {0} characters",
            }
        })
    });

    $('[name^="for_credentials[]"]').change(function () {
        // alert(this.checked);
    if (this.checked) {
        var currentRow = $(this).closest("tr");
        var col3 = currentRow.find('input[name="mobile_number[]"]');
        col3.rules('add', {
            required: true,
            messages: {
                required: "Mobile number is required",
            }
        });
    }
    });

});




</script>
<!-- jquery validation on add all traveller info -->

<!-- bus seat selection form  boarding office location start -->
<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php //echo base_url(); ?>";

// $(document).ready(function() {
//     // if (enq_id != '') {
//         var did = $('#tour_no').val();
//         // var enq_id = $('#domestic_enquiry_id').val();
//         //alert(enq_id); 
//         // AJAX request
//         $.ajax({
//             url: '<?//= base_url() ?>agent/booking_basic_info/getBlock',
//             method: 'post',
//             data: {
//                 did: did
//             },
//             dataType: 'json',
//             success: function(response) {
//                 console.log(response);

//                 $('#boarding_office_location').find('option').not(':first').remove();

//                 $.each(response, function(index, data) {
//                     $('#boarding_office_location').append('<option value="' + data['id'] +
//                         '">' + data['booking_center'] + '</option>');
//                 });
//                 tour_dates();

//             }
//         });
//     // }
// });

// district change
$('#tour_no').change(function() {
    var did = $(this).val();
    //   alert(did); 
    // AJAX request
    $.ajax({
        url: '<?= base_url() ?>agent/booking_basic_info/getBlock',
        method: 'post',
        data: {
            did: did
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);

            $('#boarding_office_location').find('option').not(':first').remove();

            $.each(response, function(index, data) {
                $('#boarding_office_location').append('<option value="' + data['id'] +
                    '">' + data['booking_center'] + '</option>');
            });


        }
    });
    tour_dates();
});
</script>

<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url(); ?>";

//   $(document).ready(function(){

// district change
function tour_dates() {
    var did = $("#tour_no").val();
    // alert(did_tour); 
    // AJAX request
    $.ajax({
        url: '<?= base_url() ?>agent/booking_basic_info/get_tourdate',
        method: 'post',
        data: {
            did: did
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);

            $('#tour_date').find('option').not(':first').remove();

            $.each(response, function(index, data) {
                $('#tour_date').append('<option value="' + data['id'] + '">' + data[
                    'journey_date'] + '</option>');
            });
        }
    });
}
//  });
</script>
<!-- booking bus seat selection boarding office location start -->

<!-- booking all traveller info (state,district,taluka) start -->
<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url(); ?>";

$(document).ready(function() {

    // district change
    $('#all_traveller_state').change(function() {
        var did = $(this).val();
        //   alert(did); 
        // AJAX request
        $.ajax({
            url: '<?= base_url() ?>agent/all_traveller_info/get_district',
            method: 'post',
            data: {
                did: did
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#all_traveller_district').find('option').not(':first').remove();

                $.each(response, function(index, data) {
                    $('#all_traveller_district').append('<option value="' + data[
                        'id'] + '">' + data['district'] + '</option>');
                });

            }
        });
    });
});
</script>

<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url(); ?>";
$(document).ready(function() {

    // district change
    $('#all_traveller_district').change(function(){
      var did = $(this).val();
    //   alert(did); 
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>agent/all_traveller_info/get_taluka',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#all_traveller_taluka').find('option').not(':first').remove();
       
          $.each(response,function(index,data){       
             $('#all_traveller_taluka').append('<option value="'+data['id']+'">'+data['taluka']+'</option>');
          });
         
        }
     });
   });
 });
 </script>
 <script>
    $('#all_traveller_district').change(function() {
        var did = $(this).val();
        //   alert(did); 
        // AJAX request
        $.ajax({
            url: '<?= base_url() ?>agent/all_traveller_info/get_taluka',
            method: 'post',
            data: {
                did: did
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#all_traveller_taluka').find('option').not(':first').remove();

                $.each(response, function(index, data) {
                    $('#all_traveller_taluka').append('<option value="' + data[
                        'id'] + '">' + data['taluka'] + '</option>');
                });

            }
        });
    });

</script>


<!-- booking all traveller info (state,district,taluka) start -->

<!-- bus seat selection form  boarding office location start -->
<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url(); ?>";

$(document).ready(function() {

    // district change
    $('#inter_tour_no').change(function() {
        var did = $(this).val();
        //   alert(did); 
        // AJAX request
        $.ajax({
            url: '<?= base_url() ?>agent/inter_bus_seat_selection/inter_getBlock',
            method: 'post',
            data: {
                did: did
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                $('#inter_boarding_office_location').find('option').not(':first').remove();

                $.each(response, function(index, data) {
                    $('#inter_boarding_office_location').append('<option value="' +
                        data['id'] + '">' + data['booking_center'] + '</option>'
                        );
                });
                inter_tour_dates();
            }
        });
    });
});
</script>

<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url(); ?>";

//   $(document).ready(function(){

// district change
function inter_tour_dates() {
    var did = $("#inter_tour_no").val();
    //    alert(did); 
    // AJAX request
    $.ajax({
        url: '<?= base_url() ?>agent/inter_bus_seat_selection/inter_get_tourdate',
        method: 'post',
        data: {
            did: did
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);

            $('#inter_tour_date').find('option').not(':first').remove();

            $.each(response, function(index, data) {
                // alert(data['id']);
                $('#inter_tour_date').append('<option value="' + data['id'] + '">' + data[
                    'journey_date'] + '</option>');
            });
        }
    });
}
//  });
</script>
<!-- booking bus seat selection boarding office location start -->

<!-- jquery validation on add international Enquiry -->
<script>
$(document).ready(function() {

    $('#add_internationalenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            mrandmrs: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            email_address: {
                required: true,
                email: true
            },
            gender: {
                required: true,
            },
            packages: {
                required: true,
            },
            media_source_name: {
                required: true,
            },
            enq_seat_count: {
                required: true,
            }

        },

        messages: {
            mrandmrs: {
                required: "Please select Mr / Mrs",
            },
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email_address: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            gender: {
                required: "Please enter gender",
            },
            packages: {
                required: "Please enter tour number",
            },
            media_source_name: {
                required: "Please enter media source name",
            },
            enq_seat_count: {
                required: "Please enter seat count",
            }


        }
    });

});
</script>
<!-- jquery validation on add international Enquiry -->

<!-- jquery validation on edit international Enquiry -->
<script>
$(document).ready(function() {

    $('#edit_internationalenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            mrandmrs: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            mobile_number: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            email_address: {
                required: true,
                email: true
            },
            gender: {
                required: true,
            },
            packages: {
                required: true,
            },
            media_source_name: {
                required: true,
            },
            enq_seat_count: {
                required: true,
            }

        },

        messages: {
            mrandmrs: {
                required: "Please select Mr / Mrs",
            },
            first_name: {
                required: "Please enter first name",
            },
            last_name: {
                required: "Please enter last name",
            },
            mobile_number: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            email_address: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            gender: {
                required: "Please enter gender",
            },
            packages: {
                required: "Please enter tour number",
            },
            media_source_name: {
                required: "Please enter media source name",
            },
            enq_seat_count: {
                required: "Please enter seat count",
            }


        }
    });

});
</script>
<!-- jquery validation on edit international Enquiry -->


<!-- Bus Seat Selection in that multiply 2 no script -->
<script>
function firstclass() {
    var x = parseInt(document.getElementById("first_class_rate").value);
    var y = parseInt(document.getElementById("first_class_count").value)
    document.getElementById("first_class_costing").value = x * y;
}

function economyclass() {
    var x = parseInt(document.getElementById("economy_class_rate").value);
    var y = parseInt(document.getElementById("economy_class_count").value)
    document.getElementById("economy_class_costing").value = x * y;
}

function generalclass() {
    var x = parseInt(document.getElementById("general_class_rate").value);
    var y = parseInt(document.getElementById("general_class_count").value)
    document.getElementById("general_class_costing").value = x * y;
}


//addition
function totalamount_one() {
    var x = parseInt(document.getElementById("first_class_costing").value);
    document.getElementById("total_costing").value = x;;
}

function totalamount_two() {
    var x = parseInt(document.getElementById("first_class_costing").value);
    var y = parseInt(document.getElementById("economy_class_costing").value)
    document.getElementById("total_costing").value = x + y;;
}

function totalamount_three() {
    var x = parseInt(document.getElementById("first_class_costing").value);
    var y = parseInt(document.getElementById("economy_class_costing").value);
    var z = parseInt(document.getElementById("general_class_costing").value)
    document.getElementById("total_costing").value = x + y + z;;
}
</script>

<!-- ======domestic bus seat selection ==================================================== -->

<script>
$(document).ready(function() {
    $("#booknow_submit").prop('disabled', true);
    var f_count = '';
    var e_count = '';
    var g_count = '';


    $(".f_seatcount").on('keyup', function() {
        var f_count = $("#first_class_count").val()
        var e_count = $("#economy_class_count").val();
        var g_count = $("#general_class_count").val();
        if (f_count != '') {
            var ftotal = f_count;
        } else {
            var ftotal = 0;
        }
        if (e_count != '') {
            var etotal = e_count;
        } else {
            var etotal = 0;
        }
        if (g_count != '') {
            var gtotal = g_count;
        } else {
            var gtotal = 0;
        }
        var final_total = parseInt(ftotal) + parseInt(etotal) + parseInt(gtotal);


        $("#total_seatcount").val(final_total);

        var inputString_one = $("#seat_count").val();
        if (final_total != inputString_one) {
            $("#booknow_submit").prop('disabled', true)
            $("#back-button_seat_type").prop('disabled', true)
        } else {
            $("#booknow_submit").prop('disabled', false)
            $("#back-button_seat_type").prop('disabled', false)
        }
    });
    // alert(inputString);
    // alert(inputString_one);
});
</script>
<script>
$(document).ready(function() {
    $("#edit_booknow_submit").prop('disabled', true);
    var f_count = '';
    var e_count = '';
    var g_count = '';


    $(".edit_f_seatcount").on('keyup', function() {
        var f_count = $("#first_class_count").val()
        var e_count = $("#economy_class_count").val();
        var g_count = $("#general_class_count").val();
        if (f_count != '') {
            var ftotal = f_count;
        } else {
            var ftotal = 0;
        }
        if (e_count != '') {
            var etotal = e_count;
        } else {
            var etotal = 0;
        }
        if (g_count != '') {
            var gtotal = g_count;
        } else {
            var gtotal = 0;
        }
        var final_total = parseInt(ftotal) + parseInt(etotal) + parseInt(gtotal);


        $("#total_seatcount").val(final_total);

        var inputString_one = $("#seat_count").val();
        if (final_total != inputString_one) {
            $("#edit_booknow_submit").prop('disabled', true)
        } else {
            $("#edit_booknow_submit").prop('disabled', false)
        }
    });
    // alert(inputString);
    // alert(inputString_one);
});
</script>
<script>
$(document).ready(function() {
    $("#edit_booknow_submit").prop('disabled', true);
    var f_count = '';
    var e_count = '';
    var g_count = '';

    var f_count = $("#first_class_count").val()
    var e_count = $("#economy_class_count").val();
    var g_count = $("#general_class_count").val();
    if (f_count != '') {
        var ftotal = f_count;
    } else {
        var ftotal = 0;
    }
    if (e_count != '') {
        var etotal = e_count;
    } else {
        var etotal = 0;
    }
    if (g_count != '') {
        var gtotal = g_count;
    } else {
        var gtotal = 0;
    }
    var final_total = parseInt(ftotal) + parseInt(etotal) + parseInt(gtotal);


    $("#total_seatcount").val(final_total);

    var inputString_one = $("#seat_count").val();
    if (final_total != inputString_one) {
        $("#edit_booknow_submit").prop('disabled', true)
    } else {
        $("#edit_booknow_submit").prop('disabled', false)
    }

    // alert(inputString);
    // alert(inputString_one);
});
</script>
<!-- ======domestic bus seat selection ==================================================== -->


<!-- add all traveller info image and seatcount count -->

<script>
//passbook_img doc   
var count = $('#seat_count_add').val();
//for(var i=1; i<count; i++){    
function encodeImgtoBase64traveller_img(element) {
    var img_id = $(element).attr('attr_id');
    var document_file_traveller_img = 'document_file_traveller_img' + img_id;
    var imagePreview_traveller_img = 'imagePreview_traveller_img' + img_id;
    var image_name = 'image_name' + img_id;


    //  alert(image_name);
    var fileCheckpassbook_img = '';
    $("#" + document_file_traveller_img).val('');
    document.getElementById(imagePreview_traveller_img).innerHTML = '';
    $("label").remove('.error');
    var fileInputtraveller_img = document.getElementById(image_name);
    var filePathtraveller_img = fileInputtraveller_img.value;
    var allowedExtensionstraveller_img = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if (!allowedExtensionstraveller_img.exec(filePathtraveller_img)) {
        fileChecktraveller_img = fileInputtraveller_img.files[0];
        if (fileChecktraveller_img) {
            console.log('eeeeeeeeerrrrrrrrrrrrr');
            fileInputtraveller_img.value = '';
            return false;
        }
    } else {
        var file = fileInputtraveller_img.files[0];
        if (file.size > 2000005) {
            console.log('sssiiizzeeeee');
            fileInputtraveller_img.value = '';
            $('#imagePreview_traveller_img').empty();
            return false;
        }
        //Image preview                    
        if (fileInputtraveller_img.files && fileInputtraveller_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var allowedExtensionstraveller_imgNew = /(\.pdf)$/i;
                if (!allowedExtensionstraveller_imgNew.exec(filePathtraveller_img)) {
                    document.getElementById(imagePreview_traveller_img).innerHTML = '<img src="' + e.target.result +
                        '"/>';
                }
            };
            reader.readAsDataURL(fileInputtraveller_img.files[0]);
        }
    }
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#" + document_file_traveller_img).val(reader.result);
    }
    reader.readAsDataURL(img);
}
//);
//}
</script>
<script>
//passbook_img doc   
var count = $('#seat_count_edit').val();
//  alert(count); 
//for(var i=1; i<count; i++){    
function encodeImgtoBase64traveller_img_edit(element) {
    // alert('hiiiiii');
    var img_id = $(element).attr('attr_id');
    var document_file_traveller_img = 'document_file_traveller_img' + img_id;
    var imagePreview_traveller_img = 'imagePreview_traveller_img' + img_id;
    var image_name = 'image_name' + img_id;
    //alert(image_name);
    var fileCheckpassbook_img = '';
    $("#" + document_file_traveller_img).val('');
    document.getElementById(imagePreview_traveller_img).innerHTML = '';
    $("label").remove('.error');
    var fileInputtraveller_img = document.getElementById(image_name);
    // alert(fileInputtraveller_img);
    var filePathtraveller_img = fileInputtraveller_img.value;
    var allowedExtensionstraveller_img = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if (!allowedExtensionstraveller_img.exec(filePathtraveller_img)) {
        // alert('yesssssssssssss');
        fileChecktraveller_img = fileInputtraveller_img.files[0];
        if (fileChecktraveller_img) {
            console.log('eeeeeeeeerrrrrrrrrrrrr');
            fileInputtraveller_img.value = '';
            return false;
        }
    } else {
        // alert('Noooooooooooooooooooo');
        var file = fileInputtraveller_img.files[0];
        if (file.size > 2000005) {
            console.log('sssiiizzeeeee');
            fileInputtraveller_img.value = '';
            $('#imagePreview_traveller_img').empty();
            return false;
        }
        //Image preview                    
        if (fileInputtraveller_img.files && fileInputtraveller_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var allowedExtensionstraveller_imgNew = /(\.pdf)$/i;
                if (!allowedExtensionstraveller_imgNew.exec(filePathtraveller_img)) {
                    document.getElementById(imagePreview_traveller_img).innerHTML = '<img src="' + e.target.result +
                        '"/>';
                }
            };
            reader.readAsDataURL(fileInputtraveller_img.files[0]);
        }
    }
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#" + document_file_traveller_img).val(reader.result);
    }
    reader.readAsDataURL(img);
}
//);
//}
</script>
<!-- add all traveller info image and seatcount count -->

<script>
//passbook_img doc
var count = $('#seat_count_add').val();
//for(var i=1; i<count; i++){
function encodeImgtoBase64aadhar_img(element) {
    var img_id = $(element).attr('attr_id');
    var document_file_aadhar_img = 'document_file_aadhar_img' + img_id;
    var imagePreview_aadhar_img = 'imagePreview_aadhar_img' + img_id;
    var aadhar_image_name = 'aadhar_image_name' + img_id;
    //alert(image_name);

    //  alert(image_name);
    var fileCheckpassbook_img = '';
    $("#" + document_file_aadhar_img).val('');
    document.getElementById(imagePreview_aadhar_img).innerHTML = '';
    $("label").remove('.error');
    var fileInputaadhar_img = document.getElementById(aadhar_image_name);
    //alert(fileInputaadhar_img);
    var filePathaadhar_img = fileInputaadhar_img.value;
    // alert(filePathaadhar_img);
    var allowedExtensionsaadhar_img = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if (!allowedExtensionsaadhar_img.exec(filePathaadhar_img)) {
        fileCheckaadhar_img = fileInputaadhar_img.files[0];
        // alert(fileCheckaadhar_img);
        if (fileCheckaadhar_img) {
            console.log('eeeeeeeeerrrrrrrrrrrrr');
            fileInputaadhar_img.value = '';
            return false;
        }
    } else {
        var file = fileInputaadhar_img.files[0];
        if (file.size > 2000005) {
            console.log('sssiiizzeeeee');
            fileInputaadhar_img.value = '';
            $('#imagePreview_aadhar_img').empty();
            return false;
        }
        //Image preview
        if (fileInputaadhar_img.files && fileInputaadhar_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var allowedExtensionsaadhar_imgNew = /(\.pdf)$/i;
                if (!allowedExtensionsaadhar_imgNew.exec(filePathaadhar_img)) {
                    document.getElementById(imagePreview_aadhar_img).innerHTML = '<img src="' + e.target.result +
                        '"/>';

                }
            };
            reader.readAsDataURL(fileInputaadhar_img.files[0]);
        }
    }
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#" + document_file_aadhar_img).val(reader.result);
    }
    reader.readAsDataURL(img);
}
//);
//}
</script>

<script>
//passbook_img doc
var count = $('#seat_count_edit').val();
//  alert(count); 
//for(var i=1; i<count; i++){
function encodeImgtoBase64aadhar_img_edit(element) {
    // alert('hiiiiii');
    var img_id = $(element).attr('attr_id');
    var document_file_aadhar_img = 'document_file_aadhar_img' + img_id;
    var imagePreview_aadhar_img = 'imagePreview_aadhar_img' + img_id;
    var aadhar_image_name = 'aadhar_image_name' + img_id;
    //alert(image_name);
    var fileCheckpassbook_img = '';
    $("#" + document_file_aadhar_img).val('');
    document.getElementById(imagePreview_aadhar_img).innerHTML = '';
    $("label").remove('.error');
    var fileInputaadhar_img = document.getElementById(aadhar_image_name);
    // alert(fileInputaadhar_img);
    var filePathaadhar_img = fileInputaadhar_img.value;
    var allowedExtensionsaadhar_img = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if (!allowedExtensionsaadhar_img.exec(filePathaadhar_img)) {
        // alert('yesssssssssssss');
        fileCheckaadhar_img = fileInputaadhar_img.files[0];
        if (fileCheckaadhar_img) {
            console.log('eeeeeeeeerrrrrrrrrrrrr');
            fileInputaadhar_img.value = '';
            return false;
        }
    } else {
        // alert('Noooooooooooooooooooo');
        var file = fileInputaadhar_img.files[0];
        if (file.size > 2000005) {
            console.log('sssiiizzeeeee');
            fileInputaadhar_img.value = '';
            $('#imagePreview_aadhar_img').empty();
            return false;
        }
        //Image preview
        if (fileInputaadhar_img.files && fileInputaadhar_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var allowedExtensionsaadhar_imgNew = /(\.pdf)$/i;
                if (!allowedExtensionsaadhar_imgNew.exec(filePathaadhar_img)) {
                    document.getElementById(imagePreview_aadhar_img).innerHTML = '<img src="' + e.target.result +
                        '"/>';
                }
            };
            reader.readAsDataURL(fileInputaadhar_img.files[0]);
        }
    }
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#" + document_file_aadhar_img).val(reader.result);
    }
    reader.readAsDataURL(img);
}
//);
//}
</script>

<!-- inter all traveller info  add code 16-03-2023======================================== -->
<script>
$(document).ready(function() {
    // $('#traveller_table .remove_row').remove();
    var count = $('#inter_seat_count_add').val();

    //alert('kkkkkk');
    //$('#add_more').click(function() {
    //alert(count);
    //i++;
    for (var i = 1; i < count; i++) {
        var img_count = parseInt(i) + 1;

        // alert(i);
        var structure = $(` <style>
                        img{
                        width:25% !important;
                        height:25% !important;
                    }
                    .chaudhary_yatra_logo{
                        width:100% !important;
                    }
                    table{
                    table-layout: fixed;
                    display: block;
                    overflow: auto;
                    }
                    .for_row_set .row_set{
                        width:135px;

                    }
                    .for_row_set .row_set1{
                        width:70px;

                    }
                    </style>
                    <tr>
                                <td>
                                <input type="radio" id="yes" name="for_credentials[]" value="<?php echo $all_traveller_info_value['id']; ?>" <?php if(isset($all_traveller_info_value['for_credentials'])){if($all_traveller_info_value['for_credentials']=='yes'){echo "checked";}} ?>>
                          
                                </td>
                                    <td>
                                        <select class="select_css row_set1" name="mrandmrs[]" id="mrandmrs">
                                            <option value="">select Mr / Mrs</option>
                                            <?php
                                            foreach($courtesy_titles_data as $courtesy_titles_data_info){ 
                                            ?>
                                            <option value="<?php echo $courtesy_titles_data_info['id'];?>" <?php if(isset($all_traveller_info_value['mr/mrs'])){if($courtesy_titles_data_info['id'] == $all_traveller_info_value['mr/mrs']) {echo 'selected';}}?>><?php echo $courtesy_titles_data_info['courtesy_titles_name'];?></option>
                                            
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="first_name[]" id="first_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                       
                                    </td>
                                    <td>
                                        <input type="text" class="form-contro row_set" name="middle_name[]" id="middle_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '');">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="last_name[]" id="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '');">
                                    </td>
                                    <td>
                                        <input type="date" class="form-control row_set" name="dob[]" id="dob" max="<?php echo date(
                                            "Y-m-d"
                                        ); ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="age[]" id="age" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </td>
                                    <td>
                                        <select class="select_css row_set" name="relation[]" id="relation">
                                            <option value="">Select</option>
                                            <?php foreach (
                                                $relation_data
                                                as $relation_data_info
                                            ) { ?>
                                            <option value="<?php echo $relation_data_info[
                                                "id"
                                            ]; ?>"><?php echo $relation_data_info["relation"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control row_set" name="anniversary_date[]" id="anniversary_date" max="<?php echo date(
                                            "Y-m-d"
                                        ); ?>" value="<?php if (!empty($all_traveller_info_value)) {echo $all_traveller_info_value["anniversary_date"];} ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" maxlength="10" minlength="10" name="mobile_number[]" id="mobile_number" value="<?php if (
                                            !empty($all_traveller_info_value)
                                        ) {
                                            echo $all_traveller_info_value[
                                                "mobile_number"
                                            ];
                                        } ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="last_name[]" id="last_name">
                                    </td>
                                    
                                    <td>
                                    <input type="file" name="image_name[]" id="image_name` + img_count +
            `" onchange="encodeImgtoBase64traveller_img(this)" attr_id="` + img_count + `">

                                    <input type="hidden" id="document_file_traveller_img` + img_count + `" name="document_file_traveller_img[]"
                                        value="">
                                        <div id="imagePreview_traveller_img` + img_count + `" class="mt-2 img_size_cast">
                                            <img class="traveller_img" src="<?php echo base_url(); ?>assets/uploads/inter_traveller/" width="100%" />
                                        </div>
                                    </td>
                                    <td>
                                        <input type="file" name="aadhar_image_name[]" id="aadhar_image_name` +
            img_count + `" onchange="encodeImgtoBase64aadhar_img(this)" attr_id="` + img_count + `">
    
                                        <input type="hidden" id="document_file_aadhar_img` + img_count + `" name="document_file_aadhar_img[]"
                                            value="">
                                            <div id="imagePreview_aadhar_img` + img_count + `" class="mt-2 img_size_cast">
                                                <img src="<?php echo base_url(); ?>assets/uploads/traveller_aadhar/" width="100%" />
                                            </div>
                                    </td>
                                    <td>
                                        <button type="button" id="resetBtn" class="btn btn-danger resetBtn" name="Clear" value="Reset">Delete</button>
                                    </td>

                                </tr>`);


        //alert(i);                       
        $('#inter_traveller_table_add').append(structure);
    }

});
</script>

<!-- <script>
$('.resetBtn').click(function() {
    // alert('hiiii'); 

    var currentRow = $(this).closest("tr");
    // alert(currentRow); 
    // console.log(currentRow);

    currentRow.find("td:eq(1) select").val('');
    currentRow.find("td:eq(2) input").val('');
    currentRow.find("td:eq(3) input").val('');
    currentRow.find("td:eq(4) input").val('');
    currentRow.find("td:eq(5) #dob").val('');
    currentRow.find("td:eq(6) #age").val('');
    currentRow.find("td:eq(7) select").val('');
    currentRow.find("td:eq(8) #anniversary_date").val('');
    // currentRow.find("td:eq(9) select").val(''); 
    currentRow.find("td:eq(9) #mobile_number").val('');
    currentRow.find("td:eq(10) input:file").val('');
    currentRow.find("td:eq(10) .img_size_cast").empty();
    currentRow.find("td:eq(11) input:file").val('');
    currentRow.find("td:eq(11) .img_size_cast").empty();
    // alert(col1);

     // Remove the row
     currentRow.remove();

});
</script> -->

<script>
$('.resetBtn').click(function() {
    var currentRow = $(this).closest("tr");
    var rowID = currentRow.find('input[name="row_id[]"]').val();

    if (rowID != '') {
        // Display a confirmation dialog
        if (confirm('Are you sure you want to delete this record? If this record is deleted, it will not get back and the seat count will also be reduced.')) {
            var seat_count = $('#seat_count_add').val();
            var domestic_enquiry_id = $('#domestic_enquiry_id').val();

            $.ajax({
                type: 'POST', 
                url: '<?=base_url()?>agent/all_traveller_info/row_delete', 
                data: {
                    rowID: rowID,
                    seat_count: seat_count,
                    domestic_enquiry_id: domestic_enquiry_id
                },
                success: function(response) {
                    if (response == 'true') {
                        currentRow.remove();
                        location.reload();
                    } else {
                        alert('Something Went Wrong. Failed to delete the row. Please try again.');
                    }
                },
                error: function() {
                    alert('Failed to delete the row. Please try again.');
                }
            });
        }
    }
});
</script>


<script>
//passbook_img doc   
var count = $('#inter_seat_count_add').val();
//for(var i=1; i<count; i++){    
function encodeImgtoBase64traveller_img(element) {
    var img_id = $(element).attr('attr_id');
    var document_file_traveller_img = 'document_file_traveller_img' + img_id;
    var imagePreview_traveller_img = 'imagePreview_traveller_img' + img_id;
    var image_name = 'image_name' + img_id;


    //  alert(image_name);
    var fileCheckpassbook_img = '';
    $("#" + document_file_traveller_img).val('');
    document.getElementById(imagePreview_traveller_img).innerHTML = '';
    $("label").remove('.error');
    var fileInputtraveller_img = document.getElementById(image_name);
    var filePathtraveller_img = fileInputtraveller_img.value;
    var allowedExtensionstraveller_img = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if (!allowedExtensionstraveller_img.exec(filePathtraveller_img)) {
        fileChecktraveller_img = fileInputtraveller_img.files[0];
        if (fileChecktraveller_img) {
            console.log('eeeeeeeeerrrrrrrrrrrrr');
            fileInputtraveller_img.value = '';
            return false;
        }
    } else {
        var file = fileInputtraveller_img.files[0];
        if (file.size > 2000005) {
            console.log('sssiiizzeeeee');
            fileInputtraveller_img.value = '';
            $('#imagePreview_traveller_img').empty();
            return false;
        }
        //Image preview                    
        if (fileInputtraveller_img.files && fileInputtraveller_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var allowedExtensionstraveller_imgNew = /(\.pdf)$/i;
                if (!allowedExtensionstraveller_imgNew.exec(filePathtraveller_img)) {
                    document.getElementById(imagePreview_traveller_img).innerHTML = '<img src="' + e.target.result +
                        '"/>';
                }
            };
            reader.readAsDataURL(fileInputtraveller_img.files[0]);
        }
    }
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#" + document_file_traveller_img).val(reader.result);
    }
    reader.readAsDataURL(img);
}
//);
//}
</script>
<!-- ======================================================================= -->

<!-- booking basic info hotel type dependency -->
<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url(); ?>";

$(document).ready(function() {


    $('#tour_no').on('change', function() {
        var did = $(this).val();
        //    //alert(did); 
        // AJAX request
        $.ajax({
            url: '<?= base_url() ?>agent/booking_basic_info/get_hotel_type',
            method: 'post',
            data: {
                did: did
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // var p = response['mobile_number1'];
                $('#hotel_type').val(response['hotel_type_name']);
            }
        });
    });
});
</script>




<!-- Vivek new booking secound last form new calculation  -->
<script>
function adult_count() {
    var a = parseInt(document.getElementById("seperate_seat").value);
    document.getElementById("total_seperate_seat").value = a;
}

function child_separate_count() {
    var b = parseInt(document.getElementById("child_seperate_seat").value);
    document.getElementById("total_child_seperate_seat").value = b;
}

function child_share_count() {
    var v = document.getElementById('two_child_share_one_seat').value;
    if (v % 2 == 0) {
        // alert("Even");
        var x = v / 2;
        document.getElementById("total_two_child_share_one_seat").value = x;
        document.getElementById('booknow_submit').disabled = false;
    } else {
        alert("Please Enter Only Even Number Count (e.g.-2,4,6,8,etc.)");
        document.getElementById('booknow_submit').disabled = true;
    }
}

function child_noseat_count() {
    var c = parseInt(document.getElementById("child_no_seat_needed").value);
    var x = c - c;
    document.getElementById("total_child_no_seat_needed").value = x;
}

function child_no_seat_count() {
    var d = parseInt(document.getElementById("child_noo_seat_needed").value);
    var y = d - d;
    document.getElementById("total_child_noo_seat_needed").value = y;
}
</script>

<!-- Total Traveller Count -->
<script>
$(document).ready(function() {
    
    $("#booknow_submit").prop('disabled', true);
    var f_count = '';
    var e_count = '';
    var g_count = '';
    var m_count = '';
    var l_count = '';

    $(".seattype_count").on('keyup', function() {
        var f_count = $("#seperate_seat").val();
        var e_count = $("#child_seperate_seat").val();
        var g_count = $("#two_child_share_one_seat").val();
        var m_count = $("#child_no_seat_needed").val();
        var l_count = $("#child_noo_seat_needed").val();
        if (f_count != '') {
            var ftotal = f_count;
        } else {
            var ftotal = 0;
        }
        if (e_count != '') {
            var etotal = e_count;
        } else {
            var etotal = 0;
        }
        if (g_count != '') {
            var gtotal = g_count;
        } else {
            var gtotal = 0;
        }
        if (m_count != '') {
            var mtotal = m_count;
        } else {
            var mtotal = 0;
        }
        if (l_count != '') {
            var ltotal = l_count;
        } else {
            var ltotal = 0;
        }
        var final_total = parseInt(ftotal) + parseInt(etotal) + parseInt(gtotal) + parseInt(mtotal) +
            parseInt(ltotal);

        $("#total_busseattype").val(final_total);

        // ----------This calculation for addition for adult & 90 seat of bus-------
        var seperate_seat = 0;
        var child_seperate_seat = 0;
        var total_adult_90_bus = 0;

        seperate_seat = $("#seperate_seat").val();
        child_seperate_seat = $("#child_seperate_seat").val();

        if (seperate_seat > 0) {
            seperate_seat = $("#seperate_seat").val();
        } else {
            seperate_seat = 0;
        }
        // alert(seperate_seat+'seperate_seattttttttt');

        if (child_seperate_seat > 0) {
            child_seperate_seat = $("#child_seperate_seat").val();
        } else {
            child_seperate_seat = 0;
        }
        // alert(child_seperate_seat+'90seat_seattttttttt');

        total_adult_90_bus = parseInt(seperate_seat) + parseInt(child_seperate_seat);

        $("#total_adult_90_bus").val(total_adult_90_bus);
        // ----------Above calculation for addition for adult & 90 seat of bus END-------

        var inputString_one = $("#seat_count").val();

        var travaller_room_count = $("#total_travaller_count").val();
        // ---fetch from roomcalculation
        var total_adult_90_bus_seat = $("#total_adult_90_bus").val();
        var total_adult_90 = $("#total_adult_90").val();

        var total_agewise_cal_60 = $("#total_agewise_cal_60").val();
        var total_agewise_cal_40 = $("#total_agewise_cal_40").val();
        var total_agewise_cal_0 = $("#total_agewise_cal_0").val();

        // ---------------------------------
        var total_adult_60 = 0;
        var total_adult_40 = 0;
        var total_adult_0 = 0;
        total_adult_60 = $("#two_child_share_one_seat").val();
        total_adult_40 = $("#child_no_seat_needed").val();
        total_adult_0 = $("#child_noo_seat_needed").val();
        // alert(total_adult_0);
        // alert(travaller_room_count);
        // alert(final_total);

        // var total_agewise_cal_90 = 0;
        // var total_agewise_cal_60 = 0;
        // var total_agewise_cal_40 = 0;
        // var total_agewise_cal_0 = 0;

        total_agewise_cal_adult = $("#total_agewise_cal_adult").val();
        var total_adult_bus = $("#total_seperate_seat").val();

        total_agewise_cal_90 = $("#total_agewise_cal_90").val();
        var total_90_bus = $("#child_seperate_seat").val();
        
        total_agewise_cal_60 = $("#total_agewise_cal_60").val();
        var total_adult_60 = $("#two_child_share_one_seat").val();

        total_agewise_cal_40 = $("#total_agewise_cal_40").val();
        var total_adult_40 = $("#child_no_seat_needed").val();

        total_agewise_cal_0 = $("#total_agewise_cal_0").val();
        var total_adult_0 = $("#child_noo_seat_needed").val();

        // if (final_total == inputString_one && g_count % 2 == 0 && total_agewise_cal_adult ==
        //     total_adult_bus && total_agewise_cal_90 == total_90_bus && total_agewise_cal_60 ==
        //     total_adult_60 && total_agewise_cal_40 == total_adult_40 && total_agewise_cal_0 ==
        //     total_adult_0)

        if (final_total == inputString_one && g_count % 2 == 0 ) {
            // if(final_total == inputString_one && g_count % 2 == 0){
            $("#booknow_submit").prop('disabled', false)
            $("#back-button_seat_type").prop('disabled', false)
            $('#traveller_count_error').empty().text('');

        } else {
            $("#booknow_submit").prop('disabled', true)
            $("#back-button_seat_type").prop('disabled', true)
            alert('Traveller count & Total traveller count can not match');
            // $('#traveller_count_error').empty().text('Traveller count and staying traveller count must be same');

        } 

        if (total_agewise_cal_adult ==
            total_adult_bus && total_agewise_cal_90 == total_90_bus && total_agewise_cal_60 ==
            total_adult_60 && total_agewise_cal_40 == total_adult_40 && total_agewise_cal_0 ==
            total_adult_0) {
            // if(final_total == inputString_one && g_count % 2 == 0){
            $("#booknow_submit").prop('disabled', false)
            $("#back-button_seat_type").prop('disabled', false)
            $('#traveller_count_error').empty().text('');

        } else {
            $("#booknow_submit").prop('disabled', true)
            $("#back-button_seat_type").prop('disabled', true)
            // alert('Traveller count & Total traveller count match Now');
            // $('#traveller_count_error').empty().text('Traveller count and staying traveller count must be same');

        }


    });
    // alert(inputString);
    // alert(inputString_one);
});
</script>

<!-- End Total Traveller Count -->

<!-- Total Seats Needed Count -->
<script>
$(document).ready(function() {

    var f_count = '';
    var e_count = '';
    var g_count = '';
    var m_count = '';
    var l_count = '';


    $(".seattype_count").on('keyup', function() {
        var f_count = $("#total_seperate_seat").val()
        var e_count = $("#total_child_seperate_seat").val();
        var g_count = $("#total_two_child_share_one_seat").val();
        var m_count = $("#total_child_no_seat_needed").val();
        var l_count = $("#total_child_noo_seat_needed").val();
        if (f_count != '') {
            var ftotal = f_count;
        } else {
            var ftotal = 0;
        }
        if (e_count != '') {
            var etotal = e_count;
        } else {
            var etotal = 0;
        }
        if (g_count != '') {
            var gtotal = g_count;
        } else {
            var gtotal = 0;
        }
        if (m_count != '') {
            var mtotal = m_count;
        } else {
            var mtotal = 0;
        }
        if (l_count != '') {
            var ltotal = l_count;
        } else {
            var ltotal = 0;
        }
        var final_total = parseInt(ftotal) + parseInt(etotal) + parseInt(gtotal) + parseInt(mtotal) +
            parseInt(ltotal);


        $("#total_seat").val(final_total);


    });

});
</script>
<!-- End Total Seats Needed Count -->

<!-- Hotel Dharmashala Calculation -->


<!--******************************************************************************NEW CALCULATIONS MAHESH*************************************************************************-->
<script type='text/javascript'>
$(document).ready(function() {

    $('.hotel_rate1').keyup(function(e) {
        var arr = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57];
        var kcode = e.keyCode;
        if (jQuery.inArray(kcode, arr) > -1) {

            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];
            // alert('1');
            agewise_room(agewise_room_cal);

            $('#onebed_oneroom_40').prop('disabled', false);
            $('#onebed_oneroom_0').prop('disabled', false);

            var multi = 0;
            var room_seat_c = 0;
            var adult_val = 0;
            var adult_val_90 = 0;
            
            $(".hotel_rate1").each(function(index) {

                var did = $(this).val();

                //  if(index ==0 && did!=0)
                //  {
                //     //  alert('not working');
                //     //  $("#booknow_submit").prop('disabled', true);
                //     var adult_val=$(this).val();
                //  }
                //  if(index ==1 && did!=0)
                //  {
                //     var adult_val_90=$(this).val();
                //  }


                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);

            });

            // alert(adult_val+'adult_val');
            // alert(adult_val_90+'adult_val_90');
            // alert(multi+'multi');
            // alert(room_seat_c+'room_seat_c');

            var tot = $('#total_onebed_oneroom').val();

            $('#total_onebed_oneroom').val(multi);

            var tot = $('#total_travaller_1').val();
            $('#total_travaller_1').val(room_seat_c);


            var newvar_1 = 0;

            $(".hotel_rate1").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 1;
                    newvar_1 += Number(new_div_val);
                    // alert(newvar_1);
                }

});
                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room1_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        $('#room1_error_msg').empty().text(
                            'This room must contain total one(1) or multiple of one members compulsory'
                            );
                    }

            
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_1').val(newvar_1);
            } else {
                $('#total_allocated_rooms_1').val('');
            }

        } else if (kcode = 8)

            // this code for adult,90,60,40,0 traveller match
            var percen1 = [];
        var classarry = [];
        var percen1 = $(this).attr('class').split(" ");
        var agewise_room_cal = percen1[percen1.length - 1];
        // alert(agewise_room_cal);

        agewise_room(agewise_room_cal);

        var check_adult_90_empty = $('#onebed_oneroom_cost_adult').val();
        if(check_adult_90_empty>0){
            $('#onebed_oneroom_40').prop('disabled', false);
            $('#onebed_oneroom_0').prop('disabled', false);
        }else{
            $('#onebed_oneroom_40').prop('disabled', true);
            $('#onebed_oneroom_0').prop('disabled', true);
            $('#onebed_oneroom_40').val('');
            $('#onebed_oneroom_0').val('');
            $('#total_agewise_cal_40').val('');
            $('#total_agewise_cal_0').val('');
        }
 

        // Above this code for adult,90,60,40,0 traveller match END

        {
            var multi = 0;
            var room_seat_c = 0;
            $(".hotel_rate1").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);
            });

            // alert(multi+'mul');
            $('#total_onebed_oneroom').val(multi);
            $('#total_travaller_1').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate1").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 1;
                    newvar_1 += Number(new_div_val);
                }

});
// console.log(jQuery.type(Number(newvar_1)),Number(newvar_1));
// console.log(jQuery.type(newvar_1),newvar_1);

                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room1_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', ture)
                        // alert('traveller count room bed count cant not match');
                        $('#room1_error_msg').empty().text(
                            'This room must contain total one(1) or multiple of one members compulsory'
                            );
                    }
                
            // alert(newvar_1);
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_1').val(newvar_1);
            } else {
                $('#total_allocated_rooms_1').val('');
            }

            // ---------------------------------------------

        }

        all_total_count(newvar_1);

    });
});
</script>


<!-- ------------------------------------------------------------------2 Bed One Room -->
<script type='text/javascript'>
$(document).ready(function() {





    // ****************************** Two bed Two room keyup*************************************************
    $('.hotel_rate2').keyup(function(e) {
        var arr = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57];
        var kcode = e.keyCode;
        if (jQuery.inArray(kcode, arr) > -1) {

            // this code for adult,90,60,40,0 traveller match
            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];
            // alert(agewise_room_cal);

            agewise_room(agewise_room_cal);

            $('#twobed_oneroom_count_60').prop('disabled', false);
            $('#twobed_oneroom_count_40').prop('disabled', false);
            $('#twobed_oneroom_count_0').prop('disabled', false);

            // Above this code for adult,90,60,40,0 traveller match END

            var multi = 0;
            var room_seat_c = 0;

            $(".hotel_rate2").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);
                // alert(multi+'multi');

            });

            // console.log(multi+'mul');
            //   console.log(room_seat_c);
            var tot = $('#total_twobed_oneroom').val();

            $('#total_twobed_oneroom').val(multi);

            var tot = $('#total_travaller_2').val();
            $('#total_travaller_2').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate2").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 2;
                    newvar_1 += Number(new_div_val);

                }
            });

                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0 && newvar_1 > 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room2_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        alert(
                            'This room must contains two(2) or multiple of two members compulsory, you can select three(3) person room if you need to add 1 extra member or you can select a single room to accommodate the person specially');
                        $('#room2_error_msg').empty().text(
                            'This room must contain total two(2) or multiple of two members compulsory'
                            );
                    }
                


           
            //  alert(newvar_1);
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_2').val(newvar_1);
            } else {
                $('#total_allocated_rooms_2').val('');
            }

        } else if (kcode = 8) {
            // this code for adult,90,60,40,0 traveller match
            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];
            // alert(agewise_room_cal);

            agewise_room(agewise_room_cal);

            // Above this code for adult,90,60,40,0 traveller match END

            var check_adult_empty = $('#twobed_oneroom_cost_adult').val();
            var check_90_empty = $('#twobed_oneroom_count_90').val();

            if(check_adult_empty>0 || check_90_empty>0){
                $('#twobed_oneroom_count_60').prop('disabled', false);
                $('#twobed_oneroom_count_40').prop('disabled', false);
                $('#twobed_oneroom_count_0').prop('disabled', false);
            }else{
                $('#twobed_oneroom_count_60').prop('disabled', true);
                $('#twobed_oneroom_count_40').prop('disabled', true);
                $('#twobed_oneroom_count_0').prop('disabled', true);

                $('#twobed_oneroom_count_60').val('');
                $('#twobed_oneroom_count_40').val('');
                $('#twobed_oneroom_count_0').val('');

                // $('#total_agewise_cal_60').val('0'); 
                // $('#total_agewise_cal_40').val('0');
                // $('#total_agewise_cal_0').val('0'); 

                var all60_count=0;

                    $(".agewise_cal_60").each(function(index) {
                    var agewise_cal_60_did = $(this).val();
                    
                        all60_count += Number(agewise_cal_60_did);
                   
                });

                var all40_count=0;

                    $(".agewise_cal_40").each(function(index) {
                    var agewise_cal_40_did = $(this).val();
                    
                        all40_count += Number(agewise_cal_40_did);
                   
                });
                // alert(all40_count);

                var all0_count=0;

                    $(".agewise_cal_0").each(function(index) {
                    var agewise_cal_0_did = $(this).val();
                    
                        all0_count += Number(agewise_cal_0_did);
                   
                });

                if(all60_count>0){
                    $('#total_agewise_cal_60').val(all60_count); 
                    
                }else{
                    $('#total_agewise_cal_60').val('0'); 
                   
                }

                if(all40_count>0){
                    $('#total_agewise_cal_40').val(all40_count);
                    
                }else{
                    $('#total_agewise_cal_40').val('0');
                   
                }

                if(all0_count>0){
                    $('#total_agewise_cal_0').val(all0_count); 
                    
                }else{
                    $('#total_agewise_cal_0').val('0'); 
                   
                }
            }



            var multi = 0;
            var room_seat_c = 0;
            $(".hotel_rate2").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);
            });

            // alert(multi+'mul');
            $('#total_twobed_oneroom').val(multi);
            $('#total_travaller_2').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate2").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 2;
                    newvar_1 += Number(new_div_val);
                }


            });
                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room2_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        alert('This room must contains two(2) or multiple of two members compulsory, you can select three person room if you need to add 1 extra member or you can select a single room to accommodate the person specially');
                        $('#room2_error_msg').empty().text(
                            'This room must contain total two(2) or multiple of two members compulsory'
                            );
                    }
                
            //  alert(newvar_1);
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_2').val(newvar_1);
            } else {
                $('#total_allocated_rooms_2').val('');
            }

            // ---------------------------------------------

        }


        all_total_count(newvar_1);


    });
});
</script>

<!-- ****************************Two room two bed keyup close****************************************************** -->

<script type='text/javascript'>
$(document).ready(function() {

    $('.hotel_rate3').keyup(function(e) {
        var arr = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57];
        var kcode = e.keyCode;
        if (jQuery.inArray(kcode, arr) > -1) {

            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];

            agewise_room(agewise_room_cal);

            $('#threebed_oneroom_count_60').prop('disabled', false);
            $('#threebed_oneroom_count_40').prop('disabled', false);
            $('#threebed_oneroom_count_0').prop('disabled', false);

            var multi = 0;
            var room_seat_c = 0;
            $(".hotel_rate3").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');

                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);


            });
            //  alert(multi+'multi');
            var tot = $('#total_threebed_oneroom').val();

            $('#total_threebed_oneroom').val(multi);

            var tot = $('#total_travaller_3').val();
            $('#total_travaller_3').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate3").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 3;
                    newvar_1 += Number(new_div_val);
                }


            });
                    
                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room3_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        alert(
                            'This room must contains three(3) or multiple of three members compulsory, you can select four person room if you need to add 1 extra member or you can select a single room to accommodate the person specially');
                        $('#room3_error_msg').empty().text(
                            'This room must contain total three(3) or multiple of three members compulsory'
                            );
                    }

            //  alert(newvar_1);
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_3').val(newvar_1);
            } else {
                $('#total_allocated_rooms_3').val('');
            }

            // ---------------------------------------------

        } else if (kcode = 8) {
            // this code for adult,90,60,40,0 traveller match
            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];
            // alert(agewise_room_cal);

            agewise_room(agewise_room_cal);

            // Above this code for adult,90,60,40,0 traveller match END

            var threebed_check_adult_empty = $('#threebed_oneroom_cost_adult').val();
            var threebed_check_90_empty = $('#threebed_oneroom_count_90').val();

            if(threebed_check_adult_empty>0 || threebed_check_90_empty>0){
                $('#threebed_oneroom_count_60').prop('disabled', false);
                $('#threebed_oneroom_count_40').prop('disabled', false);
                $('#threebed_oneroom_count_0').prop('disabled', false);
            }else{
                $('#threebed_oneroom_count_60').prop('disabled', true);
                $('#threebed_oneroom_count_40').prop('disabled', true);
                $('#threebed_oneroom_count_0').prop('disabled', true);

                $('#threebed_oneroom_count_60').val('');
                $('#threebed_oneroom_count_40').val('');
                $('#threebed_oneroom_count_0').val('');

                // $('#total_agewise_cal_60').val('0'); 
                // $('#total_agewise_cal_40').val('0');
                // $('#total_agewise_cal_0').val('0'); 

                var threebed_all60_count=0;

                    $(".agewise_cal_60").each(function(index) {
                    var agewise_cal_60_did = $(this).val();
                    
                        threebed_all60_count += Number(agewise_cal_60_did);
                   
                });

                var threebed_all40_count=0;

                    $(".agewise_cal_40").each(function(index) {
                    var agewise_cal_40_did = $(this).val();
                    
                        threebed_all40_count += Number(agewise_cal_40_did);
                   
                });
                // alert(threebed_all40_count);

                var threebed_all0_count=0;

                    $(".agewise_cal_0").each(function(index) {
                    var agewise_cal_0_did = $(this).val();
                    
                        threebed_all0_count += Number(agewise_cal_0_did);
                   
                });

                if(threebed_all60_count>0){
                    $('#total_agewise_cal_60').val(threebed_all60_count); 
                    
                }else{
                    $('#total_agewise_cal_60').val('0'); 
                   
                }

                if(threebed_all40_count>0){
                    $('#total_agewise_cal_40').val(threebed_all40_count);
                    
                }else{
                    $('#total_agewise_cal_40').val('0');
                   
                }

                if(threebed_all0_count>0){
                    $('#total_agewise_cal_0').val(threebed_all0_count); 
                    
                }else{
                    $('#total_agewise_cal_0').val('0'); 
                   
                }
            }


            var multi = 0;
            var room_seat_c = 0;
            $(".hotel_rate3").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);
            });

            // alert(multi+'mul');
            $('#total_threebed_oneroom').val(multi);
            $('#total_travaller_3').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate3").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 3;
                    newvar_1 += Number(new_div_val);
                }


            });
                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room3_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        alert('This room must contains three(3) or multiple of three members compulsory, you can select four person room if you need to add 1 extra member or you can select a single room to accommodate the person specially');
                        $('#room3_error_msg').empty().text(
                            'This room must contain total three(3) or multiple of three members compulsory'
                            );
                    }

            //  alert(newvar_1);
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_3').val(newvar_1);
            } else {
                $('#total_allocated_rooms_3').val('');
            }

            // ---------------------------------------------

        }

        all_total_count(newvar_1);


    });
});
</script>


<!-- ------------------------------------------------------------------------------------- -->
<script type='text/javascript'>
$(document).ready(function() {

    $('.hotel_rate4').keyup(function(e) {
        var arr = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57];
        var kcode = e.keyCode;
        if (jQuery.inArray(kcode, arr) > -1) {
            // this code for adult,90,60,40,0 traveller match
            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];
            // alert(agewise_room_cal);

            agewise_room(agewise_room_cal);

            // Above this code for adult,90,60,40,0 traveller match END

            $('#fourbed_oneroom_count_60').prop('disabled', false);
            $('#fourbed_oneroom_count_40').prop('disabled', false);
            $('#fourbed_oneroom_count_0').prop('disabled', false);

            var multi = 0;
            var room_seat_c = 0;

            $(".hotel_rate4").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);
                // alert(multi+'multi');

            });

            //    alert(room_seat_c);    
            // alert(multi+'mul');
            var tot = $('#total_fourbed_oneroom').val();

            $('#total_fourbed_oneroom').val(multi);

            var tot = $('#total_travaller_4').val();
            $('#total_travaller_4').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate4").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 4;
                    newvar_1 += Number(new_div_val);
                }


            });
                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room4_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        alert(
                            'This room must contains four(4) or multiple of four members compulsory, you can select three person room if you need to add 1 extra member or you can select a single room to accommodate the person specially');
                        $('#room4_error_msg').empty().text(
                            'This room must contain total four(4) or multiple of four members compulsory'
                            );
                    }

            //  alert(newvar_1);
            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_4').val(newvar_1);
            } else {
                $('#total_allocated_rooms_4').val('');
            }

            // ---------------------------------------------

        } else if (kcode = 8) {
            // this code for adult,90,60,40,0 traveller match
            var percen1 = [];
            var classarry = [];
            var percen1 = $(this).attr('class').split(" ");
            var agewise_room_cal = percen1[percen1.length - 1];
            // alert(agewise_room_cal);

            agewise_room(agewise_room_cal);

            var fourbed_check_adult_empty = $('#fourbed_oneroom_cost_adult').val();
            var fourbed_check_90_empty = $('#fourbed_oneroom_count_90').val();

            if(fourbed_check_adult_empty>0 || fourbed_check_90_empty>0){
                $('#fourbed_oneroom_count_60').prop('disabled', false);
                $('#fourbed_oneroom_count_40').prop('disabled', false);
                $('#fourbed_oneroom_count_0').prop('disabled', false);
            }else{
                $('#fourbed_oneroom_count_60').prop('disabled', true);
                $('#fourbed_oneroom_count_40').prop('disabled', true);
                $('#fourbed_oneroom_count_0').prop('disabled', true);

                $('#fourbed_oneroom_count_60').val('');
                $('#fourbed_oneroom_count_40').val('');
                $('#fourbed_oneroom_count_0').val('');

                // $('#total_agewise_cal_60').val('0'); 
                // $('#total_agewise_cal_40').val('0');
                // $('#total_agewise_cal_0').val('0'); 

                var fourbed_all60_count=0;

                    $(".agewise_cal_60").each(function(index) {
                    var agewise_cal_60_did = $(this).val();
                    
                        fourbed_all60_count += Number(agewise_cal_60_did);
                   
                });

                var fourbed_all40_count=0;

                    $(".agewise_cal_40").each(function(index) {
                    var agewise_cal_40_did = $(this).val();
                    
                        fourbed_all40_count += Number(agewise_cal_40_did);
                   
                });
                // alert(fourbed_all40_count);

                var fourbed_all0_count=0;

                    $(".agewise_cal_0").each(function(index) {
                    var agewise_cal_0_did = $(this).val();
                    
                        fourbed_all0_count += Number(agewise_cal_0_did);
                   
                });

                if(fourbed_all60_count>0){
                    $('#total_agewise_cal_60').val(fourbed_all60_count); 
                    
                }else{
                    $('#total_agewise_cal_60').val('0'); 
                   
                }

                if(fourbed_all40_count>0){
                    $('#total_agewise_cal_40').val(fourbed_all40_count);
                    
                }else{
                    $('#total_agewise_cal_40').val('0');
                   
                }

                if(fourbed_all0_count>0){
                    $('#total_agewise_cal_0').val(fourbed_all0_count); 
                    
                }else{
                    $('#total_agewise_cal_0').val('0'); 
                   
                }
            }

            var multi = 0;
            var room_seat_c = 0;
            $(".hotel_rate4").each(function(index) {
                var did = $(this).val();
                var percen = $(this).attr('attr-per');
                var multi1 = did * percen;
                multi += Number(multi1);
                room_seat_c += Number(did);
            });

            // alert(room_seat_c);  
            // alert(multi+'mul');
            $('#total_fourbed_oneroom').val(multi);
            $('#total_travaller_4').val(room_seat_c);

            // --This code for calculating room calculation--
            var newvar_1 = 0;

            $(".hotel_rate4").each(function(index) {
                var did = $(this).val();
                var attrval = $(this).attr('attr-add');
                if (attrval == "yes") {
                    var new_div_val = did / 4;
                    newvar_1 += Number(new_div_val);
                }


            });
                    if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                        // alert('doneeeeeeee');
                        $("#booknow_submit").prop('disabled', false);
                        $("#back-button_seat_type").prop('disabled', false)
                        $('#room4_error_msg').empty().text('');
                    } else {
                        $("#booknow_submit").prop('disabled', true);
                        $("#back-button_seat_type").prop('disabled', true)
                        alert(
                            'This room must contains four(4) or multiple of four members compulsory, you can select three person room if you need to add 1 extra member or you can select a single room to accommodate the person specially');
                        $('#room4_error_msg').empty().text(
                            'This room must contain total four(4) or multiple of four members compulsory'
                            );
                    }

            if (Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
                $('#total_allocated_rooms_4').val(newvar_1);
            } else {
                $('#total_allocated_rooms_4').val('');
            }


        }


        all_total_count(newvar_1);

    });
});
</script>


<!-- --------------------------------------------------------------------------- -->

<script type='text/javascript'>
function agewise_room(agewise_room_cal) {
    var adultroom = 0;
    $("." + agewise_room_cal).each(function(index) {

        var did = $(this).val();
        adultroom += Number(did);

    });
    // alert(agewise_room_cal);

    if (agewise_room_cal == 'agewise_cal_adult') {
        $('#total_agewise_cal_adult').val(adultroom);
    } else if (agewise_room_cal == 'agewise_cal_90') {
        $('#total_agewise_cal_90').val(adultroom);
    } else if (agewise_room_cal == 'agewise_cal_60') {
        $('#total_agewise_cal_60').val(adultroom);
    } else if (agewise_room_cal == 'agewise_cal_40') {
        $('#total_agewise_cal_40').val(adultroom);
    } else if (agewise_room_cal == 'agewise_cal_0') {
        $('#total_agewise_cal_0').val(adultroom);
    }

}
</script>

<script type='text/javascript'>
function all_total_count(newvar_1) {
    var f_count = '';
    var e_count = '';
    var g_count = '';
    var m_count = '';

    var f_count = $("#total_onebed_oneroom").val();
    var e_count = $("#total_twobed_oneroom").val();
    var g_count = $("#total_threebed_oneroom").val();
    var m_count = $("#total_fourbed_oneroom").val();

    // alert(f_count+'f_count');
    // alert(e_count+'e_count');
    // alert(g_count+'g_count');
    // alert(m_count+'m_count');

    if (f_count != '') {
        var ftotal = f_count;
    } else {
        var ftotal = 0;
    }
    if (e_count != '') {
        var etotal = e_count;
    } else {
        var etotal = 0;
    }
    if (g_count != '') {
        var gtotal = g_count;
    } else {
        var gtotal = 0;
    }
    if (m_count != '') {
        var mtotal = m_count;
    } else {
        var mtotal = 0;
    }

    var final_total = parseInt(ftotal) + parseInt(etotal) + parseInt(gtotal) + parseInt(mtotal);


    $("#total_hotel_amount").val(final_total);
    //   =====================================================================================================================================================      

    var a_count = '';
    var b_count = '';
    var c_count = '';
    var d_count = '';

    var a_count = $("#total_travaller_1").val();
    var b_count = $("#total_travaller_2").val();
    var c_count = $("#total_travaller_3").val();
    var d_count = $("#total_travaller_4").val();

    if (a_count != '') {
        var atotal = a_count;
    } else {
        var atotal = 0;
    }
    if (b_count != '') {
        var btotal = b_count;
    } else {
        var btotal = 0;
    }
    if (c_count != '') {
        var ctotal = c_count;
    } else {
        var ctotal = 0;
    }
    if (d_count != '') {
        var dtotal = d_count;
    } else {
        var dtotal = 0;
    }

    var final_total = parseInt(atotal) + parseInt(btotal) + parseInt(ctotal) + parseInt(dtotal);


    $("#total_travaller_count").val(final_total);

    //  +++++++++++++===================================================================================================================================           
    var r1_count = '';
    var r2_count = '';
    var r3_count = '';
    var r4_count = '';

    var r1_count = $("#total_allocated_rooms_1").val();
    var r2_count = $("#total_allocated_rooms_2").val();
    var r3_count = $("#total_allocated_rooms_3").val();
    var r4_count = $("#total_allocated_rooms_4").val();

    if (r1_count != '') {
        var r1total = r1_count;
    } else {
        var r1total = 0;
    }
    if (r2_count != '') {
        var r2total = r2_count;
    } else {
        var r2total = 0;
    }
    if (r3_count != '') {
        var r3total = r3_count;
    } else {
        var r3total = 0;
    }
    if (r4_count != '') {
        var r4total = r4_count;
    } else {
        var r4total = 0;
    }

    var final_room_count = parseInt(r1total) + parseInt(r2total) + parseInt(r3total) + parseInt(r4total);


    $("#total_allocated_rooms").val(final_room_count);

    //   =============================================================================================================================================================================         
    // ===------------- This Code for matching adult and 90 per. bus seat and room bed calculation -------------
    var total_agewise_cal_adult = 0;
    var total_agewise_cal_90 = 0;

    var total_agewise_cal_60 = 0;
    var total_agewise_cal_40 = 0;
    var total_agewise_cal_0 = 0;

    var total_adult_90 = 0;


    total_agewise_cal_adult = $("#total_agewise_cal_adult").val();
    total_agewise_cal_90 = $("#total_agewise_cal_90").val();

    total_agewise_cal_60 = $("#total_agewise_cal_60").val();
    total_agewise_cal_40 = $("#total_agewise_cal_40").val();
    total_agewise_cal_0 = $("#total_agewise_cal_0").val();

    // ---fetch from bus seat calculation
    var total_adult_90_bus_seat = $("#total_adult_90_bus").val();

    var total_adult_bus = $("#seperate_seat").val();
    var total_90_bus = $("#child_seperate_seat").val();
    var total_adult_60 = $("#two_child_share_one_seat").val();
    var total_adult_40 = $("#child_no_seat_needed").val();
    var total_adult_0 = $("#child_noo_seat_needed").val();
    // ----------------------------------

    if (total_agewise_cal_adult > 0) {
        total_agewise_cal_adult = $("#total_agewise_cal_adult").val();
    } else {
        total_agewise_cal_adult = 0;
    }

    if (total_agewise_cal_90 > 0) {
        total_agewise_cal_90 = $("#total_agewise_cal_90").val();
    } else {
        total_agewise_cal_90 = 0;
    }

    if (total_agewise_cal_60 > 0) {
        total_agewise_cal_60 = $("#total_agewise_cal_60").val();
    } else {
        total_agewise_cal_60 = 0;
    }

    if (total_agewise_cal_40 > 0) {
        total_agewise_cal_40 = $("#total_agewise_cal_40").val();
    } else {
        total_agewise_cal_40 = 0;
    }

    if (total_agewise_cal_0 > 0) {
        total_agewise_cal_0 = $("#total_agewise_cal_0").val();
    } else {
        total_agewise_cal_0 = 0;
    }

    // total_adult_90 = parseInt(total_agewise_cal_adult) + parseInt(total_agewise_cal_90);
    //  $("#total_adult_90").val(total_adult_90);

    // above addition adult and 90comment after 10july2023 client meeting as per client req.

    // ===------------- Above Code for matching adult and 90 per. bus seat and room bed calculation END-----------
    // ==========================================================================================================================================================


    // ---------booking button disabled when travaller count can't match------------
    var inputString_one = $("#total_busseattype").val();
    var room_travaller_c = $("#seat_count").val();
    var g_even_no_count = $("#two_child_share_one_seat").val();
    var room_travaller_count = $("#total_travaller_count").val();


    if (total_agewise_cal_adult == total_adult_bus && total_agewise_cal_90 == total_90_bus && total_agewise_cal_60 ==
        total_adult_60 && total_agewise_cal_40 == total_adult_40 && total_agewise_cal_0 == total_adult_0 &&
        room_travaller_count == inputString_one && g_even_no_count % 2 == 0 && inputString_one == room_travaller_c &&
        Number(newvar_1) === newvar_1 && newvar_1 % 1 === 0) {
        $("#booknow_submit").prop('disabled', false)
        $("#back-button_seat_type").prop('disabled', false)
        $('#traveller_count_error').empty().text('');
    } else {
        $("#booknow_submit").prop('disabled', true)
        $("#back-button_seat_type").prop('disabled', true)
        alert('Traveller count and staying traveller count must be same');
        $('#traveller_count_error').empty().text('Traveller count and staying traveller count must be same');
    }


}
</script>

<script>
$(document).ready(function() {

    var seat_count = $("#seat_count").val();

    var total_travaller_count = $("#total_travaller_count").val();
    var total_busseattype = $("#total_busseattype").val();
    // alert(total_travaller_count);total_busseattype

    // if (total_busseattype != '')
    if (total_travaller_count == total_busseattype && total_travaller_count == seat_count && total_busseattype == seat_count) {
        $("#booknow_submit").prop('disabled', false)
        $("#back-button_seat_type").prop('disabled', false)
        $('#traveller_count_error').empty().text('');
    } else {
        $("#booknow_submit").prop('disabled', true)
        $("#back-button_seat_type").prop('disabled', true)
        // alert('Traveller count and staying traveller count must be same');
        $('#traveller_count_error').empty().text('Traveller count and staying traveller count must be same');
    }


});
</script>

<!-- this condition for add bus - seat type room type selection -->
<script>
$(document).ready(function() {
    var temp_booked_data = [];
    
    var seat_count = $("#total_seat_count").val();
    // alert(seat_count);

    var temp_array =<?php echo json_encode($temp_booking_data);?>;

    var selected_seat = temp_array.length;

    // alert(temp_array);

    if (seat_count == selected_seat){
        $("#booknow_submit").prop('disabled', false)

    } else {
        $("#booknow_submit").prop('disabled', true)
        
    }

});
</script>
<!-- end this condition for add bus - seat type room type selection -->

<!-- validation for custom booking enquiry -->
<script>
$(document).ready(function() {
    $('#custom_add_bookingenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                // regxp: '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
            },
            mobile_number1: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            mobile_number2: {
                maxlength: 10,
                minlength: 10
            },
            tour_number: {
                required: true,
            },
            other_tour_name: {
                required: function(element) {
                    var action = $("#tour_number").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            checkin_date: {
                required: true,
            },

            checkout_date: {
                required: true,
            },

            no_of_nights: {
                required: true,
            },
            "hotel_type[]": {
                required: true,
            },
            no_of_couple: {
                required: true,
            },
            meal_plan: {
                required: true,
            },
            meal_plan_name: {
                required: function(element) {
                    var action = $("#meal_plan").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            total_adult: {
                required: true,
            },
            total_child_with_bed: {
                required: true,
            },
            total_child_without_bed: {
                required: true,
            },
            vehicle_type: {
                required: true,
            },
            other_vehicle_name: {
                required: function(element) {
                    var action = $("#vehicle_type").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            pick_up_from: {
                required: true,
            },
            other_pickup_from_name: {
                required: function(element) {
                    var action = $("#pick_up_from").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            pickup_date: {
                required: true,
            },
            pickup_time: {
                required: true,
            },
            drop_to: {
                required: true,
            },
            other_drop_to_name: {
                required: function(element) {
                    var action = $("#drop_to").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            drop_date: {
                required: true,
            },
            drop_time: {
                required: true,
            }


        },

        messages: {
            full_name: {
                required: "Please enter full name",
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            mobile_number1: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            mobile_number2: {
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            tour_number: {
                required: "Please enter tour number",
            },
            other_tour_name: {
                required: "Please enter destination name",
            },
            checkin_date: {
                required: "Please select check in dates",
            },

            checkout_date: {
                required: "Please select checkout date",
            },

            no_of_nights: {
                required: "Please enter no of nights",
            },
            "hotel_type[]": {
                required: "Please select hotel type",
            },
            no_of_couple: {
                required: "Please enter no of couple",
            },
            meal_plan: {
                required: "Please select meal plan",
            },
            meal_plan_name: {
                required: "Please enter meal plan name",
            },
            total_adult: {
                required: "Please enter total adult",
            },
            total_child_with_bed: {
                required: "Please enter total child with bed",
            },
            total_child_without_bed: {
                required: "Please enter total child without bed",
            },
            vehicle_type: {
                required: "Please select vehicle type",
            },
            other_vehicle_name: {
                required: "Please enter vehicle name",
            },
            pick_up_from: {
                required: "Please select pick up from",
            },
            other_pickup_from_name: {
                required: "Please select pick up from name",
            },
            pickup_date: {
                required: "Please enter pick up date",
            },
            pickup_time: {
                required: "Please enter pick up time",
            },
            drop_to: {
                required: "Please select drop to",
            },
            other_drop_to_name: {
                required: "Please enter drop to name",
            },
            drop_date: {
                required: "Please enter drop date",
            },
            drop_time: {
                required: "Please enter drop time",
            }

        }
    });

});
</script>
<!-- jquery validation on add custom Booking Enquiry -->

<!-- jquery validation on edit custom Booking Enquiry -->
<script>
$(document).ready(function() {
    $('#custom_edit_bookingenquiry').validate({ // initialize the plugin
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("div"));
        },
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                // regxp: '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
            },
            mobile_number1: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            tour_number: {
                required: true,
            },
            other_tour_name: {
                required: function(element) {
                    var action = $("#tour_number").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            checkin_date: {
                required: true,
            },

            checkout_date: {
                required: true,
            },

            no_of_nights: {
                required: true,
            },
            "hotel_type[]": {
                required: true,
            },
            no_of_couple: {
                required: true,
            },
            meal_plan: {
                required: true,
            },
            total_adult: {
                required: true,
            },
            total_child_with_bed: {
                required: true,
            },
            total_child_without_bed: {
                required: true,
            },
            vehicle_type: {
                required: true,
            },
            pick_up_from: {
                required: true,
            },
            pickup_date: {
                required: true,
            },
            pickup_time: {
                required: true,
            },
            drop_to: {
                required: true,
            },
            drop_date: {
                required: true,
            },
            drop_time: {
                required: true,
            },
            meal_plan_name: {
                required: function(element) {
                    var action = $("#meal_plan").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            other_vehicle_name: {
                required: function(element) {
                    var action = $("#vehicle_type").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            other_pickup_from_name: {
                required: function(element) {
                    var action = $("#pick_up_from").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            other_drop_to_name: {
                required: function(element) {
                    var action = $("#drop_to").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }


        },

        messages: {
            full_name: {
                required: "Please enter full name",
            },
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            mobile_number1: {
                required: "Please enter mobile number",
                maxlength: "Please enter maximum 10 digit number",
                minlength: "Please enter minimum 10 digit number"
            },
            tour_number: {
                required: "Please enter tour number",
            },
            other_tour_name: {
                required: "Please enter destination name",
            },
            checkin_date: {
                required: "Please select check in dates",
            },

            checkout_date: {
                required: "Please select checkout date",
            },

            no_of_nights: {
                required: "Please enter no of nights",
            },
            "hotel_type[]": {
                required: "Please select hotel type",
            },
            no_of_couple: {
                required: "Please enter no of couple",
            },
            meal_plan: {
                required: "Please select meal plan",
            },
            total_adult: {
                required: "Please enter total adult",
            },
            total_child_with_bed: {
                required: "Please enter total child with bed",
            },
            total_child_without_bed: {
                required: "Please enter total child without bed",
            },
            vehicle_type: {
                required: "Please select vehicle type",
            },
            pick_up_from: {
                required: "Please select pick up from",
            },
            pickup_date: {
                required: "Please enter pick up date",
            },
            pickup_time: {
                required: "Please enter pick up time",
            },
            drop_to: {
                required: "Please select drop to",
            },
            drop_date: {
                required: "Please enter drop date",
            },
            drop_time: {
                required: "Please enter drop time",
            },
            meal_plan_name: {
                required: "Please enter meal plan name",
            },
            other_vehicle_name: {
                required: "Please enter vehicle name",
            },
            other_pickup_from_name: {
                required: "Please select pick up from name",
            },
            other_drop_to_name: {
                required: "Please enter drop to name",
            }


        }
    });

});
</script>
<!-- jquery validation on edit custom Booking Enquiry -->

<!-- other feilds  -->
<script type="text/javascript">
function Mealplan(val) {
    var element = document.getElementById('other_meal_plan_div');
    var element2 = document.getElementById('meal_plan_name');
    if (val == 'Other')
        element.style.display = 'block';
    else
        element.style.display = 'none';
    element2.value = "";
}
</script>
<script type="text/javascript">
function Vehicle(val) {
    var element = document.getElementById('other_vehicle_type_div');
    var element2 = document.getElementById('other_vehicle_name');
    if (val == 'Other')
        element.style.display = 'block';
    else
        element.style.display = 'none';
    element2.value = "";
}
</script>
<script type="text/javascript">
function Pickupfrom(val) {
    var element = document.getElementById('other_pickup_from_div');
    var element2 = document.getElementById('other_pickup_from_name');
    if (val == 'Other')
        element.style.display = 'block';
    else
        element.style.display = 'none';
    element2.value = "";
}
</script>
<script type="text/javascript">
function dropto(val) {
    var element = document.getElementById('other_dropto_div');
    var element2 = document.getElementById('other_drop_to_name');
    if (val == 'Other')
        element.style.display = 'block';
    else
        element.style.display = 'none';
    element2.value = "";
}
</script>
<!-- other feilds -->

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
$('.checkin_date').datepicker().bind("change", function() {
    var minValue = $(this).val();
    minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
    $('.checkout_date').datepicker("option", "minDate", minValue);
    calculate();
});
$('.checkout_date').datepicker().bind("change", function() {
    var maxValue = $(this).val();
    maxValue = $.datepicker.parseDate("yy-mm-dd", maxValue);
    $('.checkin_date').datepicker("option", "maxDate", maxValue);
    calculate();
});

function calculate() {
    var d1 = $('.checkin_date').datepicker('getDate');
    var d2 = $('.checkout_date').datepicker('getDate');
    var oneDay = 24 * 60 * 60 * 1000;
    var diff = 0;
    if (d1 && d2) {

        diff = Math.round(Math.abs((d2.getTime() - d1.getTime()) / (oneDay)));
    }
    $('.no_of_nights').val(diff);
}
</script>

<script>
$(".selectall").click(function() {
    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
</script>

<!-- for bus seat selected -->

<!-- Final booking preview final amt calculation -->
<script>
    
$("#booking_amt").on("keyup", function() {
var val = +this.value || 0;
$("#pending_amt").val($("#final_amt").val() - val);
});

</script>
<!-- Final booking preview final amt calculation -->

<!-- Bank transaction ---------------------------------------- -->
<script type="text/javascript">
    function account_details(val){

    var booking_preview = $('#select_transaction').val();
    var booking_preview_mobno = $('#booking_tm_mobile_no').val();
    var booking_preview_amt = $('#booking_amt').val();
    // alert(booking_preview);

    if(booking_preview == 'CASH' && booking_preview_mobno != '' && booking_preview_amt != ''){
        $("#submit_otp").attr("disabled", false);
    }else if(booking_preview == 'UPI'){
        $("#submit_otp").attr("disabled", true);
    }else if(booking_preview == 'QR Code'){
        $("#submit_otp").attr("disabled", true);
    }else if(booking_preview == 'Cheque'){
        $("#submit_otp").attr("disabled", true);
    }else if(booking_preview == 'Net Banking'){
        $("#submit_otp").attr("disabled", true);
    }
        
    // if(checkEmpty($("#select_transaction"))){
    // $("#submit_otp").attr("disabled", true);
    // }
    // else{
    //     $("#submit_otp").attr("disabled", false);
    // }
        // alert('hiiiiiiiii');
    var element=document.getElementById('net_banking_tr');
	var element2=document.getElementById('net_banking');

    var upi_no_div=document.getElementById('upi_no_div');
	var upi_no=document.getElementById('upi_no');

    var mob_no_div=document.getElementById('cheque_tr');
	// var mob_no=document.getElementById('cheque');

    var rq_div=document.getElementById('rq_div');
	var mob_no_bank=document.getElementById('bank_name');

    var cash_no_div=document.getElementById('cash_tr');
	var cash_no=document.getElementById('cash');

    if(val=='Net Banking'){
    upi_no_div.style.display='none';
    mob_no_div.style.display='none';
    rq_div.style.display='none';
    cash_no_div.style.display='none';
    element.style.display='contents';
    
    }else if(val=='') {
    element.style.display='none';
    mob_no_div.style.display='none';
    rq_div.style.display='none';
    cash_no_div.style.display='none';
    upi_no_div.style.display='none';
	// element2.value="";

    }else if(val=='UPI') {
    element.style.display='none';
    mob_no_div.style.display='none';
    rq_div.style.display='none';
    cash_no_div.style.display='none';
    upi_no_div.style.display='contents';
	// element2.value="";

    }else if(val=='QR Code') {
    element.style.display='none';
    mob_no_div.style.display='none';
    cash_no_div.style.display='none';
    upi_no_div.style.display='none';
    rq_div.style.display='contents';
	// element2.value="";

    }else if(val=='Cheque'){
        element.style.display='none';
        upi_no_div.style.display='none';
        cash_no_div.style.display='none';
        rq_div.style.display='none';
        mob_no_div.style.display='contents';
        mob_no_one.style.display='contents';
    }else if(val=='CASH'){
        element.style.display='none';
        rq_div.style.display='none';
        upi_no_div.style.display='none';
        cash_no_div.style.display='flex';
        mob_no_div.style.display='none';
    }

    }
</script>

<script type="text/javascript">
    function upi_QR_details(val){
        // alert('hiiiiiiiii');

    var upi_no_reason_div=document.getElementById('upi_no_reason_div');
	var upi_no=document.getElementById('upi_no');

    if(val=='Self') {
        // alert(val);
    // element.style.display='none';
    upi_no_reason_div.style.display='contents';
    }else{
    upi_no_reason_div.style.display='none';
    }
    }
</script>

<!-- <script type="text/javascript">
    function QR_details(val){
        // alert('hiiiiiiiii');

    var upi_no_reason_div=document.getElementById('upi_no_reason_div');
	var upi_no=document.getElementById('upi_no');

    if(val=='Self') {
        // alert(val);
    // element.style.display='none';
    upi_no_reason_div.style.display='contents';
    }else{
    upi_no_reason_div.style.display='none';
    }
    }
</script> -->
<!-- Bank transaction ---------------------------------------- -->

<script>
    $('.data_amt').keyup(function(){
        // alert('hiiii');
        var seat_type_data = $(this).attr('attr-amt');
        // alert(seat_type_data);
        
        // alert(price);
        // if(seat_type_data=='2000'){
        //     var price = parseFloat($('#cash_2000').val());
        //     var total_amt = price * seat_type_data;
        //     if(total_amt>0){
        //         $('#total_cash_2000').val(total_amt );
        //     }else{
        //         $('#total_cash_2000').val('0');
        //     }
        // }else 
        if(seat_type_data=='500'){
            var price = parseFloat($('#cash_500').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_500').val(total_amt );
            }else{
                $('#total_cash_500').val('0');
            }
        }else if(seat_type_data=='200'){
            var price = parseFloat($('#cash_200').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_200').val(total_amt );
            }else{
                $('#total_cash_200').val('0');
            }
        }else if(seat_type_data=='100'){
            var price = parseFloat($('#cash_100').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_100').val(total_amt );
            }else{
                $('#total_cash_100').val('0');
            }
        }else if(seat_type_data=='50'){
            var price = parseFloat($('#cash_50').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_50').val(total_amt );
            }else{
                $('#total_cash_50').val('0');
            }
        }else if(seat_type_data=='20'){
            var price = parseFloat($('#cash_20').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_20').val(total_amt );
            }else{
                $('#total_cash_20').val('0');
            }
        }else if(seat_type_data=='10'){
            var price = parseFloat($('#cash_10').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_10').val(total_amt );
            }else{
                $('#total_cash_10').val('0');
            }
        }else if(seat_type_data=='5'){
            var price = parseFloat($('#cash_5').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_5').val(total_amt );
            }else{
                $('#total_cash_5').val('0');
            }
        }
        else if(seat_type_data=='2'){
            var price = parseFloat($('#cash_2').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_2').val(total_amt );
            }else{
                $('#total_cash_2').val('0');
            }
        }
        else if(seat_type_data=='1'){
            var price = parseFloat($('#cash_1').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#total_cash_1').val(total_amt );
            }else{
                $('#total_cash_1').val('0');
            }
        }
        

    });
</script>

<script>
$(document).ready(function() {

    var f_count = '';
    var e_count = '';
    var g_count = '';
    var m_count = '';
    var l_count = '';
    var n_count = '';
    var o_count = '';
    var a_count = '';
    var b_count = '';
    var c_count = '';


    $(".data_amt").on('keyup', function() {
        // var f_count = $("#total_cash_2000").val()
        var e_count = $("#total_cash_500").val();
        var g_count = $("#total_cash_200").val();
        var m_count = $("#total_cash_100").val();
        var l_count = $("#total_cash_50").val();
        var n_count = $("#total_cash_20").val();
        var o_count = $("#total_cash_10").val();
        var a_count = $("#total_cash_5").val();
        var b_count = $("#total_cash_2").val();
        var c_count = $("#total_cash_1").val();

        // if (f_count != '') {
        //     var ftotal = f_count;
        // } else {
        //     var ftotal = 0;
        // }
        if (e_count != '') {
            var etotal = e_count;
        } else {
            var etotal = 0;
        }
        if (g_count != '') {
            var gtotal = g_count;
        } else {
            var gtotal = 0;
        }
        if (m_count != '') {
            var mtotal = m_count;
        } else {
            var mtotal = 0;
        }
        if (l_count != '') {
            var ltotal = l_count;
        } else {
            var ltotal = 0;
        }
        if (n_count != '') {
            var ntotal = n_count;
        } else {
            var ntotal = 0;
        }
        if (o_count != '') {
            var ototal = o_count;
        } else {
            var ototal = 0;
        }
        if (a_count != '') {
            var atotal = a_count;
        } else {
            var atotal = 0;
        }
        if (b_count != '') {
            var btotal = b_count;
        } else {
            var btotal = 0;
        }
        if (c_count != '') {
            var ctotal = c_count;
        } else {
            var ctotal = 0;
        }
        var final_total = parseInt(etotal) + parseInt(gtotal) + parseInt(mtotal) +
            parseInt(ltotal) + parseInt(ntotal) + parseInt(ototal) + parseInt(atotal) + parseInt(btotal) +
            parseInt(ctotal);


        $("#total_cash_amt").val(final_total);


    });

});
</script>

<!-- ================================return to customer  =================================-->
<script>
    $('.return_data_amt').keyup(function(){
        // alert('hiiii');
        var seat_type_data = $(this).attr('return-attr-amt');
        // alert(seat_type_data);
        
        // alert(price);
        // if(seat_type_data=='2000'){
        //     var price = parseFloat($('#cash_2000').val());
        //     var total_amt = price * seat_type_data;
        //     if(total_amt>0){
        //         $('#total_cash_2000').val(total_amt );
        //     }else{
        //         $('#total_cash_2000').val('0');
        //     }
        // }else 
        if(seat_type_data=='500'){
            var price = parseFloat($('#return_cash_500').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_500').val(total_amt );
            }else{
                $('#return_total_cash_500').val('0');
            }
        }else if(seat_type_data=='200'){
            var price = parseFloat($('#return_cash_200').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_200').val(total_amt );
            }else{
                $('#return_total_cash_200').val('0');
            }
        }else if(seat_type_data=='100'){
            var price = parseFloat($('#return_cash_100').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_100').val(total_amt );
            }else{
                $('#return_total_cash_100').val('0');
            }
        }else if(seat_type_data=='50'){
            var price = parseFloat($('#return_cash_50').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_50').val(total_amt );
            }else{
                $('#return_total_cash_50').val('0');
            }
        }else if(seat_type_data=='20'){
            var price = parseFloat($('#return_cash_20').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_20').val(total_amt );
            }else{
                $('#return_total_cash_20').val('0');
            }
        }else if(seat_type_data=='10'){
            var price = parseFloat($('#return_cash_10').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_10').val(total_amt );
            }else{
                $('#return_total_cash_10').val('0');
            }
        }else if(seat_type_data=='5'){
            var price = parseFloat($('#return_cash_5').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_5').val(total_amt );
            }else{
                $('#return_total_cash_5').val('0');
            }
        }
        else if(seat_type_data=='2'){
            var price = parseFloat($('#return_cash_2').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_2').val(total_amt );
            }else{
                $('#return_total_cash_2').val('0');
            }
        }
        else if(seat_type_data=='1'){
            var price = parseFloat($('#return_cash_1').val());
            var total_amt = price * seat_type_data;
            if(total_amt>0){
                $('#return_total_cash_1').val(total_amt );
            }else{
                $('#return_total_cash_1').val('0');
            }
        }
        

    });
</script>

<script>
$(document).ready(function() {

    var f_count = '';
    var e_count = '';
    var g_count = '';
    var m_count = '';
    var l_count = '';
    var n_count = '';
    var o_count = '';
    var a_count = '';
    var b_count = '';
    var c_count = '';


    $(".return_data_amt").on('keyup', function() {
        // var f_count = $("#total_cash_2000").val()
        var e_count = $("#return_total_cash_500").val();
        var g_count = $("#return_total_cash_200").val();
        var m_count = $("#return_total_cash_100").val();
        var l_count = $("#return_total_cash_50").val();
        var n_count = $("#return_total_cash_20").val();
        var o_count = $("#return_total_cash_10").val();
        var a_count = $("#return_total_cash_5").val();
        var b_count = $("#return_total_cash_2").val();
        var c_count = $("#return_total_cash_1").val();

        // if (f_count != '') {
        //     var ftotal = f_count;
        // } else {
        //     var ftotal = 0;
        // }
        if (e_count != '') {
            var etotal = e_count;
        } else {
            var etotal = 0;
        }
        if (g_count != '') {
            var gtotal = g_count;
        } else {
            var gtotal = 0;
        }
        if (m_count != '') {
            var mtotal = m_count;
        } else {
            var mtotal = 0;
        }
        if (l_count != '') {
            var ltotal = l_count;
        } else {
            var ltotal = 0;
        }
        if (n_count != '') {
            var ntotal = n_count;
        } else {
            var ntotal = 0;
        }
        if (o_count != '') {
            var ototal = o_count;
        } else {
            var ototal = 0;
        }
        if (a_count != '') {
            var atotal = a_count;
        } else {
            var atotal = 0;
        }
        if (b_count != '') {
            var btotal = b_count;
        } else {
            var btotal = 0;
        }
        if (c_count != '') {
            var ctotal = c_count;
        } else {
            var ctotal = 0;
        }
        var final_total = parseInt(etotal) + parseInt(gtotal) + parseInt(mtotal) +
            parseInt(ltotal) + parseInt(ntotal) + parseInt(ototal) + parseInt(atotal) + parseInt(btotal) +
            parseInt(ctotal);

        $("#return_total_cash_amt").val(final_total);


    });

});
</script>
<!-- -==============================return to customer -->

<script>
$(document).ready(function() {
    $('#final_booking_preview').validate({ // initialize the plugin
        
        errorPlacement: function($error, $element) {
            $error.appendTo($element.closest("tr,td,div"));
        },
        rules: {
            upi_no: {
                required: function(element) {
                    
                    if($('#select_transaction').val() == 'UPI')
                     {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            cheque: {
                required: function(element) {
                    
                    if($('#select_transaction').val() == 'Cheque')
                     {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            net_banking: {
                required: function(element) {
                    
                    if($('#select_transaction').val() == 'Net Banking')
                     {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            booking_amt: {
                required: true,
            },
            payment_now_later: {
                required: true,
            },
            booking_tm_mobile_no:{
                required: true,
                validMobile: true
            },
            extra_services:{
                required: true,
            },
            total_cash_amt: {
                required: function(element) {
                    
                    if($('#select_transaction').val() == 'CASH')
                     {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            select_upi_no: {
                required: function(element) {
                    
                    if($('#select_transaction').val() == 'UPI')
                     {
                        return true;
                    } else {
                        return false;
                    }
                }
            },

        },

        messages: {
            upi_no: {
                required: "Please enter transaction number",
            },
            cheque: {
                required: "Please enter cheque number",
            },
            net_banking: {
                required: "Please enter transaction number",
            },
            booking_amt: {
                required: "Please booking amount",
            },
            payment_now_later: {
                required: "Please select Payment",
            },
            extra_services:{
                required: "Please select yes or no",
            },
            booking_tm_mobile_no: {
                required: "Please enter mobile number",
                validMobile: "Please enter a valid mobile number starting with 6, 7, 8, or 9",
            },
            total_cash_amt: {
                required: "Please enter cash",
            },
            select_upi_no: {
                required: "Please Holder Name",
            }


        }
    });

    jQuery.validator.addMethod("validMobile", function(value, element) {
        var pattern = /^[6-9]\d{9}$/; // Starts with 6, 7, 8, or 9 followed by 9 digits
        return this.optional(element) || pattern.test(value);
    }, "Please enter a valid mobile number starting with 6, 7, 8, or 9.");

    $('#submit_back_preview').on('click', function(event) {
        // Trigger the form validation for #final_booking_preview
        var isValid = $('#final_booking_preview').valid();

        // Check if the form is valid
        if (!isValid) {
            // If the form is not valid, prevent the default button action
            event.preventDefault();
        }
    });

});
</script>

<!-- <script>
$('.data_amt').keyup(function(){

    var booking_amt = $("#booking_amt").val();
    var total_cash_amt = $("#total_cash_amt").val();
    // alert(total_travaller_count);

    if (booking_amt == total_cash_amt) {
        $("#final_booking_submit").prop('disabled', false)
        alert('Matching!');
    } else {
        $("#final_booking_submit").prop('disabled', true)
        alert('Not Matching!');
    }


});
</script> -->

<script>

    $(document).ready(function(){

    $('#pack_id').change(function(){

    var did = $(this).val();

      $.ajax({
        url:'<?=base_url()?>agent/booking_basic_info/get_tourdate',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
          $('#pack_date_id').find('option').not(':first').remove();
          $.each(response,function(index,data){      
             $('#pack_date_id').append('<option value="'+data['id']+'">'+data['journey_date']+'</option>');
          });
        }
     });
   });
});

</script>

<script>
$(document).ready(function() {
    $("#submit_next").click(function() {
        // alert(mobile_no);
        var enquiry_id = $('#enquiry_id').val();
        var package_id = $('#package_id').val();
        var journey_date = $('#journey_date').val();
        var package_date_id = $('#package_date_id').val();
        var traveller_id = $('#traveller_id').val();
        var booking_payment_details_id = $('#booking_payment_details_id').val();
        // var booking_on = $('#booking_on').val();
        
         
            // alert('IN hiiiii');
            $.ajax({
                url: "<?php echo base_url(); ?>agent/booking_preview/cust_otp",
                type: "post",
                data: {
                    enquiry_id: enquiry_id,
                    booking_payment_details_id: booking_payment_details_id,
                    package_id: package_id,
                    journey_date: journey_date,
                    package_date_id: package_date_id,
                    traveller_id: traveller_id
                    // booking_on: booking_on
                },
                // dataType: 'json',
                success: function(responce) {
                    if (responce != false && responce !='') {
                        // alert(responce);
                        var booking_ref_no = $('#booking_ref_no').val(responce);

                        window.location.href = "<?=base_url()?>agent/srs_form/index/"+enquiry_id;
                    }
                }
            });
    });
});
</script>


<script>
$(document).ready(function() {
    $("#re_send_otp").click(function() {
        // alert('hiiiiiiiiiii');
        var booking_tm_mobile_no = $('#booking_tm_mobile_no').val();  
        var enquiry_id = $('#enquiry_id').val();
        
        // alert(booking_tm_mobile_no);
        // alert(enquiry_id);

        if (booking_tm_mobile_no != '') {
            // alert('IN hiiiii');
            $.ajax({
                url: "<?php echo base_url(); ?>agent/booking_payment_details/send_otp",
                type: "post",
                data: {
                    enquiry_id: enquiry_id,
                    booking_tm_mobile_no: booking_tm_mobile_no
                },
                dataType: 'json',
                success: function(responce) {
                    if (responce != false && responce !='') {
                        console.log(responce);
                        // alert(responce);
                        // var booking_ref_no = $('#booking_ref_no').val(responce);
                        Swal.fire({
                        title: 'Check OTP',
                        text: 'Please check Resend OTP on mobile number: ' + booking_tm_mobile_no,
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Optionally, you can perform additional actions here
                        }
                    });
                        
                    }
                }
            });
        }
    });
});
</script>

<script>
    var fewSeconds = 5;
    $('#submit_otp').click(function(){
        // Ajax request
        var btn = $(this);
        btn.prop('disabled', true);
        setTimeout(function(){
            $("#re_send_otp").prop('disabled', false);
        }, fewSeconds*20000);
    });
</script>
<script>
    var fewSeconds = 5;
    $('#re_send_otp').click(function(){
        // Ajax request
        var btn = $(this);
        btn.prop('disabled', true);
        setTimeout(function(){
            btn.prop('disabled', false);
        }, fewSeconds*20000);
    });
</script>

<!-- <script>
$(document).ready(function(){
    $("#submit_otp").click(function btnclick() {
    $("#submit_otp").attr("disabled", true);
    $("#re_send_otp").delay(80000).attr("disabled", false);
    });
});
</script> -->

<script>
$("#final_booking_submit").click(function() {

    var verify_otp = $("#otp").val();
    var mobile_no = $('#booking_tm_mobile_no').val(); 
    // var booking_ref_no = $('#booking_ref_no').val(); 
    // alert(booking_ref_no);
    var enquiry_id = $('#enquiry_id').val(); 
    
    
    var journey_date  = $("#journey_date").val();
    
    var traveller_id  = $("#traveller_id").val();
    var enquiry_id    = $("#enquiry_id").val();
    var hotel_name_id    = $("#hotel_name_id").val();
    var package_date_id    = $("#package_date_id").val();
    var package_id    = $("#package_id").val();
    // alert(package_id);

    if (verify_otp != '') {
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>agent/booking_preview/verify_otp',
            data: {
                verify_otp: verify_otp,
                mobile_no: mobile_no,
                // booking_ref_no: booking_ref_no,
                enquiry_id: enquiry_id,
                journey_date: journey_date,
                traveller_id: traveller_id,
                enquiry_id: enquiry_id,
                hotel_name_id: hotel_name_id,
                package_date_id: package_date_id,
                package_id: package_id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                // alert(response);
                if (response == 'true') {
                    // alert('Doneeeee');
                    
                    alert('Verify OTP Sucessfully');
                    $("#final_booking_submit").prop('disabled', true);
                    $("#booking_submit_otp").prop('disabled', false);
                    window.location.href = "<?= base_url() ?>agent/srs_form/index/"+enquiry_id;

                } else {
                    alert('You Entered Wrong OTP. Please check it and submit right OTP');

                }
            },

        });
    }
    
});
</script>

<!-- <script>
$('#submit_otp').keyup(function(){

    var booking_tm_mobile_no = $("#booking_tm_mobile_no").val();
    var booking_amt = $("#booking_amt").val();
    var booking_amt = $("#select_transaction").val();
    // alert(total_travaller_count);

    if (booking_tm_mobile_no != '') {
        $("#submit_otp").prop('disabled', true)
        // alert('Matching!');
    } else {
        $("#submit_otp").prop('disabled', false)
        // alert('Not Matching!');
    }


});
</script> -->

<!-- <script>
    $(document).ready(function() {
    $('#submit_otp').attr('disabled',true);
    $('#booking_tm_mobile_no').keyup(function() {
        if ($(this).val().length !=0)
            $('#submit_otp').attr('disabled', false);            
        else
            $('#submit_otp').attr('disabled',true);
    })
     $('#booking_amt').keyup(function() {
        if ($(this).val().length !=0)
            $('#submit_otp').attr('disabled', false);            
        else
            $('#submit_otp').attr('disabled',true);
    })
});
</script> -->

<script>
// function validate() {
    
//     var valid = true;
//     valid = checkEmpty($("#booking_tm_mobile_no")) && checkEmpty($("#booking_amt")) ;
    
//         // $("#select_transaction").click(function() {
//         //   if($("select").val() == '' && valid!='')
//         //   $("#submit_otp").prop( "disabled", true);
//         //   else $("#submit_otp").prop( "disabled", false);
//         // });
     
//           $("#submit_otp").attr("disabled", true);
//           if (valid) {
//               $("#submit_otp").attr("disabled", false);
//           }
//   }
  
    //   $("#select_transaction").click(function() {
    //       if($("select").val() == '')
    //       $("#submit_otp").prop( "disabled", true);
    //       else $("#submit_otp").prop( "disabled", false);
    //   });
  
  
  function checkEmpty(obj) {
    var name = $(obj).attr("name");
    $("." + name + "-validation").html("");
    $(obj).css("border", "");
    if ($(obj).val() == "") {
      $(obj).css("border", "#FF0000 1px solid");
      $("." + name + "-validation").html("Required");
      return false;
    }
  
    return true;
  }
  
  // const select = document.getElementById('select_transaction');
  // const submitButton = document.getElementById('submit_otp');
  // document.getElementById('select_transaction').addEventListener('change', () => {
  //   if (select.value === '') {
  //     submitButton.disabled = true;
  //   } else {
  //     submitButton.disabled = false;
  //   }
  // });
  
</script>


<script>
$(document).ready(function(){
    $("#booking_start").prop('disabled', true);
    var btn_disabled = $("#btn_disabled").val();
    // alert(btn_disabled);

    if (btn_disabled=='yes'){
        $("#booking_start").prop('disabled', true)
        // alert('Matching!');
    } else {
        $("#booking_start").prop('disabled', false);
        // alert('Not Matching!');
    }
    // $("#btn_disabled").val("");


});
</script>

<script type='text/javascript'>

  $(document).ready(function(){

    <?php if(!empty($bus_info)){ ?>

        var js_array1 =<?php echo json_encode($final_booked_data);?>;

  <?php   }else{ ?>

        var js_array1=[];

   <?php  } ?>

    var booke_data = $('#booked_data').val();

    var is_main_page = $('#is_main_page').val();

    if(is_main_page=='no'){

     $('.seatCharts-seat').off('click');

    }
    // console.log(booke_data);

    for(var i=0; i<js_array1.length;i++)

    {
        var seat_data_id=js_array1[i];

        // console.log(seat_data_id);

        var abc="#"+seat_data_id;

        $(abc).css("color", "white");

        $(abc).off('click');

        $(abc).removeClass("available");

        $(abc).addClass("unavailable");
    }

  });

  </script>


<script type='text/javascript'>

$(document).ready(function(){



  var is_main_page = $('#is_main_page').val();



});

</script>

<script>  

 $(document).ready(function(){

  $(".seatCharts-seat").click(function() {  

        var enq_id =  $("#domestic_enquiry_id").val();

        var package_id =  $("#package_id").val();

        var tour_dates =  $("#tour_dates").val();

        var seat_orignal_id =  $(this).attr('id');

        var selected_seat =  $(this).attr('data_id');

        var seat_type =  $(this).attr('seat_type');

        var seat_price =  $(this).attr('seat_price');

        var btn_class =  $(this).attr('class').split(' ');

        // console.log(btn_class);



           if(seat_orignal_id != '' && $.inArray('hold', btn_class) == '-1')  

           {  

                $.ajax({  

                     url:"<?php echo base_url(); ?>agent/seat_type_room_type/seat_hold",  

                     method:"post",  

                     data:{

                        seat_orignal_id: seat_orignal_id,

                           enq_id: enq_id,

                           package_id: package_id,

                           seat_type:seat_type,

                            seat_price:seat_price,

                            tour_dates:tour_dates,

                             selected_seat:selected_seat,

                             btn_class:btn_class},  

                     dataType: 'json',

                     success:function(responce){

                         if(responce = 'true')

                         {

                          console.log('Seat On Hold');

                         }

                     }  

                });  

           }

          });



      });  

 </script>





<script>

function fetch_new_hold(){

        var enq_id =  $("#domestic_enquiry_id").val();

        var package_id =  $("#package_id").val();

        var tour_dates =  $("#tour_dates").val();

        var temp_array_hold = [];

   $.ajax({

  url: '<?php echo base_url(); ?>agent/seat_type_room_type/fetch_new_hold',

  method:"post",  

  data:{

        enq_id: enq_id,

        package_id: package_id,

        tour_dates:tour_dates

    },  

  dataType: 'json',

  success: function(response){  

     if(response.length>0){

        var temp_array_hold =response;

    }else{

        var temp_array_hold=[];

    }



          for(var i=0; i<temp_array_hold.length;i++)

  {

      var seat_data_id=temp_array_hold[i];



      var abc="#"+seat_data_id;

      $(abc).css("color", "white");

      $(abc).removeClass("available");

      $(abc).addClass("hold");



  }

  }

 });

}



$(document).ready(function(){

 setInterval(fetch_new_hold,5000);

});

</script>

<!-- for bus seat selected -->

 

<script>  

 $(document).ready(function(){

  $(".booknow_submit").click(function() {  

        var enq_id =  $("#domestic_enquiry_id").val();

        // var package_id =  $("#package_id").val();

        // var tour_dates =  $("#tour_dates").val();

 

        // var seat_type =  [];

        // var selected_seat = [];

        // var selected_seat_id = [];

        // var seat_price = [];

        // var seat_orignal_id = [];

 

        //   $('.selected').each(function ()

        //     {                

        //         var seat_book = $(this).attr('data_id');

        //         selected_seat.push($(this).attr('data_id'));

 

        //         var seat_book_id = $(this).attr('id');

        //         seat_orignal_id.push($(this).attr('id'));

        //     });

 

        //     $('.selected').each(function ()

        //     {                

        //         var seat_type_data = $(this).attr('seat_type');

        //         seat_type.push($(this).attr('seat_type'));

 

        //         var seat_price_data = $(this).attr('seat_price');

        //         seat_price.push($(this).attr('seat_price'))

        //     });

 

        //    if(selected_seat != '')  

        //    {  

        //         $.ajax({  

        //              url:"<?php //echo base_url(); ?>agent/seat_type_room_type/selected_bus_seat",  

        //              method:"post",  

        //              data:{selected_seat: selected_seat, enq_id: enq_id, package_id: package_id, seat_type:seat_type,

        //                  seat_price:seat_price,tour_dates:tour_dates,seat_orignal_id:seat_orignal_id},  

        //              dataType: 'json',

        //              success:function(responce){

        //                  if(responce = 'true')

        //                  {

        //                   console.log('now done');

                          window.location.href = "<?=base_url()?>agent/extra_services/index/"+enq_id;

                    //      }

                    //  }  

                });  

        //    }

        //   });

      });  

</script>
 

 

<script type='text/javascript'>

 

$(document).ready(function(){


    <?php if(!empty($bus_info)){ ?>

        var temp_array =<?php echo json_encode($temp_booking_data);?>;

// console.log('temp',temp_array);

  <?php   }else{ ?>

        var temp_array=[];

   <?php  } ?>

 

  var temp_booke_data = $('#temp_booked_data').val();

  var is_main_page = $('#is_main_page').val();

  for(var i=0; i<temp_array.length;i++)

  {

      var seat_data_id=temp_array[i];

 

      var abc="#"+seat_data_id;

      $(abc).css("color", "white");

      $(abc).removeClass("available");

      $(abc).addClass("selected");

 

  }

});

</script>

<script> 
function initializeValidation() { 
    $("form").validate({ 
        rules: 
        { 
            // Add your validation rules here 
            "first_name[]": 
            { required: true, 
                // Add other validation rules as needed
            }, 

            }, messages: 

            { 
                // Add custom error messages here, if needed 
                "first_name[]": 
                { 
                    required: "This field is required.", 
                }, 
            }, 
        }); 
    } 
</script>

<!-- ------------------------ -->

<script type="text/javascript">
function empty() {
    var x = document.getElementById("followup_date").value;
    // var y = document.getElementById("checkout").value;
    // alert(x); 

    if (x === "") {
        confirm('Are You Sure You Want To Insert This Record Without Followup Date?');
        return false;
    };
    return true;
}
</script>


<script>
    $(document).ready(function(){ 
    const target = document.getElementById('payment_final_booking_submit');
    target.disabled = true;
    $('#otp').on('keyup', function() {
        
        if($(this).val().length != 6) {
        target.disabled = true;
        // alert('Please enter six(6) digit OTP.');
        $('#least_count').html(" You must enter 6 digit OTP.");
        }
        else{
        target.disabled = false;
        }
    });
    });
</script>

<script>
  $(document).ready(function() {
    $('#mrandmrs').change(function(){
        // alert($(this).val());
      if($('#mrandmrs').val() == 'Mr' ){
        $('#male').prop("checked", true);
      } else if($('#mrandmrs').val() == 'Mrs' ) {
        $('#female').prop("checked", true);
      }
    });
  });
</script>




<!-- <script type="text/javascript">

    $(document).ready(function(){
        // alert('hiiiiii');
        var count = $('#seat_count_add').val();
        var total_count = $('#d_hidden').val();
            $(document).on('keyup', '.first_name', function() {

                var input_name = $(this).val();
                if(input_name!=''){
                    // alert('hiiiiiiii if');
                var attr_id_for_search = $(this).attr('attr_for_search');
                var orignal_id = $(this).attr('id');
                var did = $(this).val();
                // alert(did);

                $.ajax({
                    url: '<?//=base_url()?>agent/all_traveller_info/userNameList',
                    method: 'post',
                    data: {did: did},
                    dataType: 'json',

                    success: function(response){
                        $('#search-results'+attr_id_for_search).empty();
                        
                        $('#search-results'+attr_id_for_search).css("position","absolute");
                        $('#search-results'+attr_id_for_search).css("height","15vh");
                        $('#search-results'+attr_id_for_search).css("overflow-y","auto");
                        $('#search-results'+attr_id_for_search).css("width","12%");
                        $('#search-results'+attr_id_for_search).css("background-color","#eaeaeaba");
                        $('#search-results'+attr_id_for_search).css("list-style-type","none");
                        $('#search-results'+attr_id_for_search).css("padding-left","2%");
                        $('#search-results'+attr_id_for_search).css("cursor","pointer");

                        $.each(response, function(index, data){      
                            var listItem = $("<li>").text(data['first_name']);
                            listItem.on('click', function(){
                                $('#'+orignal_id).val(data['first_name']);
                                $('#search-results'+attr_id_for_search).empty();
                                $('#search-results'+attr_id_for_search).css("height","0vh");
                            });
                            $('#search-results'+attr_id_for_search).append(listItem);
                        });
                    }
                });
                }else{
                    // alert('hiiiiiiii else');

                    $('#search-results'+attr_id_for_search).empty();
                    $('#search-results'+attr_id_for_search).css("display","none");
                }
            

            });
    });
</script> -->


<script>
    $(document).ready(function() {
        var activeSearchResults = null; 
        // To keep track of the active search results

        $(document).on('keyup', '.first_name', function() {
            var input_name = $(this).val();
            var attr_id_for_search = $(this).attr('attr_for_search');
            var orignal_id = $(this).attr('id');
            var searchResults = $('#search-results' + attr_id_for_search);

            if (input_name !== '') {
                $.ajax({
                    url: '<?=base_url()?>agent/all_traveller_info/userNameList',
                    method: 'post',
                    data: {did: input_name},
                    dataType: 'json',
                    success: function(response) {
                        searchResults.empty();
                        if (response.length > 0) { 
                            searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['first_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['first_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });

                            activeSearchResults = searchResults; 
                        } else {
                            searchResults.empty().css("display", "none");
                            activeSearchResults = null; 
                        }
                    }
                });
            } else {
                searchResults.empty().css("display", "none");
                activeSearchResults = null; 
            }
        });

        $(document).on('click', function(event) {
            if (activeSearchResults && !$(event.target).closest(activeSearchResults).length) {
                activeSearchResults.empty().css("display", "none");
                activeSearchResults = null;
            }
        });
    });
</script>


<!-- <script>
    $(document).ready(function() {
        var activeSearchResults = null; 
        // To keep track of the active search results

        $(document).on('keyup', '.first_name', function() {
            var input_name = $(this).val();
            var attr_id_for_search = $(this).attr('attr_for_search');
            var orignal_id = $(this).attr('id');
            var searchResults = $('#search-results' + attr_id_for_search);

            if (input_name !== '') {
                $.ajax({
                    url: '<?//=base_url()?>agent/all_traveller_info/userNameList',
                    method: 'post',
                    data: {did: input_name},
                    dataType: 'json',
                    success: function(response) {
                        searchResults.empty();
                        if (response.length > 0) { 
                            searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['first_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['first_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });

                            activeSearchResults = searchResults; 
                        } else {
                            searchResults.empty().css("display", "none");
                            activeSearchResults = null; 
                        }
                    }
                });
            } else {
                searchResults.empty().css("display", "none");
                activeSearchResults = null; 
            }
        });

        $(document).on('click', function(event) {
            if (activeSearchResults && !$(event.target).closest(activeSearchResults).length) {
                activeSearchResults.empty().css("display", "none");
                activeSearchResults = null;
            }
        });
    });
</script> -->


<script>
    $(document).ready(function() {
        var activeSearchResults = null;

        $(document).on('blur', '.first_name', function() {
            // Textbox lost focus, close the list
            closeSearchResults();
        });

        $(document).on('keyup', '.first_name', function(e) {
            
                // Handle other key presses
                var input_name = $(this).val();
                var attr_id_for_search = $(this).attr('attr_for_search');
                var orignal_id = $(this).attr('id');
                var searchResults = $('#search-results' + attr_id_for_search);

                if (input_name !== '') {
                    $.ajax({
                        url: '<?=base_url()?>agent/all_traveller_info/userNameList',
                        method: 'post',
                        data: {did: input_name},
                        dataType: 'json',
                        success: function(response) {
                            searchResults.empty();
                            if (response.length > 0) {
                                // ... (code)
                                searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['first_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['first_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });

                                activeSearchResults = searchResults; 
                            } else {
                                searchResults.empty().css("display", "none");
                                activeSearchResults = null; 
                            }
                        }
                    });
                } else {
                    closeSearchResults();
                }
            
        });

        $(document).on('click', function(event) {
            if (activeSearchResults && !$(event.target).closest(activeSearchResults).length) {
                closeSearchResults();
            }
        });

        function closeSearchResults() {
            if (activeSearchResults) {
                activeSearchResults.empty().css("display", "none");
                activeSearchResults = null;
            }
        }
    });
</script>

<!-- <script>
    $(document).ready(function() {
        var activeSearchResults2 = null; 

        $(document).on('keyup', '.middle_name', function() {
            var input_name = $(this).val();
            var attr_id_for_search = $(this).attr('attr_for_search');
            var orignal_id = $(this).attr('id');
            var searchResults = $('#search-results2' + attr_id_for_search);

            if (input_name !== '') {
                $.ajax({
                    url: '<?//=base_url()?>agent/all_traveller_info/middle_NameList',
                    method: 'post',
                    data: {did: input_name},
                    dataType: 'json',
                    success: function(response) {
                        searchResults.empty();
                        if (response.length > 0) { 
                            searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['middle_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['middle_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });

                            activeSearchResults2 = searchResults; 
                            // Update active search results
                        } else {
                            searchResults.empty().css("display", "none");
                            activeSearchResults2 = null; 
                            // Reset active search results
                        }
                    }
                });
            } else {
                searchResults.empty().css("display", "none");
                activeSearchResults2 = null; 
                // Reset active search results
            }
        });

        // Hide search results when clicking outside
        $(document).on('click', function(event) {
            if (activeSearchResults2 && !$(event.target).closest(activeSearchResults2).length) {
                activeSearchResults2.empty().css("display", "none");
                activeSearchResults2 = null;
            }
        });
    });
    
</script> -->

<script>
    $(document).ready(function() {
        var activeSearchResults2 = null;

        

        $(document).on('blur', '.middle_name', function() {
            // Textbox lost focus, close the list
            closeSearchResults();
        });

        $(document).on('keyup', '.middle_name', function(e) {
           
                // Handle other key presses
                var input_name = $(this).val();
                var attr_id_for_search = $(this).attr('attr_for_search');
                var orignal_id = $(this).attr('id');
                var searchResults = $('#search-results2' + attr_id_for_search);

                if (input_name !== '') {
                    $.ajax({
                        url: '<?=base_url()?>agent/all_traveller_info/middle_NameList',
                        method: 'post',
                        data: {did: input_name},
                        dataType: 'json',
                        success: function(response) {
                            searchResults.empty();
                            if (response.length > 0) {
                                // ... (code)
                                searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['middle_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['middle_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });
                            
                                activeSearchResults2 = searchResults; 
                            } else {
                                searchResults.empty().css("display", "none");
                                activeSearchResults2 = null; 
                            }
                        }
                    });
                } else {
                    closeSearchResults();
                }
            
        });

        $(document).on('click', function(event) {
            if (activeSearchResults2 && !$(event.target).closest(activeSearchResults2).length) {
                closeSearchResults();
            }
        });

        function closeSearchResults() {
            if (activeSearchResults2) {
                activeSearchResults2.empty().css("display", "none");
                activeSearchResults2 = null;
            }
        }
    });
</script>

<!-- <script>
    $(document).ready(function() {
        var activeSearchResults3 = null; 

        $(document).on('keyup', '.last_name', function() {
            var input_name = $(this).val();
            var attr_id_for_search = $(this).attr('attr_for_search');
            var orignal_id = $(this).attr('id');
            var searchResults = $('#search-results3' + attr_id_for_search);

            if (input_name !== '') {
                $.ajax({
                    url: '<?//=base_url()?>agent/all_traveller_info/last_nameList',
                    method: 'post',
                    data: {did: input_name},
                    dataType: 'json',
                    success: function(response) {
                        searchResults.empty();
                        if (response.length > 0) { 
                            searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['last_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['last_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });

                            activeSearchResults3 = searchResults; 
                            // Update active search results
                        } else {
                            searchResults.empty().css("display", "none");
                            activeSearchResults3 = null; 
                            // Reset active search results
                        }
                    }
                });
            } else {
                searchResults.empty().css("display", "none");
                activeSearchResults3 = null; 
                // Reset active search results
            }
        });

        // Hide search results when clicking outside
        $(document).on('click', function(event) {
            if (activeSearchResults3 && !$(event.target).closest(activeSearchResults3).length) {
                activeSearchResults3.empty().css("display", "none");
                activeSearchResults3 = null;
            }
        });
    });
</script> -->

<script>
    $(document).ready(function() {
        var activeSearchResults3 = null;

        

        $(document).on('blur', '.last_name', function() {
            // Textbox lost focus, close the list
            closeSearchResults();
        });

        $(document).on('keyup', '.last_name', function(e) {
           
                // Handle other key presses
                var input_name = $(this).val();
                var attr_id_for_search = $(this).attr('attr_for_search');
                var orignal_id = $(this).attr('id');
                var searchResults = $('#search-results3' + attr_id_for_search);

                if (input_name !== '') {
                    $.ajax({
                        url: '<?=base_url()?>agent/all_traveller_info/last_nameList',
                        method: 'post',
                        data: {did: input_name},
                        dataType: 'json',
                        success: function(response) {
                            searchResults.empty();
                            if (response.length > 0) {
                                // ... (code)
                                searchResults.css({
                                "position": "absolute",
                                "background-color": "#eaeaeaba",
                                "list-style-type": "none",
                                "padding-left": "2%",
                                "cursor": "pointer",
                                "height": "15vh", 
                                "width": "12%",
                                "overflow-y": "scroll",
                                "display": "block"
                            });

                            $.each(response, function(index, data) {
                                var listItem = $("<li>").text(data['last_name']);
                                listItem.on('click', function() {
                                    $('#' + orignal_id).val(data['last_name']);
                                    searchResults.empty().css("display", "none");
                                });
                                searchResults.append(listItem);
                            });
                            
                                activeSearchResults3 = searchResults; 
                            } else {
                                searchResults.empty().css("display", "none");
                                activeSearchResults3 = null; 
                            }
                        }
                    });
                } else {
                    closeSearchResults();
                }
            
        });

        $(document).on('click', function(event) {
            if (activeSearchResults3 && !$(event.target).closest(activeSearchResults3).length) {
                closeSearchResults();
            }
        });

        function closeSearchResults() {
            if (activeSearchResults3) {
                activeSearchResults3.empty().css("display", "none");
                activeSearchResults3 = null;
            }
        }
    });
</script>


<!-- dependency for booking preview page upi and QR code  -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // district change
    $('#select_upi_no').change(function(){
      var did = $(this).val();
      var imageUrl='<?php echo base_url(); ?>uploads/QR_code_image/'
    //   alert(did); 
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>agent/booking_preview/get_upi_qr_code',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#qr_code_image').find('img').not(':first').remove();
       
          $.each(response,function(index,data){   
            $('#qr_code_image').append('<img src="' + imageUrl + data['image_name'] + '" alt="' + data['image_name'] + '">'); 
          });
         
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // district change
    $('#select_upi_no').change(function(){
        var did = $('#select_upi_no').val();
    selectedOption = $("#select_upi_no option:selected");
      var self_data = selectedOption.attr('attr_self');
    //   alert(self_data);
      var other_data = selectedOption.attr('attr_other');
    //   alert(other_data);

    //   alert(did); 
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>agent/booking_preview/get_upi_code',
        method: 'post',
        data: {self_data: self_data,other_data: other_data,did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#self_upi_no').find('option').not(':first').remove();
       
          $.each(response,function(index,data){   
            $('#self_upi_no').val(data['upi_id']);
          });
         
        }
     });
   });
 });
 </script>

 <!-- Agent add info (state,district,taluka) start -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // district change
    $('#agent_state').change(function(){
      var did = $(this).val();
    //   alert(did); 
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>agent/profile/get_district',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#agent_district').find('option').not(':first').remove();
       
          $.each(response,function(index,data){       
             $('#agent_district').append('<option value="'+data['id']+'">'+data['district']+'</option>');
          });
         
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // district change
    $('#agent_district').change(function(){
      var did = $(this).val();
    //   alert(did); 
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>agent/profile/get_taluka',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#agent_taluka').find('option').not(':first').remove();
       
          $.each(response,function(index,data){       
             $('#agent_taluka').append('<option value="'+data['id']+'">'+data['taluka']+'</option>');
          });
         
        }
     });
   });
 });
 </script>
<!-- ----------------------------------- -->

<!-- <script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php //echo base_url();?>";
 
  $(document).ready(function(){
 
    // district change
    $('#select_qr_upi_no').change(function(){
      var imageUrl='<?php //echo base_url(); ?>uploads/QR_code_image/'
        var qr_did = $('#select_qr_upi_no').val();
        // alert(qr_did);
    qrselectedOption = $("#select_qr_upi_no option:selected");
      var qr_self_data = qrselectedOption.attr('attr_self');
    //   alert(self_data);
      var qr_other_data = qrselectedOption.attr('attr_other');
    //   alert(other_data);

    //   alert(did); 
      // AJAX request
      $.ajax({
        url:'<?//=base_url()?>agent/booking_preview/get_QR_code',
        method: 'post',
        data: {qr_self_data: qr_self_data,qr_other_data: qr_other_data,qr_did: qr_did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
          $('#qr_mode_code_image').empty();
       
          $.each(response,function(index,data){   
            $('#qr_mode_code_image').append('<img src="' + imageUrl + data['qr_code_image'] + '" alt="' + data['qr_code_image'] + '">'); 
            // $('#qr_code_image').val(data['upi_id']);
          });
         
        }
     });
   });
 });
 </script> -->

 <script type='text/javascript'>
  // baseURL variable
  var baseURL = "<?php echo base_url(); ?>";

  $(document).ready(function () {
    // district change
    $('#select_qr_upi_no').change(function () {
      var imageUrl = '<?php echo base_url(); ?>uploads/QR_code_image/';
      var qr_did = $('#select_qr_upi_no').val();

      qrselectedOption = $("#select_qr_upi_no option:selected");
      var qr_self_data = qrselectedOption.attr('attr_self');
      var qr_other_data = qrselectedOption.attr('attr_other');

      // AJAX request
      $.ajax({
        url: '<?= base_url() ?>agent/booking_preview/get_QR_code',
        method: 'post',
        data: {
          qr_self_data: qr_self_data,
          qr_other_data: qr_other_data,
          qr_did: qr_did
        },
        dataType: 'json',
        success: function (response) {
          console.log(response);

          // Clear existing images
          $('#qr_mode_code_image').empty();
          $('#qr_mobile_number').find('option').not(':first').remove();

          $.each(response, function (index, data) {
            $('#qr_mode_code_image').append('<img src="' + imageUrl + data['qr_code_image'] + '" alt="' + data['image_name'] + '">');
            $('#qr_mobile_number').val(data['mobile_number']);
        });

        }
      });
    });
  });
</script>

 
<!-- dependency for booking preview page upi and QR code  -->

<script>
    
function transaction_upi_validate() {
    var valid = true;
    valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_upi_no")) && checkEmpty($("#upi_payment_type"));
          $("#submit_otp").attr("disabled", true);
          if (valid) {
              $("#submit_otp").attr("disabled", false);
          }
  }

function payment_type_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_upi_no")) && checkEmpty($("#upi_payment_type")) && checkEmpty($("#upi_no"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function utr_no_validate() {
    var valid = true;
    valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_upi_no")) && checkEmpty($("#upi_payment_type")) && checkEmpty($("#upi_no")) && checkEmpty($("#reason"));
          $("#submit_otp").attr("disabled", true);
          if (valid) {
              $("#submit_otp").attr("disabled", false);
          }
  }

function reason_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_upi_no")) && checkEmpty($("#upi_payment_type")) && checkEmpty($("#upi_no")) && checkEmpty($("#reason"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function qr_hoder_name_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_qr_upi_no")) && checkEmpty($("#qr_mobile_number"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function qr_mobile_no_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_qr_upi_no")) && checkEmpty($("#qr_mobile_number")) && checkEmpty($("#qr_payment_type")) && checkEmpty($("#qr_upi_no"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function qr_payment_type_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_qr_upi_no")) && checkEmpty($("#qr_mobile_number")) && checkEmpty($("#qr_payment_type")) && checkEmpty($("#qr_upi_no"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function qr_utr_no_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#select_qr_upi_no")) && checkEmpty($("#qr_mobile_number")) && checkEmpty($("#qr_payment_type")) && checkEmpty($("#qr_upi_no"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function cheque_no_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#cheque")) && checkEmpty($("#bank_name"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function cheque_banknm_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#cheque")) && checkEmpty($("#bank_name")) && checkEmpty($("#drawn_on_date"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function cheque_date_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#cheque")) && checkEmpty($("#bank_name")) && checkEmpty($("#drawn_on_date"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netpayment_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netbank_accno_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no")) && checkEmpty($("#net_acc_holder_nm"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netbank_accno_holder_nm_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no")) && checkEmpty($("#net_acc_holder_nm")) && checkEmpty($("#net_banking_branch_name"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netbank_branch_nm_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no")) && checkEmpty($("#net_acc_holder_nm")) && checkEmpty($("#net_banking_branch_name")) && checkEmpty($("#net_banking_utr_no"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netbank_utr_no_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no")) && checkEmpty($("#net_acc_holder_nm")) && checkEmpty($("#net_banking_branch_name")) && checkEmpty($("#net_banking_utr_no")) && checkEmpty($("#netbanking_bank_name"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netbank_bank_nm_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no")) && checkEmpty($("#net_acc_holder_nm")) && checkEmpty($("#net_banking_branch_name")) && checkEmpty($("#net_banking_utr_no")) && checkEmpty($("#netbanking_bank_name")) && checkEmpty($("#netbanking_date"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}

function netbank_date_validate() {
var valid = true;
valid = checkEmpty($("#select_transaction")) && checkEmpty($("#netbanking_payment_type_neft")) && checkEmpty($("#netbanking_payment_type_rtgs")) && checkEmpty($("#netbanking_payment_type_imps")) && checkEmpty($("#net_banking_acc_no")) && checkEmpty($("#net_acc_holder_nm")) && checkEmpty($("#net_banking_branch_name")) && checkEmpty($("#net_banking_utr_no")) && checkEmpty($("#netbanking_bank_name")) && checkEmpty($("#netbanking_date"));
        $("#submit_otp").attr("disabled", true);
        if (valid) {
            $("#submit_otp").attr("disabled", false);
        }
}


  
  function checkEmpty(obj) {
    var name = $(obj).attr("name");
    $("." + name + "-validation").html("");
    $(obj).css("border", "");
    if ($(obj).val() == "") {
      $(obj).css("border", "#FF0000 1px solid");
      $("." + name + "-validation").html("Required");
      return false;
    }
  
    return true;
  }
  
</script>

<script>  

 $(document).ready(function(){

  $(".submit_back").click(function() {  
    // alert('fsdfsdfsfsfdsfs');

        var enq_id =  $("#domestic_enquiry_id").val();
                            var confirmation = confirm("Are You Sure You Want Save This Record?");     // Check if the user clicked "OK" in the confirmation dialog    
                            if (confirmation) {      
                                // Redirect to another page     
                                window.location.href = "<?=base_url()?>agent/seat_type_room_type/add/"+enq_id;     
                                }
                });  
      });  

</script>

<script>
$(document).ready(function() {
    $("#back-button_booking_preview").click(function() {
        var enquiry_id = $('#enquiry_id').val();
        var package_id = $('#package_id').val();
        var journey_date = $('#journey_date').val();
        var package_date_id = $('#package_date_id').val();
        var traveller_id = $('#traveller_id').val();
        var booking_payment_details_id = $('#booking_payment_details_id').val();

            // alert('IN hiiiii');
            $.ajax({
                url: "<?php echo base_url(); ?>agent/booking_preview/cust_otp_back_btn",
                type: "post",
                data: {
                    enquiry_id: enquiry_id,
                    booking_payment_details_id: booking_payment_details_id,
                    package_id: package_id,
                    journey_date: journey_date,
                    package_date_id: package_date_id,
                    traveller_id: traveller_id
                },
                // dataType: 'json',
                success: function(responce) {
                    
                    if (responce != false && responce !='') {
                        // alert(responce);
                        var booking_ref_no = $('#booking_ref_no').val(responce);
                        window.location.href = "<?=base_url()?>agent/extra_services/index/"+enquiry_id;

                    }
                    window.location.href = "<?=base_url()?>agent/extra_services/index/"+enquiry_id;
                }
            });
    // }
    });
});
</script>

<script>

$(document).ready(function() {

    var booking_preview = $('#netbanking_date').val();
    var booking_preview1 = $('#reason').val();
    // alert(booking_preview1);
    var booking_preview2 = $('#qr_upi_no').val();
    var booking_preview3 = $('#drawn_on_date').val();
    var booking_preview4 = $('#return_total_cash_amt').val();

    if(booking_preview!= ''){
        $("#submit_otp").attr("disabled", false);
    } else if(booking_preview1!= ''){
        $("#submit_otp").attr("disabled", false);
    }else if(booking_preview2!= ''){
        $("#submit_otp").attr("disabled", false);
    }else if(booking_preview3!= ''){
        $("#submit_otp").attr("disabled", false);
    }else if(booking_preview4!= ''){
        $("#submit_otp").attr("disabled", false);
    }
});

</script>


<script>
document.getElementById("back-button").addEventListener("click", function() {
    var iid = $("#domestic_enquiry_id").val();
    
    if (confirm('Are You Sure You Want Save This Record?')) {
        // User clicked "OK," do nothing or submit the form here
        
    } else {

        window.location.href = "<?=base_url()?>agent/seat_checker/index/"+iid;
        // window.history.back();
    }
});
</script>
<!-- <script>
document.getElementById("back-button").addEventListener("click", function() {
    var iid = $("#domestic_enquiry_id").val();

    Swal.fire({
        title: "Are You Sure You Want to Save This Record?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            // User clicked "Yes," do nothing or submit the form here
        } else {
            window.location.href = "<?//=base_url()?>agent/seat_checker/index/" + iid;
        }
    });
});
</script> -->

<!-- <script>
    $(document).ready(function() {
        $('#back-button').on('click', function(e) {
            e.preventDefault();
            var iid = $("#domestic_enquiry_id").val();

            Swal.fire({
                title: "Are You Sure You Want to Save This Record?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes," do nothing or submit the form here

                    $('#booking_basic_info').validate({ // initialize the plugin
                        errorPlacement: function($error, $element) {
                            $error.appendTo($element.closest("div"));
                        },
                        rules: {
                            booking_office: {
                                required: true,
                            },
                            boarding_office_location: {
                                required: true,
                            },
                            mrandmrs: {
                                required: true,
                            },
                            surname: {
                                required: true,
                                noSpace: true,
                            },
                            first_name: {
                                required: true,
                                noSpace: true,
                            },
                            middle_name: {
                                required: true,
                                noSpace: true,
                            },
                            tour_no: {
                                required: true,
                            },
                            tour_date: {
                                required: true,
                            },
                            hotel_type: {
                                required: true,
                            },
                            seat_count: {
                                required: true,
                            },
                            mobile_number: {
                                required: true,
                                maxlength: 10,
                                minlength: 10
                            },
                            media_source_name: {
                                required: true,
                            },
                            gender: {
                                required: true,
                            }

                        },

                        messages: {
                            booking_office: {
                                required: "Please enter booking office",
                            },
                            boarding_office_location: {
                                required: "Please select boarding office location",
                            },
                            mrandmrs: {
                                required: "Please select Mr / Mrs",
                            },
                            surname: {
                                required: "Please enter surname",
                            },
                            first_name: {
                                required: "Please enter first name",
                            },
                            middle_name: {
                                required: "Please enter middle name",
                            },
                            tour_no: {
                                required: "Please select tour no",
                            },
                            tour_date: {
                                required: "Please select tour date",
                            },
                            hotel_type: {
                                required: "Please enter hotel type",
                            },
                            seat_count: {
                                required: "Please enter seat count",
                            },
                            mobile_number: {
                                required: "Please enter mobile number",
                                maxlength: "Please enter maximum 10 digit number",
                                minlength: "Please enter minimum 10 digit number"
                            },
                            media_source_name: {
                                required: "Please select media source name",
                            },
                            gender: {
                                required: "Please select gender",
                            }
                        }
                    });
                 
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                    alert('elseeeeeeeeee');
                    window.location.href = "<?//=base_url()?>agent/seat_checker/index/" + iid;
                    // Alternatively, you can use window.history.back();
                }
            });
        });
    });
</script> -->

<!-- <script>
        $(document).ready(function() {
            $('#back-button').on('click', function(e) {
                e.preventDefault();
                var iid = $("#domestic_enquiry_id").val();
 
                Swal.fire({
                    title: "Are You Sure You Want to Save This Record?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#booking_basic_info').validate({
                            errorPlacement: function($error, $element) {
                            $error.appendTo($element.closest("div"));
                            },
                            rules: {
                                booking_office: {
                                required: true,
                            },
                            boarding_office_location: {
                                required: true,
                            },
                            mrandmrs: {
                                required: true,
                            },
                            surname: {
                                required: true,
                                noSpace: true,
                            },
                            first_name: {
                                required: true,
                                noSpace: true,
                            },
                            middle_name: {
                                required: true,
                                noSpace: true,
                            },
                            tour_no: {
                                required: true,
                            },
                            tour_date: {
                                required: true,
                            },
                            hotel_type: {
                                required: true,
                            },
                            seat_count: {
                                required: true,
                            },
                            mobile_number: {
                                required: true,
                                maxlength: 10,
                                minlength: 10
                            },
                            media_source_name: {
                                required: true,
                            },
                            gender: {
                                required: true,
                            }
                            },
                            messages: {
                                booking_office: {
                                required: "Please enter booking office",
                            },
                            boarding_office_location: {
                                required: "Please select boarding office location",
                            },
                            mrandmrs: {
                                required: "Please select Mr / Mrs",
                            },
                            surname: {
                                required: "Please enter surname",
                            },
                            first_name: {
                                required: "Please enter first name",
                            },
                            middle_name: {
                                required: "Please enter middle name",
                            },
                            tour_no: {
                                required: "Please select tour no",
                            },
                            tour_date: {
                                required: "Please select tour date",
                            },
                            hotel_type: {
                                required: "Please enter hotel type",
                            },
                            seat_count: {
                                required: "Please enter seat count",
                            },
                            mobile_number: {
                                required: "Please enter mobile number",
                                maxlength: "Please enter maximum 10 digit number",
                                minlength: "Please enter minimum 10 digit number"
                            },
                            media_source_name: {
                                required: "Please select media source name",
                            },
                            gender: {
                                required: "Please select gender",
                            }
                            },
                        });
 
                        // Trigger validation
                        if ($('#booking_basic_info').valid()) {
                            // Form is valid, you can continue with your actions
                            console.log('Form is valid!');
                            
                        }
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        alert('Cancelled');
                        window.location.href = "<?//=base_url()?>agent/seat_checker/index/" + iid;
                    }
                });
            });
        });
</script> -->

<script>
document.getElementById("back-button_all_traveller").addEventListener("click", function() {
    var iid = $("#domestic_enquiry_id").val();
    
    if (confirm('Are You Sure You Want Save This Record?')) {
        // User clicked "OK," do nothing or submit the form here
        
    } else {
        // $("#all_traveller_info").validate().resetForm();  error
        // jQuery('#all_traveller_info').unbind('submit').submit();

        window.location.href = "<?=base_url()?>agent/booking_basic_info/add/"+iid;
        // window.history.back();
    }
});
</script>

<script>
document.getElementById("traveller_address_info").addEventListener("click", function() {
    var iid = $("#domestic_enquiry_id").val();
    
    if (confirm('Are You Sure You Want Save This Record?')) {
        // User clicked "OK," do nothing or submit the form here
        
    } else {
        // $("#all_traveller_info").validate().resetForm();  error
        // jQuery('#all_traveller_info').unbind('submit').submit();

        window.location.href = "<?=base_url()?>agent/all_traveller_info/add/"+iid;
        // window.history.back();
    }
});
</script>

<script>
document.getElementById("back-button_seat_type").addEventListener("click", function() {
    var iid = $("#domestic_enquiry_id").val();
    
    if (confirm('Are You Sure You Want Save This Record?')) {
        // User clicked "OK," do nothing or submit the form here
        
    } else {
        // $("#all_traveller_info").validate().resetForm();  error
        // jQuery('#all_traveller_info').unbind('submit').submit();

        window.location.href = "<?=base_url()?>agent/all_traveller_info/add/"+iid;
        // window.history.back();
    }
});
</script>

<script>
document.getElementById("back-button_booking_preview").addEventListener("click", function() {
    var iid = $("#enquiry_id").val();
    
    if (confirm('Are You Sure You Want Save This Record?')) {
        // User clicked "OK," do nothing or submit the form here
        
    } else {
        // $("#all_traveller_info").validate().resetForm();  error
        // jQuery('#all_traveller_info').unbind('submit').submit();

        window.location.href = "<?=base_url()?>agent/extra_services/index/"+iid;
        // window.history.back();
    }
});
</script>


<!-- ===========Booking confirm Otp ==================================== -->
<script>
    $(document).ready(function() {
        $("#booking_submit_otp").click(function() {
            var crediential_mobile_no = $('#crediential_mobile_no').val();
            var enquiry_id = $('#enquiry_id').val();
            var package_id = $('#package_id').val();
            var journey_date = $('#journey_date').val();
            var package_date_id = $('#package_date_id').val();
            var traveller_id = $('#traveller_id').val();
            var booking_payment_details_id = $('#booking_payment_details_id').val();

            var formData = new FormData();
            formData.append('enquiry_id', enquiry_id);
            formData.append('booking_payment_details_id', booking_payment_details_id);
            formData.append('package_id', package_id);
            formData.append('journey_date', journey_date);
            formData.append('package_date_id', package_date_id);
            formData.append('traveller_id', traveller_id);
            formData.append('crediential_mobile_no', crediential_mobile_no);

            $.ajax({
                url: "<?php echo base_url(); ?>agent/srs_form/booking_confirm_otp",
                type: "post",
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting the content type
                success: function(response) {
                    if (response !== false && response !== '') {
                        var booking_ref_no = $('#booking_ref_no').val(response);

                        Swal.fire({
                        title: 'Check OTP',
                        text: 'Please check OTP on mobile number: ' + crediential_mobile_no,
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Optionally, you can perform additional actions here
                        }
                    });
                    }
                }
            });
        });
    });
</script>
<script>
    var fewSeconds = 5;
    $('#booking_submit_otp').click(function(){
        // Ajax request
        var btn = $(this);
        btn.prop('disabled', true);
        setTimeout(function(){
            $("#booking_re_send_otp").prop('disabled', false);
        }, fewSeconds*20000);
    });
</script>
<script>
    var fewSeconds = 5;
    $('#booking_re_send_otp').click(function(){
        // Ajax request
        var btn = $(this);
        btn.prop('disabled', true);
        setTimeout(function(){
            btn.prop('disabled', false);
        }, fewSeconds*20000);
    });
</script>
<!-- <script>
    $('#otp').on('keyup',function(){
            $("#booking_submit_otp").prop('disabled', false);
    });
</script> -->
<script>
    $(document).ready(function(){ 
    const target = document.getElementById('booking_confirm_submit');
    target.disabled = true;
    $('#booking_otp').on('keyup', function() {
        
        if($(this).val().length != 6) {
        target.disabled = true;
        // alert('Please enter six(6) digit OTP.');
        $('#booking_least_count').html(" You must enter 6 digit OTP.");
        }
        else{
        target.disabled = false;
        }
    });
    });
</script>


<script>
$(document).ready(function() {
    $("#booking_re_send_otp").click(function() {
        // alert('hiiiiiiiiiii');
        // var booking_tm_mobile_no = $('#mobile_no').val();  
        var crediential_mobile_no = $('#crediential_mobile_no').val();  
        var enquiry_id = $('#enquiry_id').val();
        
        // alert(booking_tm_mobile_no);
        // alert(enquiry_id);

        if (crediential_mobile_no != '') {
            // alert('IN hiiiii');
            $.ajax({
                url: "<?php echo base_url(); ?>agent/srs_form/booking_resend_otp",
                type: "post",
                data: {
                    enquiry_id: enquiry_id,
                    // booking_tm_mobile_no: booking_tm_mobile_no,
                    crediential_mobile_no: crediential_mobile_no
                },
                dataType: 'json',
                success: function(responce) {
                    if (responce != false && responce !='') {
                        Swal.fire({
                        title: 'Check OTP',
                        text: 'Please check Resend OTP on mobile number: ' + crediential_mobile_no,
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Optionally, you can perform additional actions here
                        }
                    });
                        
                    }
                }
            });
        }
    });
});
</script>


<!-- <script>
    $('#booking_confirm_submit').click(function(){
        // Toggle visibility
        $("#srs_final_submit").css('display', 'block');
        $(this).prop('disabled', true);
    });
</script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $("#booking_confirm_submit").click(function() {

    var verify_otp = $("#booking_otp").val(); 
    var enquiry_id = $('#enquiry_id').val(); 
    var journey_date  = $("#journey_date").val();
    var traveller_id  = $("#traveller_id").val();
    var hotel_name_id    = $("#hotel_name_id").val();
    var package_date_id    = $("#package_date_id").val();
    var package_id    = $("#package_id").val();

    var crediential_mobile_no = $('#crediential_mobile_no').val();
    
    if (verify_otp != '') {
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>agent/srs_form/booking_confirm_verify_otp',
            data: {
                verify_otp: verify_otp,
                crediential_mobile_no: crediential_mobile_no,
                enquiry_id: enquiry_id,
                journey_date: journey_date,
                traveller_id: traveller_id,
                hotel_name_id: hotel_name_id,
                package_date_id: package_date_id,
                package_id: package_id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                // alert(response);
                if (response == 'true') {
                    // Replace the standard alert with SweetAlert success message
                    Swal.fire({
                        title: 'Verify OTP Successfully',
                        icon: 'success',
                    }).then((result) => {
                        // Redirect to the specified URL after the user clicks "OK"
                        if (result.isConfirmed) {
                            window.location.href = "<?= base_url() ?>agent/booking_confirm_page/index/" + enquiry_id;
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Wrong OTP',
                        text: 'You Entered Wrong OTP. Please check it and submit the right OTP',
                        icon: 'error',
                    });

                }
            },

        });
    }
    
});
</script>

<script>
document.getElementById("booking_confirm_back").addEventListener("click", function() {
    var iid = $("#enquiry_id").val();
    
    if (confirm('Are You Sure You Want Without booking confirm go back?')) {
        // User clicked "OK," do nothing or submit the form here
        window.location.href = "<?=base_url()?>agent/booking_preview/index/"+iid;
    } else {
        // $("#all_traveller_info").validate().resetForm();  error
        // jQuery('#all_traveller_info').unbind('submit').submit();

        window.location.href = "<?=base_url()?>agent/srs_form/index/"+iid;
        // window.history.back();
    }
});
</script>


<!-- ===========Booking confirm Otp ==================================== -->

<!-- Booking Enquiry Multiple tour select time alert script -->
<!-- Your JavaScript code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        var previousSelections = []; // Variable to store previous selections
        var sweetAlertShown = false; // Flag to track if SweetAlert has been shown

        $('#tour_number').on('change', function() {
            var selectedOptions = $(this).val();

            if (selectedOptions && selectedOptions.length > 1 && !sweetAlertShown){
                Swal.fire({
                    title: "Do you want to select multiple tours?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update the previous selections if the user chooses to select multiple tours
                        previousSelections = selectedOptions.slice();
                        sweetAlertShown = true; // Set to true to prevent further SweetAlerts
                        $('#tour_number').prop('multiple', true); // Allow multiple selections
                    } else {
                        // If the user chooses not to select multiple tours, keep the previous selections
                        $(this).val(previousSelections);
                        $('#tour_number').trigger('change.select2'); // Refresh Select2
                        $('#tour_number').prop('multiple', false); // Restrict to single selection
                    }
                });
            } else {
                // Update previous selections if only one option is selected
                previousSelections = selectedOptions ? selectedOptions.slice() : [];
            }
        });
    });
</script>
<!-- End Booking Enquiry Multiple tour select time alert script -->

<!-- extra services ajax code  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $("#extra_service_submit").click(function() {
    
    // alert(other_services); die;
    var enquiry_id = $('#enquiry_id').val();
    var journey_date  = $("#journey_date").val();
    var traveller_id  = $("#traveller_id").val();
    var hotel_name_id    = $("#hotel_name_id").val();
    var package_date_id    = $("#package_date_id").val();
    var package_id    = $("#package_id").val();
    // var crediential_mobile_no = $('#crediential_mobile_no').val();
    var extra_services = $('input[name="extra_services"]:checked').val();
    
    var select_services = [''];
    var other_services = '';
    if(extra_services === 'yes'){    
    var select_services = $('#select_services').val();
    // alert(select_services);
    // var other_services = $('#other_services').val();
    if (select_services == 'Other'){
        var other_services = $('#other_services').val();
        // alert(other_services);
        if(other_services == ''){
        Swal.fire({
            title: 'Please Enter Services',
            text: 'Enter Other Services.',
            icon: 'error',
        });
        return;
    }
    }
    }

    if (!extra_services) {
        Swal.fire({
            title: 'Error',
            text: 'Please select extra services',
            icon: 'error',
        });
        return;
    }

    if (extra_services === 'yes' && select_services.length === 0) {
    Swal.fire({
      title: 'Please Select Services',
      text: 'You must select at least one service.',
      icon: 'error',
    });
    return;
    }

    
    
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>agent/extra_services/booking_confirm_verify_otp2',
            data: {
                other_services: other_services,
                extra_services: extra_services,
                select_services: select_services,
                enquiry_id: enquiry_id,
                journey_date: journey_date,
                traveller_id: traveller_id,
                hotel_name_id: hotel_name_id,
                package_date_id: package_date_id,
                package_id: package_id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                // alert('hiiiiiii');
                if (responce = true) {
                        // alert('hioooooooooooooo');
                        window.location.href = "<?= base_url() ?>agent/booking_preview/index/" + enquiry_id;
                    }
            },

        });
    
});
</script>
<script type="text/javascript">
    function tour_title(val){
    var element=document.getElementById('other_service_div');
	var element2=document.getElementById('other_services');
    if(val=='Other')
    element.style.display='block';
    else  
    element.style.display='none';
	element2.value="";	
    }
</script>


<!-- back button -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.getElementById("back_button_extra_services").addEventListener("click", function() {
    var iid = $("#enquiry_id").val();
    
    if (confirm('Are You Sure You Want Save This Record?')) {
        // User clicked "OK," do nothing or submit the form here
    // $("#back_button_extra_services").click(function() {
    
    // alert(other_services); die;
    var enquiry_id = $('#enquiry_id').val();
    var journey_date  = $("#journey_date").val();
    var traveller_id  = $("#traveller_id").val();
    var hotel_name_id    = $("#hotel_name_id").val();
    var package_date_id    = $("#package_date_id").val();
    var package_id    = $("#package_id").val();
    // var crediential_mobile_no = $('#crediential_mobile_no').val();
    var extra_services = $('input[name="extra_services"]:checked').val();
    
    var select_services = [''];
    if(extra_services === 'yes'){    
    var select_services = $('#select_services').val();
    // alert(select_services); die;

    if (select_services == 'Other'){
        var other_services = $('#other_services').val();
        if(other_services == ''){
        Swal.fire({
            title: 'Please Enter Services',
            text: 'Enter Other Services.',
            icon: 'error',
        });
        return;
    }
    }
    }

    if (!extra_services) {
        Swal.fire({
            title: 'Error',
            text: 'Please select extra services',
            icon: 'error',
        });
        return;
    }

    if (extra_services === 'yes' && select_services.length === 0) {
    Swal.fire({
      title: 'Please Select Services',
      text: 'You must select at least one service.',
      icon: 'error',
    });
    return;
    }

    
    
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>agent/extra_services/booking_confirm_verify_otp_back_button',
            data: {
                other_services: other_services,
                extra_services: extra_services,
                select_services: select_services,
                enquiry_id: enquiry_id,
                journey_date: journey_date,
                traveller_id: traveller_id,
                hotel_name_id: hotel_name_id,
                package_date_id: package_date_id,
                package_id: package_id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                // alert('hiiiiiii');
                if (responce = true) {
                        // alert('hioooooooooooooo');
                        window.location.href = "<?= base_url() ?>agent/seat_type_room_type/add_bus/" + enquiry_id;
                    }
            },

        });
    
// });

} else {
        // $("#all_traveller_info").validate().resetForm();  error
        // jQuery('#all_traveller_info').unbind('submit').submit();

        window.location.href = "<?=base_url()?>agent/seat_type_room_type/add_bus/"+iid;
        // window.history.back();
    }

});
</script>
<!-- extra services ajax code  -->

<!-- booking payment details hide and show part -->
<!-- <script type="text/javascript">
    function payment_otp(val){
    var element=document.getElementById('other_payment_mode_div');
	var element2=document.getElementById('select_transaction');
    if(val=='Now')
    element.style.display='block';
    else  
    element.style.display='none';
	element2.value="";	
    }
</script> -->

<!-- <script type="text/javascript">
    function payment_otp(val) {
        var element_tr = document.getElementById('other_payment_mode_tr');
        var element_div = document.getElementById('other_payment_mode_div');
        var element_select = document.getElementById('select_transaction');

        if (val == 'Now') {
            element_tr.style.display = 'block';
            element_div.style.display = 'block';
        } else {
            element_tr.style.display = 'none';
            element_div.style.display = 'none';
        }

        element_select.value = "";
    }
    
</script> -->


<script type="text/javascript">
    function payment_otp(val) {
        var element_tr_now = document.getElementById('other_payment_mode_tr');
        var element_div_now = document.getElementById('other_payment_mode_div');
        var element_select = document.getElementById('select_transaction');
        
        var element_tr_later = document.getElementById('give_reason_tr');
        var give_reson_submit = document.getElementById('give_reson_submit');

        var element=document.getElementById('net_banking_tr');
        var upi_no_div=document.getElementById('upi_no_div');
        var rq_div=document.getElementById('rq_div');
        var mob_no_div=document.getElementById('cheque_tr');
        var cash_no_div=document.getElementById('cash_tr');

        var payment_type_tr=document.getElementById('payment_type_tr');
        var booking_amount_tr=document.getElementById('booking_amount_tr');
        var pending_amount_tr=document.getElementById('pending_amount_tr');

        if (val == 'Now') {
            element_tr_now.style.display = 'contents';
            element_div_now.style.display = 'block';
            element_tr_later.style.display = 'none';
            give_reson_submit.style.display = 'none';
            payment_type_tr.style.display = 'contents';
            booking_amount_tr.style.display = 'table-row';
            pending_amount_tr.style.display = 'table-row';

        } else if (val == 'Later') {
            element_tr_now.style.display = 'none';
            element_div_now.style.display = 'none';
            element_tr_later.style.display = 'contents';
            give_reson_submit.style.display = 'block';
            element.style.display = 'none';
            upi_no_div.style.display = 'none';
            rq_div.style.display = 'none';
            mob_no_div.style.display = 'none';
            payment_type_tr.style.display = 'none';
            booking_amount_tr.style.display = 'none';
            pending_amount_tr.style.display = 'none';

        } else {
            element_tr_now.style.display = 'none';
            element_div_now.style.display = 'none';
            element_tr_later.style.display = 'none';
            give_reson_submit.style.display = 'none';

        }

        element_select.value = "";

    }
</script>
<!-- booking payment details hide and show part -->
<!-- booking payemnt details send otp -->
<script>
$(document).ready(function() {
    $("#submit_otp").click(function() {
        var mobile_no = $('#booking_tm_mobile_no').val();  
        var final_amt = $('#final_amt').val();

        var payment_type = $("input[name='payment_type']:checked").val();
        var selectedId = "";
        if (payment_type === undefined) {
            // No radio button is checked, insert a default value
            payment_type = ""; // You can change this to your desired default value
        } else {
            // Loop through radio buttons to find the one with the selected value
            $("input[name='payment_type']").each(function() {
                if ($(this).val() === payment_type) {
                    selectedId = $(this).attr("id");
                    return false; // Exit the loop once a match is found
                }
            });
        }

        var booking_amt = $('#booking_amt').val(); 
        var pending_amt = $('#pending_amt').val();
        // var payment_now_later = $('#payment_now_later').val();
        var payment_now_later = $("input[name='payment_now_later']:checked").val();


        var upi_no = $('#upi_no').val();
        var cheque = $('#cheque').val();
        var bank_name = $('#bank_name').val();
        var drawn_on_date = $('#drawn_on_date').val();


        // var netbanking_payment_type = $('#netbanking_payment_type').val();
        var netbanking_payment_type = $("input[name='netbanking_payment_type']:checked").val();
        var selectedId = "";
        if (netbanking_payment_type === undefined) {
            // No radio button is checked, insert a default value
            netbanking_payment_type = ""; // You can change this to your desired default value
        } else {
            // Loop through radio buttons to find the one with the selected value
            $("input[name='netbanking_payment_type']").each(function() {
                if ($(this).val() === netbanking_payment_type) {
                    selectedId = $(this).attr("id");
                    return false; // Exit the loop once a match is found
                }
            });
        }


        // alert(netbanking_payment_type);
        var net_banking_utr_no = $('#net_banking_utr_no').val();
        var net_banking_acc_no = $('#net_banking_acc_no').val();
        var net_acc_holder_nm = $('#net_acc_holder_nm').val();
        var net_banking_branch_name = $('#net_banking_branch_name').val();
        var netbanking_bank_name = $('#netbanking_bank_name').val();
        var netbanking_date = $('#netbanking_date').val();

        var upi_holder_name = $('#select_upi_no').val();
        var upi_payment_type = $('#upi_payment_type').val();
        // alert(upi_payment_type);
        var upi_self_no = $('#self_upi_no').val();
        var upi_reason = $('#reason').val();


        var qr_holder_name = $('#select_qr_upi_no').val();
        var qr_mobile_number = $('#qr_mobile_number').val();
        var qr_payment_type = $('#qr_payment_type').val();
        var qr_upi_no = $('#qr_upi_no').val();


        var select_transaction =($('#select_transaction :selected').val());
        // alert(select_transaction);
        // var cash_2000 = $('#cash_2000').val();
        // var total_cash_2000 = $('#total_cash_2000').val();
        var cash_500 = $('#cash_500').val();
        var total_cash_500 = $('#total_cash_500').val();
        // alert(total_cash_500);
        var cash_200 = $('#cash_200').val();
        var total_cash_200 = $('#total_cash_200').val();
        var cash_100 = $('#cash_100').val();
        var total_cash_100 = $('#total_cash_100').val();
        var cash_50 = $('#cash_50').val();
        var total_cash_50 = $('#total_cash_50').val();
        var cash_20 = $('#cash_20').val();
        var total_cash_20 = $('#total_cash_20').val();
        var cash_10 = $('#cash_10').val();
        var total_cash_10 = $('#total_cash_10').val();

        var cash_5 = $('#cash_5').val();
        var total_cash_5 = $('#total_cash_5').val();
        // alert(total_cash_5);
        var cash_2 = $('#cash_2').val();
        var total_cash_2 = $('#total_cash_2').val();
        var cash_1 = $('#cash_1').val();
        var total_cash_1 = $('#total_cash_1').val();

        var total_cash_amt = $('#total_cash_amt').val();

        var return_cash_500 = $('#return_cash_500').val();
        var return_total_cash_500 = $('#return_total_cash_500').val();
        // alert(return_total_cash_500);
        var return_cash_200 = $('#return_cash_200').val();
        var return_total_cash_200 = $('#return_total_cash_200').val();
        var return_cash_100 = $('#return_cash_100').val();
        var return_total_cash_100 = $('#return_total_cash_100').val();
        var return_cash_50 = $('#return_cash_50').val();
        var return_total_cash_50 = $('#return_total_cash_50').val();
        var return_cash_20 = $('#return_cash_20').val();
        var return_total_cash_20 = $('#return_total_cash_20').val();
        var return_cash_10 = $('#return_cash_10').val();
        var return_total_cash_10 = $('#return_total_cash_10').val();
        var return_cash_5 = $('#return_cash_5').val();
        var return_total_cash_5 = $('#return_total_cash_5').val();
        var return_cash_2 = $('#return_cash_2').val();
        var return_total_cash_2 = $('#return_total_cash_2').val();
        var return_cash_1 = $('#return_cash_1').val();
        var return_total_cash_1 = $('#return_total_cash_1').val();

        var return_total_cash_amt = $('#return_total_cash_amt').val();

        // alert(mobile_no);
        var enquiry_id = $('#enquiry_id').val();
        var package_id = $('#package_id').val();
        var journey_date = $('#journey_date').val();
        var package_date_id = $('#package_date_id').val();
        var traveller_id = $('#traveller_id').val();


        // var extra_sevices_id = $('#extra_sevices_id').val();
        var booking_payment_details_id = $('#booking_payment_details_id').val();
        var return_customer_booking_payment_id = $('#return_customer_booking_payment_id').val();

        // var extra_services = $('input[name="extra_services"]:checked').val();

        // if(extra_services=='yes'){
        //     // alert('yessssssssssss');
        //     var select_services = $('#select_services').val();
        // }else {
        //     // alert('nooooooooooooooooo');
        //     var select_services =[];
        // }

        // alert(select_services);
        
        
        // alert(extra_services); 
        // alert(select_services); 
        if (mobile_no != '') {
            // alert('IN hiiiii');
            $.ajax({
                url: "<?php echo base_url(); ?>agent/booking_payment_details/cust_otp",
                type: "post",
                data: {
                    enquiry_id: enquiry_id,
                    booking_payment_details_id: booking_payment_details_id,
                    return_customer_booking_payment_id: return_customer_booking_payment_id,
                    package_id: package_id,
                    journey_date: journey_date,
                    package_date_id: package_date_id,
                    traveller_id: traveller_id,
                    booking_amt: booking_amt,
                    final_amt: final_amt,
                    payment_type: payment_type,
                    mobile_no: mobile_no,
                    pending_amt: pending_amt,
                    payment_now_later: payment_now_later,
                    upi_no: upi_no,
                    cheque: cheque,
                    bank_name: bank_name,
                    drawn_on_date: drawn_on_date,

                    netbanking_payment_type: netbanking_payment_type,
                    net_banking_acc_no: net_banking_acc_no,
                    net_acc_holder_nm: net_acc_holder_nm,
                    net_banking_branch_name: net_banking_branch_name,
                    net_banking_utr_no: net_banking_utr_no,
                    netbanking_bank_name: netbanking_bank_name,
                    netbanking_date: netbanking_date,
                    
                    upi_holder_name: upi_holder_name,
                    upi_payment_type: upi_payment_type,
                    upi_self_no: upi_self_no,
                    upi_reason: upi_reason,
                    
                    qr_holder_name: qr_holder_name,
                    qr_mobile_number: qr_mobile_number,
                    qr_payment_type: qr_payment_type,
                    qr_upi_no: qr_upi_no,
                    
                    select_transaction: select_transaction,
                    // cash_2000: cash_2000,
                    // total_cash_2000: total_cash_2000,
                    cash_500: cash_500,
                    total_cash_500: total_cash_500,
                    cash_200: cash_200,
                    total_cash_200: total_cash_200,
                    cash_100: cash_100,
                    total_cash_100: total_cash_100,
                    cash_50: cash_50,
                    total_cash_50: total_cash_50,
                    cash_20: cash_20,
                    total_cash_20: total_cash_20,
                    cash_10: cash_10,
                    total_cash_10: total_cash_10,
                    cash_5: cash_5,
                    total_cash_5: total_cash_5,
                    cash_2: cash_2,
                    total_cash_2: total_cash_2,
                    cash_1: cash_1,
                    total_cash_1: total_cash_1,
                    total_cash_amt: total_cash_amt,

                    return_cash_500: return_cash_500,
                    return_total_cash_500: return_total_cash_500,
                    return_cash_200: return_cash_200,
                    return_total_cash_200: return_total_cash_200,
                    return_cash_100: return_cash_100,
                    return_total_cash_100: return_total_cash_100,
                    return_cash_50: return_cash_50,
                    return_total_cash_50: return_total_cash_50,
                    return_cash_20: return_cash_20,
                    return_total_cash_20: return_total_cash_20,
                    return_cash_10: return_cash_10,
                    return_total_cash_10: return_total_cash_10,
                    return_cash_5: return_cash_5,
                    return_total_cash_5: return_total_cash_5,
                    return_cash_2: return_cash_2,
                    return_total_cash_2: return_total_cash_2,
                    return_cash_1: return_cash_1,
                    return_total_cash_1: return_total_cash_1,
                    return_total_cash_amt: return_total_cash_amt,

                    // select_services: select_services,
                    // extra_services: extra_services
                },
                // dataType: 'json',
                success: function(responce) {
                    if (responce != false && responce !='') {
                        // alert(responce);
                        var booking_ref_no = $('#booking_ref_no').val(responce);
                        Swal.fire({
                        title: 'Check OTP',
                        text: 'Please check OTP on mobile number: ' + mobile_no,
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Optionally, you can perform additional actions here
                        }
                    });
                    }
                }
            });
        }
    });
});
</script>
<!-- booking payemnt details send otp -->
<!-- booking payemnt details verify otp -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$("#payment_final_booking_submit").click(function() {

    var verify_otp = $("#otp").val();
    var mobile_no = $('#booking_tm_mobile_no').val(); 
    // var booking_ref_no = $('#booking_ref_no').val(); 
    // alert(booking_ref_no);
    var enquiry_id = $('#enquiry_id').val(); 
    
    
    var journey_date  = $("#journey_date").val();
    
    var traveller_id  = $("#traveller_id").val();
    var enquiry_id    = $("#enquiry_id").val();
    var hotel_name_id    = $("#hotel_name_id").val();
    var package_date_id    = $("#package_date_id").val();
    var package_id    = $("#package_id").val();
    // alert(package_id);

    if (verify_otp != '') {
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>agent/booking_payment_details/verify_otp',
            data: {
                verify_otp: verify_otp,
                mobile_no: mobile_no,
                // booking_ref_no: booking_ref_no,
                enquiry_id: enquiry_id,
                journey_date: journey_date,
                traveller_id: traveller_id,
                enquiry_id: enquiry_id,
                hotel_name_id: hotel_name_id,
                package_date_id: package_date_id,
                package_id: package_id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                    if (response == true) {
                    Swal.fire({
                        title: 'Success',
                        text: 'Verify OTP Successfully',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#submit_otp").prop('disabled', true);
                            window.location.href = "<?= base_url() ?>agent/payment_receipt/index/"+enquiry_id;
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'You Entered Wrong OTP. Please check it and submit the correct OTP',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },

        });
    }
    
});
</script>
<!-- booking payemnt details verify otp -->
<!-- booking payemnt details submit and proceed -->
<script>
$(document).ready(function() {
    $("#reason_submit_button").click(function() {
        // alert('hiiiiiiiiiii');
        var mobile_no = $('#booking_tm_mobile_no').val();  
        var final_amt = $('#final_amt').val();

        var payment_type = $("input[name='payment_type']:checked").val();
        var selectedId = "";
        if (payment_type === undefined) {
            // No radio button is checked, insert a default value
            payment_type = ""; // You can change this to your desired default value
        } else {
            // Loop through radio buttons to find the one with the selected value
            $("input[name='payment_type']").each(function() {
                if ($(this).val() === payment_type) {
                    selectedId = $(this).attr("id");
                    return false; // Exit the loop once a match is found
                }
            });
        }

        var booking_amt = $('#booking_amt').val(); 
        var pending_amt = $('#pending_amt').val();
        var payment_now_later = $("input[name='payment_now_later']:checked").val();
        // alert(payment_now_later);
        var later_payment_reason = $('#later_payment_reason').val();
        var enquiry_id = $('#enquiry_id').val();
        var package_id = $('#package_id').val();
        var journey_date = $('#journey_date').val();
        var package_date_id = $('#package_date_id').val();
        var traveller_id = $('#traveller_id').val();

        var booking_payment_details_id = $('#booking_payment_details_id').val();
        var return_customer_booking_payment_id = $('#return_customer_booking_payment_id').val();

        
        if (mobile_no != '') {
            // alert('IN hiiiii');
            $.ajax({
                url: "<?php echo base_url(); ?>agent/booking_payment_details/reason_submit_proceed",
                type: "post",
                data: {
                    enquiry_id: enquiry_id,
                    later_payment_reason: later_payment_reason,
                    booking_payment_details_id: booking_payment_details_id,
                    return_customer_booking_payment_id: return_customer_booking_payment_id,
                    package_id: package_id,
                    journey_date: journey_date,
                    package_date_id: package_date_id,
                    traveller_id: traveller_id,
                    booking_amt: booking_amt,
                    final_amt: final_amt,
                    payment_type: payment_type,
                    mobile_no: mobile_no,
                    pending_amt: pending_amt,
                    payment_now_later: payment_now_later
                },
                // dataType: 'json',
                success: function(responce) {
                    if (responce != false && responce !='') {
                        // alert(responce);
                        var booking_ref_no = $('#booking_ref_no').val(responce);
                        Swal.fire({
                        title: 'Payment Details Info',
                        text: 'This Payment Details Fill On Todays Only',
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Optionally, you can perform additional actions here
                            window.location.href = "<?= base_url() ?>agent/pending_booking_details/index";
                        }
                    });
                    }
                }
            });
        }
    });
});
</script>
<!-- booking payemnt details submit and proceed -->

<!-- <script>
function later_reason(element){
    var payment_type = $('input[name="payment_type"]:checked').val();
    var booking_amt = $('#booking_amt').val();
    var payment_now_later = $('input[name="payment_now_later"]:checked').val();
    var later_payment_reason = $(element).val();

    if (later_payment_reason !== '' || payment_type !== '' || booking_amt !== '' || payment_now_later !== '') {
        $("#reason_submit_button").prop("disabled", false);
    } else {
        $("#reason_submit_button").prop("disabled", true);
    }
}
</script> -->

<script>
function later_reason(element){
    var payment_type = $('input[name="payment_type"]:checked').val();
    var booking_amt = $('#booking_amt').val();
    var payment_now_later = $('input[name="payment_now_later"]:checked').val();
    var later_payment_reason = $(element).val();

    if (later_payment_reason !== '' && payment_type !== '' && booking_amt !== '' && payment_now_later !== '') {
        $("#reason_submit_button").prop("disabled", false);
    } else {
        $("#reason_submit_button").prop("disabled", true);
    }
}
</script>

<!-- pay pending amount  -->







