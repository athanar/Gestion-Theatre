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
        Schema::table('projets', function (Blueprint $table) {
            $table->decimal('cout_total', 8, 2)->nullable();
            $table->decimal('cout_salarial', 8, 2)->nullable();
            $table->decimal('deplacement', 8, 2)->nullable();
            $table->decimal('restauration', 8, 2)->nullable();
            $table->decimal('hebergement', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projets', function (Blueprint $table) {
            //
        });
    }
};
