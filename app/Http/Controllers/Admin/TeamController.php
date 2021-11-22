<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $page_title = 'Personalia';

        $teams = Team::get();

        return view('admin.team_index', [
            'page_title' => $page_title,
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Data';
        return view('admin.team_create', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        $data = ([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'position' => $request->position,
            'body' => $request->body,
        ]);

        if ($request->file('image')){
            $fileName = Str::slug($data['name']).time().'.'.$request->image->extension();
            $path = public_path('images/teams');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $team = Team::create($data);
        $team->save();

        return redirect()->route('admin.teams.index')->with('successMessage', 'Berhasil menambahkan data baru');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        
        $page_title = 'Edit Data '.$team->name;

        return view('admin.team_edit', [
            'page_title' => $page_title,
            'team' => $team,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'position' => $request->position,
            'body' => $request->body,
        ]);

        $team = Team::findOrFail($id);

        if ($request->file('image')){
            $fileName = Str::slug($data['name']).time().'.'.$request->image->extension();
            $path = public_path('images/teams');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($team->image) {
                $path = public_path('images/teams');

                if (!empty($team->image) && file_exists($path.'/'.$team->image)) {
                    unlink($path.'/'.$team->image);
                }
            }
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('successMessage', 'Berhasil diperbarui data');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image) {
            $path = public_path('images/teams');

            if (!empty($team->image) && file_exists($path.'/'.$team->image)) {
                unlink($path.'/'.$team->image);
            }
        }

        $team->delete();

        return redirect()->back()->with('successMessage', 'Berhasil menghapus data');
    }
}
