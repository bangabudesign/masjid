<?php

namespace App\Http\Controllers;

use App\Models\Banner;
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
        $events = Event::upcomingEvent()->activeEvent()->limit(6)->get();
        $banners = Banner::active()->get();

        return view('home', [
            'sisa_saldo' => $sisa_saldo,
            'posts' => $posts,
            'events' => $events,
            'banners' => $banners,
        ]);
    }
}
