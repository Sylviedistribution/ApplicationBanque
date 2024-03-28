<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\Compte;
use App\Models\Pack;
use App\Models\Rib;
use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    // Affiche le formulaire d'inscription
    public function register()
    {
        return view('auth/register');
    }

    // Traitement de la soumission du formulaire d'inscription

    /**
     * @throws ValidationException
     */
    public function registerSave(Request $request)
    {
        // Validation des données du formulaire
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

        //Stockage fichier
        if ($request->hasFile('cni')) {
            $cniPath = $request->file('cni')->store('pieceIdentite');
        } else {
            $cniPath = null;
        }
        // Création d'un nouvel utilisateur
        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'dateNaissance' => $request->dateNaissance,
            'cniPath' => $cniPath, // Assurez-vous que $cniPath contient une valeur valide
            'password' => Hash::make($request->password),
            'role_id' => '2',
        ]);

        // Redirection vers la page de connexion après l'inscription réussie
        return redirect()->route('login');
    }

    // Affiche le formulaire de connexion
    public function login()
    {
        return view('auth/login');
    }

    // Traitement de la soumission du formulaire de connexion

    /**
     * @throws ValidationException
     */
    public function loginAction(Request $request)
    {
        // Validation des données du formulaire
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // Authentification de l'utilisateur
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // En cas d'échec d'authentification, renvoie une erreur de validation
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        // Régénération de la session
        $request->session()->regenerate();

        // Obtention de l'utilisateur authentifié
        $user = Auth::user();

        // Définition du nombre d'utilisateurs
        $nbrUtilisateur = Utilisateur::count();

        $nbrCompte = Compte::count();
        $nbrTransaction = Transaction::count();
        $nbrCarte = Carte::count();
        $nbrPack = Pack::count();
        $nbrRib = Rib::count();


        // Redirection en fonction du rôle
        if ($user->role_id == 1) {
            return view('dashboard', compact('nbrUtilisateur', 'nbrCompte', 'nbrTransaction', 'nbrCarte', 'nbrPack', 'nbrRib'));
        } else {
            return view('index');
        }
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidation de la session
        $request->session()->invalidate();

        // Redirection vers la page d'accueil après la déconnexion
        return redirect()->route('index');
    }

    public function dashboard(Request $request)
    {
        // Obtention de l'utilisateur authentifié
        $user = Auth::user();

        // Définition du nombre d'utilisateurs
        $nbrUtilisateur = Utilisateur::count();

        $nbrCompte = Compte::count();
        $nbrTransaction = Transaction::count();
        $nbrCarte = Carte::count();
        $nbrPack = Pack::count();
        $nbrRib = Rib::count();


        // Redirection en fonction du rôle
        if ($user->role_id == 1) {
            return view('dashboard', compact('nbrUtilisateur', 'nbrCompte', 'nbrTransaction', 'nbrCarte', 'nbrPack', 'nbrRib'));
        } else {
            return redirect()->route('login');
        }
    }

}
