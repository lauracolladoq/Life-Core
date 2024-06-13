<?php

use App\Http\Controllers\Socialite\GitHubController;
use App\Http\Controllers\Socialite\GoogleController;
use App\Livewire\Explore;
use App\Livewire\Home;
use App\Livewire\MyProfile;
use App\Livewire\Post;
use App\Livewire\PostDetail;
use App\Livewire\Tag;
use App\Livewire\TrendingTag;
use App\Livewire\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Redirecciona a la vista home si el usuario está logueado
    Route::redirect('/', '/home');
    Route::get('/home', Home::class)->name('home');
    Route::get('/myProfile', MyProfile::class)->name('myProfile');
});

// Redirecciona a la vista explore si el usuario no está logueado
Route::get('/', function () {
    return redirect('/explore');
})->middleware('guest');

Route::get('/explore', Explore::class)->name('explore');

Route::get('/trending-tag/{tag}', TrendingTag::class)->name('trending-tag');

Route::get('/user-profile/{user}', UserProfile::class)->name('user-profile');

Route::get('/post-detail/{post}', PostDetail::class)->name('post-detail');

// Rutas de Socialite
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/auth/github/redirect', [GitHubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [GitHubController::class, 'callback'])->name('github.callback');

Route::get('/terms', function () {
    return view('terms'); 
});