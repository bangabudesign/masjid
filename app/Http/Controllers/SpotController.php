<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::get();
        $page_title = 'Booking Tempat';

        return view('spot_index', [
            'page_title' => $page_title,
            'spots' => $spots,
        ]);
    }

    public function show($slug)
    {
        $spot = Spot::where('slug', $slug)->firstOrFail();
        $page_title = $spot->name;

        return view('spot_show', [
            'page_title' => $page_title,
            'spot' => $spot,
        ]);
    }
}
