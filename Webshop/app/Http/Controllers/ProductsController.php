<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function showEditScreen(Product $product) {
        return view ('products.edit-product', ['product' => $product]);
    }

    public function createProduct(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['user_id'] = auth()->id();
        Product::create($incomingFields);
        return redirect('/');

    /*public function index () {
        $products= Product::all();
        return view ('products.index', ['products' => $products]);
    }*/
}
}