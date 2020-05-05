<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('back_panel.layout');
});


Route::get('/frontpanel', function () {
    return view('front_panel.layout');
});

Route::prefix('back_panel')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return view('back_panel.example_form');
        });
    });

    Route::prefix('service_type')->group(function () {
        Route::get('/', function () {
            return "to do";
        });
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', function () {
            return "to do";
        });
    });
    Route::prefix('employee')->group(function () {
        Route::get('/', function () {
            return "to do";
        });
    });
});

Route::get('/contact', function () {
    return view('front_panel.layout_contact');
});


Route::get('/staff', function () {
    return view('front_panel.layout_staff');
});


Route::get('/products', function () {
    return view('front_panel.layout_products');
});


Route::get('/services', function () {
    return view('front_panel.layout_services');
});
