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

// Route::get('/', function () {
//     return view('welcome');
// });
// For Backend
Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('shoppingcart', 'FrontendController@shoppingcart')->name('shoppingcartpage');
Route::get('subcategory', 'FrontendController@subcategory')->name('subcategorypage');



Route::middleware(['role:admin'])->group(function () {
    Route::get('dashbord', 'BackendController@dashbord')->name('dashbordpage');
    Route::resource('categories', 'CategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('subcategories', 'SubcategoryController');
    Route::resource('items', 'ItemController');
});
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
