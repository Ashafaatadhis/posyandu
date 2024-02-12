<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ChildController;
use App\Http\Controllers\dashboard\ParentController;
use App\Http\Controllers\dashboard\MidwifeController;
use App\Http\Controllers\dashboard\OfficerController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\authentications\LoginController;
use Symfony\Component\HttpFoundation\ServerBag;

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

// Login
Route::controller(LoginController::class)->middleware('guest')->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Data Master
Route::resource('parent-data', ParentController::class)->middleware('auth');
Route::resource('children-data', ChildController::class)->middleware('auth');
Route::resource('officer-data', OfficerController::class)->middleware('auth');
Route::resource('midwife-data', MidwifeController::class)->middleware('auth');

Route::controller(ServiceController::class)->middleware('auth')->group(function () {
    Route::get('weighing-children', 'WeighingChild')->name('weighing.child');
    Route::post('weighing-children', 'StoreWeighing')->name('store.weighing');
});

Route::controller(ServiceController::class)->middleware('auth')->group(function () {
    Route::get('child-immunization', 'ImmunizationChild')->name('Immunization');
    Route::post('child-immunization', 'StoreImmunization')->name( 'store.Immunization' );
});
