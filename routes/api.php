<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:api'])->group(function () {
    //REGISTRATION
    Route::apiResource('/registrations', RegistrationController::class)->only(['store']);

    //PAYMENT
    Route::post('/create-snap-token', [PaymentController::class, 'createSnapToken']);

    //FEEDBACK
    Route::apiResource('/feedbacks', FeedbackController::class)->only(['store']);

    Route::middleware(['role:admin'])->group(function () {
        //GUIDE
        Route::apiResource('/guides', GuideController::class)->only(['store', 'destroy']);
        Route::post('/guides/{id}', [GuideController::class, 'update']);

        //PROGRAM
        Route::apiResource('/programs', ProgramController::class)->only(['store', 'destroy']);
        Route::post('/programs/{id}', [ProgramController::class, 'update']);

        //PRICE
        Route::apiResource('/prices', PriceController::class)->only(['store', 'destroy']);
        Route::post('/prices/{id}', [PriceController::class, 'update']);

        //ROUTE
        Route::apiResource('/routes', RouteController::class)->only(['store', 'destroy']);
        Route::post('/routes/{id}', [RouteController::class, 'update']);

        //SCHEDULE
        Route::apiResource('/schedules', ScheduleController::class)
            ->only(['store', 'destroy']);

        Route::post('/schedules/{id}', [ScheduleController::class, 'update']);

        //REGISTRATION
        Route::post('/registrations/{id}', [RegistrationController::class, 'update']);
        Route::apiResource('/registrations', RegistrationController::class)->only(['destroy']);

        //FEEDBACK
        Route::apiResource('/feedbacks', FeedbackController::class)->only(['destroy']);

        //USER
        Route::apiResource('/users', UserController::class)->only(['store', 'destroy']);

        //PAYMENT
        Route::apiResource('/payments', PaymentController::class)->only(['index', 'show']);
    });
});

//SCHEDULE
Route::apiResource('/schedules', ScheduleController::class)->only(['index', 'show']);

//GUIDE
Route::apiResource('/guides', GuideController::class)->only(['index', 'show']);

//PROGRAM
Route::apiResource('/programs', ProgramController::class)->only(['index', 'show']);

//PRICE
Route::apiResource('/prices', PriceController::class)->only(['index', 'show']);

//ROUTE
Route::apiResource('/routes', RouteController::class)->only(['index', 'show']);

//REGISTRATION
Route::apiResource('/registrations', RegistrationController::class)->only(['index', 'show']);

//FEEDBACK
Route::apiResource('/feedbacks', FeedbackController::class)->only(['index', 'show']);


//LOGIN, REGISTER, LOGOUT
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

//PAYMENT
Route::post('/midtrans/callback', [PaymentController::class, 'callback']);

//USER
Route::apiResource('/users', UserController::class)->only(['index', 'show']);
