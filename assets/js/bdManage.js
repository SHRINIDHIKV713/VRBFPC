$(document).ready(function(){
	var dtBdmanage = $('#dtBdmanage').DataTable({
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
                    { targets: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18], className: 'dt-left valign dt-w52' },
                    {targets: [19], className: 'dt-center dt-w15 valign'}],
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
                  
              $(win.document.body).find( 'table' )
                  .addClass( 'compact' )
                  .css( 'font-size', 'inherit' );
          }
      }
    ], 
      "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "SuperadminController/dtBdmanage/",
            "type": "POST"
        },
  });

});

