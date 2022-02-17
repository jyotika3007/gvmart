<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


 
    public function getlogin(){
        return view('auth.login');
    }


    public function login(Request $request)
    {

    $data = $request->all();

    // var_dump($data); die;

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ])){
            // echo 'Yes'; die;
                if (Auth::user()->user_role == 'customer' && Auth::user()->status==1 && Auth::user()->account_status=='Active'){
                        return redirect('home');                    
                }
                
               elseif(Auth::user()->status==0 || Auth::user()->account_status=='Ban'){
                    return redirect('/login')->with(
                        'credentials' , 'This Account has been blocked. Please contact to Admin'
                            );
                }
                
                else{
                    return redirect('/login')->with(
                                'credentials' , 'Invalid credentials'
                            );	
                }

        }
        else{

            // echo 'No'; die;
            return redirect('login')->with(
                                'credentials' , 'Please, check your credentials'
                            );
        }
            
    
     }



}
