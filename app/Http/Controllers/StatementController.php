<?php

namespace App\Http\Controllers;

use App\Models\FinancialStatement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function index()
    {
        $statements = FinancialStatement::get();
        $page_title = 'Laporan Keuangan';

        return view('statement_index', [
            'page_title' => $page_title,
            'statements' => $statements,
        ]);
    }
}
