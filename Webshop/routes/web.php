<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
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

/*
Route::get('/', function () {
    $products = Product::all();
    return view("welcome", ['products' => $products]);
});*/

Route::get('/', function () {
    $products = [];
    if (auth()->check()) {
        $products = auth()->user()->usersProducts()->latest()->get();
    }
    return view('welcome', ['products' => $products]);
});

Route::post('/register', [UserController::class , 'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

// Post Products related routes
Route::post('/create-product', [ProductsController::class, 'createProduct'])->name('create-product.createProduct');
Route::get('/edit-product/{product}', [ProductsController::class, 'showEditScreen'])->name('edit-product.editProduct');
Route::put('/edit-product/{product}', [ProductsController::class, 'actuallyUpdateProduct']);
Route::delete('/delete-product/{product}', [ProductsController::class, 'deleteProduct']);


Route::get('/products', [ProductsController::class,'index'])->name('products.index');
Route::get('item', function () {
    return view("item");
});