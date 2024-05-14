<?php

use App\Http\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CalendarController;
use App\Http\Livewire\Counter;
use App\Http\Controllers\FullCalendarController;

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



Route::group(['prefix' => 'account'], function() {
    Route::get('/create', [AccountsController::class,'create'])->name('account.create');
    Route::get('/update/{id}', [AccountsController::class,'update'])->name('account.update');
    Route::get('/', [AccountsController::class,'index'])->name('account.index');
    Route::get('/create-client', [AccountsController::class,'createClient'])->name('account.createClient');
})->middleware('auth');



Route::group(['prefix' => 'location'], function() {
    Route::get('dropdown', [LocationController::class, 'index']);
Route::post('fetch-states', [LocationController::class, 'fetchState']);
Route::post('fetch-cities', [LocationController::class, 'fetchCity']);
})->middleware('auth');


Route::resource('roles', RolesController::class)->middleware('auth');
Route::resource('permissions', PermissionsController::class)->middleware('auth');
Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('konarch@patterns247.net')->send(new \App\Mail\InfoMail($details));

    dd("Email is Sent.");
});



Route::group(['prefix'=>'clients'],function(){
    Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/update/{id}', [ClientsController::class,'update'])->name('clients.update');
    Route::get('/view-clients/{id}', [ClientsController::class, 'viewClients'])->name('clients.view-clients');

    Route::get('/create-client/{id}', [ClientsController::class,'createClientById'])->name('clients.createClientById');
})->middleware('auth');



Route::get('/zoom', [ZoomController::class,'create_meeting'])->name('zoom.index');
Route::get('/zoom/update', [ZoomController::class,'update_meeting'])->name('zoom.update');
Route::get('/zoom/list', [ZoomController::class,'list_meetings'])->name('zoom.list');
Route::group(['prefix' => 'calendar'], function() {
    Route::get('/', [CalendarController::class,'index'])->name('calendar.index');
    Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('/update/{id}', [CalendarController::class, 'update']) ->name('calendar.update');
    Route::delete('/destroy/{id}', [CalendarController::class, 'destroy'])  ->name('calendar.destroy');
    Route::get('/show/{id}', [CalendarController::class, 'show'])  ->name('calendar.show');

})->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);

Route::group(['prefix' => 'fullcalendar'], function() {
    Route::get('/', [FullCalendarController::class,'index'])->name('fullcalendar.index');


})->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);
