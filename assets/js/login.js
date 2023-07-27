
$(document).ready(function(){      
  $("#submit").click(function(){  
    var user_name = $("#username").val();  
    var password = $("#password").val();  
    // Returns error message when submitted without req fields.  
    if(user_name==''|| password==''){  
      $("#errmsg").html("Please Enter valid User Name & Password!"); 
      $("input").css({"border-color": "red"});
    } else{  
        // AJAX Code To Submit Form.  
        $.ajax({  
          type: "POST",  
          url:  "HomeController/check_login",  
          data: {name: user_name, pwd: password},  
          cache: false,  
          success: function(result){  
            if(result!=0){  
              // On success redirect.  
              window.location.replace(result);  
              $("input").css({"border-color": "none"});
            } else{
                $("#errmsg").html("Ooops! either user name or password is incorrect."); 
                $("input").css({"border-color": "red"});
            }           
          }  
        });  
      }  
    return false;  
  })
});  

