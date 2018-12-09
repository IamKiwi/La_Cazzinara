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
Route::get('/pizzalists', 'PagesController@getSearchPizza')->name('pages.searchpizzalist');
Route::get('/register', 'PagesController@getRegister')->name('register');

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

    Route::get('/orderstrack', 'AdminController@getOrdersTrack')->name('admin.orderstrack');
    Route::get('/orderstrackdetails/{id}', 'AdminController@getOrderDetails')->name('admin.orderstrackdetails');
    Route::get('/acceptorder/{id}', 'AdminController@getAcceptOrder')->name('admin.acceptorder');
    Route::get('/rejectorder/{id}', 'AdminController@getRejectOrder')->name('admin.rejectorder');
    Route::get('/refuseorder/{id}', 'AdminController@getRefuseOrder')->name('admin.refusedorder');
    Route::get('/orderprepared/{id}', 'AdminController@getOrderPrepared')->name('admin.preparedorder');
    Route::get('/readyorder/{id}', 'AdminController@getOrderDone')->name('admin.orderisready');
    Route::get('/deleteorder/{id}', 'AdminController@getDeleteOrder')->name('admin.deleteorder');

});

Route::prefix('client')->group(function()
{
    Route::get('/home', 'ClientController@getClientPanel')->name('client.dashboard');
    Route::get('/useredit/{id}', 'ClientController@getUserEdit')->name('client.edit');
    Route::post('/userupdate/{id}', 'ClientController@postUpdateUser')->name('client.update');
    Route::get('/orderonline', 'ClientController@getPizzaList')->name('client.orderonline');
    Route::post('/addtocart', 'ClientController@postAddToCart')->name('client.addtocart');
    Route::get('/clearcart', 'ClientController@getClearCart')->name('client.clearcart');
    Route::get('/cancelcart', 'ClientController@getCancelCart')->name('client.cancelcart');
    Route::get('/removefromcart/{pid}', 'ClientController@getRemoveFromCart')->name('client.removefromcart');
    Route::get('/doorder', 'ClientController@getDoOrder')->name('client.doorder');
    Route::get('/confirmorder', 'ClientController@getConfirmOrder')->name('client.confirmorder');
    Route::get('/orderconfirmed', 'ClientController@getOrderConfirmed')->name('client.ordered');
    Route::get('/ordershistory', 'ClientController@getOrdersHistory')->name('client.history');
    Route::get('/orderdetails/{id}', 'ClientController@getOrderDetails')->name('client.ordershistorydetails');

});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
