<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Create a new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'unique:users', 'max:120'],
            'full_name' => ['required', 'max:120'],
            'email' => ['required', 'email', 'unique:users', 'max:120'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);
        $user = User::create([
            'username' => $validated['username'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Auth::login($user);
        $user->sendEmailVerificationNotification();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            return view('user.edit', [
                'user' => $user
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Update specified user's profile picture
     *
     * @param \Illuminate\Http|Request  $request
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfilePicture(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            $validated = $request->validate([
                'profile_picture' => ['required', 'file', 'mimes:jpeg,png,bmp', 'max:512'],
            ]);


            $newProfilePicture = $validated['profile_picture']->store(env('THUMBNAIL_FOLDER'));

            if ($newProfilePicture) {
                // if user's current profile picture is an uploaded profile picture, delete it from storage
                if (Str::of($user->profile_picture)->startsWith(env('THUMBNAIL_FOLDER'))) {
                    Storage::delete($user->profile_picture);
                }

                $user->profile_picture = $newProfilePicture;
                $user->save();
                return redirect()->back();
            } else {
                abort(500);
            }
        } else {
            abort(403);
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            $validated = $request->validate([
                'current_password' => ['required', 'current_password'],
                'new_password' => ['required'],
                'confirm_password' => ['required', 'same:new_password']
            ]);

            $user->password = Hash::make($validated['new_password']);
            $user->save();

            return redirect()->back()->with('message', 'Password changed');
        } else {
            abort(403);
        }
    }

    /**
     * Update general user information (excluding profile picture and password).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            $validated = $request->validate([
                'username' => ['required', 'max:120'],
                'full_name' => ['required', 'max:120'],
                'bio' => []
            ]);

            $user->username = $validated['username'];
            $user->full_name = $validated['full_name'];
            $user->bio = $validated['bio'];
            $user->save();
            return redirect()->back();
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified user's profile picture.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyProfilePicture(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            // if user's current profile picture is an uploaded profile picture, delete it from storage
            if (Str::of($user->profile_picture)->startsWith(env('THUMBNAIL_FOLDER'))) {
                Storage::delete($user->profile_picture);
            }

            $user->profile_picture = env('DEFAULT_PROFILE_PICTURE');
            $user->save();

            return redirect()->back();
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $user->delete();
            return redirect()->route('home');
        } else {
            abort(403);
        }
    }
}
