<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','HomeController@index');
Route::get('/trangchu','HomeController@index');
Route::get('/show_card','CartController@show_cart');


Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');
Route::get('/adminlogin','AdminController@index');


// Category
Route::get('/danhmucsanpham/{category_id}','CategoryProduct@show_cate');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');


Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');

//Brand
Route::get('/thuonghieusanpham/{brand_id}','BrandProduct@show_brand');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');


Route::post('/save-brand-product','BrandProduct@save_brand_product');

Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');

//Product
Route::get('/chi_tiet_san_pham/{product_id}','ProductController@show_chi_tiet');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');


Route::post('/save-product','ProductController@save_product');

Route::get('/active-product/{product_product_id}','ProductController@active_product');
Route::get('/unactive-product/{product_product_id}','ProductController@unactive_product');
//slider
Route::get('/add-slider','SliderController@add_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route::get('/edit-slider/{slider_id}','SliderController@edit_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
Route::post('/update-slider/{slider_id}','SliderController@update_slider');

// cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show_cart_product','CartController@show_cart');

Route::get('/remove-cart/{product_id}','CartController@remove_cart');
Route::post('/update-cart','CartController@update_cart');
// Check out 
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::post('/register','CheckoutController@register');
Route::get('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/logout','CheckoutController@logout');
Route::post('/check_login_in_checkout','CheckoutController@check_login_in_checkout');
Route::post('/check_login_in_home','CheckoutController@check_login_in_home');
Route::post('/save-checkout-customer','CheckoutController@save_checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/order_place','CheckoutController@order_place');
?>