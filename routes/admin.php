<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return Inertia::render('Home');
})->name('home');