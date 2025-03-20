<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\PublicController;

// Rotas Públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Painel Admin (com middleware de autenticação)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('animals', AnimalController::class)->except(['show']);
    Route::resource('adopters', AdopterController::class);
    Route::resource('shelters', ShelterController::class);

});

// Autenticação
Auth::routes();

// Redirecionamento após login
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/animals/{id}', [PublicController::class, 'show'])->name('animals.show');
Route::get('/admin/animals/adopted', [AnimalController::class, 'adopted'])->name('animals.adopted');


