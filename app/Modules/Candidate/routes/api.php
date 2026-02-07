<?php

use App\Modules\Candidate\Http\Controllers\CandidateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'middleware' => 'throttle:10000,3'], function () {
    Route::get('/candidate-list', [CandidateController::class, 'apiData'])->name('apiData');
    Route::get('/candidate-list-by-filter', [CandidateController::class, 'candidateList'])->name('candidateList');
});