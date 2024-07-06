<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;


// Sites that anybody can access
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/about', function () {
    return view('about');
})->name('about');


// Sites, only logged in users can access
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/billing', function () {
    return view('billing');
})->middleware(['auth', 'verified'])->name('billing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/trips', function () {
    return view('trips');
})->middleware(['auth', 'verified'])->name('trips');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Sites, only logged in users with the role of 'Admin' can access
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/sla', [AdminController::class, 'index'])->name('sla');
});



