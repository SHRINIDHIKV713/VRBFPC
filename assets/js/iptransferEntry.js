$(document).ready(function(){  
    $('#iptransferForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var store = $("#store").val();
        if(store == "") {
          $("#store").closest('.form-control form-control-sm').addClass('has-error');
          $("#store").after('<td class="text-danger text-center" colspan="11">Please enter store stock<br></td>');
        } else {
          $("#store").closest('.form-control form-control-sm').removeClass('has-error');
          $("#store").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(store) 
         {  
             $.ajax({  
                   url:"SuperadminController/addTransferentry",   
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
                        Swal.fire({
                          icon: 'success',
                          title: 'Good Job!',
                          text: 'Transfer Added Successfully',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#iptransferForm")[0].reset();
                        } else {
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                target:"#ipt",
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