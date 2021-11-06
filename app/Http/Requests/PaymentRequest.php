<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'method' => 'required',
            'amount' => 'integer|min:0',            
            'notes' => 'nullable',
            'status' => 'required|integer',
            'receipt' => 'nullable',
            'confirm_at' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'method' => 'Metode Pembayaran',
            'amount' => 'Nominal Pembayaran',            
            'notes' => 'Catatan',
            'status' => 'Status Pembayaran',
            'receipt' => 'Bukti Pembayaran',
            'confirm_at' => 'Tanggal Konfirmasi',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'integer' => ':attribute harus berupa angka',
            'min' => ':attribute harus lebih besar dari :min',
        ];
    }
}
