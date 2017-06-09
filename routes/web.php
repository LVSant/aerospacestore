<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//Route::controller('Auth\LoginController');
//Route::get('/logginout', 'Auth\LoginController@logout');
//Route::match(['get', 'post'], '/logout', 'Auth\LoginController@showLogoutForm');


//Route::get('/aeronaves', 'AeronavesController@lista');
//Route::get('/aeronaves/{id}', 'AeronavesController@busca')->where('id', '[0-9]+');



// Index Routes
Route::get('/', ['as' => 'home', 'uses' => function(){return view('layout.ofertas');}]);
Route::get('/home', ['as' => 'home', 'uses' => function(){return view('layout.ofertas');}]);


// Aeronaves Routes
Route::get('/aeronaves', ['as' => 'aeronave', 'uses' => 'AeronavesController@lista']);
Route::get('/aeronaves/{id}', ['as' => 'aeronaves', 'uses' => 'AeronavesController@busca'])->where('id', '[0-9]+');
Route::get('/aeronaves/busca', ['as' => 'busca', 'uses' => 'AeronavesController@lista']);
Route::get('/aeronaves/limparbusca', ['as' => 'limparbusca', 'uses' => 'AeronavesController@limpaFiltro']);
Route::get('/aeronaves/limparbuscame', ['as' => 'limparbuscame', 'uses' => 'AeronavesController@limpaFiltroByMe']);
Route::post('/aeronaves/adiciona', ['as' => 'adiciona', 'uses' => 'AeronavesController@adiciona'])->middleware('auth');;
Route::get('/aeronaves/novo', ['as' => 'novo', 'uses' => 'AeronavesController@showNovoAeronaveForm'])->middleware('auth');
Route::get('/aeronaves/compra/{id}', ['as' => 'compra', 'uses' => 'AeronavesController@showNovoAeronaveForm'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/aeronaves/addbyme', ['as' => 'addbyme', 'uses' => 'AeronavesController@showMinhasAeronavesForm'])->middleware('auth');
Route::get('/aeronaves/edit/{id}', ['as' => 'aeronaveedit', 'uses' => 'AeronavesController@showAeronavesEditForm'])->where('id', '[0-9]+')->middleware('auth');
Route::POST('/aeronaves/update', ['as' => 'aeronaveupdate', 'uses' => 'AeronavesController@update'])->middleware('auth');
Route::get('/aeronaves/compra/{id}', ['as' => 'aeronavebuy', 'uses' => 'CompraController@showAeronavesCompraForm'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/aeronaves/compra/{id}/confirma', ['as' => 'aeronavebuyconfirm', 'uses' => 'CompraController@compra'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/aeronaves/pendent', ['as' => 'aeronavependent', 'uses' => 'CompraController@listaCompras'])->middleware('auth');
Route::get('/aeronaves/compra/{id}/confirmacompra', ['as' => 'aeronavebuyconfirm', 'uses' => 'CompraController@confirmacompra'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/aeronaves/compra/{id}/cancelacompra', ['as' => 'aeronavebuyconfirm', 'uses' => 'CompraController@cancelacompra'])->where('id', '[0-9]+')->middleware('auth');

Route::get('/aeronaves/mybuys', ['as' => 'aeronavemybuys', 'uses' => 'CompraController@minhascompras'])->middleware('auth');




// User Routes
Route::get('user/edit', ['as' => 'edituser', 'uses' => 'EditUserController@showEditUserForm'])->middleware('auth');

Route::POST('updateuser', ['as' => 'updateuser', 'uses' => 'EditUserController@updateuser'])->middleware('auth');

// Login Routes
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);

// Register Routes
Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::get('registerdealer', ['as' => 'auth.registerdealer', 'uses' => 'Auth\RegisterController@showDealerRegistrationForm']);
Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\ForgotPasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\ForgotPasswordController@reset']);