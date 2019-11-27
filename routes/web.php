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

Route::get('get-state-list','CommonController@getStateList');
Route::get('get-cities-list','CommonController@getCitiesList');

Route::get('/new_hotel', 'HotelController@index')->name('hotel.new');

Route::post('hotel_save','HotelController@hotelSave')->name('save.newhotel');

Route::get('/ajax/menu-settings.html','HomeController@menuSettings');