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
        Schema::create('cartes', function (Blueprint $table) {
            $table->id();
            $table->string("numeroCarte");
            $table->string("cvv");
            $table->date("dateCreation");
            $table->date("dateExpiration");
            $table->double("solde");
            $table->foreignId("utilisateur_id")->constrained("utilisateurs")->onDelete('cascade');
            $table->foreignId("compte_id")->constrained("comptes")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartes');
    }
};
