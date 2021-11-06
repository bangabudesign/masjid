<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $page_title = 'Sabilal Mart';

        return view('product_index', [
            'page_title' => $page_title,
            'products' => $products,
        ]);
    }
}
