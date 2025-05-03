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
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('books', App\Livewire\Book\BookIndex::class)->name('books');
    Route::get('books/create', App\Livewire\Book\CreateBook::class)->name('books.create');
    Route::get('books/{book}/edit', App\Livewire\Book\EditBook::class)->name('books.edit');
});

require __DIR__ . '/auth.php';
