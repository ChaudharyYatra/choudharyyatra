</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!--<b>Version</b> 3.2.0-->
    </div>
    <center><strong>Copyright &copy; <?php echo date("Y"); ?>.</strong> All rights reserved.</center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- jquery-validation -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-validation/additional-methods.min.js"></script>
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
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/dropzone/min/dropzone.min.js"></script>



<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>



<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
  $(function () {
    // Summernote
    $('#full_description').summernote()

  })
</script>


<script>
  $(function () {
    // Summernote
    $('#iternary').summernote()

  })
</script>

<script>
  $(function () {
    // Summernote
    $('#place_description').summernote()

  })
</script>

<script>
  $(function () {
    // Summernote
    $('#inclusion').summernote()

  })
</script>


<script>
  $(function () {
    // Summernote
    $('#terms_conditions').summernote()

  })
</script>


<script>
  $(function () {
    // Summernote
    $('#contact_us').summernote()

  })
</script>

<!-- <script>
  function checkPasswordStrength() {
	var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	var password = $('#password').val().trim();
	if (password.length < 6) {
		$('#password-strength-status').removeClass();
		$('#password-strength-status').addClass('weak-password text-danger');
		$('#password-strength-status').html("Password should be atleast 6 characters with include alphabets, numbers and special characters.");
	} else {
		if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('strong-password');
			$('#password-strength-status').html("Strong password");
		}
		else {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('medium-password text-danger');
			$('#password-strength-status').html("Password should be atleast 6 characters with include alphabets, numbers and special characters.");
		}
	}
}
</script> -->

<script>
$(function () {
//   $.validator.setDefaults({
//     submitHandler: function () {
//       alert( "Form successful submitted!" );
//     }
//   });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>




<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>


<script>
  function validateregForms()
{
  $("#firstname_error").hide();
  $("#lastname_error").hide();
  $("#emailid_error").hide();
  $("#phoneno_error").hide();
  $("#password_error").hide();

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


<!--// Package date add - Mahesh-->
<script>
    var i=1;
$('#add_more').click(function() {
   // alert('hhhh');
        i++;
var structure = $('<div class="row" style="width:100% !important" id="new_row'+i+'">'+
                '<div class="col-md-5">'+
                '<div class="form-group">'+
             '<label>Date:</label>'+
                '<div class="input-group">'+
                    '<input type="date" name="journey_date[]" class="form-control" min="<?php echo date("Y-m-d"); ?>" required/>'+
               '</div>'+
               '</div>'+
                 '</div>'+

                '<div class="col-md-5">'+
                '<div class="form-group">'+
                '<label>Year Slot</label>'+
                '<select class="form-control" style="width: 100%;" name="year_slot[]" id="year_slot" required="required">'+
                    '<option value="">Select Year Slot</option>'+
                    '<option value="April to September">April to September</option>'+
                    '<option value="October to March">October to March</option>'+
                '</select>'+
                    '</div>'+
                '</div>'+



                //    '<div class="col-md-2">'+
                //          '<div class="form-group">'+
                //             '<label>Single Seat Cost</label>'+
                //             '<input type="number" class="form-control" name="single_seat_cost[]" id="tour_cost1" placeholder="Enter Single Seat Cost">'+
                //           '</div>'+
                //   '</div>'+
                //    '<div class="col-md-2">'+
                //          '<div class="form-group">'+
                //             '<label>Twin Sharing Cost</label>'+
                //             '<input type="number" class="form-control" name="twin_seat_cost[]" id="tour_cost" placeholder="Enter Twin Sharing Cost">'+
                //           '</div>'+
                //   '</div>'+
                //    '<div class="col-md-2">'+
                //          '<div class="form-group">'+
                //             '<label>3/4 Sharing Cost</label>'+
                //             '<input type="number" class="form-control" name="three_four_sharing_cost[]" id="tour_cost" placeholder="Enter 3/4 Sharing Cos">'+
                //           '</div>'+
                //   '</div>'+
                '<div class="col-md-2 pt-4 d-flex justify-content-center align-self-center">'+
                    '<div class="form-group">'+
                    '<label></label>'+
                        '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'+
                    '</div>'+
                '</div>'+
          '</div>');
$('#main_row').append(structure);

});


$(document).on('click', '.btn_remove', function(){
       var button_id = $(this).attr("id");
       $('#new_row'+button_id+'').remove();
  });

</script>




 <script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 1850 || width > 1900 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 1130 || height > 1170)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_reviews").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 280 || width > 320 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 280 || height > 320)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_guide").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
                img.onload = function () {
            //alert('iiiii');
        var width=this.width;
         var height=this.height;
         var size = file.size;
	     if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 300 || width > 340 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 330 || height > 370)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }
	};
    }




        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>

 $(document).ready(function(){
  // var i = '0';

    var newFields = $('');

    $("#total_days").keyup(function(e){
        e.preventDefault();
        var n = this.value || 0;
        //alert(n);
         $('#myInput').val(n);
        if (n+1) {
            if (n > newFields.length) {
                addFields(n);

            } else {
                removeFields(n);
            }
        }
    });

    function addFields(n) {
        for (i = newFields.length; i < n; i++) {
            var day=i+1;
             var input = $('<div class="col-md-2">'+
                              '<div class="form-group">'+
                                '<label>Day Number</label>'+
                                '<input type="number" class="form-control" name="day_number[]" id="day_number" placeholder="Enter Day Number" required value="'+day+'">'+
                              '</div>'+
                    '</div>'+

                    '<div class="col-md-5">'+
                        '<div class="form-group">'+
                          '<label>Upload Image '+day+'</label><br>'+
                          '<input type="file" name="image_name[]" id="image_name" required="required">'+
                          '<br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>'+
                        '</div>'+
                    '</div>'+

                        '<div class="col-md-5">'+
                             '<div class="form-group">'+
                            '<label>Itinerary For Day '+day+' <span class="text-danger">*</span></label>'+
                            '<textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"></textarea>'+
                    '</div></div>');
            var newInput = input.clone();

            newFields = newFields.add(newInput);
            newInput.appendTo('#main_row');
        }
    }

    function removeFields(n) {
        var removeField = newFields.slice(n).remove();
        newFields = newFields.not(removeField);
    }

        //  for (i = 0; i <= n; i++) {
        //     var newInput = input.clone();

        //     newFields = newFields.add(newInput);
        //     newInput.appendTo('#newFields');
        // }

    });

// });

 </script>


<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_basic").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 200 || width > 240 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 40 || height > 60)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_social").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 780 || width > 820 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 780 || height > 820)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_gallery").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 680 || width > 720 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 630 || height > 670)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_package").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
         var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 780 || width > 820 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 510 || height > 550)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_international").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 780 || width > 820 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 510 || height > 550)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<script>
 $(document).ready(function(){
var _URL = window.URL || window.webkitURL;
$("#image_name_privacy").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['application/pdf']) == -1) {
            $('#submit_slider').prop('disabled', true);
            $('#pdf_format').show();
    }else{
        $('#submit_slider').prop('disabled', false);
        $('#pdf_format').hide();
    }
    }
});
});
</script>

<script>
 $(document).ready(function(){
var _URL = window.URL || window.webkitURL;
$("#image_name_terms").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['application/pdf']) == -1) {
            $('#submit_slider').prop('disabled', true);
            $('#pdf_format').show();
    }else{
        $('#submit_slider').prop('disabled', false);
        $('#pdf_format').hide();
    }
    }
});
});
</script>

<script>
 $(document).ready(function(){
var _URL = window.URL || window.webkitURL;
$("#pdf_name_package").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['application/pdf']) == -1) {
            $('#submit_slider').prop('disabled', true);
            $('#pdf_format').show();
    }else{
        $('#submit_slider').prop('disabled', false);
        $('#pdf_format').hide();
    }
    }
});
});
</script>

<script>
 $(document).ready(function(){
var _URL = window.URL || window.webkitURL;
$("#image_name_cancel").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['application/pdf']) == -1) {
            $('#submit_slider').prop('disabled', true);
            $('#pdf_format').show();
    }else{
        $('#submit_slider').prop('disabled', false);
        $('#pdf_format').hide();
    }
    }
});
});
</script>


<script>
 $(document).ready(function(){
      $('#agent_email').change(function(event){
           var email = $('#agent_email').val();
           //alert(email);
           if(email != '')
           {
                $.ajax({
                     url:"<?php echo base_url(); ?>admin/agent/check_email_add_avalibility",
                     method:"POST",
                     data:{email:email},
                     success:function(data){
                         if(data == true)
                         {
                            $('#email_result').html('<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email address already exist..! Please use another email address.</label>');
                            $('#btn_agent').prop('disabled', true)

                         }else
                         {
                             $('#email_result').html('');
                             $('#btn_agent').prop('disabled', false)
                         }
                     }
                });
           }
      });
 });
 </script>


<script>
 $(document).ready(function(){
      $('#email_edit').change(function(event){
           var email = $('#email_edit').val();
           var id = $('#agent_id').val();
           if(email != '')
           {
                $.ajax({
                     url:"<?php echo base_url(); ?>admin/agent/check_email_edit_avalibility",
                     method:"POST",
                     data:{email:email, agent_id:id},
                     success:function(data){
                         if(data == true)
                         {
                            $('#email_result').html('<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email address already exist..! Please use another email address.</label>');
                            $('#btn_agent').prop('disabled', true)

                         }else
                         {
                             $('#email_result').html('');
                             $('#btn_agent').prop('disabled', false)
                         }
                     }
                });
           }
      });
 });
 </script>

 <script>
 $(document).ready(function(){
      $('#package_title').keyup(function(event){
           var package_title = $('#package_title').val();
           //alert(email);
           if(package_title != '')
           {
                $.ajax({
                     url:"<?php echo base_url(); ?>admin/package_mapping/check_package_title_avalibility",
                     method:"POST",
                     data:{package_title:package_title},
                     success:function(data){
                         if(data == true)
                         {
                            $('#pack_title_result').html('<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Package Title already exist..! Please use another Package title.</label>');
                            $('#btn_pack_mapping').prop('disabled', true)

                         }else
                         {
                             $('#pack_title_result').html('');
                             $('#btn_pack_mapping').prop('disabled', false)
                         }
                     }
                });
           }
      });
 });
 </script>

 <script>
 $(document).ready(function(){
      $('#package_title').keyup(function(event){
           var package_title = $('#package_title').val();
           var package_id = $('#package_id').val();
           if(package_title != '')
           {
                $.ajax({
                     url:"<?php echo base_url(); ?>admin/package_mapping/check_package_title_avalibility_edit",
                     method:"POST",
                     data:{package_title:package_title, package_id:package_id},
                     success:function(data){
                         if(data == true)
                         {
                            $('#pack_title_result').html('<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Package Title already exist..! Please use another Package title</label>');
                            $('#btn_pack_mapping').prop('disabled', true)

                         }else
                         {
                             $('#pack_title_result').html('');
                             $('#btn_pack_mapping').prop('disabled', false)
                         }
                     }
                });
           }
      });
 });
 </script>


<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_award").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#submit_slider').prop('disabled', true)
    }else{
        img.onload = function () {
        var width=this.width;
         var height=this.height;
         var size = file.size;
        // alert(size);
         if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 680 || width > 720 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 630 || height > 670)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#submit_slider').prop('disabled', true)
        }else if(isValid)
        {
            $('#submit_slider').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#submit_slider').prop('disabled', true)
        }


        };
    }
        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

<!-- jquery validation on add slider -->
<script>
$(document).ready(function () {

$('#sliderform').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        title: {
            required: true,
        },
        sub_title: {
            required: true,
        },
        description: {
            required: true,
        },
        image_name: {
            required: true,
        },
    },

    messages :{
        title : {
            required : "Please enter title",
        },
        sub_title : {
            required : "Please enter subtitle",
        },
        description : {
            required : "Please enter description",
        },
        image_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on add slider -->

<!-- jquery validation on edit slider -->
<script>
$(document).ready(function () {

$('#editsliderform').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        title: {
            required: true,
        },
        sub_title: {
            required: true,
        },
        description: {
            required: true,
        },
        old_img_name: {
            required: true,
        },
    },

    messages :{
        title : {
            required : "Please enter title",
        },
        sub_title : {
            required : "Please enter subtitle",
        },
        description : {
            required : "Please enter description",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit slider -->

<!-- jquery validation on add website basic structure -->
<script>
$(document).ready(function () {

$('#add_websitestructure').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        contact_number: {
            required: true,
            maxlength: 10,
            minlength:10
        },
        location: {
            required: true,
        },
        email_address: {
            required: true,
            email: true
        },
        website_link: {
            required: true,
        },
        facebook: {
            required: true,
        },
        twitter: {
            required: true,
        },
        instagram: {
            required: true,
        },
        linkedin: {
            required: true,
        },
        company_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        image_name: {
            required: true,
        },
        map: {
            required: true,
        }
    },

    messages :{
        contact_number : {
            required : "Please enter contact number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        location : {
            required : "Please enter location",
        },
        email_address : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        website_link : {
            required : "Please enter website link",
        },
        facebook : {
            required : "Please enter facebook link",
        },
        twitter : {
            required : "Please enter youtube link",
        },
        instagram : {
            required : "Please enter instagram link",
        },
        linkedin : {
            required : "Please enter linkedin link",
        },
        company_name : {
            required : "Please enter company name",
        },
        short_description : {
            required : "Please enter short description",
        },
        image_name : {
            required : "Please upload image",
        },
        map : {
            required : "Please enter map link",
        },
    }
});

});

</script>
<!-- jquery validation on add website basic structure -->

<!-- jquery validation on edit website basic structure -->
<script>
$(document).ready(function () {

$('#edit_websitestructure').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        contact_number: {
            required: true,
            maxlength: 10,
            minlength:10,
        },
        location: {
            required: true,
        },
        email_address: {
            required: true,
            email: true
        },
        website_link: {
            required: true,
        },
        facebook: {
            required: true,
        },
        twitter: {
            required: true,
        },
        instagram: {
            required: true,
        },
        linkedin: {
            required: true,
        },
        company_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        old_img_name: {
            required: true,
        },
        map: {
            required: true,
        }
    },

    messages :{
        contact_number : {
            required : "Please enter contact number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number",
        },
        location : {
            required : "Please enter location",
        },
        email_address : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        website_link : {
            required : "Please enter website link",
        },
        facebook : {
            required : "Please enter facebook link",
        },
        twitter : {
            required : "Please enter youtube link",
        },
        instagram : {
            required : "Please enter instagram link",
        },
        linkedin : {
            required : "Please enter linkedin link",
        },
        company_name : {
            required : "Please enter company name",
        },
        short_description : {
            required : "Please enter short description",
        },
        old_img_name : {
            required : "Please upload image",
        },
        map : {
            required : "Please enter map link",
        },
    }
});

});

</script>
<!-- jquery validation on edit website basic structure -->

<!-- jquery validation on add core feature -->
<script>
$(document).ready(function () {

$('#add_corefeature').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        feature_one_title: {
            required: true,
            maxlength: 15
        },
        feature_one_description: {
            required: true,
            maxlength: 55
        },
        feature_two_title: {
            required: true,
            maxlength: 15
        },
        feature_two_description: {
            required: true,
            maxlength: 55
        },
        feature_three_title: {
            required: true,
            maxlength: 15
        },
        feature_three_description: {
            required: true,
            maxlength: 55
        },
        feature_four_title: {
            required: true,
            maxlength: 15
        },
        feature_four_description: {
            required: true,
            maxlength: 55
        }
    },

    messages :{
        feature_one_title : {
            required : "Please enter feature one title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_one_description : {
            required : "Please enter feature one description",
            maxlength: "Please enter maximum 55 character"
        },
        feature_two_title : {
            required : "Please enter feature two title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_two_description : {
            required : "Please enter feature two description",
            maxlength: "Please enter maximum 55 character"
        },
        feature_three_title : {
            required : "Please enter feature three title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_three_description : {
            required : "Please enter feature three description",
            maxlength: "Please enter maximum 55 character"
        },
        feature_four_title : {
            required : "Please enter feature four title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_four_description : {
            required : "Please enter feature four description",
            maxlength: "Please enter maximum 55 character"
        }
    }
});

});

</script>
<!-- jquery validation on add core feature -->

<!-- jquery validation on edit core feature -->
<script>
$(document).ready(function () {

$('#edit_corefeature').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        feature_one_title: {
            required: true,
            maxlength: 15
        },
        feature_one_description: {
            required: true,
            maxlength: 55
        },
        feature_two_title: {
            required: true,
            maxlength: 15
        },
        feature_two_description: {
            required: true,
            maxlength: 55
        },
        feature_three_title: {
            required: true,
            maxlength: 15
        },
        feature_three_description: {
            required: true,
            maxlength: 55
        },
        feature_four_title: {
            required: true,
            maxlength: 15
        },
        feature_four_description: {
            required: true,
            maxlength: 55
        }
    },

    messages :{
        feature_one_title : {
            required : "Please enter feature one title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_one_description : {
            required : "Please enter feature one description",
            maxlength: "Please enter maximum 55 character"
        },
        feature_two_title : {
            required : "Please enter feature two title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_two_description : {
            required : "Please enter feature two description",
            maxlength: "Please enter maximum 55 character"
        },
        feature_three_title : {
            required : "Please enter feature three title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_three_description : {
            required : "Please enter feature three description",
            maxlength: "Please enter maximum 55 character"
        },
        feature_four_title : {
            required : "Please enter feature four title",
            maxlength: "Please enter maximum 15 character"
        },
        feature_four_description : {
            required : "Please enter feature four description",
            maxlength: "Please enter maximum 55 character"
        }
    }
});

});

</script>
<!-- jquery validation on edit core feature -->

<!-- jquery validation on add about us -->
<script>
$(document).ready(function () {

$('#add_aboutus').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },

    rules: {
        years_experiences: {
            required: true,
        },
        tour_packages: {
            required: true,
        },
        happy_customers: {
            required: true,
        },
        award_winning: {
            required: true,
        },
        // full_description: {
        //     required: true,
        // }
    },

    messages :{
        years_experiences : {
            required : "Please enter years experiences",
        },
        tour_packages : {
            required : "Please enter tour packages",
        },
        happy_customers : {
            required : "Please enter happy customers",
        },
        award_winning : {
            required : "Please enter award winning",
        },
        // full_description : {
        //     required : "Please enter full description",
        // }
    }
});
});

</script>
<!-- jquery validation on add about us  -->

<!-- jquery validation on edit about us -->
<script>
$(document).ready(function () {

$('#edit_aboutus').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        years_experiences: {
            required: true,
        },
        tour_packages: {
            required: true,
        },
        happy_customers: {
            required: true,
        },
        award_winning: {
            required: true,
        },
        // full_description: {
        //     required: true,
        // }

    },

    messages :{
        years_experiences : {
            required : "Please enter years experiences",
        },
        tour_packages : {
            required : "Please enter tour packages",
        },
        happy_customers : {
            required : "Please enter happy customers",
        },
        award_winning : {
            required : "Please enter award winning",
        },
        // full_description : {
        //     required : "Please enter full description",
        // }
    }
});

});

</script>
<!-- jquery validation on edit about us  -->

