<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\PageController;


Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::get('/doacoes', [PageController::class, 'doacoes'])->name('doacoes');
    Route::get('/minhas-doacoes', [PageController::class, 'minhas_doacoes'])->name('minhas-doacoes');
    Route::get('/projetos-caridade', [PageController::class, 'projetos_caridade'])->name('projetos-caridade');
    Route::get('/sobre-nos', [PageController::class, 'sobre_nos'])->name('sobre-nos');
    Route::get('/quero-doar', [PageController::class, 'quero_doar'])->name('quero-doar');
});