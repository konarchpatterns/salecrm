<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ActivityLogs;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\IndexCallendar;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserReports;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('/create', [AccountsController::class, 'create'])->name('account.create');
    Route::get('/update/{id}', [AccountsController::class, 'update'])->name('account.update');
    Route::get('/activity/{id}', [AccountsController::class, 'activityView'])->name('account.activity');
    Route::get('/view/{id}', [AccountsController::class, 'view'])->name('account.view');
    Route::get('/', [AccountsController::class, 'index'])->name('account.index');
    Route::get('/create-client', [AccountsController::class, 'createClient'])->name('account.createClient');
    Route::get('/api-data', [AccountsController::class, 'apiData'])->name('account.api-data');
    Route::post('api-data1', [AccountsController::class, 'apiData'])->name('account.api-data1');
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/update/{id}', [ClientsController::class, 'update'])->name('clients.update');
    Route::get('/view-clients/{id}', [ClientsController::class, 'viewClients'])->name('clients.view-clients');

    Route::get('/create-client/{id}', [ClientsController::class, 'createClientById'])->name('clients.createClientById');
})->middleware('auth');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
});

Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupsController::class, 'index'])->name('groups.index');
    Route::get('/edit/{id}', [GroupsController::class, 'edit'])->name('groups.edit');
    Route::patch('/update', [GroupsController::class, 'update'])->name('groups.update');
    Route::get('/show/{id}', [GroupsController::class, 'show'])->name('groups.show');
    Route::delete('/delete/{id}', [GroupsController::class, 'destroy'])->name('groups.destroy');
});

Route::group(['prefix' => 'reports'], function () {
    Route::get('/', [UserReports::class, 'index'])->name('reports.index');
    Route::get('/user-info/{id}', [UserReports::class, 'userInfo'])->name('reports.user-info');
    Route::get('/iframe/{id}', [UserReports::class, 'iframe'])->name('reports.iframe');
    Route::get('/api-data', [UserReports::class, 'apiData'])->name('reports.api-data');
    Route::post('/api-data1', [UserReports::class, 'apiData'])
        ->name('reports.api-data1');
});

Route::group(['prefix' => 'calendar'], function () {
    Route::get('/', [CalenderController::class, 'index'])->name('calendar.index');
    Route::post('/store', [CalenderController::class, 'store'])->name('calendar.store');
    Route::patch('/update/{id}', [CalenderController::class, 'update'])->name('calendar.update');
    Route::delete('/destroy/{id}', [CalenderController::class, 'destroy'])->name('calendar.destroy');
    Route::get('/show/{id}', [CalenderController::class, 'show'])->name('calendar.show');
});

Route::group(['prefix' => 'event'], function () {
    Route::get('/', [IndexCallendar::class, 'index'])->name('event.index');
    Route::get('/view', [IndexCallendar::class, 'viewEvents'])->name('event.view');
    Route::get('/edit/{id}', [IndexCallendar::class, 'editEvents'])->name('event.edit');
});

Route::group(['prefix' => 'logs'], function () {
    Route::get('/', [ActivityLogs::class, 'index'])->name('logs.index');
});

Route::resource('roles', RolesController::class)->middleware('auth');
Route::resource('permissions', PermissionsController::class)->middleware('auth');


