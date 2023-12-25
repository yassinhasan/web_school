<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentLoginRequest;
use App\Http\Traits\FlashMessageTrait;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    use FlashMessageTrait;
    public function create(): View
    {
        return view('auth.student.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(StudentLoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::DASHBOARD);
        } catch (Exception $e) {

            $this->ErrorMsg($e->getMessage());
            return redirect('/student/login');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/student/login');
    }
}
