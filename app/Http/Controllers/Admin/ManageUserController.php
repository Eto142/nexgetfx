<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Escrow;
use App\Models\PaymentInfo;
use App\Models\PaymentProof;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    public function ManageUsers()
    {
        $users = User::paginate(10);
        
        if (request()->ajax()) {
            return response()->json([
                'html' => view('admin.partials.users_table', ['users' => $users])->render(),
                'pagination' => $users->links()->render()
            ]);
        }
        
        return view('admin.manage_users', ['users' => $users]);
    }

    public function ShowUsers () {

        return view('admin.user_data');
    }





//     public function userProfile($id)
// {
//     $user = DB::table('users')->where('id', $id)->first();

//     $data = [
//         'userProfile'       => $user,
//         'escrow_verification_details' => Escrow::where('user_id', $id)
//                                     ->orderBy('id', 'desc')
//                                     ->get(),

//         'user_payment' => PaymentInfo::where('user_id', $id)
//                                     ->orderBy('id', 'desc')
//                                     ->get(),

//          'user_payment_proof' => PaymentProof::where('user_id', $id)
//                                     ->orderBy('id', 'desc')
//                                     ->get(),                          


//         'user_withdrawal' => Withdrawal::where('user_id', $id)
//                                     ->orderBy('id', 'desc')
//                                     ->get(),
//     ];

//     return view('admin.user_data', $data);
// }


public function userProfile($id)
{
    $userProfile = DB::table('users')->where('id', $id)->first();
    
    // Get user records
    $userProfit = DB::table('profits')->where('user_id', $id)->orderBy('id', 'desc')->get();
    $kyc = DB::table('kycs')->where('user_id', $id)->orderBy('id', 'desc')->get();
    $deposit = Deposit::where('user_id', $id)->orderBy('id', 'desc')->get();
    $withdrawal = Withdrawal::where('user_id', $id)->orderBy('id', 'desc')->get();
    $plan = Plan::where('user_id', $id)->orderBy('id', 'desc')->get();
    $earning = Earning::where('user_id', $id)->orderBy('id', 'desc')->get();
    
    // Calculate totals
    $totalDeposit = DB::table('deposits')->where('user_id', $id)->where('status', '1')->sum('amount');
    $totalEarning = DB::table('earnings')->where('user_id', $id)->sum('amount');
    $addProfit = DB::table('profits')->where('user_id', $id)->sum('amount');
    $debitProfit = DB::table('debitprofits')->where('user_id', $id)->sum('amount');
    $totalProfit = $addProfit - $debitProfit;
    $totalBonus = DB::table('refferals')->where('user_id', $id)->sum('amount');
    $totalPlan = DB::table('plans')->where('user_id', $id)->sum('amount');
    $totalWithdrawal = DB::table('withdrawals')->where('user_id', $id)->sum('amount');
    $totalBalance = $totalDeposit + $totalEarning + $totalProfit + $totalBonus - $totalWithdrawal;
    
    // Transaction balances
    $credit = Transaction::where('user_id', $id)->where('status', '1')->sum('credit');
    $debit = Transaction::where('user_id', $id)->where('status', '1')->sum('debit');
    $user_balance = $credit - $debit;

    

    return view('admin.user_data', compact(
        'userProfile', 
        'userProfit', 
        'kyc',
        'deposit',
        'withdrawal', 
        'plan',
        'earning',
        'totalBalance',
        'totalProfit', 
        'totalDeposit', 
        'totalBonus', 
        'totalWithdrawal',
        'user_balance',
        'totalEarning'
    ));
}



        public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();


        return back()->with('status', 'User deleted successfully');
}




    public function addTransaction(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->transaction_id = $request->transaction_id;
    $user->transaction_type = $request->transaction_type;
    $user->escrow_amount = $request->escrow_amount;
    $user->service_fee = $request->service_fee;
    $user->total_amount = $request->total_amount;

    $user->save();

    return redirect()->back()->with('success', 'Transaction details updated successfully.');
}


 public function WithdrawalTaxCode(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->withdrawal_tax_code = $request->withdrawal_tax_code;

    $user->save();

    return redirect()->back()->with('success', 'Withdrawal Tax code updated successfully.');
}


public function WithdrawalStatus(Request $request, $id)
{
    $request->validate([
        'withdrawal_status' => 'required|in:0,1'
    ]);

    $user = User::findOrFail($id);
    $user->withdrawal_status = $request->withdrawal_status;
    $user->save();

    return redirect()->back()->with('success', 'Withdrawal Status updated successfully.');
}





    public function updateSignalStrength(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->signal_strength = $request->signal_strength;
        $user->save();
        return back()->with('success', 'Signal Strength update successful');
    }
    
     public function updateNotification(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->update_notification = $request->update_notification;
        $user->save();
        return back()->with('success', 'Notification update successful');
    }
    
    
     public function updateEscrow(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->update_escrow = $request->update_escrow;
        $user->save();
        return back()->with('success', 'Escrow Amount updated successfully');
    }



     
    public function updateTradefee(Request $request, $id)
    {

        $user  = User::where('id', $id)->first();
        $user->update_trade_fee = $request->update_trade_fee;
        $user->save();
        return back()->with('success', 'Trade Fee updated successfully');
    }


}





