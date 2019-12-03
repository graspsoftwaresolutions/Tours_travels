<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'Auth\LoginController@custom_login');

Route::get('/home', 'HomeController@index')->name('home');

//Country Master Details 
Route::post('ajax_countries_list','AjaxController@ajax_countries_list')->name('master.ajaxcountrieslist');
Route::get('country','MasterController@countryList')->name('master.country');
Route::post('country_save','MasterController@countrySave')->name('master.savecountry');
Route::get('country-edit','MasterController@countryEdit')->name('master.editcountry');
Route::delete('country_delete/{id}','MasterController@countrydestroy')->name('master.countrydestroy');
Route::post('country_nameexists','AjaxController@checkCountryNameExists');
Route::get('country_detail','CommonController@countryDetail');

//State Details 
Route::get('state','MasterController@stateList')->name('master.state');
Route::post('ajax_state_list','AjaxController@ajax_state_list');
Route::post('state_save','MasterController@stateSave')->name('master.savestate');
Route::delete('state-delete/{id}','MasterController@statedestroy')->name('master.statedestroy');
Route::post('state_nameexists','AjaxController@checkStateNameExists');
Route::get('state_detail','CommonController@stateDetail');


//City Details 
Route::get('city','MasterController@cityList')->name('master.city');
Route::post('ajax_city_list','AjaxController@ajax_city_list');
Route::post('city_save','MasterController@citySave')->name('master.savecity');
Route::post('city_nameexists','AjaxController@checkCityNameExists');
Route::get('city_detail','CommonController@cityDetail');
Route::delete('city-delete/{id}','MasterController@citydestroy')->name('master.citydestroy');

//Amenities Details 
Route::get('/new_amenities', 'HotelController@newAmnities')->name('amenities.new');
Route::post('amenities_save','MasterController@amenitiesSave')->name('master.saveamenities');
Route::post('amenities_nameexists','AjaxController@checkAmenities_exists');
Route::get('amenities_detail','CommonController@amnenitiesDetail');
Route::delete('amenities_delete/{id}','MasterController@amenitiesdestroy')->name('master.amenitiesdestroy');

//Room TYpe Details
Route::get('/new_roomtype', 'MasterController@newRoomType')->name('roomtype.new');
Route::post('/room_type_nameexists', 'AjaxController@roomtypeNameexists');
Route::post('roomtype_save','MasterController@roomTypeSave')->name('master.saveroomtype');
Route::get('/roomtype_detail', 'CommonController@roomtypeDetail');
Route::delete('roomtype_delete/{id}','MasterController@roomtypeDestroy')->name('master.roomtypedestroy');

//Hotel Rooms
Route::get('/hotel_room', 'HotelController@newHotelRoom')->name('hotel.rooms');
Route::get('/hotel_add_room', 'HotelController@addHotelRoom')->name('hotel.addrooms');
Route::post('hotelroom_save','HotelController@hotelroomSave')->name('save.hotelroom');
Route::get('hotel_room_edit/{id}','HotelController@hotelroomEdit');
Route::get('delete_hotel_room_image','HotelController@RoomimageDelete');



Route::get('/get-roomtype-list', 'CommonController@getHotelRoomList');
Route::get('get-state-list','CommonController@getStateList');
Route::get('get-cities-list','CommonController@getCitiesList');

Route::get('/new_hotel', 'HotelController@index')->name('hotel.new');

Route::post('hotel_save','HotelController@hotelSave')->name('save.newhotel');

Route::get('hotels','HotelController@hotelList')->name('master.hotel');
Route::post('ajax_hotels_list','AjaxController@ajax_hotels_list');
Route::get('hotels-edit/{parameter}','HotelController@EditHotel')->name('master.edithotel');
Route::get('delete_hotel_image','HotelController@imageDelete')->name('hotel.imagedelete');
Route::post('hotel_room_edit','HotelController@hotelRoomsEdit')->name('edit.hotelroom');


Route::post('hotel_update','HotelController@hotelUpdate')->name('save.edithotel');

Route::get('/changePassword','HomeController@showChangePasswordForm')->name('changepassword');
Route::post('/changePassword','HomeController@ChangePassword')->name('changePassword');

//Actvity 
Route::get('activity','ActivityController@activityList')->name('master.activity');
Route::get('/new_activity', 'ActivityController@index')->name('activity.new');
Route::post('ajax_activity_list','AjaxController@ajax_activities_list');
Route::post('activity_save','ActivityController@activitySave')->name('activity.save');
Route::post('activity_edit','ActivityController@activityEdit')->name('activity.edit');
Route::get('activity-edit/{parameter}','ActivityController@EditActivity')->name('activity.editactivity');

//Enquiry

Route::get('enquiry','ActivityController@enquiryList')->name('enquiry.new');
Route::post('ajax_enquiry_list','AjaxController@ajax_enquiry_list');
Route::get('new_enquiry','ActivityController@enquiryNew')->name('enquiry.add');

Route::get('edit_enquiry/{parameter}','ActivityController@enquiryEdit')->name('enquiry.edit');

Route::post('enquiry_save','ActivityController@enquirySave')->name('enquiry_save');

Route::get('delete_activity_image','ActivityController@ActivityimageDelete');
Route::get('/ajax/menu-settings.html','HomeController@menuSettings');