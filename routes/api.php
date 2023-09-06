<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\GuestsController;
use App\Http\Controllers\OldeventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WorkshopController;




Route::post('register', [AuthController::class, 'register']);

Route::post('login',[AuthController::class,'login']);



Route::middleware('auth:api','Throttle:10,1')->prefix('user')->group(function (){

    Route::post('update/password',[UserController::class,'updatePassword']);

    Route::post('update/profile',[UserController::class,'updateProfile']);



});


Route::resource('events',EventController::class);
Route::resource('gusts',GuestsController::class);
