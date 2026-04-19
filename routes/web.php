<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::get('/galeria/{slug}', [GalleryController::class, 'show'])
    ->where('slug', 'kuchnie|meble|schody|drzwi|inne')
    ->name('gallery.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
