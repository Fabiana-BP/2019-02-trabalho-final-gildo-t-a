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

Route::get('/', 'CategoryController@index');

//Route::get('/cadastro', 'RegisterController@index');

Route::resource('/cadastro','RegisterController');

Route::get('/login','LoginController@index');

Route::get('/categoria/{cat_id}','CategoryRatedController@index');

Route::get('/empresas','CompanyController@show_companies_images');

Route::post('/empresas/cadastro','CompanyController@store');

Route::get('/empresas/create','CompanyController@create');


Route::get('/rotasfiltradas/{first}/{last}/{date}/{passanger}','WayController@index');

Route::get('/efetuarcompra/{way_id}/{passenger}/{date}','WayController@max_seats');

//rotas para área da empresas

Route::get('/areaempresa','CompanyController@index');

Route::resource('/areaempresa/veiculos','VehicleController');

Route::resource('/areaempresa/veiculos/poltronas','ArmchairController');

Route::get('/areaempresa/veiculos/data_viagem/{veiculo}','AuxiliarController@show');

Route::post('/areaempresa/veiculos/data_viagem/poltronas','AuxiliarController@searcharmchairs')->name('form-adm-armchairs');
