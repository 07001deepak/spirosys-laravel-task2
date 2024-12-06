<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/project',[ProjectController::class,'index']);
Route::post('/filter',[ProjectController::class,'index']);
Route::get('/store/{id}',[BidController::class,'index']);
Route::post('/store',[BidController::class,'store']);
