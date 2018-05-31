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

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * @author Ankita Deb
 **/

/**
 * require the frontend routes
 * the file contain only the web routes for the frontend pages
 **/
require_once 'frontend.routes.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', ['uses' => 'HomeController@logout'])->name('sign_out');

Route::get('/register', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['UserAuth', 'AdminAuth']], function () {
        Route::group(['namespace' => 'Admin'], function () {

            Route::get('/dashboard', 'DashboardController@dashboard')->name('admin_dashboard');
            Route::get('/edit-profile', 'AdminProfileController@edit')->name('edit_admin');
            Route::post('/update-profile', 'AdminProfileController@update')->name('update_admin');
            Route::get('/create', 'AdminRegistrationController@create')->name('create_admin');
            Route::post('/save-admin', 'AdminRegistrationController@save')->name('save_admin');
            Route::get('/list', 'AdminRegistrationController@lists')->name('list_admin');
            Route::get('/edit/{user_id}', 'AdminRegistrationController@edit')->name('edit_admin_user');

            Route::group(['prefix' => 'user'], function () {
                Route::get('/create', 'UserRegistrationController@create')->name('create_user');
                Route::post('/save', 'UserRegistrationController@save')->name('save_user');
                Route::get('/list', 'UserRegistrationController@lists')->name('list_user');
                Route::get('/edit/{user_id}', 'UserRegistrationController@edit')->name('edit_user');
                Route::get('/delete/{user_id}', 'UserRegistrationController@delete')->name('delete_user');

            });
            Route::group(['prefix' => 'category'], function () {
                Route::get('/create', 'CategoryController@create')->name('create_category');
                Route::post('/save', 'CategoryController@save')->name('save_category');
                Route::get('/list', 'CategoryController@lists')->name('list_category');
                Route::get('/edit/{category_id}', 'CategoryController@edit')->name('edit_category');
            });
            Route::group(['namespace' => 'Food', 'prefix' => 'food'], function () {
                Route::get('/create', 'FoodItemController@create')->name('create_food_item');
                Route::post('/save', 'FoodItemController@save')->name('save_food_item');
                Route::get('/list', 'FoodItemController@lists')->name('list_food_item');
                Route::get('/edit/{food_item_id}', 'FoodItemController@edit')->name('edit_food_item');
                Route::get('/delete/{food_image}/{food_item_id}', 'FoodItemController@delete')->name('delete_food_image');
                Route::get('/add/costing/{food_item_id}', 'FoodItemController@addCosting')->name('add_food_item_costing');
                Route::get('/edit/costing/{food_item_id}/{tax_id}', 'FoodItemController@editCosting')->name('edit_food_item_costing');
                Route::post('/save/costing', 'FoodItemController@saveCosting')->name('save_food_item_costing');
                Route::group(['prefix' => 'order'], function () {
                    Route::get('/list', 'OrderController@lists')->name('list_order');
                });
            });
            Route::group(['namespace' => 'Review', 'prefix' => 'review'], function () {
                Route::get('/create', 'ReviewController@create')->name('create_review');
                Route::post('/save', 'ReviewController@save')->name('save_review');
                Route::get('/review/list', 'ReviewController@lists')->name('list_review');
                Route::get('/view/{review_id}', 'ReviewController@view')->name('show_review');
            });
        });
        Route::group(['namespace' => 'Feedback', 'prefix' => 'feedback'], function () {
            Route::get('/list', 'FeedbackController@lists')->name('list_feedback');
            Route::get('/view/{feedback_id}', 'FeedbackController@view')->name('view_feedback');
        });

        Route::group(['namespace' => 'Announcement', 'prefix' => 'news'], function () {
            Route::get('/list', 'NewsController@lists')->name('list_news');
            Route::get('/add', 'NewsController@add')->name('add_news');
            Route::get('/edit/{news_id}', 'NewsController@edit')->name('edit_news');
            Route::post('/save', 'NewsController@save')->name('save_news');
        });
    });

});
