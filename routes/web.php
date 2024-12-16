<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShelterController;

// Rotas Públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Painel Admin (com middleware de autenticação)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('animals', AnimalController::class);
    Route::resource('adopters', AdopterController::class);
    Route::resource('shelters', ShelterController::class);

});

// Autenticação
Auth::routes();

// Redirecionamento após login
Route::get('/home', [HomeController::class, 'index'])->name('home');
