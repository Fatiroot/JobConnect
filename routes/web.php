<?php

// use App\Http\admin\Controllers\OfferController as ControllersOfferController;
use App\Models\Experience;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Ceo\CompanyController;
use App\Http\Controllers\Condidater\ExperienceController;
use App\Http\Controllers\Condidater\FormationController;

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
    return view('admin.dashboard');
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

Route::namespace('Admin')->resource('users',UserController::class);
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



Route::namespace('Ceo')->resource('offer',OfferController::class);


//route ceo
    Route::namespace('Ceo')->resource('company', CompanyController::class);


//route profile
// Route::namespace('Condidater')->get('/profile',function(){
//     return view('Condidater.profile');
// });

Route::namespace('Condidater')->resource('formations',FormationController::class);
Route::namespace('Condidater')->resource('experiences',ExperienceController::class);

// Route::namespace('Condidater')->get('/profile',[FormationController::class,'create'])->name('formations.create');
// Route::namespace('Condidater')->post('/profile',[FormationController::class,'store'])->name('formations.store');
// Route::namespace('Condidater')->delete('/profile/{formation}', [FormationController::class, 'destroy'])->name('formations.destroy');



require __DIR__.'/auth.php';
