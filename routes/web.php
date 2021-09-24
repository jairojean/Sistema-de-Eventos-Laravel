<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\EventController;
use App\Models\Event;
use GuzzleHttp\Middleware;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/contact', [HomeController::class, 'index'])->name('contact');


//    Eventos

Route::get('/event', [HomeController::class, 'index'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->middleware('auth')->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');


Route::delete('delete/{id}', [EventController::class, 'destroy'])->middleware('auth')->name('event.delete');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');


Route::get('/edit/{id}', [EventController::class, 'edit'])->Middleware('auth')->name('event.edit');
Route::put('/edit/update/{id}', [EventController::class, 'update'])->middleware('auth')->name('event.update');

Route::get('/home', [EventController::class, 'dashboard'])->middleware('auth')->name('event.dashboard');

Route::post('/event/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth')->name('event.join');

Route::delete('/event/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth')->name('event.leave');