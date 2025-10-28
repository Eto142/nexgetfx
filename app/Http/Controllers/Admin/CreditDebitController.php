<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TransactionNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Credit;
use App\Models\Debit;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreditDebitController extends Controller
{
    //


public function creditUser(Request $request)
{
    
    $ref = rand(76503737, 12344994);
    $credit = new Credit;
    $credit->user_id = $request['id'];
    $credit->amount =  $request['amount'];
    $credit->description =  $request['description'];
    $credit->status = 1;
    $credit->save();

    $transaction = new Transaction;
    $transaction->user_id = $request['id'];
    $transaction->transaction_id = $credit->id;
    $ref = $transaction->transaction_ref = "CD".$ref;
    $transaction->transaction_type = "Credit";
    $transaction->transaction = "Credit";
    $transaction->transaction_amount = $request['amount'];
    $transaction->transaction_description = "Credit transaction";
    $transaction->transaction_status = 1;
    $transaction->save();

    $full_name = $request['name'];  
    $email =  $request['email'];
    $amount = $request->input('amount');
    $date = Carbon::now();  
    $balance =  $request['balance'] + $request['amount'];
    $description =  $request['description'];
    $a_number =  $request['a_number'];
    $currency =  $request['currency'];
      
    $user = [

      'account_number' => $a_number,
      'account_name' => $full_name,
      'full_name' => $full_name,
      'description' => $description,
      'amount' => $amount,
      'date' => $date,
      'balance' => $balance,
      'currency' => $currency,
      'ref' => $ref,
     ];
    
    // Mail::to($email)->send(new CreditEmail ($user));

    

    return back()->with('status', 'User account credit successfully');
}


public function debitUser(Request $request)
{
    


   
    $ref = rand(76503737, 12344994);
    $debit = new Debit;
    $debit->user_id = $request['id'];
    $debit->amount =  $request['amount'];
    $debit->description =  $request['description'];
    $debit->status = 1;
    $debit->save();

    $transaction = new Transaction;
    $transaction->user_id = $request['id'];
    $transaction->transaction_id = $debit->id;
    $ref = $transaction->transaction_ref = "DB".$ref;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "Debit";
    $transaction->transaction_amount = $request['amount'];
    $transaction->transaction_description = "Debit Transaction";
    $transaction->transaction_status = 1;
    $transaction->save();



    $full_name = $request['name'];  
    $email =  $request['email'];
    $amount = $request->input('amount');
    $date = Carbon::now();  
    $balance =  $request['balance'] - $request['amount'];
    $description =  $request['description'];
    $a_number =  $request['a_number'];
    $currency =  $request['currency'];
      
    $user = [

      'account_number' => $a_number,
      'account_name' => $full_name,
      'full_name' => $full_name,
      'description' => $description,
      'amount' => $amount,
      'date' => $date,
      'balance' => $balance,
      'currency' => $currency,
      'ref' => $ref,
     ];
    
    // Mail::to($email)->send(new DebitEmail ($user));

    return back()->with('status', 'User account debit successfully');
}

}
