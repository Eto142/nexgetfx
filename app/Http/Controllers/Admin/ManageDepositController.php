<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class ManageDepositController extends Controller
{
    //

        public function UsersDepositHistory (){
          // Fetch paginated deposits
    $user_deposits = Deposit::orderBy('created_at', 'desc')->paginate(10);

    return view('admin.manage_deposit', compact('user_deposits'));

    }

}
