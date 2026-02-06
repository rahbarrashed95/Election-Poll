<?php

use App\Modules\Seat\Http\Controllers\SeatController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:web'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::group([
        'prefix' => 'seats',
        'as' => 'seats.'
    ], function () {

        Route::get('/', [SeatController::class, 'index'])->name('index');
        Route::get('/create', [SeatController::class, 'create'])->name('create');
        Route::post('/create', [SeatController::class, 'store'])->name('store');
        Route::get('/{data}/edit', [SeatController::class, 'edit'])->name('edit');
        Route::get('/{data}/complain/details', [SeatController::class, 'complainDetails'])->name('complainDetails');
        Route::put('/{data}/update', [SeatController::class, 'update'])->name('update');
        Route::delete('/{data}/delete', [SeatController::class, 'delete'])->name('delete');

    });
});

