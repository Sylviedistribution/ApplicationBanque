<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\Compte;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CarteController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if ($user->role_id == 1) {
            $listeCartes = Carte::paginate(10);
            return view('cartes.liste', compact('listeCartes'));
        }
        else{
            $listeCartes = Carte::where('utilisateur_id', $user->id)->paginate(2);
            return view('cartes', compact('listeCartes','user'));
        }
    }


    public function create()
    {
        $user_id = auth()->user()->id;
        $listeComptes = Compte::where("utilisateur_id",$user_id) ->where('typeCompte', 'Courant')
            ->get();
        return View::make('cartes.create', compact('listeComptes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'solde' => 'required|numeric|gt:0',
            'compte_id' => 'required',

        ]);
        $compte = Compte::where('id',$request->compte_id)->first();
        //Creation numero de carte
        do {
            $numeroCarte = $this->generateVisaCardNumber();
        } while (Carte::where('numeroCarte', $numeroCarte)->exists()); // Vérifier l'unicité du numéro de compte

        $cvv ='';
        //Creation cvv
        do {
            for ($i = 0; $i<3; $i++){
                $cvv .= mt_rand(0, 9);
            }
        } while (Carte::where('cvv', $numeroCarte)->exists());

        $user_id = auth()->user()->id;

        $dateExpiration = new DateTime();
        $dateExpiration->add(new DateInterval('P5Y')); // Ajoute 5 ans à la date d'expiration

        // Formatage de la date d'expiration pour l'affichage
        if($request->solde <= $compte->solde){
        Carte::create([
            'numeroCarte' => $numeroCarte,
            'dateCreation' => now(),
            'dateExpiration' => $dateExpiration,
            'cvv' => $cvv,
            'solde' => $request->solde,
            'utilisateur_id' => $user_id,
            'compte_id' => $request->compte_id,
        ]);
        return  redirect()->route('cartes.list');
        }
        else{
            return  redirect()->route('cartes.create')->with('Solde insuffisant');

        }

    }

    public function update(Request $request, Carte $carte)
    {
        //
    }

    public function destroy($id)
    {
        Carte::findOrFail($id)->delete();

        return redirect()->route('cartes.list');
    }

    function generateVisaCardNumber() {
        // Préfixe pour Visa
        $prefix = '4';

        // Longueur de la carte Visa
        $length = 16;

        // Générer les chiffres aléatoires pour les emplacements restants
        $remainingLength = $length - strlen($prefix) - 1; // Soustraire 1 pour le chiffre de contrôle
        $randomDigits = '';
        for ($i = 0; $i < $remainingLength; $i++) {
            $randomDigits .= mt_rand(0, 9);
        }

        // Concaténer le préfixe et les chiffres aléatoires
        $cardNumber = $prefix . $randomDigits;

        return $cardNumber;
    }

}
