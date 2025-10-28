<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function index (){

          // User Statistics
        $newUsersCount = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $totalUsersCount = User::count();
        $totalDepositCount = Deposit::count();
        $totalPlanCount = Plan::count();
        $totalTransactionCount = Transaction::count();
        $totalWithdrawalCount = Withdrawal::count();
        //  $totalTransactionCount = Transaction::count();

         // Recent Activity
        $recentUsers = User::latest()->take(5)->get();
        $result = DB::table('users')
    ->where('id', '!=', 4)
    ->get();




        return view('manager.home', compact(
            'newUsersCount',
            'totalUsersCount',
            'totalDepositCount',
            'totalPlanCount',
            'totalWithdrawalCount',
            'totalTransactionCount',
            'recentUsers',
            'result',
        ));
     
    }


    

}
