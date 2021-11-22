<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infaq;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InfaqController extends Controller
{
    public function index()
    {
        $page_title = 'Infaq';

        $infaq = Infaq::get();

        return view('admin.infaq_index', [
            'page_title' => $page_title,
            'infaq' => $infaq,
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Kategori Infaq';
        return view('admin.infaq_create', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        $data = ([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->file('image')){
            $fileName = Str::slug($request->name).time().'.'.$request->image->extension();
            $path = public_path('images/infaq');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $infaq = Infaq::create($data);
        $infaq->save();

        return redirect()->route('admin.infaq.index')->with('successMessage', 'Berhasil menambahkan kategori baru');
    }

    public function show($id)
    {
        $infaq = Infaq::findOrFail($id);
        $page_title = 'Edit Kategori Infaq '.$infaq->name;
        
        return view('admin.infaq_show', [
            'page_title' => $page_title,
            'infaq' => $infaq,
        ]);
    }

    public function edit($id)
    {
        $infaq = Infaq::findOrFail($id);
        
        $page_title = 'Edit Kategori Infaq '.$infaq->name;

        return view('admin.infaq_edit', [
            'page_title' => $page_title,
            'infaq' => $infaq,
        ]);
    }

    public function update(Request $request, $id)
    {
        $infaq = Infaq::findOrFail($id);

        $data = ([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->file('image')){
            $fileName = Str::slug($request->name).time().'.'.$request->image->extension();
            $path = public_path('images/infaq');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($infaq->image) {
                $path = public_path('images/infaq');

                if (!empty($infaq->image) && file_exists($path.'/'.$infaq->image)) {
                    unlink($path.'/'.$infaq->image);
                }
            }
        }

        $infaq->update($data);

        return redirect()->route('admin.infaq.index')->with('successMessage', 'Berhasil memperbarui data');
    }
}
