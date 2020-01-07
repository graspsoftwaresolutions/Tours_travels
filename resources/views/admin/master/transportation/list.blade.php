@extends('admin.layouts.admin')
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
                    <li>{{__('Transportation Charges List')}}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                        <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <a href="{{route('master.addTransportation')}}" class="btn btn-sm cyan waves-effect waves-circle waves-light">Add</a>
                            </div>
                            <h3 class="title medium">{{__('Transportation Charges List')}}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                <th width="20%">{{__('State')}} </th>
                                <th width="20%">{{__('From City')}} </th>
                                    <th width="20%">{{__('To City')}} </th>
                                    <th width="20%">{{__('Distance')}} </th>
                                    <th width="20%">{{__('Amount per Km')}} </th>
                                    <th width="20%">{{__('Total Amount')}} </th>
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



(function($){
    $('#datatable-master').DataTable({
    
    "columnDefs": [{
      "targets": 0
    }],
    "order": [
      [0, 'asc']
    ],
    "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ route('ajax_tarnsportation_list') }}",
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
                "data": "state_name"
            },
            {
                "data": "from_city_name"
            },
            {
                "data": "to_city_name"
            },
            {
                "data": "distance"
            },
            {
                "data": "amount_per_km"
            },
            {
                "data": "total_distance_amount"
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


$(document).on('submit','form#stateformValidate',function(){
     $("#saveMasterButton").prop('disabled',true);
});
$("#master-menu").addClass('active');
$("#state_sidebar_a_id").addClass('active');
</script>
@endsection