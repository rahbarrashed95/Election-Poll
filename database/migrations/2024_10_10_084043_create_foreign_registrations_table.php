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
        Schema::create('foreign_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('mow', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('status')->nullable();
            $table->string('ten_passing', 100)->nullable();
            $table->string('twelve_passing', 100)->nullable();
            $table->string('gpa', 100)->nullable();
            $table->string('score', 100)->nullable();
            $table->string('college', 100)->nullable();
            $table->text('message')->nullable();
            $table->string('attach_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_registrations');
    }
};
