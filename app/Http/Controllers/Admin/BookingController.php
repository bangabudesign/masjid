<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Bookings';

        $bookings = Booking::get();

        return view('admin.booking_index', [
            'page_title' => $page_title,
            'bookings' => $bookings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $page_title = 'Booking : '.$booking->spot->name;
        
        return view('admin.booking_show', [
            'page_title' => $page_title,
            'booking' => $booking,
            'paymentable_type' => 'booking',
            'paymentable_id' => $booking->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $page_title = 'Edit Booking : '.$booking->spot->name;
        $sub_title = 'Atas Nama '.$booking->user->name;
        
        return view('admin.booking_edit', [
            'page_title' => $page_title,
            'sub_title' => $sub_title,
            'booking' => $booking,
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
        $booking1 = Booking::where('start_at', '>=', $request->start_at)->where('end_at', '<=', $request->end_at)->where('status', '>=', 0)->where('id', '!=', $id)->exists();
        $booking2 = Booking::where('end_at', '>=', $request->start_at)->where('start_at', '<=', $request->end_at)->where('status', '>=', 0)->where('id', '!=', $id)->exists();

        if ($booking1) {
            return redirect()->back()->withInput()->with('errorMessage', 'Tanggal yang anda pilih tidak tersedia');
        } elseif($booking2) {
            return redirect()->back()->withInput()->with('errorMessage', 'Tanggal yang anda pilih tidak tersedia');
        }

        $data = ([
            'customer_name' => $request->customer_name,
            'customer_agency' => $request->customer_agency,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'event_name' => $request->event_name,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'daily_booking_count' => $request->daily_booking_count,
            'hourly_booking_count' => $request->hourly_booking_count,
            'notes' => $request->notes,
            'status' => $request->status
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($data);

        return redirect()->route('admin.bookings.index')->with('successMessage', 'Berhasil memperbarui');
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
