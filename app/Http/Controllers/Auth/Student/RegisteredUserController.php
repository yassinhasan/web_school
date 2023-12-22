<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.student.register');
    }

    public function register(): View
    {
        return view('auth.student.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
            try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class, 'unique:'.Admin::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'clear_password' => $request->password
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
        catch(Exception $e){
            return view('auth.student.register')->with(['connection_error' =>  $e->getMessage()] );

        }
    }
}
