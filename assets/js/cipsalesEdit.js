$(document).ready(function(){  
    $('#ipsalesForm').on('submit', function(e){  
          // remove the error 
  $(".form-control form-control-sm").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
         e.preventDefault();  
        var edit_invoice_no = $("#edit_invoice_no").val();
        if(edit_invoice_no == "") {
          $("#edit_invoice_no").closest('.form-control form-control-sm').addClass('has-error');
          $("#edit_invoice_no").after('<td class="text-danger text-center" colspan="11">Please enter invoice no<br></td>');
        } else {
          $("#edit_invoice_no").closest('.form-control form-control-sm').removeClass('has-error');
          $("#edit_invoice_no").closest('.form-control form-control-sm').addClass('has-success');        
        }
        if(edit_invoice_no) 
         {  
             $.ajax({  
                   url:"CeoController/editSalesentry",   
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
                            window.location.href = "ipsalesmanage";
                        }, 2000);
                        Swal.fire({
                          icon: 'success',
                          title: 'Good Job!',
                          text: 'Sales Updated Successfully',                
                          showConfirmButton: false,
                          timer: 5000
                        })
                        // reset the form
                        $("#ipsalesForm")[0].reset();
                        } else {
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                target:"#ips",
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
  if($("input:text").length > 4){
    //alert($("input:text").length); 
    $('#add_lead').prop('disabled',true);
  }
  
}

function removeAddchild(requirementElem) {
jQuery(requirementElem).parent().parent().remove();
}

$(function () {
  $("#ptype").change(function () {
      if ($(this).val() == "Farmer") {
          $("#ftype").show();
      } else {
          $("#ftype").hide();
      }
      if ($(this).val() == "Agent") {
        $("#atype").show();
    } else {
        $("#atype").hide();
    }
    if ($(this).val() == "Retail") {
      $("#rtype").show();
      } else {
          $("#rtype").hide();
      }
      if ($(this).val() == "Organization") {
        $("#otype").show();
    } else {
        $("#otype").hide();
    }
  });
});




// <!--Selectpicker-->
$(function() {
  var content = "<input type='text' class='bss-input' onKeyDown='event.stopPropagation();' onKeyPress='addSelectInpKeyPress(this,event)' onClick='event.stopPropagation()' placeholder='Add item'> <span class='glyphicon glyphicon-plus addnewicon' onClick='addSelectItem(this,event,1);'></span>";
 
  var divider = $('<option/>')
          .addClass('dropdown-divider')
          .data('divider', true);
          
 
  var addoption = $('<option/>', {class: 'addItem'})
          .data('content', content)
      
  $('.selectpicker')
          //.append(divider)
          .prepend(addoption)
          .selectpicker();
 
});
function appendInput(){
  var content = "<input type='text' class='bss-input' onKeyDown='event.stopPropagation();' onKeyPress='addSelectInpKeyPress(this,event)' onClick='event.stopPropagation()' placeholder='Add item'> <span class='bx bx-plus addnewicon' onClick='addSelectItem(this,event,1);'></span>";
  var inputEle = $('.addItem.dropdown-item span.text');
  $('.addItem.dropdown-item span.text').each(function(index, el) {
    if ($(this).text() == '') {
      $(this).html(content);
    }
  });
}

$('body').on('click', '.dropdown-toggle', function(event) {
  event.preventDefault();
  / Act on the event /
  appendInput();
});
 
function addSelectItem(t,ev)
{
   ev.stopPropagation();
   
   var bs = $(t).closest('.bootstrap-select')
   var txt=bs.find('.bss-input').val().replace(/[|]/g,"");
   var txt=$(t).prev().val().replace(/[|]/g,"");
   if ($.trim(txt)=='') return;
   
   // Changed from previous version to cater to new
   // layout used by bootstrap-select.
   var p=bs.find('select');
   var o=$('option', p).eq(-2);
   o.before( $("<option>", { "selected": false, "text": txt}) );
   p.selectpicker('refresh');
	appendInput();
}
 
function addSelectInpKeyPress(t,ev)
{
   ev.stopPropagation();
 
   // do not allow pipe character
   if (ev.which==124) ev.preventDefault();
 
   // enter character adds the option
   if (ev.which==13)
   {
      ev.preventDefault();
      addSelectItem($(t).next(),ev);
   }
}

