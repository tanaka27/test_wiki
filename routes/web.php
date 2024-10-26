<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/pages/create',[PageController::class,'create'])->middleware('auth');
Route::post('/pages',[PageController::class,'store'])->middleware('auth');
Route::get('/pages', [PageController::class, 'index'])->middleware('auth');

Route::get('/pages/{id}/edit', [PageController::class, 'edit']);
Route::put('/pages/{id}', [PageController::class, 'update']);
Route::delete('/pages/{id}', [PageController::class, 'destroy']);
Route::get('/pages/{id}', [PageController::class, 'show'])->middleware('auth');
Route::get('/', function () {
    return redirect("/pages");
});

Route::resource('categories',CategoryController::class)->middleware('auth');
Route::get('/categories/{id?}', [CategoryController::class,'index'])->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
