<?php

use App\Http\Controllers\CustomerController;
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

Route::post('/customers',[CustomerController::class, 'create']);
Route::get('/customers',[CustomerController::class, 'index']);
Route::get('/customers/{id}',[CustomerController::class, 'show']);
Route::patch('/customers/{id}',[CustomerController::class, 'update']);
Route::delete('/customers/{id}',[CustomerController::class, 'delete']);


