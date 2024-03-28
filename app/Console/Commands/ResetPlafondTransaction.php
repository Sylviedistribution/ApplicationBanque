<?php

namespace App\Console\Commands;

use App\Models\Compte;
use App\Models\Pack;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class ResetPlafondTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-plafond-transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Réinitialise le plafond de transaction pour tous les comptes';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        // Récupérer tous les comptes
        $comptes = Compte::all();

        // Parcourir les comptes et mettre à jour le plafond de transaction en fonction du pack associé
        foreach ($comptes as $compte) {
            // Récupérer le pack associé au compte
            $pack = Pack::find($compte->pack_id);

            // Si le pack existe, mettre à jour le plafond de transaction du compte
            if ($pack) {
                $compte->update(['plafondTransaction' => $pack->plafond]);
            }
        }

        $this->info('Plafond de transaction réinitialisé avec succès.');
    }
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(ResetPlafondTransaction::class)->monthly();
    }
}
