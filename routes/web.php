<?php

use App\ServiceType;
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
    $service_types = ServiceType::query()
        ->limit(2)
        ->get();
    $employees = \App\Employee::query()
        ->limit(2)
        ->get();
    $products = \App\Product::query()
        ->limit(2)
        ->get();
    return view('front_panel.pages.home')
        ->with('service_types', $service_types)
        ->with('employees', $employees)
        ->with('products', $products);
})->name('home_page');

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
            ->middleware('can:isAdmin')
            ->group(function () {
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

        Route::prefix('service_types')
            ->middleware('can:isAdmin')
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

        Route::prefix('customers')
            ->middleware('can:isAdmin')
            ->group(function () {
                Route::get('/', 'CustomerController@index')
                    ->name('customers.index');
        });
        Route::prefix('employees')
            ->middleware('can:isAdmin')
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

        Route::prefix('salary_payments')
            ->middleware('can:isAdmin')
            ->group(function () {
                Route::get('/', 'SalaryPaymentController@index')
                    ->name('salary_payments.index');
                Route::get('/create', 'SalaryPaymentController@create')
                    ->name('salary_payments.create');
                Route::post('/','SalaryPaymentController@store')
                    ->name('salary_payments.store');
                Route::get('/{salary_payment}/edit', 'SalaryPaymentController@edit')
                    ->name('salary_payments.edit');
                Route::put('/{salary_payment}', 'SalaryPaymentController@update')
                    ->name('salary_payments.update');
                Route::delete('/{salary_payment}', 'SalaryPaymentController@destroy')
                    ->name('salary_payments.destroy');

            });
    });

Route::namespace("FrontPanel")
    ->group(function () {
        Route::get('/staff', 'StaffController@index')
            ->name('staff');

        Route::get('/products', 'ProductController@index')
            ->name('products');

        Route::get('/contact', function () {
                return view('front_panel.pages.contact');
        })->name('contact');

        Route::get('/service_types', 'ServiceTypesController@index')
            ->name('service_types');


    });









