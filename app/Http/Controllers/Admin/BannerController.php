<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $page_title = 'Banner';

        $banners = Banner::get();

        return view('admin.banner_index', [
            'page_title' => $page_title,
            'banners' => $banners,
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Data';
        return view('admin.banner_create', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        $data = ([
            'name' => $request->name,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        if ($request->file('image')){
            $fileName = $data['name'].time().'.'.$request->image->extension();
            $path = public_path('images/banners');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $banner = Banner::create($data);
        $banner->save();

        return redirect()->route('admin.banners.index')->with('successMessage', 'Berhasil menambahkan data baru');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        
        $page_title = 'Edit Data '.$banner->name;

        return view('admin.banner_edit', [
            'page_title' => $page_title,
            'banner' => $banner,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ([
            'name' => $request->name,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->file('image')){
            $fileName = $data['name'].time().'.'.$request->image->extension();
            $path = public_path('images/banners');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($banner->image) {
                $path = public_path('images/banners');

                if (!empty($banner->image) && file_exists($path.'/'.$banner->image)) {
                    unlink($path.'/'.$banner->image);
                }
            }
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('successMessage', 'Berhasil diperbarui data');
    }
}
