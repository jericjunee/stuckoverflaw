<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController as AdminUserController;
use App\Http\Controllers\Admin\PostsController as AdminPostController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserPostController;

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

Route::get('/', [PagesController::class, 'index']);

Auth::routes();

Route::resource('/blog', PostsController::class);
Route::get('/blog/posts/search', [PostsController::class, 'search'])->name('blog.search');

Route::get('/admin', [AdminController::class, 'index']);
Route::resource('/admin/users', AdminUserController::class);
Route::resource('/admin/posts', AdminPostController::class);

Route::get('/dashboard', [UserController::class, 'index']);
Route::resource('/dashboard/posts', UserPostController::class);