<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\archiveDeloController;
use App\Http\Controllers\archiveDeloEditController;
use App\Http\Controllers\DashboardController;


Route::get('/cases', [\App\Http\Controllers\HomeController::class, 'showCases'])->name('cases');
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'showDashboard'])->name('dashboard');
Route::get('/login', [\App\Http\Controllers\HomeController::class, 'showLogin'])->name('login');
Route::get('/reqEd', [\App\Http\Controllers\HomeController::class, 'showReqEdit'])->name('requestEdit');
Route::get('/reqDet', [\App\Http\Controllers\HomeController::class, 'showReqDet'])->name('requestDetail');
Route::get('/login', [HomeController::class, 'showLogin'])->name('login');
Route::get('/', [HomeController::class, 'showMain'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/archiveDelo', [archiveDeloController::class, 'store'])->name('archiveDelo.store');
Route::get('/archiveDeloSuccess', [archiveDeloController::class, 'success'])->name('archiveDelo.success');

Route::middleware(['auth'])->group(function () { Route::get('/dashboard', function () { return view('pages.dashboard'); })->name('dashboard');});
Route::get('/dashboard', function () { return view('pages.dashboard'); }) -> middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/archiveDelo/{id}/edit', [archiveDeloEditController::class, 'edit'])->name('archiveDelo.edit');
Route::put('/archiveDelo/{id}', [archiveDeloEditController::class, 'update'])->name('archiveDelo.update');


Route::get('/', [ArchiveDeloController::class, 'create'])->name('main');

Route::post('/archiveDelo', [ArchiveDeloController::class, 'store'])->name('archiveDelo.store');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/archiveDelo', [ArchiveDeloController::class, 'store'])->name('archiveDelo.store');

Route::get('/archiveDelo/{id}/edit', [ArchiveDeloController::class, 'edit'])->name('archiveDelo.edit');

Route::put('/archiveDelo/{id}', [ArchiveDeloController::class, 'update'])->name('archiveDelo.update');
