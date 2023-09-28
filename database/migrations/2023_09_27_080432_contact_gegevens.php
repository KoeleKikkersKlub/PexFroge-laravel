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
        Schema::create('ContactGegevens', function (Blueprint $table) {
        $table->id();
        $table->string('firstname')->nullable();
        $table->string('lastname')->nullable();
        $table->string('contactemail')->nullable();
        $table->string('phonenumber')->nullable();
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('zip')->nullable();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
