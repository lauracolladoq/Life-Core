<?php

use App\Livewire\Explore;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Redirecciona a la vista home si el usuario está logueado
    Route::redirect('/', '/home');
Route::get('/home', Home::class)->name('home');
});
Route::get('/explore', Explore::class)->name('explore');