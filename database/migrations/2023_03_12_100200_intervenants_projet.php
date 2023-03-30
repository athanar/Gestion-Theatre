<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    public function up()
    {
        Schema::create('intervenants_projet', function (Blueprint $table) {
            $table->unsignedBigInteger('intervenant_id');
            $table->unsignedBigInteger('projet_id');
            $table->timestamps();

            $table->foreign('intervenant_id')->references('id')->on('intervenants')->onDelete('cascade');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');

            $table->primary(['intervenant_id', 'projet_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('intervenants_projet');
    }
};
