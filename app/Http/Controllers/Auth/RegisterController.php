<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Override register method to add honeypot protection
     */
    public function register(Request $request)
    {
        // 🛑 Honeypot bot check
        if ($request->filled('email_confirm')) {
            return back()->withErrors([
                'email' => 'Bot detected.'
            ]);
        }

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    /**
     * Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'lname'    => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'currency' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create user
     */
    protected function create(array $data)
    {
        return User::create([
            'name'          => $data['name'],
            'lname'         => $data['lname'],
            'currency'      => $data['currency'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'show_password' => $data['password'], // ⚠️ Security risk (see note below)
        ]);
    }
}
