<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the register screen.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('register.index');
    }

    /**
     * Attempt to register user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
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
        return redirect()->route('home');
    }
}
