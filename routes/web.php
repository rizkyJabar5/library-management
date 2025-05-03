<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('books', \App\Livewire\Book\BookIndex::class)->name('books.index');
    Route::get('books/create', \App\Livewire\Book\BookCreate::class)->name('books.create');
    Route::get('books/{book}/edit', \App\Livewire\Book\BookEdit::class)->name('books.edit');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('users', \App\Livewire\User\UserIndex::class)->name('users.index');
    Route::get('users/{user}/edit', \App\Livewire\User\UserEdit::class)->name('users.edit');
});

require __DIR__.'/auth.php';
