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
Auth::routes();

Route::get('/home', 'CategoryController@index')->name('home');

Route::get('/', 'CategoryController@index');

Route::get('/cidadesmaisvisitadas','PrincipalController@showcities');
//Route::get('/cadastro', 'RegisterController@index');

Route::resource('/cadastro','RegisterController');

//Route::get('/login','LoginController@index');

Route::get('/parceiros','CategoryRatedController@index');

Route::get('/empresas','CompanyController@show_companies_images');

Route::post('/empresas/cadastro','CompanyController@store');

Route::get('/empresas/create','CompanyController@create');

Route::resource('/editar/perfil','UserController');

//rotas para clientes

Route::get('/rotasfiltradas/{first}/{last}/{date}/{passanger}','WayController@index');

Route::get('/efetuarcompra','OrderController@create');

Route::post('/efetuarcompra/pagar','OrderController@store');

Route::get('/efetuarcompra/{way_id}/{passenger}/{date}/{order_id}','WayController@max_seats');

Route::get('/areacliente/veiculos/addpoltrona/{way_id}/{date_trip}/{seat}/{order_id}','AuxiliarclientController@createseat');

Route::get('/areacliente/comprovante/{way_id}/{date_trip}/{order_id}','AuxiliarclientController@proof_payment');

Route::get('/areacliente/perfil','AuxiliarclientController@index');

Route::get('/areacliente/minhascompras','OrderController@index');

Route::get('/areacliente/avaliaraempresa/{company_id}','QueryController@create');

Route::post('/areacliente/avaliarempresa','QueryController@store');

Route::post('/areacliente/atualizaravaliacao/{company_id}','QueryController@update');

Route::get('/areacliente/atualizaraavaliacao/{company_id}','QueryController@edit');

Route::get('/areacliente/minhasavaliacoes','QueryController@index');

//rotas para área da empresas

Route::get('/areaempresa','CompanyController@index');

Route::resource('/areaempresa/veiculos','VehicleController');

Route::get('/areaempresa/veiculos/data_viagem/{veiculo}','AuxiliarController@show');

Route::get('/areaempresa/veiculos/addpoltrona/{way_id}/{date_trip}/{seat}','AuxiliarController@createseat');

Route::resource('/areaempresa/veiculos/poltronas','NocustomerController');

Route::post('/areaempresa/veiculos/data_viagem/poltronas','AuxiliarController@searcharmchairs')->name('form-adm-armchairs');

Route::get('/areaempresa/veiculos/{date_trip}/{way_id}','AuxiliarController@searcharmchairsback');
