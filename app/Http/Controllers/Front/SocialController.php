<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use Log;



class SocialController extends Controller
{

 public function __construct()
 {
   $user = \Auth::user();
 }
 
 public function redirect($provider)
 {
  
  return Socialite::driver($provider)->redirect();
}


function createUser($getInfo, $provider){
 $user = User::where('provider_id', $getInfo->id)->first();
 
 if (!$user) {
       // check for email exist
  $userExist = User::where('email', $getInfo->email)->first();

  if($userExist){
    User::where('id',$userExist->id)->update(['provider' => $provider,
      'provider_id' => $getInfo->id]);
    return $userExist;
  } else{
    $user = new User;
    $password = 'asd12345';
    $user->name  = $getInfo->name ?? '';
    $user->email    = $getInfo->email ?? '';
    $user->user_role = 'user';
    $user->provider = $provider;
    $user->provider_id = $getInfo->id ?? '';
    $user->password = \Hash::make($password);
    $user->save();

    $user = User::where('email',$getInfo->email)->first();

    return $user;
  }

}
else{
  $password = 'asd12345';
  $userUpdate = User::where('provider_id', $getInfo->id)->update([
    'password' => \Hash::make($password),
    'name' => $getInfo->name,
  ]);
  $user = User::where('provider_id', $getInfo->id)->first();
 return $user;
}
}


public function callback($provider)
{
    
    if(!empty($_GET['error_code']) && !empty($_GET['error_code'])){
        return view('auth.login');
    }
    else{
        
         $getInfo = Socialite::driver($provider)->user();

 $user = $this->createUser($getInfo, $provider);

 auth()->login($user);

 return redirect()->to('/');
   
    }

}


}
