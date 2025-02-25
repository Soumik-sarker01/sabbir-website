<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to('collab@sabbirtareq.com')
                ->subject($request->subject)
                ->replyTo($request->email);
        });

        return back()->with('success', 'Your message has been sent successfully.');
    }
}
