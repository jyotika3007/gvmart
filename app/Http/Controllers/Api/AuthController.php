<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\DB;
use Mail;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }


    // Post Login API for customers
    public function postLogin(Request $request)
    {
        if ($request->email != '' && $request->password != '') {

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->has('remember'))) {

                // echo 'Yes'; die;
                if (Auth::user()->user_role == 'customer' && Auth::user()->status == 1 && Auth::user()->account_status == 'Active') {
                    $token = Hash::make(time());
                    User::where('email', $request->email)->update(['remember_token' => $token]);
                    // print_r('1');die;
                    return response()->json([
                        'status' => 1,
                        'message' => 'Login successful.',
                        'access-token' => $token,
                        'user_id' => Auth::user()->id

                    ]);
                } elseif (Auth::user()->status == 0 || Auth::user()->account_status == 'Ban') {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Your account is blocked.',
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Invalid credentials.',
                    ]);
                }
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Invalid Email Id & Password.',
                ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Email Id & Password both are mendatory',
            ]);
        }
    }


    // Post Register Api for customers
    public function postRegister(Request $request)
    {
        $data = $request->all();

        if ($data['email'] == '' || $data['name'] == '' || $data['password'] == '') {
            return response()->json([
                'status' => 0,
                'message' => 'Name, Email & Password field is mendatory',
            ]);
        } else {

           
            $checkUser = User::where('email', $request->email)->first();

            if ($checkUser) {
                return response()->json([
                    'status' => 0,
                    'message' => 'This Email is already registered.',
                ]);
            } else {

                if(count(str_split($data['password']))<6){
                    return response()->json([
                        'status' => 0,
                        'message' => 'Password should not be less then 6 characters.',
                    ]);
                }

                $data['status'] = 1;
                $data['password'] = Hash::make($data['password']);
                $data['user_role'] = 'customer';

                $userId = User::insertGetId($data);

                $otp = rand(100000,999999);
                
                $otpId = DB::table('email_verifications')->insertGetId([
                    'email' => $data['email'],
                    'otp' => $otp,
                    'verified' => 0
                ]);
                Mail::send('mails.otp',['otp'=>$otp],
                function ($m) use ($request) {
                    $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                    $m->to($request->email, "User")->subject('OTP For Email verification');
                });
                if ($otpId) {
                    return response()->json([
                        'status' => 1,
                        'message' => 'OTP is send to your mail id.',
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Something went wrong',
                    ]);
                }
            }
        }
    }


    // Verify OTP for customers
    public function verifyOtp(Request $request)
    {
        $data = $request->all();

        if ($data['email'] == '' || $data['otp'] == '') {
            return response()->json([
                'status' => 0,
                'message' => 'Email or OTP missing.',
            ]);
        } else {
            $checkOtp = DB::table('email_verifications')->where('email', $data['email'])->get()->last();

            if ($checkOtp->verified == 0) {
                if ($checkOtp->otp == $data['otp']) {
                    DB::table('email_verifications')->where('id', $checkOtp->id)->update(['verified' => 1]);

                    User::where('email', $data['email'])->update(['account_status' => 'Active']);
                    $user= User::where('email', $data['email'])->first(['name']);
                    
                    $data['name']=$user->name;
                    
                    Mail::send('mails.register-user',['data' => $data, 'type' => 'admin'],
                    function ($m) use ($data) {
                        $m->from( env('MAIL_USERNAME'), env('APP_NAME') );
                        $m->to(env('MAIL_ADMIN'), env('APP_NAME'))->subject('New User Registration');
                    });
                                   
                    Mail::send('mails.register-user',['data' => $data, 'type' => 'user'],
                        function ($m) use ($data) {
                            $m->from( env('MAIL_USERNAME'), env('APP_NAME') );
                            $m->to($data['email'], $data['name'])->subject('Registration Successful');
                        });
                    return response()->json([
                        'status' => 1,
                        'message' => 'OTP Verified. Successfully Registered',
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Invalid OTP.',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Invalid Request.',
                ]);
            }
        }
    }


    // Forgot Password to send a link on mail
    public function forgotPassword(Request $request)
    {
        if ($request->email == '') {
            return response()->json([
                'status' => 0,
                'message' => 'Email Id is required',
            ]);
        } else {
            $checkUser = User::where('email', $request->email)->first();
            if ($checkUser) {

                if ($checkUser->status == 1) {
                    
                    $random_token = rand('1000000','999999999');

                    $token = Hash::make($random_token);
                    
                     $newLink = DB::table('password_resets')->insert(array(
                        'email' => $checkUser->email,
                        'token' => $token
                    ));
                    
                    $link = 'reset-password?email='.$checkUser->email.'&token='.$token;
            
                    Mail::send('mails.forgotPassword', ['user' => $checkUser, 'link' => $link],
                        function ($m) use ($checkUser) {
                     $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                     $m->to($checkUser->email, $checkUser->name ?? '')->subject('Reset Password');
                 });
                    
                    return response()->json([
                        'status' => 1,
                        'message' => 'Reset Password Link is send to your email id.',
                    ]);
                } else {
                    if ($checkUser->status == 0 && $checkUser->account_status == 'Active') {
                        return response()->json([
                            'status' => 0,
                            'message' => 'This email id is blocked.',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 0,
                            'message' => 'Invalid Request',
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Invalid email id.',
                ]);
            }
        }
    }

    // Reset Password for customer
    public function resetPassword(Request $request)
    {
        $header = $request->header('Authorization');

        if ($header) {
            $data = $request->all();
            
            if ($data['user_id'] == '' && $data['password'] == '') {
                return response()->json([
                    'status' => 0,
                    'message' => 'Email & Password both are mendatory.',
                ]);
            } else {
                User::where('id', $data['user_id'])->update(['password'=>Hash::make($data['password'])]);
            // print_r($data); die;
                return response()->json([
                    'status' => 1,
                    'message' => 'Password updated successfully.',
                ]);
            }
        } else {
            return response()->json([
                "status" => "400",
                "message" => "Bad Request. Access token required",
            ]);
        }
    }
    
}
