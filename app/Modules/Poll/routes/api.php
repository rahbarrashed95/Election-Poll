<?php
use App\Modules\Poll\Http\Controllers\PollController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'middleware' => 'throttle:10000,3'], function () {
    Route::post('/store-poll', [PollController::class, 'storeApi'])->name('storeApi');
});