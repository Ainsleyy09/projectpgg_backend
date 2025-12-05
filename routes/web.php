<?php

use App\Http\Controllers\GuideController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guides', [GuideController::class]);

Route::get('/programs', [ProgramController::class]);

