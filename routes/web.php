<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConceptorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\Products\Data2021Controller;
use App\Models\Conceptor;

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
    return redirect()->route('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->prefix('lease-sentry')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dokumen', [DocumentController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [DocumentController::class, 'create'])->name('dokumen.create');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/products/2021', [Data2021Controller::class, 'index'])->name('data2021.index');
    Route::get('/products/2021/create', [Data2021Controller::class, 'create'])->name('data2021.create');

    // Konseptor
    Route::get('/konseptor', [ConceptorController::class, 'index'])->name('konseptor.index');
    Route::post('/konseptor', [ConceptorController::class, 'store'])->name('konseptor.store');
    Route::post('/konseptor/{id}/update', [ConceptorController::class, 'update'])->name('konseptor.update');
    Route::delete('/konseptor/{id}/delete', [ConceptorController::class, 'delete'])->name('konseptor.delete');

    // Hari libur
    Route::get('hari-libur', [HolidayController::class, 'index'])->name('hari-libur.index');
    Route::post('hari-libur', [HolidayController::class, 'store'])->name('hari-libur.store');
    Route::post('hari-libur/{id}/update', [HolidayController::class, 'update'])->name('hari-libur.update');
});
