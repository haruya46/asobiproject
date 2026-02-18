<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::controller(CalendarController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/daypage/{day_ymd}', 'daypage')->name('AjaxDayDate');
    Route::post('/daypage/memo/{day_ymd}', 'memostore')->name('memostore');

});