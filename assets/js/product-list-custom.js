jQuery.extend( jQuery.fn.dataTableExt.oSort, {
 "date-br-pre": function ( a ) {
  if (a == null || a == "") {
   return 0;
  }
  var brDatea = a.split('/');
  return (brDatea[2] + brDatea[1] + brDatea[0]) * 1;
 },

 "date-br-asc": function ( a, b ) {
  return ((a < b) ? -1 : ((a > b) ? 1 : 0));
 },

 "date-br-desc": function ( a, b ) {
  return ((a < b) ? 1 : ((a > b) ? -1 : 0));
 }
} );

"use strict";
(function($) {
    "use strict";
$('#basic-2').DataTable({
        "ordering": true,
        "order": [[4, "desc"]],
        "order": [[8, "asc"]],
         "columns": [
	null,
	null,
	null,
      { "type": "date-eu" },
    null,
      { "type": "date-eu" },
      null,
      null,
      null
    ],
        columnDefs: [ 
                { type: 'date-br', targets: 4 } // onde 0 é a sua coluna data, a primeira é 0
                    ]
    });
    $('#basic-1').DataTable({
        "ordering": true,
        "order": [[4, "desc"]],
         "columns": [
	null,
	null,
	null,
      { "type": "date-eu" },
    null,
      { "type": "date-eu" },
      null,
      null,
      null
    ],
        columnDefs: [ 
                { type: 'date-br', targets: 4 } // onde 0 é a sua coluna data, a primeira é 0
                    ]
    });
})(jQuery);



