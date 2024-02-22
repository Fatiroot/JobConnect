<?php

// use App\Http\admin\Controllers\OfferController as ControllersOfferController;


use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
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

Route::get('/master',function(){
    return view('master');
});
Route::get('/index',function(){
    return view('admin.index');
});
Route::get('/ajoute',function(){
    return view('admin.AjouteCaractaire');
});

Route::get('/offer',[OfferController::class,'index'])->name('offer.index');
Route::get('/offer/create',[OfferController::class,'create'])->name('offres.create');
Route::post('/offer/store',[OfferController::class,'store'])->name('offres.store');

require __DIR__.'/auth.php';
