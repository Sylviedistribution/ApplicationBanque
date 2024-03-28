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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string("numeroCompte");
            $table->string("typeCompte");
            $table->double("solde");
            $table->double("plafondTransaction");
            $table->integer("etat");
            $table->foreignId("utilisateur_id")->constrained("utilisateurs")->onDelete('cascade');
            $table->foreignId("pack_id")->constrained("packs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comptes', function (Blueprint $table) {
            // Supprime la contrainte de clé étrangère
            $table->dropForeign(['utilisateur_id']);
        });
    }
};
