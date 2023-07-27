$(document).ready(function(){  
    $('#opcForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var product_name = $("#product_name").val();
        if(product_name == "") {
          $("#product_name").closest('.form-control form-control-sm').addClass('has-error');
          $("#product_name").after('<td class="text-danger text-center" colspan="11">Please enter Input Catalog Name<br></td>');
        } else {
          $("#product_name").closest('.form-control form-control-sm').removeClass('has-error');
          $("#product_name").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(product_name) 
         {  
             $.ajax({  
                   url:"CeoController/addOpcatalogentry",   
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
                          window.location.href = "opcatalogmanage";
                      }, 2000);
                        Swal.fire({
                          icon: 'success',
                          title: 'Good Job!',
                          text: 'Output Catalog Added Successfully',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#opcForm")[0].reset();
                        } else {
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                target:"#opc",
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
    $("#ptype").change(function () {
        if ($(this).val() == "Bags") {
            $("#dvptype").show();
        } else {
            $("#dvptype").hide();
        }
    });
});

$(document).ready(function() {
    $("#sname").select2({
      tags: true
    });
      
     
  });