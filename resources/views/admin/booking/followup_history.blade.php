@extends('admin.layouts.admin')
@section('headSection')
<link href="{{ asset('public/assets/dist/css/plugins/dataTables.css') }}" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">

<style>
.details{
    margin: 10px;
}
.panel {
    padding: 13px;
    font-size:16px;
}
.design {
    background: #689ba0;
    text-align: center;
    font-size: 20px;
    color: white;
}
</style>
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
                    <li>Booking</li>
                    <li>{{__('Follow Up History List') }}</li>
                </ul>
            </div>
            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                            <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <a href="{{route('booking.followup')}}" class="btn btn-sm cyan waves-effect waves-circle waves-light">Back</a>
                            </div>
                            <h3 class="title medium">{{__('Follow Up  History List') }}</h3>
                        </div>
                    </div>
                    @php $customer_data =   $data['customer_deatils'];
                         $booking_data = $data['booking_details']; 
                         $package_name = CommonHelper::getfirstPackageName($booking_data->package_id);
                     @endphp
                    <div class="collapsible-target">
                        <div class="row details">
                            <div class="col-md-6">
                            <h5 class="card-title design">Customer Details</h5>
                            <div class="card panel">
                                    <div class="card-body">
                                        <p class="card-text"><b>Name : </b> {{$customer_data->name ? Ucfirst($customer_data->name) : '' }}</p>
                                        <p class="card-text"><b>Email : </b> {{$customer_data->email ? $customer_data->email : '' }}</p>
                                        <p class="card-text"><b>Phone : </b> {{$customer_data->phone ? $customer_data->phone : '' }}</p>
                                        <p class="card-text"><b>Address : </b> {{$customer_data->address_one ? $customer_data->address_one : '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <h5 class="card-title design">Booking Details</h5>
                            <div class="card panel">
                                    <div class="card-body">
                                    <p class="card-text"><b>Package Name : </b> {{$package_name ?  Ucfirst($package_name) : '' }}</p>
                                        <p class="card-text"><b>Total Amount : </b> {{$booking_data->grand_total ? $booking_data->grand_total : '' }}</p>
                                        <p class="card-text"><b>Paid Amount : </b> {{$booking_data->paid_amount ? $booking_data->paid_amount : '' }}</p>
                                        <p class="card-text"><b>Balance Amount : </b> {{$booking_data->balance_amount ? $booking_data->balance_amount : '0.00' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                            <br>
                            <div class="container">
                            <h2>Follow Up History List</h2>
                            <div class="panel panel-default">
                            <table id="datatable-master" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%">{{__('Due Date') }}</th>
                                    <th width="20%">{{__('Due Amount') }}</th>
                                    <th width="20%">{{__('Followed Date') }}</th>
                                    <th width="20%">{{__('Followed by') }}</th>
                                </tr>
                            </thead>       
                            <tbody>
                                @foreach($data['followup_details'] as $values)
                                <tr>
                                     @php $date = CommonHelper::convert_date_frontend($values->due_date);
                                        $followed_date = CommonHelper::convert_date_frontend($values->followed_date);
                                     @endphp
                                    <td>{{$date ? $date : '----'}}</td>
                                    <td>{{$values->due_amount ? $values->due_amount : '----'}}</td>
                                    <td>{{$followed_date ? $followed_date : '----'}}</td>
                                    <td>{{$values->followed_by ? $values->followed_by : '----'}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>        
                        </table>
                            </div>
                            </div>
                        <!-- <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover"> -->
                        
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
<!-- <script src="{{ asset('public/assets/dist/js/plugins/datatables/jquery.dataTables.min.js') }}"></script> -->
<!-- Data tables extensions -->
<!-- <script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/tableTools/dataTables.tableTools.min.js') }}"></script> -->
<!-- <script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/colVis/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/colReorder/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/datatables/extensions/responsive/dataTables.responsive.min.js') }}"></script> -->
<!-- Data tables bootstrap -->
<!-- <script src="{{ asset('public/assets/dist/js/plugins/datatables/dataTables.bootstrap.js') }}"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
@endsection
@section('footerSecondSection')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-master').DataTable( {
            dom: 'Bfrtip',
            buttons: [
               'excel', 'pdf', 'print'
            ]
        });
    });
    // (function($){
    //     $('#datatable-master').dataTable();
       
    // })(jQuery);
    function showaddForm() {
        $("#masterModal").modal();
        $("#masterid").val('');
        $('#country_name').val("");
        
    }
    // Form Validation
    $("#countryformValidate").validate({
        rules: {
            country_name: {
                required: true,
                remote: {
                    url: "{{ route('country_nameexists')}}",
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
        var url = "{{ route('country_detail') }}" + '?country_id=' + countryid;
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