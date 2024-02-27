<?php

// use App\Http\admin\Controllers\OfferController as ControllersOfferController;
use App\Models\Domain;

use App\Models\Experience;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ceo\OfferController;

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ceo\CompanyController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Condidater\FormationController;
use App\Http\Controllers\Condidater\ExperienceController;

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
Route::middleware('checkAdmin')->group(function () {
    Route::get('users',[UserController::class,'index']);
    Route::get('/dashboard', [UserController::class , 'allusers'])->name('dashboard');
    Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/{user}', [UserController::class, 'update'])->name('users.update');
    Route::put('restore/{user}', [UserController::class, 'restore'])->name('users.restore');
    });

// Route::get('/ajoute',function(){
//     return view('admin.AjouteCaractaire');
// });
Route::get('/home',function(){
    return view('home');
});



// Route cites
// Route cites
Route::namespace('Admin')->resource('cities',CityController::class);
Route::namespace('Admin')->resource('domain',DomainController::class);


// Route Jobs:
// Route::get('/offer',[OfferController::class,'index']);
// Route::get('/offer/create',[OfferController::class,'create'])->name('offres.create');
// Route::post('/offer/store',[OfferController::class,'store'])->name('offres.store');

Route::namespace('Ceo')->resource('offer',OfferController::class);


//route ceo
    Route::namespace('Ceo')->resource('company', CompanyController::class);


//route profile
// Route::namespace('Condidater')->get('/profile',function(){
//     return view('Condidater.profile');
// });

Route::resource('formations',FormationController::class);
Route::resource('experiences',ExperienceController::class);

// Route::namespace('Condidater')->get('/profile',[FormationController::class,'create'])->name('formations.create');
// Route::namespace('Condidater')->post('/profile',[FormationController::class,'store'])->name('formations.store');
// Route::namespace('Condidater')->delete('/profile/{formation}', [FormationController::class, 'destroy'])->name('formations.destroy');



require __DIR__.'/auth.php';
