<?php

namespace App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Http\Traits\FlashMessageTrait;

class SocialAuthController extends Controller
{
    use FlashMessageTrait;
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function registerGoogle()
    {
        try {
            // Not able to get the user data
            $loggedUser = Socialite::driver('google')->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->stateless()->user();
           
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


        $user = Student::where('email', $loggedUser->email)->first();

        if(empty($user)) {
            $user = Student::create([
                'provider_id' => $loggedUser->id,
                'name' => $loggedUser->name,
                'email' => $loggedUser->email,
                'image' => $loggedUser->avatar,
                'provider_token' => $loggedUser->token,
                'provider_refresh_token' => $loggedUser->refreshToken,
                'password'=>$loggedUser->token,
                'clear_password'=>$loggedUser->token,
            ]);
           
        }
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public function registerFacebook()
    {
        try {
            // Not able to get the user data
            $loggedUser = Socialite::driver('facebook')->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->stateless()->user();
           
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


        $user = Student::where('email', $loggedUser->email)->first();

        if(empty($user)) {
            $user = Student::create([
                'provider_id' => $loggedUser->id,
                'name' => $loggedUser->name,
                'email' => $loggedUser->email,
                'image' => $loggedUser->avatar,
                'provider_token' => $loggedUser->token,
                'provider_refresh_token' => $loggedUser->refreshToken,
                'password'=>$loggedUser->token,
                'clear_password'=>$loggedUser->token,
            ]);
           
        }
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
