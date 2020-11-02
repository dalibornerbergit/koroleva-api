<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Users
Route::prefix("/user")->group(function () {
    Route::post("/login", 'App\Http\Controllers\api\v1\LoginController@login');
    Route::get("/", 'App\Http\Controllers\api\v1\LoginController@user')->middleware('auth:api');
});

Route::apiResource('/members', 'App\Http\Controllers\MemberController');
Route::apiResource('/groups', 'App\Http\Controllers\GroupController')->middleware('auth:api');
Route::apiResource('/trainings', 'App\Http\Controllers\TrainingController')->middleware('auth:api');

Route::post('/presence', 'App\Http\Controllers\PresenceController@attachMembers')->middleware('auth:api');
