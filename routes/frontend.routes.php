<?php
/*
|--------------------------------------------------------------------------
| Web Routes for Frontend Section Only
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group( [ 'namespace' => 'Auth' ], function() {
	Route::get('/sign-in', array('uses' => 'SigninController@signIn', 'middleware' => 'SignInRouteAccess'))->name('sign_in');
	Route::post('/authentication', array('uses' => 'SigninController@authentication'))->name('authentication');
	Route::get('sign-out', [ 'uses' => 'SigninController@signOut' ])->name('user_sign_out');

});


Route::group( [ 'namespace' => 'Frontend' ], function() {
	Route::get('/', array('uses' => 'FrontendController@index'));
	
	Route::group( ['prefix' => 'food'], function() {
		Route::group( ['namespace' => 'Food'], function() {
			Route::get('/details/{food_item_id}', 'FoodController@details')->name('food_details');
		});

		Route::group( ['namespace' => 'Category'], function() {
			Route::get('/categories', array('uses' => 'CategoryController@category'));
			Route::get('/all-categories', array('uses' => 'CategoryController@allCategory'));
		});
	});
});

//ROUTES FOR AUTHENTICATED USERS
// Route::group([ 'middleware' => 'auth' ], function() {
	// Route::group([ 'middleware' => 'UserAuth' ], function() {
		Route::group( ['prefix' => 'user','namespace' => 'User'], function() {
			Route::get('/profile/{user_id}', 'ProfileController@profile')->name('profile_details');
			Route::get('/register','RegistrationController@register');
			Route::post('/register','RegistrationController@save')->name('registration');
		});
	// });
// });





/*****************************************
	ROUTES FOR STRIPE PAYMENT GATEWAY
****************************************/
Route::group( ['prefix' => 'order','namespace' => 'Order'], function() {
	Route::post('/add-to-cart', 'OrderController@addToCart')->name('add_to_cart');
	// Route::get('/make-order/{food_item_id}', 'OrderController@makeOrder')->name('make_order');
	// Route::get('/make-order/{food_item_id}', 'OrderController@makeOrderWithPaypal')->name('make_order');
	Route::group( ['prefix' => 'payment'], function() {
		// Route::post('/make-payment', 'PaymentController@makePayment')->name('make_payment');
		Route::get('/make-paypal-payment/{food_item_id}', 'PaymentController@postPaymentWithpaypal')->name('make_paypal_payment');
		Route::get('/paypal-status', 'PaymentController@getPaymentStatus')->name('paypal_status');


	});
});

