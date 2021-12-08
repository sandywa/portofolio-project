<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostsController::class, 'index'])->name('posts');

Route::get('/about', function () {
    return view('about', ['namebar' => 'About']);
});
Route::post('/post/insert', [PostsController::class, 'create']);
Route::get('/edit/{id}', [PostsController::class, 'edit']);
Route::post('/post/update/{id}', [PostsController::class, 'update']);
Route::get('/post/delete/{id}', [PostsController::class, 'destroy']);
