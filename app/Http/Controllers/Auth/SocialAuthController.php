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
    public function register()
    {
        try {
            // Not able to get the user data
            $googleUser = Socialite::driver('google')->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->stateless()->user();
           
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


        $user = Student::where('email', $googleUser->email)->first();

        if(empty($user)) {
            $user = Student::create([
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'image' => $googleUser->avatar,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
                'password'=>$googleUser->token,
                'clear_password'=>$googleUser->token,
            ]);
           
        }
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
