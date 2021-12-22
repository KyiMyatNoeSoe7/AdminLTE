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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    //for user
    Route::get('user-posts', [App\Http\Controllers\User\PostController::class, 'index'])->name('index');
    Route::get('user-posts/create', [App\Http\Controllers\User\PostController::class, 'create'])->name('create');
    Route::post('user-posts', [App\Http\Controllers\User\PostController::class, 'store'])->name('store');
    Route::get('user-posts/{post_id}/edit', [App\Http\Controllers\User\PostController::class, 'edit'])->name('edit');
    Route::put('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'update'])->name('update');
    Route::get('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'show'])->name('show');
    Route::delete('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'destroy'])->name('destroy');
