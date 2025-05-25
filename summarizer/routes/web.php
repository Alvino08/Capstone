<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\RiwayatController;

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/dashboard', function(){
//     return view('dashboard');
// });


Route::get('/favicon.ico', function () {
    return response()->file(public_path('favicon.ico'));
});

Route::fallback([DashboardController::class, 'index']);

Route::get('/rangkuman', function(){
    return view('rangkuman');
});


// Route::get('/berita', function(){
//     return view('berita');
// });

// Route::get('/riwayat', function(){
//     return view('riwayat');
// });

// Route::get('/artikel', function(){
//     return view('artikel');
// });

// Route::get('/post', function(){
//     return view('post');
// });

// Route::get('/post', [NewsController::class, 'create'])->name('news.create')->middleware('isAdmin');
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/post', function () {
        return view('post');
    });
});
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
// Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// Route::get('/berita', [NewsController::class, 'index']);
Route::get('/berita', [NewsController::class, 'index'])->name('berita');
Route::get('/artikel/{slug}', [NewsController::class, 'show']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
// Route::post('/summarize', [SummaryController::class, 'summarize'])->name('summarize');

Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
});

Route::post('/summarize', [SummaryController::class, 'summarize'])->name('summarize');
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat/{id}', [RiwayatController::class, 'show'])->name('riwayat.show');
});

Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy')->middleware('auth');
Route::delete('/berita/{id}', [NewsController::class, 'destroy'])->name('news.destroy')->middleware('auth');

