<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;

use Illuminate\Auth\Events\PasswordReset as EventsPasswordReset;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $user = User::where('email', $request->mail)->first();
        // dd($user);
        if($user){

        // Generate a random token
        $token = bin2hex(random_bytes(32));

        DB::table('password_resets')->insert([
            'email' => $request->mail,
            'token' => $token,
            'created_at' => now()
        ]);


        try {
            // Send the email with the token
            Mail::send('email.resetpassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->mail);
                $message->subject('Subject is a mail');
            });
             // Redirect with success message if the email is sent successfully
             return redirect()->back();
        } catch (Exception $e) {
            // dd($e);
        }


        // Return a response or redirect
        return back()->with('status', 'We have emailed your password reset link!');
    }

    }

    public function resetpassword()
    {
        return view('email.resetpassword');
        // Implementation for resetting password
    }

    public function resetpasswordpage($token)
    {
        $resetPassword = PasswordReset::where('token', $token)->first();

        if ($resetPassword) {
            $createdAt = $resetPassword->created_at;
            $now = now();

            // Calculate the difference in minutes
            $differenceInMinutes = $createdAt->diffInMinutes($now);

            if ($differenceInMinutes <= 1) {
                return view('auth.resetpassword', ['token' => $token, 'email' => $resetPassword->email]);
            } else {
                return view('email.unauthorizedtoke');
            }
        } else {
            return view('email.unauthorizedtoke');
        }
    }

    public function reset(Request $request)
    {
        $resetPassword = PasswordReset::where('token', $request->token)->first();

        if ($resetPassword) {
            $createdAt = $resetPassword->created_at;
            $now = now();

            // Calculate the difference in minutes
            $differenceInMinutes = $createdAt->diffInMinutes($now);
            // dd($differenceInMinutes);



            if ($differenceInMinutes <= 1) {

                $pin = $request->pin1 . $request->pin2 . $request->pin3 . $request->pin4;
                $confirmPin = $request->confirm_pin1 . $request->confirm_pin2 . $request->confirm_pin3 . $request->confirm_pin4;
            }
            else {
                return view('email.pageexpired');
            }



            if($pin === $confirmPin){

                $user = User::where('email', $resetPassword->email)->first();
                if ($user) {
                    $user->pin1 = $request->pin1;
                    $user->pin2 = $request->pin2;
                    $user->pin3 = $request->pin3;
                    $user->pin4 = $request->pin4;
                    $user->save();

                    // Generate a new token
                    $newToken = Str::random(60);

                    $resetPassword->token = $newToken;
                    $resetPassword->save();

                    return view('auth.signin');
            }
            else
            {
                return back()->withErrors('fail');
            }


        }




}
}
}
