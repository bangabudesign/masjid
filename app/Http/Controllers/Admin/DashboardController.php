<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialStatement;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_saldo = FinancialStatement::sisaSaldo();
        $total_product = Product::activeProduct()->count();
        $total_vendor = Vendor::verifiedVendor()->count();

        return view('admin.dashboard', [
            'total_saldo' => $total_saldo,
            'total_product' => $total_product,
            'total_vendor' => $total_vendor,
        ]);
    }
}
