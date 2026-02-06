<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('candidates')) 
        {
            Schema::create('candidates', function (Blueprint $table) {
                $table->id();
                                 
                $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();                                     
                $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();                                     
                $table->foreignId('seat_id')->constrained('seats')->cascadeOnDelete();                                     
                
                $table->string('name', 100);
                $table->string('marka', length: 100)->nullable();
                $table->string('party', 100)->nullable();
                $table->string('image', 255)->nullable();
                $table->tinyInteger('status')
                      ->nullable()
                      ->default(1)
                      ->comment('1=>active, 0=>inactive');
                $table->foreignId('created_by')
                      ->nullable()
                      ->constrained('users');
                $table->foreignId('updated_by')
                      ->nullable()
                      ->constrained('users');
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
