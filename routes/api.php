<?php

use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\taskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//public routes
route::post('login', [AuthControllers::class, 'login']);
route::post('register', [AuthControllers::class, 'register']);

//protected
Route::group(['middleware' => ['auth:sanctum']], function () {
    route::post('logout', [AuthControllers::class, 'logout ']);
    route::resource('task', taskController::class);
    route::post('logout', [AuthControllers::class, 'logout']);
});
