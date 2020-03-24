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

Route::get('/', 'FrontendControllers\HomeController@index');
Route::get('/login', 'FrontendControllers\AuthController@login');
Route::post('/do-login', 'Auth\LoginController@userlogin');
Route::get('/register', 'FrontendControllers\AuthController@register');
Route::post('/do-register', 'Auth\RegisterController@userRegister');
Route::get('/logout', 'FrontendControllers\AuthController@logout');
Route::get('/wishlist', 'FrontendControllers\WishlistController@wishlist');
Route::post('/delete-wishproduct', 'FrontendControllers\WishlistController@deleteWishproduct');
Route::post('/cart-wishproduct', 'FrontendControllers\WishlistController@cartWishproduct');

Route::get('/shop/product/{alias}', 'FrontendControllers\ProductController@singleProduct');