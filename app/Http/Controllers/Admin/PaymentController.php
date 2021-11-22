<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Booking;
use App\Models\Infaq;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($paymentable_type, $paymentable_id)
    {
        if($paymentable_type == 'booking') {
            $model = Booking::findOrFail($paymentable_id);
            $page_title = 'Tambah Pembayaran Booking '.$model->spot->name;
            $sub_title = 'Atas Nama '.$model->user->name;
        } else {
            return redirect()->back();
        }

        return view('admin.payment_create', [
            'model' => $model,
            'paymentable_type' => $paymentable_type,
            'paymentable_id' => $paymentable_id,
            'page_title' => $page_title,
            'sub_title' => $sub_title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request, $paymentable_type, $paymentable_id)
    {
        if($paymentable_type == 'booking') {
            $model = Booking::findOrFail($paymentable_id);

            $data = ([
                'method' => $request->method,
                'amount' => $request->amount,
                'notes' => $request->notes,
                'status' => $request->status,
                'receipt' => $request->receipt,
                'confirm_at' => $request->confirm_at,
                'user_id' => $model->user_id,
            ]);
        } else {
            return redirect()->back();
        }

        $model->payments()->create($data);
        $model->save();

        return redirect()->route('admin.bookings.show', ['id' => $model->id])->with('successMessage', 'Berhasil menambahkan pembayaran');
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
    public function edit($paymentable_type, $paymentable_id, $id)
    {
        $payment = Payment::findOrFail($id);

        if($paymentable_type == 'booking') {
            $model = Booking::findOrFail($paymentable_id);
            $page_title = 'Perbarui Pembayaran Booking '.$model->spot->name;
            $sub_title = 'Atas Nama '.$model->user->name;
        } elseif($paymentable_type == 'infaq') {
            $model = Infaq::findOrFail($paymentable_id);
            $page_title = 'Infaq '.$model->name;
            $sub_title = 'Atas Nama '.$payment->user->name;
        } else {
            return redirect()->back();
        }

        return view('admin.payment_edit', [
            'model' => $model,
            'payment' => $payment,
            'paymentable_type' => $paymentable_type,
            'paymentable_id' => $paymentable_id,
            'page_title' => $page_title,
            'sub_title' => $sub_title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, $paymentable_type, $paymentable_id, $id)
    {
        $payment = Payment::findOrFail($id);

        if($paymentable_type == 'booking') {
            $model = Booking::findOrFail($paymentable_id);
        } elseif($paymentable_type == 'infaq') {
            $model = Infaq::findOrFail($paymentable_id);
        } else {
            return redirect()->back();
        }

        $data = ([
            'method' => $request->method,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'status' => $request->status,
            'receipt' => $request->receipt,
            'confirm_at' => $request->confirm_at,
            'user_id' => $payment->user_id,
        ]);

        $payment->update($data);

        if ($paymentable_type == 'booking') {
            return redirect()->route('admin.bookings.show', ['id' => $model->id])->with('successMessage', 'Berhasil memperbarui pembayaran');
        } elseif ($paymentable_type == 'infaq') {
            return redirect()->route('admin.infaq.show', ['id' => $model->id])->with('successMessage', 'Berhasil memperbarui pembayaran');
        }
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
