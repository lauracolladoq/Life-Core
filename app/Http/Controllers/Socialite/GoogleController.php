<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'provider_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'provider_name' => 'google',
            'provider_token' => $googleUser->token,
            'provider_refresh_token' => $googleUser->refreshToken,
        ]);

        Auth::login($user);
        return redirect()->route('/');
    }
}
