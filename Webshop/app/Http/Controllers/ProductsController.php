<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class ProductsController extends Controller
{
    public function actuallyUpdateProduct(Product $product, Request $request) {
        log::info('Updating product:' . $product->id);
                if (auth()->user()->id !== $product['user_id']) {
            return redirect ('/');
        }

        $incomingFields = $request->validate ([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);

        log::info('Before update:' . $product->title);

        $product->update($incomingFields);

        log::info('After Update:' . $product->title);
        return redirect ('/');
    }

    public function showEditScreen(Product $product) {
        if (auth()->user()->id !== $product['user_id']) {
            return redirect ('/');
        }
        return view ('edit-product', ['product' => $product]);
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