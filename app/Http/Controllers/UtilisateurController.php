<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeUtilisateurs = Utilisateur::where('role_id', '2')->paginate(10);
        return view('utilisateurs.liste', compact('listeUtilisateurs'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
            "dateNaissance" => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            ],
            'cni' => 'required',
            'password' => 'required|confirmed'
        ])->validate();

        $cniPath = $request->file('cni')->store('pieceIdentite');

        // Création d'un nouvel utilisateur
        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'dateNaissance' => $request->dateNaissance,
            'cniPath' => $cniPath,
            'password' => Hash::make($request->password),
            'role_id' => '2',
        ]);

        // Redirection vers la page de connexion après l'inscription réussie
        return redirect()->route('utilisateurs.list');
    }

    public function create()
    {
        return view('utilisateurs.create');

    }

    public function show($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        return view('utilisateurs.show', compact('utilisateur'));

    }

    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        return view('utilisateurs.edit', compact('utilisateur'));

    }


    public function update(Request $request, Utilisateur $utilisateur)
    {
        $utilisateur->update($request->all());
        return redirect()->route('utilisateurs.list');
    }


    public function destroy($id)
    {
        Utilisateur::findOrFail($id)->delete();

        return redirect()->route('utilisateurs.list');
    }
}
