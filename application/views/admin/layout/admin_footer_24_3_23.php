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
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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
                                '<label>Available Seats</label>'+
                                '<input type="number" class="form-control" name="available_seats[]" id="tour_seat" placeholder="Enter Available Seats" required>'+
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
                                '<input type="number" class="form-control" name="day_number[]" id="day_number" placeholder="Enter Day Number" required>'+
                              '</div>'+
                    '</div>'+
                        '<div class="col-md-10">'+
                             '<div class="form-group">'+
                            '<label>Itinerary For Day '+day+' <span class="text-danger">*</span></label>'+
                            '<textarea class="form-control iternary_desc" name="iternary_desc[]" id="" placeholder="Enter Itinerary Description" required="required"></textarea>'+
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
                         //console.log(data);
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
                         //console.log(data);
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
        
    },

    messages :{
        stationary_name : {
            required : "Please enter stationary",
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
        
    },

    messages :{
        stationary_name : {
            required : "Please enter stationary",
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
        cost: {
            required: true,
        },
        tour_number_of_days: {
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
        }
        
    },

    messages :{
        academic_year : {
            required : "Please enter academic year",
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
        cost: {
            required: true,
        },
        tour_number_of_days: {
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
        agency_name: {
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
        registration_date: {
            required: true,

        },
        password: {
            required: true,
            minlength: 6
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
            required : "Please enter city name",
        },
        department : {
            required : "Please enter department",
        },
        booking_center : {
            required : "Please enter booking center",
        },
        agent_name : {
            required : "Please enter agent name",
        },
        agency_name : {
            required : "Please enter agency name",
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
        registration_date : {
            required : "Please enter registration date",
        },
        password : {
            required : "Please enter password",
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
<!-- jquery validation on add agent -->

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
        agency_name: {
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
        registration_date: {
            required: true,

        },
        password: {
            required: true,
            minlength: 6
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
            required : "Please enter city name",
        },
        department : {
            required : "Please enter department name",
        },
        booking_center : {
            required : "Please enter booking center",
        },
        agent_name : {
            required : "Please enter agent name",
        },
        agency_name : {
            required : "Please enter agency name",
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
        registration_date : {
            required : "Please enter registration date",
        },
        password : {
            required : "Please enter password",
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
<!-- jquery validation on edit agent -->

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
                              console.log(response);
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
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    $('#agent_region').on('change', function () {
      var did = $(this).val();
    //   alert('ppppppppppppppppppppppppppp');
     
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/Region_head/getAgent', 
        method: 'post',
        data: {did: did},
        dataType: 'json',
        success: function(response){
        console.log(response);
        
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
  var baseURL= "<?php echo base_url();?>";
 
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
        console.log(response);
           // var p = response['mobile_number1'];
            $('#mobile_number').val(response['mobile_number1']);
        }
     });
   });
 });
 </script>

<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
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
        console.log(response);
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