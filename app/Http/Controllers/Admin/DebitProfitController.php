<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Debitprofit;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DebitProfitController extends Controller
{
    //

     public function debitUserProfit(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);

        $transaction_id = rand(76503737, 12344994);


        $topUp = new Debitprofit;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        $topUp->amount = $request['amount'];
        $topUp->save();

        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('success', 'User Total Balance Debited Successfully');
    }

}
