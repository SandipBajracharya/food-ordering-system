<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function sendVerificationEmail()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(['status' => 'success', 'message' => 'Your email is already verified'], 200);
        }
        auth()->user()->sendEmailVerificationNotification();
        return response()->json(['status' => 'success', 'message' => 'Email veification link is sent'], 200);
    }
}