<!-- jquery validation on add privacy Policy -->
<script>
$(document).ready(function () {

$('#add_privacypolicy').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        image_name: {
            required: true,
        }
    },

    messages :{
        image_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on add privacy Policy -->

<!-- jquery validation on edit privacy Policy -->
<script>
$(document).ready(function () {

$('#edit_privacypolicy').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        old_img_name: {
            required: true,
        }
    },

    messages :{
        old_img_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on edit privacy Policy -->

<!-- jquery validation on add Terms and condition -->
<script>
$(document).ready(function () {

$('#add_termscondition').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        image_name: {
            required: true,
        }
    },

    messages :{
        image_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on add Terms and condition -->

<!-- jquery validation on edit Terms and condition -->
<script>
$(document).ready(function () {

$('#edit_termscondition').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        old_img_name: {
            required: true,
        }
    },

    messages :{
        old_img_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on edit Terms and condition -->

<!-- jquery validation on add academic year -->
<script>
$(document).ready(function () {

$('#add_academicyear').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        year: {
            required: true,
        }
    },

    messages :{
        year : {
            required : "Please enter academic year",
        },
    }
});

});

</script>
<!-- jquery validation on add academic year -->

<!-- jquery validation on edit academic year -->
<script>
$(document).ready(function () {

$('#edit_academicyear').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        year: {
            required: true,
        }
    },

    messages :{
        year : {
            required : "Please enter academic year",
        },
    }
});

});

</script>
<!-- jquery validation on edit academic year -->

<!-- jquery validation on add department -->
<script>
$(document).ready(function () {

$('#add_department').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        department: {
            required: true,
        }
    },

    messages :{
        department : {
            required : "Please enter department",
        },
    }
});

});

</script>
<!-- jquery validation on add department -->

<!-- jquery validation on edit department -->
<script>
$(document).ready(function () {

$('#edit_department').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        department: {
            required: true,
        }
    },

    messages :{
        department : {
            required : "Please enter department",
        },
    }
});

});

</script>
<!-- jquery validation on edits department -->

<!-- jquery validation on add client review -->
<script>
$(document).ready(function () {

$('#add_clientreview').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        review: {
            required: true,
        },
        name: {
            required: true,
        },
        designation: {
            required: true,
        },
        image_name: {
            required: true,
        },

    },

    messages :{
        review : {
            required : "Please enter review",
        },
        name : {
            required : "Please enter name",
        },
        designation : {
            required : "Please enter designation",
        },
        image_name : {
            required : "Please upload image",
        },

    }
});

});

</script>
<!-- jquery validation on add client review -->

<!-- jquery validation on edit client review -->
<script>
$(document).ready(function () {

$('#edit_clientreview').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        review: {
            required: true,
        },
        name: {
            required: true,
        },
        designation: {
            required: true,
        },
        old_img_name: {
            required: true,
        }

    },

    messages :{
        review : {
            required : "Please enter review",
        },
        name : {
            required : "Please enter name",
        },
        designation : {
            required : "Please enter designation",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit client review -->
<!-- jquery validation on add tour guide -->
<script>
$(document).ready(function () {

$('#add_tourguide').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        name: {
            required: true,
        },
        designation: {
            required: true,
        },
        image_name: {
            required: true,
        }
    },

    messages :{
        name : {
            required : "Please enter name",
        },
        designation : {
            required : "Please enter designation",
        },
        image_name : {
            required : "Please upload image",
        },
    }
});

});

</script>
<!-- jquery validation on add tour guide -->

<!-- jquery validation on edit tour guide -->
<script>
$(document).ready(function () {

$('#edit_tourguide').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        name: {
            required: true,
        },
        designation: {
            required: true,
        },
        old_img_name: {
            required: true,
        }
    },

    messages :{
        name : {
            required : "Please enter name",
        },
        designation : {
            required : "Please enter designation",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit tour guide -->
<!-- jquery validation on add tour cancel rule -->
<script>
$(document).ready(function () {

$('#add_tourcancelrule').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        // name: {
        //     required: true,
        // },
        image_name: {
            required: true,
        },
    },

    messages :{
        // name : {
        //     required : "Please enter name",
        // },
        image_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on add tour cancel rule -->

<!-- jquery validation on edit tour cancel rule -->
<script>
$(document).ready(function () {

$('#edit_tourcancelrule').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        name: {
            required: true,
        },
        old_img_name: {
            required: true,
        },
    },

    messages :{
        name : {
            required : "Please enter name",
        },
        old_img_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on edit tour cancel rule -->
<!-- jquery validation on add seat reservation rule -->
<script>
$(document).ready(function () {

$('#add_seatreservation').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        // name: {
        //     required: true,
        // },
        image_name: {
            required: true,
        },
    },

    messages :{
        // name : {
        //     required : "Please enter name",
        // },
        image_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on add seat reservation rule -->

<!-- jquery validation on edit seat reservation rule -->
<script>
$(document).ready(function () {

$('#edit_seatreservation').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        // name: {
        //     required: true,
        // },
        old_img_name: {
            required: true,
        },
    },

    messages :{
        // name : {
        //     required : "Please enter name",
        // },
        old_img_name : {
            required : "Please upload pdf",
        },
    }
});

});

</script>
<!-- jquery validation on edit seat reservation rule -->
<!-- jquery validation on add social media links -->
<script>
$(document).ready(function () {

$('#add_socialmedia').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        social_media_link: {
            required: true,
        },
        image_name: {
            required: true,
        },
    },

    messages :{
        social_media_link : {
            required : "Please enter social media link",
        },
        image_name : {
            required : "Please upload image",
        },
    }
});

});

</script>
<!-- jquery validation on add social media links -->

<!-- jquery validation on edit social media links -->
<script>
$(document).ready(function () {

$('#edit_socialmedia').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        social_media_link: {
            required: true,
        },
        old_img_name: {
            required: true,
        }
    },

    messages :{
        social_media_link : {
            required : "Please enter social media link",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit social media links -->
<!-- jquery validation on add gallery -->
<script>
$(document).ready(function () {

$('#add_gallery').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        title: {
            required: true,
        },
        image_name: {
            required: true,
        }
    },

    messages :{
        title : {
            required : "Please enter title",
        },
        image_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on add gallery -->

<!-- jquery validation on edit gallery -->
<script>
$(document).ready(function () {

$('#edit_gallery').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        title: {
            required: true,
        },
        old_img_name: {
            required: true,
        }
    },

    messages :{
        title : {
            required : "Please enter title",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit gallery -->
<!-- jquery validation on add awards -->
<script>
$(document).ready(function () {

$('#add_award').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        title: {
            required: true,
        },
        image_name: {
            required: true,
        }
    },

    messages :{
        title : {
            required : "Please enter title",
        },
        image_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on add awards -->

<!-- jquery validation on edit awards -->
<script>
$(document).ready(function () {

$('#edit_award').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        title: {
            required: true,
        },
        old_img_name: {
            required: true,
        }
    },

    messages :{
        title : {
            required : "Please enter title",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit awards -->
<!-- jquery validation on add FAQ -->
<script>
$(document).ready(function () {

$('#add_faq').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        faq_question: {
            required: true,
        },
        faq_answer: {
            required: true,
        }
    },

    messages :{
        faq_question : {
            required : "Please enter question",
        },
        faq_answer : {
            required : "Please enter answer",
        }
    }
});

});

</script>
<!-- jquery validation on add FAQ -->

<!-- jquery validation on edit FAQ -->
<script>
$(document).ready(function () {

$('#edit_faq').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        faq_question: {
            required: true,
        },
        faq_answer: {
            required: true,
        }
    },

    messages :{
        faq_question : {
            required : "Please enter question",
        },
        faq_answer : {
            required : "Please enter answer",
        }
    }
});

});

</script>
<!-- jquery validation on edit FAQ -->
<!-- jquery validation on add agent percentage -->
<script>
$(document).ready(function () {

$('#add_agentpercentage').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        from_amt: {
            required: true,
        },
        to_amt: {
            required: true,
        },
        from_date: {
            required: true,
        },
        to_date: {
            required: true,
        },
        agent_percentage: {
            required: true,
        }
    },

    messages :{
        from_amt : {
            required : "Please enter from amount",
        },
        to_amt : {
            required : "Please enter to amount",
        },
        from_date : {
            required : "Please enter from date",
        },
        to_date : {
            required : "Please enter to date",
        },
        agent_percentage : {
            required : "Please enter agent percentage",
        }

    }
});

});

</script>
<!-- jquery validation on add agent percentage -->

<!-- jquery validation on edit agent percentage -->
<script>
$(document).ready(function () {

$('#edit_agentpercentage').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        from_amt: {
            required: true,
        },
        to_amt: {
            required: true,
        },
        from_date: {
            required: true,
        },
        to_date: {
            required: true,
        },
        from_date: {
            required: true,
        },
        agent_percentage: {
            required: true,
        }
    },

    messages :{
        from_amt : {
            required : "Please enter from amount",
        },
        to_amt : {
            required : "Please enter to amount",
        },
        from_date : {
            required : "Please enter from date",
        },
        to_date : {
            required : "Please enter to date",
        },
        agent_percentage : {
            required : "Please enter agent percentage",
        }

    }
});

});

</script>
<!-- jquery validation on edit agent percentage -->



<!-- jquery validation on add media source -->
<script>
$(document).ready(function () {

$('#add_mediasource').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        media_source_name: {
            required: true,
        },

    },

    messages :{
        media_source_name : {
            required : "Please enter media source name",
        },

    }
});

});

</script>
<!-- jquery validation on add media source -->
<!-- jquery validation on edit media source -->
<script>
$(document).ready(function () {

$('#edit_mediasource').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        media_source_name: {
            required: true,
        },

    },

    messages :{
        media_source_name : {
            required : "Please enter media source name",
        },

    }
});

});

</script>
<!-- jquery validation on edit media source -->
<!-- jquery validation on add stationary -->
<script>
$(document).ready(function () {

$('#add_stationary').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        stationary_name: {
            required: true,
        },
        stationary_quantity: {
            required: true,
        },
        financial_year: {
            required: true,
        },
        series_yes_no: {
            required: true,
        },
        from_series: {
            required : function(element) {
                var action = $("#Yes").val();
                if(action == "Yes") {
                    return true;
                } else {
                    return false;
                }
            }
        },
        to_series: {
            required : function(element) {
                var action = $("#Yes").val();
                if(action == "Yes") {
                    return true;
                } else {
                    return false;
                }
            }
        },

    },

    messages :{
        stationary_name : {
            required : "Please enter stationary",
        },
        stationary_quantity : {
            required : "Please enter stationary quantity",
        },
        financial_year : {
            required : "Select financial year",
        },
        series_yes_no : {
            required : "Please select is it series item yes or no",
        },
        from_series : {
            required : "Please select from series",
        },
        to_series : {
            required : "Please select to series",
        },

    }
});

});

</script>
<!-- jquery validation on add stationary -->

<!-- jquery validation on edit stationary -->
<script>
$(document).ready(function () {

$('#edit_stationary').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        stationary_name: {
            required: true,
        },
        stationary_quantity: {
            required: true,
        },
        financial_year: {
            required: true,
        },
        series_yes_no: {
            required: true,
        },
        from_series: {
            required : function(element) {
                var action = $("#Yes").val();
                if(action == "Yes") {
                    return true;
                } else {
                    return false;
                }
            }
        },
        to_series: {
            required : function(element) {
                var action = $("#Yes").val();
                if(action == "Yes") {
                    return true;
                } else {
                    return false;
                }
            }
        },

    },

    messages :{
        stationary_name : {
            required : "Please enter stationary",
        },
        stationary_quantity : {
            required : "Please enter stationary quantity",
        },
        financial_year : {
            required : "Select financial year",
        },
        series_yes_no : {
            required : "Please select is it series item yes or no",
        },
        from_series : {
            required : "Please select from series",
        },
        to_series : {
            required : "Please select to series",
        },

    }
});

});

</script>
<!-- jquery validation on edit stationary -->

<!-- jquery validation on add domestic packages -->
<script>
$(document).ready(function () {

$('#add_package').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        academic_year: {
            required: true,
        },
        package_type: {
            required: true,
        },
        tour_number: {
            required: true,
        },
        tour_title: {
            required: true,
        },
        destinations: {
            required: true,
        },
        rating: {
            required: true,
            maxlength: 5,
            minlength: 1,
        },
        tour_number_of_days: {
            required: true,
        },
        "boarding_office[]": {
            required: true,
        },
        hotel_type: {
            required: true,
        },
        zone_name: {
            required: true,
        },
        image_name: {
            required: true,
        },
        pdf_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        package_full_image: {
            required: true,
        },
        from_date: {
            required : function(element) {
                var action = $("#package_type").val();
                if(action == "Special Limited Offer") {
                    return true;
                } else {
                    return false;
                }
            }
        },
        to_date: {
            required : function(element) {
                var action = $("#package_type").val();
                if(action == "Special Limited Offer") {
                    return true;
                } else {
                    return false;
                }
            }
        },
        cost: {
            required : function(element) {
                var action = $("#package_type").val();
                if(action == "3" || action == "4" || action == "Special Limited Offer") {
                    return false;
                } else {
                    return true;
                }
            }
        },

    },

    messages :{
        academic_year : {
            required : "Please enter academic year",
        },
        package_type : {
            required : "Please Select package type",
        },
        tour_number : {
            required : "Please enter tour number",
        },
        tour_title : {
            required : "Please enter tour title",
        },
        destinations : {
            required : "Please enter destinations",
        },
        rating : {
            required : "Please enter rating",
            // maxlength : "Please enter maximum 5 rating",
            // minlength : "Please enter maximum 1 rating"
        },
        cost : {
            required : "Please enter package starting from cost",
        },
        tour_number_of_days : {
            required : "Please enter tour number of days",
        },
        "boarding_office[]" : {
            required : "Please enter boarding office location",
        },
        hotel_type : {
            required : "Please select hotel type",
        },
        zone_name : {
            required : "Please select zone name",
        },
        image_name : {
            required : "Please upload image",
        },
        pdf_name : {
            required : "Please upload pdf",
        },
        short_description : {
            required : "Please enter short description",
        },
        package_full_image : {
            required : "Please upload image",
        },
        from_date : {
            required : "Please select from date",
        },
        to_date : {
            required : "Please select to date",
        }

    }
});

});

</script>
<!-- jquery validation on add domestic packages -->

<!-- jquery validation on edit domestic packages -->
<script>
$(document).ready(function () {

$('#edit_package').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        academic_year: {
            required: true,
        },
        package_type: {
            required: true,
        },
        tour_number: {
            required: true,
        },
        tour_title: {
            required: true,
        },
        destinations: {
            required: true,
        },
        rating: {
            required: true,
            maxlength: 5,
            minlength: 1,
        },
        tour_number_of_days: {
            required: true,
        },
        "boarding_office[]": {
            required: true,
        },
        hotel_type: {
            required: true,
        },
        zone_name: {
            required: true,
        },
        old_img_name: {
            required: true,
        },
        old_pdf_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        old_new_name: {
            required: true,
        },
        from_date: {
            required : function(element) {
                var action = $("#package_type").val();
                if(action == "Special Limited Offer") {
                    return true;
                } else {
                    return false;
                }
            }
        },
        to_date: {
            required : function(element) {
                var action = $("#package_type").val();
                if(action == "Special Limited Offer") {
                    return true;
                } else {
                    return false;
                }
            }
        },
        cost: {
            required : function(element) {
                var action = $("#package_type").val();
                if(action == "3" || action == "4" || action == "Special Limited Offer") {
                    return false;
                } else {
                    return true;
                }
            }
        },

    },

    messages :{
        academic_year : {
            required : "Please enter academic year",
        },
        package_type : {
            required : "Please select package type",
        },
        tour_number : {
            required : "Please enter tour number",
        },
        tour_title : {
            required : "Please enter tour title",
        },
        destinations : {
            required : "Please enter destinations",
        },
        rating : {
            required : "Please enter rating",
            // maxlength : "Please enter maximum 5 rating",
            // minlength : "Please enter maximum 1 rating"
        },
        cost : {
            required : "Please enter package starting from cost",
        },
        tour_number_of_days : {
            required : "Please enter tour number of days",
        },
        "boarding_office[]" : {
            required : "Please enter boarding office location",
        },
        hotel_type : {
            required : "Please select hotel type",
        },
        zone_name : {
            required : "Please select zone name",
        },
        old_img_name : {
            required : "Please upload image",
        },
        old_pdf_name : {
            required : "Please upload pdf",
        },
        short_description : {
            required : "Please enter short description",
        },
        old_new_name : {
            required : "Please upload image",
        }

    }
});

});

</script>
<!-- jquery validation on edit domestic packages -->
<!-- jquery validation on add international packages -->
<script>
$(document).ready(function () {

$('#add_internationalpackage').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        academic_year: {
            required: true,
        },
        package_type: {
            required: true,
        },
        tour_number: {
            required: true,
        },
        tour_title: {
            required: true,
        },
        destinations: {
            required: true,
        },
        rating: {
            required: true,
            // maxlength: 5,
            // minlength: 1,
        },
        cost: {
            required: true,
        },
        tour_number_of_days: {
            required: true,
        },
        "boarding_office[]": {
            required: true,
        },
        hotel_type: {
            required: true,
        },
        zone_name: {
            required: true,
        },
        image_name: {
            required: true,
        },
        pdf_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        international_package_full_image: {
            required: true,
        }

    },

    messages :{
        academic_year : {
            required : "Please enter academic year",
        },
        package_type : {
            required : "Please select package type",
        },
        tour_number : {
            required : "Please enter tour number",
        },
        tour_title : {
            required : "Please enter tour title",
        },
        destinations : {
            required : "Please enter destinations",
        },
        rating : {
            required : "Please enter rating",
            // maxlength : "Please enter maximum 5 rating",
            // minlength : "Please enter maximum 1 rating"
        },
        cost : {
            required : "Please enter package starting from cost",
        },
        tour_number_of_days : {
            required : "Please enter tour number of days",
        },
        "boarding_office[]" : {
            required : "Please enter boarding office location",
        },
        hotel_type : {
            required : "Please select hotel type",
        },
        zone_name : {
            required : "Please select zone name",
        },
        image_name : {
            required : "Please upload image",
        },
        pdf_name : {
            required : "Please upload pdf",
        },
        short_description : {
            required : "Please enter short description",
        },
        international_package_full_image : {
            required : "Please upload image",
        }

    }
});

});

</script>
<!-- jquery validation on add international packages -->

<!-- jquery validation on edit international packages -->
<script>
$(document).ready(function () {

$('#edit_internationalpackage').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        academic_year: {
            required: true,
        },
        package_type: {
            required: true,
        },
        tour_number: {
            required: true,
        },
        tour_title: {
            required: true,
        },
        destinations: {
            required: true,
        },
        rating: {
            required: true,
            // maxlength: 5,
            // minlength: 1,
        },
        cost: {
            required: true,
        },
        tour_number_of_days: {
            required: true,
        },
        "boarding_office[]": {
            required: true,
        },
        hotel_type: {
            required: true,
        },
        zone_name: {
            required: true,
        },
        old_img_name: {
            required: true,
        },
        old_pdf_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        old_new_name: {
            required: true,
        }

    },

    messages :{
        academic_year : {
            required : "Please enter academic year",
        },
        package_type : {
            required : "Please select package type",
        },
        tour_number : {
            required : "Please enter tour number",
        },
        tour_title : {
            required : "Please enter tour title",
        },
        destinations : {
            required : "Please enter destinations",
        },
        rating : {
            required : "Please enter rating",
            // maxlength : "Please enter maximum 5 rating",
            // minlength : "Please enter maximum 1 rating"
        },
        cost : {
            required : "Please enter package starting from cost",
        },
        tour_number_of_days : {
            required : "Please enter tour number of days",
        },
        "boarding_office[]" : {
            required : "Please enter boarding office location",
        },
        hotel_type : {
            required : "Please select hotel type",
        },
        zone_name : {
            required : "Please select zone name",
        },
        old_img_name : {
            required : "Please upload image",
        },
        old_pdf_name : {
            required : "Please upload pdf",
        },
        short_description : {
            required : "Please enter short description",
        },
        old_new_name : {
            required : "Please upload image",
        }

    }
});

});

