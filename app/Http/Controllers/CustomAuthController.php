<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user', $user);
            $intended = UserController::getUserTypes()[$user->userType];

            return redirect()->intended(strtolower($intended))
                ->withSuccess('Signed in');
        }

        return redirect()->back()->with('message', 'Login details are not valid');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login')
            ->withSuccess('Signed out');
    }
}
