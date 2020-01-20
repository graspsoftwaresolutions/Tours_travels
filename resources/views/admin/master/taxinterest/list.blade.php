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
@php @endphp
        <div class="aside-panel"></div>

        <div class="container-fluid">           

            <div class="page-header">
                <h1>Tours and Travels</h1>
                <ul class="breadcrumbs">
                    <li>Masters</li>
                    <li>{{__('Inter State Tax List') }}</li>
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
                            
                            
                            <h3 class="title medium">{{__('Inter State Tax List') }}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="30%">{{__('Country Name') }}</th>
                                    <th width="30%">{{__('State Name') }}</th>
                                    <th width="30%">{{__('Tax') }}</th>
                                    <th> {{__('Action') }}</th>
                                </tr>
                            </thead>       
                            <tbody>
                             @foreach($data['tax_view'] as $tax)
                                <tr>
                                <td>{{ $tax->country_name }}</td>
                                <td>{{ $tax->state_name }}</td>
                                    <td>{{ $tax->tax }}</td>
                                    <td>
                                        <button class="btn btn-sm blue waves-effect waves-circle waves-light" onClick='showeditForm({{$tax->taxid}});'><i class="mdi mdi-lead-pencil"></i></button>
                                        &nbsp;
                                        <a>
                                            <form style='display:inline-block;' action='{{ route("master.interestTaxdestroy",$tax->taxid) }}' method='POST'>
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
                            <h1 class="modal-title">Inter State Tax Details</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="TaxformValidate" method="post" action="{{ route('master.save_interest_tax') }}">
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
                                             <div class="select-row form-group">
                                                <label for="state_id" class="block">{{__('State Name') }}<span style="color:red;">*</span></label>                 

                                                <!-- To validate the select add class "select-validate" -->     
                                                <select id="state_id" name="state_id" class="selectpicker select-validate" required="true" data-live-search="true">
                                                     <option value="" selected="">{{__('Select State') }}
                                                     </option>
                                                    @foreach ($data['state_view'] as $state)
                                                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>        
                                                 <div class="input-highlight"></div>                       
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <input placeholder="Tax" class="clearable" id="tax" name="tax" autofocus type="text">
                                                <label for="tax" class="fixed-label">{{__('Tax') }}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                           
                                        </div><!-- ./col- -->
                                            
                                    </div><!-- /.row -->  
                                </div><!-- /.row -->    
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button class="btn-flat deep-orange waves-effect waves-theme" data-dismiss="modal">Close</button>
                                <button id="saveMasterButton" class="btn-flat green waves-effect waves-theme">Save</button>
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

    const regex = /[^\d.]|\.(?=.*\.)/g;
    const subst=``;

    $('#tax').keyup(function(){
        const str=this.value;
        const result = str.replace(regex, subst);
        this.value=result;
    });
    $(function() {
    $('select[name=country_id]').change(function() {
       // alert('ok');
        var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();

        $.get(url, function(data) {
            $('#state_id').empty('');
            $("#state_id").append("<option value=''>Select</option>");
            $("#state_id").selectpicker("refresh");
            //var select = $('form select[name=state_id]');

           // select.empty();
            //$("#state_id").append("<option value=''>Select</option>");
            $.each(data, function(key, value) {
                $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
                    '</option>');
            });
             $("#state_id").selectpicker("refresh");
        });
    });
});


    (function($){
        $('#datatable-master').dataTable();
       
    })(jQuery);
    function showaddForm() {
        $("#masterModal").modal();
        $("#masterid").val('');
        $('#country_name').val("");
        
    }
    // Form Validation
    $("#TaxformValidate").validate({
        rules: {
            country_id: {
            required: true,
            },
            state_id: {
                required: true,
            },
            tax: 
            {
                required: true,
            }
        },
        //For custom messages
        messages: {
            country_id: {
                required: '{{__("Please Choose Country Name") }}',
            },
            state_id: {
                required: '{{__("Please Choose State Name") }}',
            },
            tax: 
            {
                required: '{{__("Please Enter Tax") }}', 
            }
        },
    });
    function showeditForm(taxid) {
       // $('.edit_hide').hide();
        //$('.add_hide').hide();
       // $('.edit_hide_btn').show();
        $("#masterModal").modal();
        //loader.showLoader();
        var url = "{{ route('interestTax_detail') }}" + '?taxid=' + taxid;
        $.ajax({
            url: url,
            type: "GET",
            success: function(result) {
                $('#masterid').val(result.id);
                $('#masterid').attr('data-autoid', result.id);
               // $('#country_name').val(result.country_name);
                $('#country_id').selectpicker('val', result.country_id);
                $('#state_id').selectpicker('val', result.state_id);
                $('#tax').val(result.tax);
                //loader.hideLoader();
                //$("#modal_add_edit").modal('open');
                //$('.common-label').addClass('force-active');
            }
        });
    }
    $(document).on('submit','form#TaxformValidate',function(){
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
    $("#country_sidebar_a_id").addClass('active');
</script>
@endsection