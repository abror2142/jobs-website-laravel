<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show (Request $request) {
        $user_info = $request->user()->user_info;

        return view('pages.admin.profile.profile', ["user_info" => $user_info]);
    }

    public function upload_image(Request $request) {
        $request->validate([
            'image' => ['required', 'file', 'mimes:jpeg,png,jpg,gif', 'max:4096']
        ]);

        $path = public_path('images/user/');
        
        // Clean the Old Photo
        $info = $request->user()->user_info;
        if($info->image_url != NULL) {
            $image_path = public_path($info->image_url);

            if(File::exists($image_path)){
                File::delete($image_path);
            }
        }

        $image = $request->image;
        $imageName = time() . '.' . $image->extension();
        $image->move($path, $imageName);
        
        $info->image_url = 'images/user/' . $imageName;
        $info->save();
        return redirect()->back();
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
