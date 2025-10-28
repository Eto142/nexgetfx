<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Refferal;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AddRefferalController extends Controller
{
    //

    public function addUserReferral(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);



        $transaction_id = rand(76503737, 12344994);
        $topUp = new Refferal;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        $topUp->amount = $request['amount'];

        $topUp->save();




        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "credit";
        $transaction->credit =  $request['amount'];
        $transaction->debit = "0";
        $transaction->status = 1;
        $transaction->save();
        return redirect()->back()->with('success', 'User Bonus Added Successfully');
    }
}
