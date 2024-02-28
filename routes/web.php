<?php

// use App\Http\admin\Controllers\OfferController as ControllersOfferController;

use App\Http\Controllers\Admin\AdminOfferController;
use App\Models\Domain;

use App\Models\Experience;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ceo\OfferController;
use App\Http\Controllers\Ceo\CompanyController;
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

// Route::get('/master',function(){
//     return view('master');
// });



// Route users:
Route::middleware('checkAdmin')->group(function () {
    Route::resource('users',UserController::class);
    Route::get('/dashboard', [UserController::class , 'allusers'])->name('dashboard');
    Route::put('restore/{user}', [UserController::class, 'restore'])->name('users.restore');
    // Route cites
    Route::namespace('Admin')->resource('cities',CityController::class);

    // Route domain
    Route::namespace('Admin')->resource('domain',DomainController::class);

    //Route company
    Route::get('companyIndex', [CompanyController::class,'showCompanies'])->name('companie.show');


    });



// Route::get('/ajoute',function(){
//     return view('admin.AjouteCaractaire');
// });
Route::get('/home',function(){
    return view('home');
});

Route::get('/offers/search', [OfferController::class, 'search'])->name('joboffers.search');






Route::namespace('Admin')->get('offer',[AdminOfferController::class,'index'])->name('offer.index');



 Route::middleware('checkRep')->group(function () {
    Route::namespace('Ceo')->resource('offerceo',OfferController::class);

    //route recruiter
    Route::get('users/create', [UserController::class,'createrecruiter'])->name('users.createrecruiter');
    Route::post('users/store', [UserController::class,'storerecruiter'])->name('users.storerecruiter');
    Route::delete('users/destroy/{user}', [UserController::class,'destroyrecruiter'])->name('users.destroyrecruiter');
    //route compamy
    Route::namespace('Ceo')->resource('company', CompanyController::class);

    
 });

 Route::namespace('Ceo')->get('/offer/{id}', [OfferController::class, 'show'])->name('offer.show');
 Route::namespace('Ceo')->post('/offer/{id}/ajoute', [OfferController::class, 'ajoute'])->name('offer.ajoute');
// Route formation
Route::resource('formations',FormationController::class);

// Route experience
Route::resource('experiences',ExperienceController::class);


Route::namespace('Ceo')->get('/home',[OfferController::class, 'index2']);




// Assurez-vous d'utiliser le bon namespace pour votre OfferController
Route::get('/applications', [OfferController::class, 'showApplications'])->name('applications.show');
Route::patch('/applications/{id}/accept', [OfferController::class, 'acceptApplication'])->name('applications.accept');
Route::patch('/applications/{id}/reject', [OfferController::class, 'rejectApplication'])->name('applications.reject');




require __DIR__.'/auth.php';
