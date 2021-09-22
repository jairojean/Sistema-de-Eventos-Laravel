<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\EventController;
use App\Models\Event;

Auth::routes();

Route::get('/',[HomeController::class, 'index'])->name('welcome');
 Route::get('/contact',[HomeController::class, 'index'])->name('contact');


                    //    Eventos

Route::get('/event',[HomeController::class, 'index'])->name('event.index');
Route::get('/event/create',[EventController::class, 'create'])->name('event.create');
Route::post('/event/store',[EventController::class, 'store'])->name('event.store');


Route::delete('delete/{id}', [EventController::class, 'delete'])->name('event.delete');

Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 