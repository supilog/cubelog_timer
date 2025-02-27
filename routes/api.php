<?php

use App\Http\Controllers\CubeApiController;
use App\Http\Controllers\SupilogTimerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/store', [CubeApiController::class, 'store'])->name('api.store');
