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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

    //for user
Route::middleware(['auth','user'])->group(function () {

    Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
    Route::get('user/{id}/edit', [App\Http\Controllers\User\UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [App\Http\Controllers\User\UserController::class, 'update'])->name('user.update');


    Route::get('user-posts', [App\Http\Controllers\User\PostController::class, 'index'])->name('index');
    Route::get('user-posts/create', [App\Http\Controllers\User\PostController::class, 'create'])->name('create');
    Route::post('user-posts', [App\Http\Controllers\User\PostController::class, 'store'])->name('store');
    Route::get('user-posts/{post_id}/edit', [App\Http\Controllers\User\PostController::class, 'edit'])->name('edit');
    Route::put('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'update'])->name('update');
    Route::get('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'show'])->name('show');
    Route::delete('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'destroy'])->name('destroy');
});

    //for admin 
Route::middleware(['auth','admin'])->group(function () {

    Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin-posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
    Route::delete('admin-posts/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::get('admin-posts/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.posts.show');

    Route::get('admin/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('admin/contacts/{id}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('admin/contacts/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    Route::get('admin/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.roles.index');

    //for admin user
    Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});

//frontend

Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'index']);

Route::get('posts', [App\Http\Controllers\Frontend\PostController::class, 'index']);
Route::get('posts/{id}', [App\Http\Controllers\Frontend\PostController::class, 'show']);

Route::get('about-us', [App\Http\Controllers\Frontend\AboutController::class, 'index']);

Route::get('contact-us', [App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::post('contact-us', [App\Http\Controllers\Frontend\ContactController::class, 'store']);