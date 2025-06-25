<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('texts', [TextController::class, 'index'])->name('texts.index');
    Route::get('texts/{text}/edit', [TextController::class, 'edit'])->name('texts.edit');
    Route::put('texts/{text}', [TextController::class, 'update'])->name('texts.update');
    Route::post('texts/sort', [TextController::class, 'sort'])->name('texts.sort');
});
Route::middleware(['auth', 'verified'])->group(function () {
    // Only index, edit and update routes
   
});

require __DIR__.'/auth.php';
