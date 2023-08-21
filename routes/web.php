<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoggedController;


/* HOME */
Route :: get("/", [GuestController :: class, 'index']) -> name ('home');


/* SHOW PROJECT */
Route :: get("/show-project/{id}", [LoggedController :: class, "show"])
-> middleware(['auth'])
-> name("logged.showProject");


/* CREATE PROJECT */
Route :: get("/create", [LoggedController :: class, "create"])
-> middleware(['auth'])
-> name("logged.createProject");


/* STORE PROJECT */
Route :: post("/create_store", [LoggedController :: class, "store"])
-> middleware(['auth'])
-> name("logged.store");


/* EDIT */
Route :: get("/edit/{id}", [LoggedController :: class, "edit"])
-> middleware(['auth'])
-> name("logged.editProject");

/* UPDATE */
Route :: put("/update/{id}", [LoggedController :: class, "update"])
-> middleware(['auth'])
-> name("logged.update");


/* DELETE */
Route :: delete('/delete/{id}', [LoggedController :: class, 'delete'])
-> middleware(['auth'])
-> name('deleteProject');

//////////////////////////////////////////////////////////////////////////////////////////


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
