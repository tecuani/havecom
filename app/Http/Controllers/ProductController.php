<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->take(3);
        $productCategories = ProductCategory::all();

        return view('products.index', compact('products', 'productCategories'));
    }

    public function show(Product $product)
    {
        $recomended = Product::where('id', '!=', $product->id)->get()->take(3);

        return view('products.show', compact('product', 'recomended'));
    }
}
