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
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
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
                    '<div class="col-md-2">'+
                    '<div class="form-group">'+
                 '<label>Date:</label>'+
                    '<div class="input-group">'+
                        '<input type="date" name="journey_date[]" class="form-control" min="<?php echo date("Y-m-d"); ?>"/>'+
                   '</div>'+
                   '</div>'+
                     '</div>'+

                    '<div class="col-md-2">'+
                             '<div class="form-group">'+
                                '<label>Available Seats</label>'+
                                '<input type="number" class="form-control" name="available_seats[]" id="tour_number" placeholder="Enter Available Seats">'+
                              '</div>'+
                      '</div>'+
                       '<div class="col-md-2">'+
                             '<div class="form-group">'+
                                '<label>Single Seat Cost</label>'+
                                '<input type="number" class="form-control" name="single_seat_cost[]" id="tour_number" placeholder="Enter Single Seat Cost">'+
                              '</div>'+
                      '</div>'+
                       '<div class="col-md-2">'+
                             '<div class="form-group">'+
                                '<label>Twin Sharing Cost</label>'+
                                '<input type="number" class="form-control" name="twin_seat_cost[]" id="tour_number" placeholder="Enter Twin Sharing Cost">'+
                              '</div>'+
                      '</div>'+
                       '<div class="col-md-2">'+
                             '<div class="form-group">'+
                                '<label>3/4 Sharing Cost</label>'+
                                '<input type="number" class="form-control" name="three_four_sharing_cost[]" id="tour_number" placeholder="Enter 3/4 Sharing Cos">'+
                              '</div>'+
                      '</div>'+
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