<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Spot;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function list()
    {
        $page_title = 'Bookings';
        $user = User::findOrFail(auth()->user()->id);

        $bookings = $user->bookings()->get();

        return view('booking_index', [
            'page_title' => $page_title,
            'bookings' => $bookings,
        ]);
    }

    public function create($spot_id)
    {
        $spot = Spot::findOrFail($spot_id);

        $booked = Booking::where('spot_id', $spot_id)
                        ->where('status', '>=', 0)
                        ->select(['start_at', 'end_at'])
                        ->get();

        if ($booked) {
            foreach($booked as $object)
            {
                $arrays[] = [$object->start_at, $object->end_at];
            }
        } else {
            $arrays[] = '';
        }
        
        return view('booking_create', [
            'spot' => $spot,
            'booked' => $arrays
        ]);
    }

    public function store(Request $request, $spot_id)
    {
        $spot = Spot::findOrFail($spot_id);

        $request->validate([
            'customer_name' => 'required',
            'customer_agency' => 'nullable',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|numeric',
            'event_name' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'daily_booking_count' => 'required|integer|min:0',
            'hourly_booking_count' => 'nullable|integer|min:0',
            'notes' => 'nullable',
        ],[
            'required' => ':attribute wajib diisi',
            'email' => ':attribute tidak valid',
            'numeric' => ':attribute harus berupa angka',
            'min' => ':attribute tidak boleh kurang dari :min',
        ],[
            'customer_name' => 'Nama Customer',
            'customer_agency' => 'Nama Agency',
            'customer_email' => 'Email',
            'customer_phone' => 'No Telpon / WhatsApp',
            'event_name' => 'Nama Event',
            'start_at' => 'Waktu Mulai',
            'end_at' => 'Waktu Berakhir',
            'daily_booking_count' => 'Jumlah Hari',
            'hourly_booking_count' => 'Jumlah Jam',
            'notes' => 'Catatan Tambahan',
        ]);

        $booking1 = Booking::where('spot_id', $spot_id)->where('start_at', '>=', $request->start_at)->where('end_at', '<=', $request->end_at)->where('status', '>=', 0)->exists();
        $booking2 = Booking::where('spot_id', $spot_id)->where('end_at', '>=', $request->start_at)->where('start_at', '<=', $request->end_at)->where('status', '>=', 0)->exists();

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
            'hourly_booking_count' => $request->hourly_booking_count ?? 0,
            'notes' => $request->notes,
            'daily_booking_rate' => $spot->daily_booking_rate,
            'hourly_booking_rate' => $spot->hourly_booking_rate,
            'user_id' => auth()->user()->id,
            'spot_id' => $spot->id,
        ]);

        $booking = Booking::create($data);
        $booking->save();

        return redirect()->route('booking.thanks', ['booking_id' => $booking->id]);
    }

    public function thanks($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);

        return view('booking_thanks', [
            'booking' => $booking
        ]);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $page_title = 'Booking : '.$booking->spot->name;
        
        return view('booking_show', [
            'page_title' => $page_title,
            'booking' => $booking,
            'paymentable_type' => 'booking',
            'paymentable_id' => $booking->id,
        ]);
    }
}
