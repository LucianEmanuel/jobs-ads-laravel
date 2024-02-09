<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function editCompany(Request $request): View
    {
        return view('pages.company-profile', [
            'user' => $request->user(),
        ]);
    }
    public function editUser(Request $request): View
    {
        return view('pages.user-profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update company profile information.
     */
    public function updateCompany(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::find($request->user()->id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registration_code' => ['required'],
            'address' => ['required'],
            'website' => ['required', 'url'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        $user->name = $request->name;
        $user->registration_code = $request->registration_code;
        $user->address = $request->address;
        $user->website = $request->website;
        $user->email = $request->email;
        $user->email = $request->email;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink('frontend/assets/images/upload/' . $user->photo);
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('frontend/assets/images/upload/'), $filename);
            $user['photo'] = $filename;
        }
        $notification = [
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success',
        ];

        $user->update();
        return redirect()->back()->with($notification);
    } //End Method

    public function updateUser(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::find($request->user()->id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink('frontend/assets/images/upload/' . $user->photo);
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('frontend/assets/images/upload/'), $filename);
            $user['photo'] = $filename;
        }
        $user->update();
        $notification = [
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Change Password.
     */

    public function changePassword(User $user)
    {
        return view('pages.change-password');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = [
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        $notification = [
            'message' => 'Password Updated Successfully!',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Delete the user's account.
     */
    public function deleteProfile(Request $request)
    {
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
