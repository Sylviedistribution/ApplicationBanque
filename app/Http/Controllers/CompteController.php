<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role_id == 1)
        {
            $listeComptes = Compte::paginate(7);
            return view('comptes.liste', compact('listeComptes'));
        }
        else{
            $listeComptes = Compte::where('utilisateur_id', $user->id)->paginate(2); // 10 est le nombre d'éléments par page
            return view('comptes', compact('listeComptes'));
        }
    }


    public function create()
    {
        $listePacks = Pack::all();
        return View::make('comptes.create', compact('listePacks'));
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'typeCompte' => 'required',
            'pack_id' => 'required',
            'solde' => 'required|numeric|gt:0',

        ])->validate();

        $user_id = auth()->user()->id;
        $pack = Pack::where('id', $request->pack_id)->first();

        // Générer un numéro de compte unique
        do {
            $numeroCompte = random_int(10000000000, 99999999999); // Génération d'un numéro de 11 chiffres. Compte bancaire
        } while (Compte::where('numeroCompte', $numeroCompte)->exists()); // Vérifier l'unicité du numéro de compte

        // Créer un nouveau compte avec les données fournies
        $compte = Compte::create([
            'numeroCompte' => $numeroCompte,
            'typeCompte' => $request->typeCompte,
            'solde' => $request->solde,
            'plafondTransaction' => $pack->plafond,
            'etat' => 1, // État initialisé à 1 qui signifie active
            'utilisateur_id' => $user_id,
            'pack_id' => $request->pack_id, // ID du pack choisi sur la page précédente
        ]);

        $compteId = $compte->id;

        return redirect()->route('ribs.store', compact('compteId'));
    }

    public function update(Request $request, Compte $compte)
    {
        // Vérifie l'état actuel du compte
        $nouvelEtat = $compte->etat == 0 ? 1 : 0;

        // Met à jour l'état du compte avec la nouvelle valeur
        $compte->update([
            'etat' => $nouvelEtat,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('comptes.list');
    }

    public function destroy($id)
    {
        Compte::findOrFail($id)->delete();

        return redirect()->route('comptes.list');
    }


}
