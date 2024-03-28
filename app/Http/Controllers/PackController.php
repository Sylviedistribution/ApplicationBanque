<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Validator;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listePacks = Pack::all();

        return view('packs.liste', compact('listePacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('packs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'agio' => 'required|numeric',
            'plafond' => 'required|numeric',
            'etat' => 'required'
        ]);

        // Créer un nouveau compte avec les données fournies
        Pack::create([
            'type' => $request->type,
            'agio' => $request->agio,
            'plafond' => $request->plafond, // Solde initialisé à zéro
            'etat' => $request->etat,

        ]);
        return redirect()->route('packs.list');

    }

    public function edit($id)
    {
        $pack = Pack::findOrFail($id);


        return view('packs.edit',compact('pack'));

    }


    public function update(Request $request, Pack $pack)
    {
        $pack->update($request->all());
        return redirect()->route('packs.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pack::findOrFail($id)->delete();

        return redirect()->route('packs.list');
    }
}
