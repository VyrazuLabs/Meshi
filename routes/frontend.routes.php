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
Route::group( [ 'namespace' => 'Auth','middleware' => ['Language'] ], function() {
	Route::get('/sign-in', array('uses' => 'SigninController@signIn', 'middleware' => 'SignInRouteAccess'))->name('sign_in');
	Route::post('/authentication', array('uses' => 'SigninController@authentication'))->name('authentication');
	Route::get('sign-out', [ 'uses' => 'SigninController@signOut' ])->name('user_sign_out');
	Route::get('/forget-password', [ 'uses' => 'SigninController@forgetPassword' ])->name('user_forget_password');
	Route::post('/forget-password', [ 'uses' => 'SigninController@sendMail' ])->name('user_send_mail');
	Route::get('/password/changing/{id}/{email}','SigninController@changeForgetPassword');
	Route::post('/password/changing','SigninController@updateForgetPassword');

});

Route::group( ['namespace' => 'Language'], function() {
	Route::post('/language-chooser','LanguageController@changeLanguage');
	Route::get('/language/', [
		'before' => 'csrf',
		'as' => 'language-chooser',
		'uses' => 'LanguageController@changeLanguage',
	]);
});


Route::group( [ 'namespace' => 'Frontend', 'middleware' => ['Language'] ], function() {
	Route::get('/', array('uses' => 'FrontendController@index'));
	Route::get('/privacy-policy', array('uses' => 'FrontendController@privacy'))->name('privacy_policy');
	Route::get('/terms', array('uses' => 'FrontendController@terms'))->name('terms');
	Route::get('/shopping cart', array('uses' => 'FrontendController@cart'))->name('shoppingCart');
	

	
	Route::group( ['prefix' => 'food'], function() {
		Route::group( ['namespace' => 'Food'], function() {
			Route::get('/details/{food_item_id}', 'FoodController@details')->name('food_details');
			Route::group( [ 'middleware' => 'SignInRouteAccessUser' ], function() {
				Route::get('/create', 'FoodController@create')->name('food_create');
				Route::post('/save', 'FoodController@save')->name('save_food_item_user');
			});
		});

		Route::group( ['namespace' => 'Category'], function() {
			Route::get('/categories', array('uses' => 'CategoryController@category'))->name('food_categories');
			Route::get('/all-categories', array('uses' => 'CategoryController@allCategory'))->name('food_all_categories');
		});
	});
});

//ROUTES FOR AUTHENTICATED USERS
// Route::group([ 'middleware' => 'auth' ], function() {
	// Route::group([ 'middleware' => 'UserAuth' ], function() {
		Route::group( ['prefix' => 'user','namespace' => 'User','middleware' => ['Language']], function() {
			Route::get('/profile/{user_id}', 'ProfileController@profile')->name('profile_details');
			Route::group([ 'middleware' => 'UserAuth' ], function() {
				Route::get('/profile/edit/{user_id}', 'ProfileController@edit')->name('edit_profile_details');
			});
			Route::get('/register','RegistrationController@register');
			Route::post('/register','RegistrationController@save')->name('registration');
		});
	// });
// });





/*****************************************
	ROUTES FOR STRIPE PAYMENT GATEWAY
****************************************/
Route::group( ['prefix' => 'order','namespace' => 'Order','middleware' => ['Language']], function() {
	Route::post('/add-to-cart', 'OrderController@addToCart')->name('add_to_cart');
	// Route::get('/make-order/{food_item_id}', 'OrderController@makeOrder')->name('make_order');
	// Route::get('/make-order/{food_item_id}', 'OrderController@makeOrderWithPaypal')->name('make_order');
	Route::group( ['prefix' => 'payment'], function() {
		// Route::post('/make-payment', 'PaymentController@makePayment')->name('make_payment');
		Route::get('/make-paypal-payment/{food_item_id}', 'PaymentController@postPaymentWithpaypal')->name('make_paypal_payment');
		Route::get('/paypal-status', 'PaymentController@getPaymentStatus')->name('paypal_status');


	});
});

