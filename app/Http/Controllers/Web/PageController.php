<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\PageController;

class PageController extends Controller
{
    public function welcome(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function home(){
        return Inertia::render('Home');
    }
    public function projetos_caridade(){
        return Inertia::render('ProjetosCaridade');
    }
    public function doacoes(){
        return Inertia::render('Doacoes');
    }
    public function minhas_doacoes(){
        return Inertia::render('MinhasDoacoes');
    }
    public function sobre_nos(){
        return Inertia::render('SobreNos');
    }
    public function quero_doar(){
        return Inertia::render('QueroDoar');
    }
}