</script>
<!-- jquery validation on edit international packages -->
<!-- jquery validation on add main package -->
<script>
$(document).ready(function () {

$('#add_mainpackage').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        package_title: {
            required: true,
        },
        academic_year: {
            required: true,
        },
        "package_id[]": {
            required: true,
        },
        description: {
            required: true,
        },
        rating: {
            required: true,
        },
        cost: {
            required: true,
        },
        tour_number_of_days: {
            required: true,
        },
        image_name: {
            required: true,
        }
    },

    messages :{
        package_title : {
            required : "Please enter package title",
        },
        academic_year : {
            required : "Please enter academic year",
        },
        "package_id[]" : {
            required : "Please enter packages",
        },
        description : {
            required : "Please enter description",
        },
        rating : {
            required : "Please enter rating",
        },
        cost : {
            required : "Please enter package starting from cost",
        },
        tour_number_of_days : {
            required : "Please enter tour number of days",
        },
        image_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on add main package -->

<!-- jquery validation on edit main package -->
<script>
$(document).ready(function () {

$('#edit_mainpackage').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        package_title: {
            required: true,
        },
        academic_year: {
            required: true,
        },
        "package_id[]": {
            required: true,
        },
        description: {
            required: true,
        },
        rating: {
            required: true,
        },
        cost: {
            required: true,
        },
        tour_number_of_days: {
            required: true,
        },
        old_img_name: {
            required: true,
        }
    },

    messages :{
        package_title : {
            required : "Please enter package title",
        },
        academic_year : {
            required : "Please enter academic year",
        },
        "package_id[]" : {
            required : "Please enter packages",
        },
        description : {
            required : "Please enter description",
        },
        rating : {
            required : "Please enter rating",
        },
        cost : {
            required : "Please enter package starting from cost",
        },
        tour_number_of_days : {
            required : "Please enter tour number of days",
        },
        old_img_name : {
            required : "Please upload image",
        }
    }
});

});

</script>
<!-- jquery validation on edit main package -->

<!-- jquery validation on add profile(change password) -->
<script>
$(document).ready(function () {

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
            minlength: 6
        },
        confirm_pass: {
            required: true,
            equalTo: "#new_password",
            minlength: 6
        }

    },

    messages :{
        old_pass : {
            required : "Please enter old password",
        },
        new_password : {
            required : "Please enter new password",
            minlength : "Please enter 6 digit or character length",
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            minlength : "Please enter 6 digit or character length"
        }

    }
});

});

</script>
<!-- jquery validation on add profile(change password)  -->

<!-- jquery validation on edit profile -->
<script>
$(document).ready(function () {

$('#edit_profile').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        admin_name: {
            required: true,
        },
        email_address: {
            required: true,
            email:true
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10
        }

    },

    messages :{
        admin_name : {
            required : "Please enter admin name",
        },
        email_address : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        mobile_number : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        }

    }
});

});

</script>
<!-- jquery validation on edit profile -->
<!-- jquery validation on add Agent -->
<script>
$(document).ready(function () {

$('#add_agent').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        arrange_id: {
            required: true,
        },
        city: {
            required: true,
        },
        department: {
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
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10
        },
        mobile_number3: {
            maxlength:10,
            minlength:10
        },
        landline_number: {
            maxlength:11,
            minlength:11,
        },
        office_address: {
            required: true,
        },
        // image_name: {
        //     required: true,
        // },
        email: {
            required: true,
            email:true
        },
        agent_state: {
            required: true
        },
        agent_district: {
            required: true
        },
        agent_taluka: {
            required: true
        },
        agent_city: {
            required: true
        },
        image_name: {
            required: true
        },
        registration_date: {
            required: true,

        },
        password: {
            required: true,
            // minlength: 6
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            // minlength: 6

        }
    },

    messages :{
        arrange_id : {
            required : "Please enter arrange id",
        },
        city : {
            required : "Please enter office name",
        },
        department : {
            required : "Please enter region",
        },
        booking_center : {
            required : "Please enter booking center",
        },
        agent_name : {
            required : "Please enter agent name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number3 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        landline_number : {
            maxlength: "Please enter maximum 11 digit number",
            minlength: "Please enter minimum 11 digit number"
        },
        office_address : {
            required : "Please enter office address",
        },
        // image_name : {
        //     required : "Please upload image",
        // },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        agent_state : {
            required : "Please select state"
        },
        agent_district : {
            required : "Please select district"
        },
        agent_taluka : {
            required : "Please select taluka"
        },
        agent_city : {
            required : "Please select city"
        },
        image_name : {
            required : "Please upload image"
        },
        registration_date : {
            required : "Please enter registration date",
        },
        password : {
            required : "Please enter password",
            pattern: " Password must contain: " +
                     "At least one upper case letter, " +
                     "At least one lower case letter, " +
                     "At least one number, " +
                     "At least one special character " +
                     "and be between 6-15 characters."
            // minlength : "Please enter 6 digit or character length",
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            // minlength : "Please enter 6 digit or character length"
        }
    }
});

});

</script>
<!-- jquery validation on add agent -->

<!-- jquery validation on add supervision -->
<script>
$(document).ready(function () {

$('#add_supervision').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        role_type:{
            required: true,
        },
        supervision_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10
        },
        email: {
            required: true,
            email:true

        },
        password: {
            required: true,
            // minlength: 5,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/
        },
        confirm_pass: {
            required: true,
            equalTo: "#password"
            // minlength: 5

        }
    },

    messages :{
        role_type : {
            required : "Please select role name",
        },
        supervision_name : {
            required : "Please enter supervisor name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number3 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        password : {
            required : "Please enter password",
            // minlength : "Please enter 5 digit or character length",
            pattern: " Password must contain: " +
                     "At least one upper case letter, " +
                     "At least one lower case letter, " +
                     "At least one number, " +
                     "At least one special character " +
                     "and be between 6-15 characters."
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            // minlength : "Please enter 5 digit or character length"
        }
    }
});

});

</script>
<!-- jquery validation on add supervision -->

<!-- jquery validation on edit Agent -->
<script>
$(document).ready(function () {

$('#edit_agent').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        arrange_id: {
            required: true,
        },
        city: {
            required: true,
        },
        department: {
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
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10
        },
        mobile_number3: {
            maxlength:10,
            minlength:10
        },
        landline_number: {
            maxlength:11,
            minlength:11,
        },
        office_address: {
            required: true,
        },
        // image_name: {
        //     required: true,
        // },
        email: {
            required: true,
            email:true
        },
        agent_state: {
            required: true
        },
        agent_district: {
            required: true
        },
        agent_taluka: {
            required: true
        },
        agent_city: {
            required: true
        },
        registration_date: {
            required: true,

        },
        password: {
            required: true,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/
            // minlength: 6
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            minlength: 6

        }
    },

    messages :{
        arrange_id : {
            required : "Please enter arrange id",
        },
        city : {
            required : "Please enter office name",
        },
        department : {
            required : "Please enter region name",
        },
        booking_center : {
            required : "Please enter booking center",
        },
        agent_name : {
            required : "Please enter agent name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number3 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        landline_number : {
            maxlength: "Please enter maximum 11 digit number",
            minlength: "Please enter minimum 11 digit number"
        },
        office_address : {
            required : "Please enter office address",
        },
        // image_name : {
        //     required : "Please upload image",
        // },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        agent_state : {
            required : "Please select state"
        },
        agent_district : {
            required : "Please select district"
        },
        agent_taluka : {
            required : "Please select taluka"
        },
        agent_city : {
            required : "Please select city"
        },
        registration_date : {
            required : "Please enter registration date",
        },
        password : {
            required : "Please enter password",
            pattern: " Password must contain: " +
                     "At least one upper case letter, " +
                     "At least one lower case letter, " +
                     "At least one number, " +
                     "At least one special character " +
                     "and be between 6-15 characters."
            // minlength : "Please enter 6 digit or character length",
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            // minlength : "Please enter 6 digit or character length"
        }
    }
});

});

</script>
<!-- jquery validation on edit agent -->

<!-- jquery validation on edit supervision -->
<script>
$(document).ready(function () {

$('#edit_supervision').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        role_type:{
            required: true,
        },
        supervision_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10
        },
        email: {
            required: true,
            email:true
        },
        password: {
            required: true,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",

        }
    },

    messages :{
        role_type : {
            required : "Please select role type",
        },
        supervision_name : {
            required : "Please enter supervisor name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        registration_date : {
            required : "Please enter registration date",
        },
        password : {
            required : "Please enter password",
            pattern: " Password must contain: " +
                     "At least one upper case letter, " +
                     "At least one lower case letter, " +
                     "At least one number, " +
                     "At least one special character " +
                     "and be between 6-15 characters."
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
        }
    }
});

});

</script>
<!-- jquery validation on edit supervision -->

<!-- jquery validation on add courier -->
<script>
$(document).ready(function () {

$('#add_courier').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        courier_company_name: {
            required: true,
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        email: {
            required: true,
            email:true

        }
    },

    messages :{
        courier_company_name : {
            required : "Please enter courier company name",
        },
        mobile_number : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        }
    }
});

});

</script>
<!-- jquery validation on add courier -->

<!-- jquery validation on add courier -->
<script>
$(document).ready(function () {

$('#edit_courier').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        courier_company_name: {
            required: true,
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        email: {
            required: true,
            email:true

        }
    },

    messages :{
        courier_company_name : {
            required : "Please enter courier company name",
        },
        mobile_number : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        }
    }
});

});

</script>
<!-- jquery validation on add courier -->

<!-- jquery validation on add booking enquiry import -->
<script>
$(document).ready(function () {

$('#add_import').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        file: {
            required: true,
        },
    },

    messages :{
        file : {
            required : "Please upload .csv file",
        },
    }
});

});

</script>
<!-- jquery validation on add booking enquiry import -->

<!-- Approve profile edit using ajax -->

<script>
  $("#submit").click(function() {

     var temp_tbl_id =  $("#submit").val();
// alert(temp_tbl_id);

     if(temp_tbl_id!='')
     {
          $.ajax({
                          type: "POST",
                          url:'<?=base_url()?>admin/profile_edit_req/approve',
                          data: {request_id: temp_tbl_id
                           },
                         //  dataType: 'json',
                         //  cache: false,
                          success: function(response) {
                               if (response= true) {
                                window.location.href = "<?=base_url()?>admin/profile_edit_req/index";

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

<script>
 $(document).ready(function(){
     $('#img_width').hide();
      $('#img_height').hide();
       $('#img_size').hide();
var _URL = window.URL || window.webkitURL;
$("#image_name_mapping").change(function (e) {
    var file, img;
    var isValid='';
    if ((file = this.files[0])) {
        img = new Image();
        var ftype=file.type;
        if($.inArray(ftype, ['image/png','image/jpg','image/jpeg']) == -1) {
            $('#btn_pack_mapping').prop('disabled', true)
    }else{
                img.onload = function () {
            //alert('iiiii');
        var width=this.width;
         var height=this.height;
         var size = file.size;
	     if(size < 2000000)
         {
         $('#img_size').hide();
         if(width < 324 || width > 328 )
         {
             $('#img_width').show();
              $('#img_size').hide();
         }else if(height < 200 || height > 204)
         {
             $('#img_width').hide();
             $('#img_height').show();
         }
         else
         {
             isValid = true;
            $('#img_width').hide();
            $('#img_height').hide();
             $('#img_size').hide();
         }

         if (!isValid) {
            $('#img_id').show();
            $('#btn_pack_mapping').prop('disabled', true)
        }else if(isValid)
        {
            $('#btn_pack_mapping').prop('disabled', false)
        }
        }else
        {
            $('#img_width').hide();
            $('#img_height').hide();
            $('#img_size').show();
            $('#btn_pack_mapping').prop('disabled', true)
        }
	};
    }




        img.src = _URL.createObjectURL(file);
    }
});
});
</script>

 <script type="text/javascript">
function getAddress()
{
  var abc=document.getElementById('address').value;
    var query_addr = abc;

    const provider = new window.GeoSearch.OpenStreetMapProvider()
		alert(provider);
    var query_promise = provider.search({
      query: query_addr
    });
    query_promise.then(value => {
      for (i = 0; i < value.length; i++) {
        var x_coor = value[i].x;
        var y_coor = value[i].y;
	    getMap(y_coor,x_coor);
	    break;
      };

    }, reason => {
    });
}
  </script>

<!-- Region Head Master  -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#agent_region').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/Region_head/getAgent',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#agent_center').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#agent_center').append('<option value="'+data['id']+'">'+data['booking_center']+'</option>');
          });
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#agent_center').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/Region_head/getAgentno',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#mobile_number').val(response['mobile_number1']);
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#agent_center').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/Region_head/getAgentno',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#agent_name').val(response['agent_name']);
        }
     });
   });
 });
 </script>

 <!-- jquery validation on add profile(change password) -->
<script>
$(document).ready(function () {

$('#add_region_head').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        agent_region: {
            required: true,
        },
        agent_center: {
            required: true,
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10,

        },
		agent_name: {
            required: true,
        },
        password: {
            required: true,
            minlength: 6
        },
        confirm_password: {
            required: true,
            equalTo: "#password",
            minlength: 6

        }

    },

    messages :{
        agent_region : {
            required : "Please select department",
        },
        agent_center : {
            required : "Please select booking center",
        },
        mobile_number : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
		agent_name: {
            required: "Please enter agent name",
        },
        password : {
            required : "Please enter password",
            minlength : "Please enter 6 digit or character length",
        },
        confirm_password : {
            required : "Please enter confirm password",
            equalTo : "Password and Confirm Password can't match",
            minlength : "Please enter 6 digit or character length"
        }

    }
});

});

</script>
<!-- jquery validation end add region head master  -->

<!-- jquery validation on edit region head master -->
<script>
$(document).ready(function () {

$('#edit_region_head').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        agent_region: {
            required: true,
        },
        agent_center: {
            required: true,
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        agent_name: {
            required: true,
        },
        password: {
            required: true,
            minlength: 6
        },
        confirm_password: {
            required: true,
            equalTo: "#password",
            minlength: 6

        }

    },

    messages :{
        agent_region : {
            required : "Please select department",
        },
        agent_center : {
            required : "Please select booking center",
        },
        mobile_number : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        agent_name: {
            required: "Please enter agent name",
        },
        password : {
            required : "Please enter password",
            minlength : "Please enter 6 digit or character length",
        },
        confirm_password : {
            required : "Please enter confirm password",
            equalTo : "Password and Confirm Password can't match",
            minlength : "Please enter 6 digit or character length"
        }

    }
});

});

</script>
<!-- jquery validation end edit region head master -->

<!-- jquery validation on add add_state -->
<script>
$(document).ready(function () {

$('#add_state').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        city_name: {
            required: true,
        }
    },

    messages :{
        country_id : {
            required : "Please Select country",
        },
        state_id : {
            required : "Please enter state name",
        },
        city_name : {
            required : "Please enter city name",
        }
    }
});

});

</script>
<!-- jquery validation on add add_state -->

<!-- jquery validation on edit edit_state -->
<script>
$(document).ready(function () {

$('#edit_state').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        city_name: {
            required: true,
        }

    },

    messages :{
        country_id : {
            required : "Please Select country",
        },
        state_id : {
            required : "Please enter state name",
        },
        city_name : {
            required : "Please enter city name",
        }

    }
});

});

</script>
<!-- jquery validation on edit edit_state -->


<!-- jquery validation on add Place master -->
<script>
$(document).ready(function () {

$('#add_places_master').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        state_name: {
            required: true,
        },
        place_name: {
            required: true,
        },
        Select_close_days: {
            required: true,
        },
        place_description: {
            required: true,
        },

    },

    messages :{
        state_name : {
            required : "Please select state",
        },
        place_name : {
            required : "Please enter place name",
        },
        Select_close_days : {
            required : "Please Select close days",
        },
        place_description : {
            required : "Please enter place description",
        },

    }
});

});

</script>
<!-- jquery validation on add food type source -->
<!-- jquery validation on edit Place master -->
<script>
$(document).ready(function () {

$('#edit_places_master').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        state_name: {
            required: true,
        },
        place_name: {
            required: true,
        },
        Select_close_days: {
            required: true,
        },
        place_description: {
            required: true,
        },

    },

    messages :{
        state_name : {
            required : "Please select state",
        },
        place_name : {
            required : "Please enter place name",
        },
        Select_close_days : {
            required : "Please Select close days",
        },
        place_description : {
            required : "Please enter place description",
        },

    }
});

});

</script>
<!-- jquery validation on add food type source -->

<!-- place_wise_stay_costing state on places  -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#state_name').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/place_wise_stay_costing/getplace',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#place_name').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#place_name').append('<option value="'+data['id']+'">'+data['place_name']+'</option>');
          });
        }
     });
   });
 });
 </script>
 <!-- end -->

 <!-- jquery validation on add place_wise_stay_costing -->
<script>
$(document).ready(function () {

$('#add_place_wise_stay_costing').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        state_name: {
            required: true,
        },
        place_name: {
            required: true,
        },
        extra_city_expences: {
            required: true,
        },
        hotel_expences: {
            required: true,
        },
        lodge_expences: {
            required: true,
        },

    },

    messages :{
        state_name : {
            required : "Please select state",
        },
        place_name : {
            required : "Please enter place name",
        },
        extra_city_expences : {
            required : "Please enter Extra City Expences",
        },
        hotel_expences : {
            required : "Please enter Hotel Expences",
        },
        lodge_expences : {
            required : "Please enter Lodge Expences",
        },

    }
});

});

</script>
<!-- jquery validation  -->
<!-- jquery validation on edit place_wise_stay_costing -->
<script>
$(document).ready(function () {

$('#edit_place_wise_stay_costing').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        state_name: {
            required: true,
        },
        place_name: {
            required: true,
        },
        extra_city_expences: {
            required: true,
        },
        hotel_expences: {
            required: true,
        },
        lodge_expences: {
            required: true,
        },

    },

    messages :{
        state_name : {
            required : "Please select state",
        },
        place_name : {
            required : "Please enter place name",
        },
        extra_city_expences : {
            required : "Please enter Extra City Expences",
        },
        hotel_expences : {
            required : "Please enter Hotel Expences",
        },
        lodge_expences : {
            required : "Please enter Lodge Expences",
        },

    }
});

});

</script>
<!-- jquery validation on edit place_wise_stay_costing -->

<!-- VIVEK NEW CODE Not Uploded Code -->

 <!-- jquery validation on add add_boarding_expenses_master -->
 <script>
