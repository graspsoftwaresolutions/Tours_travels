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
                    <li>{{__('Transportation')}}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                        <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <a href="{{route('master.addNewTransportation')}}" class="btn btn-sm cyan waves-effect waves-circle waves-light">Add</a>
                            </div>
                            <h3 class="title medium">{{__('Transportation List')}}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                <th width="15%">{{__('Country')}} </th>
                                <th width="15%">{{__('State')}} </th>
                                    <th width="15%">{{__('Type')}} </th>
                                    <th width="15%">{{__('Pack Name')}} </th>
                                    <th width="15%">{{__('Pack Amount')}} </th>
                                    <th width="15%">{{__('Cost Per Km')}} </th>
                                    <th width="15%">{{__('Cost Per Hr')}} </th>
                                    <th> {{__('Action') }}</th>
                                </tr>
                            </thead>
                            @foreach( $data['tans_view'] as $values)
                                <tr> 
                                <td> @php if($values->country_name) { echo $values->country_name; } else{echo '---';  } @endphp </td> </td>
                                <td> @php if($values->state_name) { echo $values->state_name; } else{echo '---';  } @endphp </td> </td>
                                <td> @php if($values->type) { echo $values->type; } else{echo '---';  } @endphp </td> </td>
                                <td> @php if($values->pack_name) { echo $values->pack_name; } else{echo '---';  } @endphp </td> </td>
                                <td> @php if($values->transport_pack_amount) { echo $values->transport_pack_amount; } else{echo '---';  } @endphp </td> </td>
                                <td> @php if($values->unpack_amount_per_km) { echo $values->unpack_amount_per_km; } else{echo '---';  } @endphp </td> </td>
                                <td> @php if($values->unpack_amount_per_hr) { echo $values->unpack_amount_per_hr; } else{echo '---';  } @endphp </td> </td>
                                    <td>
                                    @php $encrypted_id = base64_encode($values->tasportation_id); @endphp
                                    <a href="{{route('edit_transporation',$encrypted_id)}}" class="btn btn-sm blue waves-effect waves-circle waves-light"><i class="mdi mdi-lead-pencil"></i></a>
                                   
                                        &nbsp;
                                    </td>
                                </tr>
                                @endforeach
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
        $('#datatable-master').dataTable();
       
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