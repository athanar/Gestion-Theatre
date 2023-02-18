<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenants', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->string('prenom');
                $table->string('adresse');
                $table->date('date_naissance');
                $table->string('telephone');
                $table->string('email');
                $table->string('num_secu');
                $table->string('num_conges_spectacles');
                $table->enum('statut', ['comédien', 'intermittent', 'auto entrepreneur']);
                $table->boolean('scenariste')->default(false);
                $table->boolean('comedien')->default(false);
                $table->boolean('formateur')->default(false);
                $table->boolean('impro')->default(false);
                $table->boolean('chanteur')->default(false);
                $table->boolean('realisateur_monteur')->default(false);
                $table->boolean('photographe')->default(false);
                $table->boolean('musique')->default(false);
                $table->set('langues', ['français', 'anglais', 'italien', 'allemand', 'espagnol'])->nullable();
                $table->text('commentaire')->nullable();
                $table->json('pieces_jointes')->nullable();
                $table->string('photo')->nullable();
                $table->json('projets')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervenants');
    }
};
