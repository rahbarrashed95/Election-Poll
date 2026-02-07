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
        if (!Schema::hasTable('pollers')) 
        {
            Schema::create('pollers', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);                 
                $table->string('mobile', 20)->unique();                                                  
                $table->tinyInteger('status')
                      ->nullable()
                      ->default(1)
                      ->comment('1=>active, 0=>inactive');
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
        Schema::dropIfExists('pollers');
    }
};
