<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

Use App\Models\User;
use Auth;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    
    public function redirectFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackGoogle(){
        try {
            $google_user = Socialite::driver('google')->user();            
            $user = User::where('google_id', $google_user->getId())->first();        
            
            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);
            
                Auth::login($new_user);
                return redirect()->intended('/');

            } else {
                Auth::login($user);
                return redirect()->intended('/');
            }
        } catch (\Throwable $th){
            // throw $th
            dd('Something went wrong! '. $th->getMessage());
        }
    }
    
    public function callbackFacebook(){
        try {
            $facebook_user = Socialite::driver('facebook')->user();        
            
            $user = User::where('facebook_id', $facebook_user->getId())->first();        
            
            if(!$user){
                $new_user = User::create([
                    'name' => $facebook_user->getName(),
                    'email' => $facebook_user->getEmail(),
                    'facebook_id' => $facebook_user->getId()
                ]);
            
                Auth::login($new_user);
                return redirect()->intended('/');

            } else {
                Auth::login($user);
                return redirect()->intended('/');
            }
        } catch (\Throwable $th){
            // throw $th
            // dd('Something went wrong! '. $th->getMessage());
            return redirect()->intended('/user-login');
        }
    }
}
