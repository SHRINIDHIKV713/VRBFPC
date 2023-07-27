$(document).ready(function(){  
  $('#fpoForm').on('submit', function(e){  
        // remove the error 
$(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
       e.preventDefault();  
      var edit_f_name = $("#edit_f_name").val();
      if(edit_f_name == "") {
        $("#edit_f_name").closest('.form-control form-control-sm').addClass('has-error');
        $("#edit_f_name").after('<td class="text-danger text-center" colspan="11">Please enter FPO Name<br></td>');
      } else {
        $("#edit_f_name").closest('.form-control form-control-sm').removeClass('has-error');
        $("#edit_f_name").closest('.form-control form-control-sm').addClass('has-success');        
      }
      if(edit_f_name) 
       {  
           $.ajax({  
                 url:"SuperadminController/editFpoentry",   
                 method:"POST",  
                 data:new FormData(this),    
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 dataType: "json",
                 success:function(response)  
                 {  
                     // remove the error 
        $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');

                    if(response.success == true) {
                        // reset the form
                        $("#fpoForm")[0].reset();
                          Swal.fire({
                            icon: 'success',
                            title: 'Good Job!',
                            text: 'FPO Updated Successfully',                
                            showConfirmButton: false,
                            timer: 5000
                          })          
                    }
                    else {
                        $(function() {
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          target:"#fpo",
                          showConfirmButton: false,
                          timer: 3000
                        });
                        Toast.fire({
                          icon: 'error',
                          title: ''+ xhr.responseText
                        });
                        });
                    }
                 }  
            });  
      }
  });  
}); 
$(function() {
  $('input[name="fs"]').on('click', function() {
      if ($(this).val() == 'add_fs') {
          $('#fs_license').show();
      }
      else {
          $('#fs_license').hide();
      }
      if ($(this).val() == 'add_fs') {
          $('#fs_license1').show();
      }
      else {
          $('#fs_license1').hide();
      }
  
  });
});
$(function() {
  $('input[name="gl"]').on('click', function() {
      if ($(this).val() == 'add_gl') {
          $('#gl_license').show();
      }
      else {
          $('#gl_license').hide();
      }
      if ($(this).val() == 'add_gl') {
          $('#gl_license1').show();
      }
      else {
          $('#gl_license1').hide();
      }
  
  });
});
$(function() {
  $('input[name="td"]').on('click', function() {
      if ($(this).val() == 'add_td') {
          $('#td_license').show();
      }
      else {
          $('#td_license').hide();
      }
      if ($(this).val() == 'add_td') {
          $('#td_license1').show();
      }
      else {
          $('#td_license1').hide();
      }
  
  });
});
$(function() {
  $('input[name="apmc"]').on('click', function() {
      if ($(this).val() == 'add_apmc') {
          $('#apmc_license').show();
      }
      else {
          $('#apmc_license').hide();
      }
      if ($(this).val() == 'add_apmc') {
          $('#apmc_license1').show();
      }
      else {
          $('#apmc_license1').hide();
      }
  
  });
});
$(function() {
  $('input[name="il"]').on('click', function() {
      if ($(this).val() == 'add_il') {
          $('#il_license').show();
      }
      else {
          $('#il_license').hide();
      }
      if ($(this).val() == 'add_il') {
          $('#il_license1').show();
      }
      else {
          $('#il_license1').hide();
      }
  
  });
});
$(function() {
  $('button[name="add_license"]').on('click', function() {
      if ($(this).val() == 'add_l') {
          $('#new_license').show();
      }
      else {
          $('#new_license').hide();
      }
      if ($(this).val() == 'add_l') {
          $('#new_license1').show();
      }
      else {
          $('#new_license1').hide();
      }
      if ($(this).val() == 'add_l') {
        $('#new_license2').show();
      }
      else {
        $('#new_license2').hide();
    }
    if ($(this).val() == 'add_l') {
      $('#add_area').show();
    }
    else {
      $('#add_area').hide();
  }
  });
});
var blank_child = jQuery('#lead_area').html();

jQuery(document).ready(function() {

  jQuery('#lead_area').hide();
});

function appendAddchild() {
  jQuery('#add_area').append(blank_child);
  if($("input:text").length > 30){
    //alert($("input:text").length); 
    $('#add_lead').prop('disabled',true);
  }
  
}

function removeAddchild(requirementElem) {
jQuery(requirementElem).parent().parent().remove();
}