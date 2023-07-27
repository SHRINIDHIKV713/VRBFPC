$(document).ready(function(){  
    $('#ipcForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var ip_name = $("#ip_name").val();
        if(ip_name == "") {
          $("#ip_name").closest('.form-control form-control-sm').addClass('has-error');
          $("#ip_name").after('<td class="text-danger text-center" colspan="11">Please enter Input Catalog Name<br></td>');
        } else {
          $("#ip_name").closest('.form-control form-control-sm').removeClass('has-error');
          $("#ip_name").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(ip_name) 
         {  
             $.ajax({  
                   url:"CeoController/addIpcatalogentry",   
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
                            window.location.href = "ipcatalogmanage";
                        }, 2000);
                        Swal.fire({
                          icon: 'success',
                          title: 'Good Job!',
                          text: 'Input Catalog Added Successfully',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#ipcForm")[0].reset();
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
  $(document).ready(function() {
    $("#sname").select2({
      tags: true
    });
      
     
  });