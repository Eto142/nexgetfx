<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
{
    

     public function usersDeposit(){

        $user_deposits = Deposit::where('user_id', auth()->id())
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(10); // or whatever number you prefer
        return view('admin.manage_deposit', compact('user_deposits'));
    }


    
    public function approveDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 1;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['transaction_status' => 1]);

     $email = $deposit->email; 
     $amount = $deposit->amount;
     $deposit_type = $deposit->deposit_type;

   $data = "Your check has been approved successfully!";

//    Mail::to($email)->send(new approveDepositEmail($data));
    return redirect()->back()->with('message', 'Your check Has Been Approved Successfully');
}




public function DeclineDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 2;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['transaction_status' => 2]);
     $email = $deposit->email; 
     $amount = $deposit->amount;
     $reason = $deposit->reason;
    

    $data = "Your $" . $amount ." check has been declined!";

    // Mail::to($email)->send(new declineDepositEmail($data));
    return redirect()->back()->with('message', 'Deposit Has Been Declined Successfully');
}





    public function addUserDeposit(Request $request)
    {
        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
        $transaction_id = rand(76503737, 12344994);
        $topUp = new Deposit;
        $topUp->transaction_id = $transaction_id;
        $topUp->user_id = $request['user_id'];
        $topUp->payment_method = $request['payment_method'];
        $topUp->amount = $request['amount'];
        $topUp->status = 1;
        $topUp->created_at = $request['deposit_date'];
       
        $topUp->save();




        $transaction = new Transaction;
        $transaction->user_id = $request['user_id'];
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Credit";
        $transaction->transaction = "credit";
        $transaction->credit = $request['amount'];
        $transaction->debit ="0";
        $transaction->status = 1;
        $transaction->save();


        return redirect()->back()->with('success', 'User Deposit Added Successfully');
        
    }


}
