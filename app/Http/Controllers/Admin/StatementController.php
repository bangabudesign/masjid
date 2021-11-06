<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialStatement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Laporan Keuangan';

        $statements = FinancialStatement::latestFirst()->get();

        return view('admin.statement_index', [
            'page_title' => $page_title,
            'statements' => $statements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Buat Laporan';
        return view('admin.statement_create', [
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
            'title' => $request->title,
            'income' => $request->income,
            'outcome' => $request->outcome,
            'body' => $request->body,
            'recording_at' => $request->recording_at,
            'user_id' => auth()->user()->id,
        ]);

        $event = FinancialStatement::create($data);
        $event->save();

        return redirect()->route('admin.statements.index')->with('successMessage', 'Berhasil menambahkan data baru');
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
        $statement = FinancialStatement::findOrFail($id);
        
        $page_title = 'Edit Laporan '.$statement->name;

        return view('admin.statement_edit', [
            'page_title' => $page_title,
            'statement' => $statement,
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
            'title' => $request->title,
            'income' => $request->income,
            'outcome' => $request->outcome,
            'body' => $request->body,
            'recording_at' => $request->recording_at,
        ]);

        $statement = FinancialStatement::findOrFail($id);

        $statement->update($data);

        return redirect()->route('admin.statements.index')->with('successMessage', 'Data berhasil diperbarui');
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
