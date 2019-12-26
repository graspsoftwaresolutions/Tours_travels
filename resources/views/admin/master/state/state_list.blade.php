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
                    <li>Masters</li>
                    <li>{{__('State List')}}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                            <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <button id="addMaster" onClick='showaddForm();' class="btn btn-sm cyan waves-effect waves-circle waves-light ">Add</button>
                            </div>
                            
                            
                            <h3 class="title medium">{{__('State List')}}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="40%">{{__('Country Name')}}</th>
                                    <th width="40%">{{__('State Name')}} </th>

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

        <!-- Default Modal -->
            <div id="masterModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header theme">
                            <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                            <h1 class="modal-title">{{__('State Details')}}</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="stateformValidate" method="post" action="{{ route('master.savestate') }}">
                            @csrf
                            <div class="modal-body">
                               <div class="col-sm-12">
                                     <input class="hide" id="masterid" name="masterid" type="text">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="select-row form-group">
                                                <label for="country_id" class="block">{{__('Country Name') }}<span style="color:red;">*</span></label>                 

                                                <!-- To validate the select add class "select-validate" -->     
                                                <select id="country_id" name="country_id" class="selectpicker select-validate" required="true" data-live-search="true">
                                                    <option value="">{{__('Select country')}}</option>
                                                    @php
                                                    $data1 = CommonHelper::DefaultCountry();
                                                    @endphp
                                                    @foreach($data['country_view'] as $value)
                                                    <option value="{{$value->id}}" @if($data1==$value->id) selected @endif >
                                                        {{$value->country_name}}</option>
                                                    @endforeach
                                                </select>        
                                                 <div class="input-highlight"></div>                       
                                            </div><!-- /.form-group -->
                                          
                                           
                                        </div><!-- ./col- -->

                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <input placeholder="State Name" class="clearable" id="state_name" name="state_name" autofocus type="text">
                                                <label for="state_name" class="fixed-label">{{__('State Name')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                           
                                        </div><!-- ./col- -->
 
                                    </div>
                                   
                                    
                                </div><!-- /.row -->    
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                                <button id="saveMasterButton" class="btn-flat waves-effect waves-theme">Save</button>
                            </div><!-- /.modal-footer -->
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

       
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


(function($){
    // $('#datatable-master').DataTable( {
    //   //  ajax: "{{ url('/ajax_state_list')}}",
    //     "ajax": {
    //         "url": "{{ url('/ajax_state_list')}}",
    //         "dataType": "json",
    //         "type": "POST",
    //         "data": {
    //             _token: "{{csrf_token()}}"
    //         },
    //         "error": function (jqXHR, textStatus, errorThrown) {
    //             if(jqXHR.status==419){
    //                 alert('Your session has expired, please login again');
    //                 window.location.href = base_url;
    //             }
    //         },
    //     },
    //     columns: [
    //         { data: 'country_name' },
    //         { data: 'state_name' },
    //         { data: 'options' },
    //     ],
    //     "sDom":
    //     "<'row dt-header'R<'col-sm-6'l><'col-sm-6'f>>" +
    //     "<'row dt-body'<'col-sm-12'tr>>" +
    //     "<'row dt-footer'<'col-sm-6'i><'col-sm-6'p>>",
    //     "oTableTools": {
    //         "sSwfPath": "dist/js/plugins/datatables/extensions/tableTools/copy_csv_xls_pdf.swf",
    //         "aButtons": [
    //             "copy",
    //             "print",
    //             "csv", 
    //             "xls", 
    //             "pdf"
    //         ]
    //     },
    //     colReorder: {
    //         realtime: true
    //     }
               
    // });
    $('#datatable-master').DataTable({
    
    "columnDefs": [{
      "visible": false,
      "targets": 0
    }],
    "order": [
      [0, 'asc']
    ],
     // dom: 'lBfrtip', 
     //    buttons: [
     //       {
     //           extend: 'pdf',
     //           footer: true,
     //           exportOptions: {
     //                columns: [0,1]
     //            },
     //            title : 'State List',
     //            text: '<i class="fa fa-file-pdf-o"></i>',
     //            titleAttr: 'pdf'
     //       },
     //       {
     //           extend: 'excel',
     //           footer: false,
     //           exportOptions: {
     //                columns: [0,1]
     //            },
     //            title : 'State List',
     //            text:    '<i class="fa fa-file-excel-o"></i>',
     //            titleAttr: 'excel'
     //       },
     //        {
     //           extend: 'print', 
     //           footer: false,
     //           exportOptions: {
     //                columns: [0,1]
     //            },
     //            title : 'State List',
     //            text:   '<i class="fa fa-files-o"></i>',
     //            titleAttr: 'print'
     //       }  
     //    ],
    // "drawCallback": function (settings) {
    //   var api = this.api();
    //   var rows = api.rows({
    //     page: 'current'
    //   }).nodes();
    //   var last = null;

    //   api.column(0, {
    //     page: 'current'
    //   }).data().each(function (group, i) {
    //     if (last !== group) {
    //       $(rows).eq(i).before(
    //         '<tr class="group"><td colspan="2">' + group + '</td></tr>'
    //       );

    //       last = group;
    //     }
    //   });
    // },
    "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ route('ajax_state_list') }}",
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
        "columns": [{
                "data": "country_name"
            },
            {
                "data": "state_name"
            },
            {
                "data": "options"
            }
        ]
  });
   // $('#datatable-master').dataTable();
})(jQuery);

function ConfirmDeletion() {
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        return true;
    } else {
        return false;
    }
}

// Form Validation
$("#stateformValidate").validate({
    rules: {
        country_id: {
            required: true,
        },
        state_name: {
            required: true,
            remote: {
                url: "{{ route('state_nameexists')}}",
                type: "post",
                data: {
                    state_id: function() {
                        return $("#masterid").val();
                    },
                    country_id: function() {
                        return $("#country_id").val();
                    },
                    _token: "{{csrf_token()}}",
                    state_name: $(this).data('state_name')
                },
                
                
            },
        },
    },
    //For custom messages
    messages: {
        country_id: {
            required: '{{__("Please Choose Country Name") }}',
        },
        state_name: {
            required: '{{__("Please enter State Name") }}',
            remote: '{{__("State Name Already exists") }}',
        }
    },
});

//Model
$(document).ready(function() {
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
   // $('.modal').modal();
});

function showaddForm() {
    $("#masterModal").modal();
    $('#state_name').val("");
    $('#country_id').selectpicker('val', '');
    $('#masterid').val("");
}

function showeditForm(countryid) {
    $("#masterModal").modal();
    //loader.showLoader();
    var url = "{{ route('state_detail') }}" + '?id=' + countryid;
    $.ajax({
        url: url,
        type: "GET",
        success: function(result) {
            $('#masterid').val(result.id);
            $('#masterid').attr('data-autoid', result.id);
            $('#country_id').selectpicker('val', result.country_id);
            // /$('#country_id').val(result.country_id);
            $('#state_name').val(result.state_name);
            //loader.hideLoader();
           
        }
    });
}
$(document).on('submit','form#stateformValidate',function(){
     $("#saveMasterButton").prop('disabled',true);
});
$("#master-menu").addClass('active');
$("#state_sidebar_a_id").addClass('active');
</script>
@endsection