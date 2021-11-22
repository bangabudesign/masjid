<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpotRequest;
use App\Models\Spot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Spots';

        $spots = Spot::get();

        return view('admin.spot_index', [
            'page_title' => $page_title,
            'spots' => $spots,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah Spot';
        return view('admin.spot_create', [
            'page_title' => $page_title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpotRequest $request)
    {
        $data = ([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'daily_booking_rate' => $request->daily_booking_rate,
            'hourly_booking_rate' => 0,
            'capacity' => $request->capacity,
            'is_active' => $request->is_active,
        ]);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/spots');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $spot = Spot::create($data);
        $spot->save();

        return redirect()->route('admin.spots.edit', ['id' => $spot->id])->with('successMessage', 'Berhasil menambahkan spot baru');
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
        $spot = Spot::findOrFail($id);
        
        $page_title = 'Edit Spot '.$spot->name;

        return view('admin.spot_edit', [
            'page_title' => $page_title,
            'spot' => $spot,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpotRequest $request, $id)
    {
        $data = ([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'daily_booking_rate' => $request->daily_booking_rate,
            'hourly_booking_rate' => 0,
            'capacity' => $request->capacity,
            'is_active' => $request->is_active,
        ]);

        $spot = Spot::findOrFail($id);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/spots');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($spot->image) {
                $path = public_path('images/spots');

                if (!empty($spot->image) && file_exists($path.'/'.$spot->image)) {
                    unlink($path.'/'.$spot->image);
                }
            }
        }

        $spot->update($data);

        return redirect()->route('admin.spots.index')->with('successMessage', 'Spot berhasil diperbarui');
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
