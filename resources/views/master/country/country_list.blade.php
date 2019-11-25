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
                    <li>{{__('Country List') }}</li>
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
                            
                            
                            <h3 class="title medium">{{__('Country List') }}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="80%">{{__('Country Name') }}</th>

                                    <th> {{__('Action') }}</th>
                                </tr>
                            </thead>       
                            <tbody>
                                @foreach($data['country_view'] as $country)
                                <tr>
                                    <td>{{ $country->country_name }}</td>
                                    <td><button class="btn btn-sm blue waves-effect waves-circle waves-light" onClick='showeditForm({{$country->id}});'><i class="mdi mdi-lead-pencil"></i></button></td>
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
                            <h1 class="modal-title">Country Details</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="countryformValidate" method="post" action="{{ route('master.savecountry') }}">
                            @csrf
                            <div class="modal-body">
                               <div class="col-sm-12">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <input placeholder="Country Name" class="clearable" id="country_name" name="country_name" autofocus type="text">
                                                <label for="country_name" class="fixed-label">{{__('Country Name') }}*</label>
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

        <footer id="pageFooter" class="page-footer toolbar">
            <p class="hidden-xs pull-left pl20 pr12">Follow us</p>
            <a href="#!"><i class="icon action mdi mdi-twitter"></i></a>
            <a href="#!"><i class="icon action mdi mdi-facebook"></i></a>
            <a href="#!"><i class="icon action mdi mdi-linkedin"></i></a>
            <p class="pull-right pr20">© 2016 YourApp</p>
        </footer>
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
    }
    // Form Validation
    $("#countryformValidate").validate({
        rules: {
            country_name: {
                required: true,
                remote: {
                    url: "{{ url('/country_nameexists')}}",
                    data: {
                        country_id: function() {
                            return $("#masterid").val();
                        },
                        _token: "{{csrf_token()}}",
                        country_name: $(this).data('country_name')
                    },
                    type: "post",
                },
            },
        },
        //For custom messages
        messages: {
            country_name: {
                required: '{{__("Please enter Country Name") }}',
                remote: '{{__("Country Name Already exists") }}',
            }
        },
    });
    function showeditForm(countryid) {
       // $('.edit_hide').hide();
        //$('.add_hide').hide();
       // $('.edit_hide_btn').show();
        $("#masterModal").modal();
        //loader.showLoader();
        var url = "{{ url('/country_detail') }}" + '?country_id=' + countryid;
        $.ajax({
            url: url,
            type: "GET",
            success: function(result) {
                $('#masterid').val(result.id);
                $('#masterid').attr('data-autoid', result.id);
                $('#country_name').val(result.country_name);
                //loader.hideLoader();
                //$("#modal_add_edit").modal('open');
                //$('.common-label').addClass('force-active');
            }
        });
    }
    $(document).on('submit','form#countryformValidate',function(){
        $("#saveMasterButton").prop('disabled',true);
    });
    $("#master-menu").addClass('active');
    $("#country_sidebar_a_id").addClass('active');
</script>
@endsection