$(document).ready(function () {

$('#add_boarding_expenses_master').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        from_seat_1: {
            required: true,
        },
        to_seat1: {
            required: true,
        },
        rates1: {
            required: true,
        },

    },

    messages :{
        from_seat_1 : {
            required : "Enter from seat",
        },
        to_seat1 : {
            required : "Enter to seat",
        },
        rates1 : {
            required : "Enter rate",
        },

    }
});

});

</script>
<!-- jquery validation on add_boarding_expenses_master -->

 <!-- jquery validation on add_year_wise_cost_creation -->
 <script>
$(document).ready(function () {

$('#add_year_wise_cost_creation').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        travelling_year: {
            required: true,
        },
        from_date: {
            required: true,
        },
        to_date: {
            required: true,
        },
        from_days: {
            required: true,
        },
        to_days: {
            required: true,
        },

    },

    messages :{
        travelling_year : {
            required : "Select travelling year",
        },
        from_date : {
            required : "Select from date",
        },
        to_date : {
            required : "Select to date",
        },
        from_days : {
            required : "Enter from days",
        },
        to_days : {
            required : "Enter to days",
        },

    }
});

});

</script>
<!-- jquery validation on add_year_wise_cost_creation -->

<!-- jquery validation on add_office_maintainance -->
<script>
$(document).ready(function () {

$('#add_office_maintainance').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        standard: {
            required: true,
        },
        from_date: {
            required: true,
        },

    },

    messages :{
        standard : {
            required : "Enter standard in percentage",
        },
        economy : {
            required : "Enter economy in percentage",
        },
    }
});

});

</script>
<!-- jquery validation on add_office_maintainance -->

<!-- jquery validation on add_bus_kilometer_rates -->
<script>
$(document).ready(function () {

$('#add_bus_kilometer_rates').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        bus_type_1: {
            required: true,
        },
        rate_1: {
            required: true,
        },

    },

    messages :{
        bus_type_1 : {
            required : "Select bus type",
        },
        rate_1 : {
            required : "Enter rate",
        },
    }
});

});

</script>
<!-- jquery validation on add_bus_kilometer_rates -->

<!-- jquery validation on add_tour_details_data -->
<script>
$(document).ready(function () {

$('#add_tour_details_data').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        tour_number: {
            required: true,
        },
        tour_name: {
            required: true,
        },
        tour_days: {
            required: true,
        },
        tour_start_date: {
            required: true,
        },
        tour_end_date: {
            required: true,
        },
        inclusion: {
            required: true,
        },
        terms_conditions: {
            required: true,
        },

    },

    messages :{
        tour_number : {
            required : "Select tour number",
        },
        tour_name : {
            required : "Select tour name",
        },
        tour_days : {
            required : "Select tour days",
        },
        tour_start_date : {
            required : "Select tour start date",
        },
        tour_end_date : {
            required : "Select tour end date",
        },
        inclusion : {
            required : "Enter inclusion",
        },
        terms_conditions : {
            required : "Enter terms conditions",
        },
    }
});

});

</script>
<!-- jquery validation on add_tour_details_data -->



<!-- Script for Day wise cost creation -->

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#tour_number').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/Day_wise_cost_creation/getTourname',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#tour_name').val(response['tour_title']);
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
 function getTourDays(tour_days) {
// alert(tour_days);
    var structure = '';
    $('#tour_calculation').empty();
    $('#tour_calculation').append(` <table class="table table-bordered" style="width:100%" id="tour_calculation">
                            <thead>
                                <tr style="background:#a19f9f; color:white;">
                                    <th style="width:10%;">Day</th>
                                    <th style="width:10%;">Halting Place</th>
                                    <th style="width:10%;">Hotel Rates</th>
                                    <th style="width:10%;">Lodge Rates</th>
                                    <th style="width:10%;">Extra City Expenses</th>
                                    <th style="width:10%;">Toll Tax Charges</th>
                                    <th style="width:10%;">Parking Charges</th>
                                </tr>
                            </thead>
                            <tbody>`);
    for (let index = 0; index < tour_days; index++) {
        var i=index+1;

        // alert(index);
        structure +=`<tr>

                        <td>
                            <input type="text" readonly class="form-control" name="day[]" id="day" value="`+i+`" required="required">
                        </td>
                        <td>
                        <select class="select_css" name="halting[]" id="halting" required="required">
                            <option value="">Select halting place</option>
                            <?php
foreach ($halting_place_data as $halting_place_info) {
    ?>
                            <option value="<?php echo $halting_place_info['id']; ?>"><?php echo $halting_place_info['halting_place_name']; ?></option>
                            <?php }?>
                        </select>
                        </td>
                        <td>
                            <input type="text" class="form-control hotel_rates1" name="hotel_rates[]" id="hotel_rates" required="required" onkeyup="hotel_rates">
                        </td>
                        <td>
                            <input type="text" class="form-control cell" name="lodge_rates[]" id="lodge_rates" required="required" onkeyup="lodge_rates">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_city_expenses[]" id="extra_city_expenses" required="required">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="toll_tax_chareges[]" id="toll_tax_chareges" required="required">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="parking_chareges[]" id="parking_chareges" required="required">
                        </td>


                    </tr> `;


        //     //alert(i);

    }

    $('#tour_calculation tbody').append(structure);
    $('#tour_calculation').append(`</tbody>
                    </table>
                    <div class="row">
                      <div class="col-md-7">
                      </div>
                      <div class="col-md-2">
                          <b><p>Grand Total Cost</p></b>
                      </div>
                      <div class="col-md-3">
                      <input type="text" class="form-control" name="grand_total_cost" id="grand_total_cost" placeholder="Grand Total Cost" required="required" style="border: 1px solid #dbdbdb;margin-top: 15px;">
                      </div>
                    </div>
                      <br>`);

}



  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#tour_number').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/Day_wise_cost_creation/getTourdays',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#tour_days').val(response['tour_number_of_days']);
            getTourDays(response['tour_number_of_days']);
        }
     });
   });
 });
 </script>

 <!-- jquery validation on add add_day_wise_cost_creation -->





<script>
$(document).ready(function () {

$('#add_day_wise_cost_creation').validate({
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div,td"));
  },
    rules: {
        tour_number: {
            required: true,
        },
        tour_name: {
            required: true,
        },
        tour_days: {
            required: true,
        },


    },

    messages :{
        tour_number : {
            required : "Please select tour number",
        },
        tour_name : {
            required : "Please select tour name",
        },
        tour_days : {
            required : "Please select tour days",
        },


    }
});

});

</script>
<!-- jquery validation on add add_day_wise_cost_creation -->


<!-- End Script for Day wise cost creation -->

<!-- Script for Tour details -->

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#tour_number').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/tour_details_data/getTourname',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#tour_name').val(response['tour_title']);
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#tour_number').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/tour_details_data/getTourdays',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#tour_days').val(response['tour_number_of_days']);
        }
     });
   });
 });
 </script>


<!-- Script for Day wise tour itinerary -->

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#tour_number').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/day_wise_tour_itinerary/getTourname',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#tour_name').val(response['tour_title']);
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
 function getTourDays_it(tour_days) {
// alert(tour_days);
    var structure = '';
    var structure1 = '';
    $('#tour_itinerary').empty();
    $('#tour_itinerary').append(` <table class="table table-bordered" style="width:100%" id="tour_itinerary">
                            <thead>
                                <tr style="background:#a19f9f; color:white;">
                                    <th style="width:10%;">Day</th>
                                    <th style="width:10%;">Reporting Time (Optional)</th>
                                    <th style="width:10%;">Reporting Place (Optional)</th>
                                    <th style="width:10%;">Extra Remarks (Optional)</th>
                                    <th style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>`);
    for (let index = 0; index < tour_days; index++) {
      var i=index+1;

        // alert(index);
        structure +=`<tr>

                        <td>
                            <input type="text" readonly class="form-control" name="day[]" id="day" value="`+i+`" required="required" >
                        </td>
                        <td>
                            <input type="time" class="form-control" name="reporting_time[]" id="reporting_time" required="required">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="reporting_place[]" id="reporting_place" required="required">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="extra_remarks[]" id="extra_remarks" required="required">
                        </td>
                        <td>
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight`+index+`" aria-controls="offcanvasRight">Add more details</button>
                        </td>


                    </tr> `;

    }

    for (let index = 0; index < tour_days; index++)
     {
        var img_count=parseInt(index)+1;

    structure1 +=`<style>
                    .iti_img img{
                    width:25% !important;
                    height:25% !important;
                    }
                </style>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight`+index+`" aria-labelledby="offcanvasRightLabel">
             <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Add More Details</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="row">
              <div class="col-md-12">
                  <label>Day plan</label>
                  <input type="text" class="form-control summernote" name="day_plan[]" id="day_plan`+index+`" required="required">
              </div>
              <div class="col-md-6 mt-2">
                <label>Place sample photo (Optional)</label>

                <input type="file" name="image_name[]" id="image_name`+img_count+`" onchange="encodeImgtoBase64traveller_img(this)" attr_id="`+img_count+`">

              </div>
              <div class="col-md-6 mt-2">
                 <input type="hidden" class="document_file_traveller_img" id="document_file_traveller_img`+img_count+`" name="document_file_traveller_img[]" value="">
                 <div id="imagePreview_traveller_img`+img_count+`" class="iti_img mt-2 img_size_cast">
                 <img src="<?php echo base_url(); ?>uploads/day_wise_itinerary/" width="25%" /></div>
              </div>

              <label class="mt-4">Flight/ Airport Connection</label>
              <div class="col-md-6 mt-1">
                <label>Time</label>
                <input type="time" class="form-control" name="flight_time[]" id="flight_time" required="required">
              </div>
              <div class="col-md-6  mt-1">
                <label>Airport</label>
                <select class="form-control" name="flight_airport[]" id="flight_airport" required="required">
                  <option value="">Select flight name</option>
                  <?php
foreach ($airport_data as $airport_info) {
    ?>
                    <option value="<?php echo $airport_info['id']; ?>"><?php echo $airport_info['airport_name']; ?></option>
                  <?php }?>
                </select>
              </div>

              <label class="mt-4">Train Connection</label>
              <div class="col-md-6 mt-1">
                <label>Time</label>
                <input type="time" class="form-control" name="train_time[]" id="train_time" required="required">
              </div>
              <div class="col-md-6  mt-1">
                <label>Train</label>
                <select class="form-control" name="train_train[]" id="train_train" required="required">
                  <option value="">Select train name</option>
                  <?php
foreach ($train_data as $train_info) {
    ?>
                    <option value="<?php echo $train_info['id']; ?>"><?php echo $train_info['railway_name']; ?></option>
                  <?php }?>
                </select>
              </div>

              <div class="col-md-6  mt-4">
              <button type="button" class="btn btn-primary" data-bs-dismiss="offcanvas" aria-label="Close">Close</button>
              </div>

            </div>
          </div>
          </div>`;
          var dayid='day_plan'+index;
    }

    $('#off_can').append(structure1);
    $('#tour_itinerary tbody').append(structure);
    $('#tour_itinerary').append(`</tbody>
                    </table>
                      <br>`);

    $(".summernote").summernote();

    // $('#'+dayid).summernote();


}



  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

//   $(document).ready(function(){
//     $('#submit_str').on('click', function (e) {
//         var form_data = new FormData(this);
//         //alert(JSON.stringify(formdata));
//     });


    $('#tour_number').on('change', function () {
      var did = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/day_wise_tour_itinerary/getTourdays_it',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
           // var p = response['mobile_number1'];
            $('#tour_days').val(response['tour_number_of_days']);
            getTourDays_it(response['tour_number_of_days']);
        }
     });

   });

 </script>

 <script>
      $(document).ready(function(){
    $('#submit_str').on('click', function () {

        var tour_number = $('#tour_number').val();
        var tour_name = $('#tour_name').val();
        var tour_days = $('#tour_days').val();

        var day = $('input[name="day[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var day_plan = $('input[name="day_plan[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var reporting_time = $('input[name="reporting_time[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var reporting_place = $('input[name="reporting_place[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var extra_remarks = $('input[name="extra_remarks[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var flight_airport = $('select[name="flight_airport[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var flight_time = $('input[name="flight_time[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var train_time = $('input[name="train_time[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var train_train = $('select[name="train_train[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var image_name = $('input[name="document_file_traveller_img[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();


        //   alert(image_name);

        $.ajax({
            method: 'post',
                          url:'<?=base_url()?>admin/day_wise_tour_itinerary/add_all',
                          data: {tour_number: tour_number,
                            tour_name: tour_name,
                            tour_days: tour_days,
                            day: day,
                            day_plan: day_plan,
                            reporting_time: reporting_time,
                            reporting_place: reporting_place,
                            extra_remarks: extra_remarks,
                            flight_airport: flight_airport,
                            flight_time: flight_time,
                            train_time: train_time,
                            train_train: train_train,
                            image_name   :image_name
                        },
                          dataType: 'json',
                          cache: false,
                          success: function(response) {
                            // alert(response);
                              if (response=true) {
                                //   alert('success');
                                window.location.href = "<?=base_url()?>admin/day_wise_tour_itinerary/add";
                              } else {
                                  alert('error');

                              }
                          },

                      });

    });

});


 </script>

<script>
//passbook_img doc
var count = $('#seat_count_add').val();
//for(var i=1; i<count; i++){
    function encodeImgtoBase64traveller_img(element) {
        var img_id =$(element).attr('attr_id');
        var document_file_traveller_img='document_file_traveller_img'+img_id;
        var imagePreview_traveller_img='imagePreview_traveller_img'+img_id;
        var image_name='image_name'+img_id;
        //  alert(image_name);
         var fileCheckpassbook_img ='';
         $("#"+document_file_traveller_img).val('');
          document.getElementById(imagePreview_traveller_img).innerHTML = '';
           $("label").remove('.error');
            var fileInputtraveller_img = document.getElementById(image_name);
            var filePathtraveller_img = fileInputtraveller_img.value;
            var allowedExtensionstraveller_img = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
               if (!allowedExtensionstraveller_img.exec(filePathtraveller_img))
               {
                    fileChecktraveller_img = fileInputtraveller_img.files[0];
                    if(fileChecktraveller_img)
                    {
                        fileInputtraveller_img.value = '';
                        return false;
                    }
                }
                    else
                    {
                        var file = fileInputtraveller_img.files[0];
                        if (file.size > 2000005)
                        {
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
                            document.getElementById(imagePreview_traveller_img).innerHTML = '<img src="' + e.target.result + '"/>';
                            }
                            };
                            reader.readAsDataURL(fileInputtraveller_img.files[0]);
                        }
                    }
                    var img = element.files[0];
                    var reader = new FileReader();
                    reader.onloadend = function() {
                    $("#"+document_file_traveller_img).val(reader.result);
                    }
                    reader.readAsDataURL(img);
                    }
                    //);
                    //}

</script>


<!-- jquery validation on add add_itinerary -->
<script>
$(document).ready(function () {

$('#add_itinerary').validate({
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        tour_number: {
            required: true,
        },
        tour_name: {
            required: true,
        },
        tour_days: {
            required: true,
        },


    },

    messages :{
        tour_number : {
            required : "Please select tour number",
        },
        tour_name : {
            required : "Please select tour name",
        },
        tour_days : {
            required : "Please select tour days",
        },


    }
});

});

</script>
<!-- jquery validation on add add_itinerary -->



<!-- End Script for Day wise tour itinerary -->

<!-- airport master  -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#country_name').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/airport_master/getstate',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#state_name').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#state_name').append('<option value="'+data['id']+'">'+data['state_name']+'</option>');
          });
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#state_name').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/airport_master/getplace',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#place_name').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#place_name').append('<option value="'+data['id']+'">'+data['place_name']+'</option>');
          });
        }
     });
   });
 });
 </script>
 <!-- end -->

 <!-- railway master  -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#country_name').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/railway_master/getstate',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#state_name').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#state_name').append('<option value="'+data['id']+'">'+data['state_name']+'</option>');
          });
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#state_name').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/railway_master/getplace',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#place_name').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#place_name').append('<option value="'+data['id']+'">'+data['place_name']+'</option>');
          });
        }
     });
   });
 });
 </script>
 <!-- end -->

 <!-- jquery validation on add add_itinerary -->
<script>
$(document).ready(function () {

$('#add_itinerary').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        tour_number: {
            required: true,
        },
        tour_name: {
            required: true,
        },

    },

    messages :{
        tour_number : {
            required : "Please select tour number",
        },
        tour_name : {
            required : "Please enter tour name",
        },

    }
});

});

</script>
<!-- jquery validation on add food type source -->

<script>

function hotel_rates() {
  var x = parseInt(document.getElementById("hotel_rates").value);
  document.getElementById("grand_total_cost").value = x;
;
}

function lodge_rates() {
  var x = parseInt(document.getElementById("hotel_rates").value);
  var y = parseInt(document.getElementById("lodge_rates").value)
  document.getElementById("grand_total_cost").value = x + y;
;
}

</script>

<!-- jquery validation on add Zone master -->
<script>
$(document).ready(function () {

$('#add_zone_master').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        Zone_name: {
            required: true,
        }
    },

    messages :{
        Zone_name : {
            required : "Please enter Zone",
        },
    }
});

});

</script>
<!-- jquery validation on add Zone master -->

<!-- jquery validation on edit Zone master -->
<script>
$(document).ready(function () {

$('#edit_zone_master').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        Zone_name: {
            required: true,
        }
    },

    messages :{
        Zone_name : {
            required : "Please enter Zone",
        },
    }
});

});
</script>
<!-- jquery validation on edit Zone master -->

<!-- add domestic packages on click of special limited offer show and hide -->
<script>
    $(document).ready(function (){
        // $(".c_from_date").hide();

    $("#package_type").change(function () {
        var tno = $("#package_type").val();
        if(tno=='7')
        {
            $(".c_from_date").show();
        }
        else
        {
            $(".c_from_date").hide();
        }
        });
    });
</script>

<!-- add domestic packages on click of special limited offer show and hide -->

<!-- for stationary  series if yes show 2 textbox financial year from & to -->
<script>
    $(document).ready(function (){
        // $(".if_series_yes_div").hide();

    $("#Yes").change(function () {
        var tno = $("#Yes").val();
        if(tno=='Yes')
        {
            $(".if_series_yes_div").show();
        }
        else
        {
            $(".if_series_yes_div").hide();
        }
        });
        $("#No").change(function () {
        var tno = $("#No").val();
        if(tno=='No')
        {
            $(".if_series_yes_div").hide();
        }
        else if(tno=='No')
        {
            $(".if_series_yes_div").show();
        }
        });
    });
</script>
<!-- End for stationary  series if yes show 2 textbox financial year from & to -->

