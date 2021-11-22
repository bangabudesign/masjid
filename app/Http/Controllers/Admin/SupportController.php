<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $page_title = 'Support';

        $supports = Support::get();

        return view('admin.support_index', [
            'page_title' => $page_title,
            'supports' => $supports,
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Data';
        return view('admin.support_create', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        $data = ([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'whatsapp' => $request->whatsapp,
            'status' => $request->status,
        ]);

        if ($request->file('image')){
            $fileName = $data['whatsapp'].time().'.'.$request->image->extension();
            $path = public_path('images/supports');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $support = Support::create($data);
        $support->save();

        return redirect()->route('admin.supports.index')->with('successMessage', 'Berhasil menambahkan data baru');
    }

    public function edit($id)
    {
        $support = Support::findOrFail($id);
        
        $page_title = 'Edit Data '.$support->name;

        return view('admin.support_edit', [
            'page_title' => $page_title,
            'support' => $support,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'whatsapp' => $request->whatsapp,
            'status' => $request->status,
        ]);

        $support = Support::findOrFail($id);

        if ($request->file('image')){
            $fileName = $data['whatsapp'].time().'.'.$request->image->extension();
            $path = public_path('images/supports');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($support->image) {
                $path = public_path('images/supports');

                if (!empty($support->image) && file_exists($path.'/'.$support->image)) {
                    unlink($path.'/'.$support->image);
                }
            }
        }

        $support->update($data);

        return redirect()->route('admin.supports.index')->with('successMessage', 'Berhasil diperbarui data');
    }
}
