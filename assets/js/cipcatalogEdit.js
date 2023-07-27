$(document).ready(function(){  
    $('#ipcForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var edit_ip_name = $("#edit_ip_name").val();
        if(edit_ip_name == "") {
          $("#edit_ip_name").closest('.form-control form-control-sm').addClass('has-error');
          $("#edit_ip_name").after('<td class="text-danger text-center" colspan="11">Please enter Input Catalog Name<br></td>');
        } else {
          $("#edit_ip_name").closest('.form-control form-control-sm').removeClass('has-error');
          $("#edit_ip_name").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(edit_ip_name) 
         {  
             $.ajax({  
                   url:"CeoController/editIpcatalogentry",   
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
                          // reset the form
                          $("#ipcForm")[0].reset();
                            Swal.fire({
                              icon: 'success',
                              title: 'Good Job!',
                              text: 'Input Catalog Updated Successfully',                
                              showConfirmButton: false,
                              timer: 5000
                            })          
                      }
                      else {
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
                            title: ''+ xhr.responseText
                          });
                          });
                      }
                   }  
              });  
        }
    });  
  }); 
  