<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    //admin routes
    Route::group(['middleware' => 'checkUser:admin'], function () {        
        Route::get('dashboard', function () {
            return view('dashboard');
        });
    });

    //user routes
    Route::group(['middleware' => 'checkUser:normal'], function () {        
        Route::get('product', [ProductController::class, 'index'])->name('products.index');
        Route::post('product/filter', [ProductController::class, 'filter'])->name('products.filter');
    });    
});
