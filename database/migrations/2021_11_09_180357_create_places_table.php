<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->double('price')->nullable();
            $table->text('type')->nullable();
            $table->text('images')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_kitchen')->default(false);
            $table->boolean('is_wifi')->default(false);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
