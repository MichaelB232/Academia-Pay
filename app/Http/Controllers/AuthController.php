<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', "Username tidak ditemukan");
        }
        // if (!Hash::check($request->password, $user->password)) {
        //     return back()->with('error', "Password Salah");
        // }
        Auth::login($user);
        return redirect('/dashboard');
    }
}
