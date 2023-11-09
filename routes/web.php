<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HomeController::class,'abc'])->name('home');

Route::get('/biodata', [HomeController::class,'biodata'])->name('home');

Route::get('/admin', [adminController::class,'admin'])->name('admin');

Route::get('/anime', [adminController::class, 'anime'])->name('anime');



