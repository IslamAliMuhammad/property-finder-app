<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\City;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\UserAdController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get('/cities', function () {
    return response()->json(['cities' => City::select('id', 'city_name')->get()], 200);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/apartments', [ApartmentController::class, 'index'])->name('apartments.index');
    Route::get('/apartments/create', [ApartmentController::class, 'create'])->name('apartments.create');
    Route::get('/apartments/{id}', [ApartmentController::class, 'show'])->name('apartments.show');
    Route::post('/apartments', [ApartmentController::class, 'store'])->name('apartments.store');

    Route::get('/villas', [VillaController::class, 'index'])->name('villas.index');
    Route::get('/villas/create', [VillaController::class, 'create'])->name('villas.create');
    Route::get('/villas/{id}', [VillaController::class, 'show'])->name('villas.show');
    Route::post('/villas', [VillaController::class, 'store'])->name('villas.store');


    Route::get('/lands', [LandController::class, 'index'])->name('lands.index');
    Route::get('/lands/create', [LandController::class, 'create'])->name('lands.create');
    Route::get('/lands/{id}', [LandController::class, 'show'])->name('lands.show');
    Route::post('lands', [LandController::class, 'store'])->name('lands.store');

    Route::get('/aboutus', function () {
        return Inertia::render('AboutUs');
    })->name('aboutus.index');

    
    Route::get('user/ads', [UserAdController::class, 'index'])->name('ads.index');
    
    Route::delete('apartments/{id}', [ApartmentController::class, 'destroy'])->name('apartments.destroy');
    Route::delete('villas/{id}', [VillaController::class, 'destroy'])->name('villas.destroy');
    Route::delete('lands/{id}', [LandController::class, 'destroy'])->name('lands.destroy');

    Route::get('user/profile/create', function () {
        return redirect(route('profile.show'));
    })->name('profile.create');

    Route::get('user/ads/create', function () {
        return redirect(route('ads.index'));
    })->name('ads.create');

});