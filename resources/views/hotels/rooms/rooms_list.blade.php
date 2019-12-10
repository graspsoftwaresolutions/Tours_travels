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
                    <li>{{__('Room List') }}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                    <div class="p10 theme dropshadow mb4">
                        <div class="toolbar">
                            <div class="pull-right">
                               
                                 <a href="#:;" class="icon action toolbar-collapse hide"></a>
                                 <a href="{{route('hotel.addrooms')}}" class="btn btn-sm cyan waves-effect waves-circle waves-light ">Add</a>
                            </div>
                            
                            
                            <h3 class="title medium">{{__('Room List') }}</h3>
                        </div>

                    </div>
                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                            <tr>
                                    <th width="30%">{{__('Hotel') }}</th>
                                    <!-- <th width="30%">{{__('Room Type') }}</th> -->
                                    <th width="15%">{{__('Room No') }}</th>
                                    <th width="15%">{{__('State') }}</th>
                                    <th width="15%">{{__('City') }}</th>
                                    
                                    <th width="15%">{{__('Status') }}</th>

                                    <th> {{__('Action') }}</th>
                                </tr>
                            </thead>       
                            <tbody>
                            
                               @foreach($data['room_list'] as $values)
                               @php //$hotel_name = CommonHelper::getHotelnames($values->hotel_id); dd($hotel_name); @endphp
                                    <tr>
                                        <td>{{ $values->hotel_name}}</td>
                                        <td>{{$values->room_number}}</td> 
                                        <td>{{$values->state_name}}</td> 
                                        <td>{{$values->city_name}}</td> 
                                        <td>@php if($values->roomstatus==1)
                                                        echo "Active";
                                                else
                                                 echo "Inactive";
                                              @endphp</td>
                                        <td> <a   href="{{url('hotel_room_edit').'/'.Crypt::encrypt($values->hotelroomid)}}" class="btn btn-sm blue waves-effect waves-circle waves-light"><i class="mdi mdi-lead-pencil"></i></a>
                                        &nbsp;</td>
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
    $(document).on('submit','form#roomTypeformValidate',function(){
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
    $("#hotelrooms_sidebar_li_id").addClass('active');
</script>
@endsection