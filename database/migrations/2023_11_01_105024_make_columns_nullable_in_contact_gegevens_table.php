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
        Schema::table('contact_gegevens', function (Blueprint $table) {
            $table->string('voornaam')->nullable()->change();
            $table->string('achternaam')->nullable()->change();
            $table->string('telefoonnummer')->nullable()->change();
            $table->string('adres')->nullable()->change();
            $table->string('plaats')->nullable()->change();
            $table->string('postcode')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_gegevens', function (Blueprint $table) {
            $table->string('voornaam')->nullable(false)->change();
            $table->string('achternaam')->nullable(false)->change();
            $table->string('telefoonnummer')->nullable(false)->change();
            $table->string('adres')->nullable(false)->change();
            $table->string('plaats')->nullable(false)->change();
            $table->string('postcode')->nullable(false)->change();
        });
    }
};
