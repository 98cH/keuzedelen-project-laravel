<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('keuzedelen', function (Blueprint $table) {
            $table->string('keuzedeelcode', 50)->unique()->after('titel');
        });
    }

    public function down(): void
    {
        Schema::table('keuzedelen', function (Blueprint $table) {
            $table->dropColumn('keuzedeelcode');
        });
    }
};
