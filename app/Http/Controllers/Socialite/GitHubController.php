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
        $user = User::updateOrCreate([
            'provider_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'provider_name' => 'github',
            'provider_token' => $githubUser->token,
            'provider_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user);
        return redirect()->route('/');
    }
}
