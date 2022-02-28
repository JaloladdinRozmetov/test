<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');
Auth::routes(['admin'=>true]);


//Buyers
Route::group(['middleware' => ['auth','admin']], function () {
    Route::controller(BuyerController::class)->prefix('buyer')->as('buyer.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/show', 'show')->name('show');
        Route::get('/{id}', 'destroy')->name('destroy');
    });


//Products
    Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::get('/{id}/show', 'show')->name('show');
        Route::get('/{id}', 'destroy')->name('destroy');
    });
});
