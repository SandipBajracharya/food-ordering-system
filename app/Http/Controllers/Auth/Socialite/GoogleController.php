<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;
use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // dd($user);
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                $this->generateAccessToken($finduser);
                Auth::login($finduser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'username' => $user->name,
                    'password' => Hash::make($user->name),
                    'role_id' => 3,
                    'is_vendor' => 0,
                    'email_verified_at' => Carbon::now()
                ]);

                $this->generateAccessToken($newUser);
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function generateAccessToken($user)
    {
        // api access token created 
        $success['token'] =  $user->createToken($user->username . $user->id)->accessToken;
        $success['name'] =  $user->name;

        Session::put('token', $success['token']);
        Session::put('user', $success['name']);
    }
}
