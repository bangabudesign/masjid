<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::verifiedVendor()->get();
        $page_title = 'Vendor Pernikahan';

        return view('vendor_index', [
            'page_title' => $page_title,
            'vendors' => $vendors,
        ]);
    }

    public function create()
    {
        $page_title = 'Daftar Menjadi Vendor';
        $sub_title = 'Pastikan Anda mematui syarat dan ketentuan menjadi vendor di '.config('app.name', 'Laravel');

        return view('vendor_create', [
            'page_title' => $page_title,
            'sub_title' => $sub_title,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:2048',
            'name' => 'required',
            'username' => 'required|alpha_dash|unique:vendors,username',
            'category' => 'required',
            'about' => 'required|max:250',
            'address' => 'required|max:250',
            'city' => 'required',
            'website' => 'nullable|url',
            'instagram' => 'nullable',
            'whatsapp' => 'nullable|numeric',
        ],[
            'required' => ':attribute wajib diisi',
            'image' => ':attribute harus berupa gambar',
            'numeric' => ':attribute harus berupa angka',
            'max' => ':attribute tidak boleh lebih dari :max',
            'url' => ':attribute tidak valid',
            'alpha_dash' => ':attribute tidak valid',
            'unique' => ':attribute sudah digunakan coba yang lain',
        ],[
            'logo' => 'Logo',
            'name' => 'Nama Usaha / Brand',
            'username' => 'Username',
            'category' => 'Kategori',
            'about' => 'Profil',
            'address' => 'Alamat',
            'city' => 'Kota',
            'website' => 'Website',
            'instagram' => 'Instagram',
            'whatsapp' => 'WhatsApp',
        ]);

        $vendor = Vendor::where('user_id', auth()->user()->id)->exists();

        if ($vendor) {
            return redirect()->back()->withInput()->with('errorMessage', 'Kamu sudah mengajukan diri sebagai vendor');
        }

        $data = ([
            'name' => $request->name,
            'username' => $request->username,
            'category' => $request->category,
            'about' => $request->about,
            'address' => $request->address,
            'city' => $request->city,
            'website' => $request->website,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'user_id' => auth()->user()->id,
        ]);

        if ($request->file('logo')){
            $fileName = $request->username.time().'.'.$request->logo->extension();
            $path = public_path('images/vendors');        

            $data['logo'] = $fileName;
            $request->logo->move($path, $fileName);
        }

        $vendor = Vendor::create($data);
        $vendor->save();

        return redirect()->route('vendors.thanks');
    }

    public function thanks()
    {
        return view('vendor_thanks');
    }
}
