<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them wil–l
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', function () {
    return view("welcome");
});

Route::post('/register', [UserController::class , 'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

// Products related routes
Route::post('/create-product', [ProductsController::class, 'createProduct'])->name('create-product.createProduct');

//Route::get('/products', [ProductsController::class,'index'])->name('products.index');


/*Route::get('item', function () {
    return view("item");
});*/