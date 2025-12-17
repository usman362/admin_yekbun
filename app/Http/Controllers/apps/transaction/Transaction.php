<?php

namespace App\Http\Controllers\apps\transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;

class Transaction extends Controller
{
    public function index()
    {
        $transactions = ModelsTransaction::get()->groupBy('created_at');
        return view('content.incomes.index', compact('transactions'));
    }

    public function daily(Request $request)
    {
        $transactions = ModelsTransaction::
        where('date', $request->date)->
        with(['invoice','user'])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $transactions
        ]);
    }
}
