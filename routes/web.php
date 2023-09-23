<?php

use App\Http\Controllers\admin\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/posts',[PostController::class,'index'])->name('post.index');
Route::get('/posts/post/{post}',[PostController::class,'post'])->name('post.singlePost');
Route::get('/posts/state/{state}',[PostController::class,'states'])->name('post.postState');
/* Routas do Administrador */

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::prefix('/posts')
    ->name('post.')
    ->controller(PostsController::class)
    ->group(function(){
        Route::get('/','show')->name('index');
        Route::get('/create','create')->name('create');
        Route::get('/edite/{post}','viewEdite')->name('edite');
        Route::post('/guardar','store')->name('store');
        Route::put('/update/{post}','update')->name('update');
        Route::delete('/delete/{post}','destroy')->name('delete');
    });
});
/* Routas do Breeze */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
