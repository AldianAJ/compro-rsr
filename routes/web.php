<?php

use App\Http\Controllers\backend\AdminPagesController;
use App\Http\Controllers\backend\SectionController;
use App\Http\Controllers\frontend\PagesController;
use Illuminate\Support\Facades\Route;

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

// Frontend
Route::controller(PagesController::class)->name('frontend.')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/brand/{slug}', 'brand')->name('brand');
    Route::get('/news', 'news')->name('news');
});

Route::prefix('/admin')->name('backend.')->group(function () {
    Route::controller(AdminPagesController::class)->prefix('/pages')->name('pages.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/destroy', 'destroy')->name('destroy');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });
    Route::controller(SectionController::class)->prefix('/section')->name('section.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/destroy', 'destroy')->name('destroy');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
    });
});
