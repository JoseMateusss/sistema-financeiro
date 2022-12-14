<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ChartAccountsController;
use App\Http\Controllers\ProviderController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/chart-accounts', ChartAccountsController::class);

Auth::routes();


Route::resource('/users', UserController::class);
Route::resource('/providers', ProviderController::class);
Route::patch('/users{user}', [UserController::class, 'changePassword'])->name('users.changepassword');
Route::resource('/categories', CategoryController::class);
Route::resource('/subcategories', SubcategoryController::class);
Route::resource('/companies', CompanyController::class);



