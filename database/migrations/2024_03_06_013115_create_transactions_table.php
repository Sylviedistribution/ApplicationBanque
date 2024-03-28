<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("emetteur");
            $table->string("beneficiaire");
            $table->string("numeroCompteBeneficiaire");
            $table->dateTime("dateTransaction");
            $table->double("montant");
            $table->foreignId("utilisateur_id")->constrained("utilisateurs");
            $table->foreignId("compte_id")->constrained("comptes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
