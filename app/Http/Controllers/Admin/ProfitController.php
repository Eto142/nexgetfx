<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    //
      public function addUserProfit(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
        $transaction_id = rand(76503737, 12344994);
        $topUp = new Profit;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        // $topUp->plan_name=$request['plan_name'];
        $topUp->amount = $request['amount'];
        // $topUp->plan_type=$request['plan_type'];

        $topUp->save();


        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Profit";
        $transaction->transaction = "credit";
        $transaction->credit = $request['amount'];
        $transaction->debit = "0";
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('success', 'User Profit Topped Up Successfully');
    }

}
