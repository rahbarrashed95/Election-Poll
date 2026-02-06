<?php

use App\Modules\Candidate\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:web'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::group([
        'prefix' => 'candidates',
        'as' => 'candidates.'
    ], function () {

        Route::get('/', [CandidateController::class, 'index'])->name('index');
        Route::get('/create', [CandidateController::class, 'create'])->name('create');
        Route::post('/create', [CandidateController::class, 'store'])->name('store');
        Route::get('/{data}/edit', [CandidateController::class, 'edit'])->name('edit');
        Route::get('/{data}/complain/details', [CandidateController::class, 'complainDetails'])->name('complainDetails');
        Route::put('/{data}/update', [CandidateController::class, 'update'])->name('update');
        Route::delete('/{data}/delete', [CandidateController::class, 'delete'])->name('delete');

        Route::get('/get-districts', [CandidateController::class, 'getByDivision'])->name('getByDivision');
        Route::get('/get-seats', [CandidateController::class, 'getSeats'])->name('getSeats');

    });
});

