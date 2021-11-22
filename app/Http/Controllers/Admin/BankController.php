<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $page_title = 'Akun Bank';

        $banks = Bank::get();

        return view('admin.bank_index', [
            'page_title' => $page_title,
            'banks' => $banks,
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Akun Bank';
        return view('admin.bank_create', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        $data = ([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'branch' => $request->branch,
        ]);

        $bank = Bank::create($data);
        $bank->save();

        return redirect()->route('admin.banks.index')->with('successMessage', 'Berhasil menambahkan bank baru');
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        
        $page_title = 'Edit Akun Bank '.$bank->bank_name;

        return view('admin.bank_edit', [
            'page_title' => $page_title,
            'bank' => $bank,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'branch' => $request->branch,
        ]);

        $bank = Bank::findOrFail($id);
        $bank->update($data);

        return redirect()->route('admin.banks.index')->with('successMessage', 'Berhasil memperbarui data');
    }
}
