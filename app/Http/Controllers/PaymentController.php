<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($paymentable_type, $paymentable_id)
    {
        if($paymentable_type == 'booking') {
            $model = Booking::findOrFail($paymentable_id);
            $page_title = 'Tambah Pembayaran Booking '.$model->spot->name;
            $sub_title = 'Atas Nama '.$model->user->name;
        } else {
            return redirect()->back();
        }

        return view('payment_create', [
            'model' => $model,
            'paymentable_type' => $paymentable_type,
            'paymentable_id' => $paymentable_id,
            'page_title' => $page_title,
            'sub_title' => $sub_title,
        ]);
    }

    public function store(Request $request, $paymentable_type, $paymentable_id)
    {
        $request->validate([
            'method' => 'required',
            'amount' => 'integer|min:0',
            'notes' => 'nullable',
            'receipt' => 'required|image',
        ],[
            'required' => ':attribute wajib diisi',
            'integer' => ':attribute harus berupa angka',
            'image' => ':attribute tidak valid',
            'min' => ':attribute tidak boleh kurang dari :min',
        ],[
            'method' => 'Metode Pembayaran',
            'amount' => 'Nominal',
            'notes' => 'Catatan',
            'receipt' => 'Bukti Transfer',
        ]);

        if($paymentable_type == 'booking') {
            $model = Booking::findOrFail($paymentable_id);

            $data = ([
                'method' => $request->method,
                'amount' => $request->amount,
                'notes' => $request->notes,
                'status' => 0,
                'receipt' => $request->receipt,
                'user_id' => $model->user_id,
            ]);
        } else {
            return redirect()->back();
        }

        if ($request->file('receipt')){
            $fileName = $data['user_id'].time().'.'.$request->receipt->extension();
            $path = public_path('images/payments');        

            $data['receipt'] = $fileName;
            $request->receipt->move($path, $fileName);
        }

        $model->payments()->create($data);
        $model->save();

        return redirect()->route('member.bookings.show', ['id' => $model->id])->with('successMessage', 'Berhasil menambahkan pembayaran');
    }
}