<script>

 $(document).ready(function(){
  // var i = '0';

    //var newFields = $('');

    $("#pages_per_book").keyup(function(e){
        var pages=$(this).val();
        var stationary_quantity=$('#stationary_quantity').val();
        var from_series=$('#from_series').val();
        var to_series=$('#to_series').val();

        var diff=to_series-from_series;
        var final_diff= diff+1;

        var new_book_qty=final_diff/pages;
         //alert(new_book_qty);
        //alert(stationary_quantity);
        if (new_book_qty != stationary_quantity) {
          // alert('Stationary Quantity And Inserted pages are not matched');
           $('#submit_slider').prop('disabled', true);
        }else{
           $('#submit_slider').prop('disabled', false);

        }
    });
 });
 </script>

 <script>
      $(document).ready(function(){
    // $('#submit_str').on('click', function () {
        $('#from_series').keyup(function(){
        var from_series = $('#from_series').val();
        var stationary_id = $('#stationary_id').val();

        $.ajax({
                         method: 'post',
                          url:'<?=base_url()?>admin/stationary/get_series',
                          data: {from_series_no: from_series,
                            stationary_id_no: stationary_id
                        },
                          dataType: 'json',
                          cache: false,
                          success: function(response) {
                              if (response=="123") {
                                // alert('You have already used this series');
                                $('#submit_slider').prop('disabled', true);
                              } else if(response!="123") {
                                $('#submit_slider').prop('disabled', false);
                                // alert('okkk');
                            }
                          },

                      });

    });

});


 </script>

<script>
		    $(function(){
  $('.header-level').click(function(){
    $(this).next('.sub-level').find('table').toggle();
  });
});
</script>

<script>
		    $(function(){
  $('.header-level').click(function(){
    $(this).next('.sub-level').toggle();
  });
});
</script>

<!-- <script>
$('.accordian-body').on('show.bs.collapse', function () {
    $(this).closest("table")
        .find(".collapse.in")
        .not(this)
        .collapse('toggle')
})
</script> -->

<!-- ADD More instraction vivek -->

<script>


        var i=1;
    $('#add_more_instraction').click(function() {
       // alert('hhhh');
            i++;
    var structure = $(`<div class="row" style="width:100% !important" id="new_row`+i+`">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Instraction Point</label>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="instraction[]" id="instraction`+i+`" placeholder="Enter Instraction" required="required"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Select Priority</label><br>
                                <select class="form-control" name="priority[]" id="priority`+i+`">
                                <option value="">Select</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-1 pt-4 d-flex justify-content-center align-self-center">
                            <div class="form-group">
                            <label></label>
                                <button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">X</button>
                            </div>
                        </div>
                    </div>`);
$('#main_row').append(structure);

});


$(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#new_row'+button_id+'').remove();
      });

</script>

<!-- ===      === -->

<script>


    var i=1;
    $('#add_more_instraction_for_cust').click(function() {
       // alert('hhhh');
            i++;
    var structure = $(`<div class="row" style="width:100% !important" id="new_row`+i+`">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Instraction Point</label>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="instraction[]" id="instraction`+i+`" placeholder="Enter Instraction" required="required"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Select Priority</label><br>
                                <select class="form-control" name="priority[]" id="priority`+i+`">
                                <option value="">Select</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-1 pt-4 d-flex justify-content-center align-self-center">
                            <div class="form-group">
                            <label></label>
                                <button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">X</button>
                            </div>
                        </div>
                    </div>`);
$('#main_row_cust').append(structure);

});


$(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#new_row'+button_id+'').remove();
      });

</script>

<!--  -->

<script>
  $(".delete_instruction").click(function() {

     var delete_instruction_id =  $(this).attr('value');
// alert(delete_instruction_id);

     if(delete_instruction_id!='')
     {
          $.ajax({
                          type: "POST",
                          url:'<?=base_url()?>admin/instruction_list/delete',
                          data: {request_id: delete_instruction_id
                           },
                         //  dataType: 'json',
                         //  cache: false,
                          success: function(response) {
                               if (response= true) {
                                // window.location.href = "<//?=base_url()?>admin/instruction_list/index";
                                  alert('Delete Sucessfully');
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

<script>
  $(".delete_instruction_cust").click(function() {

     var delete_instruction_cust_id =  $(this).attr('value');
// alert(delete_instruction_cust_id);

     if(delete_instruction_cust_id!='')
     {
          $.ajax({
                          type: "POST",
                          url:'<?=base_url()?>admin/instruction_list/cust_instraction_delete',
                          data: {request_id: delete_instruction_cust_id
                           },
                         //  dataType: 'json',
                         //  cache: false,
                          success: function(response) {
                               if (response= true) {
                                // window.location.href = "<//?=base_url()?>admin/instruction_list/edit/";
                                  alert('Delete Sucessfully');
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

<!-- end add more instruction Vivek -->

<!-- jquery validation on add expense type -->
<script>
$(document).ready(function () {

$('#add_expense_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        expense_type: {
            required: true,
        },

    },

    messages :{
        expense_type : {
            required : "Please enter Expense Type",
        },

    }
});

});

</script>
<!-- jquery validation on add expense type -->
<!-- jquery validation on add expense type -->
<script>
$(document).ready(function () {

$('#edit_expense_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        expense_type: {
            required: true,
        },

    },

    messages :{
        expense_type : {
            required : "Please enter Expense Type",
        },

    }
});

});

</script>
<!-- jquery validation on add expense type -->

<!-- add more for expense category add -->
<script>


        var i=1;
    $('#add_more_category').click(function() {
       // alert('hhhh');
            i++;
    var structure = $(`<div class="row" style="width:100% !important" id="new_row`+i+`">
                <div class="col-md-5">
                    <div class="form-group">
                       <label>Expense Type</label>
                        <select class="select_css" name="expense_type[]" id="expense_type`+i+`" required="required">
                        <option value="">Select Expense Type</option>
                        <?php foreach ($arr_data as $info) {?>
                            <option value="<?php echo $info['id']; ?>"><?php echo $info['expense_type_name']; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label>Expense Category</label>
                    <input type="text" class="form-control" name="expense_category[]" id="expense_category`+i+`" placeholder="Enter Expense Category">
                    <input type="hidden" readonly class="form-control" name="expense_type_id[]" id="expense_type_id" placeholder="Enter tour number" value="<?php echo $info['id'] ?>" required="required">
                    </div>
                </div>



                        <div class="col-md-1 pt-4 d-flex justify-content-center align-self-center">
                            <div class="form-group">
                            <label></label>
                                <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>
                            </div>
                        </div>
                    </div>`);
$('#main_row').append(structure);

});


$(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#new_row'+button_id+'').remove();
      });

</script>
<!-- add more for expense category add -->

<!-- jquery validation on add expense Category  -->
<script>
$(document).ready(function () {

$('#add_expense_category').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        "expense_type[]": {
            required: true,
        },
        "expense_category[]": {
            required: true,
        }

    },

    messages :{
        "expense_type[]" : {
            required : "Please select Expense Type",
        },
        "expense_category[]" : {
            required : "Please enter Expense Category",
        }

    }
});

});

</script>
<!-- jquery validation on add expense Category  -->

<!-- jquery validation on add expense Category -->
<script>
$(document).ready(function () {

$('#edit_expense_category').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
  rules: {
        "expense_type[]": {
            required: true,
        },
        "expense_category[]": {
            required: true,
        }

    },

    messages :{
        "expense_type[]" : {
            required : "Please select Expense Type",
        },
        "expense_category[]" : {
            required : "Please enter Expense Category",
        }

    }
});

});

</script>
<!-- jquery validation on add expense Category -->


<script>
$(document).ready(function () {
$('#add_instraction').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        tour_number: {
            required: true,
        },
        image_name: {
            required: true,
        },
        "instraction[]": {
            required: true,
        },
        "priority[]": {
            required: true,
        },

    },

    messages :{
        tour_number : {
            required : "Please Select Tour",
        },
        image_name : {
            required : "Please Select Image or PDF",
        },
        "instraction[]" : {
            required : "Please Enter Instruction",
        },
        "priority[]" : {
            required : "Please Select Priority",
        },


    }
});

});

</script>

<script>
$(document).ready(function () {

$('#add_role').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        role_name: {
            required: true,
        },
        for_booking_yes_no: {
            required: true,
        },

    },

    messages :{
        role_name : {
            required : "Please enter role name",
        },
        for_booking_yes_no : {
            required : "Please select yes or no",
        },

    }
});

});

</script>

<script>
$(document).ready(function () {

$('#edit_role').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        role_name: {
            required: true,
        },
        for_booking_yes_no: {
            required: true,
        },

    },

    messages :{
        role_name : {
            required : "Please enter role name",
        },
        for_booking_yes_no : {
            required : "Please select yes or no",
        },

    }
});

});

</script>
<!-- City master country wise state display dependency start -->

<!-- jquery validation on add hotel -->
<script>
$(document).ready(function () {

$('#add_hotel').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        hotel_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10,
        },
        landline: {
            maxlength:8,
            minlength:8,
        },
        email: {
            required: true,
            email:true,
        },
        image_name: {
            required: true,
        },
        hotel_address: {
            required: true,
        },
        password: {
            required: true,
            minlength: 5
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            minlength: 5

        }
    },

    messages :{
        hotel_name : {
            required : "Please enter hotel name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        landline: {
            maxlength: "Please enter maximum 8 digit number",
            minlength: "Please enter minimum 8 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        image_name: {
            required : "Please upload image",
        },
        hotel_address : {
            required : "Please enter address",
        },
        password : {
            required : "Please enter password",
            minlength : "Please enter 5 digit or character length",
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            minlength : "Please enter 5 digit or character length"
        }
    }
});

});

</script>
<!-- jquery validation on add hotel -->


<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#country_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/city_master/get_state',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#state_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#state_id').append('<option value="'+data['id']+'">'+data['state_name']+'</option>');
          });

        }
     });
   });
 });
</script>


<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#country_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/district/get_state',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#state_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#state_id').append('<option value="'+data['id']+'">'+data['state_name']+'</option>');
          });

        }
     });
   });
 });
</script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#country_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/taluka/get_state',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#state_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#state_id').append('<option value="'+data['id']+'">'+data['state_name']+'</option>');
          });

        }
     });
   });
 });
</script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#state_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/taluka/get_district',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#district_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#district_id').append('<option value="'+data['id']+'">'+data['district']+'</option>');
          });

        }
     });
   });
 });
</script>


<!------ City master country wise state display dependency start ---->

<!-- tour expenses tour no wise date display dependency start -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#tour_number').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/tour_expenses/get_date',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#tour_date').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#tour_date').append('<option value="'+data['id']+'">'+data['journey_date']+'</option>');
          });

        }
     });
   });
 });
</script>
<!------ tour expenses tour no wise date display dependency start ---->

<!-- tour expenses ajax  -->
<script>
 $(document).ready(function(){
  $("#expenses_submit").click(function() {
//   alert('hiiiiiiiiiiii');
    // var agent_id = '1';

        //   var attr_cancel_val =$(this).attr('attr_cancle_btn');
        var super_id = $('#tour_number').val();
        var date_super_id = $('#tour_date').val();
          //  var for_m_hold = $(this).val();
        //    alert(super_id);
        //    alert(date_super_id);


           if(super_id != '' && date_super_id != '')
           {
            // alert('hiiiiiiiiiiii');
                $.ajax({
                     url:"<?php echo base_url(); ?>admin/tour_expenses/tour_expenses_data",
                     method:"POST",
                     data:{super_id:super_id , date_super_id:date_super_id},
                     dataType: 'json',
                     success:function(response){
                        // alert('hiiiiiiiii');

                        //   $('#tour_date').find('option').not(':first').remove();
                        var expenses_id = 0;
                        var img_count=parseInt(i)+1;
                        $.each(response,function(index,data){
                            expenses_id++;
                            // $('#tour_date').append('<option value="'+data['id']+'">'+data['journey_date']+'</option>');
                            $('#tid').append(`<tr><td>`+ expenses_id +`</td>
                            <td>`+ data['expense_type_name'] +`</td>
                            <td>`+ data['expense_category'] +`</td>
                            <td>`+ data['expense_place'] +`</td>
                            <td>`+ data['bill_number'] +`</td>
                            <td>`+ data['total_pax'] +`</td>
                            <td>`+ data['expense_amt'] +`</td>
                            <td>`+ data['expense_date'] +`</td>
                            <td>
                                <input type="hidden" id="old_img_name`+img_count+`" name="old_img_name[]"
                                    value="">
                                    <div id="old_img_name`+img_count+`" class="mt-2 img_size_cast">
                                        <img class="image_name" src="<?php echo base_url(); ?>uploads/tour_expenses/`+data['image_name']+`" width="60%" />
                                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/`+data['image_name']+`">Download</a>
                                    </div>
                            </td>
                            <td>
                                <input type="hidden" id="old_new_name`+img_count+`" name="old_new_name[]"
                                    value="">
                                    <div id="old_new_name`+img_count+`" class="mt-2 img_size_cast">
                                        <img class="image_name_2" src="<?php echo base_url(); ?>uploads/tour_expenses/`+data['image_name_2']+`" width="60%" />
                                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/tour_expenses/`+data['image_name_2']+`">Download</a>
                                    </div>
                            </td>

                            <td>`+ data['tour_expenses_remark'] +`</td>
                                    </tr>`);
                        });

                     }

                });
           }
          });
      });
 </script>
<!-- tour expenses ajax  -->

<!-- inter all traveller info  add code 16-03-2023======================================== -->
<script>

    $(document).ready(function(){
        // $('#traveller_table .remove_row').remove();
        var count = $('#inter_seat_count_add').val();

    //alert('kkkkkk');
    //$('#add_more').click(function() {
    //alert(count);
            //i++;
            for(var i=1; i<count; i++){
                var img_count=parseInt(i)+1;

                // alert(i);
        var structure =
                    (`<tr>
                                    <td><select class="select_css row_set1" name="mrandmrs[]" id="mrandmrs">
                                        <option value="">select Mr / Mrs</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="first_name[]" id="first_name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-contro row_set" name="middle_name[]" id="middle_name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="last_name[]" id="last_name">
                                    </td>
                                    <td>
                                        <input type="date" class="form-control row_set" name="dob[]" id="dob" max="<?php echo date("Y-m-d"); ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="age[]" id="age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </td>
                                    <td>
                                        <input type="date" class="form-control row_set" name="anniversary_date[]" id="anniversary_date" max="<?php echo date("Y-m-d"); ?>" value="<?php if (!empty($all_traveller_info_value)) {echo $all_traveller_info_value['anniversary_date'];}?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" maxlength="10" minlength="10" name="mobile_number[]" id="mobile_number" value="<?php if (!empty($all_traveller_info_value)) {echo $all_traveller_info_value['mobile_number'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control row_set" name="last_name[]" id="last_name">
                                    </td>
                                    <td>
                                    <select class="select_css row_set" name="relation[]" id="relation">
                                        <option value="">Select</option>
                                        <?php
foreach ($relation_data as $relation_data_info) {
    ?>
                                        <option value="<?php echo $relation_data_info['id']; ?>"><?php echo $relation_data_info['relation']; ?></option>
                                        <?php }?>
                                    </select>
                                    </td>
                                    <td>
                                    <input type="file" name="image_name[]" id="image_name`+img_count+`" onchange="encodeImgtoBase64traveller_img(this)" attr_id="`+img_count+`">

                                    <input type="hidden" id="document_file_traveller_img`+img_count+`" name="document_file_traveller_img[]"
                                        value="">
                                        <div id="imagePreview_traveller_img`+img_count+`" class="mt-2 img_size_cast">
                                            <img class="traveller_img" src="<?php echo base_url(); ?>assets/uploads/inter_traveller/" width="100%" />
                                        </div>
                                    </td>
                                    <td>
                                        <input type="file" name="aadhar_image_name[]" id="aadhar_image_name`+img_count+`" onchange="encodeImgtoBase64aadhar_img(this)" attr_id="`+img_count+`">

                                        <input type="hidden" id="document_file_aadhar_img`+img_count+`" name="document_file_aadhar_img[]"
                                            value="">
                                            <div id="imagePreview_aadhar_img`+img_count+`" class="mt-2 img_size_cast">
                                                <img src="<?php echo base_url(); ?>assets/uploads/traveller_aadhar/" width="100%" />
                                            </div>
                                    </td>
                                    <td>
                                        <button type="button" id="resetBtn" class="btn btn-primary resetBtn" name="Clear" value="Reset">Reset</button>
                                    </td>

                                </tr>`);


            //alert(i);
            $('#inter_traveller_table_add').append(structure);
        }

    });

</script>


<!--  -->

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    $('#state').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/hotel/getcity',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#city').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#city').append('<option value="'+data['id']+'">'+data['district']+'</option>');
          });
        }
     });
   });
 });
 </script>
<!-- jquery validation on add Vehicle owner -->
<script>
$(document).ready(function () {

$('#add_vehicle_owner').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_owner_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,
        },
        mobile_number2: {
            maxlength:10,
            minlength:10,
        },
        // email: {
        //     required: true,
        // },
        // aadhar_front_image: {
        //     required: true,
        // },
        // aadhar_back_image: {
        //     required: true,
        // },
        // image_name: {
        //     required: true,
        // },
        // home_address: {
        //     required: true,
        // },
        // office_address: {
        //     required: true,
        // },
        password: {
            required: true,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/,

        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            minlength: 6
        }

    },

    messages :{
        vehicle_owner_name : {
            required : "Please Enter vehicle owner name",
        },
        mobile_number1 : {
            required : "Please Enter Mobile Number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        // email : {
        //     required : "Please Enter Email Address",
        // },
        // aadhar_front_image : {
        //     required : "Please Enter Aadhar Front Photo",
        // },
        // aadhar_back_image : {
        //     required : "Please Enter Aadhar Back Photo",
        // },
        // image_name : {
        //     required : "Please Enter Profile Photo",
        // },
        // home_address : {
        //     required : "Please Enter Home Address",
        // },
        // office_address : {
        //     required : "Please Enter Office Address",
        // },
        password : {
            required : "Please Enter Password",
            pattern: " Password must contain: " +
                    "At least one upper case letter, " +
                    "At least one lower case letter, " +
                    "At least one number, " +
                    "At least one special character " +
                    "and be between 6-15 characters.",
        },
        confirm_pass : {
            required : "Please Enter Confirm Password",
            equalTo: "Password Doesn't Match",
        }

    }
});

});

</script>
<!-- jquery validation on add Vehicle owner -->
<!-- jquery validation on edit Vehicle owner -->
<script>
$(document).ready(function () {

$('#edit_vehicle_owner').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_owner_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,
        },
        mobile_number2: {
            maxlength:10,
            minlength:10,
        },
        // email: {
        //     required: true,
        // },
        // home_address: {
        //     required: true,
        // },
        // office_address: {
        //     required: true,
        // },
        password: {
            required: true,
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            minlength: 6
        }

    },

    messages :{
        vehicle_owner_name : {
            required : "Please Enter vehicle owner name",
        },
        mobile_number1 : {
            required : "Please Enter Mobile Number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        // email : {
        //     required : "Please Enter Email Address",
        // },
        // home_address : {
        //     required : "Please Enter Home Address",
        // },
        // office_address : {
        //     required : "Please Enter Office Address",
        // },
        password : {
            required : "Please Enter Password",
        },
        confirm_pass : {
            required : "Please Enter Confirm Password",
        }
    }
});

});

</script>
<!-- jquery validation on edit Vehicle owner -->
<!-- package add action add hotel add more  -->

<script>
    $('.state_id').change(function(){
        // alert('hiiiiiiiiiii');
    });
</script>




<script>

