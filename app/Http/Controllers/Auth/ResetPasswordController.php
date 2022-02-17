<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Hash,Auth;
use DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function getResetPassword()
    {
        if(!empty($_GET['email']) && !empty($_GET['token'])){

            $check = DB::table('password_resets')->where('email',$_GET['email'])->where('token',$_GET['token'])->first();

            if($check){

        $user = User::where('email',$_GET['email'])->first();
        
        return view('auth.passwords.reset',compact('user'));
            }

             else{
            echo 'This link does not exist any more.';
        }

        }
        else{
            echo 'This link does not exist any more.';
        }
    }
     public function postResetPassword(Request $request)
    {
        
         $data = $request->all();
      
    if($data['password'] == $data['password_confirmation']){
        $user = $data['email'];
        User::where('email',$user)->update(['password'=> Hash::make($data['password'])]);


        DB::table('password_resets')->where('email',$data['email'])->delete();



        $user = User::where('email',$user)->first();
        Auth::login($user);

        if($user->user_role == 'customer'){
        return redirect()->route('home');

        }
        else{

        return redirect()->route('admin.dashboard');
        }
    }
    else{
        return redirect()->back()->with('message','Password did not match');

    }
    }
    
    
    
}
