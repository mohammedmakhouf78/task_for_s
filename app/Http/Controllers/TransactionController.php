<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function checkoutPage()
    {
        return view('checkoutPage');
    }

    public function createTransaction(Request $request)
    {
        Transaction::create([
            'payment_id' => $request->payment_id,
            'amount' => $request->amount,
            'currency' => $request->currency_code,
            'status' => $request->status,
            'created_at' => $request->create_time
        ]);

        return response()->json([
            'status' => 200
        ]);
    }

    public function transactionsPage()
    {
        return view('transactionsPage');
    }

    public function getTransactions(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');

        $filter = $request->get('search');
        $search = (isset($filter['value']))? $filter['value'] : false;

        $recordsTotal = Transaction::count();

        $transactions = Transaction::where('id','like',"%". $search ."%")
            ->orWhere('payment_id','like',"%". $search ."%")
            ->orWhere('amount','like',"%". $search ."%")
            ->orWhere('currency','like',"%". $search ."%")
            ->orWhere('status','like',"%". $search ."%")
            ->orWhere('created_at','like',"%". $search ."%")
            ->limit($length)
            ->offset($start)
            ->get();

        $data = [
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $transactions,
        ];

        return response()->json($data);
    }
}
