@extends('admin.layouts.admin')
@section('headSection')
<link href="{{ asset('public/assets/dist/css/plugins/dataTables.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('headSecondSection')
<style>
.clearfix
{
    clear:both;
}
</style>
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
                                    <th width="20%">{{__('Adult Count')}} </th>
                                    <th width="20%">{{__('Total Amount ')}} </th>
                                    <th width="20%">{{__('Paid Amount')}} </th>
                                    <th width="20%">{{__('Balance Amount')}} </th>
                                    <th width="20%">{{__('State')}} </th>
                                    <th width="20%">{{__('City')}} </th>
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
                            <h1 class="modal-title">{{__('Due date Follow up')}}</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="DuedateformValidate" method="post">
                            @csrf
                            <div class="modal-body">
                               <div class="col-sm-12">
                                     <input class="hide" id="bookingid" name="bookingid" type="text">
                                    <div class="row">
                                        <!-- <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <input type="text" class="form-control" id="package_name" name="package_name">
                                                <label for="package Name" class="fixed-label">{{__('Package Name')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                            <input type="text" readonly class="form-control" id="total_amount" name="total_amount">
                                                <label for="total_amount" class="fixed-label">{{__('Total Amount')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                            <input type="text" readonly class="form-control" id="paid_amount" name="paid_amount">
                                                <label for="paid_amount" class="fixed-label">{{__('Paid Amount')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                            <input type="text" readonly class="form-control" id="balance_amount" name="balance_amount">
                                                <label for="balance_amount" class="fixed-label">{{__('Balance Amount')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <select class="selectpicker select-validate" name='type' id='type'>
                                                    <option value='0' selected='true' disabled> Select Type </option>
                                                    <option value='1'> Pay Now </option>
                                                    <option value='2'> Pay Later </option>
                                                </select>
                                                <label for="state_name" class="fixed-label">{{__('Select Type')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-6 amount hide">
                                            <div class="input-field label-float">
                                            <input type="text" class="form-control" id="amount" name="amount">
                                                <label for="amount" class="fixed-label">{{__('Amount')}}<span style="color:red;">*</span></label>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 paymentdate hide">
                                            <div class="form-group  input-field label-float">
                                                     <input type="date"  class="datepicker"  value="{{ date('Y-m-d') }}" name="payment_date" >
                                                <label for="payment_date" class="fixed-label">{{__('Payment Date') }}<span style="color:red">*</span></label>
                                                <div class="input-highlight"></div>
                                                </div>
                                        </div>
                                        <div class="col-sm-6 duedate hide">
                                            <div class="form-group  input-field label-float">
                                                <input autofocus type="date" class="datepicker" name="due_date" id="due_date"/>
                                                <label for="due_date" class="fixed-label">{{__('Due Date') }}<span style="color:red">*</span></label>
                                                <div class="input-highlight"></div>
                                                </div>
                                        </div>
                                        <div class="col-sm-6 reason hide">
                                            <div class="form-group  input-field label-float">
                                            <label for="reason" class="fixed-label">{{__('Due Date Reason') }}</label>
                                            <textarea class="textarea-auto-resize" style="border: 1px solid #9e9e9e;padding: 10px;" placeholder="Enter Reason" name="reason" id="reason"></textarea>
                                            <p class="no-margin em"></p>
                                                </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-6 ">
                                            <div class="form-group input-field label-float">
                                                <input  type="text" required class="form-control" name="followed_by" id="followed_by"/>
                                                <label for="due_date" class="fixed-label">{{__('Followed By') }}<span style="color:red">*</span></label>
                                                <div class="input-highlight"></div>
                                                </div>
                                        </div>
                                        <div class="clearfix"></div>

                                </div><!-- /.row -->
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                                <button type='submit' id="saveMasterButton" class="btn-flat waves-effect waves-theme">Save</button>
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
//Model
 // Form Validation
 $("#DuedateformValidate").validate({
        rules: {
            type: {
                required: true,
               
            },
            followed_by : {
                required: true,
            },
        },
        //For custom messages
        messages: {
            type: {
                required: '{{__("Please Select Type") }}',
            },
            followed_by : {
                required: '{{__("Please enter Name") }}',
            },
        },
    });
    $(document).on('submit','form#DuedateformValidate',function(){
        $("#saveMasterButton").prop('disabled',true);
    });
    //Model
$(document).ready(function() {
    $('#saveMasterButton').click(function(e){
    e.preventDefault();
    $.ajax({
             type: "post",
            url: "{{ route('booking.followup_payment_history') }}",
            data: $('#DuedateformValidate').serialize(),
            success: function(response){
                if(response)
                {
                    alert('Process done Succesfully!!');
                    $('#masterModal').modal('toggle');
                    window.location.reload();
                }
            }
			});
});
});
 $('#type').change(function(e){
        var type =  $('#type').val();
            if(type == '1')
            {
                $('.amount').removeClass('hide');
                $('.paymentdate').removeClass('hide');
                $('.duedate').addClass('hide');
                $('.reason').addClass('hide');
                
            }
            else if(type == '2')
            {
                $('.amount').addClass('hide');
                $('.paymentdate').addClass('hide');
                $('.duedate').removeClass('hide');
                $('.reason').removeClass('hide');
            }
      });
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
            "url": "{{ route('ajax_followupbooking_list') }}",
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

function ConfirmMail() {
    if (confirm("{{ __('Are you sure you want to send email?') }}")) {
        return true;
    } else {
        return false;
    }
}
function showDuedatePaymentForm(bookingid,grand_total,paid_amount,balance_amount,package_id) {
   
    $("#masterModal").modal();
    $('#package_name').val(package_id); 
    $('#total_amount').val(grand_total); 
    $('#paid_amount').val(paid_amount); 
    $('#balance_amount').val(balance_amount); 
    $('#bookingid').val(bookingid);
    $('#due_date').val(''); 
    $('#reason').val(''); 
    $('#amount').val(''); 
    $('#payment_date').val(''); 
    $('#followed_by').val('');  
    $('#type').selectpicker('val', '');
}
$("#booking-menu").addClass('active');
$("#cust_followup_li_id").addClass('active');
</script>
@endsection