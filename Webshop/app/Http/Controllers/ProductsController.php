<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index () {
        $products= Product::all();
        return view ('products.index', ['products' => $products]);
    }
}
