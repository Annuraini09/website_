<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublicController;
use App\Models\Activity;
use App\Models\Member;
use Illuminate\Support\Facades\Route;

// Route Publik untuk Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route khusus admin.
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'memberCount' => Member::count(),
            'activityCount' => Activity::count(),
            'latestActivities' => Activity::latest('date')->take(4)->get(),
        ]);
    })->name('dashboard');

    Route::resource('member', MemberController::class);
    Route::resource('activity', ActivityController::class);
});
// Rute Publik Utama (Halaman Beranda ada di '/')
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/informasi', [PublicController::class, 'info'])->name('info');
