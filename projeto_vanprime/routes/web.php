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

//Route::get('/sendemail','appController@enviarEmail');
Route::get('/home', 'CategoryController@index')->name('home');

Route::get('/', 'CategoryController@index');

Route::get('/autenticarcodigo', 'PrincipalController@autenticarcodigo');

Route::post('/verificacodigo', 'PrincipalController@verificacodigo');

Route::post('/carregadestinos','CategoryController@destination');

Route::get('/cidadesmaisvisitadas','PrincipalController@showcities');

Route::get('/sejanossoparceiro','PrincipalController@bepartner');

Route::get('/institucional','PrincipalController@whoweare');

Route::resource('/cadastro','RegisterController');

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

Route::patch('/areacliente/atualizaravaliacao/{query_id}','QueryController@update');

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

Route::get('/areaempresa/rotas/definirrota/{vehicle_id}','WayController@create');

Route::post('/areaempresa/rotas/definirarota/{way_id}','WayController@store');

Route::get('/areaempresa/rotas/editrota/{way_id}','WayController@edit');

Route::patch('/areaempresa/rotas/atualizarrota/{way_id}','WayController@update');

Route::delete('/areaempresa/rotas/deletarrota/{way_id}','WayController@destroy')->name('form_delete');

Route::get('/areaempresa/rotas/desejadeletarrota/{way_id}','WayController@willdestroy');

Route::get('/areaempresa/rotas/{vehicle_id}','WayController@showroutes');

Route::get('/areaempresa/visualizarperfil/{company_id}','CompanyController@show');

Route::get('/areaempresa/editarperfil/{company_id}','CompanyController@edit');

Route::patch('/areaempresa/atualizarperfil/{company_id}','CompanyController@update');

Route::get('/areaempresa/relatorios','QueryController@index');

Route::get('/areaempresa/relatorios/avaliacoes','QueryController@index');

Route::get('/areaempresa/relatorios/vendas','AuxiliarController@totalvendas');
