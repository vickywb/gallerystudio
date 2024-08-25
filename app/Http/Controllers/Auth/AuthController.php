<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProccess(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
           return redirect()->back()->withErrors([
            'errors' => "Email or password doesn't match."
           ]);
        }

        return "login success";
    }
}
