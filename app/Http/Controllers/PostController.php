<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latestFirst()->activePost()->get();
        $page_title = 'Berita Terbaru';

        return view('post_index', [
            'page_title' => $page_title,
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $page_title = $post->name;

        return view('post_show', [
            'page_title' => $page_title,
            'post' => $post,
        ]);
    }
}
