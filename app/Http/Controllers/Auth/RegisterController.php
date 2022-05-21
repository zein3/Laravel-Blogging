<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

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
}
