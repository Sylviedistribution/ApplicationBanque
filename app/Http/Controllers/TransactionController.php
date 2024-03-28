<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UtilisateurController;
use App\Models\Compte;
use App\Models\Pack;
use App\Models\Transaction;
use App\Models\Utilisateur;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class TransactionController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if ($user->role_id == 1) {
            $listeTransactions = Transaction::paginate(10);
            return view('transactions.liste', compact('listeTransactions'));
        } else {
            $listeTransactions = Transaction::where('utilisateur_id', $user->id)->get();
            return view('transactions', compact('listeTransactions'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "numeroCompteBeneficiaire" => 'required|numeric|max:99999999999',
            'montant' => 'required|numeric|gt:0',
            'compte_id' => 'required',
        ]);

        // Récupérer l'utilisateur actuel
        $emetteur = auth()->user();
        $emetteur_id = $emetteur->id;

        // Récupérer le compte de l'émetteur
        $compte_emetteur = Compte::where('id', $request->compte_id)->firstOrFail();
        // Récupérer le compte du bénéficiaire
        $compte_beneficiaire = Compte::where('numeroCompte', $request->numeroCompteBeneficiaire)
            ->firstOrFail();

        $beneficiaire = Utilisateur::where('id', $compte_beneficiaire->utilisateur_id)->first();

        // Vérifier si le solde du compte émetteur est suffisant
        if ($compte_emetteur->solde >= $request->montant) {
            // Vérifier si le plafond du pack est atteint
            $transactions_mois_en_cours = Transaction::where('utilisateur_id', $emetteur_id)
                ->whereYear('dateTransaction', now()->year)
                ->whereMonth('dateTransaction', now()->month)
                ->sum('montant');

            // Calculer la somme restante autorisée pour le mois en cours
            $solde_restant_autorise = $compte_emetteur->plafondTransaction - $transactions_mois_en_cours;

            // Vérifier si le montant de la transaction dépasse le solde restant autorisé
            if ($request->montant <= $solde_restant_autorise) {

                $dateTransaction = new DateTime();

                // Créer une nouvelle transaction pour l'émetteur
                Transaction::create([
                    'emetteur' => $emetteur->nom . ' ' . $emetteur->prenom,
                    'beneficiaire' => $beneficiaire->nom . ' ' . $beneficiaire->prenom,
                    'numeroCompteBeneficiaire' => $request->numeroCompteBeneficiaire,
                    'dateTransaction' => $dateTransaction,
                    'montant' => -$request->montant, // Montant négatif pour débiter le compte
                    'utilisateur_id' => $emetteur_id,
                    'compte_id' => $compte_emetteur->id,
                ]);


                // Créer une nouvelle transaction pour le bénéficiaire
                Transaction::create([
                    'emetteur' => $emetteur->nom . ' ' . $emetteur->prenom,
                    'beneficiaire' => $beneficiaire->nom . ' ' . $beneficiaire->prenom,
                    'numeroCompteBeneficiaire' => $compte_emetteur->numeroCompte,
                    'dateTransaction' => $dateTransaction,
                    'montant' => $request->montant, // Montant positif pour créditer le compte
                    'utilisateur_id' => $compte_beneficiaire->utilisateur_id,
                    'compte_id' => $compte_beneficiaire->id,
                ]);

                // Mettre à jour les soldes des comptes
                $compte_emetteur->update(['solde' => $compte_emetteur->solde - $request->montant]);
                $compte_beneficiaire->update(['solde' => $compte_beneficiaire->solde + $request->montant]);

                return redirect()->route('transactions.list');


            } else {
                Session::flash('message', 'Solde insuffisant pour effectuer cette transaction.');
                return Redirect::back();
            }
        } else {
            Session::flash('message', 'Vous avez atteint votre plafond de transaction. Reessayer le mois porchain.');
            return Redirect::back();
        }
    }

    public function create()
    {
        $user_id = auth()->user()->id;

        $listeComptes = Compte::where('utilisateur_id', $user_id)->where('typeCompte', 'Courant')->get();
        return View::make('transactions.create', compact('listeComptes'));

    }

}
