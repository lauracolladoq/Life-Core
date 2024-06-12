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

        // Busca al usuario por su email, si no lo encuentra lo crea
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'username' => $googleUser->nickname ?? $googleUser->email,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'provider_name' => 'google',
                'provider_token' => $googleUser->token,
                'provider_refresh_token' => $googleUser->refreshToken,
            ]);
        } else {
            //? Si el usuario ya existe, actualiza su provider_id
            $user->update([
                'provider_id' => $googleUser->id,
            ]);
        }

        Auth::login($user);
        return redirect()->route('explore');
    }
}
