<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show forgot password form
    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Send reset link email
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token' => $token, 'email' => $request->email]);

        $body = "We received a request to reset your password for your account. 
        Click the link below to reset your password.";

        Mail::send('emails.forgetPassword', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('support@nexgetcpt.online', 'NexgetCpt');
            $message->to($request->email)
                    ->subject('Reset Password');
        });

        return back()->with('message', 'A reset link has been sent to your email.');
    }

    // Show reset form
    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // Handle password reset
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$check_token) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect()->route('login')->with('message', 'Your password has been successfully reset!');
    }
}
