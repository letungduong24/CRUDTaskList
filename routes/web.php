<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

//ROUTE VIEW
Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/post/create', action: function () {
    return view('create');
})->name('create');

Route::get('/post/show/{slug}', [TaskController::class, 'show'])->name('show');

Route::get('/post/edit/{slug}', [TaskController::class, 'edit'])->name('edit');


// ROUTE HANDLE ACTION
Route::post('/post/create', [TaskController::class, 'store'])->name('store');

Route::delete('/post/delete', [TaskController::class, 'destroy'])->name('destroy');

Route::put('/post/update/{slug}', [TaskController::class, 'update'])->name('update');
