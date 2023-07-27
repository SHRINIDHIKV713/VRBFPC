$(document).ready(function(){  
  $('#agentForm').on('submit', function(e){  
        // remove the error 
$(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
       e.preventDefault();  
      var edit_a_name = $("#edit_a_name").val();
      if(edit_a_name == "") {
        $("#edit_a_name").closest('.form-control form-control-sm').addClass('has-error');
        $("#edit_a_name").after('<td class="text-danger text-center" colspan="11">Please enter Agent Name<br></td>');
      } else {
        $("#edit_a_name").closest('.form-control form-control-sm').removeClass('has-error');
        $("#edit_a_name").closest('.form-control form-control-sm').addClass('has-success');        
      }
      if(edit_a_name) 
       {  
           $.ajax({  
                 url:"SuperadminController/editAgententry",   
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
                        $("#agentForm")[0].reset();
                          Swal.fire({
                            icon: 'success',
                            title: 'Good Job!',
                            text: 'Agents Updated Successfully',                
                            showConfirmButton: false,
                            timer: 5000
                          })          
                    }
                    else {
                        $(function() {
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          target:"#agent",
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
