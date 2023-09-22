<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
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

    Route::get('/add_contact', [ContactController::class, 'showAddContact'])->name('contact.show_add_contact');
    Route::get('edit_contact/{id}', [ContactController::class, 'showeditContact'])->name('contact.edit_contact');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.show');

    Route::post('contact/insert', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/update', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/remove/{id}', [ContactController::class, 'delete'])->name('contact.delete');

    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [AuthController::class, 'dashboardView'])->name('dashboard.show');

