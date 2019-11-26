@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
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
                    <li>{{__('Add Hotel') }}</li>
                </ul>
            </div>          

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                   <form id="wizard1" action="#" class="paper">
					    <h3>Detail</h3>
					    <fieldset>      
					 		
					 		<div class="col-sm-8 col-sm-offset-1">
					 			<h4 class="text-headline">Listing Information</h4>
					 			<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>

						        
                    <input type="hidden" name="_token" value="aUcIazC0kgpGH89rirQbE86Lw2jjs732WEztPIQE">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Hotel Name:</strong></label>
                          <input class="form-control" type="text" name="name" value="" placeholder="Enter Hotel Name">
                          <p class="no-margin em"></p>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <label for=""><strong>Preview Images:</strong></label>
                        <div class="">
                          <table class="table table-striped" id="imgtable">

                          </table>
                        </div>
                        <div class="form-group">
                          <label class="btn btn-info" style="width:100px;cursor:pointer;">
                            <input id="imgs" style="display:none;" type="file">
                            <i class="fa fa-plus"></i> Add File
                          </label>
                          <p class="no-margin em"></p>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Select Amenities:</strong></label>
                          <div class="row">
                            <div class="col-md-2">
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="1">
                                <label class="form-check-label">
                                  Free Wifi
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="2">
                                <label class="form-check-label">
                                  Free Drinks
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="3">
                                <label class="form-check-label">
                                  Free Meal
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="4">
                                <label class="form-check-label">
                                  Taxi Available
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="5">
                                <label class="form-check-label">
                                  Bar Available
                                </label>
                              </div>
                                                        </div>
                            <div class="col-md-2">
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="6">
                                <label class="form-check-label">
                                  LED
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="7">
                                <label class="form-check-label">
                                  Free Coffee
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="8">
                                <label class="form-check-label">
                                  Wheelchair
                                </label>
                              </div>
                                                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" value="9">
                                <label class="form-check-label">
                                  Pet Room
                                </label>
                              </div>
                                                        </div>
                            <div class="col-md-12">
                              <p class="no-margin em"></p>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for=""><strong>Phone Number:</strong></label>
                              <input type="text" class="form-control" name="phone" value="" placeholder="Enter Hotel Phone Number">
                              <p class="no-margin em"></p>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for=""><strong>Email:</strong></label>
                              <input type="text" class="form-control" name="email" value="" placeholder="Enter Hotel Email Address">
                              <p class="no-margin em"></p>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for=""><strong>Address:</strong></label>
                              <input type="text" class="form-control" name="address" value="" placeholder="Enter Hotel Location">
                              <p class="no-margin em"></p>
                          </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Overview: </strong></label>
                          <div unselectable="on" style="width: 954px;"><div class=" nicEdit-panelContain" unselectable="on" style="overflow: hidden; width: 100%; border: 1px solid rgb(204, 204, 204); background-color: rgb(239, 239, 239);"><div class=" nicEdit-panel" unselectable="on" style="margin: 0px 2px 2px; zoom: 1; overflow: hidden;"><div style="float: left; margin-top: 2px; display: none;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -432px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -54px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -126px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -342px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -162px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -72px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -234px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -144px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -180px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -324px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin: 2px 1px 0px;"><div class=" nicEdit-selectContain" unselectable="on" style="width: 90px; height: 20px; cursor: pointer; overflow: hidden; opacity: 0.6;"><div unselectable="on" style="overflow: hidden; zoom: 1; border: 1px solid rgb(204, 204, 204); padding-left: 3px; background-color: rgb(255, 255, 255);"><div class=" nicEdit-selectControl" unselectable="on" style="overflow: hidden; float: right; height: 18px; width: 16px; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -450px 0px;"></div><div class=" nicEdit-selectTxt" unselectable="on" style="overflow: hidden; float: left; width: 66px; height: 14px; margin-top: 1px; font-family: sans-serif; text-align: center; font-size: 12px;">Font&nbsp;Size...</div></div></div></div><div unselectable="on" style="float: left; margin: 2px 1px 0px;"><div class=" nicEdit-selectContain" unselectable="on" style="width: 90px; height: 20px; cursor: pointer; overflow: hidden; opacity: 0.6;"><div unselectable="on" style="overflow: hidden; zoom: 1; border: 1px solid rgb(204, 204, 204); padding-left: 3px; background-color: rgb(255, 255, 255);"><div class=" nicEdit-selectControl" unselectable="on" style="overflow: hidden; float: right; height: 18px; width: 16px; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -450px 0px;"></div><div class=" nicEdit-selectTxt" unselectable="on" style="overflow: hidden; float: left; width: 66px; height: 14px; margin-top: 1px; font-family: sans-serif; text-align: center; font-size: 12px;">Font&nbsp;Family...</div></div></div></div><div unselectable="on" style="float: left; margin: 2px 1px 0px;"><div class=" nicEdit-selectContain" unselectable="on" style="width: 90px; height: 20px; cursor: pointer; overflow: hidden; opacity: 0.6;"><div unselectable="on" style="overflow: hidden; zoom: 1; border: 1px solid rgb(204, 204, 204); padding-left: 3px; background-color: rgb(255, 255, 255);"><div class=" nicEdit-selectControl" unselectable="on" style="overflow: hidden; float: right; height: 18px; width: 16px; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -450px 0px;"></div><div class=" nicEdit-selectTxt" unselectable="on" style="overflow: hidden; float: left; width: 66px; height: 14px; margin-top: 1px; font-family: sans-serif; text-align: center; font-size: 12px;">Font&nbsp;Format...</div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -108px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -198px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -360px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -468px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -378px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -396px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -36px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -18px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -288px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -306px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -270px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -216px 0px;"></div></div></div></div><div unselectable="on" style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" unselectable="on" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" unselectable="on" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: -90px 0px;"></div></div></div></div><div style="float: left; margin-top: 2px;"><div class=" nicEdit-buttonContain" style="width: 20px; height: 20px; opacity: 0.6;"><div class=" nicEdit-button-undefined" style="background-color: rgb(239, 239, 239); border: 1px solid rgb(239, 239, 239);"><div class=" nicEdit-button" unselectable="on" style="width: 18px; height: 18px; overflow: hidden; zoom: 1; cursor: pointer; background-image: url(&quot;http://preview.thesoftking.com/thesoftking/tramate/assets/nic-edit/nicEditorIcons.gif&quot;); background-position: 0px 0px;"></div></div></div></div></div></div></div><div style="width: 954px; border-width: 0px 1px 1px; border-top-style: initial; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: initial; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); border-left-color: rgb(204, 204, 204); border-image: initial; overflow: hidden auto;"><div class=" nicEdit-main" contenteditable="true" style="width: 946px; margin: 4px; min-height: 216px; overflow: hidden;"></div></div><textarea id="overview" name="overview" rows="10" style="width: 100%; display: none;"></textarea>
                          <p class="no-margin em"></p>
                        </div>
                      </div>
                    </div>


                   
                 
					    	</div><!-- /.col- -->

					    </fieldset>
					 
					    <h3>Room Type</h3>
					    <fieldset>

					    	<div class="col-sm-8 col-sm-offset-1">
						        <h4 class="text-headline">Hotel Room Details</h4>
						        <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
						 
						        <div class="row">
									<div class="col-sm-6">
										<div class="form-group input-field label-float">
										    <label for="firstName1">First name:</label>
										    <input type="text" id="firstName1" name="firstName1">
										    <div class="input-highlight"></div>
										</div><!-- /.form-group -->
									</div><!-- ./col- -->

									<div class="col-sm-6">
										<div class="form-group input-field label-float">   
										    <input type="text" id="lastName1" name="lastName1">
										     <label for="lastName1">Last name:</label>
										    <div class="input-highlight"></div>
										</div><!-- /.form-group -->			
									</div><!-- ./col- -->	
							    </div><!-- /.row -->

							    <div class="form-group">			
									<input name="gender1" type="radio" id="male1" class="with-gap">
									<label for="male1" class="inline">Male</label>		    
							    
									<input name="gender1" type="radio" id="female1" class="with-gap">
									<label for="female1">Female</label>				
							    </div><!-- /.form-group -->	    

							     <div class="form-group input-field">		    
								    <input type="email" name="email1" id="email1">
								    <label for="email1">Email address:</label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
					        </div><!-- /.col- -->
					    </fieldset>
					 
					    <h3>Subscription</h3>
					    <fieldset>

					    	<div class="col-sm-8 col-sm-offset-1">
					        	<h4 class="text-headline">Subscription plan</h4>
					 			<div class="lead sub-text mb40">Choose your subscription plan</div>	

						    	<div class="form-group">			    	
						    		<input id="monthly1" type="radio" name="subscriptionPlan1" class="with-gap">
								    <label for="monthly1" class="block text-subhead sub-text">Monthly  - $19.95</label>				
								
								    <input id="quaterly1" type="radio" name="subscriptionPlan1" class="with-gap">
								    <label for="quaterly1" class="block text-subhead sub-text">Quaterly  - $49.95</label>
								
								    <input id="yearly1" type="radio" name="subscriptionPlan1" class="with-gap">
								    <label for="yearly1" class="block text-subhead sub-text">Yeary  - $149.95</label>			    	
							    </div>
						    </div><!-- /.col- -->
					    </fieldset>
					 
					    <h3>Finish</h3>
					    <fieldset>
					    	<div class="col-sm-8 col-sm-offset-1">
						        <div class="text-headline">Terms and Conditions</div>
						 		
						 		<div class="form-group mt40">
					 					<input id="acceptTerms1" name="acceptTerms1" type="checkbox"> <label for="acceptTerms1" class="text-subhead sub-text">I agree with the Terms and Conditions.</label>      	
								</div><!-- /.form-group -->
							</div><!-- /.col- -->
					    </fieldset>
					</form>
                </div>

                          
            </div><!-- /.page-content -->

            <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
                <i class="mdi mdi-chevron-up medium"></i>
            </a>                
        </div><!-- /.container-fluid -->

   
       
    </section> <!-- /.content-wrapper -->
@endsection
		
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script>
	$("#dashboard_sidebar_li_id").addClass('active');
	$("#wizard1").steps({
	    headerTag: "h3",
	    bodyTag: "fieldset"
	});
</script>
@endsection