$(document).ready(function(){  
    $('#opsForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var edit_customer = $("#edit_customer").val();
        if(edit_customer == "") {
          $("#edit_customer").closest('.form-control form-control-sm').addClass('has-error');
          $("#edit_customer").after('<td class="text-danger text-center" colspan="11">Please enter FPO Name<br></td>');
        } else {
          $("#edit_customer").closest('.form-control form-control-sm').removeClass('has-error');
          $("#edit_customer").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(edit_customer) 
         {  
             $.ajax({  
                   url:"CeoController/editOpsalesentry",   
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
                          window.location.href = "opsalesmanage";
                      }, 2000);
                        Swal.fire({
                          icon: 'success',
                          title: 'Good Job!',
                          text: 'Successfully Updated!',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#opsForm")[0].reset();
                        } else {
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                target:"#ops",
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
  $(function () {
    $("#stype").change(function () {
        if ($(this).val() == "Wholesale buyer") {
            $("#dvptype").show();
        } else {
            $("#dvptype").hide();
        }
    });
});
  var blank_child = jQuery('#lead_area').html();

jQuery(document).ready(function() {

  jQuery('#lead_area').hide();
});

function appendAddchild() {
  jQuery('#add_lead_area').append(blank_child);
  if($("input:text").length > 4){
    //alert($("input:text").length); 
    $('#add_lead').prop('disabled',true);
  }
  
}

function removeAddchild(requirementElem) {
jQuery(requirementElem).parent().parent().remove();
}