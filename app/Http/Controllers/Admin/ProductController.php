<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $page_title = 'Products';

        $products = Product::latestFirst()->get();

        return view('admin.product_index', [
            'page_title' => $page_title,
            'products' => $products,
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Produk';
        return view('admin.product_create', [
            'page_title' => $page_title,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = ([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'price' => $request->price,
            'is_active' => $request->is_active,
        ]);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/products');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $product = Product::create($data);
        $product->save();

        return redirect()->route('admin.products.index')->with('successMessage', 'Berhasil menambahkan produk baru');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        $page_title = 'Edit Produk '.$product->name;

        return view('admin.product_edit', [
            'page_title' => $page_title,
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = ([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'price' => $request->price,
            'is_active' => $request->is_active,
        ]);

        $product = Product::findOrFail($id);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/products');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($product->image) {
                $path = public_path('images/products');

                if (!empty($product->image) && file_exists($path.'/'.$product->image)) {
                    unlink($path.'/'.$product->image);
                }
            }
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('successMessage', 'Produk berhasil diperbarui');
    }
}
