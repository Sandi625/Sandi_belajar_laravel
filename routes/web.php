<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Models\Products;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\DasborController;


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

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/dashboard', [DasborController::class, 'tampilkanDasbor'])->middleware('auth');

// Route::get('/dabor', [DasborController::class, 'tampilkanDasbor'])->middleware('auth');

Route::get('/',[LoginController::class, 'login'])->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


Route::get('/home', [HomeController::class,'index'])->name('index');

Route::get('/hello', [HomeController::class,'abc'])->name('home');

Route::get('/biodata', [HomeController::class,'biodata'])->name('home');

Route::get('/admin', [adminController::class,'admin'])->name('admin');

Route::get('/anime', [adminController::class, 'anime'])->name('anime');

Route::get('/postlogin', [loginController::class, 'halamanlogin'])->name('halamanlogin');

Route::post('/postlogin', [loginController::class, 'postlogin'])->name('postlogin');

// Route::get('/registrasi', [loginController::class, 'registrasi'])->name('registrasi');


Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');

Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');




Route::get('/produk', [ProductsController::class, 'products'])->name('products')->middleware('auth');

Route::get('/tambahproduk', [ProductsController::class, 'tambahproduk'])->name('tambahproduk')->middleware('auth');

Route::post('/insertproduk', [ProductsController::class, 'insertproduk'])->name('insertproduk');

Route::get('/tampilproduk/{id}', [ProductsController::class, 'tampilproduk'])->name('tampilproduk')->middleware('auth');

Route::post('/updateproduk/{id}', [ProductsController::class, 'updateproduk'])->name('updateproduk');

Route::get('/deleteproduk/{id}', [ProductsController::class, 'deleteproduk'])->name('deleteproduk')->middleware('auth');


Route::get('/pencarian', [ProductsController::class, 'cari'])->name('cari')->middleware('auth');



Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register',[loginController::class, 'register'])->name('register');
Route::post('/registeruser',[loginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[loginController::class, 'logout'])->name('logout');

Route::get('/charts',[ChartController::class, 'chart'])->name('chart')->middleware('auth');











//  Route::group(['middleware' => ['auth']], function () {
//      Route::get('/home', [HomeController::class,''])->name('home');
//  });










