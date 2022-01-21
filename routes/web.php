<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//for user
Route::middleware(['auth','user'])->group(function () {

    Route::post('user-posts/postImport', [App\Http\Controllers\User\PostController::class, 'postImport'])->name('post-import');
    Route::get('user-posts/postExport', [App\Http\Controllers\User\PostController::class, 'postExport'])->name('post-export');
    
    Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.user-dashboard');
    Route::get('user/{id}/edit', [App\Http\Controllers\User\UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [App\Http\Controllers\User\UserController::class, 'update'])->name('user.update');

    Route::get('user-posts', [App\Http\Controllers\User\PostController::class, 'index'])->name('index');
    Route::get('user-posts/create', [App\Http\Controllers\User\PostController::class, 'create'])->name('create');
    Route::post('user-posts', [App\Http\Controllers\User\PostController::class, 'store'])->name('store');
    Route::get('user-posts/{post_id}/edit', [App\Http\Controllers\User\PostController::class, 'edit'])->name('edit');
    Route::put('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'update'])->name('update');
    Route::delete('user-posts/{post_id}', [App\Http\Controllers\User\PostController::class, 'destroy'])->name('destroy');
});

//for admin 
Route::middleware(['auth','admin'])->group(function () {

    Route::post('import', [App\Http\Controllers\Admin\PostController::class, 'import'])->name('admin.import');
    Route::get('export', [App\Http\Controllers\Admin\PostController::class, 'export'])->name('admin.export');

    Route::get('admin-posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.posts.create');

    Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('admin.admin-dashboard');
    Route::get('admin/{id}/edit', [App\Http\Controllers\Admin\DashboardController::class, 'edit'])->name('admin.edit');
    Route::put('admin/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'update'])->name('admin.update');

    Route::get('admin/chart', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.chart.index');

    Route::get('admin-posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
    Route::delete('admin-posts/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::post('admin-posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.posts.store');
    Route::get('admin-posts/{post_id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('admin-posts/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');

    Route::get('admin/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('admin/contacts/{id}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('admin/contacts/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    //for admin user
    Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
});

//frontend

Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'index']);

Route::get('posts', [App\Http\Controllers\Frontend\PostController::class, 'index'])->name('frontend.index');
Route::get('posts/{id}', [App\Http\Controllers\Frontend\PostController::class, 'show'])->name('frontend.show');

Route::get('about-us', [App\Http\Controllers\Frontend\AboutController::class, 'index']);

Route::get('contact-us', [App\Http\Controllers\Frontend\ContactController::class, 'create'])->name('contact.create');
Route::post('contact-us', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('contact.store');
