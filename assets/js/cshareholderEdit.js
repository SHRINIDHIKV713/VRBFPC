$(document).ready(function(){  
    $('#shareForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var edit_f_name = $("#edit_f_name").val();
        if(edit_f_name == "") {
          $("#edit_f_name").closest('.form-control form-control-sm').addClass('has-error');
          $("#edit_f_name").after('<td class="text-danger text-center" colspan="11">Please enter Shareholder Name<br></td>');
        } else {
          $("#edit_f_name").closest('.form-control form-control-sm').removeClass('has-error');
          $("#edit_f_name").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(edit_f_name) 
         {  
             $.ajax({  
                   url:"CeoController/editShareentry",   
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
                          $("#shareForm")[0].reset();

                          setTimeout(function() {
                            window.location.href = "shareholdersmanage";
                        }, 2000);

                            Swal.fire({
                              icon: 'success',
                              title: 'Good Job!',
                              text: 'Shareholders Updated Successfully',                
                              showConfirmButton: false,
                              timer: 5000
                            })          
                      }
                      else { 
                          $(function() {
                          const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            target:"#share",
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
 