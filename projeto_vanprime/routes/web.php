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

Route::get('/cadastro', 'RegisterController@index');

Route::get('/login','LoginController@index');

Route::get('/categoria/{cat_id}','CategoryRatedController@index');

Route::get('/empresas','CompanyController@show_companies_images');

Route::get('/rotasfiltradas/{first}/{last}/{date}/{passanger}','WayController@index');

Route::get('/efetuarcompra/{way_id}/{passenger}/{date}','WayController@max_seats');
