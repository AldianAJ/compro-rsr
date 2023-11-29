<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CareerController;
use App\Http\Controllers\backend\ContentAboutPageController;
use App\Http\Controllers\backend\DescCareerController;
use App\Http\Controllers\backend\LangController;
use App\Http\Controllers\backend\MediaController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductPageController;
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
    Route::get('/products', 'products')->name('products');
    Route::get('/media', 'media')->name('media');
    Route::get('/career', 'career')->name('career');
});

Route::prefix('/admin')->name('backend.')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::controller(ContentAboutPageController::class)->group(function () {
            Route::get('/', 'index');
        });
        Route::controller(ContentAboutPageController::class)->prefix('/about/content/')->name('about.content.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy', 'destroy')->name('destroy');
        });

        Route::prefix('/product')->name('product.')->group(function () {
            Route::controller(ProductPageController::class)->prefix('/content')->name('content.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
            });

            Route::controller(ProductController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::get('/destroy', 'destroy')->name('destroy');
            });
        });

        Route::controller(LangController::class)->prefix('/lang')->name('lang.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/destroy', 'destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });

        Route::controller(DescCareerController::class)->prefix('/desccareer')->name('desccareer.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/destroy', 'destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });

        Route::controller(CareerController::class)->prefix('/career')->name('career.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/destroy', 'destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });

        Route::controller(MediaController::class)->prefix('/media')->name('media.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/destroy', 'destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });

        Route::controller(BrandController::class)->prefix('/brand')->name('brand.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/destroy', 'destroy')->name('destroy');
            Route::get('/edit', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });
    });


    Route::controller(AuthController::class)->prefix('/auth')->name('auth.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    });
});
