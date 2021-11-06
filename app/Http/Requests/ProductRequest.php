<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|alpha_dash|max:255|unique:spots,slug,'.$this->id,            
            'body' => 'nullable',
            'price' => 'required|integer|min:0',
            'is_active' => 'required|integer',
            'image' => 'required_without:old_image|image|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama Produk',
            'slug' => 'Link',            
            'body' => 'Deskripsi',
            'price' => 'Harga Produk',
            'is_active' => 'Status',
            'image' => 'Gambar',
        ];
    }

    public function messages()
    {
        return [
            'min' => ':attribute tidak boleh kurang dari :min',
            'required' => ':attribute tidak boleh kosong',
            'integer' => ':attribute harus berupa angka',            
            'unique' => ':attribute sudah terdaftar coba kata yang lain',
            'required_without' => ':attribute tidak boleh kosong',
            'slug' => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.'
        ];
    }
}
