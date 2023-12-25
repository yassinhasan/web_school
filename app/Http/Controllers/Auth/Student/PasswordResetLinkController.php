<?php

namespace App\Http\Controllers\Auth\Student;;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.student.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status != Password::RESET_LINK_SENT){

            // return  back()->withInput($request->only('email'))
            // ->withErrors(['email' => __($status)]);
            return response()->json([
                'error' => __($status)
            ]);
     
        }else{
            // session()->flash('status', 'success');
            // session()->flash('msg', 'reset email link has been sent');
            // session()->flash('icon', 'fa-check');
            return  response()->json([
                'success' => "reset email link has been sent"

            ]);
        //    return back();
        }
                    

    }
}
