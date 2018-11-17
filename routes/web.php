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

Route::get('/', 'PagesController@getIndex');
Route::get('/pizzalist', 'PagesController@getPizzaList')->name('pages.pizzalist');
Route::get('/register', 'PagesController@getRegister')->name('register');

Route::get('/home', 'ClientController@getClientPanel')->name('client.panel');

Route::get('/login', 'PagesController@getLogin')->name('login');

Route::prefix('admin')->group(function ()
{
    Route::get('/login', 'Auth\AdminLoginController@getLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/', 'AdminController@getAdminPanel')->name('admin.dashboard');

    Route::get('/pizzalist', 'AdminController@getPizzaList')->name('admin.pizzalist');
    Route::get('/addpizza', 'AdminController@getAddPizza')->name('admin.addpizza');
    Route::get('pizzaedit/{ID_Pizza}', 'AdminController@getPizzaEdit')->name('admin.pizzaedit');
    Route::post('/savepizza', 'AdminController@postSavePizza')->name('admin.savepizza');
    Route::post('/updatepizza/{id}', 'AdminController@postUpdatePizza')->name('admin.updatepizza');
    Route::get('/deletepizza/{id}', 'AdminController@getDeletePizza')->name('admin.pizzadelete');

    Route::get('/userlist', 'AdminController@getUserList')->name('admin.userlist');
    Route::get('useredit/{ID_User}', 'AdminController@getUserEdit')->name('admin.useredit');

});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
