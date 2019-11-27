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
                    <li>{{__('Amenities List') }}</li>
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
                            
                            
                            <h3 class="title medium">{{__('Amenities List') }}</h3>
                        </div>

                    </div>
                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="80%">{{__('Amenities Name') }}</th>

                                    <th> {{__('Action') }}</th>
                                </tr>
                            </thead>       
                            <tbody>
                            @foreach($data['amenities_list'] as $values)
                            <tr>
                                <td>{{$values->amenities_name}}</td>
                                <td>
                                        <button class="btn btn-sm blue waves-effect waves-circle waves-light" onClick='showeditForm({{$values->id}});'><i class="mdi mdi-lead-pencil"></i></button>
                                        &nbsp;

                                        <a>
                                            <form style='display:inline-block;' action='{{ route("master.amenitiesdestroy",$values->id) }}' method='POST'>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm red waves-effect waves-circle waves-light" onclick='return ConfirmDeletion()' ><i class="mdi mdi-delete"></i></button>
                                            </form>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                              
                            </tbody>        
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
                            <h1 class="modal-title">Amenities Details</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="amenitiesformValidate" method="post" action="{{ route('master.saveamenities') }}">
                            @csrf
                            <div class="modal-body">
                               <div class="col-sm-12">
                                     <input class="hide" id="masterid" name="masterid" type="text">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <input placeholder="Amenities Name" class="clearable" id="amenities_name" name="amenities_name" autofocus type="text">
                                                <label for="amenities_name" class="fixed-label">{{__('Amenities Name') }}*</label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div><!-- ./col- -->
 
                                    </div><!-- /.row -->     
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
<script type="text/javascript">
    (function($){
        $('#datatable-master').dataTable();
       
    })(jQuery);
    function showaddForm() {
        $("#masterModal").modal();
        $("#masterid").val('');
        $('#amenities_name').val("");
        $('#updateMasterButton').hide();
    }
    // Form Validation
    $("#amenitiesformValidate").validate({
        rules: {
            amenities_name: {
                required: true,
                remote: {
                    url: "{{ url('/amenities_nameexists')}}",
                    data: {
                        amenities_id: function() {
                            return $("#masterid").val();
                        },
                        _token: "{{csrf_token()}}",
                        amenities_name: $(this).data('amenities_name')
                    },
                    type: "post",
                },
            },
        },
        //For custom messages
        messages: {
            amenities_name: {
                required: '{{__("Please enter Amenities Name") }}',
                 remote: '{{__("Amenities Name Already exists") }}',
            }
        },
    });
    function showeditForm(amenitiesid) {
        $("#masterModal").modal();
        
        var url = "{{ url('/amenities_detail') }}" + '?amenities_id=' + amenitiesid;
        $.ajax({
            url: url,
            type: "GET",
            success: function(result) {
                $('#masterid').val(result.id);
                $('#amenities_name').val(result.amenities_name);
            }
        });
    }
    $(document).on('submit','form#countryformValidate',function(){
        $("#saveMasterButton").prop('disabled',true);
    });
    function ConfirmDeletion() {
        if (confirm("{{ __('Are you sure you want to delete?') }}")) {
            return true;
        } else {
            return false;
        }
    }
    $("#master-menu").addClass('active');
    $("#amenities_sidebar_a_id").addClass('active');
</script>
@endsection