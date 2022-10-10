<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/dashboard', [NoteController::class, 'index'])->name('dashboard');

    Route::get('/new', [NoteController::class, 'newNote'])->name('new');

    Route::post('/new', [NoteController::class, 'storeNote'])->name('store');

    Route::get('/note/{note}', [NoteController::class, 'openNote'])->name('open')->middleware('isNoteOwner');

    Route::patch('/note/{note}', [NoteController::class, 'updateNote'])->name('updateNote');

    Route::get('/search', [NoteController::class, 'search'])->name('search');
    
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::patch('/profile', [UserController::class, 'update'])->name('updateProfile');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::group(['prefix'=>'admin', 'middleware'=>'isAdmin'], function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/new', [NoteController::class, 'newNote'])->name('admin.new');

        Route::post('/new', [NoteController::class, 'storeNote'])->name('admin.store');

        Route::get('/note/{note}', [NoteController::class, 'openNote'])->name('admin.open');

        Route::patch('/note/{note}', [NoteController::class, 'updateNote'])->name('admin.updateNote');

        Route::get('/search', [NoteController::class, 'search'])->name('admin.search');

        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

        Route::get('/user/{user}', [AdminController::class, 'getUser'])->name('admin.user');

        Route::patch('/user/{user}', [AdminController::class, 'updateUser'])->name('admin.updateUser');

        Route::get('/user/{user}/notes', [AdminController::class, 'userNotes'])->name('admin.userNotes');

        Route::get('/notes', [AdminController::class, 'notes'])->name('admin.notes');


    });
});
