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
        Schema::create('lien', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Vente', 'Achat']);
            $table->date('date_achat');
            $table->softDeletes('deleted_at', 0);
            $table->foreignId('client_id')->constrained('client');
            $table->foreignId('materiel_id')->constrained('materiel');
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
        Schema::drop('lien');
    }
};
