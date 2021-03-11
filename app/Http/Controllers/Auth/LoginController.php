<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use App\Traits\RedirectToDashboard;

class LoginController extends Controller
{

    use RedirectToDashboard;

    public function register()
    {
        return  view('Landing.Sign-up');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('home');
    }




    // login  module

    public function login()
    {
        return view('Landing.login');
    }

    public function authenticate(Request $request)
    {



        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('phone', 'password');

            
        if (Auth::attempt($credentials)) {

            return redirect()->route($this->redirectToDashboard(Auth::User()->role));
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }


    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

    public function home()
    {
        return view('home');
    }
}
