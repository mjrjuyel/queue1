<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Carbon\Carbon;

class SocialLoginController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function callBack($provider){        
        $providerUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'provider_id' => $providerUser->id,
        ], [
            'name' => $providerUser->name,
            'email' => $providerUser->email,
        ]);

        if($user){
            User::where('id',$user->id)->update([
                'provider_id' => $providerUser->id,
                'provider_token' => $providerUser->token,
            ]);
        }
     
        Auth::login($user);
     
        return redirect('/dashboard');
    }
}
