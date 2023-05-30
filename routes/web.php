<?php

use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('event',[EventController::class,'createEventPage'] )->name('createEventPage');
Route::post('event',[EventController::class,'createEvent'] )->name('createEvent');
Route::get('event-list',[EventController::class,'eventList'] )->name('eventList');


Route::get('edit-event/{id}', [EventController::class , 'editEventPage'])->name('editEventPage');
Route::put('update-event/{id}', [EventController::class , 'update_event'])->name('update_event');

Route::delete('delete-event/{id}', [EventController::class , 'delete_event'])->name('delete_event');