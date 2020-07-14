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

Route::get('/', function () {
    return view('welcome');
});

// LOGIN View

Route::any('signin','Signin@login');//->middleware('test');
Route::any('dashboard','Signin@dashboard');
Route::any('ProducutsInsert','Signin@ProducutsInsert');
Route::any('producut', 'Signin@producut')->name('producut');
// Register page
Route::any('signup','StudInsertController@insertform');

Route::any('registration','StudInsertController@registration');

Route::any('/logout', 'Signin@logout')->name('logout');

Route::any('shopping','ShoppingController@getProducuts');//this for shooping Page

Route::any('Buy/{id}','ShoppingController@ProductWithUserINFO');///



//Route::any('payment','instamojocontroller@instamojo');//payment gate way


Route::any('test','ShoppingController@test');
Route::any('redirect','PaymentGateWay@redirect');

Route::any('response','PaymentGateWay@responsepage');

Route::any('sucessTransacton','PaymentGateWay@sucessTransacton');

Route::any('failedTransacton','PaymentGateWay@failedTransacton');


Route::any('payment','Razorpaycontroller@paymet');
Route::any('charge','Razorpaycontroller@charge');
// new code
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add');//->middleware('auth');
Route::any('cart', 'CartController@index')->name('cart.index');
// formWithAjax()


   
Route::get('form', 'StudInsertController@formWithAjax');
Route::post('form', 'StudInsertController@jj');