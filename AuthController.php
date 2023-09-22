<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth1.login');
    }
    public function dashboardView()
    {
        return view('comlabmgmt.dashboard');
    }

    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => 'required',
        ]);

       $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('message','You have Successfully loggedin');
        }
        return redirect('/login')->with('message','Oppes! You have entered invalid credentials');
    }
}
