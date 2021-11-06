<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FinancialStatement;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sisa_saldo = FinancialStatement::sisaSaldo();
        $posts = Post::latestFirst()->activePost()->limit(6)->get();
        $events = Event::latestFirst()->activeEvent()->limit(6)->get();

        return view('home', [
            'sisa_saldo' => $sisa_saldo,
            'posts' => $posts,
            'events' => $events,
        ]);
    }
}
