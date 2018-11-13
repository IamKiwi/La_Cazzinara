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

Route::get('/', 'PagesController@getIndex');
Route::get('/login', 'PagesController@getLogin');
Route::get('/register', 'PagesController@getRegister');
Route::get('/pizzalist', 'PagesController@getPizzaList')->name('pages.pizzalist');

Route::get('/admin', 'AdminController@getAdminPanel');
Route::get('/adminpizzalist', 'AdminController@getPizzaList')->name('admin.pizzalist');
Route::get('pizzaedit/{ID_Pizza}', 'AdminController@getPizzaEdit')->name('admin.pizzaedit');
Route::get('/userlist', 'AdminController@getUserList')->name('admin.userlist');
Route::get('useredit/{ID_User}', 'AdminController@getUserEdit')->name('admin.useredit');

Route::get('client/{ID_User}', 'ClientController@getClientPanel')->name('client.panel');

Route::get('/debug', 'PagesController@getGodMode');