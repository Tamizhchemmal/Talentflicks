<?php

use App\Http\Controllers\Contactuscontroller;
use App\Http\Controllers\InterestedController;
use App\Http\Controllers\MovieRegistrationController;
use App\Http\Controllers\UserController;
use App\Models\MovieRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/contactus', [Contactuscontroller::class, 'contactus']);

Route::get('/contactus', [Contactuscontroller::class, 'contactusview']);

Route::post('/movie-registration', [MovieRegistrationController::class, 'movieRegistration']);


Route::post('/interested', [InterestedController::class, 'interested']);
