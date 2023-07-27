
$(document).ready(function(){  

    $('#state').change(function(){ 
      var id=$(this).val();
      $.ajax({
          url : 'CeoController/getDistrict',
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(response){   
            // Remove options 
            $('#dist').find('option').not(':first').remove();
  
            // Add options
            $.each(response,function(index,data){
               $('#dist').append('<option value="'+data['d_id']+'">'+data['d_name']+'</option>');
            });
          }
      });
      return false;
    }); 
  
    $('#dist').change(function(){ 
      var id=$(this).val();
      $.ajax({
          url : 'CeoController/getTaluk',
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(response){   
            // Remove options 
            $('#taluk').find('option').not(':first').remove();
  
            // Add options
            $.each(response,function(index,data){
               $('#taluk').append('<option value="'+data['t_id']+'">'+data['t_name']+'</option>');
            });
          }
      });
      return false;
    });
    $('#taluk').change(function(){ 
      var id=$(this).val();
      $.ajax({
          url : 'CeoController/getGp',
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(response){   
            // Remove options 
            $('#gp').find('option').not(':first').remove();
  
            // Add options
            $.each(response,function(index,data){
               $('#gp').append('<option value="'+data['g_id']+'">'+data['g_name']+'</option>');
            });
          }
      });
      return false;
    });
    $('#gp').change(function(){ 
      var id=$(this).val();
      $.ajax({
          url : 'CeoController/getVillage',
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(response){   
            // Remove options 
            $('#village').find('option').not(':first').remove();
  
            // Add options
            $.each(response,function(index,data){
               $('#village').append('<option value="'+data['v_id']+'">'+data['v_name']+'</option>');
            });
          }
      });
      return false;
    });
  
    $('#village').change(function(){ 
      var id=$(this).val();
      $.ajax({
          url : 'CeoController/getPin',
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(response){   
            // Remove options 
            $('#pin').find('option').not(':first').remove();
  
            // Add options
            $.each(response,function(index,data){
              $('#pin').append('<option value="'+data['p_id']+'">'+data['p_code']+'</option>');
              // $('#city').append('<input value="'+data['p_id']+'">'+data['p_code']+'">');
            });
          }
      });
      return false;
    });
    $('#cuserForm').on('submit', function(e){  
            // remove the error 
    $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
    $(".text-danger").remove();
           e.preventDefault();  
          var username = $("#username").val();
          if(username == "") {
            $("#username").closest('.form-control form-control-sm').addClass('has-error');
            $("#username").after('<td class="text-danger text-center" colspan="11">Please enter username<br></td>');
          } else {
            $("#username").closest('.form-control form-control-sm').removeClass('has-error');
            $("#username").closest('.form-control form-control-sm').addClass('has-success');        
          }
          if(username) 
           {  
               $.ajax({  
                     url:"CeoController/addUserentry",   
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
                            setTimeout(function() {
                              window.location.href = "ceo_dashboard";
                          }, 2000);
                            $("#cuserForm")[0].reset();
                              Swal.fire({
                                icon: 'success',
                                title: 'Good Job!',
                                text: 'Users Added Successfully',                
                                showConfirmButton: false,
                                timer: 5000
                              })          
                        }
                        else {
                            $(function() {
                            const Toast = Swal.mixin({
                              toast: true,
                              position: 'top',
                              target:"#user",
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
    
    
    
         
                