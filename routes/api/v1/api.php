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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Users
Route::prefix("/user")->group(function () {
    Route::post("/login", 'App\Http\Controllers\api\v1\LoginController@login');
    Route::get("/", 'App\Http\Controllers\api\v1\LoginController@user')->middleware('auth:api');
    // Route::middleware("auth:api")->get("/all", 'App\Http\Controllers\api\v1\user\UserController@index');
    // Route::middleware("auth:api")->post("/", 'App\Http\Controllers\api\v1\user\UserController@store');
});

// Route::apiResource("/user", 'App\Http\Controllers\api\v1\user\UserController');
Route::apiResource('/member', 'App\Http\Controllers\MemberController');
Route::apiResource('/group', 'App\Http\Controllers\GroupController');
Route::apiResource('/training', 'App\Http\Controllers\TrainingController');

Route::post('/presence', 'App\Http\Controllers\PresenceController@attachMembers');
// Route::get('/presence/{id}', 'App\Http\Controllers\PresenceController@getMembers');