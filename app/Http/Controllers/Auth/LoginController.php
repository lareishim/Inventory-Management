<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Log login
            activity()
                ->causedBy($user)
                ->withProperties([
                    'description' => 'User logged in from IP ' . $request->ip()
                ])
                ->log('login');

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function destroy(Request $request)
    {
        // Log logout
        activity()
            ->causedBy(Auth::user())
            ->withProperties([
                'description' => 'User logged out from IP ' . $request->ip()
            ])
            ->log('logout');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('');
    }
}
