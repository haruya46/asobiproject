<?php
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