<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show the login screen.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('login.index');
    }

    /**
     * Attempt to log in.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

    }
}
