<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\PageController;
use App\Models\Donation;

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
        $doacoes = Donation::get();
        return view('doacoes', compact("doacoes"));
    }
    public function sobre_nos(){
        return Inertia::render('SobreNos');
    }
}