$(document).ready(function(){
 // var i = '0';

   var newFields = $('');

   $("#total_days_hotel").keyup(function(e){
       e.preventDefault();
       var n = this.value || 0;
       //alert(n);
        $('#myInput').val(n);
       if (n+1) {
           if (n > newFields.length) {
               addFields(n);

           } else {
               removeFields(n);
           }
       }
   });

   function addFields(n) {
       for (i = newFields.length; i < n; i++) {
            var day=i+1;
            var input = $(`<tr>
                            <td>
                               <input type="number" class="form-control" name="day_number[]" id="day_number" placeholder="Enter Day Number" readonly value="`+day+`">
                            </td>
                            <td>
                                <select class="form-control state_id" style="width: 100%;" attr-type="state" name="state_id[]" required="required">
                                    <option value="">Select State Name</option>
                                    <?php
foreach ($state_name_data as $state_name_info) {
    ?>
                                    <option value="<?php echo $state_name_info['id']; ?>"><?php echo $state_name_info['state_name']; ?></option>
                                <?php }?>
                                </select>
                            </td>

                            <td>
                                <select class="form-control city_id" style="width: 100%;" attr-type="city" name="city_id[]" required="required">
                                    <option value="">Select City Name</option>
                                    <?php
//foreach($state_name_data as $state_name_info)
//{
?>
                                    <option value="<?php //echo $state_name_info['id']; ?>"><?php //echo $state_name_info['state_name']; ?></option>
                                <?php //} ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control hotel_name_id" style="width: 100%;" name="hotel_name_id[]" required="required">
                                    <option value="">Select Hotel Name</option>
                                    <?php
//foreach($state_name_data as $state_name_info)
//{
?>
                                    <option value="<?php //echo $state_name_info['id']; ?>"><?php //echo $state_name_info['state_name']; ?></option>
                                <?php //} ?>
                              </select>
                            </td>
                            <td>
                                <textarea class="form-control short_description" name="short_description[]" placeholder="Enter Short Description" required="required"></textarea>
                            </td>

                            <td>
                                <input type="checkbox" class="form-control in_travel" name="in_travel[]" id="in_travel" value="Travel">&nbsp;&nbsp; Travel
                                <input type="hidden" class="form-control travel_yes" name="travel_yes[]" value="">
                            </td>
                      </tr>`);
           var newInput = input.clone();

           newFields = newFields.add(newInput);
           newInput.appendTo('#main_row_hotel');
        }
   }

   function removeFields(n) {
       var removeField = newFields.slice(n).remove();
       newFields = newFields.not(removeField);
   }

       //  for (i = 0; i <= n; i++) {
       //     var newInput = input.clone();

       //     newFields = newFields.add(newInput);
       //     newInput.appendTo('#newFields');
       // }

   });

// });

// -------------------------------------------------------



// ------------------------------------------------------- -->
</script>
<!-- package add action add hotel add more  -->

<!-- package -> hotel add  state wise city display dependency start -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){
    // alert('hiiiiii');

    // district change
    $(document).on("change","select",function(){
        // alert('hiiiiii');

      var attr_val = $(this).attr('attr-type');
      var currentRow=$(this).closest("tr");
        // alert(attr_val);

      if(attr_val == 'state'){
        // alert('if');
        var did = $(this).val();
      $.ajax({
        url:'<?=base_url()?>admin/package_hotel/get_city',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

        //   $('.city_id').find('option').not(':first').remove();
          currentRow.find(".city_id").find('option').not(':first').remove();

            var col3=currentRow.text();

          $.each(response,function(index,data){
            currentRow.find(".city_id").append('<option value="'+data['id']+'">'+data['city_name']+'</option>');
          });

        }
     });
    }
// ------------------------------------------------------------------------------------

       else if(attr_val == 'city'){
        // alert('else');
        var did = $(this).val();
            $.ajax({
                url:'<?=base_url()?>admin/package_hotel/get_hotel_name',
                method: 'post',
                data: {did: did},
                dataType: 'json',
                success: function(response){

                // $('.hotel_name_id').find('option').not(':first').remove();
                currentRow.find(".hotel_name_id").find('option').not(':first').remove();

                $.each(response,function(index,data){
                    currentRow.find(".hotel_name_id").append('<option value="'+data['id']+'">'+data['hotel_name']+'</option>');
                });

                }
            });
        }


   });
 });
</script>


<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){
    // alert('hiiiiii');

    // district change
    $(document).on("change","select",function(){
        // alert('hiiiiii');

      var attr_val = $(this).attr('attr-type');
      var currentRow=$(this).closest("tr");
        // alert(attr_val);

      if(attr_val == 'state'){
        // alert('if');
        var did = $(this).val();
      $.ajax({
        url:'<?=base_url()?>admin/tour_creation_hotel/get_city',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

        //   $('.city_id').find('option').not(':first').remove();
          currentRow.find(".city_id").find('option').not(':first').remove();

            var col3=currentRow.text();

          $.each(response,function(index,data){
            currentRow.find(".city_id").append('<option value="'+data['id']+'">'+data['city_name']+'</option>');
          });

        }
     });
    }
// ------------------------------------------------------------------------------------

       else if(attr_val == 'city'){
        // alert('else');
        var did = $(this).val();
            $.ajax({
                url:'<?=base_url()?>admin/tour_creation_hotel/get_hotel_name',
                method: 'post',
                data: {did: did},
                dataType: 'json',
                success: function(response){

                // $('.hotel_name_id').find('option').not(':first').remove();
                currentRow.find(".hotel_name_id").find('option').not(':first').remove();

                $.each(response,function(index,data){
                    currentRow.find(".hotel_name_id").append('<option value="'+data['id']+'">'+data['hotel_name']+'</option>');
                });

                }
            });
        }


   });
 });
</script>

<!------ package -> hotel add  state wise city display dependency start ---->

<script>
$(document).ready(function(){
    $(document).on("change","input",function(){
  var chx = $(this).is(':checked');
//   alert(chx) ;
  if(chx == true){
// alert(chx);
  var currentRow=$(this).closest("tr");
  currentRow.find('.city_id').attr('readOnly',true);
  currentRow.find('.state_id').attr('readOnly',true);
  currentRow.find('.hotel_name_id').attr('readOnly',true);
  currentRow.find('.short_description').attr('readOnly',true);
  }
  else if(chx == false){
  var currentRow=$(this).closest("tr");
  currentRow.find('.city_id').attr('readOnly',false);
  currentRow.find('.state_id').attr('readOnly',false);
  currentRow.find('.hotel_name_id').attr('readOnly',false);
  currentRow.find('.short_description').attr('readOnly',false);
  }
//   $(this).closest('tr').find('input:text, select,textarea').prop("readOnly", chx);
});
});
</script>

<!-- admin-> package_hotel-> add -> check box select ->then input box fetch value -->
<script language=javascript>
$(document).on("click",'.in_travel',function(){
    var currentRow=$(this).closest("tr");
    var hotel_check = $(this).is(':checked');
    if (hotel_check == true){
        currentRow.find(".travel_yes").val('Travel');
    }
    else if(hotel_check == false){
        currentRow.find(".travel_yes").val('');

    }
});
</script>
<!-- admin-> package_hotel-> add -> check box select ->then input box fetch value -->

<!-- dependency code for package_hotel for edit -->

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#state_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/package_hotel/get_city',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#city_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#city_id').append('<option value="'+data['id']+'">'+data['city_name']+'</option>');
          });

        }
     });
   });
 });
</script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#state_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/tour_creation_hotel/get_city',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#city_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#city_id').append('<option value="'+data['id']+'">'+data['city_name']+'</option>');
          });

        }
     });
   });
 });
</script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#city_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/package_hotel/get_hotel_name',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#hotel_name_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#hotel_name_id').append('<option value="'+data['id']+'">'+data['hotel_name']+'</option>');
          });

        }
     });
   });
 });
</script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#city_id').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/tour_creation_hotel/get_hotel_name',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#hotel_name_id').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#hotel_name_id').append('<option value="'+data['id']+'">'+data['hotel_name']+'</option>');
          });

        }
     });
   });
 });
</script>

<script>
$(document).ready(function(){

        // alert('hiiii');
  var chx = $(this).is(':checked');
//   alert(chx) ;
  if(chx == true){
// alert(chx);
  var currentRow=$(this).closest("tr");
  currentRow.find('.city_id').attr('readOnly',true);
  currentRow.find('.state_id').attr('readOnly',true);
  currentRow.find('.hotel_name_id').attr('readOnly',true);
  currentRow.find('.short_description').attr('readOnly',true);
  }
  else if(chx == false){
  var currentRow=$(this).closest("tr");
  currentRow.find('.city_id').attr('readOnly',false);
  currentRow.find('.state_id').attr('readOnly',false);
  currentRow.find('.hotel_name_id').attr('readOnly',false);
  currentRow.find('.short_description').attr('readOnly',false);
  }
//   $(this).closest('tr').find('input:text, select,textarea').prop("readOnly", chx);
});
</script>
<!-- dependency code for package_hotel for edit -->

<!-- Agent add info (state,district,taluka) start -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#agent_state').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/agent/get_district',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

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
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#agent_district').change(function(){
      var did = $(this).val();
    //   alert(did);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/agent/get_taluka',
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){

          $('#agent_taluka').find('option').not(':first').remove();

          $.each(response,function(index,data){
             $('#agent_taluka').append('<option value="'+data['id']+'">'+data['taluka']+'</option>');
          });

        }
     });
   });
 });
 </script>


<!-- Agent add info (state,district,taluka) start -->


<!-- jquery validation on add vehicle type source -->
<script>
$(document).ready(function () {

$('#add_vehicle_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_type_name: {
            required: true,
        },

    },

    messages :{
        vehicle_type_name : {
            required : "Please Enter Vehicle Type Name",
        },

    }
});

});

</script>
<!-- jquery validation on add vehicle type source -->
<!-- jquery validation on edit vehicle type source -->
<script>
$(document).ready(function () {

$('#edit_vehicle_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_type_name: {
            required: true,
        },

    },

    messages :{
        vehicle_type_name : {
            required : "Please Enter Vehicle Type Name",
        },

    }
});

});

</script>
<!-- jquery validation on edit vehicle type source -->

<!-- jquery validation on add vehicle fuel source -->
<script>
$(document).ready(function () {

$('#add_vehicle_fuel').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_fuel_name: {
            required: true,
        },

    },

    messages :{
        vehicle_fuel_name : {
            required : "Please Enter Vehicle Fuel Name",
        },

    }
});

});

</script>
<!-- jquery validation on add vehicle fuel source -->
<!-- jquery validation on edit vehicle fuel source -->
<script>
$(document).ready(function () {

$('#edit_vehicle_fuel').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_fuel_name: {
            required: true,
        },

    },

    messages :{
        vehicle_fuel_name : {
            required : "Please Enter Vehicle Fuel Name",
        },

    }
});

});

</script>
<!-- jquery validation on edit vehicle fuel source -->

<!-- jquery validation on add vehicle brand source -->
<script>
$(document).ready(function () {

$('#add_vehicle_brand').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_brand_name: {
            required: true,
        },

    },

    messages :{
        vehicle_brand_name : {
            required : "Please Enter Vehicle Brand Name",
        },

    }
});

});

</script>
<!-- jquery validation on add vehicle brand source -->
<!-- jquery validation on edit vehicle brand source -->
<script>
$(document).ready(function () {

$('#edit_vehicle_brand').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        vehicle_brand_name: {
            required: true,
        },

    },

    messages :{
        vehicle_brand_name : {
            required : "Please Enter Vehicle Brand Name",
        },

    }
});

});

</script>
<!-- jquery validation on edit vehicle brand source -->

<!-- jquery validation on add Bus Type source -->
<script>
$(document).ready(function () {

$('#add_bus_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        bus_type: {
            required: true,
        }
    },

    messages :{
        bus_type : {
            required : "Please Enter Bus Type",
        }
    }
});

});

</script>
<!-- jquery validation on add Bus Type source -->
<!-- jquery validation on edit Bus Type source -->
<script>
$(document).ready(function () {

$('#edit_bus_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
  rules: {
    bus_type: {
            required: true,
        }
    },

    messages :{
        bus_type : {
            required : "Please Enter Bus Type",
        }
    }
});

});

</script>
<!-- jquery validation on edit Bus Type source -->


<!-- jquery validation on add document_checker -->
<script>
$(document).ready(function () {

$('#document_checker').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        document_checker_name: {
            required: true,
        }
    },

    messages :{
        document_checker_name : {
            required : "Please Enter Document Checker Name",
        }
    }
});

});

</script>
<!-- jquery validation on add document_checker -->
<!-- jquery validation on edit document_checker -->
<script>
$(document).ready(function () {

$('#document_checker').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
  rules: {
    document_checker_name: {
            required: true,
        }
    },

    messages :{
        document_checker_name : {
            required : "Please Enter Document Checker Name",
        }
    }
});

});

</script>
<!-- jquery validation on edit document_checker -->


<!-- add dates in that select slot  -->
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#year_slot').change(function(){
      var did = $(this).val();
      var pid = $('#package_id').val();
    //   alert(pid);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/package_dates/get_slot',
        method: 'post',
        data: {did: did,pid: pid},
        dataType: 'json',
        success: function(response){

          $('#single_seat_cost').find('input').not(':first').remove();

          $.each(response,function(index,data){
            // alert(data['single_seat_cost']);
            $('#single_seat_cost').val(data['single_seat_cost']);
            $('#twin_seat_cost').val(data['twin_seat_cost']);
            $('#three_four_sharing_cost').val(data['three_four_sharing_cost']);
        });

        }
     });
   });
 });
</script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url(); ?>";

  $(document).ready(function(){

    // district change
    $('#year_slot').change(function(){
      var did = $(this).val();
      var pid = $('#package_id').val();
    //   alert(pid);
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/tour_creation_dates/get_slot',
        method: 'post',
        data: {did: did,pid: pid},
        dataType: 'json',
        success: function(response){

          $('#single_seat_cost').find('input').not(':first').remove();

          $.each(response,function(index,data){
            // alert(data['single_seat_cost']);
            $('#single_seat_cost').val(data['single_seat_cost']);
            $('#twin_seat_cost').val(data['twin_seat_cost']);
            $('#three_four_sharing_cost').val(data['three_four_sharing_cost']);
        });

        }
     });
   });
 });
</script>
<!-- add dates in that select slot  -->

<!-- calendar Max date and min date  -->
<!-- <script type='text/javascript'>
$(document).ready(function(){

    $('#year_slot').on('change', function () {
    // $package_title = $('#datepicker').val();
    var from_date = $(this).attr("attr_from_date");
    // alert(from_date);

    // alert($package_title); die;
    $('#datepicker1').datepicker({
         dateFormat: "yy-mm-dd",
         maxDate: new Date('2023-2-12')
    });

    $('#datepicker1').datepicker({
         dateFormat: "yy-mm-dd",
         minDate: new Date('2022-12-5')
    });

    });
});
</script> -->

<!-- calendar Max date and min date  -->

<script>
$("#approve_service").click(function() {

    var enquiry_id= $("#enquiry_id").val();
    var package_id= $("#package_id").val();
    var package_date_id= $("#package_date_id").val();

    var is_approve = [];
        $.each($("input[name='is_approve[]']:checked"), function(){
            is_approve.push($(this).val());
        });
        // alert(is_approve);
    // var is_approve = approve.join(",");

    var service_cost = [];

    $('input[name="service_cost[]"]').each(function(){
        service_cost.push($(this).val());
    });
    // var service_cost = service_cost_pay.join(",");
    // alert(service_cost);

    var id=[];
    $('input[name="id[]"]').each(function() {
        id.push($(this).val()); //result undefine
    });

    if (is_approve!='' && service_cost>'0') {
        // alert('hiii');
        $.ajax({
            url:"<?php echo base_url(); ?>admin/final_booking_details/approve_extra_services",
            method:"POST",
            data:{
                enquiry_id:enquiry_id,
                package_id:package_id,
                package_date_id:package_date_id,
                is_approve:is_approve,
                service_cost:service_cost,
                id:id
            },
            //  dataType: 'json',
            //  cache: false,
            success: function(response) {
                // alert(response);
                // exit();

                if (response == true) {
                    // alert('Doneeeee');
                    window.location.href = "<?=base_url()?>admin/final_booking_details/details/"+enquiry_id;

                } else {
                    alert('wrong');

                }
            }

        });
    }

});
</script>

<!-- QR code master------------------------------------------------------ -->
<script type="text/javascript">
    function role_name_div(val){
    var element=document.getElementById('other_role_name');
	var element2=document.getElementById('other_role');
    if(val=='Other')
    element.style.display='block';
    else
    element.style.display='none';
	element2.value="";
    }
</script>

<!-- jquery validation on add QR code master -->

<script>
$(document).ready(function () {

$('#add_train').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        full_name: {
            required: true,
        },
        role_name: {
            required: true,
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10
        },
        upi_id: {
            required: true,
        },
        image_name: {
            required: true,
        },
        other_role: {
                required: function(element) {
                    var action = $("#role_name").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
    },

    messages :{
        full_name : {
            required : "Please Enter Full Name",
        },
        role_name : {
            required : "Please Select Role Name",
        },
        mobile_number : {
            required : "Please Enter Mobile Number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        other_role : {
            required : "Please Enter other role Name",
        },
        image_name : {
            required : "Please upload QR code image",
        },
        upi_id : {
            required : "Please Enter UPI Id",
        },
        train_name: {
            required: true,
        },
        train_number: {
            required: true,
        },
        train_boarding_station: {
            required: true,
        },
        train_arrival_station: {
            required: true,
        },
        other_stations: {
            required: true,
        },
        "train_coach[]": {
            required: true,
        },
        "running_days[]": {
            required: true,
        }
    },

    messages :{
        train_name : {
            required : "Please enter train name",
        },
        train_number : {
            required : "Please enter train number",
        },
        train_boarding_station : {
            required : "Please enter boarding station",
        },
        train_arrival_station : {
            required : "Please enter arrival station",
        },
        other_stations : {
            required : "Please enter other stations",
        },
        "train_coach[]": {
            required : "Please select train coach",
        },
        "running_days[]": {
            required : "Please select running days",
        },
    }
});

});

</script>

<script>
$(document).ready(function () {

$('#edit_train').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        train_name: {
            required: true,
        },
        train_number: {
            required: true,
        },
        train_boarding_station: {
            required: true,
        },
        train_arrival_station: {
            required: true,
        },
        other_stations: {
            required: true,
        },
        "train_coach[]": {
            required: true,
        },
        "running_days[]": {
            required: true,
        }
    },

    messages :{
        train_name : {
            required : "Please enter train name",
        },
        train_number : {
            required : "Please enter train number",
        },
        train_boarding_station : {
            required : "Please enter boarding station",
        },
        train_arrival_station : {
            required : "Please enter arrival station",
        },
        other_stations : {
            required : "Please enter other stations",
        },
        "train_coach[]": {
            required : "Please select train coach",
        },
        "running_days[]": {
            required : "Please select running days",
        },
    }
});

});

</script>

<script>
    $(document).ready(function (){
        // $(".if_ticket_yes_div").hide();

    $("#Yes").change(function () {
        var tno = $("#Yes").val();
        if(tno=='Yes')
        {
            $(".if_ticket_yes_div").show();
        }
        else
        {
            $(".if_ticket_yes_div").hide();
        }
        });
        $("#No").change(function () {
        var tno = $("#No").val();
        if(tno=='No')
        {
            $(".if_ticket_yes_div").hide();
        }
        else if(tno=='No')
        {
            $(".if_ticket_yes_div").show();
        }
        });
    });
</script>

