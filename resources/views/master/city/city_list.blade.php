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
                    <li>{{__('City List') }}</li>
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
                            
                            
                            <h3 class="title medium">{{__('City List') }}</h3>
                        </div>

                    </div>

                    <div class="collapsible-target">

                        <table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="30%">{{__('State Name') }}</th>
                                    <th width="30%">{{__('City Name') }} </th>
                                    <th width="20%">{{__('City Image') }} </th>

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
                            <h1 class="modal-title">{{__('City Details')}}</h1>
                        </div><!-- /.modal-header -->
                        <form class="formValidate" id="cityformValidate" enctype="multipart/form-data" method="post" action="{{ route('master.savecity') }}">
                            @csrf
                            <div class="modal-body">
                               <div class="col-sm-12">
                                     <input class="hide" id="masterid" name="masterid" type="text">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="select-row form-group">
                                                <label for="country_id" class="block">{{__('Country Name') }}*</label>                 

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
                                                <label for="state_id" class="block">{{__('State Name') }}*</label>                 

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

                                           
                                        </div><!-- ./col- -->

                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                <input placeholder="{{__('City Name') }}"  class="clearable" id="city_name" name="city_name" autofocus type="text">
                                                <label for="city_name" class="fixed-label">{{__('City Name') }}*</label>
                                                <div class="input-highlight"></div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- <div class="input-field label-float"> -->
                                            <div class="file-field input-field label-float">
                                                <div class="btn theme">
                                                <span>File</span>
                                                <input type="file" name="city_image" accept="image/*">
                                                </div>
                                                <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Upload one  file">
                                                <div class="input-highlight"></div>
                                                </div>
                                                </div>
                                            <!-- </div> -->
                                           <br><br>
                                        </div><!-- ./col- -->
                                        <div class="row show image">
                                        <!-- <div class="col-sm-6"> </div> -->
                                        <!-- <div class="col-sm-6"> -->
                                                <div class="divider theme ml14 mr14"></div>
                                                <div class="col-xs-12 col-sm-3 mt20">
                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-3 mt20">
                                                   
                                                </div>
                                                <div class="col-xs-12 col-sm-3 mt20">
                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-3 mt20" id="cit_image">
                                                
                                                </div>
                                            <!-- </div> -->
                                            </div>
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
$("#master-menu").addClass('active');
$("#city_sidebar_a_id").addClass('active');


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
$(function() {
    $('#datatable-master').DataTable({
    
    "columnDefs": [{
      "visible": false,
      "targets": 0
    }],
    "order": [
      [0, 'asc']
    ],
	// dom: 'lBfrtip', 
 //        buttons: [
	// 	   {
	// 		   extend: 'pdf',
	// 		   footer: true,
	// 		   exportOptions: {
	// 				columns: [0,1]
	// 			},
 //                title : 'Cities List', 
 //                text: '<i class="fa fa-file-pdf-o"></i>',
 //                titleAttr: 'pdf'
	// 	   },
	// 	   {
	// 		   extend: 'excel',
	// 		   footer: false,
	// 		   exportOptions: {
	// 				columns: [0,1]
	// 			},
	// 			title : 'Cities List',
 //                text:    '<i class="fa fa-file-excel-o"></i>',
 //                titleAttr: 'excel'
	// 	   },
	// 		{
	// 		   extend: 'print',
	// 		   footer: false,
	// 		   exportOptions: {
	// 				columns: [0,1]
	// 			},
	// 			title : 'Cities List',
 //                text:   '<i class="fa fa-files-o"></i>',
 //                titleAttr: 'print'
	// 	   }  
	// 	],
 //    "drawCallback": function (settings) {
 //      var api = this.api();
 //      var rows = api.rows({
 //        page: 'current'
 //      }).nodes();
 //      var last = null;

 //      api.column(0, {
 //        page: 'current'
 //      }).data().each(function (group, i) {
 //        if (last !== group) {
 //          $(rows).eq(i).before(
 //            '<tr class="group"><td colspan="2">' + group + '</td></tr>'
 //          );

 //          last = group;
 //        }
 //      });
 //    },
	"processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ url('/ajax_city_list') }}",
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
        "columns": [ /* {
                "data": "country_name"
            },*/
            {
                "data": "state_name"
            },
            {
                "data": "city_name"
            },
            {
                "data": "city_image",
                "render": function (data) {

                    if(data == null || data == 'undefined' || data == '')
                    {
                        var location = image_url+'/city/no_image.jpg';
                        return '<a  target="_blank" href="'+location+'"><img src="'+location+'" class="avatar" width="50" height="50"/></a>';
                    }
                    else{
                        
                        var location = image_url+'/city/'+data;
                        return '<a  target="_blank" href="'+location+'"><img src="'+location+'" class="avatar" width="50" height="50"/></a>';
                    }
                    }
            },
            {
                "data": "options"
            }
        ]
  });

});



function ConfirmDeletion() {
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        return true;
    } else {
        return false;
    }
}
// Form Validation
$("#cityformValidate").validate({
    rules: {
        country_id: {
            required: true,
        },
        state_id: {
            required: true,
        },
        city_name: {
            required: true,
            remote: {
                url: "{{ url('/city_nameexists')}}",
                data: {
                    city_id: function() {
                        return $("#masterid").val();
                    },
                    country_id: function() {
                        return $("#country_id").val();
                    },
                    state_id: function() {
                        return $("#state_id").val();
                    },
                    _token: "{{csrf_token()}}",
                    city_name: $(this).data('city_name')
                },
                type: "post",
            },
        },
        // city_image: {
        //     required: true,
        // },
    },
    //For custom messages
    messages: {
        country_id: {
            required: '{{__("Please Choose Country Name") }}',
        },
        state_id: {
            required: '{{__("Please Choose State Name") }}',
        },
        city_name: {
            required: '{{__("Please enter City Name") }}',
            remote: '{{__("City Name Already exists") }}',
        },
        // city_image: {
        //     required: '{{__("Please select image") }}',
        // },
    },
   
});



function showaddForm() {
    $("#masterModal").modal();
    $('#city_name').val("");
    // $('#cit_image').attr('src', '');
    $("#cit_image").hide();
    //document.getElementById('cit_image').src = "#";
    $('#state_id').selectpicker('val', '');
    $('#masterid').val("");
}

function showeditForm(cityid) {
   
    $("#masterModal").modal();
    var url = "{{ url('/city_detail') }}" + '?id=' + cityid;
    $.ajax({
        url: url,
        type: "GET",
        success: function(result) {
            console.log(result);
            $('#masterid').val(result.id);
            $('#masterid').attr('data-autoid', result.id);
            $('#country_id').selectpicker('val', result.country_id);
            $('#state_id').selectpicker('val', result.state_id);
            $('#city_name').val(result.city_name);
            $("#cit_image").show();
            if(result.city_image == '' || result.city_image == undefined ||  result.city_image == null )
            {
                var location = image_url+'/city/no_image.jpg';
                $('#cit_image').html('<img style="width:150px;padding-right: 46px;margin-top: -27px;height: 86px;margin-right:10px" src="'+location+'">');
            }
            else{
                var location = image_url+'/city/'+result.city_image;
                $('#cit_image').html('<img style="width:150px;padding-right: 46px;margin-top: -27px;height: 86px;margin-right:10px" src="'+location+'">');
            }
        }
    });
}
$(document).on('submit','form#cityformValidate',function(){
     $("#saveMasterButton").prop('disabled',true);
    //loader.showLoader();
});
</script>
@endsection