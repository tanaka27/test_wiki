<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/page/create',[PageController::class,'create']);
Route::post('/pages',[PageController::class,'store']);
Route::get('/pages', [PageController::class, 'index']);

Route::get('/pages/{id}', [PageController::class, 'show']);
