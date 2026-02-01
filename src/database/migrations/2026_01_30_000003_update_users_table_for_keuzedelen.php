<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'studentnummer')) {
                $table->string('studentnummer')->unique()->after('id');
            }
            if (!Schema::hasColumn('users', 'klas')) {
                $table->string('klas')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('student')->after('klas');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'studentnummer')) {
                $table->dropColumn('studentnummer');
            }
            if (Schema::hasColumn('users', 'klas')) {
                $table->dropColumn('klas');
            }
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
