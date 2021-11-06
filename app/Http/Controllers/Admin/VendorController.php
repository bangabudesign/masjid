<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $page_title = 'Vendor';

        $vendors = Vendor::latestFirst()->get();

        return view('admin.vendor_index', [
            'page_title' => $page_title,
            'vendors' => $vendors,
        ]);
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        
        $page_title = 'Edit Vendor '.$vendor->name;

        return view('admin.vendor_edit', [
            'page_title' => $page_title,
            'vendor' => $vendor,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ([
            'verified_at' => $request->verified_at,
            'status' => $request->status,
        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->update($data);

        return redirect()->route('admin.vendors.index')->with('successMessage', 'Vendor berhasil diperbarui');
    }
}
