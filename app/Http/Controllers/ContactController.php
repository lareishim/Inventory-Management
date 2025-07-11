<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Optionally store to DB or send an email
        // Mail::to('support@autopartspro.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }

}
