$(document).ready(function() {

    var dtFpo = $('#dtFpo').DataTable({
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
                    { targets: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19], className: 'dt-center valign dt-w20' }, 
                    {targets: [20], className: 'dt-center dt-w15 valign'}],
      dom: 'Bfrtip',
        // buttons: [
        //     {extend:'copy', text:'<i class="fas fa-copy text-info"></i> Copy', titleAttr: 'Copy'}, 
        //     {extend:'csv', text:'<i class="fas fa-file-excel text-primary"></i> CSV <i class="fas fa-download text-dark"></i>', titleAttr:'csv'}, 
        //     {extend:'excel', text:'<i class="fas fa-file-excel text-primary"></i> Excel <i class="fas fa-download text-dark"></i>', titleAttr:'excel'}, 
        //     {extend:'pdf', text:'<i class="fas fa-file-pdf text-danger"></i> PDF <i class="fas fa-download text-dark"></i>', titleAttr:'pdf'}, 
        //     {extend:'print', text:'<i class="fas fa-print text warning"></i> Print', titleAttr:'print'}
        // ], 
      "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "Dashboard_Controller/dtFpo/",
            "type": "POST"
        },
  });
});