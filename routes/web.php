<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('books.home');
});

Route::get('/users', [UserController::class, 'users'])->name('users');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/index', [BookController::class, 'index'])->name('books.index');
    Route::get('/finder', [BookController::class, 'finder'])->name('books.finder');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::delete('delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::get('/home', [BookController::class, 'home'])->name('books.home');

require __DIR__.'/auth.php';



