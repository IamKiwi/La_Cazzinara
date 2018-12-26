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
Route::get('/pizzalist/s', 'PagesController@getSearchPizza')->name('pages.searchpizzalist');
Route::get('/register', 'PagesController@getRegister')->name('register');

Route::get('/login', 'PagesController@getLogin')->name('login');

Route::prefix('admin')->group(function ()
{
    Route::get('/login', 'Auth\AdminLoginController@getLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/', 'AdminController@getAdminPanel')->name('admin.dashboard');

    Route::get('/pizzalist', 'AdminController@getPizzaList')->name('admin.pizzalist');
    Route::get('/pizzalist/s', 'AdminController@getSearchPizza')->name('admin.searchpizzalist');
    Route::get('/addpizza', 'AdminController@getAddPizza')->name('admin.addpizza');
    Route::get('pizzaedit/{ID_Pizza}', 'AdminController@getPizzaEdit')->name('admin.pizzaedit');
    Route::post('/savepizza', 'AdminController@postSavePizza')->name('admin.savepizza');
    Route::post('/updatepizza/{id}', 'AdminController@postUpdatePizza')->name('admin.updatepizza');
    Route::get('/deletepizza/{id}', 'AdminController@getDeletePizza')->name('admin.pizzadelete');
    Route::get('/restorepizza/{id}', 'AdminController@getRestorePizza')->name('admin.pizzarestore');

    Route::get('/userlist', 'AdminController@getUserList')->name('admin.userlist');
    Route::get('/userlist/s', 'AdminController@getSearchUsers')->name('admin.searchusers');
    Route::get('useredit/{id}', 'AdminController@getUserEdit')->name('admin.useredit');
    Route::get('userdelete/{id}', 'AdminController@getDeleteUser')->name('admin.userdelete');
    Route::get('userrestore/{id}', 'AdminController@getRestoreUser')->name('admin.userrestore');
    Route::post('/userupdate/{id}', 'AdminController@postUpdateUser')->name('admin.updateuser');

    Route::get('/orderstrack', 'AdminController@getOrdersTrack')->name('admin.orderstrack');
    Route::get('/orderstrack/s', 'AdminController@getSearchOrders')->name('admin.searchorders');
    Route::get('/orderstrackdetails/{id}', 'AdminController@getOrderDetails')->name('admin.orderstrackdetails');
    Route::get('/acceptorder/{id}', 'AdminController@getAcceptOrder')->name('admin.acceptorder');
    Route::get('/rejectorder/{id}', 'AdminController@getRejectOrder')->name('admin.rejectorder');
    Route::get('/refuseorder/{id}', 'AdminController@getRefuseOrder')->name('admin.refusedorder');
    Route::get('/orderprepared/{id}', 'AdminController@getOrderPrepared')->name('admin.preparedorder');
    Route::get('/readyorder/{id}', 'AdminController@getOrderDone')->name('admin.orderisready');
    Route::get('/deleteorder/{id}', 'AdminController@getDeleteOrder')->name('admin.deleteorder');

    Route::get('finances', 'AdminController@getFinances')->name('admin.finances');

    Route::get('feedbacks', 'AdminController@getFeedbacks')->name('admin.feedbacks');
    Route::get('feedbacks/s', 'AdminController@getSearchFeedbacks')->name('admin.searchfeedbacks');
    Route::get('feedbacks/{id}', 'AdminController@getSeeFeedback')->name('admin.seefeedback');

    Route::get('stats', 'AdminController@getStats')->name('admin.stats');
});

Route::get('/home', 'ClientController@getClientPanel')->name('client.dashboard');

Route::prefix('client')->group(function()
{
    Route::get('/useredit', 'ClientController@getUserEdit')->name('client.edit');
    Route::post('/userupdate', 'ClientController@postUpdateUser')->name('client.update');
    Route::get('/userpasswordchange', 'ClientController@getPasswordChange')->name('client.passchange');
    Route::post('/dopasswordchange', 'ClientController@postPasswordChange')->name('client.dochangepassword');

    Route::get('/orderonline', 'ClientController@getPizzaList')->name('client.orderonline');
    Route::get('/orderonline/s', 'ClientController@getSearchPizza')->name('client.searchpizzalist');
    Route::post('/addtocart', 'ClientController@postAddToCart')->name('client.addtocart');
    Route::get('/clearcart', 'ClientController@getClearCart')->name('client.clearcart');
    Route::get('/cancelcart', 'ClientController@getCancelCart')->name('client.cancelcart');
    Route::get('/removefromcart/{pid}', 'ClientController@getRemoveFromCart')->name('client.removefromcart');
    Route::get('/doorder', 'ClientController@getDoOrder')->name('client.doorder');
    Route::get('/confirmorder', 'ClientController@getConfirmOrder')->name('client.confirmorder');
    Route::get('/orderconfirmed', 'ClientController@getOrderConfirmed')->name('client.ordered');

    Route::get('/ordershistory', 'ClientController@getOrdersHistory')->name('client.history');
    Route::get('/orderdetails/{id}', 'ClientController@getOrderDetails')->name('client.ordershistorydetails');

    Route::get('/sendfeedback/{id}', 'ClientController@getSendFeedback')->name('client.sendfeedback');
    Route::post('/savefeedback', 'ClientController@postSaveFeedback')->name('client.savefeedback');
    Route::get('/seefeedback/{id}', 'ClientController@getSeeFeedback')->name('client.seefeedback');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
