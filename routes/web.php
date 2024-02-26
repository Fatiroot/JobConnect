<?php

// use App\Http\admin\Controllers\OfferController as ControllersOfferController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Ceo\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OfferController;

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
Route::namespace('Admin')->resource('users',UserController::class);

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
Route::namespace('Admin')->get('/dashboard', [UserController::class , 'allusers'])->name('dashboard');
Route::namespace('Admin')->delete('/admin/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::namespace('Admin')->get('/admin/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::namespace('Admin')->put('/admin/{user}', [UserController::class, 'update'])->name('users.update');
Route::namespace('Admin')->put('restore/{user}', [UserController::class, 'restore'])->name('users.restore');


// Route::get('/ajoute',function(){
//     return view('admin.AjouteCaractaire');
// });
Route::get('/home',function(){
    return view('home');
});



// Route cites
Route::namespace('Admin')->resource('cities',CityController::class);


// Route Jobs:
Route::namespace('Admin')->get('/offer',[OfferController::class,'index'])->name('offer.index');
Route::namespace('Admin')->get('/offer/create',[OfferController::class,'create'])->name('offres.create');
Route::namespace('Admin')->post('/offer/store',[OfferController::class,'store'])->name('offres.store');



//route ceo
    Route::namespace('Ceo')->resource('company', CompanyController::class);


require __DIR__.'/auth.php';
