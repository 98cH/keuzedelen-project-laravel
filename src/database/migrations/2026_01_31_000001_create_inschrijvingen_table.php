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
        Schema::create('inschrijvingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('keuzedeel_1_id')->constrained('keuzedelen');
            $table->foreignId('keuzedeel_2_id')->constrained('keuzedelen');
            $table->foreignId('keuzedeel_3_id')->constrained('keuzedelen');
            $table->foreignId('toegewezen_keuzedeel_id')->nullable()->constrained('keuzedelen');
            $table->enum('status', ['open', 'toegewezen', 'wachtlijst'])->default('open');
            $table->timestamps();
            $table->unique('user_id'); // elke student mag maar 1x inschrijven
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inschrijvingen');
    }
};