<script>

    var i=1;

    $('#add_more_place').click(function() {
        $('.select2').select2()
            i++;

var structure = $(`<div class="row" id="new_row`+i+`">

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Place Name</label>
                            <input type="text" class="form-control" name="Place_name[]" id="Place_name`+i+`" placeholder="Enter Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Opening Time</label>
                            <input type="time" class="form-control" name="opening_time[]" id="opening_time`+i+`" placeholder="Enter opening time" required="required">
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Closing Time</label>
                            <input type="time" class="form-control" name="closing_time[]" id="closing_time`+i+`" placeholder="Enter closing time" required="required">
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Open Days</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="open_days[]" id="open_days`+i+`" required="required">
                                <option value="">Select </option>
                                <option value="1">Sunday</option>
                                <option value="2">Monday</option>
                                <option value="3">Tuesday</option>
                                <option value="4">Wednesday</option>
                                <option value="5">Thursday</option>
                                <option value="6">Friday</option>
                                <option value="7">Saturday</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Required Time will it take to see this place</label>
                            <input type="text" class="form-control" name="req_time[]" id="req_time`+i+`" placeholder="Enter time" required="required">
                        </div>
                        </div>

                        <div class="col-md-3">
                        <label>Is It Entry Ticket Cost </span></label>
                        <div class="form-group">
                            <input type="radio" id="Yes`+i+`" class="ticket_yes_no`+i+`" name="ticket_yes_no[]" value="Yes" > &nbsp;
                            <label>Yes</label>  &nbsp; &nbsp;
                            <input type="radio" id="No`+i+`" class="ticket_yes_no`+i+`" name="ticket_yes_no[]" value="No"> &nbsp;
                            <label>No</label><br>
                        </div>
                        </div>
                        <div class="col-md-4 if_ticket_yes_div">
                        <div class="form-group">
                            <label>Enter Ticket Cost </span></label>
                            <input type="text" class="form-control if_ticket_yes_no" name="ticket_cost[]" id="ticket_cost`+i+`" placeholder="Enter cost" required="required" />
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Allowed Vehicle Types</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select Vehicle Types" style="width: 100%;" name="allow_vehicle_types[]" id="allow_vehicle_types`+i+`" required="required">
                                <option value="">Select types</option>
                                <?php
foreach ($vehicle_type as $vehicle_type_info) {
    ?>
                                <option value="<?php echo $vehicle_type_info['id']; ?>"><?php echo $vehicle_type_info['vehicle_type_name']; ?></option>
                            <?php }?>
                            </select>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Enter Nearest Railway Station Name</label>
                            <input type="text" class="form-control" name="railway_station_name[]" id="railway_station_name`+i+`" placeholder="Enter Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                        </div>

                        <div class="col-md-1 pt-4 d-flex justify-content-center align-self-center">
                            <div class="form-group">
                                <label></label>
                                <button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">X</button>
                            </div>
                        </div>
                    </div>`);
    $('#main_row').append(structure);
    $('.select2').select2()

    // $(".if_ticket_yes_div").hide();

        $('input[name="ticket_yes_no[]"]').change(function() {
            if ($(this).val() === 'Yes') {
                element.closest('.if_ticket_yes_div').show(error);
                $(".if_ticket_yes_div").show();
                $('#ticket_cost' + i).prop('required', true);
            } else {
                $(".if_ticket_yes_div").hide();
                $('#ticket_cost' + i).prop('required', false);
            }
        });

});


$(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#new_row'+button_id+'').remove();
      });

</script>

<script>
$(document).ready(function () {

$('#add_citywise_place_master').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        "select_district": {
            required: true,
        },
        "approximate_hall_rate": {
            required: true,
        },
        "separate_room_rate": {
            required: true,
        },
        "dharmshala_rate": {
            required: true,
        },
        "state_tax": {
            required: true,
        },

        "Place_name[]": {
            required: true,
        },
        "open_days[]": {
            required: true,
        },
        "allow_vehicle_types[]": {
            required: true,
        },

        "opening_time[]": {
            required: true,
        },
        "closing_time[]": {
            required: true,
        },
        "req_time[]": {
            required: true,
        },
        "ticket_yes_no[]": {
            required: true,
        },
        "ticket_cost[]": {
            required: true,
        },
        "railway_station_name[]": {
            required: true,
        }
    },

    messages :{
        "select_district": {
            required : "Please select district",
        },
        "approximate_hall_rate": {
            required : "Please enter approximate hall rate",
        },
        "separate_room_rate": {
            required : "Please enter separate soom rate",
        },
        "dharmshala_rate": {
            required : "Please dharmshala rate",
        },
        "state_tax": {
            required : "Please enter state tax",
        },

        "Place_name[]": {
            required : "Please enter name",
        },
        "open_days[]": {
            required : "Please select days",
        },
        "allow_vehicle_types[]": {
            required : "Please select vehicle types",
        },

        "opening_time[]": {
            required : "Please select opening time",
        },
        "closing_time[]": {
            required : "Please select closing time",
        },
        "req_time[]": {
            required : "Please enter required time",
        },
        "ticket_yes_no[]": {
            required : "Please select entry ticket cost",
        },
        "ticket_cost[]": {
            required : "Please enter ticket cost",
        },
        "railway_station_name[]": {
            required : "Please enter nearest railway station name",
        },
    }
});

});

</script>

<!-- jquery validation on add QR code master -->

<script>

$(document).ready(function () {

$('#add_QR_code').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        full_name: {
            required: true,
        },
        role_name: {
            required: true,
        },
        upi_id: {
            required: true,
        },
        image_name: {
            required: true,
        },
        other_role: {
                required: function(element) {
                    var action = $("#role_name").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
    },

    messages :{
        full_name : {
            required : "Please Enter Full Name",
        },
        role_name : {
            required : "Please Select Role Name",
        },

        other_role : {
            required : "Please Enter other role Name",
        },

        image_name : {
            required : "Please upload QR code image",
        },

        upi_id : {
            required : "Please Enter UPI Id",
        }

    }

});


});

</script>

<script>
$(document).ready(function () {

$('#edit_QR_code').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        full_name: {
            required: true,
        },
        role_name: {
            required: true,
        },
        mobile_number: {
            required: true,
            maxlength:10,
            minlength:10
        },
        upi_id: {
            required: true,
        },
        old_img_name: {
            required: true,
        },
        other_role: {
                required: function(element) {
                    var action = $("#role_name").val();
                    if (action == "Other") {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
    },

    messages :{
        full_name : {
            required : "Please Enter Full Name",
        },
        role_name : {
            required : "Please Select Role Name",
        },
        mobile_number : {
            required : "Please Enter Mobile Number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        other_role : {
            required : "Please Enter other role Name",
        },
        old_img_name : {
            required : "Please upload QR code image",
        },
        upi_id : {
            required : "Please Enter UPI Id",
        }
    }
});

});

</script>
<!-- jquery validation on add QR code master -->

<!-- QR code master------------------------------------------------------ -->

<!-- measuring unit master------------------------------------ -->
<!-- jquery validation on add measuring unit source -->
<script>
$(document).ready(function () {

$('#add_measuring_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        measuring_type: {
            required: true,
        }
    },

    messages :{
        measuring_type : {
            required : "Please Enter Measuring Type",
        }
    }
});

});

</script>

<script>
$(document).ready(function () {

$('#edit_measuring_type').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        measuring_type: {
            required: true,
        }
    },

    messages :{
        measuring_type : {
            required : "Please Enter Measuring Type",
        }
    }
});

});

</script>
<!-- jquery validation on add measuring unit source -->
<!-- measuring unit master------------------------------------ -->





<!--  -->

<script>
    $(document).ready(function () {
        var newFields = $();

        $("#tour_creation_total_days").keyup(function (e) {
            e.preventDefault();
            var n = this.value || 0;
            $('#myInput').val(n);
            var input_type= $(this).attr('attr_input_type');

            if(input_type=="new"){
                if (n >= 0) {
                    if (n > newFields.length) {
                        addFields(n);
                    } else {
                        removeFields(n);
                    }
                } else {
                    // If total days is less than 1, clear the accordion
                    $("#accordion").empty();
                }
            }else if(input_type=="old"){
                if (n >= 0) {
                    if (n > newFields.length) {
                        addFields_old(n);
                    } else {
                        removeFields(n);
                    }
                } else {
                    // If total days is less than 1, clear the accordion
                    $("#accordion").empty();
                }
            }

        });

        function addFields(n) {
            for (var i = 0; i < n; i++) {
                var day = i + 1;
                var input = `
                <form id="form_123" class="form_cls" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header" id="heading${day}" data-toggle="collapse" data-target="#collapse${day}" aria-expanded="false" aria-controls="collapse${day}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" >
                                    Day ${day} Fields
                                    <i class="rotate-icon"></i>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse${day}" class="collapse" aria-labelledby="heading${day}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tour Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="tour_number[]" id="tour_number" placeholder="Tour Number" required value="<?php echo $id; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Day Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="day_number[]" id="day_number" placeholder="Enter Day Number" required value="${day}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label>Select District <span class="text-danger">*</label>
                                                <select class="select_css district" name="district[]" attr_district="district" required="required" attr_day="${day}">
                                                    <option value="">Select district</option>
                                                    <?php
                                                foreach ($district_data as $district_info) {
                                                    ?>
                                                    <option value="<?php echo $district_info['select_district']; ?> "><?php echo $district_info['district']; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table border="1" class="table table-bordered" id="table_${day}">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr no.</th>
                                                                <th>Places <span class="text-danger">*</th>
                                                                <th>Time <span class="text-danger">*</th>
                                                                <th>Visit Time <span class="text-danger">*</th>
                                                                <th>Details</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>${day}</td>
                                                                <td>
                                                                    <select class="select_css select_place place_name${day}" name="place_name[]" id="place_name" attr_time="${day}" required="required">
                                                                        <option value="">Select Place</option>
                                                                    </select>
                                                                </td>
                                                                <td><input readonly type="input" name="time[]" id="time" value=""></td>
                                                                <td><input type="time" class="form-control" name="visit_time[]" id="visit_time" placeholder="Enter Visit Time" required></td>
                                                                <td><input type="text" class="form-control" name="details[]" id="details" placeholder="Enter Details"></td>
                                                                <td>
                                                                    <button class="btn btn-success add-row" id="add_tr${day}" type="button" data-day="${day}">Add row</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="display: block;">Upload Image ${day} <span class="text-danger">*</label>
                                                    <input type="file" name="image_name[]" id="image_name" required="required">
                                                    <br><span class="text-danger">Please select only JPG, PNG, JPEG format files.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Itinerary For Day ${day} <span class="text-danger">*</span></label>
                                                    <textarea class="form-control iternary_desc" name="iternary_desc[]" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-success add-row_district" type="button" data-day="${day}">Add another district</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary form-control daywise_submit" style="width:10%;">Submit</button>
                        </div>
                    </div>
                </form>`;
                var newInput = $(input);
                newFields = newFields.add(newInput);
                newInput.appendTo('#accordion');
            }
        }    
                // Add a click event handler for the "Add row" buttons
                var p=1;
                $('#accordion').on('click', '.add-row', function () {
                    alert('gggggggggggg');
                    p++;
                    var day = $(this).attr('data-day');
                    alert(day);
                    var newRow = $(`
                        <tr>
                            <td>${p}</td>
                            <td>
                                <select class="select_css select_place place_name${day}" name="place_name[]" id="place_name" required="required">
                                <option value="">Select Place</option>
                                </select>
                            </td>
                            <td><input readonly type="input" name="time[]" id="time" value=""></td>
                            <td><input type="time" class="form-control" name="visit_time[]" id="visit_time" placeholder="Enter Visit Time" required></td>
                            <td><input type="text" class="form-control" name="details[]" id="details" placeholder="Enter Details"></td>
                            <td>
                                <button class="btn btn-danger remove-row" type="button">Remove</button>
                            </td>
                        </tr>
                    `);

                    // Append the new row to the table
                    // console.log(newRow);
                    $(`#table_${day}`).append(newRow);

                                    // district change

            // var totaldays = $('#tour_creation_total_days').val();
            // var district_id = $("[attr_day=" + day + "]").val();

          
                    // Add a click event handler for the "Remove" buttons in the newly added row
                    // $('.remove-row').click(function () {
                    //     $(this).closest('tr').remove();
                    // });
                });

             
        

        function addFields_old(n) {
            for (var i = 0; i < n; i++) {
                var prev_days =$('input[name="prev_days_val"]').val();
                var new_day = i + 1;
                var day = parseInt(prev_days) + parseInt(new_day);
                var input = `
                <form id="form_123" class="form_cls" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header" id="heading${day}" data-toggle="collapse" data-target="#collapse${day}" aria-expanded="false" aria-controls="collapse${day}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" >
                                    Day ${day} Fields
                                    <i class="rotate-icon"></i>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse${day}" class="collapse" aria-labelledby="heading${day}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tour Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="tour_number[]" id="tour_number" placeholder="Tour Number" required value="<?php echo $id; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Day Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="day_number[]" id="day_number" placeholder="Enter Day Number" required value="${day}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label>Select District <span class="text-danger">*</label>
                                                <select class="select_css district" name="district[]" attr_district="district" required="required" attr_day="${day}">
                                                    <option value="">Select district</option>
                                                    <?php
                                                foreach ($district_data as $district_info) {
                                                    ?>
                                                    <option value="<?php echo $district_info['select_district']; ?> "><?php echo $district_info['district']; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table border="1" class="table table-bordered" id="table_${day}">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr no.</th>
                                                                <th>Places <span class="text-danger">*</th>
                                                                <th>Time <span class="text-danger">*</th>
                                                                <th>Visit Time <span class="text-danger">*</th>
                                                                <th>Details</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>${day}</td>
                                                                <td>
                                                                    <select class="select_css select_place place_name${day}" name="place_name[]" id="place_name" attr_time="${day}" required="required">
                                                                        <option value="">Select Place</option>
                                                                    </select>
                                                                </td>
                                                                <td><input readonly type="input" name="time[]" id="time" value=""></td>
                                                                <td><input type="time" class="form-control" name="visit_time[]" id="visit_time" placeholder="Enter Visit Time" required></td>
                                                                <td><input type="text" class="form-control" name="details[]" id="details" placeholder="Enter Details"></td>
                                                                <td>
                                                                    <button class="btn btn-success add-row" id="add_tr${day}" type="button" data-day="${day}">Add row</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="display: block;">Upload Image ${day} <span class="text-danger">*</label>
                                                    <input type="file" name="image_name[]" id="image_name" required="required">
                                                    <br><span class="text-danger">Please select only JPG, PNG, JPEG format files.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Itinerary For Day ${day} <span class="text-danger">*</span></label>
                                                    <textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-success add-row_district" type="button" data-day="${day}">Add another district</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary form-control daywise_submit" style="width:10%;">Submit</button>
                        </div>
                    </div>
                </form>`;
                var newInput = $(input);
                newFields = newFields.add(newInput);
                var add_new_acordian='#accordion'+prev_days;
                newInput.appendTo('.card-body');
            }
        }
                // Add a click event handler for the "Add row" buttons
                // var p=1;
                // $(document).on('click', '.add-row', function () {
                //     console.log('hiii');
            

              

                // });

                var xyz=0;
                $('.add-row_district').click(function () {
                    xyz++;

                    var day = $(this).data('day');
                    var new_district_day = `

                            <div class="card-body new_district${day}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Day Number <span class="text-danger">*</label>
                                                    <input type="number" readonly class="form-control" name="day_number" id="day_number" placeholder="Enter Day Number" value="${day}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Select District <span class="text-danger">*</label>
                                                <select class="select_css district" name="district${xyz}" attr_district="district" required="required" attr_day="${day}_${xyz}">
                                                <option value="">Select Place</option>
                                                    <?php
                                                        foreach ($district_data as $district_info) {
                                                    ?>
                                                    <option value="<?php echo $district_info['select_district']; ?> "><?php echo $district_info['district']; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table border="1" class="table table-bordered" id="table_${day}_${xyz}">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr no.</th>
                                                                <th>Places <span class="text-danger">*</th>
                                                                <th>Time <span class="text-danger">*</th>
                                                                <th>Visit Time <span class="text-danger">*</th>
                                                                <th>Details</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>${day}</td>
                                                                <td>
                                                                    <select class="select_css place_name${day}_${xyz}" name="place_name${xyz}[]" id="place_name" attr_another_num="${xyz}" required="required">
                                                                        <option value="">Select district</option>
                                                                    </select>
                                                                    <input readonly class="time" type="hidden" name="new_dist_row_no" id="time" value="">
                                                                </td>
                                                                <td><input readonly class="time" type="input" name="time${xyz}[]" id="time" value=""></td>
                                                                <td><input type="time" class="form-control" name="visit_time${xyz}[]" id="visit_time" placeholder="Enter Visit Time" required></td>
                                                                <td><input type="text" class="form-control" name="details${xyz}[]" id="details" placeholder="Enter Details"></td>
                                                                <td>
                                                                    <button class="btn btn-success add-row" type="button" data-day="${day}_${xyz}" attr_another_num_btn="${xyz}">Add row</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="display: block;">Upload Image ${day} <span class="text-danger">*</label>
                                                    <input type="file" name="image_name${xyz}[]" id="image_name" required="required">
                                                    <br><span class="text-danger">Please select only JPG, PNG, JPEG format files.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Itinerary For Day ${day} <span class="text-danger">*</span></label>
                                                    <textarea class="form-control iternary_desc" name="iternary_desc" id="iternary_desc" placeholder="Enter Itinerary Description" required="required"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn btn-danger remove_d_row" type="button">Remove</button>
                                </div>
                            </div> `;

                    // Append the new row to the table
                    $(`#accordion #collapse${day}`).append(new_district_day);
                    // Add a click event handler for the "Remove" buttons in the newly added row
                    $('.remove_d_row').click(function () {
                        $(this).closest(`.new_district${day}`).remove();
                    });
                });

        function removeFields(n) {
            var removeField = newFields.slice(n).remove();
            newFields = newFields.not(removeField);
        }

        // Add event listener to update the arrow icon when the accordion is clicked
        $('#accordion').on('shown.bs.collapse', function (e) {
            $(e.target)
                .prev()
                .find('.rotate-icon')
                .addClass('collapsed');
        });

        $('#accordion').on('hidden.bs.collapse', function (e) {
            $(e.target)
                .prev()
                .find('.rotate-icon')
                .removeClass('collapsed');
        });
    });
</script>


<script type='text/javascript'>
    // baseURL variable
    var baseURL= "<?php echo base_url(); ?>";

    $(document).ready(function(){

        // district change
        $(document).on("change",".district",function(){
            var totaldays = $('#tour_creation_total_days').val();
            var district_id = $(this).val();
            var day_no = $(this).attr('attr_day');

        $.ajax({
            url:'<?=base_url()?>admin/tour_creation_iternary/getplaces',
            method: 'post',
            data: {did: district_id},
            dataType: 'json',
            success: function(response){

            var closestTable = $(this).closest("table");


                $('.place_name'+day_no).find('option').not(':first').remove();
            $.each(response,function(index,data){
                $('.place_name'+day_no).append('<option value="'+data['id']+'">'+data['place_name']+'</option>');
            });

            }
        });
        });
    });
</script>

