<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $donations = DB::select('select * from donations where id_usuario = :id', ['id' => Auth::id()]);
        return Inertia::render('MinhasDoacoes', ['donations'=>$donations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Donation::create([
            'nome' => $request->input('nome'),
            'id_usuario' => Auth::id(),
            'descricao' => $request->input('descricao'),
            'categoria' => $request->input('categoria'),
            'quantidade' => $request->input('quantidade'),
            'foto' => $request->input('foto'),
            'status' => "Anunciado"
        ]);

        return redirect('minhas-doacoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        return Inertia::render('EditarDoacao', ['donation' => $donation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        $donation->update($request->all());
        return redirect('minhas-doacoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect('minhas-doacoes');
    }

    public function minhas_doacoes(){
        return Inertia::render('MinhasDoacoes');
    }

    public function quero_doar(){
        return Inertia::render('QueroDoar');
    }

    public function getImagePath(Request $request){
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        $path = asset('images').'/'.$new_name;
        return $path;
    }
}
