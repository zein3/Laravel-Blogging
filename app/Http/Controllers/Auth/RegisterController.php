<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

    }
}
