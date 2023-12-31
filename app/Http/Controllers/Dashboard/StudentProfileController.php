<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Traits\FlashMessageTrait;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class StudentProfileController extends Controller
{
    use FlashMessageTrait;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('student.profile.profile', [
            'user' => $request->user(),
        ]);   
     }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $this->SuccessMsg('profile updated');
        return Redirect::route('student.profile');
    }
    /**
     * Update the user's profile image.
     */
    public function updateImage(Request $request): RedirectResponse
    {
        try {
            $validated =  Validator::make($request->all(), [
                'image' => 'file|mimes:jpg,jpeg,png,gif'
            ]);
            if (!$validated->stopOnFirstFailure()->fails()) {
                $user = Student::findOrFail(auth()->user()->id);
                if ($request->image != null) {
                    $originalName = $request->image->getClientOriginalName();
                    $savedImage = time() . '_' . $originalName;
                    $user->image = $savedImage;
                    $user->update([
                        'image' => $savedImage
                    ]);

                    $request->image->move(public_path('images/profile/users/'), $savedImage);
                    $request->user()->save();
                }
            }
            $this->SuccessMsg('profile updated');
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return Redirect::route('student.profile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {

        try {
            // Form validation

            $validated =  Validator::make($request->all(), [
                'password' => ['required', 'current-password'],

            ]);
            if ($validated->stopOnFirstFailure()->fails()) {
                return response()->json([
                    'error' => "password is not correct"
                ]);
            }
            $user = $request->user();
            Auth::logout();
            $user->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json([
                'success' => 'email sent succssfully'
            ]);
        } catch (Exception $e) {
            return  response()->json([
                'error' => $e->getMessage()

            ]);
        }
    }
}
