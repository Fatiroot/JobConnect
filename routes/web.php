<?php

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
    return view('welcome');
});
Route::resource('users',UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/master',function(){
    return view('master');
});

// Route users:
Route::get('/dashboard', [UserController::class , 'allusers'])->name('dashboard');
Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/admin/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/admin/{user}', [UserController::class, 'update'])->name('users.update');
Route::put('restore/{user}', [UserController::class, 'restore'])->name('users.restore');


require __DIR__.'/auth.php';
