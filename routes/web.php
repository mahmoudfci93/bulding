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



Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', 'Auth\LoginController@logout');
/////////////////////
/// Admin Routes  ///
////////////////////
Route::group(['prefix'=>'admin-panel','middleware'=>['web','admin']],function (){

    ////////// DataTables Routes///////////////////////
    Route::get('/users/data',['as'=>'admin-panel.users.data','uses'=>'AdminUsersController@anyData']);
    Route::get('/buildings/data',['as'=>'admin-panel.buildings.data','uses'=>'BuildingController@anyData']);
    Route::get('/contact/data',['as'=>'admin-panel.contact.data','uses'=>'ContactController@anyData']);

    ////////// Admin Routes///////////////////////
    Route::get('/','AdminController@index');
    Route::resource('/users','AdminUsersController');

    ///// site Settings Routes//////////
    Route::get('/siteSettings','SiteSettingController@index')->name('siteSetting.index');
    Route::post('/siteSettings','SiteSettingController@store')->name('siteSetting.store');

    /////// buildings Routes//////////////
    Route::resource('/buildings','BuildingController');
    Route::get('/buildings/{id}/delete','BuildingController@destroy');

    /////// Contacts Routes//////////////
    Route::resource('/contact','ContactController');
    Route::get('/contact/{id}/delete','ContactController@destroy');


});




Auth::routes();
////////// USERS ROUTES ///////////////

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ShowAllBuildings','BuildingController@showAllEnabled');
Route::get('/ForRent','BuildingController@ForRent');
Route::get('/ForBuy','BuildingController@ForBuy');
Route::get('/type/{id}','BuildingController@type');
Route::get('/search','BuildingController@search');
Route::get('/singleBuilding/{id}','BuildingController@showSingleBuilding');
Route::get('/ajax/bu/information','BuildingController@getAjaxInfo');
Route::get('/contact','HomeController@contact');
Route::post('/contact','ContactController@store');

Route::get('/user/create/building','BuildingController@userAddBuilding');
Route::post('/user/create/building','BuildingController@userStoreBuilding');
Route::get('/user/show/building','BuildingController@userShowBuilding')->middleware('auth');
Route::get('/user/edit/user','AdminUsersController@editUserProfile')->middleware('auth');
Route::patch('/user/edit/user','AdminUsersController@updateUserProfile')->name('update.userProfile')->middleware('auth');




