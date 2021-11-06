<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $page_title = 'Keranjang Belanja';

        return view('shop_cart', [
            'page_title' => $page_title,
        ]);
    }
}
