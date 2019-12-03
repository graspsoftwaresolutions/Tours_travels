@extends('layouts.admin')
@section('headSection')
<link href="{{ asset('public/assets/dist/css/plugins/dataTables.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('headSecondSection')

@endsection
@section('main-content')

<section class="content-wrapper">

    <!-- =========================================================== -->
    <!-- Start page content  -->
    <!-- =========================================================== -->

        <div class="aside-panel"></div>

        <div class="container-fluid">           

            <div class="page-header">
                <h1>Tours and Travels</h1>
                <ul class="breadcrumbs">
                    <li>Enquiry</li>
                    <li>{{__('Enquiry List')}}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                            <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <button id="addMaster" onClick='showaddForm();' class="btn btn-sm cyan waves-effect waves-circle waves-light hide">Add</button>
                            </div>
                            
                            
                            <h3 class="title medium">{{__('Enquiry List')}}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="20%">{{__('Name')}}</th>
                                    <th width="20%">{{__('Phone')}} </th>
                                    <th width="20%">{{__('Type')}} </th>
                                    <th width="20%">{{__('Email')}} </th>
                                    <th> {{__('Action') }}</th>
                                </tr>
                            </thead>                
                        </table>
                    </div>
                </div>  
            </div><!-- /.page-content -->
            <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
                <i class="mdi mdi-chevron-up medium"></i>
            </a>                
        </div><!-- /.container-fluid -->

    <!-- =========================================================== -->
    <!-- End page content  -->
    <!-- =========================================================== -->

    </section> <!-- /.content-wrapper -->
@endsection
@section('footerSection')
<!-- Data tables script -->
<script src="{{ asset('public/assets/dist/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<!-- Data tables extensions -->
<script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/tableTools/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/colVis/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/colReorder/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/responsive/dataTables.responsive.min.js') }}"></script>
<!-- Data tables bootstrap -->
<script src="{{ asset('public/assets/dist/js/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
@endsection
@section('footerSecondSection')
<script>
 $("#enquiries_sidebar_li_id").addClass('active');
(function($){
    $('#datatable-master').DataTable({
    
    "columnDefs": [{
      "visible": false,
      "targets": 0
    }],
    "order": [
      [0, 'asc']
    ],
    "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ url('/ajax_enquiry_list') }}",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: "{{csrf_token()}}"
            },
            "error": function (jqXHR, textStatus, errorThrown) {
                if(jqXHR.status==419){
                    alert('Your session has expired, please login again');
                    window.location.href = base_url;
                }
            },
        },
        "columns": [
            {
                "data": "name"
            },
            {
                "data": "phone"
            },
            {
                "data": "type"
            },
            {
                "data": "email"
            },
            {
                "data": "options"
            }
        ]
  });
   // $('#datatable-master').dataTable();
})(jQuery);

// (function($){
   
//     $('#datatable-master').DataTable({
    
//     "columnDefs": [{
//       "visible": false,
//       "targets": 0
//     }],
//     "order": [
//       [0, 'asc']
//     ],
//      // dom: 'lBfrtip', 
//      //    buttons: [
//      //       {
//      //           extend: 'pdf',
//      //           footer: true,
//      //           exportOptions: {
//      //                columns: [0,1]
//      //            },
//      //            title : 'State List',
//      //            text: '<i class="fa fa-file-pdf-o"></i>',
//      //            titleAttr: 'pdf'
//      //       },
//      //       {
//      //           extend: 'excel',
//      //           footer: false,
//      //           exportOptions: {
//      //                columns: [0,1]
//      //            },
//      //            title : 'State List',
//      //            text:    '<i class="fa fa-file-excel-o"></i>',
//      //            titleAttr: 'excel'
//      //       },
//      //        {
//      //           extend: 'print', 
//      //           footer: false,
//      //           exportOptions: {
//      //                columns: [0,1]
//      //            },
//      //            title : 'State List',
//      //            text:   '<i class="fa fa-files-o"></i>',
//      //            titleAttr: 'print'
//      //       }  
//      //    ],
//     // "drawCallback": function (settings) {
//     //   var api = this.api();
//     //   var rows = api.rows({
//     //     page: 'current'
//     //   }).nodes();
//     //   var last = null;

//     //   api.column(0, {
//     //     page: 'current'
//     //   }).data().each(function (group, i) {
//     //     if (last !== group) {
//     //       $(rows).eq(i).before(
//     //         '<tr class="group"><td colspan="2">' + group + '</td></tr>'
//     //       );

//     //       last = group;
//     //     }
//     //   });
//     // },
//     "processing": true,
//         "serverSide": true,
//         "ajax": {
//             "url": "{{ url('/ajax_activities_list') }}",
//             "dataType": "json",
//             "type": "POST",
//             "data": {
//                 _token: "{{csrf_token()}}"
//             },
//             "error": function (jqXHR, textStatus, errorThrown) {
//                 if(jqXHR.status==419){
//                     alert('Your session has expired, please login again');
//                     window.location.href = base_url;
//                 }
//             },
//         },
//         "columns": [{
//                 "data": "hotel_name"
//             },
//             {
//                 "data": "contact_name"
//             },
//             {
//                 "data": "options"
//             }
//         ]
//   });
//    // $('#datatable-master').dataTable();
// })(jQuery);

function ConfirmDeletion() {
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        return true;
    } else {
        return false;
    }
}



//Model
$(document).ready(function() {
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
   // $('.modal').modal();
});

$("#master-menu").addClass('active');
$("#state_sidebar_a_id").addClass('active');
</script>
@endsection