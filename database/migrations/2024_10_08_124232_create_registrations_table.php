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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('mobile', 200)->nullable();
            $table->string('dob', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('preferred_country', 200)->nullable();
            $table->text('how_know')->nullable();
            $table->string('language', 200)->nullable();
            $table->string('score', 200)->nullable();
            $table->string('highest_qualification', 200)->nullable();
            $table->string('gpa', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
