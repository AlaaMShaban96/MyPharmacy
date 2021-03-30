<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable();
            $table->text('image')->nullable();
            $table->bigInteger('pharmacy_id')->unsigned();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
            
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
        Schema::dropIfExists('advertisings');
    }
}
