<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller {


    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';

    public function login() {
        if (Auth::guard('web')->check()) {
            return redirect()->route('dashboard');
        }

        return view('home');
    }

    public function postLogin(Request $request) {

        $emailOrPassword = $request->emailOrPassword;
        $password = $request->password;

       if (auth()->guard('web')->attempt(['username' => $emailOrPassword, 'password' => $password]) || auth()->guard('web')->attempt(['email' => $emailOrPassword, 'password' => $password]) ) {
           return redirect()->route('forum');
       }

       return  redirect()->back()->withErrors(
           [
               'emailOrPassword' => 'Ces identifiants ne correspondent pas !'
           ]
           );
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('main');
    }

}
