<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_assessments', function (Blueprint $table) {
            $table->id();

            // Quiz answers
            $table->string('location');
            $table->string('current_situation');
            $table->string('main_goal');
            $table->string('long_term_goal');
            $table->string('english_level');
            $table->string('visa_status');
            $table->string('education_level');
            $table->string('experience_years');
            $table->string('area_of_interest');
            $table->string('career_aligned');
            $table->string('start_timing');
            $table->json('support_type');
            $table->json('career_support')->nullable();
            $table->string('budget');
            $table->string('contact_speed');

            // Contact
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('preferred_language')->nullable();
            $table->string('preferred_contact_time')->nullable();

            // Meta
            $table->string('locale', 5)->default('en');
            $table->ipAddress('submitted_ip')->nullable();
            $table->string('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_assessments');
    }
};
