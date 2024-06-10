<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordReset; // Ensure you have this Mailable created
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class MailController extends Controller
{
    /**
     * Handle the incoming request to send a reset password link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgetpassword(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'mail' => 'required|email',
        ]);
        // dd($validatedData);

        // Generate a random token
        $token = bin2hex(random_bytes(32));


        try {
            // Send the email with the token
            Mail::send('email.resetpassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->mail);
                $message->subject('Subject is a mail');
            });
        } catch (Exception $e) {
            // dd($e);
        }


        // Return a response or redirect
        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function resetpassword()
    {
        return view('email.resetpassword');
        // Implementation for resetting password
    }

    public function resetpasswordpage()
    {
        return view('auth.resetpassword');

    }
}
