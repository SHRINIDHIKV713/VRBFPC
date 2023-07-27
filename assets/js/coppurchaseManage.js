$(document).ready(function(){
	var dtCoppurchasemanage = $('#dtCoppurchasemanage').DataTable({
      // "paging": true,
      // "lengthChange": true,
      "processing": true,
      "serverSide": true,
      // "searching": true,
      "ordering": true,
      // "info": true,
      // "autoWidth": true,
      "responsive": true,
      "columnDefs": [{ targets: [0], className: 'dt-center valign dt-w3' },
                    { targets: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], className: 'dt-left valign dt-w52' },
                    {targets: [29], className: 'dt-center dt-w15 valign'}],
      dom: 'Bfrtip',
      buttons: [
        {extend:'copy', text:'<i class="fa fa-files-o text-white"></i> Copy', titleAttr: 'Copy',orientation: 'landscape',
        pageSize: 'LEGAL'}, 
        {extend:'csv', text:'<i class="fa fa-file-excel-o text-white"></i>  CSV ', titleAttr:'csv',orientation: 'landscape',
        pageSize: 'LEGAL'}, 
        {extend:'excel', text:'<i class="fa fa-file-excel-o text-white"></i> Excel ', titleAttr:'excel',orientation: 'landscape',
        pageSize: 'LEGAL'}, 
        {extend:'pdf', text:'<i class="fa fa-file-pdf-o text-white"></i> PDF ', titleAttr:'pdf',orientation: 'landscape',
        pageSize: 'LEGAL'}, 
        // {extend:'print', text:'<i class="fa fa-print text-white"></i> Print', titleAttr:'print',orientation: 'landscape',
        // pageSize: 'LEGAL'}
        {
          extend: 'print',
          text:'<i class="fa fa-print text-white"></i>  Print', titleAttr:'print',
          orientation: 'landscape',
          pageSize: 'LEGAL',
          customize: function ( win ) {
              $(win.document.body)
                  .css( 'font-size', '10pt' )
                  .prepend(
                     

                      '<img src="https://gcedu.in/fpc/assets/images/brand/logo1.png"  class="header-brand-img desktop-logo text-center">',

                      '<h3 class="text-center">VRB TECHNOLOGIES</h3>'
                  );

                  $(win.document.body).find('table tr').each(function () {
                    $(this).find('td:eq(1)').remove(); // Remove the second column (index 1)
                  });

                   // Remove the table heading for the action column
          $(win.document.body).find('table thead th:eq(1)').remove(); // Remove the second th element (index 1)

                  
              $(win.document.body).find( 'table' )
                  .addClass( 'compact' )
                  .css( 'font-size', 'inherit' );
          }
      }
    ], 
      "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "CeoController/dtCoppurchasemanage/",
            "type": "POST"
        },
  });

  //To Select the id of member to delete
  $(document).on('click', '#delete_oppurchase', function(e){ 
    var memberid = $(this).data('id');
    SwalDelete(memberid);
    e.preventDefault();
  });

});

//Delete Swal popup
function SwalDelete(memberid){  
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    showLoaderOnConfirm: true,
    preConfirm: function() {
       return new Promise(function(resolve) {                
          $.ajax({
          url: 'CeoController/delOPP',
          type: 'POST',
             data: {member_id : memberid},
             dataType: 'json'
          })
          .done(function(response){
              Swal.fire(
                    'Deleted!',
                    response.messages,
                    'success'
              );
              $('#dtCoppurchasemanage').DataTable().ajax.reload();
          })
          .fail(function(){
           swal.fire('Oops...', 'Something went wrong !', 'error');
          });
       });
        },
     allowOutsideClick: false
  })  
 }