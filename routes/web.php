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

Route::get('/home', 'ClientController@getClientPanel')->name('client.dashboard');

Route::get('/useredit/{id}', 'ClientController@getUserEdit')->name('client.edit');
Route::post('/userupdate/{id}', 'ClientController@postUpdateUser')->name('client.update');

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
    Route::get('useredit/{id}', 'AdminController@getUserEdit')->name('admin.useredit');
    Route::get('userdelete/{id}', 'AdminController@getDeleteUser')->name('admin.userdelete');
    Route::post('/userupdate/{id}', 'AdminController@postUpdateUser')->name('admin.updateuser');

});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
