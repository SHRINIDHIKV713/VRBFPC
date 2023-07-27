$(document).ready(function(){  
  $('#state').change(function(){ 
    var id=$(this).val();
    $.ajax({
        url : 'SuperadminController/getDistrict',
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(response){   
          // Remove options 
          $('#dist').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#dist').append('<option value="'+data['d_id']+'">'+data['d_name']+' - '+data['dist_id']+'</option>');
          });
        }
    });
    return false;
  }); 

  $('#dist').change(function(){ 
    var id=$(this).val();
    $.ajax({
        url : 'SuperadminController/getTaluk',
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(response){   
          // Remove options 
          $('#taluk').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#taluk').append('<option value="'+data['t_id']+'">'+data['t_name']+' - '+data['taluk_id']+'</option>');
          });
        }
    });
    return false;
  });
  $('#taluk').change(function(){ 
    var id=$(this).val();
    $.ajax({
        url : 'SuperadminController/getGp',
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(response){   
          // Remove options 
          $('#gp').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#gp').append('<option value="'+data['g_id']+'">'+data['g_name']+' - '+data['gp_id']+'</option>');
          });
        }
    });
    return false;
  });
  $('#gp').change(function(){ 
    var id=$(this).val();
    $.ajax({
        url : 'SuperadminController/getVillage',
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(response){   
          // Remove options 
          $('#village').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#village').append('<option value="'+data['v_id']+'">'+data['v_name']+' - '+data['village_id']+'</option>');
          });
        }
    });
    return false;
  });

  $('#village').change(function(){ 
    var id=$(this).val();
    $.ajax({
        url : 'SuperadminController/getPin',
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
  $('#promoForm').on('submit', function(e){  
        // remove the error 
$(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
$(".text-danger").remove();
       e.preventDefault();  
      var first_name = $("#first_name").val();
      if(first_name == "") {
        $("#first_name").closest('.form-control form-control-sm').addClass('has-error');
        $("#first_name").after('<td class="text-danger text-center" colspan="11">Please enter Pomoters Name<br></td>');
      } else {
        $("#first_name").closest('.form-control form-control-sm').removeClass('has-error');
        $("#first_name").closest('.form-control form-control-sm').addClass('has-success');        
      }
      if(first_name) 
       {  
           $.ajax({  
                 url:"SuperadminController/addPromoentry",   
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

                    // if(response.success == true) {
                    //     // reset the form
                    //     $("#promoForm")[0].reset();
                    //       Swal.fire({
                    //         icon: 'success',
                    //         title: 'Good Job!',
                    //         text: 'Promoters Added Successfully',                
                    //         showConfirmButton: false,
                    //         timer: 5000
                    //       })          
                    // }
                    // else {
                    //     $(function() {
                    //     const Toast = Swal.mixin({
                    //       toast: true,
                    //       position: 'top',
                    //       target:"#promo",
                    //       showConfirmButton: false,
                    //       timer: 3000
                    //     });
                    //     Toast.fire({
                    //       icon: 'error',
                    //       title: ''+ xhr.responseText
                    //     });
                    //     });
                    // }
                    if(response.success == true) {
                      Swal.fire({
                        icon: 'success',
                        title: 'Good Job!',
                        text: 'Promoters Added Successfully',                
                        showConfirmButton: false,
                        timer: 5000
                      })
                      // reset the form
                      $("#promoForm")[0].reset();
                      } else {
                        $(function() {
                            const Toast = Swal.mixin({
                              toast: true,
                              position: 'top',
                              target:"#promo",
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
