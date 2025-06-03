<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorySkilsController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PersonalSkilsController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkilController;
use App\Http\Controllers\SlugController;
use App\Http\Controllers\UserContontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortofolioController::class, 'home']);
Route::get('/about', [PortofolioController::class, 'about']);
Route::get('/project', [PortofolioController::class, 'project']);
Route::get('/sertifikat', [PortofolioController::class, 'sertifikat']);
Route::get('/project/{slug}', [PortofolioController::class, 'projectShow'])->name('show.project');
Route::get('/certificate/{slug}', [PortofolioController::class, 'certificateShow'])->name('show.certificate');
Route::get('/personalskils', [PortofolioController::class, 'personalSkils']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('loginAction');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/hire-me', [PortofolioController::class, 'hireMe']);

Route::prefix('/panel-admin')->middleware('auth')->group(function () {
    Route::resource('profile', UserContontroller::class);
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('slug', SlugController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('certificate', CertificateController::class);
    Route::resource('skils', SkilController::class);
    Route::resource('personalskils', PersonalSkilsController::class);
    Route::resource('categoryskils', CategorySkilsController::class);
});
