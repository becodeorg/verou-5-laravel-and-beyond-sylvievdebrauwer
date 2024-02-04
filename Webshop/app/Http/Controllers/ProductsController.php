<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function createProduct(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Product::create($incomingFields);
        return redirect('/');

    /*public function index () {
        $products= Product::all();
        return view ('products.index', ['products' => $products]);
    }*/
}
}