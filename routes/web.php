<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\OldeventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;





Route::get('/events', [EventController::class, 'index'])
    ->name('events.index');
Route::get('/events/events', [EventController::class, 'events'])
    ->name('events.events');
Route::get('/events/workshop', [WorkshopController::class, 'workshops'])
    ->name('events.workshop');

Route::get('/events/event/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::post('/events/{event}/signup', [GuestsController::class, 'store'])
    ->name('events.signup');
Route::get('/search/', [SearchController::class, 'index'])
    ->name('search.index');



Route::get('/oldevents', [OldeventController::class, 'index'])->name('oldindex');




Route::get('/', function () {
    return view('dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});




Route::get('/admin', function () {
    return view('admin.events.index');
})->middleware(['auth', 'verified'])->name('admin');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('events', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('events.index'); // admin.index;
    Route::get('/events/create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('events.create');
    Route::get('events/{event}', [\App\Http\Controllers\Admin\AdminController::class, 'show'])->name('events.show');
    Route::get('guests/{event}', [\App\Http\Controllers\Admin\AdminController::class, 'guest'])->name('events.guest');
    Route::get('events/{id}/edit', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('events.edit');
    Route::patch('events/{event}', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('events.update');
    Route::delete('events/delete/{id}',[\App\Http\Controllers\Admin\AdminController::class,'delete'])->name('events.delete');
    Route::post('events/{event},', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('events.store');
    Route::post('events/{workshop},', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('events.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

