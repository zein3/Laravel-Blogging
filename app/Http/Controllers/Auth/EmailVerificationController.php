<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * Give verification notice to user when they do action that requires email verification.
     */
    public function notice()
    {
        return redirect()->back()->with('message', 'Must verify email');
    }

    /**
     * Verify user's email address.
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->back();
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()->with('message', 'Verification link sent!');
    }
}
