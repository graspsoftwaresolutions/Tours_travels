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
//     return view('web.welcome');
// });

Auth::routes();
Route::get('/', 'PageController@homePage');
Route::get('/home', 'HomeController@index')->name('home');
//Hotel Booking frontend

Route::get('/tour-booking', 'Web\TourBookingController@tourBooking')->name('tour_booking');
Route::get('/enquiry', 'Web\EnquiryController@enquiryView')->name('enquiry');
Route::post('/Enquiry_details', 'Web\EnquiryController@enquiryEmail')->name('enquiry_email');

Route::group( [ 'prefix' => 'admin' ], function()
{
    //Password change
    Route::get('/changePassword','Admin\HomeController@showChangePasswordForm')->name('changepassword');
    Route::post('/changePassword','Admin\HomeController@ChangePassword')->name('admin_changePassword');

    //Country Master Details 
    Route::get('/country','Admin\MasterController@countryList')->name('master.country');
    Route::post('/country_save','Admin\MasterController@countrySave')->name('master.savecountry');
    Route::get('country-edit','Admin\MasterController@countryEdit')->name('master.editcountry');
    Route::delete('country_delete/{id}','Admin\MasterController@countrydestroy')->name('master.countrydestroy'); 
    Route::post('/country_nameexists','Admin\AjaxController@checkCountryNameExists')->name('country_nameexists');
    Route::get('country_detail','Admin\CommonController@countryDetail')->name('country_detail');
    Route::post('ajax_countries_list','Admin\AjaxController@ajax_countries_list')->name('master.ajaxcountrieslist');

    //State Details 
    Route::get('/state','Admin\MasterController@stateList')->name('master.state');
    Route::post('/ajax_state_list','Admin\AjaxController@ajax_state_list')->name('ajax_state_list');
    Route::post('/state_save','Admin\MasterController@stateSave')->name('master.savestate');
    Route::delete('state-delete/{id}','Admin\MasterController@statedestroy')->name('master.statedestroy');
    Route::post('/state_nameexists','Admin\AjaxController@checkStateNameExists')->name('state_nameexists');
    Route::get('/state_detail','Admin\CommonController@stateDetail')->name('state_detail');

    //City Details 
    Route::get('/city','Admin\MasterController@cityList')->name('master.city');
    Route::post('/ajax_city_list','Admin\AjaxController@ajax_city_list')->name('ajax_city_list');
    Route::post('/city_save','Admin\MasterController@citySave')->name('master.savecity');
    Route::post('/city_nameexists','Admin\AjaxController@checkCityNameExists')->name('city_nameexists');
    Route::get('/city_detail','Admin\CommonController@cityDetail')->name('city_detail');
    Route::delete('city-delete/{id}','Admin\MasterController@citydestroy')->name('master.citydestroy');

    //Old Transportation charges
    Route::get('/transporation_charges','Admin\MasterController@transporationChargesList')->name('master.transporation_charges');
    Route::get('/Add_Transportation','Admin\MasterController@addTransportation')->name('master.addTransportation');
    Route::post('/save_Transportation','Admin\MasterController@SaveTransportation')->name('add_transportation_charges');
    Route::post('/ajax_tarnsportation_list','Admin\AjaxController@ajax_tarnsportation_list')->name('ajax_tarnsportation_list');
    Route::get('/edit_Transportation/{parameter}','Admin\MasterController@EditTransportation')->name('transportCharges.edit');
    Route::post('/update_transportation_charges','Admin\MasterController@updateTransportation')->name('update_transportation_charges');

    //Transportation 
    Route::get('/transporation','Admin\MasterController@transporationList')->name('master.transportation');
    Route::get('/new_transporation','Admin\MasterController@Newtransporation')->name('master.addNewTransportation');
    Route::post('/save_NewTransportation','Admin\MasterController@SaveNewTransportation')->name('save_transportation');
    //Route::get('/edit_transporation/{id}','Admin\MasterController@editNewTransporation');

    Route::get('/appgallerycom/{parameter}','HomeController@appgallerycom')->name('appgallerycom');
    Route::get('/edit_NewTransportation/{id}','Admin\MasterController@editNewTransporation')->name('edit_transporation');
    Route::post('/Update_NewTransportation','Admin\MasterController@UpdateNewTransportation')->name('update_transportation');
    
    

    //Interest Tax
    Route::get('/interest_tax','Admin\MasterController@interestTaxList')->name('master.interest_tax'); 
    Route::post('/save_interest_tax','Admin\MasterController@saveInterestTax')->name('master.save_interest_tax');
    Route::get('/interestTax_detail','Admin\CommonController@interestTax_detail')->name('interestTax_detail');
    Route::delete('interest_Taxdestroy/{id}','Admin\MasterController@interestTaxdestroy')->name('master.interestTaxdestroy'); 
    


    //Amenities Details 
    Route::get('/new_amenities', 'Admin\HotelController@newAmnities')->name('amenities.new');
    Route::post('amenities_save','Admin\MasterController@amenitiesSave')->name('master.saveamenities');
    Route::post('amenities_nameexists','Admin\AjaxController@checkAmenities_exists')->name('amenities_nameexists');
    Route::get('amenities_detail','Admin\CommonController@amnenitiesDetail')->name('amenities_detail');
    Route::delete('amenities_delete/{id}','Admin\MasterController@amenitiesdestroy')->name('master.amenitiesdestroy');

    //Room TYpe Details
    Route::get('/new_roomtype', 'Admin\MasterController@newRoomType')->name('roomtype.new');
    Route::post('/room_type_nameexists', 'Admin\AjaxController@roomtypeNameexists')->name('room_type_nameexists');
    Route::post('roomtype_save','Admin\MasterController@roomTypeSave')->name('master.saveroomtype');
    Route::get('/roomtype_detail', 'Admin\CommonController@roomtypeDetail')->name('roomtype_detail');
    Route::delete('roomtype_delete/{id}','Admin\MasterController@roomtypeDestroy')->name('master.roomtypedestroy');
   

    //Hotel Details
    Route::get('/hotels','Admin\HotelController@hotelList')->name('master.hotel');
    Route::post('/ajax_hotels_list','Admin\AjaxController@ajax_hotels_list')->name('ajax_hotels_list');
    Route::get('/new_hotel', 'Admin\HotelController@index')->name('hotel.new');
    Route::post('hotel_save','Admin\HotelController@hotelSave')->name('save.newhotel');
    Route::get('hotels-edit/{parameter}','Admin\HotelController@EditHotel')->name('master.edithotel');
    Route::post('hotel_update','Admin\HotelController@hotelUpdate')->name('save.edithotel');
    Route::get('/delete_hotel_image','Admin\HotelController@imageDelete')->name('delete_hotel_image');
    Route::get('delete-roomtype-data','Admin\HotelController@deleteRoomtype')->name('delete-roomtype-data');
    //Route::get('/delete_hotel_image','HotelController@imageDelete')->name('hotel.imagedelete');

    //Hotel Rooms
    Route::get('/hotel_room', 'Admin\HotelController@newHotelRoom')->name('hotel.rooms');
    Route::get('/hotel_add_room', 'Admin\HotelController@addHotelRoom')->name('hotel.addrooms');
    Route::post('hotelroom_save','Admin\HotelController@hotelroomSave')->name('save.hotelroom');
    Route::get('/hotel_room_edit/{id}','Admin\HotelController@hotelroomEdit')->name('hotel_room_edit');
    Route::post('hotel_room_edit','Admin\HotelController@hotelRoomsEdit')->name('edit.hotelrooms');
    Route::get('delete_hotel_room_image','Admin\HotelController@RoomimageDelete')->name('delete_hotel_room_image');

    //Actvity 
    Route::get('activity','Admin\ActivityController@activityList')->name('master.activity');
    Route::get('/new_activity', 'Admin\ActivityController@index')->name('activity.new');
    Route::post('ajax_activity_list','Admin\AjaxController@ajax_activities_list')->name('ajax_activity_list');
    Route::post('activity_save','Admin\ActivityController@activitySave')->name('activity.save');
    Route::post('activity_edit','Admin\ActivityController@activityEdit')->name('activity.edit');
    Route::get('activity-edit/{parameter}','Admin\ActivityController@EditActivity')->name('activity.editactivity');
    Route::get('delete_inclusion','Admin\ActivityController@deleteInclusion')->name('delete_inclusion');
    Route::get('delete_exclusion','Admin\ActivityController@deleteExclusion')->name('delete_exclusion');
    Route::get('delete_activity_image','Admin\ActivityController@ActivityimageDelete')->name('delete_activity_image');


    //Package
    Route::get('/new_package', 'Admin\PackageController@index')->name('package.new');
    Route::post('/package_save', 'Admin\PackageController@packageSave')->name('package_save');
    Route::post('package_autocomplete','Admin\CommonController@packageAutocomplete')->name('package_autocomplete');

    Route::get('/packages', 'Admin\PackageController@List')->name('package.list');
    Route::post('/ajax_package_list','Admin\PackageController@ajax_package_list')->name('ajax_package_list');
    Route::get('/package-edit/{parameter}','Admin\PackageController@EditPackage')->name('package.edit');
    Route::get('/delete_package_activity','Admin\PackageController@DeleteActivity')->name('delete_package_activity');
    Route::post('/package_update', 'Admin\PackageController@packageUpdate')->name('package_update');
    Route::get('package_pdf/{parameter}','Admin\PdfController@packageView')->name('package.pdf');
    Route::get('custom_package_pdf/{parameter}','Admin\PackageController@customPdf')->name('custom.package.pdf');

    
    Route::get('/city_hotels','Admin\PackageController@HotelsList')->name('city_hotels');
    Route::get('city_activities','Admin\PackageController@ActivitiesList')->name('city_activities');
    Route::get('/city_hotels_details','Admin\PackageController@HotelDetails')->name('city_hotels_details');

    Route::get('city_activity_details','Admin\PackageController@ActivityDetails')->name('city_activity_details');
    
    Route::post('package_change_status','Admin\PackageController@changeStatus')->name('package.ChangeStatus');
    
    //Package TYpe
    Route::get('/packagetype_list', 'Admin\MasterController@packageTypeList')->name('packagetype.list');
    Route::post('packagetype_exists','Admin\AjaxController@checkpackageType_exists')->name('packagetype_exists');
    Route::post('packagetype_save','Admin\MasterController@packageTypeSave')->name('master.savepackagetype');
    Route::get('/packagetype_detail', 'Admin\CommonController@getPackageDetails')->name('packagetype_detail');
    Route::delete('packagetype_delete/{id}','Admin\MasterController@packageTypeDestroy')->name('master.packageTypedestroy');

    //Booking
    Route::get('/bookings', 'Admin\BookingController@List')->name('booking.list');
    Route::get('/new_booking', 'Admin\BookingController@index')->name('booking.new');
    Route::post('/booking_save', 'Admin\BookingController@bookingSave')->name('booking_save');
    Route::post('customer_autocomplete','Admin\CommonController@customerAutocomplete')->name('customer_autocomplete');
    
    Route::get('/booking_list', 'Admin\BookingController@bookingList')->name('bookings.list');
    Route::post('ajax_booking_list','Admin\AjaxController@ajax_booking_list')->name('ajax_booking_list');
    Route::get('booking_pdf/{parameter}','Admin\PdfController@BookingView')->name('booking.pdf');

    Route::get('package_place_details','Admin\PackageController@packagePlaceDetails')->name('package_place_details');
    Route::get('/get-hotel-list', 'Admin\PackageController@PackageHotels')->name('get-hotel-list');
    Route::get('/get-activity-list', 'Admin\PackageController@PackageActivities')->name('get-activity-list');
    Route::get('/get-activity-cost', 'Admin\PackageController@ActivityCost')->name('get-activity-cost');

    //Customer
    Route::get('customer','Admin\CustomerController@customerList')->name('customer.new');
    Route::post('ajax_customer_list','Admin\AjaxController@ajax_customer_list')->name('ajax_customer_list');
    Route::get('customer_new','Admin\CustomerController@customerNew')->name('customer.add');
    Route::post('customer_save','Admin\CustomerController@customerSave')->name('customer_save');
    Route::get('edit_customer/{parameter}','Admin\CustomerController@customerEdit')->name('customer.edit');

    //Enquiry
    Route::get('enquiry','Admin\ActivityController@enquiryList')->name('enquiry.new');
    Route::post('ajax_enquiry_list','Admin\AjaxController@ajax_enquiry_list')->name('ajax_enquiry_list');
    Route::get('new_enquiry','Admin\ActivityController@enquiryNew')->name('enquiry.add');
    Route::get('edit_enquiry/{parameter}','Admin\ActivityController@enquiryEdit')->name('enquiry.edit');
    Route::post('enquiry_save','Admin\ActivityController@enquirySave')->name('enquiry_save');
    
    Route::post('enquiry_send_quotation','Admin\ActivityController@enquiryQuotation')->name('enquiry_send_quotation');

    //Tax
    Route::get('/tax','Admin\SettingsController@taxSettings')->name('tax.new');
    Route::post('/tax_save','Admin\SettingsController@taxSave')->name('tax_save');

    //Website
    Route::get('website','Admin\SettingsController@websiteSettings')->name('website.new');
    Route::post('website_save','Admin\SettingsController@websiteSave')->name('website_save');
    Route::get('/booking-edit/{parameter}','Admin\BookingController@EditBooking')->name('booking.edit');

    //Currency 
    Route::get('/currency','Admin\SettingsController@currencySettings')->name('currency.new');
    Route::post('/currency_save','Admin\SettingsController@currencySave')->name('currency_save');

    Route::get('/delete_booking_activity','Admin\BookingController@DeleteActivity')->name('delete_booking_activity');
    Route::post('/booking_update', 'Admin\BookingController@bookingUpdate')->name('booking_update');
    Route::get('/packages_customized', 'Admin\PackageController@CustomizedList')->name('package.customized');
    Route::post('/ajax_cust_package_list','Admin\PackageController@ajax_cust_package_list')->name('ajax_cust_package_list');

    Route::get('/get_state_taxrate', 'Admin\PackageController@getTaxRate')->name('get_state_taxrate');
});

