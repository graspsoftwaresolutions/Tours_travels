(function($){

	$('#datatable-1').dataTable( {
       ajax: "demo/objects.txt",
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'office' },
            { data: 'extn' },
            { data: 'start_date' },
            { data: 'salary' }
        ],

    });
	

 	$('#datatable-2').dataTable( {
 		ajax: "demo/objects.txt",
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'office' },
            { data: 'extn' },
            { data: 'start_date' },
            { data: 'salary' }
        ],
 		"sDom":
		"<'row dt-header'<'col-sm-3'l><'col-sm-6 pt10'T><'col-sm-3'f>>" +
		"<'row dt-body'<'col-sm-12'tr>>" +
		"<'row dt-footer'<'col-sm-6'i><'col-sm-6'p>>",
        "tableTools": {
            "sSwfPath": "dist/js/plugins/datatables/extensions/tableTools/copy_csv_xls_pdf.swf",
            "aButtons": [
				"copy",
				"print",
				"csv", 
				"xls", 
				"pdf"
			]
        }
    });

    $('#datatable-3').DataTable( {
        ajax: "demo/objects.txt",
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'office' },
            { data: 'extn' },
            { data: 'start_date' },
            { data: 'salary' }
        ],
        "sDom":
		"<'row dt-header'R<'col-sm-6'l><'col-sm-6'f>>" +
		"<'row dt-body'<'col-sm-12'tr>>" +
		"<'row dt-footer'<'col-sm-6'i><'col-sm-6'p>>",
        "oTableTools": {
        	"sSwfPath": "dist/js/plugins/datatables/extensions/tableTools/copy_csv_xls_pdf.swf",
        	"aButtons": [
				"copy",
				"print",
				"csv", 
				"xls", 
				"pdf"
			]
        },
        colReorder: {
            realtime: true
        }
               
    });

    $('#datatable-4').DataTable( {
        ajax: "demo/objects.txt",
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'office' },
            { data: 'extn' },
            { data: 'start_date' },
            { data: 'salary' }
        ],
        "sDom":
		"<'row dt-header'R<'col-sm-3'l><'col-sm-5'C><'col-sm-4'f>>" +
		"<'row dt-body'<'col-sm-12'tr>>" +
		"<'row dt-footer'<'col-sm-6'i><'col-sm-6'p>>",
        "oTableTools": {
        	"sSwfPath": "dist/js/plugins/datatables/extensions/tableTools/copy_csv_xls_pdf.swf",
        	"aButtons": [
				"copy",
				"print",
				"csv", 
				"xls", 
				"pdf"
			]
        },
        colVis: {
            "buttonText": "Hide columns"
        },
        colReorder: {
            realtime: true
        }
               
    });

    $('#datatable-5').DataTable( {
        ajax: "demo/objects.txt",
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'office' },
            { data: 'extn' },
            { data: 'start_date' },
            { data: 'salary' }
        ],
        "sDom":
		"<'row dt-header'R<'col-sm-2'l><'col-sm-4 pt10 pb10'T><'col-sm-3'C><'col-sm-3'f>>" +
		"<'row dt-body'<'col-sm-12'tr>>" +
		"<'row dt-footer'<'col-sm-6'i><'col-sm-6'p>>",
        "oTableTools": {
        	"sSwfPath": "dist/js/plugins/datatables/extensions/tableTools/copy_csv_xls_pdf.swf",
        	"aButtons": [
				"copy",
				"print",
				"csv", 
				"xls", 
				"pdf"
			]
        },
        colVis: {
            "buttonText": "Hide columns"
        },
        colReorder: {
            realtime: true
        }
               
    });

    // placeholder text "filter" in the search input.
    $(".dataTables_filter input").attr("placeholder", "Filter");

})(jQuery);