<!-- <script>
     $(document).on("change","select",function(){
         var selectedOption=$(this).val();
           var select_name=$(this).attr('name');
           var select_id=$(this).attr('id');

          $('.district').find('option[value="' + selectedOption + '"]').prop('disabled', true);

          $('#'+select_id).find('option[value="' + selectedOption + '"]').prop('disabled', false);

          $(".district").each(function () {
               var from_series_id=$(this).val();
               if(from_series_id!="")
               {

          $('.place_name').attr("disabled", false);
               }else{
          $('.place_name').attr("disabled", true);

               }
          });

     });
</script> -->

<script type='text/javascript'>
    // baseURL variable
    var baseURL= "<?php echo base_url(); ?>";

    $(document).ready(function(){
        // district change
        $(document).on("change",".district",function(){
            var totaldays = $('#tour_creation_total_days').val();
            var district_id = $(this).val();
            var day_no = $(this).attr('attr_day');
        $.ajax({
            url:'<?=base_url()?>admin/tour_creation_iternary/getplaces',
            method: 'post',
            data: {did: district_id},
            dataType: 'json',
            success: function(response){

            var closestTable = $(this).closest("table");

                $('.place_name'+day_no).find('option').remove();
                $('.place_name'+day_no).append('<option value="">Select Place</option>');
            $.each(response,function(index,data){
                $('.place_name'+day_no).append('<option value="'+data['id']+'">'+data['place_name']+'</option>');
            });
            }
        });
        });
    });
</script>

<!--  -->

<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";

    $(document).ready(function () {

        // district change
        $(document).on("change", "#place_name", function () {

            var time_data = $(this).val();
            var added_id = $(this).attr('attr_another_num');
            // alert(typeof added_id);

            if(typeof added_id != 'undefined'){
                var time_input_name = 'time'+added_id+'[]';
            }else{
                var time_input_name = 'time[]';
            }
            alert(time_input_name);
            var closestTr = $(this).closest("tr");

            $.ajax({
                url: '<?=base_url()?>admin/tour_creation_iternary/gettime',
                method: 'post',
                data: { did: time_data },
                dataType: 'json',
                success: function (response) {

                    // Find the input element within the same row and update its value
                    var timeInput = closestTr.find('input[name="'+time_input_name+'"]');
                    timeInput.val(response[0]['req_time']);

                    // If you expect multiple time values and want to append them to the same input field, you can use the following code
                    // var timeInput = closestTr.find('input[name="time"]');
                    // $.each(response, function (index, data) {
                    //     timeInput.val(timeInput.val() + data['req_time'] + ' '); // Append values with a space separator
                    // });

                }
            });
        });
    });
</script>

<!-- <script>
    $(document).on("change","select",function(){
        var selectedOption=$(this).val();
        var select_name=$(this).attr('place_name');
        var select_id=$(this).attr('id');

        $('#place_name').find('option[value="' + selectedOption + '"]').prop('disabled', true);

        $('#'+select_id).find('option[value="' + selectedOption + '"]').prop('disabled', false);
    });

</script> -->


<script>
      $(document).ready(function(){
        // alert('hii');
        $(document).on('click','.daywise_submit', function () {
            // var closestTable = $(this).closest("table");
            // console.log(closestTable.closest("tr"));
            var closest_form = $(this).closest('#form_123');
        var total_days = closest_form.find('#total_days').val();

        var tour_number = closest_form.find('#tour_number').val();
        var day_number = closest_form.find('#day_number').val();
        var district = closest_form.find('select[name="district[]"]').map(function() {
        return $(this).val();
        }).get();

        var select_place_values = closest_form.find('select[name="place_name[]"]').map(function() {
        return $(this).val();
        }).get();

        var time_values = closest_form.find('input[name="time[]"]').map(function() {
        return $(this).val();
        }).get();

        var visit_time_values = closest_form.find('input[name="visit_time[]"]').map(function() {
        return $(this).val();
        }).get();

        var details_values = closest_form.find('input[name="details[]"]').map(function() {
        return $(this).val();
        }).get();

        var iternary_desc=$('#iternary_desc').val();

        // var iternary_desc = closest_form.find('textarea[name="iternary_desc"]').map(function() {
        // return $(this).val();
        // }).get();

        // var image_name = $(this).closest('#form_123').find('input[name="image_name[]"]').map(function () {
        //     return this.value; // $(this).val()
        // }).get();

        // var image_name = $(this).closest('#form_123').find('#image_name').map(function () {
        //         return this.value;
        //     }).get();

        // var total_days = $('#total_days').val();

        // var tour_number = $('#tour_number').val();
        // var day_number = $('#day_number').val();
        // alert(tour_number);
        // var day_number = $('input[name="day_number"]').map(function() {
        // return $(this).val();
        // }).get();
        // var day_number = $('#day_number').val();
        // alert(day_number);
        // var district = $(".district option:selected").val();
        // alert(district);
        // var district = $('select[name="district[]"]').map(function() {
        // return $(this).val();
        // }).get();
        // alert(district);

        // var select_place = $('input[name="place_name[]"]').val();
        // var select_place_values = $('select[name="place_name[]"]').map(function() {
        // return $(this).val();
        // }).get();
        // alert(select_place_values);
        // var time_values = $('input[name="time[]"]').map(function() {
        // return $(this).val();
        // }).get();
        // alert(time_values);
        // var visit_time_values = $('input[name="visit_time[]"]').map(function() {
        // return $(this).val();
        // }).get();
        // alert(visit_time_values);
        // var details_values = $('input[name="details[]"]').map(function() {
        // return $(this).val();
        // }).get();
        // alert(details_values);

        // var iternary_desc = $('textarea[name="iternary_desc[]"]').map(function() {
        // return $(this).val();
        // }).get();
        // alert(visit_time_values);
        // var iternary_desc = $('#iternary_desc').val();
        // alert(iternary_desc);


// exit();
        // var image_name = $('input[name="image_name[]"]').map(function () {
        //     return this.value; // $(this).val()
        // }).get();

        // var image_name = $('#image_name').map(function () {
        //         return this.value;
        //     }).get();


        $.ajax({
            method: 'post',
                          url:'<?=base_url()?>admin/tour_creation_iternary/insert_daywise_iternary',
                          data: { tour_number: tour_number,
                            day_number: day_number,
                            district: district,
                            select_place_values: select_place_values,
                            time_values: time_values,
                            visit_time_values: visit_time_values,
                            details_values: details_values,
                            iternary_desc: iternary_desc,
                            // image_names: image_name
                        },
                          dataType: 'json',
                          cache: false,
                          success: function(response) {
                            // alert(response);
                              if (response.message === 'Data inserted successfully') {
                                //   alert('success');
                                // window.location.href = "<?//=base_url()?>admin/day_wise_tour_itinerary/add";
                              } else {
                                  alert('error');

                              }
                          },
                      });
    });
});

 </script>

 <!-- jquery validation on add prospect and rate chart for fornt website -->
 <script>
$(document).ready(function () {

  $('#add_prospect').validate({ // initialize the plugin
    errorPlacement: function ($error, $element) {
      $error.appendTo($element.closest("div"));
    },
    rules: {
      image_name: {
        required: true,
        accept: "application/pdf", // Make sure it's a PDF file
        filesize: 1024 * 1024,     // Max size is 1MB (in bytes)
      },
      rate_chart_pdf: {
        required: true,
        accept: "application/pdf", // Make sure it's a PDF file
        filesize: 1024 * 1024,     // Max size is 1MB (in bytes)
      }
    },

    messages: {
      image_name: {
        required: "Please upload prospect pdf",
        accept: "Only PDF files are allowed",
        filesize: "File size must be less than 1MB",
      },
      rate_chart_pdf: {
        required: "Please upload rate chart pdf",
        accept: "Only PDF files are allowed",
        filesize: "File size must be less than 1MB",
      },
    }
  });
  // Add a custom validation method for file size
  $.validator.addMethod("filesize", function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param);
    }, "File size must be less than {0} bytes");

});
</script>

<script>
$(document).ready(function () {

  $('#edit_prospect').validate({ // initialize the plugin
    errorPlacement: function ($error, $element) {
      $error.appendTo($element.closest("div"));
    },
    rules: {
      old_img_name: {
        required: true,
        accept: "application/pdf", // Make sure it's a PDF file
        filesize: 1024 * 1024,     // Max size is 1MB (in bytes)
      },
      old_img_name2: {
        required: true,
        accept: "application/pdf", // Make sure it's a PDF file
        filesize: 1024 * 1024,     // Max size is 1MB (in bytes)
      }
    },

    messages: {
      old_img_name: {
        required: "Please upload prospect pdf",
        accept: "Only PDF files are allowed",
        filesize: "File size must be less than 1MB",
      },
      old_img_name2: {
        required: "Please upload rate chart pdf",
        accept: "Only PDF files are allowed",
        filesize: "File size must be less than 1MB",
      },
    }
  });
  // Add a custom validation method for file size
  $.validator.addMethod("filesize", function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param);
    }, "File size must be less than {0} bytes");

});
</script>
<!-- jquery validation on add prospect and rate chart for fornt website -->

<!-- bus seat conditions -->

<script>

$('.first_class').click(function() {

    if(this.checked){

var selected_seat_id = $(this).val();

var second_selecter_id='#second_class_i'+selected_seat_id;

var third_selecter_id='#third_class_i'+selected_seat_id;

var fourth_selecter_id='#fourth_class_i'+selected_seat_id;

$(second_selecter_id).prop('disabled', true);

$(third_selecter_id).prop('disabled', true);

$(fourth_selecter_id).prop('disabled', true);

    }else{

        var selected_seat_id = $(this).val();

var second_selecter_id='#second_class_i'+selected_seat_id;

var third_selecter_id='#third_class_i'+selected_seat_id;

var fourth_selecter_id='#fourth_class_i'+selected_seat_id;


$(second_selecter_id).prop('disabled', false);

$(third_selecter_id).prop('disabled', false);

$(fourth_selecter_id).prop('disabled', false);


    }

});



$('.second_class').click(function() {

    if(this.checked){

var selected_seat_id = $(this).val();

var first_selecter_id='#first_class_i'+selected_seat_id;
var third_selecter_id='#third_class_i'+selected_seat_id;
var fourth_selecter_id='#fourth_class_i'+selected_seat_id;


$(first_selecter_id).prop('disabled', true);
$(third_selecter_id).prop('disabled', true);
$(fourth_selecter_id).prop('disabled', true);

    }else{

var selected_seat_id = $(this).val();

var first_selecter_id='#first_class_i'+selected_seat_id;
var third_selecter_id='#third_class_i'+selected_seat_id;
var fourth_selecter_id='#fourth_class_i'+selected_seat_id;


$(first_selecter_id).prop('disabled', false);
$(third_selecter_id).prop('disabled', false);
$(fourth_selecter_id).prop('disabled', false);

    }

});



$('.third_class').click(function() {

    if(this.checked){
var selected_seat_id = $(this).val();

var first_selecter_id='#first_class_i'+selected_seat_id;
var second_selecter_id='#second_class_i'+selected_seat_id;
var fourth_selecter_id='#fourth_class_i'+selected_seat_id;

$(first_selecter_id).prop('disabled', true);
$(second_selecter_id).prop('disabled', true);
$(fourth_selecter_id).prop('disabled', true);

    }else{

        var selected_seat_id = $(this).val();

var first_selecter_id='#first_class_i'+selected_seat_id;
var second_selecter_id='#second_class_i'+selected_seat_id;
var fourth_selecter_id='#fourth_class_i'+selected_seat_id;

$(first_selecter_id).prop('disabled', false);
$(second_selecter_id).prop('disabled', false);
$(fourth_selecter_id).prop('disabled', false);

    }

});


$('.fourth_class').click(function() {

if(this.checked){
var selected_seat_id = $(this).val();

var first_selecter_id='#first_class_i'+selected_seat_id;
var second_selecter_id='#second_class_i'+selected_seat_id;
var third_selecter_id='#third_class_i'+selected_seat_id;


$(first_selecter_id).prop('disabled', true);
$(second_selecter_id).prop('disabled', true);
$(third_selecter_id).prop('disabled', true);


}else{

    var selected_seat_id = $(this).val();

var first_selecter_id='#first_class_i'+selected_seat_id;
var second_selecter_id='#second_class_i'+selected_seat_id;
var third_selecter_id='#third_class_i'+selected_seat_id;


$(first_selecter_id).prop('disabled', false);
$(second_selecter_id).prop('disabled', false);
$(third_selecter_id).prop('disabled', false);

}

});

</script>

<!-- expences checker master validation -->
<script>
$(document).ready(function () {

$('#add_Expences_checker').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        expences_checker_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10
        },
        email: {
            required: true,
            email:true
        },
        password: {
            required: true,
            // minlength: 6
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            // minlength: 6

        }
    },

    messages :{
        expences_checker_name : {
            required : "Please enter expence checker name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        password : {
            required : "Please enter password",
            pattern: " Password must contain: " +
                     "At least one upper case letter, " +
                     "At least one lower case letter, " +
                     "At least one number, " +
                     "At least one special character " +
                     "and be between 6-15 characters."
            // minlength : "Please enter 6 digit or character length",
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            // minlength : "Please enter 6 digit or character length"
        }
    }
});

});

</script>

<script>
$(document).ready(function () {

$('#edit_Expences_checker').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        expences_checker_name: {
            required: true,
        },
        mobile_number1: {
            required: true,
            maxlength:10,
            minlength:10,

        },
        mobile_number2: {
            maxlength:10,
            minlength:10
        },
        email: {
            required: true,
            email:true
        },
        password: {
            required: true,
            // minlength: 6
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/
        },
        confirm_pass: {
            required: true,
            equalTo: "#password",
            // minlength: 6

        }
    },

    messages :{
        expences_checker_name : {
            required : "Please enter expence checker name",
        },
        mobile_number1 : {
            required : "Please enter mobile number",
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        mobile_number2 : {
            maxlength: "Please enter maximum 10 digit number",
            minlength: "Please enter minimum 10 digit number"
        },
        email : {
            required : "Please enter email address",
            email: "Please enter a valid email address"
        },
        password : {
            required : "Please enter password",
            pattern: " Password must contain: " +
                     "At least one upper case letter, " +
                     "At least one lower case letter, " +
                     "At least one number, " +
                     "At least one special character " +
                     "and be between 6-15 characters."
            // minlength : "Please enter 6 digit or character length",
        },
        confirm_pass : {
            required : "Please enter confirm password",
            equalTo : "New password and Confirm Password can't match",
            // minlength : "Please enter 6 digit or character length"
        }
    }
});

});

</script>

<!-- country master validation -->
<script>
$(document).ready(function () {

$('#add_country').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        "country_name": {
            required: true,
        }
    },

    messages :{
        "country_name" : {
            required : "Please enter country",
        }
    }
});

});

</script>

<script>
$(document).ready(function () {

$('#edit_country').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        "country_name": {
            required: true,
        }
    },

    messages :{
        "country_name" : {
            required : "Please enter country",
        }
    }
});

});

</script>

<!-- country master validation -->

<!-- district master validation -->
<script>
$(document).ready(function () {

$('#add_district').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        district: {
            required: true,
        }
    },

    messages :{
        country_id : {
            required : "Please Select country",
        },
        state_id : {
            required : "Please select state name",
        },
        district : {
            required : "Please enter district name",
        }
    }
});

});

</script>
<script>
$(document).ready(function () {

$('#edit_district').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        district: {
            required: true,
        }
    },

    messages :{
        country_id : {
            required : "Please Select country",
        },
        state_id : {
            required : "Please select state name",
        },
        district : {
            required : "Please enter district name",
        }
    }
});

});

</script>
<!-- district master validation -->

<!-- Taluka master validation  -->
<script>
$(document).ready(function () {

$('#add_taluka').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        district_id: {
            required: true,
        },
        taluka: {
            required: true,
        }
    },

    messages :{
        country_id : {
            required : "Please Select country",
        },
        state_id : {
            required : "Please select state name",
        },
        district_id : {
            required : "Please enter district name",
        },
        taluka : {
            required : "Please enter taluka name",
        }
    }
});

});

</script>

<script>
$(document).ready(function () {

$('#edit_taluka').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        district_id: {
            required: true,
        },
        taluka: {
            required: true,
        }
    },

    messages :{
        country_id : {
            required : "Please Select country",
        },
        state_id : {
            required : "Please select state name",
        },
        district_id : {
            required : "Please enter district name",
        },
        taluka : {
            required : "Please enter taluka name",
        }
    }
});

});

</script>

<!-- Taluka master validation  -->

<!-- instraction for tour manager validation -->
<script>
$(document).ready(function () {

$('#add_instruction_TM').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        image_name: {
            required: true,
        },
        "instraction[]": {
            required: true,
        },
        "priority[]": {
            required: true,
        }
    },

    messages :{
        image_name : {
            required : "Please upload image",
        },
        "instraction[]" : {
            required : "Please enter instraction",
        },
        "priority[]" : {
            required : "Please select priority",
        }
    }
});

});

</script>
<script>
$(document).ready(function () {

$('#edit_instruction_TM').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        old_img_name: {
            required: true,
        },
        "instraction[]": {
            required: true,
        },
        "priority[]": {
            required: true,
        }
    },

    messages :{
        old_img_name : {
            required : "Please upload image",
        },
        "instraction[]" : {
            required : "Please enter instraction",
        },
        "priority[]" : {
            required : "Please select priority",
        }
    }
});

});

</script>
<!-- instraction for tour manager validation -->

<!-- instraction for customer -->
<script>
$(document).ready(function () {

$('#add_for_cust').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        image_name: {
            required: true,
        },
        "instraction[]": {
            required: true,
        },
        "priority[]": {
            required: true,
        }
    },

    messages :{
        image_name : {
            required : "Please upload image",
        },
        "instraction[]" : {
            required : "Please enter instraction",
        },
        "priority[]" : {
            required : "Please select priority",
        }
    }
});

});

</script>
<script>
$(document).ready(function () {

$('#edit_for_cust').validate({ // initialize the plugin
    errorPlacement: function($error, $element) {
    $error.appendTo($element.closest("div"));
  },
    rules: {
        old_img_name: {
            required: true,
        },
        "instraction[]": {
            required: true,
        },
        "priority[]": {
            required: true,
        }
    },

    messages :{
        old_img_name : {
            required : "Please upload image",
        },
        "instraction[]" : {
            required : "Please enter instraction",
        },
        "priority[]" : {
            required : "Please select priority",
        }
    }
});

});

</script>

<!-- instraction for customer -->

<script type='text/javascript'>
    // baseURL variable
    var baseURL= "<?php echo base_url(); ?>";

    $(document).ready(function(){
        // district change
        $(document).on("change","#vehicle_bus_type",function(){
            var vehicle_bus_type_id = $(this).val();
        $.ajax({
            url:'<?=base_url()?>admin/assign_vehicle/get_rtonumber',
            method: 'post',
            data: {vehicle_bus_type_id: vehicle_bus_type_id},
            dataType: 'json',
            success: function(response){

            // var closestTable = $(this).closest("table");

                $('#vehicle_rto_registration').find('option').remove();
                $('#vehicle_rto_registration').append('<option value="">Select RTO Registration No</option>');
            $.each(response,function(index,data){
                $('#vehicle_rto_registration').append('<option value="'+data['id']+'">'+data['registration_number']+'</option>');
            });
            }
        });
        });
    });
</script>