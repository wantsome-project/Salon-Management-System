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
    return view('front_panel.layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/frontpanel', function () {
    return view('front_panel.layout');
})->name('frontpanel');

Route::prefix('back_panel')
    ->name("back_panel.")
    ->namespace("BackPanel")
    ->group(function () {
        Route::get('/', function () {
            return view('back_panel.layout');
        })->name("dashboard");
        Route::prefix('products')
            ->group(function () {
                Route::get('/example', function () {
                    return view('back_panel.example_form');
                });
                Route::get('/', 'ProductController@index')
                    ->name('products.index');
                Route::get('/create', 'ProductController@create')
                    ->name('products.create');
                Route::post('/','ProductController@store')
                    ->name('products.store');
                Route::get('/{product}/edit', 'ProductController@edit')
                    ->name('products.edit');
                Route::put('/{product}', 'ProductController@update')
                    ->name('products.update');
                Route::delete('/{product}', 'ProductController@destroy')
                    ->name('products.destroy');

        });

        Route::prefix('service_type')
            ->group(function () {
                Route::get('/', 'ServiceTypeController@index')
                    ->name('service_types.index');
                Route::get('/create', 'ServiceTypeController@create')
                    ->name('service_types.create');
                Route::post('/','ServiceTypeController@store')
                    ->name('service_types.store');
                Route::get('/{serviceType}/edit', 'ServiceTypeController@edit')
                    ->name('service_types.edit');
                Route::put('/{serviceType}', 'ServiceTypeController@update')
                    ->name('service_types.update');
                Route::delete('/{serviceType}', 'ServiceTypeController@destroy')
                    ->name('service_types.destroy');
            });

        Route::prefix('customer')
            ->group(function () {
                Route::get('/', function () {
                    return "to do";
                });
        });
        Route::prefix('employee')
            ->group(function () {
                Route::get('/', 'EmployeeController@index')
                    ->name('employees.index');
                Route::get('/create', 'EmployeeController@create')
                    ->name('employees.create');
                Route::post('/','EmployeeController@store')
                    ->name('employees.store');
                Route::get('/{employee}/edit', 'EmployeeController@edit')
                    ->name('employees.edit');
                Route::put('/{employee}', 'EmployeeController@update')
                    ->name('employees.update');
                Route::delete('/{employee}', 'EmployeeController@destroy')
                    ->name('employees.destroy');
        });
    });

Route::get('/contact', function () {
    return view('front_panel.layout_contact');
})->name('contact');


Route::get('/staff', function () {
    return view('front_panel.layout_staff');
})->name('staff');


Route::get('/products', function () {
    return view('front_panel.layout_products');
})->name('products');


Route::get('/services', function () {
    return view('front_panel.layout_services');
})->name('ServicesType');
