<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::middleware('auth')->group(function () {
    Route::view('list/users', 'livewire.users')->name('list.users');
});


require __DIR__ . '/auth.php';
