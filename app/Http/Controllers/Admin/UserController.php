<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users');
    }

    public function destroy($id)
    {
        $userToDelete = \App\Models\User::findOrFail($id);

        // Prevent self-deletion
        if (auth()->id() === $userToDelete->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        // Prevent admin from deleting a super-admin
        if (auth()->user()->hasRole('admin') && $userToDelete->hasRole('super-admin')) {
            return redirect()->back()->with('error', 'Admins are not allowed to delete Super Admins.');
        }

        $userToDelete->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function store(Request $request)
    {       
        if (auth()->user()->role !== 'super-admin') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,admin,super-admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }
}