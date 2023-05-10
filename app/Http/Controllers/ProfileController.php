<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'categories' => $featuredCategories, 'featuredCategories' => $featuredCategories
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


        // Profile photo
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('profile_photo')->getClientOriginalExtension();
            // $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // $path = $request->file('profile_photo')->storeAs('uploads/profile', $fileNameToStore);
            $url = $file->move('uploads/profile' , $file->hashName());
            auth()->user()->update(['profile_photo' => $url]);
        }
        // Profile photo



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
