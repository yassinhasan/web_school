<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\FlashMessageTrait;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Yoeunes\Toastr\Facades\Toastr;

class AuthenticatedSessionController extends Controller
{
    use FlashMessageTrait;
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.user.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (Exception $e) {

            $this->ErrorMsg($e->getMessage());
            return redirect('/user/login');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        if (Auth::guard('user')->check()) {
            $user =  auth()->user();
            $user->reset_code();
            Auth::guard('user')->logout();
        }
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
