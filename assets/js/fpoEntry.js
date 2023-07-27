$(document).ready(function(){  
  $('#fpoForm').on('submit', function(e){  
        // remove the error 
$(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
       e.preventDefault();  
      var f_name = $("#f_name").val();
      if(f_name == "") {
        $("#f_name").closest('.form-control form-control-sm').addClass('has-error');
        $("#f_name").after('<td class="text-danger text-center" colspan="11">Please enter FPO Name<br></td>');
      } else {
        $("#f_name").closest('.form-control form-control-sm').removeClass('has-error');
        $("#f_name").closest('.form-control form-control-sm').addClass('has-success');        
      }
      if(f_name) 
       {  
           $.ajax({  
                 url:"SuperadminController/addFpoentry",   
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
                        setTimeout(function() {
                            window.location.href = "fpoManage";
                        }, 2000);
                      Swal.fire({
                        icon: 'success',
                        title: 'Good Job!',
                        text: 'FPO Added Successfully',                
                        showConfirmButton: false,
                        timer: 5000
                      })
                      // reset the form
                      $("#fpoForm")[0].reset();
                      } else {
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
                              title: 'Ooops! Something went wrong.'
                            });
                        });
                    }
                 }  
            });  
      }
  });  
}); 
$(function() {
  $('#fs').on('click', function() {
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
  $('#gl').on('click', function() {
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
  $('#td').on('click', function() {
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
  $('#apmc').on('click', function() {
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
  $('#il').on('click', function() {
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
        $('#upload_license').show();
      }
      else {
        $('#upload_license').hide();
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

    // var contactNoInput = document.getElementById("contact_no");

    // // Add event listener for input
    // contactNoInput.addEventListener("input", function() {
    //     // Get the entered value
    //     var contactNo = contactNoInput.value;

    //     // Define the regular expression pattern
    //     var pattern = /^[0-9]{10}$/;

    //     // Validate the contact number
    //     if (!pattern.test(contactNo)) {
    //         contactNoInput.setCustomValidity("Please enter a 10-digit contact number.");
    //     } else {
    //         contactNoInput.setCustomValidity("");
    //     }
    // });

    // // Get the input field
    // var panNoInput = document.getElementById("pan_no");

    // // Add event listener for input
    // panNoInput.addEventListener("input", function() {
    //     // Get the entered value
    //     var panNo = panNoInput.value;

    //     // Define the regular expression pattern
    //     var pattern = /^[A-Z]{5}\d{4}[A-Z]{1}$/;

    //     // Validate the PAN number
    //     if (!pattern.test(panNo)) {
    //         panNoInput.setCustomValidity("Please enter a valid PAN number.");
    //     } else {
    //         panNoInput.setCustomValidity("");
    //     }
    // });

  
    // // Get the input field
    // var cinNoInput = document.getElementById("cin_no");

    // // Add event listener for input
    // cinNoInput.addEventListener("input", function() {
    //     // Get the entered value
    //     var cinNo = cinNoInput.value;

    //     // Remove any white spaces from the entered value
    //     cinNo = cinNo.replace(/\s/g, '');

    //     // Define the regular expression pattern
    //     var pattern = /^[A-Z]{1}\d{5}[A-Z]{2}\d{4}[A-Z]{3}\d{6}$/;

    //     // Validate the CIN number
    //     if (!pattern.test(cinNo)) {
    //         cinNoInput.setCustomValidity("Please enter a valid CIN number.");
    //     } else {
    //         cinNoInput.setCustomValidity("");
    //     }
    // });

    // // Get the input field
    // var ifscInput = document.getElementById("fpo_ifsc");

    // // Add event listener for input
    // ifscInput.addEventListener("input", function() {
    //     // Get the entered value
    //     var ifscCode = ifscInput.value;

    //     // Remove any white spaces from the entered value
    //     ifscCode = ifscCode.replace(/\s/g, '');

    //     // Validate the IFSC code length
    //     if (ifscCode.length !== 11) {
    //         ifscInput.setCustomValidity("IFSC code should be 11 characters long.");
    //     } else {
    //         ifscInput.setCustomValidity("");
    //     }
    // });

