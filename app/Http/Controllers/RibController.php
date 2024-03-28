<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\Compte;
use App\Models\Rib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class RibController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if ($user->role_id == 1)
        {
            $listeRibs = Rib::paginate(10);
            return view('ribs.liste', compact('listeRibs'));
        }
        else{
            $listeRibs = Rib::where('utilisateur_id', $user->id)->paginate(10); // 10 est le nombre d'éléments par page
            return view('ribs.liste', compact('listeRibs'));
        }

    }


    public function store(Request $request)
    {
        $user= auth()->user();
        $user_id = $user->id;

        // Récupérer l'ID du compte à partir de la requête
        $compteId = $request->input('compteId');
        $compte = Compte::where('id', $compteId)->firstOrFail();
        $solde = $compte->solde;
        $codeBanque = config('bank.code_banque');
        $codeGuichet = config('bank.code_guichet');
        $numeroCompte = $compte->numeroCompte;
        $cleRib = config('bank.cle_rib');
        $titulaireCompte = $user->nom . " " . $user->prenom;
        $iban = $codeBanque.$codeGuichet.$numeroCompte.$cleRib;

        Rib::create([
            'codeBanque' => $codeBanque,
            'codeGuichet' => $codeGuichet,
            'numeroCompte' => $numeroCompte,
            'cleRib' => $cleRib,
            'titulaireCompte' => $titulaireCompte,
            'iban' => $iban,
            'utilisateur_id' => $user_id,
            'compte_id' => $compteId,
        ]);

        Mail::to($user->email)->send(new ConfirmationMail($numeroCompte, $codeBanque, $codeGuichet, $cleRib, $iban,$titulaireCompte, $solde));
        return redirect()->route('comptes.list');
    }

    public function destroy(Rib $rib)
    {
        //
    }
}
