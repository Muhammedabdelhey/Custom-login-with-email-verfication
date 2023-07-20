<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Mail\RestPassword;
use App\Mail\SendVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class registre extends Controller
{
    public function register()
    {
        return view("Auth.regstation");
    }
    public function registerRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        //we make event to send verify mail whene user created
        // meth 1 use build in event look on app service provider(we send email to verifiy)
        //meth 2 create event(user created) and liesner (send verify mail)
        event(new UserCreated($user));
        return redirect('/');

    }

    public function sendVerifyMail($email)
    {
        Mail::to($email)->send(new SendVerificationMail($email));
        return redirect('/');
    }

    public function verifyEmail($email)
    {
        $user = User::where("email", $email)->first();
        $user->email_verified_at = now();
        $user->save();
        Auth::login($user);
        return redirect('home');
    }

    public function resetPassword($email)
    {
        return view('Auth.resetpassword', compact('email'));
    }

    public function sendResetPasswordMail($email)
    {
        Mail::to($email)->send(new RestPassword($email));
        return redirect('/home');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);
        $user = User::where("email", $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/home');
    }
}
