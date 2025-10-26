<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
         if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Your session has expired. Please log in again.');
        }
        
        
       if (Auth::user()->country == '')  {
                    
                 $email = Auth::user()->email;
                 $validToken = rand(7650, 1234);
                 $get_token = Auth::user();
                 $get_token ->token = $validToken;
                 $get_token ->update();
                //  Mail::to($email)->send(new VerificationEmail($validToken));
                 
                 return redirect("update_details");}
                 
                 
                if (Auth::user()->is_activated == '0') {
                       
                 $email = Auth::user()->email;
                 $validToken = rand(7650, 1234);
                 $get_token = Auth::user();
                 $get_token ->token = $validToken;
                 $get_token ->update();
                //  Mail::to($email)->send(new VerificationEmail($validToken));

                 return redirect("verify/" . Auth::user()->id)->with('message', 'Please Verify Your Email');
                
                 
                
                 }
        
        

       
    

        return $next($request);
    }
}
