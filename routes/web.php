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
        Route::get('cliente/show/{id}', [
          'uses' => 'ClienteController@show',
          'as' => 'admin.cliente.show'
        ]);
      Route::get('cliente/view/{id}', [
          'uses' => 'ClienteController@view',
          'as' => 'admin.cliente.view'
        ]);
        Route::get('cliente/viewCC/{id}', [
          'uses' => 'ClienteController@viewCC',
          'as' => 'admin.cliente.viewCC'
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
        Route::resource('ventaContado','VentaContadoController');
        Route::get('ventaContado/create/{id}', [
                  'uses' => 'VentaContadoController@create',
                  'as' => 'admin.ventaContado.create'
                ]);
        Route::get('ventaContado/{id}/destroy',[
                  'uses' => 'VentaContadoController@destroy',
                  'as' => 'admin.ventaContado.destroy'
                ]);
        Route::get('ventaContado/show/{id}', [
                  'uses' => 'VentaContadoController@show',
                  'as' => 'admin.ventaContado.show'
                ]);
        Route::get('ventaContado/view/{id}', [
                  'uses' => 'VentaContadoController@view',
                  'as' => 'admin.ventaContado.view'
                ]);
                Route::resource('ventaCC','VentaCuentaCorrienteController');
                Route::get('ventaCC/create/{id}', [
                          'uses' => 'VentaCuentaCorrienteController@create',
                          'as' => 'admin.ventaCC.create'
                        ]);
                Route::get('ventaCC/{id}/destroy',[
                          'uses' => 'VentaCuentaCorrienteController@destroy',
                          'as' => 'admin.ventaCC.destroy'
                        ]);
                Route::get('ventaCC/show/{id}', [
                          'uses' => 'VentaCuentaCorrienteController@show',
                          'as' => 'admin.ventaCC.show'
                        ]);
                Route::get('ventaCC/view/{id}', [
                          'uses' => 'VentaCuentaCorrienteController@view',
                          'as' => 'admin.ventaCC.view'
                        ]);
                        Route::get('ventaCC/viewCC/{id}', [
                          'uses' => 'VentaCuentaCorrienteController@viewCC',
                          'as' => 'admin.ventaCC.viewCC'
                        ]);
                        Route::resource('pago','PagoController');
                        Route::get('pago/{id}/destroy',[
                            'uses' => 'PagoController@destroy',
                            'as' => 'admin.pago.destroy'
                          ]);
                          Route::get('pago/show/{id}', [
                            'uses' => 'PagoController@show',
                            'as' => 'admin.pago.show'
                          ]);
                          Route::get('pago/create/{id}', [
                            'uses' => 'PagoController@create',
                            'as' => 'admin.pago.create'
                          ]);
    });


Route::resource('states','StateController');
Route::get('provinces/{id}','StateController@getProvinces');
Route::get('locations/{id}','ProvinceController@getLocations');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
