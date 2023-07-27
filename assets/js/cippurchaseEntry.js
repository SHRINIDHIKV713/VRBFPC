$(document).ready(function(){  
    $('#ippurchaseForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var invoice_no = $("#invoice_no").val();
        if(invoice_no == "") {
          $("#invoice_no").closest('.form-control form-control-sm').addClass('has-error');
          $("#invoice_no").after('<td class="text-danger text-center" colspan="11">Please enter invoice number<br></td>');
        } else {
          $("#invoice_no").closest('.form-control form-control-sm').removeClass('has-error');
          $("#invoice_no").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(invoice_no) 
         {  
             $.ajax({  
                   url:"CeoController/addPurchaseentry",   
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
                            window.location.href = "ippurchasemanage";
                        }, 2000);
                        Swal.fire({
                          icon: 'success',
                          title: 'Good Job!',
                          text: 'Purchase Added Successfully',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#ippurchaseForm")[0].reset();
                        } else {
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                target:"#ipc",
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

