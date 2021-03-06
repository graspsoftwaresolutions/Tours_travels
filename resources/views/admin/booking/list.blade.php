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
                    <li>Booking</li>
                    <li>{{__('Booking List')}}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                            <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <button id="addMaster" class="btn btn-sm cyan waves-effect waves-circle waves-light hide">Add</button>
                            </div>
                            
                            
                            <h3 class="title medium">{{__('Booking List')}}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="20%">{{__('Booking Number')}}</th>
                                    <th width="20%">{{__('Itinerary Name')}}</th>
                                    <th width="10%">{{__('From Date')}}</th>
                                    <th width="10%">{{__('To Date')}}</th>
                                    <th width="20%">{{__('Customer Name')}} </th>
                                    <th width="10%">{{__('Adult Count')}} </th>
                                    <th width="10%">{{__('Total Amount ')}} </th>
                                    <th width="20%">{{__('Paid Amount ')}} </th>
                                    <th width="20%">{{__('Balance Amount ')}} </th>
                                    <th width="10%">{{__('To State')}} </th>
                                    <th width="10%">{{__('To City')}} </th>
                                    
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
                            <h1 class="modal-title">{{__('Change Status')}}</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="ChageStatusformValidate" method="post">
                            @csrf
                            <div class="modal-body">
                               <div class="col-sm-12">
                                     <input class="hide" id="bookingid" name="bookingid" type="text">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <select class="selectpicker select-validate" name='changeStatus' id='changeStatus'>
                                                    <option value='1'> Active </option>
                                                    <option value='0' readonly> Inactive </option>
                                                </select>
                                                <label for="state_name" class="fixed-label">{{__('Select Status')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div><!-- ./col- -->
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                                <button type='submit' id="saveStatusButton" class="btn-flat waves-effect waves-theme">Save</button>
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
            "url": "{{ route('ajax_booking_list') }}",
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
                "data": "booking_number"
            },
            {
                "data": "package_name"
            },
            {
                "data": "from_date"
            },
            {
                "data": "to_date"
            },
            {
                "data": "customer_name"
            },
            {
                "data": "adult_count"
            },
            {
                "data": "grand_total"
            },
            {
                "data": "paid_amount"
            },
            {
                "data": "balance_amount"
            },
            {
                "data": "state_name"
            },
            {
                "data": "city_name"
            },
            {
                "data": "options"
            }
        ]
  });
   // $('#datatable-master').dataTable();
})(jQuery);

function showeditForm(bookingid,$status) {
     $("#masterModal").modal();
     $('#bookingid').val(bookingid);
     if($status ==1)
     {
        $('#changeStatus').selectpicker('val', $status);
     }
     else{
        $('#changeStatus').selectpicker('val', $status);
     }
       // alert(packageid);
}

//Model
$(document).ready(function() {
    $('#saveStatusButton').click(function(e){
    e.preventDefault();
    $.ajax({
            type: "post",
            url: "{{ route('booking.ChangeStatus') }}",
            data: $('#ChageStatusformValidate').serialize(),
            success: function(response){
                if(response)
                {
                    alert('Status Changed sucessfully!!');
                    $('#masterModal').modal('toggle');
                    window.location.reload();
                }
            }
			});
});
});


function ConfirmMail() {
    if (confirm("{{ __('Are you sure you want to send email?') }}")) {
        return true;
    } else {
        return false;
    }
}

//Model

$(document).on('submit','form#ChageStatusformValidate',function(){
     $("#saveStatusButton").prop('disabled',true);
     $("#saveStatusButton").prop('disabled',true);
    //loader.showLoader();
});

$("#master-menu").addClass('active');
$("#state_sidebar_a_id").addClass('active');
</script>
@endsection