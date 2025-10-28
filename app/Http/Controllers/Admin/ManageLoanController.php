<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManageLoanController extends Controller
{
    //
     public function UsersLoans (){
          $user_loans = LoanApplication::where('user_id', auth()->id())
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(10); // or whatever number you prefer
        return view('admin.manage_loans', compact('user_loans'));

    }


  



public function AddUserLoan(Request $request)
{
    // Validate incoming request
    $validated = $request->validate([
        'id' => 'required|exists:users,id',
        'loan_amount' => 'required|numeric',
        'loan_type' => 'required|string',
        'first_name' => 'required|string',
        'loan_date' => 'required|date',
    ]);

    // Find user
    $user = User::findOrFail($validated['id']);

    // Generate reference number for loan
    $referenceNumber = 'LA-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

    // Create loan application
    $loan = new LoanApplication();
    $loan->user_id = $user->id;
    $loan->first_name = $validated['first_name'];
    $loan->loan_amount = $validated['loan_amount'];
    $loan->loan_type = $validated['loan_type'];
    $loan->created_at = $validated['loan_date'];
    $loan->reference_number = $referenceNumber; // <-- Store in loan table
    $loan->status = 1;
    $loan->save();

    // Generate unique transaction reference
    $ref = strtoupper(Str::random(10));

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = 'LN' . $ref;
    $transaction->transaction_type = 'Credit';
    $transaction->debit = 0;
    $transaction->credit = $validated['loan_amount'];
    $transaction->transaction = 'Loan';
    $transaction->transaction_amount = $validated['loan_amount'];
    $transaction->transaction_description = 'Loan Request of ₦' . number_format($validated['loan_amount']);
    $transaction->transaction_status = 1; // success
    $transaction->save();

    
  return redirect()->back()->with('success', 'Loan successfully added.');

}


public function AddUserOutstandingBalance(Request $request)
{
    // Validate request
    $validated = $request->validate([
        'id' => 'required|exists:users,id',
        'outstanding_balance' => 'required|numeric|min:0',
    ]);

    // Find the user
    $user = User::findOrFail($validated['id']);

    // // Generate loan reference number (only used if new)
    // $referenceNumber = 'LA-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

    // Update or create loan application for the user
    $loan = LoanApplication::updateOrCreate(
        ['user_id' => $user->id],
        [
            'outstanding_balance' => $validated['outstanding_balance'],
           
        ]
    );

    // Generate unique transaction reference
    $ref = strtoupper(Str::random(10));

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = 'LN' . $ref;
    $transaction->transaction_type = 'Debit';
    $transaction->credit = 0;
    $transaction->debit = $validated['outstanding_balance'];
    $transaction->transaction = 'Outstanding Balance';
    $transaction->transaction_amount = $validated['outstanding_balance'];
    $transaction->transaction_description = 'Loan Outstanding Balance of ₦' . number_format($validated['outstanding_balance'], 2);
    $transaction->transaction_status = 1;
    $transaction->save();

    return redirect()->back()->with('success', 'Outstanding balance successfully updated or created.');
}





public function AddMonthlyPay(Request $request)
{
    // Validate request
    $validated = $request->validate([
        'id' => 'required|exists:users,id',
        'monthly_payment' => 'required|numeric|min:0',
    ]);

    // Find the user
    $user = User::findOrFail($validated['id']);

    // // Generate loan reference number (only used if new)
    // $referenceNumber = 'LA-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

    // Update or create loan application for the user
    $loan = LoanApplication::updateOrCreate(
        ['user_id' => $user->id],
        [
            'monthly_payment' => $validated['monthly_payment'],
           
        ]
    );

    // Generate unique transaction reference
    $ref = strtoupper(Str::random(10));

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = 'LN' . $ref;
    // $transaction->transaction_type = 'Debit';
    // $transaction->credit = 0;
    // $transaction->debit = $validated['monthly_payment'];
    $transaction->transaction = 'monthly payment';
    $transaction->transaction_amount = $validated['monthly_payment'];
    $transaction->transaction_description = 'Monthly Payment of' . number_format($validated['monthly_payment'], 2);
    $transaction->transaction_status = 1;
    $transaction->save();

    return redirect()->back()->with('success', 'Monthly Payment successfully updated or created.');
}






public function AddInterestRate(Request $request)
{
    // Validate request
    $validated = $request->validate([
        'id' => 'required|exists:users,id',
        'interest_rate' => 'required|numeric|min:0',
    ]);

    // Find the user
    $user = User::findOrFail($validated['id']);

    // // Generate loan reference number (only used if new)
    // $referenceNumber = 'LA-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

    // Update or create loan application for the user
    $loan = LoanApplication::updateOrCreate(
        ['user_id' => $user->id],
        [
            'interest_rate' => $validated['interest_rate'],
           
        ]
    );

    // Generate unique transaction reference
    $ref = strtoupper(Str::random(10));

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = 'LN' . $ref;
    $transaction->transaction_type = 'Rate';
    $transaction->credit = 0;
    // $transaction->debit = $validated['interest_rate'];
    $transaction->transaction = 'Interest Rate';
    $transaction->transaction_amount = 0;
    $transaction->transaction_description = 'Interest Rate of' . number_format($validated['interest_rate'], 2);
    $transaction->transaction_status = 1;
    $transaction->save();

    return redirect()->back()->with('success', 'interest rate successfully updated.');
}




}

