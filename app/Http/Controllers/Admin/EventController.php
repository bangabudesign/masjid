<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Agenda';

        $events = Event::latestFirst()->get();

        return view('admin.event_index', [
            'page_title' => $page_title,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Buat Agenda';
        return view('admin.event_create', [
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
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'event_date' => $request->event_date,
            'status' => $request->status,
        ]);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/events');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);
        }

        $event = Event::create($data);
        $event->save();

        return redirect()->route('admin.events.index')->with('successMessage', 'Berhasil menambahkan agenda baru');
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
        $event = Event::findOrFail($id);
        
        $page_title = 'Edit Agenda '.$event->name;

        return view('admin.event_edit', [
            'page_title' => $page_title,
            'event' => $event,
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
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'event_date' => $request->event_date,
            'status' => $request->status,
        ]);

        $event = event::findOrFail($id);

        if ($request->file('image')){
            $fileName = $data['slug'].time().'.'.$request->image->extension();
            $path = public_path('images/events');        

            $data['image'] = $fileName;
            $request->image->move($path, $fileName);

            if ($event->image) {
                $path = public_path('images/events');

                if (!empty($event->image) && file_exists($path.'/'.$event->image)) {
                    unlink($path.'/'.$event->image);
                }
            }
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('successMessage', 'Agenda berhasil diperbarui');
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
