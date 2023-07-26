<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function() { 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('organization-unit', App\Http\Controllers\OrganizationUnitController::class);
    Route::get('/organization-unit/{orgUnit}/add-child', [App\Http\Controllers\OrganizationUnitController::class, 'addChildren'])->name('organization-unit.add-child');
    Route::post('/organization-unit/add-child-org', [App\Http\Controllers\OrganizationUnitController::class, 'addChildrenOrganizaion'])->name('organization-unit.add-child-org');
    Route::get('/unit/{orgUnit?}', App\Http\Controllers\DisplayUnitController::class)->name('unit.show');
    Route::get('/live-unit/{orgUnit?}', App\Http\Controllers\DisplayLiveUnitController::class)->name('unit.liveshow');
});

