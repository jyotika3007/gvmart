<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;
use App\User;
use Hash;
use  DB;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function forgot_password(){
        return view('auth.passwords.email');
    }
    
    public function sendEmail(Request $request){
        
        $user= User::where('email',$request->email)->first();

        
        
        
        if(!empty($user)){


            $random_token = rand('1000000','999999999');

        $token = Hash::make($random_token);

        $newLink = DB::table('password_resets')->insert(array(
            'email' => $user->email,
            'token' => $token
        ));


            $link = 'reset-password?email='.$user->email.'&token='.$token;
            
            Mail::send('mails.forgotPassword', ['user' => $user, 'link' => $link],
                 function ($m) use ($user) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($user->email, $user->name ?? '')->subject('Reset Password');
                    //  $m->to('jyotikasethi3007@gmail.com', $user->name)->subject('Order Invoice');
                 });
            
            return redirect()->back()->with('message','We have send your reset password link on your mail id.');
        }
        else{
            return redirect()->back()->with('message','Invaid Email Id.');
        }
        
    }

    
}
