<?php

use App\Livewire\Explore;
use App\Livewire\Home;
use App\Livewire\MyProfile;
use App\Livewire\Tag;
use App\Livewire\TrendingTag;
use App\Livewire\UserProfile;
use Illuminate\Support\Facades\Route;

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

Route::get('/user-profile/{user}', UserProfile::class)->name('user-profile');

Route::get('/trending-tag/{tag}', TrendingTag::class)->name('trending-tag');