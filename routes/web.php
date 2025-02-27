<?php

use App\Http\Controllers\SupilogTimerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SupilogTimerController::class, 'index'])->name('index');

