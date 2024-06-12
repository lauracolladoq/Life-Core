<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        // Busca al usuario por su email, si no lo encuentra lo crea
        $user = User::where('email', $githubUser->email)->first();

        if (!$user) {
            $user = User::create([
                'username' => $githubUser->nickname ?? $githubUser->email,
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'provider_name' => 'github',
                'provider_token' => $githubUser->token,
                'provider_refresh_token' => $githubUser->refreshToken,
            ]);
        } else {
            //Si el usuario ya existe, actualiza su provider_id
            $user->update([
                'provider_id' => $githubUser->id,

            ]);
        }

        Auth::login($user);
        return redirect()->route('explore');
    }
}
