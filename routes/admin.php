<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\DonationController;


Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::get('/doacoes', [PageController::class, 'doacoes'])->name('doacoes');
    Route::get('/minhas-doacoes', [DonationController::class, 'index'])->name('minhas-doacoes');
    Route::get('/editar-doacao', [DonationController::class, 'edit'])->name('editar-doacao');
    Route::get('/projetos-caridade', [PageController::class, 'projetos_caridade'])->name('projetos-caridade');
    Route::get('/sobre-nos', [PageController::class, 'sobre_nos'])->name('sobre-nos');

    Route::get('/quero-doar', [DonationController::class, 'quero_doar'])->name('quero-doar');
    Route::post('/quero-doar', [DonationController::class, 'store'])->name('quero-doar.store');
    Route::post('getImagePath', [DonationController::class, 'getImagePath']);
});