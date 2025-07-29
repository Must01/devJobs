<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [JobController::class, 'index'])->name('home');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/search', SearchController::class)->name('search');
Route::get('/tag/{tag:name}', TagController::class)->name('tag.show');

// Company routes
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{employer}', [CompanyController::class, 'show'])->name('companies.show');

// Static pages
Route::view('/blog', 'blog.index')->name('blog');
Route::view('/salary-guide', 'salary-guide.index')->name('salary-guide');
Route::view('/help', 'help.index')->name('help');
Route::view('/contact', 'contact.index')->name('contact');
Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/terms', 'legal.terms')->name('terms');

// Contact form handler
Route::post('/contact', function(\Illuminate\Http\Request $request) {
    // In a real app, you'd send an email or save to database
    return back()->with('success', 'Thank you for your message! We\'ll get back to you soon.');
});

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');

    // Routes that require employer profile
    Route::middleware('employer')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    });
});
