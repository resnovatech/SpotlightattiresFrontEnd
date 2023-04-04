<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\FilterController;
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

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->back();
});

Route::controller(FilterController::class)->group(function () {


    Route::get('/search_filter_data','search_filter_data')->name('search_filter_data');
    Route::get('/search_product','search_product')->name('search_product');

});

Route::controller(CartController::class)->group(function () {
    
    Route::get('/delete_from_sidebar_new', 'delete_from_sidebar_new')->name('delete_from_sidebar_new');

       Route::get('/increase_data_from_side_bar', 'increase_data_from_side_bar')->name('increase_data_from_side_bar');
    Route::get('/dcrease_data_from_side_bar', 'dcrease_data_from_side_bar')->name('dcrease_data_from_side_bar');
    
           Route::get('/cart_page_all_update_minus','cart_page_all_update_minus')->name('cart_page_all_update_minus');
      Route::get('/cart_page_all_update','cart_page_all_update')->name('cart_page_all_update');
      Route::get('/sidebar_update_from_cart_page','sidebar_update_from_cart_page')->name('sidebar_update_from_cart_page');



     Route::post('/post_review','post_review')->name('post_review');
Route::post('/post_review_login','post_review_login')->name('post_review_login');
Route::get('/post_review_login_page','post_review_login_page')->name('post_review_login_page');

///////////////

Route::get('/add_to_cart_count_new','add_to_cart_count_new')->name('add_to_cart_count_new');

    Route::get('/add_to_cart_count','add_to_cart_count')->name('add_to_cart_count');
    Route::get('/add_to_card_all_product', 'add_to_card_all_product')->name('add_to_card_all_product');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/buyNow', 'buyNow')->name('buyNow');
    Route::get('/check_out', 'check_out')->name('check_out');


    Route::get('/cart_update','cart_update')->name('cart_update');

Route::get('/cart_clear_single_data/{id}','cart_clear_single_data')->name('cart_clear_single_data');
Route::get('/cart_clear_all_data','cart_clear_all_data')->name('cart_clear_all_data');

Route::get('/check_out_from_cart','check_out_from_cart')->name('check_out_from_cart');


    Route::post('/add_to_card_from_quick_view', 'add_to_card_from_quick_view')->name('add_to_card_from_quick_view');
    Route::post('/add_to_card_from_single_product_view', 'add_to_card_from_single_product_view')->name('add_to_card_from_single_product_view');


    Route::get('/success_page/{id}', 'success_page')->name('success_page');

Route::get('/login_page','login_page')->name('login_page');
Route::get('/verification_page','verification_page')->name('verification_page');
Route::get('/verification_page_dash','verification_page_dash')->name('verification_page_dash');

Route::post('/verification_page_post','verification_page_post')->name('verification_page_post');
Route::post('/verification_page_dash_post','verification_page_dash_post')->name('verification_page_dash_post');

Route::get('/login_page_dash','login_page_dash')->name('login_page_dash');

Route::post('/customer_login_post_dash','customer_login_post_dash')->name('customer_login_post_dash');
Route::post('/customer_reg_post_dash','customer_reg_post_dash')->name('customer_reg_post_dash');


Route::get('/customer_dashboard','customer_dashboard')->name('customer_dashboard');
Route::get('/customer_address','customer_address')->name('customer_address');
Route::get('/customer_wishlist','customer_wishlist')->name('customer_wishlist');
Route::get('/customer_profile','customer_profile')->name('customer_profile');

Route::post('/personal_information_update','personal_information_update')->name('personal_information_update');

Route::post('/customer_login_post','customer_login_post')->name('customer_login_post');
Route::post('/customer_reg_post','customer_reg_post')->name('customer_reg_post');

Route::get('account/verify/{token}','verifyAccount')->name('user.verify');
Route::get('new_account/verify/{token}','verifyAccount1')->name('user.verify_new');

Route::post('/final_confirm','final_confirm')->name('final_confirm');

Route::get('/signout','signout')->name('signout');


Route::get('/privacyPolicy','privacyPolicy')->name('privacyPolicy');
Route::get('/wishList','wishList')->name('wishList');


Route::get('/deleteWishList/{id}','deleteWishList')->name('deleteWishList');


Route::get('/wishListProductAdd/{id}','wishListProductAdd')->name('wishListProductAdd');


Route::post('/address_update_code','address_update_code')->name('address_update_code');


Route::get('/about_us', 'about_us')->name('about_us_new');
Route::get('/contact_us','contact_us')->name('contact_us_new');
Route::get('/blog','blog')->name('blog_new');

Route::get('/blog_list/{id}','blog_list')->name('blog_list');
Route::get('/blog_view/{id}','blog_view')->name('blog_view');
Route::get('/search_blog','search_blog')->name('search_blog');
//search_blog

Route::post('/post_message','post_message')->name('post_message');






Route::get('/get_filter_data_from_page', 'get_filter_data_from_page')->name('get_filter_data_from_page');

});


Route::controller(FrontController::class)->group(function () {
    
  
    Route::get('/cart_update_from_side_bar', 'cart_update_from_side_bar')->name('cart_update_from_side_bar');
    
     

    Route::get('/check_email_value', 'check_email_value')->name('check_email_value');
    
    Route::get('/search_product_ajax', 'search_product_ajax')->name('search_product_ajax');

  Route::get('/search_product', 'search_product')->name('search_product');
  Route::get('/mobile_search_product', 'mobile_search_product')->name('mobile_search_product');

    Route::get('/cart_post', 'cart_post')->name('cart_post');
    Route::get('/', 'index')->name('index');
    Route::get('categoryProduct/{id}', 'categoryProduct')->name('categoryProduct');
    Route::get('productDetail/{id}', 'productDetail')->name('productDetail');


    Route::get('animationCategory/{id}', 'animationCategory')->name('animationCategory');
    Route::get('animationCategoryProductList', 'animationCategoryProductList')->name('animationCategoryProductList');

    Route::get('offerAndEventProduct', 'offerAndEventProduct')->name('offerAndEventProduct');


Route::get('/quick_view_data','quick_view_data')->name('quick_view_data');
Route::get('/quick_view_data1', 'quick_view_data1')->name('quick_view_data1');
Route::get('/quick_view_data2','quick_view_data2')->name('quick_view_data2');
Route::get('/quick_view_data3','quick_view_data3')->name('quick_view_data3');









});
