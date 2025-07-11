<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordController extends Controller
{
    public function store(Request $request)
    {
        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'The provided password does not match our records.']);
        }

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended();
    }
}