Route::get('/get-roomtype-list', 'CommonController@getHotelRoomList');
Route::get('get-state-list','CommonController@getStateList');
Route::get('get-cities-list','CommonController@getCitiesList');

Route::post('customer_emailexists','CommonController@getCustomeremailexists');
Route::get('/ajax/menu-settings.html','HomeController@menuSettings');

Route::get('/hotel_detail', 'CommonController@hotelDetail')->name('hotel_detail');
Route::post('/customer_phoneexists', 'CommonController@customerPhoneExists');

//testing
Route::get('/image_validation', 'FileController@imageValidation');
Route::post('filesave', 'FileController@save');  
Route::get('/new_autocomplete', 'Admin\BookingController@auto');
Route::get('/loader', 'FileController@loader');

Route::prefix('admin')->group(function() {
   Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
   Route::get('/home', 'Auth\AdminController@index')->name('admin.dashboard');
   Route::get('/', 'Auth\AdminLoginController@showLoginForm');
 });

Route::get('/package-details/{parameter}','Web\PackageController@ViewPackage')->name('package.details');
Route::get('/packages','Web\PackageController@PackagesList')->name('packages');

//
Route::get('/created_itineray','Web\PackageController@createdItineray')->name('itineray_created');

Route::post('/direct_booking','Web\TourBookingController@bookingSave')->name('direct_booking');
Route::get('/add_package','Web\PackageController@AddPackage')->name('add_package');

Route::get('/city_hotels','Web\PackageController@HotelsList')->name('web.city_hotels');
Route::get('city_activities','Web\PackageController@ActivitiesList')->name('web.city_activities');
Route::get('/city_hotels_details','Web\PackageController@HotelDetails')->name('web.city_hotels_details');
Route::get('city_activity_details','Web\PackageController@ActivityDetails')->name('web.city_activity_details');
Route::post('/package_save', 'Web\PackageController@packageSave')->name('web.package_save');
Route::put('package_search','Web\PackageController@packageSearch')->name('package_search');

Route::get('package_search','Web\PackageController@packageSearch')->name('package_search');
Route::post('fromcountry_autocomplete','CommonController@FromCounrtyAutocomplete')->name('fromcountry_autocomplete');


