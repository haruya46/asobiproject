<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::controller(CalendarController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/daypage/{day_ymd}', 'daypage')->name('AjaxDayDate');
    Route::get('/daypost/{day_ymd}','daypost')->name('daypost');
    Route::post('/memostore/{day_ymd}','memostore')->name('memostore');
    Route::get('/dayedit/{memo}/{day_ymd}', 'dayedit')->name('dayedit');
    Route::patch('/memoedit/{day_ymd}', 'memoedit')->name('memoedit');

});

// ユーザー機能

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // 例：ログイン必須のページ
    Route::get('/home', fn () => view('home'))->name('home');
});