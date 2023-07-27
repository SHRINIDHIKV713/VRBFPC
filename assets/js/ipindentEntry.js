$(document).ready(function(){  
    $('#ipForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var supplier_name = $("#supplier_name").val();
        if(supplier_name == "") {
          $("#supplier_name").closest('.form-control form-control-sm').addClass('has-error');
          $("#supplier_name").after('<td class="text-danger text-center" colspan="11">Please enter Supplier Name<br></td>');
        } else {
          $("#supplier_name").closest('.form-control form-control-sm').removeClass('has-error');
          $("#supplier_name").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(supplier_name) 
         {  
             $.ajax({  
                   url:"SuperadminController/addIndententry",   
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
                          text: 'Indent Added Successfully',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#ipForm")[0].reset();
                        } else {
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                target:"#ip",
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
    if($("input:text").length > 30){
      //alert($("input:text").length); 
      $('#add_lead').prop('disabled',true);
    }
    
  }
  
  function removeAddchild(requirementElem) {
  jQuery(requirementElem).parent().parent().remove();
  }