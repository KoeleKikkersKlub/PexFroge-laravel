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
        Schema::create('stagemarkt_profiel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cg_id');
            $table->string('name');
            $table->string('kvk_naam');
            $table->string('kvk_nummer');
            $table->string('kvk_vestigingsnummer');
            $table->string('bedrijfsindeling');
            $table->string('bedrijfsgrootte');
            $table->string('capaciteit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagemarkt_profiel');
    }
};
