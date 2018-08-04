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

Route::group(['prefix' => 'admin'], function(){
    Route::resource('user','UserController');
    Route::get('user/provinces/{id}','StateController@getProvinces');
    Route::get('user/locations/{id}','ProvinceController@getLocations');
    Route::get('user/user_id/provinces/{id}','StateController@getProvinces');
    Route::get('user/user_id/locations/{id}','ProvinceController@getLocations');
    Route::get('user/{id}/destroy',[
        'uses' => 'UserController@destroy',
        'as' => 'admin.user.destroy'
      ]);
    Route::get('user/show/{id}', [
        'uses' => 'UserController@show',
        'as' => 'admin.user.show'
      ]);
    });

    Route::group(['prefix' => 'admin'], function(){
        Route::resource('cliente','ClienteController');
        Route::get('cliente/provinces/{id}','StateController@getProvinces');
        Route::get('cliente/locations/{id}','ProvinceController@getLocations');
        Route::get('cliente/cliente_id/provinces/{id}','StateController@getProvinces');
        Route::get('cliente/cliente_id/locations/{id}','ProvinceController@getLocations');
        Route::get('cliente/{id}/destroy',[
            'uses' => 'ClienteController@destroy',
            'as' => 'admin.cliente.destroy'
          ]);
        });
Route::resource('states','StateController');
Route::get('provinces/{id}','StateController@getProvinces');
Route::get('locations/{id}','ProvinceController@getLocations');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
