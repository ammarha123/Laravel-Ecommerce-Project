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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('admin')->group(function () {

//     Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);

// });

Route::prefix('admin')->middleware(['auth','isAdm'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    //Category Routes
    Route::get('category', [App\Http\Controllers\admin\CategoryController::class, 'index']);
    Route::get('category/create', [App\Http\Controllers\admin\CategoryController::class, 'create']);
    Route::post('category', [App\Http\Controllers\admin\CategoryController::class, 'store']);
});


