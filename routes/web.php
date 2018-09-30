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
    Route::get('user/view/{id}', [
        'uses' => 'UserController@view',
        'as' => 'admin.user.view'
      ]);

      Route::resource('cliente','ClienteController');
      Route::get('cliente/provinces/{id}','StateController@getProvinces');
      Route::get('cliente/locations/{id}','ProvinceController@getLocations');
      Route::get('cliente/cliente_id/provinces/{id}','StateController@getProvinces');
      Route::get('cliente/cliente_id/locations/{id}','ProvinceController@getLocations');
      Route::get('cliente/{id}/destroy',[
          'uses' => 'ClienteController@destroy',
          'as' => 'admin.cliente.destroy'
        ]);
    Route::resource('liquidacion','LiquidacionController');
    Route::get('liquidacion/create/{id}', [
        'uses' => 'LiquidacionController@create',
        'as' => 'admin.liquidacion.create'
      ]);
      Route::get('liquidacion/{id}/destroy',[
        'uses' => 'LiquidacionController@destroy',
        'as' => 'admin.liquidacion.destroy'
      ]);
      Route::resource('proveedor','ProveedorController');
      Route::get('proveedor/provinces/{id}','StateController@getProvinces');
      Route::get('proveedor/locations/{id}','ProvinceController@getLocations');
      Route::get('proveedor/proveedor_id/provinces/{id}','StateController@getProvinces');
      Route::get('proveedor/proveedor_id/locations/{id}','ProvinceController@getLocations');
      Route::get('proveedor/{id}/destroy',[
          'uses' => 'ProveedorController@destroy',
          'as' => 'admin.proveedor.destroy'
        ]);
        Route::get('proveedor/show/{id}', [
            'uses' => 'ProveedorController@show',
            'as' => 'admin.proveedor.show'
          ]);
        Route::get('proveedor/view/{id}', [
            'uses' => 'ProveedorController@view',
            'as' => 'admin.proveedor.view'
          ]);
        Route::resource('compra','CompraController');
        Route::get('compra/create/{id}', [
              'uses' => 'CompraController@create',
              'as' => 'admin.compra.create'
          ]);
        Route::get('compra/{id}/destroy',[
              'uses' => 'CompraController@destroy',
              'as' => 'admin.compra.destroy'
          ]);
          Route::resource('producto','ProductoController');
          Route::get('producto/create/{id}', [
              'uses' => 'ProductoController@create',
              'as' => 'admin.producto.create'
            ]);
            Route::get('Producto/{id}/destroy',[
              'uses' => 'ProductoController@destroy',
              'as' => 'admin.producto.destroy'
            ]);
    });


Route::resource('states','StateController');
Route::get('provinces/{id}','StateController@getProvinces');
Route::get('locations/{id}','ProvinceController@getLocations');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
