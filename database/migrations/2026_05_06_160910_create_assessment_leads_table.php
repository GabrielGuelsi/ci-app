<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_leads', function (Blueprint $table) {
            $table->id();

            // Contact
            $table->string('full_name', 150);
            $table->string('email', 180);
            $table->string('phone', 40);
            $table->string('country_of_residence', 100)->nullable();
            $table->string('visa_type', 60)->nullable();

            // Meta
            $table->string('lead_source', 60)->nullable();
            $table->string('locale', 5)->default('en');
            $table->ipAddress('submitted_ip')->nullable();
            $table->string('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_leads');
    }
};
