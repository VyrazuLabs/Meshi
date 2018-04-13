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


Route::group( ['middleware' => ['Language'] ], function() {
	Route::group( [ 'namespace' => 'Frontend'], function() {
		//ROUTES FOR CMS PAGES
		Route::get('/', array('uses' => 'FrontendController@index'));
		Route::get('/privacy-policy', array('uses' => 'FrontendController@privacy'))->name('privacy_policy');
		Route::get('/terms', array('uses' => 'FrontendController@terms'))->name('terms');
        Route::get('/faq', array('uses' => 'FrontendController@faq'))->name('faq');
		Route::get('/shopping-cart', array('uses' => 'FrontendController@cart'))->name('shoppingCart');
		Route::get('/about-us', array('uses' => 'FrontendController@aboutUs'))->name('about_us');
		Route::get('/contact-us', array('uses' => 'FrontendController@contactUs'))->name('contact_us');
		
		//ROUTES FOR FOOD ITEM SECTION
		Route::group( ['prefix' => 'food'], function() {
			Route::group( ['namespace' => 'Food'], function() {
				Route::get('/details/{food_item_id}', 'FoodController@details')->name('food_details');
				Route::group( [ 'middleware' => 'SignInRouteAccessUser' ], function() {
					Route::get('/create', 'FoodController@create')->name('food_create');
					Route::get('/lists', 'FoodController@lists')->name('food_list');
					Route::post('/save', 'FoodController@save')->name('save_food_item_user');
				});
			});
			//ROUTES FOR FOOD CATEGORY SECTION
			Route::group( ['namespace' => 'Category'], function() {
				Route::get('/categories', array('uses' => 'CategoryController@category'))->name('food_categories');
				Route::get('/all-categories', array('uses' => 'CategoryController@allCategory'))->name('food_all_categories');
			});
		});
	});
	//ROUTES FOR FEEDBACK SECTION
	Route::group( [ 'namespace' => 'Feedback'], function() {
		Route::post('/send-feedback', array('uses' => 'FeedbackController@sendFeedback'))->name('send_feedback');
	});

});

//ROUTES FOR USER SECTION
Route::group( ['prefix' => 'user','middleware' => ['Language']], function() {

	Route::group( ['namespace' => 'User'], function() {
		Route::get('/profile/{user_id}', 'ProfileController@profile')->name('profile_details');

		//ROUTES FOR AUTHENTICATED USERS
		Route::group([ 'middleware' => 'UserAuth' ], function() {
			Route::get('/profile/edit/{user_id}', 'ProfileController@edit')->name('edit_profile_details');
		});
		// ROUTES FOR CART SECTION //
			Route::group( ['namespace' => 'Cart'], function() {
				Route::get('/cart','CartController@viewCart')->name('view_cart');
				Route::get('/empty-cart','CartController@emptyCart')->name('empty_cart');
			});
		Route::get('/register','RegistrationController@register');
		Route::post('/register','RegistrationController@save')->name('registration');
	});

	// ROUTES FOR ORDER SECTION //
	Route::group( ['namespace' => 'Order'], function() {
		Route::get('/order-details','OrderController@orderDetails')->name('order_details');
	});
});


	


/*****************************************
	ROUTES FOR PAYPAL PAYMENT GATEWAY
****************************************/
Route::group( ['prefix' => 'order','namespace' => 'Order','middleware' => ['Language']], function() {
	Route::post('/add-to-cart', 'OrderController@addToCart')->name('add_to_cart');
	Route::group( ['prefix' => 'payment'], function() {
		Route::get('/make-paypal-payment/{food_item_id}', 'PaymentController@postPaymentWithpaypal')->name('make_paypal_payment');
		Route::get('/paypal-status', 'PaymentController@getPaymentStatus')->name('paypal_status');
	});
});

