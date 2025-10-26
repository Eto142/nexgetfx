<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deposit;

class HomeController extends Controller
{
    public function redirect()
    {
       if (Auth::id())
       {
          if(Auth::user()->usertype=='0')
          {
            $data['deposit'] = Deposit::where('user_id',Auth::user()->id)->sum('amount');
            return view('dashboard.home',$data);
          }
          else {
            return view('admin.home',compact('user'));
          }
       }
       else 
       {
          return redirect()->back();
       }
    }


    

}

