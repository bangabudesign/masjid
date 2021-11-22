<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Infaq;
use App\Models\Payment;
use Illuminate\Http\Request;

class InfaqController extends Controller
{
    public function index()
    {
        $infaq = Infaq::get();
        $page_title = 'Infaq & Sedekah';

        return view('infaq_index', [
            'page_title' => $page_title,
            'infaq' => $infaq,
        ]);
    }

    public function form($id)
    {
        $infaq = Infaq::findOrFail($id);
        $page_title = 'Infaq & Sedekah';
        $sub_title = 'Untuk Program '.$infaq->name;

        return view('infaq_form', [
            'page_title' => $page_title,
            'sub_title' => $sub_title,
            'infaq' => $infaq,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'amount' => 'integer|min:1000',
            'notes' => 'nullable',
        ],[
            'required' => ':attribute wajib diisi',
            'integer' => ':attribute harus berupa angka',
            'min' => ':attribute tidak boleh kurang dari :min',
        ],[
            'method' => 'Metode Pembayaran',
            'amount' => 'Nominal',
            'notes' => 'Catatan',
        ]);

        $model = Infaq::findOrFail($request->id);

        $data = ([
            'paymentable_type' => 'App\Models\Infaq',
            'paymentable_id' => $model->id,
            'method' => $request->method,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'status' => 0,
            'user_id' => auth()->user()->id,
        ]);

        $payment = Payment::create($data);
        $payment->save();

        return redirect()->route('infaq.invoice', ['id' => $payment->id])->with('successMessage', 'Segera lakukan pembayaran');
    }

    public function invoice($id)
    {
        $payment = Payment::findOrFail($id);
        $page_title = 'Infaq & Sedekah';

        $banks = Bank::get();

        return view('infaq_invoice', [
            'page_title' => $page_title,
            'payment' => $payment,
            'banks' => $banks,
        ]);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $data = ([]);

        if ($request->file('receipt')){
            $fileName = $payment->user_id.time().'.'.$request->receipt->extension();
            $path = public_path('images/payments');        

            $data['receipt'] = $fileName;
            $request->receipt->move($path, $fileName);
        }

        $payment->update($data);

        return redirect()->back();
    }
}
