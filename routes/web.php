<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// ===> Categories
Route::get('/categories','App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/categories/create','App\Http\Controllers\CategoryController@create')->name('categories.create');
Route::get('/categories/{id}','App\Http\Controllers\CategoryController@show')->name('categories.show');
Route::get('/categories/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('categories.edit');
Route::post('/categories','App\Http\Controllers\CategoryController@store')->name('categories.store');
Route::patch('/categories/update/{id}','App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::delete('/categories/destroy/{id}','App\Http\Controllers\CategoryController@destroy')->name('categories.destroy');

// ===> Products
Route::get('/products','App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/products/listingProducts','App\Http\Controllers\ProductController@listingProducts')->name('products.listingProducts');
Route::get('/products/create','App\Http\Controllers\ProductController@create')->name('products.create');
Route::get('/products/{id}','App\Http\Controllers\ProductController@show')->name('products.show');
Route::get('/products/edit/{id}','App\Http\Controllers\ProductController@edit')->name('products.edit');
Route::post('/products','App\Http\Controllers\ProductController@store')->name('products.store');
Route::post('/products/update/','App\Http\Controllers\ProductController@update')->name('products.update');
Route::delete('/products/destroy/{id}','App\Http\Controllers\ProductController@destroy')->name('products.destroy');
