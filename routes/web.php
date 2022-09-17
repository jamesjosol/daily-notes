<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NoteController;
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

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
