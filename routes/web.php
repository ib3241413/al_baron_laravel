<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CustomAuthController;








Route::get('/',[StaticController::class,'index'] )->name('home.index');

Route::resource('products',ProductsController::class);
Route::resource('vendors',VendorsController::class);
Route::resource('customers',CustomersController::class);
Route::resource('admins',AdminsController::class);
Route::resource('orders',OrdersController::class);
Route::resource('complaints',ComplaintController::class);
Route::resource('product-types',ProductTypeController::class);


// Route::get('/admins/welcome', 'AdminsController@welcome')->name('admins.welcome');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/', [CustomAuthController::class, 'home']);
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class,'index'])->name('login');
Route::post('postlogin',[CustomAuthController::class,'login'])->name('postlogin');
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');