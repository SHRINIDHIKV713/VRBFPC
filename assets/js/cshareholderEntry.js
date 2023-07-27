
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
    $('#shareForm').on('submit', function(e){  
            // remove the error 
    $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
    $(".text-danger").remove();
           e.preventDefault();  
          var f_name = $("#f_name").val();
          if(f_name == "") {
            $("#f_name").closest('.form-control form-control-sm').addClass('has-error');
            $("#f_name").after('<td class="text-danger text-center" colspan="11">Please enter first name<br></td>');
          } else {
            $("#f_name").closest('.form-control form-control-sm').removeClass('has-error');
            $("#f_name").closest('.form-control form-control-sm').addClass('has-success');        
          }
          if(f_name) 
           {  
               $.ajax({  
                     url:"CeoController/addShareentry",   
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
                            window.location.href = "shareholdersmanage";
                        }, 2000);
                            // reset the form
                            $("#shareForm")[0].reset();
                              Swal.fire({
                                icon: 'success',
                                title: 'Good Job!',
                                text: 'Shareholders Added Successfully',                
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
  $(document).ready(function() {
    $("#sname").select2({
      tags: true
    });
      
     
  });
  
  // Get references to the input fields
  const shareValueInput = document.querySelector('input[name="share_value"]');
  const shareAllotedInput = document.querySelector('input[name="share_alloted"]');
  const amountPaidInput = document.querySelector('#amount_paid');
  
  // Add an event listener to both input fields
  shareValueInput.addEventListener('input', calculateAmountPaid);
  shareAllotedInput.addEventListener('input', calculateAmountPaid);
  
  // Function to calculate the amount paid
  function calculateAmountPaid() {
      const shareValue = parseFloat(shareValueInput.value);
      const shareAlloted = parseFloat(shareAllotedInput.value);
  
      // Perform the calculation
      const amountPaid = shareValue * shareAlloted;
  
      // Update the "Amount Paid" input field value
      amountPaidInput.value = isNaN(amountPaid) ? '' : amountPaid.toFixed(2);
  }

  function handleModeOfPaymentChange(selectElement) {
    var chequeFieldsContainer = document.getElementById('chequeFieldsContainer');

    if (selectElement.value === 'Cheque' || selectElement.value === 'DD') {
        chequeFieldsContainer.style.display = 'block';
    } else {
        chequeFieldsContainer.style.display = 'none';
    }
}

  
    
    
 