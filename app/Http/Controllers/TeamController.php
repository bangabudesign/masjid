<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('position', 'asc')->get();
        $page_title = 'Personalia';

        return view('team_index', [
            'page_title' => $page_title,
            'teams' => $teams,
        ]);
    }
}
