<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profile_assessments', function (Blueprint $table) {
            $table->string('long_term_goal')->nullable()->change();
            $table->string('experience_years')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('profile_assessments', function (Blueprint $table) {
            $table->string('long_term_goal')->nullable(false)->change();
            $table->string('experience_years')->nullable(false)->change();
        });
    }
};
