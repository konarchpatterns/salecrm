<?php

use App\Http\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Livewire\Counter;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/counter', Counter::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');




});


Route::group(['prefix' => 'users'], function() {
    Route::get('/', [UsersController::class,'index'])->name('users.index');
    Route::get('/create', [UsersController::class,'create'])->name('users.create');
    Route::post('/create', [UsersController::class,'store'])->name('users.store');
    Route::get('/{user}/show', [UsersController::class,'show'])->name('users.show');
    Route::get('/{user}/edit', [UsersController::class,'edit'])->name('users.edit');
    Route::patch('/{user}/update', [UsersController::class,'update'])->name('users.update');
    Route::delete('/{user}/delete', [UsersController::class,'destroy'])->name('users.destroy');
})->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);

Route::group(['prefix' => 'groups'], function() {
    Route::get('/', [GroupsController::class,'index'])->name('groups.index');
    Route::get('/edit/{id}', [GroupsController::class,'edit'])->name('groups.edit');
    Route::patch('/update', [GroupsController::class,'update'])->name('groups.update');
    Route::get('/show/{id}', [GroupsController::class,'show'])->name('groups.show');
    Route::delete('/delete/{id}', [GroupsController::class,'destroy'])->name('groups.destroy');
})->middleware('auth');

/**
 * User Routes
 */
Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostsController::class,'index'])->name('posts.index');
    Route::get('/create', [PostsController::class,'create'])->name('posts.create');
    Route::post('/create', [PostsController::class,'store'])->name('posts.store');
    Route::get('/{post}/show', [PostsController::class,'show'])->name('posts.show');
    Route::get('/{post}/edit', [PostsController::class,'edit'])->name('posts.edit');
    Route::patch('/{post}/update',[PostsController::class,'update'])->name('posts.update');
    Route::delete('/{post}/delete', [PostsController::class,'destroy'])->name('posts.destroy');
})->middleware('auth');



Route::group(['prefix' => 'designation'], function() {
    Route::get('/', [UsersController::class,'designationList'])->name('designation.index');
    Route::get('/edit/{id}', [UsersController::class,'designationUpdate'])->name('designation.edit');
    Route::patch('/update', [UsersController::class,'designationEdit'])->name('designation.update');
})->middleware('auth');

Route::resource('roles', RolesController::class)->middleware('auth');
Route::resource('permissions', PermissionsController::class)->middleware('auth');
