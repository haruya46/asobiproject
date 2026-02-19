<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::controller(CalendarController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/daypage/{day_ymd}', 'daypage')->name('AjaxDayDate');
    Route::get('/daypost/{day_ymd}','daypost')->name('daypost');
    Route::post('/daypost/memo/{day_ymd}', 'memostore')->name('memostore');

});