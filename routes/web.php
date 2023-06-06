<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::middleware('auth')->group(function () {


    Route::get('/add_contact', [ContactController::class, 'showAddContact'])->name('contact.show_add_contact');
    Route::get('edit_contact/{id}', [ContactController::class, 'showeditContact'])->name('contact.edit_contact');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.show');

    Route::post('contact/insert', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/update', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/remove/{id}', [ContactController::class, 'delete'])->name('contact.delete');
});



require __DIR__.'/auth.php';
