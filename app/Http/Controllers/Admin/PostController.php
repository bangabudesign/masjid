<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Berita';

        $posts = Post::latestFirst()->get();

        return view('admin.post_index', [
            'page_title' => $page_title,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Buat Berita';
        return view('admin.post_create', [
            'page_title' => $page_title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'published_at' => $request->published_at,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/posts');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $post = Post::create($data);
        $post->save();

        return redirect()->route('admin.posts.index')->with('successMessage', 'Berhasil menambahkan berita baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        $page_title = 'Edit Berita '.$post->name;

        return view('admin.post_edit', [
            'page_title' => $page_title,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'published_at' => $request->published_at,
            'status' => $request->status,
        ]);

        $post = Post::findOrFail($id);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/posts');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($post->image) {
                $path = public_path('images/posts');

                if (!empty($post->image) && file_exists($path.'/'.$post->image)) {
                    unlink($path.'/'.$post->image);
                }
            }
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('successMessage', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
