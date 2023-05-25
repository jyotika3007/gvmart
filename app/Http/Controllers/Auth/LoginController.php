<?php

namespace App\Http\Controllers\Auth;

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
        // print_r('Login'); die;
        return view('auth.admin.login');
    }



    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ],$request->has('remember'))){
            // echo 'Yes'; die;
                if ( (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'vendor')  && Auth::user()->status==1 && Auth::user()->account_status=='Active'){
                        return redirect('admin/dashboard');                    
                }
                elseif(Auth::user()->status==0 || Auth::user()->account_status=='Ban'){
                    return redirect('/admin/login')->with(
                        'credentials' , 'This Account has been blocked. Please contact to Admin'
                            );
                }
                
                else{
                    return redirect('/admin/login')->with(
                                'credentials' , 'Please, check your credentials'
                            );
                }

        }
        else
            return redirect('admin/login')->with(
                                'credentials' , 'Please, check your credentials'
                            );
            
    
     }



}
